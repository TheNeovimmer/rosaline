<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Database;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;

class CheckoutController extends Controller
{
    public function index(): void
    {
        if (!Auth::check()) {
            $this->redirect('/login');
            return;
        }

        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            $this->redirect('/cart');
            return;
        }

        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        $codEnabled = Setting::get('cod_enabled') === '1';

        $this->view('front/checkout', [
            'cart'       => $cart,
            'total'      => $total,
            'user'       => Auth::user(),
            'cod'        => $codEnabled ? [
                'enabled'     => true,
                'min_amount'  => (float) Setting::get('cod_min_amount', '0'),
                'max_amount'  => (float) Setting::get('cod_max_amount', '0'),
                'description' => Setting::get('cod_description', ''),
            ] : ['enabled' => false],
        ]);
    }

    public function place(): void
    {
        if (!Auth::check()) {
            $this->redirect('/login');
            return;
        }

        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            $this->redirect('/cart');
            return;
        }

        $errors = $this->validate($_POST, [
            'address'  => 'required|min:10|max:500',
            'city'     => 'required|min:2|max:100',
            'zip'      => 'required|min:3|max:20',
            'country'  => 'required|min:2|max:100',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        Database::beginTransaction();

        try {
            $address = ($_POST['address'] ?? '') . ', ' . ($_POST['city'] ?? '') . ', ' . ($_POST['zip'] ?? '') . ', ' . ($_POST['country'] ?? '');
            $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));

            $orderId = Order::create([
                'user_id'          => Auth::id(),
                'order_number'     => $orderNumber,
                'total'            => $total,
                'status'           => 'pending',
                'shipping_address' => $address,
                'billing_address'  => $address,
                'payment_method'   => $_POST['payment_method'] ?? 'cod',
                'payment_status'   => 'pending',
                'notes'            => $_POST['notes'] ?? '',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id'      => $orderId,
                    'product_id'    => $item['product_id'],
                    'product_name'  => $item['name'],
                    'product_price' => $item['price'],
                    'quantity'      => $item['quantity'],
                    'subtotal'      => $item['price'] * $item['quantity'],
                ]);

                Database::query(
                    "UPDATE products SET stock_quantity = GREATEST(0, stock_quantity - :qty) WHERE id = :pid AND stock_quantity >= :qty2",
                    ['qty' => $item['quantity'], 'pid' => $item['product_id'], 'qty2' => $item['quantity']]
                );
            }

            Database::commit();
            unset($_SESSION['cart']);

            $user = Auth::user();
            $body = '<p>Hi ' . e($user['name']) . ',</p><p>Your order <strong>#' . e($orderNumber) . '</strong> has been placed successfully.</p>';
            $body .= '<p>Total: ' . formatPrice($total) . '</p><p>Payment: ' . ($_POST['payment_method'] === 'cod' ? 'Cash on Delivery' : 'Card') . '</p>';
            $body .= '<p>We will notify you when your order ships.</p>';
            send_mail($user['email'], 'Order Confirmation - ' . e($orderNumber), $body);

            $this->withSuccess('Order placed successfully!');
            $this->redirect('/account/orders');
        } catch (\Exception $e) {
            Database::rollback();
            $this->withErrors(['general' => ['Failed to place order. Please try again.']]);
            $this->redirectBack();
        }
    }
}

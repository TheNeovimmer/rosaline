<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Database;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;
use App\Models\Governorate;

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
            'cart'          => $cart,
            'total'         => $total,
            'user'          => Auth::user(),
            'governorates'  => Governorate::getActive(),
            'cod'           => $codEnabled ? [
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
            'first_name' => 'required|min:1|max:100',
            'last_name'  => 'required|min:1|max:100',
            'address'    => 'required|min:5|max:500',
            'phone'      => 'required|min:10|max:20',
        ]);

        if (empty($_POST['governorate_id'])) {
            $errors['governorate_id'][] = 'governorate_id is required';
        }

        if (!empty($_POST['phone']) && !isTunisianPhone($_POST['phone'])) {
            $errors['phone'][] = 'phone must be a valid Tunisian number (+216XXXXXXXX)';
        }

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        $shippingFee = Governorate::getShippingFee((int)$_POST['governorate_id']);
        $freeThreshold = (float) Setting::get('shipping_free_threshold', '200');
        if ($subtotal >= $freeThreshold) {
            $shippingFee = 0;
        }
        $total = $subtotal + $shippingFee;

        $codEnabled = Setting::get('cod_enabled') === '1';
        if (!$codEnabled) {
            $this->withErrors(['general' => ['COD is not available.']]);
            $this->redirectBack();
            return;
        }
        $minAmount = (float) Setting::get('cod_min_amount', '0');
        if ($minAmount > 0 && $total < $minAmount) {
            $this->withErrors(['general' => ['Minimum order amount is ' . formatPrice($minAmount) . '.']]);
            $this->redirectBack();
            return;
        }

        $address = ($_POST['first_name'] ?? '') . ' ' . ($_POST['last_name'] ?? '') . ', ' . ($_POST['address'] ?? '');

        Database::beginTransaction();

        try {
            $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));

            $fullName = trim(($_POST['first_name'] ?? '') . ' ' . ($_POST['last_name'] ?? ''));
            $orderId = Order::create([
                'user_id'          => Auth::id(),
                'order_number'     => $orderNumber,
                'total'            => $total,
                'subtotal'         => $subtotal,
                'status'           => 'pending',
                'shipping_name'    => $fullName,
                'shipping_phone'   => $_POST['phone'] ?? '',
                'shipping_address' => $address,
                'billing_address'  => $address,
                'governorate_id'   => (int)$_POST['governorate_id'],
                'shipping_fee'     => $shippingFee,
                'phone'            => $_POST['phone'] ?? '',
                'delivery_notes'   => $_POST['delivery_notes'] ?? '',
                'payment_method'   => 'cod',
                'payment_status'   => 'pending',
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

            Database::query("INSERT INTO order_status_history (order_id, from_status, to_status, created_by) VALUES (?, NULL, 'pending', ?)", [$orderId, Auth::id()]);

            Database::commit();
            unset($_SESSION['cart']);

            $user = Auth::user();
            $body = '<p>Hi ' . e($user['name']) . ',</p><p>Your order <strong>#' . e($orderNumber) . '</strong> has been placed successfully.</p>';
            $body .= '<p>Total: ' . formatPrice($total) . '</p>';
            $body .= '<p>Payment: Cash on Delivery</p>';
            $body .= '<p>We will notify you when your order ships.</p>';
            send_mail($user['email'], 'Order Confirmation - ' . e($orderNumber), $body);

            $this->withSuccess('Order placed successfully!');
            $this->redirect('/account/orders/' . $orderId);
        } catch (\Exception $e) {
            Database::rollback();
            $this->withErrors(['general' => ['Failed to place order. Please try again.']]);
            $this->redirectBack();
        }
    }
}

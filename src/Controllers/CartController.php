<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;

class CartController extends Controller
{
    public function index(): void
    {
        $cart = $_SESSION['cart'] ?? [];
        $total = 0;
        $count = 0;

        foreach ($cart as &$item) {
            $item['subtotal'] = $item['price'] * $item['quantity'];
            $total += $item['subtotal'];
            $count += $item['quantity'];
        }
        unset($item);

        $this->view('front/cart', [
            'cart'   => $cart,
            'total'  => $total,
            'count'  => $count,
        ]);
    }

    public function add(): void
    {
        $productId = (int) ($_POST['product_id'] ?? 0);
        $quantity = max(1, (int) ($_POST['quantity'] ?? 1));

        if ($productId <= 0) {
            $this->json(['error' => 'Invalid product'], 400);
            return;
        }

        $product = Product::find($productId);
        if (!$product || $product['status'] !== 'active') {
            $this->json(['error' => 'Product not found'], 404);
            return;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ((int) $item['product_id'] === $productId) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        unset($item);

        if (!$found) {
            $_SESSION['cart'][] = [
                'product_id' => $product['id'],
                'name'       => $product['name'],
                'slug'       => $product['slug'],
                'price'      => (float) $product['price'],
                'image'      => $product['image'] ?? '',
                'quantity'   => $quantity,
            ];
        }

        $cartCount = array_sum(array_column($_SESSION['cart'], 'quantity'));

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            $this->json(['success' => true, 'cart_count' => $cartCount]);
        }

        $this->withSuccess($product['name'] . ' added to cart.');
        $this->redirectBack();
    }

    public function update(): void
    {
        $productId = (int) ($_POST['product_id'] ?? 0);
        $quantity = max(0, (int) ($_POST['quantity'] ?? 0));

        if (!isset($_SESSION['cart'])) {
            $this->redirect('/cart');
            return;
        }

        foreach ($_SESSION['cart'] as $key => $item) {
            if ((int) $item['product_id'] === $productId) {
                if ($quantity <= 0) {
                    array_splice($_SESSION['cart'], $key, 1);
                } else {
                    $_SESSION['cart'][$key]['quantity'] = $quantity;
                }
                break;
            }
        }

        $this->redirect('/cart');
    }

    public function remove(): void
    {
        $productId = (int) ($_POST['product_id'] ?? 0);

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ((int) $item['product_id'] === $productId) {
                    array_splice($_SESSION['cart'], $key, 1);
                    break;
                }
            }
        }

        $this->redirect('/cart');
    }
}

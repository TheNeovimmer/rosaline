<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\Order;
use App\Models\Wishlist;
use App\Core\Database;
use App\Models\Governorate;

class AccountController extends Controller
{
    public function index(): void
    {
        $user = Auth::user();
        $recentOrders = Order::paginate(1, 5, 'user_id = :user_id', ['user_id' => Auth::id()], 'created_at DESC');
        $wishlistCount = (int) Database::fetch("SELECT COUNT(*) as cnt FROM wishlists WHERE user_id = :user_id", ['user_id' => Auth::id()])['cnt'];

        $this->view('front/account', [
            'user'          => $user,
            'recentOrders'  => $recentOrders['items'],
            'wishlistCount' => $wishlistCount,
        ]);
    }

    public function orders(): void
    {
        $result = Order::paginate(1, 10, 'user_id = :user_id', ['user_id' => Auth::id()], 'created_at DESC');

        $this->view('front/account-orders', [
            'orders'     => $result['items'],
            'pagination' => $result,
        ]);
    }

    public function orderDetail(int $id): void
    {
        $order = Order::getWithItems($id);

        if (!$order || (int) $order['user_id'] !== Auth::id()) {
            $this->redirect('/account/orders');
            return;
        }

        $govName = '';
        if (!empty($order['governorate_id'])) {
            $g = Database::fetch("SELECT name_en FROM governorates WHERE id = ?", [$order['governorate_id']]);
            $govName = $g ? $g['name_en'] : '';
        }
        $order['gov_name'] = $govName;

        $history = Order::getStatusHistory($id);
        $this->view('front/account-order-detail', [
            'order' => $order,
            'history' => $history,
        ]);
    }

    public function wishlist(): void
    {
        $items = Wishlist::getByUser(Auth::id());

        $this->view('front/wishlist', [
            'wishlistItems' => $items,
        ]);
    }

    public function addToWishlist(): void
    {
        $productId = (int) ($_POST['product_id'] ?? 0);
        if ($productId <= 0) {
            $this->json(['error' => 'Invalid product'], 400);
            return;
        }

        $added = Wishlist::toggle(Auth::id(), $productId);

        $this->json(['success' => true, 'added' => $added]);
    }

    public function removeFromWishlist(): void
    {
        $productId = (int) ($_POST['product_id'] ?? 0);
        if ($productId <= 0) {
            $this->redirectBack();
            return;
        }

        Wishlist::deleteWhere('user_id = :user_id AND product_id = :product_id', [
            'user_id'    => Auth::id(),
            'product_id' => $productId,
        ]);

        $this->redirectBack();
    }

    public function settings(): void
    {
        $user = Auth::user();
        $this->view('front/account-settings', ['user' => $user]);
    }

    public function updateSettings(): void
    {
        $errors = $this->validate($_POST, [
            'name'  => 'required|min:2|max:255',
            'email' => 'required|email',
            'phone' => 'max:20',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $data = [
            'name'  => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'] ?? '',
        ];

        if (!empty($_POST['password'])) {
            if (strlen($_POST['password']) < 6) {
                $this->withErrors(['password' => ['Password must be at least 6 characters']]);
                $this->redirectBack();
                return;
            }
            $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }

        \App\Models\User::updateWhere($data, 'id = :id', ['id' => Auth::id()]);
        \App\Core\Session::set('user', \App\Models\User::find(Auth::id()));

        $this->withSuccess('Settings updated successfully.');
        $this->redirect('/account/settings');
    }

    public function addresses(): void
    {
        $addresses = Database::fetchAll("SELECT * FROM addresses WHERE user_id = :uid ORDER BY is_default DESC, created_at DESC", ['uid' => Auth::id()]);
        // Fetch governorate names for display
        foreach ($addresses as &$addr) {
            if (!empty($addr['governorate_id'])) {
                $g = Database::fetch("SELECT name_en FROM governorates WHERE id = ?", [$addr['governorate_id']]);
                $addr['governorate_name'] = $g ? $g['name_en'] : '';
            } else {
                $addr['governorate_name'] = '';
            }
        }
        unset($addr);
        $this->view('front/account-addresses', [
            'addresses'    => $addresses,
            'governorates' => Governorate::getActive(),
        ]);
    }

    public function createAddress(): void
    {
        $errors = $this->validate($_POST, [
            'full_name'     => 'required|min:2|max:255',
            'address_line1' => 'required|min:5|max:255',
        ]);

        if (empty($_POST['governorate_id'])) {
            $errors['governorate_id'][] = 'governorate_id is required';
        }

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $uid = Auth::id();
        $isDefault = !empty($_POST['is_default']) ? 1 : 0;

        if ($isDefault) {
            Database::query("UPDATE addresses SET is_default = 0 WHERE user_id = :uid", ['uid' => $uid]);
        }

        Database::query(
            "INSERT INTO addresses (user_id, label, full_name, phone, address_line1, address_line2, city, governorate_id, country, is_default) VALUES (:uid, :label, :name, :phone, :line1, :line2, :city, :gov, :country, :def)",
            [
                'uid' => $uid, 'label' => $_POST['label'] ?? 'Home',
                'name' => $_POST['full_name'], 'phone' => $_POST['phone'] ?? '',
                'line1' => $_POST['address_line1'], 'line2' => $_POST['address_line2'] ?? '',
                'city' => $_POST['city'] ?? '',
                'gov' => (int)$_POST['governorate_id'],
                'country' => 'TN',
                'def' => $isDefault,
            ]
        );

        $this->withSuccess('Address added successfully.');
        $this->redirect('/account/addresses');
    }

    public function updateAddress(int $id): void
    {
        $addr = Database::fetch("SELECT * FROM addresses WHERE id = :id AND user_id = :uid", ['id' => $id, 'uid' => Auth::id()]);
        if (!$addr) { $this->redirect('/account/addresses'); return; }

        $isDefault = !empty($_POST['is_default']) ? 1 : 0;
        if ($isDefault) {
            Database::query("UPDATE addresses SET is_default = 0 WHERE user_id = :uid", ['uid' => Auth::id()]);
        }

        Database::query(
            "UPDATE addresses SET label=:label, full_name=:name, phone=:phone, address_line1=:line1, address_line2=:line2, city=:city, governorate_id=:gov, country=:country, is_default=:def WHERE id=:id",
            [
                'id' => $id, 'label' => $_POST['label'] ?? 'Home',
                'name' => $_POST['full_name'], 'phone' => $_POST['phone'] ?? '',
                'line1' => $_POST['address_line1'], 'line2' => $_POST['address_line2'] ?? '',
                'city' => $_POST['city'] ?? '',
                'gov' => (int)($_POST['governorate_id'] ?? $addr['governorate_id']),
                'country' => 'TN',
                'def' => $isDefault,
            ]
        );

        $this->withSuccess('Address updated.');
        $this->redirect('/account/addresses');
    }

    public function deleteAddress(int $id): void
    {
        Database::query("DELETE FROM addresses WHERE id = :id AND user_id = :uid", ['id' => $id, 'uid' => Auth::id()]);
        $this->withSuccess('Address deleted.');
        $this->redirect('/account/addresses');
    }

    public function setDefaultAddress(int $id): void
    {
        Database::query("UPDATE addresses SET is_default = 0 WHERE user_id = :uid", ['uid' => Auth::id()]);
        Database::query("UPDATE addresses SET is_default = 1 WHERE id = :id AND user_id = :uid", ['id' => $id, 'uid' => Auth::id()]);
        $this->redirectBack();
    }

    public function cancelOrder(int $id): void
    {
        $order = Database::fetch("SELECT * FROM orders WHERE id = :id AND user_id = :uid", ['id' => $id, 'uid' => Auth::id()]);
        if (!$order || !Order::canTransition($order['status'], 'cancelled')) {
            $this->withError('Order cannot be cancelled.');
            $this->redirectBack();
            return;
        }

        Order::updateStatus($id, 'cancelled', $_POST['reason'] ?? 'Cancelled by customer');
        $this->withSuccess('Order cancelled.');
        $this->redirect('/account/orders/' . $id);
    }

    public function requestReturn(int $id): void
    {
        $order = Database::fetch("SELECT * FROM orders WHERE id = :id AND user_id = :uid", ['id' => $id, 'uid' => Auth::id()]);
        if (!$order || $order['status'] !== 'delivered') {
            $this->withError('Return can only be requested for delivered orders.');
            $this->redirectBack();
            return;
        }

        Order::updateStatus($id, 'return_requested', $_POST['reason'] ?? 'Return requested by customer');
        $this->withSuccess('Return request submitted.');
        $this->redirect('/account/orders/' . $id);
    }

    public function invoice(int $id): void
    {
        $order = Order::getWithItems($id);
        if (!$order || (int) $order['user_id'] !== Auth::id()) {
            $this->redirect('/account/orders');
            return;
        }

        // Fetch governorate name
        $govName = '';
        if (!empty($order['governorate_id'])) {
            $g = Database::fetch("SELECT name_en FROM governorates WHERE id = ?", [$order['governorate_id']]);
            $govName = $g ? $g['name_en'] : '';
        }

        \App\Core\View::renderPartial('front/invoice', [
            'order' => $order,
            'gov_name' => $govName,
        ]);
    }

    public function payment(): void
    {
        $this->view('front/account-payment');
    }
}

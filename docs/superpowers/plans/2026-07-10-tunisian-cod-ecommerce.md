# Tunisian COD Ecommerce — Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Transform Rosaline into a Tunisia-specific COD ecommerce with TND currency, governorate shipping, 5-stage order flow, printable invoices, and user return requests.

**Architecture:** Single-file PHP app using custom MVC framework. All changes are contained within existing patterns — PDO models, flat PHP views, Router-based routes. No ORM, no JS framework.

**Tech Stack:** PHP 8.1+, MySQL 8+, Bootstrap 5 (admin), custom CSS (frontend)

**Order:** Tasks are ordered by dependency. Each task builds on previous ones. Do not skip ahead.

---

### Task 1: TND Currency + Phone Helper

**Files:**
- Modify: `src/Helpers/functions.php`

- [ ] **Step 1: Update formatPrice() to TND**

```php
function formatPrice($amount): string
{
    return number_format((float)$amount, 3, '.', '') . ' TND';
}
```

- [ ] **Step 2: Add Tunisian phone validation helper**

```php
function isTunisianPhone(string $phone): bool
{
    return (bool)preg_match('/^\+216[2-9]\d{7}$/', $phone);
}
```

- [ ] **Step 3: Add governorate shipping HTML helper**

```php
function governorateDropdown(int $selectedId = 0): string
{
    $db = App\Core\Database::getInstance();
    $rows = $db->query("SELECT id, name_en FROM governorates WHERE is_active = 1 ORDER BY name_en")->fetchAll();
    $html = '<select name="governorate_id" class="style-4" required>';
    $html .= '<option value="">Select governorate</option>';
    foreach ($rows as $row) {
        $sel = (int)$row['id'] === $selectedId ? ' selected' : '';
        $html .= '<option value="' . $row['id'] . '"' . $sel . '>' . htmlspecialchars($row['name_en']) . '</option>';
    }
    $html .= '</select>';
    return $html;
}
```

- [ ] **Step 4: Commit**

```bash
git add src/Helpers/functions.php
git commit -m "feat: TND currency, Tunisian phone validation, governorate dropdown helper"
```

---

### Task 2: Governorates Migration + Model + Seed

**Files:**
- Create: `migrations/006_governorates.sql`
- Create: `seeds/002_governorates.sql`
- Create: `src/Models/Governorate.php`

- [ ] **Step 1: Create migration 006_governorates.sql**

```sql
CREATE TABLE IF NOT EXISTS governorates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_en VARCHAR(100) NOT NULL,
    name_fr VARCHAR(100) NOT NULL,
    shipping_fee DECIMAL(10,3) NOT NULL DEFAULT 0.000,
    region ENUM('north_east','north_west','central_east','central_west','south') NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- [ ] **Step 2: Create seeds/002_governorates.sql**

```sql
INSERT INTO governorates (name_en, name_fr, shipping_fee, region, is_active) VALUES
('Tunis', 'Tunis', 4.000, 'north_east', 1),
('Ariana', 'Ariana', 4.000, 'north_east', 1),
('Ben Arous', 'Ben Arous', 4.000, 'north_east', 1),
('Manouba', 'La Manouba', 4.000, 'north_east', 1),
('Bizerte', 'Bizerte', 4.000, 'north_east', 1),
('Nabeul', 'Nabeul', 4.000, 'north_east', 1),
('Zaghouan', 'Zaghouan', 4.000, 'north_east', 1),
('Beja', 'Béja', 8.000, 'north_west', 1),
('Jendouba', 'Jendouba', 8.000, 'north_west', 1),
('El Kef', 'Le Kef', 8.000, 'north_west', 1),
('Siliana', 'Siliana', 8.000, 'north_west', 1),
('Sousse', 'Sousse', 5.000, 'central_east', 1),
('Monastir', 'Monastir', 5.000, 'central_east', 1),
('Mahdia', 'Mahdia', 5.000, 'central_east', 1),
('Sfax', 'Sfax', 5.000, 'central_east', 1),
('Kairouan', 'Kairouan', 5.000, 'central_east', 1),
('Kasserine', 'Kasserine', 8.000, 'central_west', 1),
('Sidi Bouzid', 'Sidi Bouzid', 8.000, 'central_west', 1),
('Gabes', 'Gabès', 10.000, 'south', 1),
('Medenine', 'Médenine', 10.000, 'south', 1),
('Tataouine', 'Tataouine', 12.000, 'south', 1),
('Kebili', 'Kébili', 12.000, 'south', 1),
('Tozeur', 'Tozeur', 12.000, 'south', 1),
('Gafsa', 'Gafsa', 10.000, 'south', 1);
```

- [ ] **Step 3: Create src/Models/Governorate.php**

```php
<?php
namespace App\Models;

use App\Core\Model;

class Governorate extends Model
{
    protected static string $table = 'governorates';

    public static function getActive(): array
    {
        $db = self::getDB();
        return $db->query("SELECT * FROM governorates WHERE is_active = 1 ORDER BY name_en")->fetchAll();
    }

    public static function getShippingFee(int $id): float
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT shipping_fee FROM governorates WHERE id = ?");
        $stmt->execute([$id]);
        return (float)($stmt->fetchColumn() ?: 0);
    }
}
```

- [ ] **Step 4: Commit**

```bash
git add migrations/006_governorates.sql seeds/002_governorates.sql src/Models/Governorate.php
git commit -m "feat: governorates migration, seed data, and model"
```

---

### Task 3: Low Stock Threshold Migration

**Files:**
- Create: `migrations/007_products_add_low_stock.sql`

- [ ] **Step 1: Create migration**

```sql
ALTER TABLE products ADD COLUMN low_stock_threshold INT NOT NULL DEFAULT 5;
```

- [ ] **Step 2: Commit**

```bash
git add migrations/007_products_add_low_stock.sql
git commit -m "feat: add low_stock_threshold column to products"
```

---

### Task 4: Address + Order Shipping Migrations

**Files:**
- Create: `migrations/008_addresses_add_governorate.sql`
- Create: `migrations/009_orders_add_shipping.sql`

- [ ] **Step 1: Create 008_addresses_add_governorate.sql**

```sql
ALTER TABLE addresses ADD COLUMN governorate_id INT DEFAULT NULL AFTER state;
ALTER TABLE addresses ADD COLUMN phone VARCHAR(20) DEFAULT NULL AFTER governorate_id;
ALTER TABLE addresses ADD FOREIGN KEY (governorate_id) REFERENCES governorates(id) ON DELETE SET NULL;
```

- [ ] **Step 2: Create 009_orders_add_shipping.sql**

```sql
ALTER TABLE orders ADD COLUMN governorate_id INT DEFAULT NULL AFTER shipping_address;
ALTER TABLE orders ADD COLUMN shipping_fee DECIMAL(10,3) NOT NULL DEFAULT 0.000 AFTER total;
ALTER TABLE orders ADD COLUMN delivery_notes TEXT DEFAULT NULL AFTER shipping_fee;
ALTER TABLE orders ADD COLUMN phone VARCHAR(20) DEFAULT NULL AFTER delivery_notes;
ALTER TABLE orders ADD FOREIGN KEY (governorate_id) REFERENCES governorates(id) ON DELETE SET NULL;
```

- [ ] **Step 3: Commit**

```bash
git add migrations/008_addresses_add_governorate.sql migrations/009_orders_add_shipping.sql
git commit -m "feat: add governorate and phone fields to addresses and orders tables"
```

---

### Task 5: Order Status History Migration

**Files:**
- Create: `migrations/010_order_status_history.sql`

- [ ] **Step 1: Create migration**

```sql
CREATE TABLE IF NOT EXISTS order_status_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    from_status VARCHAR(50) DEFAULT NULL,
    to_status VARCHAR(50) NOT NULL,
    note TEXT DEFAULT NULL,
    created_by INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE orders MODIFY COLUMN status ENUM('pending','confirmed','processing','shipped','delivered','cancelled','return_requested','returned') NOT NULL DEFAULT 'pending';
```

- [ ] **Step 2: Commit**

```bash
git add migrations/010_order_status_history.sql
git commit -m "feat: order_status_history table and updated order status enum"
```

---

### Task 6: Admin Governorates CRUD

**Files:**
- Create: `src/Controllers/Admin/GovernorateController.php`
- Create: `views/admin/governorates/index.php`
- Create: `views/admin/governorates/create.php`
- Create: `views/admin/governorates/edit.php`

- [ ] **Step 1: Create GovernorateController.php**

```php
<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Governorate;

class GovernorateController extends Controller
{
    public function index(): void
    {
        $db = \App\Core\Database::getInstance();
        $governorates = $db->query("SELECT * FROM governorates ORDER BY name_en")->fetchAll();
        $this->render('admin/governorates/index', ['governorates' => $governorates]);
    }

    public function create(): void
    {
        $this->render('admin/governorates/create');
    }

    public function store(): void
    {
        $data = $_POST;
        $db = \App\Core\Database::getInstance();
        $stmt = $db->prepare("INSERT INTO governorates (name_en, name_fr, shipping_fee, region) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['name_en'], $data['name_fr'], $data['shipping_fee'], $data['region']]);
        $_SESSION['flash'] = ['success' => 'Governorate created.'];
        $this->redirect('/admin/governorates');
    }

    public function edit(int $id): void
    {
        $db = \App\Core\Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM governorates WHERE id = ?");
        $stmt->execute([$id]);
        $gov = $stmt->fetch();
        if (!$gov) {
            $_SESSION['flash'] = ['error' => 'Governorate not found.'];
            $this->redirect('/admin/governorates');
        }
        $this->render('admin/governorates/edit', ['gov' => $gov]);
    }

    public function update(int $id): void
    {
        $data = $_POST;
        $db = \App\Core\Database::getInstance();
        $stmt = $db->prepare("UPDATE governorates SET name_en=?, name_fr=?, shipping_fee=?, region=?, is_active=? WHERE id=?");
        $stmt->execute([$data['name_en'], $data['name_fr'], $data['shipping_fee'], $data['region'], $data['is_active'] ?? 0, $id]);
        $_SESSION['flash'] = ['success' => 'Governorate updated.'];
        $this->redirect('/admin/governorates');
    }

    public function destroy(int $id): void
    {
        $db = \App\Core\Database::getInstance();
        $db->prepare("DELETE FROM governorates WHERE id = ?")->execute([$id]);
        $_SESSION['flash'] = ['success' => 'Governorate deleted.'];
        $this->redirect('/admin/governorates');
    }
}
```

- [ ] **Step 2: Create views/admin/governorates/index.php**

```php
<?php $title = 'Governorates'; ob_start() ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Governorates</h5>
        <a href="<?= url('admin/governorates/create') ?>" class="btn btn-primary btn-sm">+ Add</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead><tr><th>Name</th><th>Region</th><th>Shipping Fee</th><th>Active</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($data['governorates'] as $g): ?>
                <tr>
                    <td><?= e($g['name_en']) ?></td>
                    <td><?= e($g['region']) ?></td>
                    <td><?= formatPrice($g['shipping_fee']) ?></td>
                    <td><?= $g['is_active'] ? 'Yes' : 'No' ?></td>
                    <td>
                        <a href="<?= url('admin/governorates/' . $g['id'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form method="post" action="<?= url('admin/governorates/' . $g['id'] . '/delete') ?>" style="display:inline">
                            <?= csrf_field() ?>
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); require __DIR__ . '/../../layouts/admin.php'; ?>
```

- [ ] **Step 3: Create views/admin/governorates/create.php**

```php
<?php $title = 'Add Governorate'; ob_start() ?>
<div class="card">
    <div class="card-header"><h5>Add Governorate</h5></div>
    <div class="card-body">
        <form method="post" action="<?= url('admin/governorates/create') ?>">
            <?= csrf_field() ?>
            <div class="mb-3"><label class="form-label">Name (English)</label><input name="name_en" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Name (French)</label><input name="name_fr" class="form-control" required></div>
            <div class="mb-3">
                <label class="form-label">Region</label>
                <select name="region" class="form-select" required>
                    <option value="north_east">North East</option>
                    <option value="north_west">North West</option>
                    <option value="central_east">Central East</option>
                    <option value="central_west">Central West</option>
                    <option value="south">South</option>
                </select>
            </div>
            <div class="mb-3"><label class="form-label">Shipping Fee (TND)</label><input name="shipping_fee" type="number" step="0.001" class="form-control" required></div>
            <button class="btn btn-primary">Save</button>
            <a href="<?= url('admin/governorates') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); require __DIR__ . '/../../layouts/admin.php'; ?>
```

- [ ] **Step 4: Create views/admin/governorates/edit.php**

```php
<?php $title = 'Edit Governorate'; ob_start() ?>
<div class="card">
    <div class="card-header"><h5>Edit Governorate</h5></div>
    <div class="card-body">
        <form method="post" action="<?= url('admin/governorates/' . $data['gov']['id'] . '/edit') ?>">
            <?= csrf_field() ?>
            <div class="mb-3"><label class="form-label">Name (English)</label><input name="name_en" class="form-control" value="<?= e($data['gov']['name_en']) ?>" required></div>
            <div class="mb-3"><label class="form-label">Name (French)</label><input name="name_fr" class="form-control" value="<?= e($data['gov']['name_fr']) ?>" required></div>
            <div class="mb-3">
                <label class="form-label">Region</label>
                <select name="region" class="form-select" required>
                    <?php foreach (['north_east'=>'North East','north_west'=>'North West','central_east'=>'Central East','central_west'=>'Central West','south'=>'South'] as $val => $label): ?>
                    <option value="<?= $val ?>" <?= $data['gov']['region'] === $val ? 'selected' : '' ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3"><label class="form-label">Shipping Fee (TND)</label><input name="shipping_fee" type="number" step="0.001" class="form-control" value="<?= e($data['gov']['shipping_fee']) ?>" required></div>
            <div class="mb-3 form-check"><input type="hidden" name="is_active" value="0"><input type="checkbox" name="is_active" value="1" class="form-check-input" id="active" <?= $data['gov']['is_active'] ? 'checked' : '' ?>><label class="form-check-label" for="active">Active</label></div>
            <button class="btn btn-primary">Update</button>
            <a href="<?= url('admin/governorates') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); require __DIR__ . '/../../layouts/admin.php'; ?>
```

- [ ] **Step 5: Add routes**

Add to routes/web.php inside the admin group:

```php
$router->get('/admin/governorates', ['App\Controllers\Admin\GovernorateController', 'index']);
$router->get('/admin/governorates/create', ['App\Controllers\Admin\GovernorateController', 'create']);
$router->post('/admin/governorates/create', ['App\Controllers\Admin\GovernorateController', 'store']);
$router->get('/admin/governorates/{id}/edit', ['App\Controllers\Admin\GovernorateController', 'edit']);
$router->post('/admin/governorates/{id}/edit', ['App\Controllers\Admin\GovernorateController', 'update']);
$router->post('/admin/governorates/{id}/delete', ['App\Controllers\Admin\GovernorateController', 'destroy']);
```

- [ ] **Step 6: Commit**

```bash
git add src/Controllers/Admin/GovernorateController.php views/admin/governorates/ routes/web.php
git commit -m "feat: admin governorates CRUD"
```

---

### Task 7: Checkout with Governorates, Shipping, Phone

**Files:**
- Modify: `src/Controllers/CheckoutController.php`
- Modify: `views/front/checkout.php`
- Modify: `src/Models/Order.php`

- [ ] **Step 1: Update CheckoutController::index() to pass governorates**

```php
$governorates = \App\Models\Governorate::getActive();
$this->render('front/checkout', [
    'cart' => $cart,
    'total' => $total,
    'cod' => $cod,
    'governorates' => $governorates,
]);
```

- [ ] **Step 2: Update CheckoutController::place() to validate governorate + phone + calc shipping**

```php
public function place(): void
{
    $cart = $this->getCart();
    if (empty($cart)) {
        $_SESSION['flash'] = ['error' => 'Your cart is empty.'];
        $this->redirect('/cart');
    }

    $data = $_POST;

    if (empty($data['governorate_id'])) {
        $_SESSION['flash'] = ['error' => 'Please select a governorate.'];
        $this->redirect('/checkout');
    }

    if (!empty($data['phone']) && !isTunisianPhone($data['phone'])) {
        $_SESSION['flash'] = ['error' => 'Please enter a valid Tunisian phone number (+216XXXXXXXX).'];
        $this->redirect('/checkout');
    }

    $shippingFee = \App\Models\Governorate::getShippingFee((int)$data['governorate_id']);
    $freeShippingThreshold = \App\Models\Setting::get('free_shipping_threshold', 200);
    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    if ($subtotal >= (float)$freeShippingThreshold) {
        $shippingFee = 0;
    }

    $total = $subtotal + $shippingFee;
    // COD validation
    $cod = \App\Models\Setting::getCodSettings();
    if (!($cod['enabled'] ?? false)) {
        $_SESSION['flash'] = ['error' => 'COD is not available.'];
        $this->redirect('/checkout');
    }
    if (isset($cod['min_amount']) && $total < (float)$cod['min_amount']) {
        $_SESSION['flash'] = ['error' => 'Minimum order amount for COD is ' . formatPrice($cod['min_amount'])];
        $this->redirect('/checkout');
    }
    if (isset($cod['max_amount']) && $total > (float)$cod['max_amount']) {
        $_SESSION['flash'] = ['error' => 'Maximum order amount for COD is ' . formatPrice($cod['max_amount'])];
        $this->redirect('/checkout');
    }

    $userId = $_SESSION['user_id'] ?? null;
    $db = \App\Core\Database::getInstance();

    try {
        $db->beginTransaction();

        $stmt = $db->prepare("INSERT INTO orders (user_id, shipping_address, governorate_id, phone, shipping_fee, total, delivery_notes, status, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', 'cod')");
        $stmt->execute([
            $userId,
            $data['address'] ?? '',
            (int)$data['governorate_id'],
            $data['phone'] ?? null,
            $shippingFee,
            $total,
            $data['delivery_notes'] ?? null,
        ]);
        $orderId = (int)$db->lastInsertId();

        foreach ($cart as $item) {
            $subtotalItem = $item['price'] * $item['quantity'];
            $stmt = $db->prepare("INSERT INTO order_items (order_id, product_id, product_name, price, quantity, subtotal) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$orderId, $item['product_id'], $item['name'], $item['price'], $item['quantity'], $subtotalItem]);

            $db->prepare("UPDATE products SET stock_quantity = stock_quantity - ? WHERE id = ? AND stock_quantity >= ?")
               ->execute([$item['quantity'], $item['product_id'], $item['quantity']]);
        }

        // Record initial status
        $stmt = $db->prepare("INSERT INTO order_status_history (order_id, from_status, to_status, created_by) VALUES (?, NULL, 'pending', ?)");
        $stmt->execute([$orderId, $userId]);

        $db->commit();

        unset($_SESSION['cart']);

        send_mail($data['email'] ?? '', 'Order Confirmed', 'Your order #' . $orderId . ' has been placed successfully.');

        $_SESSION['flash'] = ['success' => 'Order placed successfully!'];
        $this->redirect('/account/orders/' . $orderId);
    } catch (\Exception $e) {
        $db->rollBack();
        $_SESSION['flash'] = ['error' => 'Failed to place order: ' . $e->getMessage()];
        $this->redirect('/checkout');
    }
}
```

- [ ] **Step 3: Update checkout.php — replace state field with governorate dropdown, add phone, delivery notes**

Replace the shipping address section to include governorate + phone:

```php
<fieldset class="tf-field">
    <label class="text-body-xs">Phone Number</label>
    <input class="style-4" type="tel" name="phone" placeholder="+216 XX XXX XXX" pattern="^\+216[2-9]\d{7}$" title="+216 followed by 8 digits" required>
</fieldset>
<fieldset class="tf-field">
    <label class="text-body-xs">Governorate</label>
    <select name="governorate_id" class="style-4" required>
        <option value="">Select governorate</option>
        <?php foreach ($data['governorates'] as $g): ?>
        <option value="<?= $g['id'] ?>"><?= e($g['name_en']) ?></option>
        <?php endforeach; ?>
    </select>
</fieldset>
<fieldset class="tf-field">
    <label class="text-body-xs">Delivery Notes (optional)</label>
    <textarea class="style-4" name="delivery_notes" rows="2" placeholder="e.g. Leave at the door"></textarea>
</fieldset>
```

And remove the existing state/zip fields if they exist.

- [ ] **Step 4: Commit**

```bash
git add src/Controllers/CheckoutController.php views/front/checkout.php src/Models/Order.php
git commit -m "feat: COD checkout with governorates, shipping fee, phone validation"
```

---

### Task 8: Account Addresses with Governorates

**Files:**
- Modify: `views/front/account-addresses.php`
- Modify: `src/Controllers/AccountController.php`

- [ ] **Step 1: Update addresses() view to pass governorates**

```php
$governorates = \App\Models\Governorate::getActive();
// pass to view
```

- [ ] **Step 2: In account-addresses.php, replace state field with governorate dropdown**

Find the state/region input and replace:

```php
<div class="col-md-6">
    <fieldset class="tf-field">
        <label class="text-body-xs">Governorate</label>
        <select name="governorate_id" class="style-4" required>
            <option value="">Select governorate</option>
            <?php foreach ($data['governorates'] as $g): ?>
            <option value="<?= $g['id'] ?>" <?= (isset($data['address']) && $data['address']['governorate_id'] == $g['id']) ? 'selected' : '' ?>><?= e($g['name_en']) ?></option>
            <?php endforeach; ?>
        </select>
    </fieldset>
</div>
```

- [ ] **Step 3: Validate governorate_id on address create/update in AccountController**

```php
if (empty($data['governorate_id'])) {
    $_SESSION['flash'] = ['error' => 'Please select a governorate.'];
    $this->redirect('/account/addresses');
}
```

- [ ] **Step 4: Commit**

```bash
git add views/front/account-addresses.php src/Controllers/AccountController.php
git commit -m "feat: governorate dropdown in account addresses"
```

---

### Task 9: 5-Stage Order Status — Order Model + Admin Controller

**Files:**
- Modify: `src/Models/Order.php`
- Modify: `src/Controllers/Admin/OrderController.php`

- [ ] **Step 1: Add status transition validation + history logging to Order model**

```php
<?php
namespace App\Models;

use App\Core\Model;

class Order extends Model
{
    protected static string $table = 'orders';

    public static array $validTransitions = [
        'pending' => ['confirmed', 'cancelled'],
        'confirmed' => ['processing', 'cancelled'],
        'processing' => ['shipped', 'cancelled'],
        'shipped' => ['delivered', 'cancelled'],
        'delivered' => ['return_requested'],
        'return_requested' => ['returned', 'delivered'],
    ];

    public static function canTransition(string $from, string $to): bool
    {
        return isset(self::$validTransitions[$from]) && in_array($to, self::$validTransitions[$from], true);
    }

    public static function updateStatus(int $orderId, string $newStatus, ?string $note = null, ?int $userId = null): bool
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT status FROM orders WHERE id = ?");
        $stmt->execute([$orderId]);
        $order = $stmt->fetch();

        if (!$order || !self::canTransition($order['status'], $newStatus)) {
            return false;
        }

        $oldStatus = $order['status'];

        // Stock restitution on cancellation
        if ($newStatus === 'cancelled' && $oldStatus !== 'cancelled') {
            $items = $db->prepare("SELECT product_id, quantity FROM order_items WHERE order_id = ?");
            $items->execute([$orderId]);
            foreach ($items as $item) {
                $db->prepare("UPDATE products SET stock_quantity = stock_quantity + ? WHERE id = ?")
                   ->execute([$item['quantity'], $item['product_id']]);
            }
        }

        $db->prepare("UPDATE orders SET status = ? WHERE id = ?")->execute([$newStatus, $orderId]);
        $db->prepare("INSERT INTO order_status_history (order_id, from_status, to_status, note, created_by) VALUES (?, ?, ?, ?, ?)")
           ->execute([$orderId, $oldStatus, $newStatus, $note, $userId]);

        return true;
    }

    public static function getStatusHistory(int $orderId): array
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT osh.*, u.name as created_by_name
            FROM order_status_history osh
            LEFT JOIN users u ON osh.created_by = u.id
            WHERE osh.order_id = ?
            ORDER BY osh.created_at ASC");
        $stmt->execute([$orderId]);
        return $stmt->fetchAll();
    }

    public static function getOrdersByStatus(string $status): array
    {
        $db = self::getDB();
        $stmt = $db->prepare("SELECT * FROM orders WHERE status = ? ORDER BY created_at DESC");
        $stmt->execute([$status]);
        return $stmt->fetchAll();
    }
}
```

- [ ] **Step 2: Update Admin OrderController::show() to pass history**

```php
public function show(int $id): void
{
    $db = \App\Core\Database::getInstance();
    $stmt = $db->prepare("SELECT o.*, u.name as user_name, u.email as user_email FROM orders o LEFT JOIN users u ON o.user_id = u.id WHERE o.id = ?");
    $stmt->execute([$id]);
    $order = $stmt->fetch();
    if (!$order) {
        $_SESSION['flash'] = ['error' => 'Order not found.'];
        $this->redirect('/admin/orders');
    }
    $items = $db->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $items->execute([$id]);
    $history = \App\Models\Order::getStatusHistory($id);
    $governorates = \App\Models\Governorate::getActive();
    $this->render('admin/orders/show', [
        'order' => $order,
        'items' => $items->fetchAll(),
        'history' => $history,
        'governorates' => $governorates,
    ]);
}
```

- [ ] **Step 3: Update Admin OrderController::updateStatus() to use Order model**

```php
public function updateStatus(int $id): void
{
    $newStatus = $_POST['status'] ?? '';
    $note = $_POST['note'] ?? '';
    $adminId = $_SESSION['user_id'] ?? null;

    if (\App\Models\Order::updateStatus($id, $newStatus, $note, $adminId)) {
        $_SESSION['flash'] = ['success' => 'Order status updated.'];
    } else {
        $_SESSION['flash'] = ['error' => 'Invalid status transition.'];
    }
    $this->redirect('/admin/orders/' . $id);
}
```

- [ ] **Step 4: Commit**

```bash
git add src/Models/Order.php src/Controllers/Admin/OrderController.php
git commit -m "feat: 5-stage order status with transition validation and history"
```

---

### Task 10: Admin Order Show View — Timeline + Invoice Button

**Files:**
- Modify: `views/admin/orders/show.php`
- Modify: `views/admin/orders/index.php`

- [ ] **Step 1: Add status timeline + invoice button to admin/orders/show.php**

After the order details section, add:

```php
<div class="card mt-3">
    <div class="card-header d-flex justify-content-between">
        <h5>Status Timeline</h5>
        <a href="<?= url('admin/orders/' . $data['order']['id'] . '/invoice') ?>" class="btn btn-sm btn-outline-primary" target="_blank">Print Invoice</a>
    </div>
    <div class="card-body">
        <ul class="timeline">
        <?php foreach ($data['history'] as $h): ?>
            <li>
                <strong><?= ucfirst(e($h['to_status'])) ?></strong>
                <span class="text-muted ms-2"><?= date('d/m/Y H:i', strtotime($h['created_at'])) ?></span>
                <?php if ($h['created_by_name']): ?>
                <span class="text-muted">by <?= e($h['created_by_name']) ?></span>
                <?php endif; ?>
                <?php if ($h['note']): ?>
                <p class="mb-0"><?= e($h['note']) ?></p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>
```

- [ ] **Step 2: In admin/orders/show.php, display governorate + shipping fee**

```php
<?php if (!empty($data['order']['governorate_id'])): ?>
<?php
$govStmt = \App\Core\Database::getInstance()->prepare("SELECT name_en FROM governorates WHERE id = ?");
$govStmt->execute([$data['order']['governorate_id']]);
$govName = $govStmt->fetchColumn();
?>
<p><strong>Governorate:</strong> <?= e($govName ?: 'Unknown') ?></p>
<p><strong>Shipping Fee:</strong> <?= formatPrice($data['order']['shipping_fee']) ?></p>
<p><strong>Phone:</strong> <?= e($data['order']['phone'] ?? '-') ?></p>
<?php endif; ?>
```

- [ ] **Step 3: Update admin/orders/index.php — add status filter + governorate filter**

```php
<form method="get" class="row g-3 mb-3">
    <div class="col-auto">
        <select name="status" class="form-select">
            <option value="">All Statuses</option>
            <option value="pending" <?= ($_GET['status'] ?? '') === 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="confirmed" <?= ($_GET['status'] ?? '') === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
            <option value="processing" <?= ($_GET['status'] ?? '') === 'processing' ? 'selected' : '' ?>>Processing</option>
            <option value="shipped" <?= ($_GET['status'] ?? '') === 'shipped' ? 'selected' : '' ?>>Shipped</option>
            <option value="delivered" <?= ($_GET['status'] ?? '') === 'delivered' ? 'selected' : '' ?>>Delivered</option>
            <option value="cancelled" <?= ($_GET['status'] ?? '') === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
            <option value="return_requested" <?= ($_GET['status'] ?? '') === 'return_requested' ? 'selected' : '' ?>>Return Requested</option>
            <option value="returned" <?= ($_GET['status'] ?? '') === 'returned' ? 'selected' : '' ?>>Returned</option>
        </select>
    </div>
    <div class="col-auto">
        <select name="governorate_id" class="form-select">
            <option value="">All Governorates</option>
            <?php foreach (\App\Models\Governorate::getActive() as $g): ?>
            <option value="<?= $g['id'] ?>" <?= ($_GET['governorate_id'] ?? '') == $g['id'] ? 'selected' : '' ?>><?= e($g['name_en']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-auto">
        <button class="btn btn-primary">Filter</button>
    </div>
</form>
```

Update OrderController::index() query to apply filters:

```php
$sql = "SELECT o.*, u.name as user_name FROM orders o LEFT JOIN users u ON o.user_id = u.id WHERE 1=1";
$params = [];
if (!empty($_GET['status'])) {
    $sql .= " AND o.status = ?";
    $params[] = $_GET['status'];
}
if (!empty($_GET['governorate_id'])) {
    $sql .= " AND o.governorate_id = ?";
    $params[] = (int)$_GET['governorate_id'];
}
$sql .= " ORDER BY o.created_at DESC";
$stmt = $db->prepare($sql);
$stmt->execute($params);
$orders = $stmt->fetchAll();
```

- [ ] **Step 4: Commit**

```bash
git add views/admin/orders/show.php views/admin/orders/index.php
git commit -m "feat: order status timeline, governorate display, order filters"
```

---

### Task 11: User Account — Cancel, Return Request, Invoice

**Files:**
- Modify: `src/Controllers/AccountController.php`
- Modify: `views/front/account-order-detail.php`
- Create: `views/front/invoice.php`

- [ ] **Step 1: Add cancel/return/invoice methods to AccountController**

```php
public function cancelOrder(int $id): void
{
    $userId = $_SESSION['user_id'];
    $db = \App\Core\Database::getInstance();
    $stmt = $db->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $userId]);
    $order = $stmt->fetch();

    if (!$order || !in_array($order['status'], ['pending', 'confirmed'], true)) {
        $_SESSION['flash'] = ['error' => 'This order cannot be cancelled.'];
        $this->redirect('/account/orders/' . $id);
    }

    if (\App\Models\Order::updateStatus($id, 'cancelled', 'Cancelled by customer', $userId)) {
        $_SESSION['flash'] = ['success' => 'Order cancelled.'];
    } else {
        $_SESSION['flash'] = ['error' => 'Could not cancel order.'];
    }
    $this->redirect('/account/orders/' . $id);
}

public function requestReturn(int $id): void
{
    $userId = $_SESSION['user_id'];
    $db = \App\Core\Database::getInstance();
    $stmt = $db->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $userId]);
    $order = $stmt->fetch();

    if (!$order || $order['status'] !== 'delivered') {
        $_SESSION['flash'] = ['error' => 'Only delivered orders can be returned.'];
        $this->redirect('/account/orders/' . $id);
    }

    $daysSinceDelivery = (time() - strtotime($order['updated_at'])) / 86400;
    if ($daysSinceDelivery > 7) {
        $_SESSION['flash'] = ['error' => 'Return window is 7 days from delivery.'];
        $this->redirect('/account/orders/' . $id);
    }

    if (\App\Models\Order::updateStatus($id, 'return_requested', 'Return requested by customer', $userId)) {
        $_SESSION['flash'] = ['success' => 'Return request submitted.'];
    } else {
        $_SESSION['flash'] = ['error' => 'Could not submit return request.'];
    }
    $this->redirect('/account/orders/' . $id);
}

public function invoice(int $id): void
{
    $userId = $_SESSION['user_id'];
    $db = \App\Core\Database::getInstance();
    $stmt = $db->prepare("SELECT o.*, u.name as user_name, u.email as user_email FROM orders o LEFT JOIN users u ON o.user_id = u.id WHERE o.id = ? AND o.user_id = ?");
    $stmt->execute([$id, $userId]);
    $order = $stmt->fetch();

    if (!$order) {
        $_SESSION['flash'] = ['error' => 'Order not found.'];
        $this->redirect('/account/orders');
    }

    $items = $db->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $items->execute([$id]);

    $this->render('front/invoice', [
        'order' => $order,
        'items' => $items->fetchAll(),
    ], false); // no layout — standalone print page
}
```

- [ ] **Step 2: Create printable invoice view**

```php
<!DOCTYPE html>
<html><head>
<title>Invoice #<?= $data['order']['id'] ?></title>
<style>
body { font-family: Arial, sans-serif; margin: 40px; color: #333; }
.invoice-header { display: flex; justify-content: space-between; margin-bottom: 40px; }
table { width: 100%; border-collapse: collapse; margin: 20px 0; }
th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
th { background: #f5f5f5; }
.total-row td { font-weight: bold; }
.status { padding: 4px 12px; border-radius: 4px; font-size: 14px; }
@media print { body { margin: 0; } .no-print { display: none; } }
</style>
</head><body>
<div class="no-print" style="margin-bottom:20px"><button onclick="window.print()">Print</button></div>
<div class="invoice-header">
    <div>
        <h1>INVOICE</h1>
        <p><strong>Rosaline</strong></p>
    </div>
    <div style="text-align:right">
        <p><strong>Invoice #<?= $data['order']['id'] ?></strong></p>
        <p>Date: <?= date('d/m/Y', strtotime($data['order']['created_at'])) ?></p>
        <p>Status: <?= ucfirst($data['order']['status']) ?></p>
    </div>
</div>
<div style="margin-bottom:20px">
    <p><strong>Customer:</strong> <?= e($data['order']['user_name'] ?: 'Guest') ?></p>
    <p><strong>Email:</strong> <?= e($data['order']['user_email'] ?? '-') ?></p>
    <p><strong>Phone:</strong> <?= e($data['order']['phone'] ?? '-') ?></p>
    <p><strong>Address:</strong> <?= nl2br(e($data['order']['shipping_address'] ?? '-')) ?></p>
</div>
<table>
    <thead><tr><th>Product</th><th>Price</th><th>Qty</th><th>Subtotal</th></tr></thead>
    <tbody>
        <?php foreach ($data['items'] as $item): ?>
        <tr>
            <td><?= e($item['product_name']) ?></td>
            <td><?= formatPrice($item['price']) ?></td>
            <td><?= (int)$item['quantity'] ?></td>
            <td><?= formatPrice($item['subtotal']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr class="total-row"><td colspan="3" style="text-align:right">Shipping</td><td><?= formatPrice($data['order']['shipping_fee']) ?></td></tr>
        <tr class="total-row"><td colspan="3" style="text-align:right">Total</td><td><?= formatPrice($data['order']['total']) ?></td></tr>
    </tfoot>
</table>
<p><strong>Payment Method:</strong> Cash on Delivery</p>
<?php if ($data['order']['delivery_notes']): ?>
<p><strong>Delivery Notes:</strong> <?= e($data['order']['delivery_notes']) ?></p>
<?php endif; ?>
</body></html>
```

- [ ] **Step 3: Add cancel/return buttons + status timeline + invoice link to account-order-detail.php**

```php
<?php
$history = \App\Models\Order::getStatusHistory($data['order']['id']);
$daysSinceDelivery = $data['order']['status'] === 'delivered' ? (time() - strtotime($data['order']['updated_at'])) / 86400 : 99;
?>

<div class="mb-3">
    <a href="<?= url('account/orders/' . $data['order']['id'] . '/invoice') ?>" class="btn btn-outline-primary btn-sm" target="_blank">Print Invoice</a>
    <?php if (in_array($data['order']['status'], ['pending', 'confirmed'])): ?>
    <form method="post" action="<?= url('account/orders/' . $data['order']['id'] . '/cancel') ?>" style="display:inline">
        <?= csrf_field() ?>
        <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Cancel this order?')">Cancel Order</button>
    </form>
    <?php elseif ($data['order']['status'] === 'delivered' && $daysSinceDelivery <= 7): ?>
    <form method="post" action="<?= url('account/orders/' . $data['order']['id'] . '/return') ?>" style="display:inline">
        <?= csrf_field() ?>
        <button class="btn btn-outline-warning btn-sm" onclick="return confirm('Request return?')">Request Return</button>
    </form>
    <?php endif; ?>
</div>

<?php if (!empty($history)): ?>
<div class="card mt-3">
    <div class="card-header"><h5>Order Timeline</h5></div>
    <div class="card-body">
        <ul class="list-unstyled">
        <?php foreach ($history as $h): ?>
            <li class="mb-2">
                <strong><?= ucfirst(e($h['to_status'])) ?></strong>
                <span class="text-muted ms-2"><?= date('d/m/Y H:i', strtotime($h['created_at'])) ?></span>
                <?php if ($h['note']): ?>
                <p class="mb-0 text-muted"><?= e($h['note']) ?></p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
```

- [ ] **Step 4: Commit**

```bash
git add src/Controllers/AccountController.php views/front/account-order-detail.php views/front/invoice.php
git commit -m "feat: user cancel/return requests and printable invoice"
```

---

### Task 12: Admin Return Requests

**Files:**
- Create: `src/Controllers/Admin/ReturnController.php`
- Create: `views/admin/returns/index.php`

- [ ] **Step 1: Create ReturnController.php**

```php
<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Order;

class ReturnController extends Controller
{
    public function index(): void
    {
        $db = \App\Core\Database::getInstance();
        $orders = $db->query("SELECT o.*, u.name as user_name FROM orders o LEFT JOIN users u ON o.user_id = u.id WHERE o.status = 'return_requested' ORDER BY o.updated_at DESC")->fetchAll();
        $this->render('admin/returns/index', ['orders' => $orders]);
    }

    public function approve(int $id): void
    {
        $adminId = $_SESSION['user_id'] ?? null;
        if (Order::updateStatus($id, 'returned', 'Return approved by admin', $adminId)) {
            $_SESSION['flash'] = ['success' => 'Return approved.'];
        } else {
            $_SESSION['flash'] = ['error' => 'Could not approve return.'];
        }
        $this->redirect('/admin/returns');
    }

    public function reject(int $id): void
    {
        $adminId = $_SESSION['user_id'] ?? null;
        if (Order::updateStatus($id, 'delivered', 'Return rejected by admin', $adminId)) {
            $_SESSION['flash'] = ['success' => 'Return rejected.'];
        } else {
            $_SESSION['flash'] = ['error' => 'Could not reject return.'];
        }
        $this->redirect('/admin/returns');
    }
}
```

- [ ] **Step 2: Create views/admin/returns/index.php**

```php
<?php $title = 'Return Requests'; ob_start() ?>
<div class="card">
    <div class="card-header"><h5>Return Requests</h5></div>
    <div class="card-body">
        <?php if (empty($data['orders'])): ?>
        <p class="text-muted">No return requests.</p>
        <?php else: ?>
        <table class="table table-hover">
            <thead><tr><th>Order #</th><th>Customer</th><th>Total</th><th>Requested</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($data['orders'] as $o): ?>
                <tr>
                    <td><a href="<?= url('admin/orders/' . $o['id']) ?>">#<?= $o['id'] ?></a></td>
                    <td><?= e($o['user_name'] ?? 'Guest') ?></td>
                    <td><?= formatPrice($o['total']) ?></td>
                    <td><?= date('d/m/Y', strtotime($o['updated_at'])) ?></td>
                    <td>
                        <form method="post" action="<?= url('admin/returns/' . $o['id'] . '/approve') ?>" style="display:inline">
                            <?= csrf_field() ?>
                            <button class="btn btn-sm btn-success">Approve</button>
                        </form>
                        <form method="post" action="<?= url('admin/returns/' . $o['id'] . '/reject') ?>" style="display:inline">
                            <?= csrf_field() ?>
                            <button class="btn btn-sm btn-danger">Reject</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
<?php $content = ob_get_clean(); require __DIR__ . '/../../layouts/admin.php'; ?>
```

- [ ] **Step 3: Add routes**

```php
$router->get('/admin/returns', ['App\Controllers\Admin\ReturnController', 'index']);
$router->post('/admin/returns/{id}/approve', ['App\Controllers\Admin\ReturnController', 'approve']);
$router->post('/admin/returns/{id}/reject', ['App\Controllers\Admin\ReturnController', 'reject']);
```

- [ ] **Step 4: Commit**

```bash
git add src/Controllers/Admin/ReturnController.php views/admin/returns/ routes/web.php
git commit -m "feat: admin return request management"
```

---

### Task 13: Admin Dashboard — Stats + Low Stock Alerts

**Files:**
- Modify: `src/Controllers/Admin/DashboardController.php`
- Modify: `views/admin/dashboard/index.php`

- [ ] **Step 1: Update DashboardController::index()**

```php
public function index(): void
{
    $db = \App\Core\Database::getInstance();

    $totalOrders = $db->query("SELECT COUNT(*) FROM orders")->fetchColumn();
    $totalRevenue = $db->query("SELECT COALESCE(SUM(total),0) FROM orders WHERE status = 'delivered'")->fetchColumn();
    $pendingOrders = $db->query("SELECT COUNT(*) FROM orders WHERE status = 'pending'")->fetchColumn();
    $returnRequests = $db->query("SELECT COUNT(*) FROM orders WHERE status = 'return_requested'")->fetchColumn();

    $ordersByStatus = $db->query("SELECT status, COUNT(*) as count FROM orders GROUP BY status")->fetchAll();

    $lowStock = $db->query("SELECT id, name, stock_quantity, low_stock_threshold FROM products WHERE stock_quantity <= low_stock_threshold ORDER BY stock_quantity ASC LIMIT 10")->fetchAll();

    $this->render('admin/dashboard/index', [
        'totalOrders' => $totalOrders,
        'totalRevenue' => $totalRevenue,
        'pendingOrders' => $pendingOrders,
        'returnRequests' => $returnRequests,
        'ordersByStatus' => $ordersByStatus,
        'lowStock' => $lowStock,
    ]);
}
```

- [ ] **Step 2: Update dashboard view with stat cards + low stock table**

```php
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6>Total Orders</h6>
                <h3><?= $data['totalOrders'] ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6>Revenue (Delivered)</h6>
                <h3><?= formatPrice($data['totalRevenue']) ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h6>Pending Orders</h6>
                <h3><?= $data['pendingOrders'] ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h6>Return Requests</h6>
                <h3><?= $data['returnRequests'] ?></h3>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($data['lowStock'])): ?>
<div class="card mb-4">
    <div class="card-header"><h5>Low Stock Alerts</h5></div>
    <div class="card-body">
        <table class="table table-sm">
            <thead><tr><th>Product</th><th>Stock</th><th>Threshold</th></tr></thead>
            <tbody>
            <?php foreach ($data['lowStock'] as $p): ?>
                <tr class="table-danger">
                    <td><a href="<?= url('admin/products/' . $p['id'] . '/edit') ?>"><?= e($p['name']) ?></a></td>
                    <td><?= (int)$p['stock_quantity'] ?></td>
                    <td><?= (int)$p['low_stock_threshold'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
```

- [ ] **Step 3: Commit**

```bash
git add src/Controllers/Admin/DashboardController.php views/admin/dashboard/
git commit -m "feat: admin dashboard stats and low stock alerts"
```

---

### Task 14: Stock Level Display in Admin Product List

**Files:**
- Modify: `views/admin/products/index.php`

- [ ] **Step 1: Add stock column with color badge**

Find the table header and add a "Stock" column. In the table body:

```php
<td>
    <?php
    $stock = (int)$p['stock_quantity'];
    $threshold = (int)($p['low_stock_threshold'] ?? 5);
    if ($stock <= 0) echo '<span class="badge bg-danger">Out of Stock</span>';
    elseif ($stock <= $threshold) echo '<span class="badge bg-warning text-dark">Low: ' . $stock . '</span>';
    else echo '<span class="badge bg-success">' . $stock . '</span>';
    ?>
</td>
```

- [ ] **Step 2: Commit**

```bash
git add views/admin/products/index.php
git commit -m "feat: stock level badges in admin product list"
```

---

### Task 15: Admin Invoice Route

**Files:**
- Modify: `src/Controllers/Admin/OrderController.php`
- Modify: `views/admin/orders/show.php`

- [ ] **Step 1: Add adminInvoice method to Admin OrderController**

```php
public function adminInvoice(int $id): void
{
    $db = \App\Core\Database::getInstance();
    $stmt = $db->prepare("SELECT o.*, u.name as user_name, u.email as user_email FROM orders o LEFT JOIN users u ON o.user_id = u.id WHERE o.id = ?");
    $stmt->execute([$id]);
    $order = $stmt->fetch();
    if (!$order) {
        $_SESSION['flash'] = ['error' => 'Order not found.'];
        $this->redirect('/admin/orders');
    }
    $items = $db->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $items->execute([$id]);
    $data = [
        'order' => $order,
        'items' => $items->fetchAll(),
    ];
    // Reuse front invoice view
    require __DIR__ . '/../../../views/front/invoice.php';
}
```

- [ ] **Step 2: Add route**

```php
$router->get('/admin/orders/{id}/invoice', ['App\Controllers\Admin\OrderController', 'adminInvoice']);
```

- [ ] **Step 3: Commit**

```bash
git add src/Controllers/Admin/OrderController.php routes/web.php
git commit -m "feat: admin order invoice route"
```

---

### Task 16: User Routes Registration

**Files:**
- Modify: `routes/web.php`

- [ ] **Step 1: Add user cancel/return/invoice routes inside AuthMiddleware group**

```php
$router->post('/account/orders/{id}/cancel', ['App\Controllers\AccountController', 'cancelOrder']);
$router->post('/account/orders/{id}/return', ['App\Controllers\AccountController', 'requestReturn']);
$router->get('/account/orders/{id}/invoice', ['App\Controllers\AccountController', 'invoice']);
```

- [ ] **Step 2: Commit**

```bash
git add routes/web.php
git commit -m "feat: user cancel/return/invoice routes"
```

---

### Task 17: Apply All Migrations

**Files:**
- Run all new migrations against the database

- [ ] **Step 1: Run all new migrations**

```bash
mysql -u root -proot rosaline < migrations/006_governorates.sql
mysql -u root -proot rosaline < seeds/002_governorates.sql
mysql -u root -proot rosaline < migrations/007_products_add_low_stock.sql
mysql -u root -proot rosaline < migrations/008_addresses_add_governorate.sql
mysql -u root -proot rosaline < migrations/009_orders_add_shipping.sql
mysql -u root -proot rosaline < migrations/010_order_status_history.sql
```

- [ ] **Step 2: Commit**

```bash
git add migrations/ seeds/
git commit -m "feat: all Tunisia/COD database migrations and seed data"
```

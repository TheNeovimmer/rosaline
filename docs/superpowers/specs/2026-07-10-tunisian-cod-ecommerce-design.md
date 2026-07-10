# Tunisian COD Ecommerce — Design Spec

## Overview

Tunisify the Rosaline ecommerce platform: full Cash on Delivery, TND currency, Tunisian governorates with shipping fees, printable invoices, 5-stage order status flow, and user cancellation/return requests.

## Currency

- `formatPrice()` helper uses `TND` suffix (`49.900 TND`)
- All price displays, admin panels, reports inherit from this single helper
- Decimal format: 3 decimals for TND (matches Tunisian convention)

## Governorates

New table `governorates`:
```sql
CREATE TABLE governorates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_en VARCHAR(100) NOT NULL,
    name_fr VARCHAR(100) NOT NULL,
    shipping_fee DECIMAL(10,3) NOT NULL DEFAULT 0.000,
    region ENUM('north_east','north_west','central_east','central_west','south') NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

24 governorates seeded with shipping fees:
- **North East** (4 DTD): Tunis, Ariana, Ben Arous, Manouba, Bizerte, Nabeul, Zaghouan
- **North West** (8 DTD): Beja, Jendouba, Kef, Siliana
- **Central East** (5 DTD): Sousse, Monastir, Mahdia, Sfax, Kairouan
- **Central West** (5 DTD): Kasserine, Sidi Bouzid, Kairouan — 8 DTD shipping
- **South** (10-12 DTD): Gabes, Medenine, Tataouine, Kebili, Tozeur, Gafsa

Admin CRUD for governorates.

## Addresses

- Addresses table: replace `state` VARCHAR with `governorate_id` FK
- Checkout: governorate dropdown, phone field with `+216` prefix and validation `^\+216[2-9]\d{7}$`
- Account address form: same governorate dropdown
- Registration: optional governorate + phone fields

## Shipping

- `governorates.shipping_fee` added to order total at checkout
- Free shipping threshold: configurable in settings (default 200 TND)
- Order total = subtotal + shipping_fee - discount

## Order Status — 5-Stage

New table `order_status_history`:
```sql
CREATE TABLE order_status_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    from_status VARCHAR(50),
    to_status VARCHAR(50) NOT NULL,
    note TEXT,
    created_by INT, -- admin user ID or NULL for system/customer
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);
```

Valid transitions:
- `pending` → `confirmed` | `cancelled`
- `confirmed` → `processing` | `cancelled`
- `processing` → `shipped` | `cancelled`
- `shipped` → `delivered` | `cancelled`
- `delivered` → `return_requested`
- `return_requested` → `returned` | `cancelled` (admin rejects)

Admin updates status via dropdown with optional note. History displayed as timeline.

## User Cancellation & Returns

- User sees "Cancel Order" button on their order detail when status is `pending` or `confirmed`
- User sees "Request Return" button when status is `delivered` and within 7 days of delivery
- Both create an entry in `order_status_history` with `to_status = cancelled` or `return_requested`
- Admin has dedicated list for return requests (filter by `return_requested`)
- Admin approves (→ `returned`) or rejects (→ `delivered`) with note

## Printable Invoice

Route: GET `/account/orders/{id}/invoice`
- Clean print-friendly HTML view
- Site logo, order info, customer info, items table, totals, shipping
- Uses `@media print` CSS, no external PDF lib
- Admin also has invoice button on order detail

## Admin Enhancements

- Governorates CRUD (list, create, edit, toggle active)
- Dashboard: total orders, revenue (delivered), orders by status, low stock alerts (`stock_quantity <= low_stock_threshold`)
- Order list: filters by status, governorate, date range
- Return requests: dedicated view with approve/reject
- Stock column in product list, low-stock badge

## Stock Alerts

- `products` table: add `low_stock_threshold` INT DEFAULT 5
- Admin dashboard shows low-stock products
- Product list shows stock level with color badge (green/yellow/red)

## Files Changed

### New files
- `migrations/006_governorates.sql` — create governorates table + seed data
- `migrations/007_order_status_history.sql` — create order_status_history table
- `migrations/008_products_add_low_stock.sql` — add low_stock_threshold
- `migrations/009_addresses_add_governorate.sql` — add governorate_id FK, phone
- `migrations/010_orders_add_shipping_fields.sql` — add shipping_fee, delivery_notes
- `seeds/002_governorates.sql` — 24 Tunisian governorates
- `src/Models/Governorate.php` — Governorate model
- `src/Controllers/Admin/GovernorateController.php` — admin CRUD
- `src/Controllers/Admin/ReturnController.php` — return request management
- `views/admin/governorates/` — index, create, edit
- `views/admin/returns/` — index
- `views/front/invoice.php` — printable invoice template

### Modified files
- `src/Helpers/functions.php` — formatPrice() TND, +216 phone validation helper
- `src/Controllers/CheckoutController.php` — governorate dropdown, shipping calc, validation
- `src/Controllers/Admin/OrderController.php` — 5-stage status flow, history
- `src/Controllers/Admin/DashboardController.php` — new stats, low stock alerts
- `src/Controllers/AccountController.php` — cancel/return requests, invoice route
- `src/Models/Order.php` — status transitions, history methods
- `src/Models/OrderItem.php` — no changes needed
- `views/front/checkout.php` — governorate dropdown, phone input
- `views/front/account-order-detail.php` — status timeline, cancel/return buttons, invoice link
- `views/front/account-addresses.php` — governorate dropdown
- `views/admin/orders/show.php` — status history timeline, invoice button
- `views/admin/orders/index.php` — filters by status/governorate
- `views/admin/dashboard/index.php` — new stats cards, low stock table
- `views/admin/products/index.php` — stock level column, low-stock badge
- `routes/web.php` — new routes

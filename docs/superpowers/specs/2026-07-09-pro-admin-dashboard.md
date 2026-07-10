# Pro Admin Dashboard — Rosaline

## Scope

Enhance admin panel to pro-level: dashboard analytics, stock mgmt, reports, settings, activity log + visual refresh across all admin pages.

## DB Changes

- `products`: add `stock_quantity INT DEFAULT 0`
- `settings`: key-value store (`key VARCHAR(100) UNIQUE`, `value TEXT`)
- `activity_logs`: (`user_id`, `action`, `entity_type`, `entity_id`, `details`, `created_at`)

## Modules

### Dashboard (`/admin`)
- Stat cards: revenue (month), orders, products, users, reviews
- Monthly revenue CSS bar chart (no JS lib)
- Recent orders (last 10)
- Low-stock products alert
- Top 5 products

### Products — Stock Management
- `stock_quantity` field in create/edit form
- Stock badge in product list (green/yellow/red)
- Filter: low stock / out of stock
- CSV export

### Reports (`/admin/reports`)
- Sales by month (table + CSS bars)
- Product performance (top sellers, low performers)
- User signup trend
- CSV export

### Settings (`/admin/settings`)
- Store name, email, address, phone, social URLs
- Currency, tax rate, shipping info
- Key-value DB store, single edit form

### Activity Log (`/admin/activity`)
- Logs admin create/update/delete actions via helper
- Filterable by user, entity, action

## Visual

- Sidebar: cleaner spacing, active states, section labels
- Tables: striped, hover, search/filter inline
- Cards: soft shadows, consistent padding
- Buttons: consistent sizing, icon + label
- All views updated to match

## Principles

- No new JS/npm deps (CSS-only charts)
- Reuse existing Controller/Model base classes
- Fewest new files: 3 models, 3 controllers, 4-5 views
- Raw SQL for analytics queries (no query builder overhead)

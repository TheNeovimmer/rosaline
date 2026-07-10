# Rosaline

Fashion e-commerce platform built with vanilla PHP (no framework) and MySQL.

## Features

- **Shop** — product catalog with category filtering + pagination
- **Cart** — add/update/remove items, session-based
- **Cash on Delivery** — COD-only checkout with configurable min/max limits
- **Auth** — register, login, forgot/reset password
- **Account** — order history, settings, addresses (CRUD + default), wishlist
- **Admin Dashboard** — manage products, categories, orders (with stock restitution on cancel), users, blog posts, pages, contact inquiries, reviews (approve/reject), settings, activity logs, sales/product export
- **Blog** — public blog with detail pages
- **Static pages** — about, contact (stores inquiries), FAQs, privacy policy, terms
- **Security** — CSRF protection on all POST routes, session regeneration on login/register, PDO prepared statements
- **Responsive** — mobile-first frontend design with collapsible admin sidebar

## Requirements

- PHP 8.1+
- MySQL 8+ (or MariaDB 10.6+)
- Apache mod_rewrite (or nginx equivalent)
- DDEV (recommended) or Docker

## Quick Start (DDEV)

```bash
ddev start
ddev exec php migrations/001_schema.sql
ddev exec mysql -u root -proot rosaline < migrations/001_schema.sql
ddev exec mysql -u root -proot rosaline < seeds/001_data.sql
```

Follow the order of files in `migrations/` directory to apply all migrations.

## Manual Setup

1. Point document root to `public/`
2. Copy `.env` and configure database credentials
3. Import migrations in order (`migrations/*.sql`)
4. Import seed data (`seeds/001_data.sql`)
5. Ensure `public/uploads/` is writable

## Admin Panel

Navigate to `/admin` after logging in. Seed data includes an admin user:
- Email: `admin@rosaline.com`
- Password: `admin123`

## Project Structure

```
├── config/          # App & database config
├── inc/             # Header/footer includes
├── migrations/      # Database schema migrations
├── public/          # Document root (index.php, assets, uploads)
├── routes/          # Route definitions (web.php)
├── seeds/           # Sample data
├── src/
│   ├── Controllers/ # Route handlers (front + admin)
│   ├── Core/        # Framework: App, Router, Database, View, etc.
│   ├── Helpers/     # Helper functions (CSRF, mail, formatting)
│   ├── Middleware/   # CSRF, Auth, Admin middleware
│   └── Models/      # Data access layer
└── views/           # PHP templates (admin, front, layouts)
```

## License

Proprietary — all rights reserved.

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="utf-8">
    <title><?= isset($pageTitle) ? $pageTitle . ' - ' : '' ?>Admin - Rosaline</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= asset('fonts/fonts.css') ?>">
    <link rel="stylesheet" href="<?= asset('icon/icomoon/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/admin.css') ?>">
    <link rel="shortcut icon" href="<?= asset('images/logo/favicon.png') ?>">
</head>
<body>
    <?php $adminUser = \App\Core\Auth::user(); ?>
    <!-- Overlay for mobile sidebar -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Top Navbar -->
    <nav class="admin-navbar">
        <button class="hamburger" id="sidebarToggle" aria-label="Toggle sidebar">
            <span></span><span></span><span></span>
        </button>
        <a href="<?= url('admin') ?>" class="navbar-brand">Rosaline</a>
        <div class="nav-search">
            <span class="search-icon"><i class="icon icon-Search"></i></span>
            <form action="<?= url('admin/products') ?>" method="get" style="margin:0;">
                <input type="text" name="search" placeholder="Search products, orders..." autocomplete="off">
            </form>
        </div>
        <div class="nav-actions">
            <button class="theme-toggle" id="themeToggle" title="Toggle theme">
                <i class="icon icon-Sun sun"></i>
                <i class="icon icon-Moon moon"></i>
            </button>
            <button class="nav-btn" title="Notifications">
                <i class="icon icon-Bell"></i>
                <span class="badge-dot"></span>
            </button>
            <div class="dropdown" style="position:relative;">
                <div class="user-dropdown" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if (!empty($adminUser['avatar'])): ?>
                        <img class="user-avatar" src="<?= url($adminUser['avatar']) ?>" alt="">
                    <?php else: ?>
                        <div class="user-avatar"><?= strtoupper(substr($adminUser['name'] ?? 'A', 0, 1)) ?></div>
                    <?php endif; ?>
                    <span class="user-name"><?= e($adminUser['name'] ?? 'Admin') ?></span>
                </div>
                <div class="dropdown-menu dropdown-menu-end" style="min-width:180px;padding:4px;border-radius:8px;margin-top:4px;">
                    <a href="<?= url('admin/settings') ?>" style="display:flex;align-items:center;gap:8px;padding:8px 12px;border-radius:6px;text-decoration:none;color:var(--admin-text);font-size:13px;">Settings</a>
                    <div style="border-top:1px solid var(--admin-border);margin:4px 0;"></div>
                    <a href="<?= url() ?>" style="display:flex;align-items:center;gap:8px;padding:8px 12px;border-radius:6px;text-decoration:none;color:var(--admin-text);font-size:13px;">Back to Store</a>
                    <a href="<?= url('logout') ?>" style="display:flex;align-items:center;gap:8px;padding:8px 12px;border-radius:6px;text-decoration:none;color:var(--admin-danger);font-size:13px;">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-scroll">
            <div class="sidebar-label collapse-label">Main</div>
            <a href="<?= url('admin') ?>" class="<?= rtrim($_SERVER['REQUEST_URI'], '/') === '/admin' ? 'active' : '' ?>"><i class="icon icon-Dashboard"></i> <span>Dashboard</span></a>
            <a href="<?= url('admin/products') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/products') ? 'active' : '' ?>"><i class="icon icon-Box"></i> <span>Products</span></a>
            <a href="<?= url('admin/categories') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/categories') ? 'active' : '' ?>"><i class="icon icon-Grid2"></i> <span>Categories</span></a>
            <a href="<?= url('admin/orders') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/orders') ? 'active' : '' ?>"><i class="icon icon-Truck"></i> <span>Orders</span></a>
            <a href="<?= url('admin/return-requests') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/return-requests') ? 'active' : '' ?>"><i class="icon icon-Refresh"></i> <span>Returns</span></a>
            <a href="<?= url('admin/users') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/users') ? 'active' : '' ?>"><i class="icon icon-UserCircle"></i> <span>Users</span></a>

            <div class="sidebar-label collapse-label">Content</div>
            <a href="<?= url('admin/blog') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/blog') ? 'active' : '' ?>"><i class="icon icon-Pen"></i> <span>Blog Posts</span></a>
            <a href="<?= url('admin/pages') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/pages') ? 'active' : '' ?>"><i class="icon icon-Note"></i> <span>Pages</span></a>
            <a href="<?= url('admin/reviews') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/reviews') ? 'active' : '' ?>"><i class="icon icon-Star"></i> <span>Reviews</span></a>
            <a href="<?= url('admin/contacts') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/contacts') ? 'active' : '' ?>"><i class="icon icon-Envelope"></i> <span>Messages</span></a>

            <div class="sidebar-label collapse-label">Analytics</div>
            <a href="<?= url('admin/reports') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/reports') ? 'active' : '' ?>"><i class="icon icon-Dashboard"></i> <span>Reports</span></a>
            <a href="<?= url('admin/activity') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/activity') ? 'active' : '' ?>"><i class="icon icon-Clock"></i> <span>Activity Log</span></a>

            <div class="sidebar-label collapse-label">System</div>
            <a href="<?= url('admin/settings') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/settings') ? 'active' : '' ?>"><i class="icon icon-Setting"></i> <span>Settings</span></a>
            <a href="<?= url('admin/governorates') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], '/admin/governorates') ? 'active' : '' ?>"><i class="icon icon-ShopLocationPin"></i> <span>Governorates</span></a>
        </div>
        <div class="sidebar-footer">
            <button class="sidebar-collapse-btn" id="sidebarCollapseBtn" title="Collapse sidebar"><i class="icon icon-OpenMenu"></i></button>
        </div>
    </aside>

    <!-- Content -->
    <div class="admin-content">
        <div class="content-header">
            <h5><?= $pageTitle ?? 'Dashboard' ?></h5>
            <span style="font-size:13px;color:var(--admin-text-secondary);"><?= date('M d, Y') ?></span>
        </div>
        <div class="content-body">
            <?php $flash = success(); ?>
            <?php if ($flash): ?>
                <div class="alert-admin alert-success"><?= e($flash) ?></div>
            <?php endif; ?>
            <?php if (!empty($data['errors'])): ?>
                <div class="alert-admin alert-danger"><?= implode('<br>', array_map('e', $data['errors'])) ?></div>
            <?php endif; ?>
            <?= $content ?>
        </div>
    </div>

    <script>
    (function() {
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggle = document.getElementById('sidebarToggle');

        // Restore sidebar state
        const savedCollapse = localStorage.getItem('admin-sidebar-collapsed');
        if (savedCollapse === 'true' && window.innerWidth >= 768) sidebar.classList.add('collapsed');

        // Hamburger: desktop=collapse, mobile=open off-canvas
        if (toggle && sidebar) {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                if (window.innerWidth < 768) {
                    sidebar.classList.remove('collapsed');
                    sidebar.classList.toggle('open');
                    if (overlay) overlay.classList.toggle('active');
                    toggle.classList.toggle('active');
                } else {
                    sidebar.classList.toggle('collapsed');
                    localStorage.setItem('admin-sidebar-collapsed', sidebar.classList.contains('collapsed'));
                }
            });
        }

        // Overlay click closes sidebar on mobile
        if (overlay) {
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                if (toggle) toggle.classList.remove('active');
            });
        }

        // Escape closes sidebar on mobile
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && sidebar && sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                if (toggle) toggle.classList.remove('active');
            }
        });

        // Theme toggle
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;
        const savedTheme = localStorage.getItem('admin-theme') || 'light';
        html.setAttribute('data-theme', savedTheme);
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                const current = html.getAttribute('data-theme');
                const next = current === 'dark' ? 'light' : 'dark';
                html.setAttribute('data-theme', next);
                localStorage.setItem('admin-theme', next);
            });
        }

        // Sidebar collapse button (desktop only)
        const collapseBtn = document.getElementById('sidebarCollapseBtn');
        if (collapseBtn && sidebar) {
            collapseBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                localStorage.setItem('admin-sidebar-collapsed', sidebar.classList.contains('collapsed'));
            });
        }
    })();
    </script>

    <script src="<?= asset('js/plugin/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/bootstrap.min.js') ?>"></script>
</body>
</html>

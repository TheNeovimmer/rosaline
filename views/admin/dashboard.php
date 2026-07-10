<?php
$totalProducts = $data['totalProducts'] ?? 0;
$totalOrders   = $data['totalOrders'] ?? 0;
$totalUsers    = $data['totalUsers'] ?? 0;
$totalRevenue  = $data['totalRevenue'] ?? 0;
$todayOrders   = $data['todayOrders'] ?? 0;
$todayRevenue  = $data['todayRevenue'] ?? 0;
$totalCod      = $data['totalCod'] ?? 0;
$pendingCod    = $data['pendingCod'] ?? 0;
$collectedCod  = $data['collectedCod'] ?? 0;
$todayCodRevenue = $data['todayCodRevenue'] ?? 0;
$pendingReturns = $data['pendingReturns'] ?? 0;
$pendingOrders = $data['pendingOrders'] ?? 0;
$paymentBreakdown = $data['paymentBreakdown'] ?? [];
$recentOrders  = $data['recentOrders'] ?? [];
$monthlyRevenue = $data['monthlyRevenue'] ?? [];
$ordersByStatus = $data['ordersByStatus'] ?? [];
$lowStockProducts = $data['lowStockProducts'] ?? [];
$topProducts = $data['topProducts'] ?? [];
$recentActivity = $data['recentActivity'] ?? [];
$pendingCodOrders = $data['pendingCodOrders'] ?? [];

$monthCount = count($monthlyRevenue);
$allTimeHigh = $monthlyRevenue ? max(array_column($monthlyRevenue, 'revenue')) : 1;
$pmTotal = array_sum(array_column($paymentBreakdown, 'count'));
$paymentLabels = ['cod' => 'COD', 'credit-card' => 'Card', 'paypal' => 'PayPal', 'apple-pay' => 'Apple Pay'];
$paymentColors = ['cod' => '#059669', 'credit-card' => '#2563eb', 'paypal' => '#1d4ed8', 'apple-pay' => '#7c3aed'];
?>
<!-- Row 1: Overview -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon gradient-green"><i class="icon icon-Box"></i></div>
            <div class="stat-info"><div class="stat-label">Products</div><div class="stat-value"><?= $totalProducts ?></div></div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon gradient-blue"><i class="icon icon-Truck"></i></div>
            <div class="stat-info"><div class="stat-label">Orders</div><div class="stat-value"><?= $totalOrders ?></div></div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon gradient-purple"><i class="icon icon-UserCircle"></i></div>
            <div class="stat-info"><div class="stat-label">Users</div><div class="stat-value"><?= $totalUsers ?></div></div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon gradient-amber"><i class="icon icon-Payment"></i></div>
            <div class="stat-info"><div class="stat-label">Revenue</div><div class="stat-value"><?= formatPrice($totalRevenue) ?></div></div>
        </div>
    </div>
</div>

<!-- Row 2: Today + COD Pulse -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-sm">
            <div class="stat-icon gradient-cyan"><i class="icon icon-Clock"></i></div>
            <div class="stat-info">
                <div class="stat-label">Today Orders</div>
                <div class="stat-value"><?= $todayOrders ?></div>
                <div class="stat-sub"><?= formatPrice($todayRevenue) ?> revenue</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-sm">
            <div class="stat-icon gradient-amber"><i class="icon icon-Timer"></i></div>
            <div class="stat-info">
                <div class="stat-label">Pending</div>
                <div class="stat-value"><?= $pendingOrders ?></div>
                <div class="stat-sub"><a href="<?= url('admin/orders?status=pending') ?>">awaiting confirmation</a></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-sm">
            <div class="stat-icon gradient-purple"><i class="icon icon-Refresh"></i></div>
            <div class="stat-info">
                <div class="stat-label">Return Requests</div>
                <div class="stat-value"><?= $pendingReturns ?></div>
                <div class="stat-sub"><a href="<?= url('admin/return-requests') ?>">pending review</a></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-sm">
            <div class="stat-icon gradient-green"><i class="icon icon-Payment"></i></div>
            <div class="stat-info">
                <div class="stat-label">Orders (COD)</div>
                <div class="stat-value"><?= $totalCod ?></div>
                <div class="stat-sub"><?= formatPrice($collectedCod) ?> collected</div>
            </div>
        </div>
    </div>
</div>

<!-- Row 3: Charts -->
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="card-admin h-100">
            <div class="card-header"><span>Monthly Revenue</span><span class="card-header-badge"><?= $monthCount ?> months</span></div>
            <div class="card-body">
                <?php if (empty($monthlyRevenue)): ?>
                    <div class="empty-state"><div class="empty-icon"><i class="icon icon-Stock"></i></div><p>No sales data yet. Orders will appear here.</p></div>
                <?php else: ?>
                <div class="chart-wrap">
                    <div class="d-flex align-items-end gap-1" style="height:200px;">
                        <?php foreach ($monthlyRevenue as $m): ?>
                        <?php $pct = $allTimeHigh > 0 ? ($m['revenue'] / $allTimeHigh) * 100 : 0; ?>
                        <div class="chart-column">
                            <div class="chart-tooltip"><?= formatPrice($m['revenue']) ?></div>
                            <div class="bar" style="height:<?= max(4, $pct) ?>%;"></div>
                            <div class="bar-label"><?= substr($m['month'], 5, 2) ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-admin h-100">
            <div class="card-header">Orders by Status</div>
            <div class="card-body d-flex flex-column justify-content-center">
                <?php if (empty($ordersByStatus)): ?>
                    <div class="empty-state"><p>No orders yet.</p></div>
                <?php else: ?>
                <?php foreach ($ordersByStatus as $s): ?>
                <?php
                $color = match($s['status']) {
                    'pending' => 'warning', 'confirmed' => 'info', 'processing' => 'info', 'shipped' => 'primary',
                    'delivered' => 'success', 'cancelled' => 'danger', 'return_requested' => 'warning', 'returned' => 'secondary',
                    default => 'secondary'
                };
                $total = array_sum(array_column($ordersByStatus, 'count'));
                $pct = $total > 0 ? round(($s['count'] / $total) * 100) : 0;
                ?>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="badge-admin bg-<?= $color ?>"><?= ucfirst($s['status']) ?></span>
                        <span class="fw-bold"><?= $s['count'] ?> <span class="fw-normal" style="color:var(--admin-text-secondary);font-size:12px;">(<?= $pct ?>%)</span></span>
                    </div>
                    <div class="chart-bar"><div class="fill fill-<?= $color ?>" style="width:<?= $pct ?>%;"></div></div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Row 4: Payment Breakdown + Pending COD -->
<div class="row g-3 mb-4">
    <div class="col-lg-6">
        <div class="card-admin h-100">
            <div class="card-header"><span>Payment Methods</span><span class="card-header-badge"><?= $pmTotal ?> orders</span></div>
            <div class="card-body">
                <?php if (empty($paymentBreakdown)): ?>
                    <div class="empty-state"><p>No payment data.</p></div>
                <?php else: ?>
                <div class="pm-breakdown">
                    <?php foreach ($paymentBreakdown as $p): ?>
                    <?php
                    $label = $paymentLabels[$p['payment_method']] ?? ucfirst(str_replace('-', ' ', $p['payment_method']));
                    $color = $paymentColors[$p['payment_method']] ?? '#6b7280';
                    $pct = $pmTotal > 0 ? round(($p['count'] / $pmTotal) * 100) : 0;
                    ?>
                    <div class="pm-row">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="pm-label"><span class="pm-dot" style="background:<?= $color ?>;"></span><?= $label ?></span>
                            <span class="fw-bold"><?= $p['count'] ?> <span class="fw-normal pm-sub">(<?= $pct ?>% &middot; <?= formatPrice($p['total']) ?>)</span></span>
                        </div>
                        <div class="chart-bar"><div class="fill" style="width:<?= $pct ?>%;background:<?= $color ?>;"></div></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card-admin h-100">
            <div class="card-header"><span>Pending Orders</span><a href="<?= url('admin/orders?status=pending') ?>" class="btn-admin btn-admin-sm">View All</a></div>
            <div class="card-body p-0">
                <?php if (empty($pendingCodOrders)): ?>
                <div class="empty-state"><div class="empty-icon"><i class="icon icon-CircleCheck" style="color:var(--admin-success);"></i></div><p>No pending orders.</p></div>
                <?php else: ?>
                <div class="table-responsive-wrap">
                <table class="table-admin mb-0 w-100">
                    <thead><tr><th>Order</th><th>Customer</th><th>Total</th><th>Date</th></tr></thead>
                    <tbody>
                        <?php foreach ($pendingCodOrders as $o): ?>
                        <tr>
                            <td><a href="<?= url('admin/orders/' . $o['id']) ?>" style="color:var(--admin-text);">#<?= e($o['order_number'] ?? $o['id']) ?></a></td>
                            <td><?= e($o['user_name'] ?? '—') ?></td>
                            <td><?= formatPrice($o['total'] ?? 0) ?></td>
                            <td style="white-space:nowrap;"><?= formatDate($o['created_at'] ?? '', 'M d') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Row 5: Recent Orders + Top Products / Low Stock -->
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="card-admin">
            <div class="card-header"><span>Recent Orders</span><a href="<?= url('admin/orders') ?>" class="btn-admin btn-admin-sm">View All</a></div>
            <div class="card-body p-0">
                <div class="table-responsive-wrap">
                <table class="table-admin mb-0 w-100">
                    <thead><tr><th>#</th><th>Customer</th><th>Total</th><th>Payment</th><th>Status</th><th>Date</th></tr></thead>
                    <tbody>
                        <?php if (empty($recentOrders)): ?>
                        <tr class="table-empty"><td colspan="6">No orders yet</td></tr>
                        <?php else: ?>
                        <?php foreach ($recentOrders as $o): ?>
                        <tr>
                            <td><a href="<?= url('admin/orders/' . $o['id']) ?>" style="color:var(--admin-text);">#<?= e($o['order_number'] ?? $o['id']) ?></a></td>
                            <td><?= e($o['user_name'] ?? '—') ?></td>
                            <td><?= formatPrice($o['total'] ?? 0) ?></td>
                            <td><span class="pm-dot-sm <?= ($o['payment_method'] ?? '') === 'cod' ? 'dot-cod' : 'dot-card' ?>"></span><?= ($o['payment_method'] ?? '—') === 'cod' ? 'COD' : 'Card' ?></td>
                            <td><span class="badge-admin status-<?= $o['status'] ?? 'pending' ?>"><?= e(ucfirst(str_replace('_', ' ', $o['status'] ?? 'pending'))) ?></span></td>
                            <td style="white-space:nowrap;"><?= formatDate($o['created_at'] ?? '', 'M d, Y') ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-admin mb-3">
            <div class="card-header"><span>Top Products</span></div>
            <div class="card-body p-0">
                <?php if (empty($topProducts)): ?>
                <div class="empty-state py-3"><p>No sales data.</p></div>
                <?php else: ?>
                <table class="table-admin mb-0 w-100">
                    <tbody>
                        <?php foreach ($topProducts as $i => $p): ?>
                        <tr>
                            <td style="width:28px;padding:8px 16px;"><span class="rank-badge"><?= $i + 1 ?></span></td>
                            <td style="padding:8px 16px;font-size:13px;"><?= e(truncate($p['name'], 22)) ?></td>
                            <td style="padding:8px 16px;text-align:right;font-size:13px;white-space:nowrap;"><span class="sold-count"><?= (int) $p['total_sold'] ?> sold</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-admin">
            <div class="card-header"><span>Low Stock</span><a href="<?= url('admin/products?stock=low') ?>" class="btn-admin btn-admin-sm">View</a></div>
            <div class="card-body p-0">
                <?php if (empty($lowStockProducts)): ?>
                <div class="empty-state py-3"><div class="empty-icon"><i class="icon icon-CircleCheck" style="color:var(--admin-success);"></i></div><p>All stocked.</p></div>
                <?php else: ?>
                <div style="max-height:200px;overflow-y:auto;">
                <table class="table-admin mb-0 w-100">
                    <tbody>
                        <?php foreach ($lowStockProducts as $p): ?>
                        <tr>
                            <td style="padding:8px 16px;"><a href="<?= url('admin/products/' . $p['id'] . '/edit') ?>" style="color:var(--admin-text);font-size:13px;"><?= e(truncate($p['name'], 26)) ?></a></td>
                            <td style="padding:8px 16px;"><span class="badge-admin bg-<?= $p['stock_quantity'] > 0 ? 'warning' : 'danger' ?>"><?= (int) $p['stock_quantity'] ?> left</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Row 6: Activity + Quick Actions -->
<div class="row g-3 mb-4">
    <div class="col-lg-6">
        <div class="card-admin h-100">
            <div class="card-header"><span>Recent Activity</span><a href="<?= url('admin/activity') ?>" class="btn-admin btn-admin-sm">View All</a></div>
            <div class="card-body p-0">
                <?php if (empty($recentActivity)): ?>
                <div class="empty-state"><p>No activity yet.</p></div>
                <?php else: ?>
                <div class="activity-feed">
                    <?php foreach ($recentActivity as $a): ?>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <?php
                            $actIcon = match($a['action']) {
                                'create' => 'icon-Plus',
                                'update' => 'icon-Refresh',
                                'delete' => 'icon-Trash',
                                default => 'icon-CircleCheck'
                            };
                            ?>
                            <i class="icon <?= $actIcon ?>"></i>
                        </div>
                        <div class="activity-body">
                            <div class="activity-text"><?= e($a['details'] ?: ucfirst($a['action']) . ' ' . $a['entity_type']) ?></div>
                            <div class="activity-meta"><?= e($a['user_name'] ?? 'System') ?> &middot; <?= formatDate($a['created_at'] ?? '', 'M d, g:i A') ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card-admin h-100">
            <div class="card-header">Quick Actions</div>
            <div class="card-body">
                <div class="quick-actions-grid">
                    <a href="<?= url('admin/products/create') ?>" class="qa-card">
                        <div class="qa-icon gradient-green"><i class="icon icon-Plus"></i></div>
                        <span>New Product</span>
                    </a>
                    <a href="<?= url('admin/blog/create') ?>" class="qa-card">
                        <div class="qa-icon gradient-blue"><i class="icon icon-Pen"></i></div>
                        <span>New Blog Post</span>
                    </a>
                    <a href="<?= url('admin/pages/create') ?>" class="qa-card">
                        <div class="qa-icon gradient-purple"><i class="icon icon-Note"></i></div>
                        <span>New Page</span>
                    </a>
                    <a href="<?= url('admin/categories/create') ?>" class="qa-card">
                        <div class="qa-icon gradient-amber"><i class="icon icon-Grid2"></i></div>
                        <span>New Category</span>
                    </a>
                    <a href="<?= url('admin/reports') ?>" class="qa-card">
                        <div class="qa-icon gradient-cyan"><i class="icon icon-Stock"></i></div>
                        <span>Reports</span>
                    </a>
                    <a href="<?= url('admin/settings') ?>" class="qa-card">
                        <div class="qa-icon gradient-gray"><i class="icon icon-Setting"></i></div>
                        <span>Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

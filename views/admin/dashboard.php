<?php
$totalProducts ??= 0;
$totalOrders ??= 0;
$totalUsers ??= 0;
$totalRevenue ??= 0;
$todayOrders ??= 0;
$todayRevenue ??= 0;
$pendingOrders ??= 0;
$pendingReturns ??= 0;
$lowStockProducts ??= [];
$topProducts ??= [];
$recentOrders ??= [];
$recentActivity ??= [];
$ordersByStatus ??= [];
$dailyRevenue ??= [];
$thisMonthRevenue ??= 0;
$thisMonthOrders ??= 0;
$lastMonthRevenue ??= 0;
$lastMonthOrders ??= 0;
$newCustomersThisMonth ??= 0;
$avgOrderValue ??= 0;
$deliveredOrders ??= 0;

function pctChange(float $current, float $previous): array {
    if ($previous <= 0) return ['pct' => $current > 0 ? 100 : 0, 'dir' => $current > 0 ? 'up' : 'neutral'];
    $pct = round(($current - $previous) / $previous * 100, 1);
    return ['pct' => abs($pct), 'dir' => $pct > 0 ? 'up' : ($pct < 0 ? 'down' : 'neutral')];
}

$revChange = pctChange($thisMonthRevenue, $lastMonthRevenue);
$ordChange = pctChange($thisMonthOrders, $lastMonthOrders);

$statusColors = [
    'pending' => '#f59e0b', 'confirmed' => '#3b82f6', 'processing' => '#8b5cf6',
    'shipped' => '#06b6d4', 'delivered' => '#10b981', 'cancelled' => '#ef4444',
    'return_requested' => '#f97316', 'returned' => '#6b7280',
];

// Pad dailyRevenue with zero-fill for missing days
$dailyMap = [];
foreach ($dailyRevenue as $d) { $dailyMap[$d['day']] = $d; }
$dailyLabels = []; $dailyData = []; $dailyOrderData = [];
for ($i = 13; $i >= 0; $i--) {
    $day = date('Y-m-d', strtotime("-{$i} days"));
    $dailyLabels[] = date('M d', strtotime($day));
    $dailyData[] = (float) ($dailyMap[$day]['revenue'] ?? 0);
    $dailyOrderData[] = (int) ($dailyMap[$day]['orders'] ?? 0);
}
$dailyLabelsJson = json_encode($dailyLabels);
$dailyDataJson = json_encode($dailyData);
$dailyOrderDataJson = json_encode($dailyOrderData);

$statusLabels = []; $statusData = []; $statusColorsArr = [];
foreach ($ordersByStatus as $s) {
    $statusLabels[] = ucfirst(str_replace('_', ' ', $s['status']));
    $statusData[] = (int) $s['count'];
    $statusColorsArr[] = $statusColors[$s['status']] ?? '#6b7280';
}
$statusLabelsJson = json_encode($statusLabels);
$statusDataJson = json_encode($statusData);
$statusColorsJson = json_encode($statusColorsArr);
?>

<!-- Row 1: Pro Stat Cards -->
<div class="row g-3 mb-4">
    <div class="col-xl-2 col-lg-4 col-md-6">
        <div class="dash-stat">
            <div class="dash-stat-top">
                <span class="dash-stat-label">Revenue</span>
                <span class="dash-stat-icon" style="color:#10b981;"><i class="icon icon-Payment"></i></span>
            </div>
            <div class="dash-stat-value"><?= formatPrice($totalRevenue) ?></div>
            <div class="dash-stat-footer">
                <span class="dash-trend dash-trend-<?= $revChange['dir'] ?>">
                    <i class="icon icon-<?= $revChange['dir'] === 'up' ? 'ArrowUp' : ($revChange['dir'] === 'down' ? 'ArrowDown' : 'Minus') ?>"></i>
                    <?= number_format($revChange['pct'], 1) ?>%
                </span>
                <span class="dash-stat-sub">vs last month</span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6">
        <div class="dash-stat">
            <div class="dash-stat-top">
                <span class="dash-stat-label">Orders</span>
                <span class="dash-stat-icon" style="color:#3b82f6;"><i class="icon icon-Truck"></i></span>
            </div>
            <div class="dash-stat-value"><?= number_format($totalOrders) ?></div>
            <div class="dash-stat-footer">
                <span class="dash-trend dash-trend-<?= $ordChange['dir'] ?>">
                    <i class="icon icon-<?= $ordChange['dir'] === 'up' ? 'ArrowUp' : ($ordChange['dir'] === 'down' ? 'ArrowDown' : 'Minus') ?>"></i>
                    <?= number_format($ordChange['pct'], 1) ?>%
                </span>
                <span class="dash-stat-sub"><?= $deliveredOrders ?> delivered</span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6">
        <div class="dash-stat">
            <div class="dash-stat-top">
                <span class="dash-stat-label">Customers</span>
                <span class="dash-stat-icon" style="color:#8b5cf6;"><i class="icon icon-UserCircle"></i></span>
            </div>
            <div class="dash-stat-value"><?= number_format($totalUsers) ?></div>
            <div class="dash-stat-footer">
                <span class="dash-trend dash-trend-up"><i class="icon icon-UserPlus"></i> +<?= $newCustomersThisMonth ?></span>
                <span class="dash-stat-sub">this month</span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6">
        <div class="dash-stat">
            <div class="dash-stat-top">
                <span class="dash-stat-label">Products</span>
                <span class="dash-stat-icon" style="color:#f59e0b;"><i class="icon icon-Box"></i></span>
            </div>
            <div class="dash-stat-value"><?= number_format($totalProducts) ?></div>
            <div class="dash-stat-footer">
                <span class="dash-trend dash-trend-<?= count($lowStockProducts) > 0 ? 'down' : 'up' ?>">
                    <?= count($lowStockProducts) > 0 ? count($lowStockProducts) . ' low stock' : 'All stocked' ?>
                </span>
                <span class="dash-stat-sub">active</span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6">
        <div class="dash-stat">
            <div class="dash-stat-top">
                <span class="dash-stat-label">Avg Order</span>
                <span class="dash-stat-icon" style="color:#06b6d4;"><i class="icon icon-Stock"></i></span>
            </div>
            <div class="dash-stat-value"><?= formatPrice($avgOrderValue) ?></div>
            <div class="dash-stat-footer">
                <span class="dash-trend dash-trend-up"><i class="icon icon-Payment"></i> <?= formatPrice($thisMonthRevenue) ?></span>
                <span class="dash-stat-sub">this month</span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6">
        <div class="dash-stat">
            <div class="dash-stat-top">
                <span class="dash-stat-label">Today</span>
                <span class="dash-stat-icon" style="color:#f97316;"><i class="icon icon-Clock"></i></span>
            </div>
            <div class="dash-stat-value"><?= $todayOrders ?></div>
            <div class="dash-stat-footer">
                <span class="dash-trend dash-trend-up"><i class="icon icon-Payment"></i> <?= formatPrice($todayRevenue) ?></span>
                <span class="dash-stat-sub"><?= $pendingOrders ?> pending</span>
            </div>
        </div>
    </div>
</div>

<!-- Row 2: Charts -->
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="card-admin">
            <div class="card-header-chart">
                <span>Revenue Trend</span>
                <span class="card-header-sub">Last 14 days (TND)</span>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-admin h-100">
            <div class="card-header-chart">
                <span>Orders by Status</span>
                <span class="card-header-sub"><?= array_sum($statusData) ?> total</span>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <div class="chart-container chart-container-sm">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Row 3: Recent Orders + Top Products -->
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="card-admin">
            <div class="card-header-chart">
                <span>Recent Orders</span>
                <a href="<?= url('admin/orders') ?>" class="btn-admin btn-admin-sm">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive-wrap">
                <table class="admin-table mb-0 w-100">
                    <thead><tr><th>Order</th><th>Customer</th><th>Total</th><th>Payment</th><th>Status</th><th>Date</th></tr></thead>
                    <tbody>
                        <?php if (empty($recentOrders)): ?>
                        <tr class="table-empty"><td colspan="6">No orders yet</td></tr>
                        <?php else: ?>
                        <?php foreach ($recentOrders as $o): ?>
                        <tr>
                            <td><a href="<?= url('admin/orders/' . $o['id']) ?>">#<?= e($o['order_number'] ?? $o['id']) ?></a></td>
                            <td><?= e($o['user_name'] ?? '—') ?></td>
                            <td class="fw-semibold"><?= formatPrice($o['total'] ?? 0) ?></td>
                            <td><?= ($o['payment_method'] ?? '') === 'cod' ? 'COD' : 'Card' ?></td>
                            <td><span class="badge-admin status-<?= $o['status'] ?? 'pending' ?>"><?= e(ucfirst(str_replace('_', ' ', $o['status'] ?? 'pending'))) ?></span></td>
                            <td class="text-secondary"><?= formatDate($o['created_at'] ?? '', 'M d, Y') ?></td>
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
            <div class="card-header-chart">
                <span>Top Products</span>
            </div>
            <div class="card-body p-0">
                <?php if (empty($topProducts)): ?>
                <div class="empty-state py-3"><p>No sales data.</p></div>
                <?php else: ?>
                <?php foreach ($topProducts as $i => $p): ?>
                <div class="top-product-row">
                    <span class="top-product-rank"><?= $i + 1 ?></span>
                    <div class="top-product-info">
                        <div class="top-product-name"><?= e($p['name']) ?></div>
                        <div class="top-product-sold"><?= (int) $p['total_sold'] ?> sold</div>
                    </div>
                    <div class="top-product-bar">
                        <div class="top-product-fill" style="width:<?= max(10, ((int)$p['total_sold'] / max(1, (int)($topProducts[0]['total_sold'] ?? 1))) * 100) ?>%;"></div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty($lowStockProducts)): ?>
        <div class="card-admin">
            <div class="card-header-chart">
                <span>Low Stock Alerts</span>
                <a href="<?= url('admin/products?stock=low') ?>" class="btn-admin btn-admin-sm">View All</a>
            </div>
            <div class="card-body p-0">
                <?php foreach ($lowStockProducts as $p): ?>
                <div class="low-stock-row">
                    <div class="low-stock-info">
                        <a href="<?= url('admin/products/' . $p['id'] . '/edit') ?>" class="low-stock-name"><?= e($p['name']) ?></a>
                        <div class="low-stock-bar">
                            <div class="low-stock-fill" style="width:<?= min(100, ((int)$p['stock_quantity'] / max(1, (int)($p['low_stock_threshold'] ?? 5))) * 100) ?>%;"></div>
                        </div>
                    </div>
                    <span class="low-stock-qty bg-<?= (int)$p['stock_quantity'] <= 0 ? 'danger' : 'warning' ?>"><?= (int) $p['stock_quantity'] ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Row 4: Quick Actions -->
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="card-admin">
            <div class="card-header-chart"><span>Quick Actions</span></div>
            <div class="card-body">
                <div class="quick-actions-grid">
                    <a href="<?= url('admin/products/create') ?>" class="qa-card">
                        <div class="qa-icon" style="background:#10b981;"><i class="icon icon-Plus" style="color:#fff;"></i></div>
                        <span>New Product</span>
                    </a>
                    <a href="<?= url('admin/orders') ?>" class="qa-card">
                        <div class="qa-icon" style="background:#3b82f6;"><i class="icon icon-Truck" style="color:#fff;"></i></div>
                        <span>Manage Orders</span>
                    </a>
                    <a href="<?= url('admin/return-requests') ?>" class="qa-card">
                        <div class="qa-icon" style="background:#f97316;"><i class="icon icon-Refresh" style="color:#fff;"></i></div>
                        <span>Returns</span>
                    </a>
                    <a href="<?= url('admin/governorates') ?>" class="qa-card">
                        <div class="qa-icon" style="background:#8b5cf6;"><i class="icon icon-ShopLocationPin" style="color:#fff;"></i></div>
                        <span>Governorates</span>
                    </a>
                    <a href="<?= url('admin/reports') ?>" class="qa-card">
                        <div class="qa-icon" style="background:#06b6d4;"><i class="icon icon-Stock" style="color:#fff;"></i></div>
                        <span>Reports</span>
                    </a>
                    <a href="<?= url('admin/settings') ?>" class="qa-card">
                        <div class="qa-icon" style="background:#6b7280;"><i class="icon icon-Setting" style="color:#fff;"></i></div>
                        <span>Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let revenueChartInstance, statusChartInstance;

function initCharts() {
    const ctx = document.getElementById('revenueChart');
    const ctx2 = document.getElementById('statusChart');
    if (!ctx || !ctx2) return;

    if (revenueChartInstance) revenueChartInstance.destroy();
    if (statusChartInstance) statusChartInstance.destroy();

    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    const gridColor = isDark ? 'rgba(255,255,255,0.06)' : 'rgba(0,0,0,0.06)';
    const textColor = isDark ? '#a0aec0' : '#64748b';
    const tooltipBg = isDark ? '#1e293b' : '#fff';
    const tooltipTitle = isDark ? '#e2e8f0' : '#1e293b';
    const tooltipBody = isDark ? '#94a3b8' : '#475569';
    const tooltipBorder = isDark ? '#334155' : '#e2e8f0';

    revenueChartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= $dailyLabelsJson ?>,
            datasets: [{
                label: 'Revenue (TND)',
                data: <?= $dailyDataJson ?>,
                borderColor: '#10b981',
                backgroundColor: function(ctx) {
                    const g = ctx.chart.ctx.createLinearGradient(0, 0, 0, 300);
                    g.addColorStop(0, 'rgba(16,185,129,0.25)');
                    g.addColorStop(1, 'rgba(16,185,129,0.0)');
                    return g;
                },
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#10b981',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                borderWidth: 2,
            }, {
                label: 'Orders',
                data: <?= $dailyOrderDataJson ?>,
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59,130,246,0.0)',
                fill: false,
                tension: 0.4,
                pointRadius: 3,
                pointBackgroundColor: '#3b82f6',
                pointBorderColor: '#fff',
                pointBorderWidth: 1,
                borderWidth: 1.5,
                yAxisID: 'y1',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: tooltipBg,
                    titleColor: tooltipTitle,
                    bodyColor: tooltipBody,
                    borderColor: tooltipBorder,
                    borderWidth: 1,
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(ctx) {
                            if (ctx.dataset.label === 'Revenue (TND)') return ctx.dataset.label + ': ' + Number(ctx.raw).toFixed(3) + ' TND';
                            return ctx.dataset.label + ': ' + ctx.raw;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: { color: gridColor, drawBorder: false },
                    ticks: { color: textColor, font: { size: 11 }, maxTicksLimit: 8 }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: gridColor, drawBorder: false },
                    ticks: { color: textColor, font: { size: 11 }, callback: function(v) { return v.toFixed(0); } }
                },
                y1: {
                    beginAtZero: true,
                    position: 'right',
                    grid: { display: false },
                    ticks: { color: textColor, font: { size: 11 }, callback: function(v) { return Number.isInteger(v) ? v : ''; } }
                }
            }
        }
    });

    statusChartInstance = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: <?= $statusLabelsJson ?>,
            datasets: [{
                data: <?= $statusDataJson ?>,
                backgroundColor: <?= $statusColorsJson ?>,
                borderWidth: 0,
                hoverOffset: 6,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: textColor,
                        padding: 12,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        font: { size: 11 }
                    }
                },
                tooltip: {
                    backgroundColor: tooltipBg,
                    titleColor: tooltipTitle,
                    bodyColor: tooltipBody,
                    borderColor: tooltipBorder,
                    borderWidth: 1,
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(ctx) {
                            const total = ctx.dataset.data.reduce((a, b) => a + b, 0);
                            const pct = total > 0 ? ((ctx.parsed / total) * 100).toFixed(1) : 0;
                            return ctx.label + ': ' + ctx.parsed + ' (' + pct + '%)';
                        }
                    }
                }
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', initCharts);
document.addEventListener('theme-changed', initCharts);
</script>

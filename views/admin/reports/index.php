<?php
$monthlyRevenue = $data['monthlyRevenue'] ?? [];
$totalRevenue   = $data['totalRevenue'] ?? 0;
$topProducts    = $data['topProducts'] ?? [];
$userSignups    = $data['userSignups'] ?? [];
$maxRevenue = $monthlyRevenue ? max(array_column($monthlyRevenue, 'revenue')) : 1;
$maxSignups = $userSignups ? max(array_column($userSignups, 'count')) : 1;
$maxSold = $topProducts ? max(array_column($topProducts, 'total_sold')) : 1;
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-normal mb-0">Reports</h5>
    <div class="d-flex gap-2">
        <a href="<?= url('admin/reports/export/sales') ?>" class="btn btn-outline-dark btn-sm"><i class="icon icon-Download"></i> Sales CSV</a>
        <a href="<?= url('admin/reports/export/products') ?>" class="btn btn-outline-dark btn-sm"><i class="icon icon-Download"></i> Products CSV</a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Monthly Sales</div>
            <div class="card-body">
                <?php if (empty($monthlyRevenue)): ?>
                <div class="text-center text-secondary py-4" style="font-size:14px;">No sales data.</div>
                <?php else: ?>
                <table class="table admin-table mb-0">
                    <thead><tr><th>Month</th><th>Revenue</th><th>Orders</th><th></th></tr></thead>
                    <tbody>
                        <?php foreach ($monthlyRevenue as $m): ?>
                        <?php $pct = $maxRevenue > 0 ? ($m['revenue'] / $maxRevenue) * 100 : 0; ?>
                        <tr>
                            <td><?= e($m['month']) ?></td>
                            <td><?= formatPrice($m['revenue']) ?></td>
                            <td><?= (int) $m['order_count'] ?></td>
                            <td style="width:120px;"><div style="height:20px;background:#eee;border-radius:4px;overflow:hidden;"><div style="height:100%;width:<?= $pct ?>%;background:#111;border-radius:4px;transition:width .5s;"></div></div></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="mt-2 text-end text-secondary" style="font-size:13px;">Total: <?= formatPrice($totalRevenue) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">User Signups (12mo)</div>
            <div class="card-body">
                <?php if (empty($userSignups)): ?>
                <div class="text-center text-secondary py-4" style="font-size:14px;">No signup data.</div>
                <?php else: ?>
                <div class="d-flex align-items-end gap-2" style="height:160px;">
                    <?php foreach ($userSignups as $u): ?>
                    <?php $pct = $maxSignups > 0 ? ($u['count'] / $maxSignups) * 100 : 0; ?>
                    <div class="flex-grow-1 d-flex flex-column align-items-center justify-content-end h-100">
                        <div style="font-size:10px;color:#888;margin-bottom:4px;"><?= $u['count'] ?></div>
                        <div style="width:100%;max-width:40px;height:<?= max(4, $pct) ?>%;background:#111;border-radius:4px 4px 0 0;"></div>
                        <div style="font-size:9px;color:#aaa;margin-top:4px;"><?= substr($u['month'], 5, 2) ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold">Product Performance</div>
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead><tr><th>#</th><th>Product</th><th>Price</th><th>Stock</th><th>Sold</th><th>Revenue</th><th></th></tr></thead>
            <tbody>
                <?php if (empty($topProducts)): ?>
                <tr><td colspan="7" class="text-center text-secondary py-4">No product sales data.</td></tr>
                <?php else: ?>
                <?php foreach ($topProducts as $i => $p): ?>
                <?php $pct = $maxSold > 0 ? ($p['total_sold'] / $maxSold) * 100 : 0; ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><a href="<?= url('admin/products/' . $p['id'] . '/edit') ?>" class="text-dark"><?= e($p['name']) ?></a></td>
                    <td><?= formatPrice($p['price']) ?></td>
                    <td><span class="badge bg-<?= $p['stock_quantity'] <= 10 ? 'warning' : 'success' ?>"><?= (int) $p['stock_quantity'] ?></span></td>
                    <td><?= (int) $p['total_sold'] ?></td>
                    <td><?= formatPrice($p['total_revenue']) ?></td>
                    <td style="width:100px;"><div style="height:16px;background:#eee;border-radius:4px;overflow:hidden;"><div style="height:100%;width:<?= $pct ?>%;background:#111;border-radius:4px;"></div></div></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$orders = $data['orders'] ?? [];
$status = $data['status'] ?? '';
$governorateId = $data['governorate_id'] ?? '';
$governorates = $data['governorates'] ?? [];
$pagination = $data['pagination'] ?? [];
?>
<div class="filter-bar">
    <a href="<?= url('admin/orders') ?>" class="btn-admin btn-admin-sm <?= !$status ? 'btn-active' : '' ?>">All</a>
    <?php foreach (['pending','confirmed','processing','shipped','delivered','cancelled','return_requested','returned'] as $s): ?>
    <a href="<?= url('admin/orders?status=' . $s) ?>" class="btn-admin btn-admin-sm <?= $status === $s ? 'btn-active' : '' ?>"><?= ucfirst(str_replace('_', ' ', $s)) ?></a>
    <?php endforeach; ?>
    <select name="governorate_id" class="form-select form-select-sm" style="width:auto;min-width:160px;" onchange="window.location='<?= url('admin/orders') ?>?governorate_id='+this.value<?= $status ? "+'&status=<?= $status ?>'" : '' ?>">
        <option value="">All Governorates</option>
        <?php foreach ($governorates as $g): ?>
        <option value="<?= $g['id'] ?>" <?= $governorateId == $g['id'] ? 'selected' : '' ?>><?= e($g['name_en']) ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="card-admin">
    <div class="card-header-chart">
        <span>Orders <?= $status ? '— ' . ucfirst(str_replace('_', ' ', $status)) : '' ?></span>
        <span class="card-header-sub"><?= $pagination['total'] ?? 0 ?> total</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive-wrap">
        <table class="admin-table mb-0 w-100">
            <thead><tr><th>Order #</th><th>Customer</th><th>Total</th><th>Governorate</th><th>Status</th><th>Date</th><th></th></tr></thead>
            <tbody>
                <?php if (empty($orders)): ?>
                <tr><td colspan="7" class="text-center text-secondary py-4">No orders found</td></tr>
                <?php else: ?>
                <?php foreach ($orders as $o): ?>
                <tr>
                    <td><a href="<?= url('admin/orders/' . $o['id']) ?>">#<?= e($o['order_number'] ?? $o['id']) ?></a></td>
                    <td><?= e($o['user_name'] ?? '—') ?><br><span class="text-secondary" style="font-size:11px;"><?= e($o['user_email'] ?? '') ?></span></td>
                    <td class="fw-semibold"><?= formatPrice($o['total'] ?? 0) ?></td>
                    <td><span style="font-size:12px;color:var(--admin-text-secondary)"><?= e($o['governorate_name'] ?? '—') ?></span></td>
                    <td><span class="badge-admin status-<?= $o['status'] ?? 'pending' ?>"><?= e(ucfirst(str_replace('_', ' ', $o['status'] ?? 'pending'))) ?></span></td>
                    <td class="text-secondary" style="white-space:nowrap;"><?= formatDate($o['created_at'] ?? '', 'M d, Y') ?></td>
                    <td><a href="<?= url('admin/orders/' . $o['id']) ?>" class="btn-admin btn-admin-sm">View</a></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<?php if ($pagination['last_page'] ?? 0 > 1): ?>
<div class="mt-3 d-flex justify-content-center gap-1">
    <?php for ($i = 1; $i <= $pagination['last_page']; $i++): ?>
    <a href="<?= url('admin/orders?page=' . $i . ($status ? '&status=' . $status : '') . ($governorateId ? '&governorate_id=' . $governorateId : '')) ?>" class="btn-admin btn-admin-sm <?= $i === $pagination['current_page'] ? 'btn-active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>

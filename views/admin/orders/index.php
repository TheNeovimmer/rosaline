<?php $orders = $data['orders'] ?? []; $status = $data['status'] ?? ''; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-normal mb-0">Orders</h5>
</div>
<form method="get" class="d-flex gap-2 mb-3 flex-wrap">
    <a href="<?= url('admin/orders') ?>" class="btn btn-sm <?= !$status ? 'btn-dark' : 'btn-outline-dark' ?>">All</a>
    <?php foreach (['pending','confirmed','processing','shipped','delivered','cancelled','return_requested','returned'] as $s): ?>
    <a href="<?= url('admin/orders?status=' . $s) ?>" class="btn btn-sm <?= $status === $s ? 'btn-dark' : 'btn-outline-dark' ?>"><?= ucfirst(str_replace('_', ' ', $s)) ?></a>
    <?php endforeach; ?>
    <select name="governorate_id" class="form-select form-select-sm" style="width:auto" onchange="this.form.submit()">
        <option value="">All Governorates</option>
        <?php foreach ($data['governorates'] ?? [] as $g): ?>
        <option value="<?= $g['id'] ?>" <?= ($data['governorate_id'] ?? '') == $g['id'] ? 'selected' : '' ?>><?= e($g['name_en']) ?></option>
        <?php endforeach; ?>
    </select>
</form>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table admin-table mb-0">
            <thead><tr><th>Order #</th><th>Customer</th><th>Total</th><th>Status</th><th>Date</th><th>Actions</th></tr></thead>
            <tbody>
                <?php if (empty($orders)): ?>
                <tr><td colspan="6" class="text-center text-secondary py-4">No orders found</td></tr>
                <?php else: ?>
                <?php foreach ($orders as $o): ?>
                <tr>
                    <td>#<?= e($o['order_number'] ?? $o['id']) ?></td>
                    <td><?= e($o['user_name'] ?? '—') ?><br><small style="color:#888;"><?= e($o['user_email'] ?? '') ?></small></td>
                    <td><?= formatPrice($o['total'] ?? 0) ?></td>
                    <td>
                        <?php $colors = ['pending'=>'warning','confirmed'=>'info','processing'=>'primary','shipped'=>'primary','delivered'=>'success','cancelled'=>'danger','return_requested'=>'warning','returned'=>'secondary']; ?>
                        <span class="badge bg-<?= $colors[$o['status']] ?? 'secondary' ?>"><?= e(ucfirst(str_replace('_', ' ', $o['status'] ?? 'pending'))) ?></span>
                    </td>
                    <td style="white-space:nowrap;"><?= formatDate($o['created_at'] ?? '', 'M d, Y') ?></td>
                    <td><a href="<?= url('admin/orders/' . $o['id']) ?>" class="btn btn-outline-secondary btn-sm">View</a></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php if (!empty($data['pagination']) && $data['pagination']['last_page'] > 1): ?>
<div class="mt-3 d-flex justify-content-center gap-1">
    <?php for ($i = 1; $i <= $data['pagination']['last_page']; $i++): ?>
    <a href="<?= url('admin/orders?page=' . $i . ($status ? '&status=' . $status : '') . (!empty($data['governorate_id']) ? '&governorate_id=' . $data['governorate_id'] : '')) ?>" class="btn btn-sm <?= $i === $data['pagination']['current_page'] ? 'btn-dark' : 'btn-outline-dark' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>

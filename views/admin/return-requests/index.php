<?php $orders = $data['orders'] ?? []; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-normal mb-0">Return Requests</h5>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>Order #</th><th>Customer</th><th>Total</th><th>Date</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($orders)): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-4">No return requests</td></tr>
                    <?php else: ?>
                    <?php $userNames = []; ?>
                    <?php foreach ($orders as $o): ?>
                    <?php
                        if (!isset($userNames[$o['user_id']])) {
                            $u = \App\Core\Database::fetch("SELECT name, email FROM users WHERE id = ?", [$o['user_id']]);
                            $userNames[$o['user_id']] = $u ? $u['name'] . ' (' . $u['email'] . ')' : '—';
                        }
                    ?>
                    <tr>
                        <td>#<?= e($o['order_number'] ?? $o['id']) ?></td>
                        <td><?= e($userNames[$o['user_id']]) ?></td>
                        <td><?= formatPrice($o['total'] ?? 0) ?></td>
                        <td style="white-space:nowrap;"><?= formatDate($o['created_at'] ?? '', 'M d, Y') ?></td>
                        <td>
                            <div class="d-flex gap-1">
                                <form method="post" action="<?= url('admin/return-requests/' . $o['id'] . '/approve') ?>" style="display:inline">
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Approve return & restitute stock?')">Approve</button>
                                </form>
                                <form method="post" action="<?= url('admin/return-requests/' . $o['id'] . '/reject') ?>" style="display:inline">
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Reject return request?')">Reject</button>
                                </form>
                                <a href="<?= url('admin/orders/' . $o['id']) ?>" class="btn btn-outline-secondary btn-sm">View</a>
                            </div>
                        </td>
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
    <a href="<?= url('admin/return-requests?page=' . $i) ?>" class="btn btn-sm <?= $i === $data['pagination']['current_page'] ? 'btn-dark' : 'btn-outline-dark' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>
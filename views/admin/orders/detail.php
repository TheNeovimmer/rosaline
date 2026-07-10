<?php $order = $data['order'] ?? []; ?>
<?php $history = $data['history'] ?? []; ?>
<div class="mb-3 d-flex justify-content-between">
    <a href="<?= url('admin/orders') ?>" class="text-decoration-none">&larr; Back to Orders</a>
    <a href="<?= url('admin/orders/' . $order['id'] . '/invoice') ?>" class="btn btn-outline-primary btn-sm" target="_blank">Print Invoice</a>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Customer</div>
            <div class="card-body">
                <p class="mb-1"><strong><?= e($order['user_name'] ?? '—') ?></strong></p>
                <p class="mb-1"><?= e($order['user_email'] ?? '') ?></p>
                <p class="mb-0"><strong>Phone:</strong> <?= e($order['phone'] ?? '-') ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Shipping</div>
            <div class="card-body">
                <p class="mb-1"><?= nl2br(e($order['shipping_address'] ?? '—')) ?></p>
                <?php if (!empty($data['govName'])): ?>
                <p class="mb-1"><strong>Governorate:</strong> <?= e($data['govName']) ?></p>
                <?php endif; ?>
                <p class="mb-0"><strong>Shipping Fee:</strong> <?= formatPrice($order['shipping_fee'] ?? 0) ?></p>
                <?php if (!empty($order['delivery_notes'])): ?>
                <p class="mb-0 mt-1"><strong>Notes:</strong> <?= e($order['delivery_notes']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Payment & Status</div>
            <div class="card-body">
                <p class="mb-1"><strong>Method:</strong> Cash on Delivery</p>
                <p class="mb-1">
                    <strong>Status:</strong>
                    <span class="badge bg-<?= $order['status'] === 'delivered' ? 'success' : ($order['status'] === 'cancelled' || $order['status'] === 'returned' ? 'danger' : ($order['status'] === 'return_requested' ? 'warning' : 'primary')) ?> bg-opacity-10 text-<?= $order['status'] === 'delivered' ? 'success' : ($order['status'] === 'cancelled' || $order['status'] === 'returned' ? 'danger' : ($order['status'] === 'return_requested' ? 'warning' : 'primary')) ?> px-3 py-2 rounded-pill">
                        <?= ucfirst(str_replace('_', ' ', $order['status'] ?? 'pending')) ?>
                    </span>
                </p>
                <p class="mb-0"><strong>Total:</strong> <?= formatPrice($order['total'] ?? 0) ?></p>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mt-3">
    <div class="card-header bg-white fw-semibold">
        Order #<?= e($order['order_number'] ?? $order['id']) ?> — Items
    </div>
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $orderItems = $order['items'] ?? []; ?>
                <?php if (empty($orderItems)): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-4">No items</td></tr>
                <?php else: ?>
                    <?php foreach ($orderItems as $item): ?>
                        <tr>
                            <td>
                                <?php if (!empty($item['image'])): ?>
                                    <img loading="lazy" src="<?= url(e($item['image'])) ?>" alt="" style="width:50px;height:50px;object-fit:cover;border-radius:4px;">
                                <?php else: ?>
                                    <span class="text-secondary">—</span>
                                <?php endif; ?>
                            </td>
                            <td><?= e($item['name'] ?? '') ?></td>
                            <td><?= formatPrice($item['price'] ?? 0) ?></td>
                            <td><?= (int)($item['quantity'] ?? $item['qty'] ?? 1) ?></td>
                            <td><?= formatPrice(($item['price'] ?? 0) * ($item['quantity'] ?? $item['qty'] ?? 1)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Shipping</th>
                    <th><?= formatPrice($order['shipping_fee'] ?? 0) ?></th>
                </tr>
                <tr>
                    <th colspan="4" class="text-end">Total</th>
                    <th><?= formatPrice($order['total'] ?? 0) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php if (!empty($history)): ?>
<div class="card border-0 shadow-sm mt-3">
    <div class="card-header bg-white fw-semibold">Status Timeline</div>
    <div class="card-body">
        <ul class="list-unstyled mb-0">
        <?php foreach ($history as $h): ?>
            <li class="mb-2 pb-2 border-bottom">
                <strong><?= ucfirst(str_replace('_', ' ', $h['to_status'])) ?></strong>
                <span class="text-muted ms-2 small"><?= date('d/m/Y H:i', strtotime($h['created_at'])) ?></span>
                <?php if ($h['created_by_name']): ?>
                <span class="text-muted small">by <?= e($h['created_by_name']) ?></span>
                <?php endif; ?>
                <?php if ($h['note']): ?>
                <p class="mb-0 text-muted small"><?= e($h['note']) ?></p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php endif; ?>

<div class="card border-0 shadow-sm mt-3">
    <div class="card-header bg-white fw-semibold">Update Status</div>
    <div class="card-body">
        <form method="post" action="<?= url('admin/orders/' . $order['id'] . '/status') ?>" class="row g-2 align-items-end">
            <?= csrf_field() ?>
            <div class="col-auto">
                <select name="status" class="form-select">
                    <?php
                    $statuses = ['confirmed', 'processing', 'shipped', 'delivered', 'cancelled'];
                    $current  = $order['status'] ?? 'pending';
                    foreach ($statuses as $s): ?>
                        <option value="<?= $s ?>" <?= $s === $current ? 'selected' : '' ?>><?= ucfirst(str_replace('_', ' ', $s)) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <input type="text" name="note" class="form-control" placeholder="Optional note...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-dark btn-sm">Update</button>
            </div>
        </form>
        <p class="text-muted small mt-2 mb-0">Valid transitions: pending→confirmed→processing→shipped→delivered. Cancellable at any stage.</p>
    </div>
</div>

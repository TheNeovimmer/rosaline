<?php $order = $data['order'] ?? []; ?>
<div class="mb-3">
    <a href="<?= url('admin/orders') ?>" class="text-decoration-none">&larr; Back to Orders</a>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Customer</div>
            <div class="card-body">
                <p class="mb-1"><strong><?= e($order['user_name'] ?? '—') ?></strong></p>
                <p class="mb-1"><?= e($order['user_email'] ?? '') ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Shipping Address</div>
            <div class="card-body">
                <?php $sa = $order['shipping_address'] ?? []; ?>
                <p class="mb-1"><?= e($sa['line1'] ?? '—') ?></p>
                <?php if (!empty($sa['line2'])): ?><p class="mb-1"><?= e($sa['line2']) ?></p><?php endif; ?>
                <p class="mb-1"><?= e(($sa['city'] ?? '') . ', ' . ($sa['state'] ?? '') . ' ' . ($sa['zip'] ?? '')) ?></p>
                <p class="mb-0"><?= e($sa['country'] ?? '') ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Billing Address</div>
            <div class="card-body">
                <?php $ba = $order['billing_address'] ?? $sa ?? []; ?>
                <p class="mb-1"><?= e($ba['line1'] ?? '—') ?></p>
                <?php if (!empty($ba['line2'])): ?><p class="mb-1"><?= e($ba['line2']) ?></p><?php endif; ?>
                <p class="mb-1"><?= e(($ba['city'] ?? '') . ', ' . ($ba['state'] ?? '') . ' ' . ($ba['zip'] ?? '')) ?></p>
                <p class="mb-0"><?= e($ba['country'] ?? '') ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mt-2">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Payment</div>
            <div class="card-body">
                <p class="mb-1">
                    <strong>Method:</strong>
                    <?php
                    $pm = $order['payment_method'] ?? '—';
                    $labels = ['cod' => 'Cash on Delivery', 'credit-card' => 'Credit/Debit Card', 'paypal' => 'PayPal', 'apple-pay' => 'Apple Pay'];
                    echo e($labels[$pm] ?? ucfirst(str_replace('-', ' ', $pm)));
                    ?>
                </p>
                <p class="mb-0">
                    <strong>Status:</strong>
                    <?php $ps = $order['payment_status'] ?? 'pending'; ?>
                    <span class="badge bg-<?= $ps === 'paid' ? 'success' : ($ps === 'failed' ? 'danger' : 'warning') ?> bg-opacity-10 text-<?= $ps === 'paid' ? 'success' : ($ps === 'failed' ? 'danger' : 'warning') ?> px-3 py-2 rounded-pill">
                        <?= ucfirst($ps) ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Order Status</div>
            <div class="card-body">
                <span class="badge bg-<?= $order['status'] === 'delivered' ? 'success' : ($order['status'] === 'cancelled' ? 'danger' : 'primary') ?> bg-opacity-10 text-<?= $order['status'] === 'delivered' ? 'success' : ($order['status'] === 'cancelled' ? 'danger' : 'primary') ?> px-3 py-2 rounded-pill">
                    <?= ucfirst($order['status'] ?? 'pending') ?>
                </span>
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
                                    <img loading="lazy" src="<?= url(e($item['image'])) ?>" alt="">
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
                    <th colspan="4" class="text-end">Total</th>
                    <th><?= formatPrice($order['total'] ?? 0) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="card border-0 shadow-sm mt-3">
    <div class="card-header bg-white fw-semibold">Update Status</div>
    <div class="card-body">
        <form method="post" action="<?= url('admin/orders/' . $order['id'] . '/status') ?>" class="row g-2 align-items-end">
            <?= csrf_field() ?>
            <div class="col-auto">
                <select name="status" class="form-select">
                    <?php
                    $statuses = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];
                    $current  = $order['status'] ?? 'pending';
                    foreach ($statuses as $s): ?>
                        <option value="<?= $s ?>" <?= $s === $current ? 'selected' : '' ?>><?= ucfirst($s) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-dark btn-sm">Update</button>
            </div>
        </form>
    </div>
</div>
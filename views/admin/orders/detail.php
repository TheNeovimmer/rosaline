<?php
$order = $data['order'] ?? [];
$history = $data['history'] ?? [];
$govName = $data['gov_name'] ?? '';
?>
<div class="mb-3 d-flex justify-content-between align-items-center">
    <a href="<?= url('admin/orders') ?>" class="text-decoration-none" style="color:var(--admin-text-secondary);font-size:13px;">&larr; Back to Orders</a>
    <a href="<?= url('admin/orders/' . $order['id'] . '/invoice') ?>" class="btn-admin btn-admin-sm" target="_blank">Print Invoice</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card-admin h-100">
            <div class="card-header-chart"><span>Customer</span></div>
            <div class="card-body">
                <div style="font-size:14px;font-weight:600;color:var(--admin-text);"><?= e($order['user_name'] ?? '—') ?></div>
                <div style="font-size:13px;color:var(--admin-text-secondary);"><?= e($order['user_email'] ?? '') ?></div>
                <div style="font-size:13px;color:var(--admin-text-secondary);margin-top:4px;"><strong>Phone:</strong> <?= e($order['phone'] ?? '-') ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-admin h-100">
            <div class="card-header-chart"><span>Shipping</span></div>
            <div class="card-body">
                <div style="font-size:13px;color:var(--admin-text);"><?= nl2br(e($order['shipping_address'] ?? '—')) ?></div>
                <?php if ($govName): ?>
                <div style="font-size:13px;color:var(--admin-text-secondary);margin-top:4px;"><strong>Governorate:</strong> <?= e($govName) ?></div>
                <?php endif; ?>
                <?php if (!empty($order['shipping_name'])): ?>
                <div style="font-size:13px;color:var(--admin-text-secondary);"><strong>Recipient:</strong> <?= e($order['shipping_name']) ?> (<?= e($order['shipping_phone'] ?? '-') ?>)</div>
                <?php endif; ?>
                <div style="font-size:13px;color:var(--admin-text-secondary);"><strong>Shipping Fee:</strong> <?= formatPrice($order['shipping_fee'] ?? 0) ?></div>
                <?php if (!empty($order['delivery_notes'])): ?>
                <div style="font-size:12px;color:var(--admin-text-secondary);margin-top:4px;padding:8px;background:var(--admin-bg);border-radius:6px;"><strong>Notes:</strong> <?= e($order['delivery_notes']) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-admin h-100">
            <div class="card-header-chart"><span>Payment & Status</span></div>
            <div class="card-body">
                <div style="font-size:13px;color:var(--admin-text-secondary);"><strong>Method:</strong> Cash on Delivery</div>
                <div style="font-size:13px;margin-top:4px;">
                    <strong>Status:</strong>
                    <span class="badge-admin status-<?= $order['status'] ?? 'pending' ?>"><?= e(ucfirst(str_replace('_', ' ', $order['status'] ?? 'pending'))) ?></span>
                </div>
                <div style="font-size:13px;color:var(--admin-text-secondary);margin-top:4px;">
                    <?php if (!empty($order['tracking_number'])): ?><strong>Tracking:</strong> <?= e($order['tracking_number']) ?><br><?php endif; ?>
                    <?php if (!empty($order['estimated_delivery'])): ?><strong>Est. Delivery:</strong> <?= $order['estimated_delivery'] ?><?php endif; ?>
                </div>
                <div style="font-size:16px;font-weight:700;color:var(--admin-text);margin-top:8px;"><?= formatPrice($order['total'] ?? 0) ?></div>
            </div>
        </div>
    </div>
</div>

<div class="card-admin mb-4">
    <div class="card-header-chart"><span>Order #<?= e($order['order_number'] ?? $order['id']) ?> — Items</span></div>
    <div class="card-body p-0">
        <div class="table-responsive-wrap">
        <table class="admin-table mb-0 w-100">
            <thead><tr><th>Image</th><th>Product</th><th>Price</th><th>Qty</th><th>Subtotal</th></tr></thead>
            <tbody>
                <?php $items = $order['items'] ?? []; ?>
                <?php if (empty($items)): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-4">No items</td></tr>
                <?php else: ?>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td>
                                <?php if (!empty($item['image'])): ?>
                                    <img loading="lazy" src="<?= url(e($item['image'])) ?>" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;">
                                <?php else: ?>
                                    <span style="display:inline-flex;width:48px;height:48px;border-radius:8px;background:var(--admin-bg);align-items:center;justify-content:center;font-size:10px;color:var(--admin-text-secondary);">No img</span>
                                <?php endif; ?>
                            </td>
                            <td><?= e($item['product_name'] ?? $item['name'] ?? '') ?></td>
                            <td><?= formatPrice($item['product_price'] ?? $item['price'] ?? 0) ?></td>
                            <td><?= (int)($item['quantity'] ?? 1) ?></td>
                            <td><?= formatPrice(($item['product_price'] ?? $item['price'] ?? 0) * ($item['quantity'] ?? 1)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr><th colspan="4" class="text-end">Subtotal</th><th><?= formatPrice($order['subtotal'] ?? 0) ?></th></tr>
                <tr><th colspan="4" class="text-end">Shipping</th><th><?= formatPrice($order['shipping_fee'] ?? 0) ?></th></tr>
                <tr><th colspan="4" class="text-end">Total</th><th><?= formatPrice($order['total'] ?? 0) ?></th></tr>
            </tfoot>
        </table>
        </div>
    </div>
</div>

<?php if (!empty($history)): ?>
<div class="card-admin mb-4">
    <div class="card-header-chart"><span>Status Timeline</span></div>
    <div class="card-body">
        <div style="position:relative;padding-left:24px;">
            <?php foreach ($history as $i => $h): ?>
            <div style="position:relative;padding-bottom:16px;border-left:2px solid var(--admin-border);padding-left:20px;margin-left:0;">
                <span style="position:absolute;left:-7px;top:0;width:12px;height:12px;border-radius:50%;background:<?= match($h['to_status']) {'delivered'=>'#10b981','cancelled'=>'#ef4444','returned'=>'#6b7280',default=>'var(--admin-primary)'} ?>;border:2px solid var(--admin-surface);"></span>
                <div style="font-size:13px;font-weight:600;color:var(--admin-text);"><?= e(ucfirst(str_replace('_', ' ', $h['to_status']))) ?></div>
                <div style="font-size:11px;color:var(--admin-text-secondary);">
                    <?= date('M d, Y H:i', strtotime($h['created_at'])) ?>
                    <?php if ($h['created_by_name']): ?> &middot; by <?= e($h['created_by_name']) ?><?php endif; ?>
                </div>
                <?php if ($h['note']): ?>
                <div style="font-size:12px;color:var(--admin-text-secondary);margin-top:2px;"><?= e($h['note']) ?></div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="card-admin mb-4">
    <div class="card-header-chart"><span>Update Status</span></div>
    <div class="card-body">
        <form method="post" action="<?= url('admin/orders/' . $order['id'] . '/status') ?>" class="row g-2 align-items-end">
            <?= csrf_field() ?>
            <div class="col-auto">
                <select name="status" class="form-select">
                    <?php
                    $nextStatuses = match($order['status'] ?? 'pending') {
                        'pending' => ['confirmed', 'cancelled'],
                        'confirmed' => ['processing', 'cancelled'],
                        'processing' => ['shipped', 'cancelled'],
                        'shipped' => ['delivered', 'cancelled'],
                        'delivered' => [],
                        'cancelled' => [],
                        'return_requested' => ['returned', 'delivered'],
                        'returned' => [],
                        default => []
                    };
                    $current  = $order['status'] ?? 'pending';
                    foreach ($nextStatuses as $s): ?>
                        <option value="<?= $s ?>"><?= ucfirst(str_replace('_', ' ', $s)) ?></option>
                    <?php endforeach; ?>
                    <?php if (empty($nextStatuses)): ?>
                        <option value="" disabled selected>No transitions available</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col">
                <input type="text" name="note" class="form-control" placeholder="Optional note..." style="border-radius:8px;">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn-admin">Update</button>
            </div>
        </form>
        <div style="font-size:11px;color:var(--admin-text-secondary);margin-top:8px;">
            Flow: pending &rarr; confirmed &rarr; processing &rarr; shipped &rarr; delivered.
            Cancellable at any stage before delivery.
        </div>
    </div>
</div>

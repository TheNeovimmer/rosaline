<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice #<?= e($order['order_number']) ?></title>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Courier New', monospace; font-size: 12px; color: #000; padding: 20px; }
    .invoice-box { max-width: 720px; margin: 0 auto; border: 2px solid #000; padding: 30px; }
    h1 { font-size: 24px; text-transform: uppercase; letter-spacing: 4px; margin-bottom: 4px; }
    .header { display: flex; justify-content: space-between; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 2px dashed #000; }
    .header-right { text-align: right; font-size: 11px; }
    .section { margin-bottom: 16px; }
    .section-title { font-weight: bold; font-size: 11px; text-transform: uppercase; letter-spacing: 2px; border-bottom: 1px solid #000; padding-bottom: 4px; margin-bottom: 8px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 6px 4px; text-align: left; border-bottom: 1px solid #ccc; }
    th { font-size: 10px; text-transform: uppercase; letter-spacing: 1px; }
    .total-row td { font-weight: bold; border-top: 2px solid #000; padding-top: 8px; }
    .grand-total td { font-size: 14px; }
    .totals { margin-top: 16px; }
    .totals table { width: auto; margin-left: auto; }
    .totals td { padding: 3px 12px; border: none; }
    .totals .final td { border-top: 2px solid #000; font-weight: bold; font-size: 14px; }
    .footer { margin-top: 20px; padding-top: 12px; border-top: 2px dashed #000; text-align: center; font-size: 10px; }
    .print-btn { display: block; text-align: center; margin: 20px auto; }
    .print-btn button { padding: 10px 30px; font-size: 14px; cursor: pointer; background: #000; color: #fff; border: none; }
    @media print { .print-btn { display: none; } }
</style>
</head>
<body>
<div class="print-btn"><button onclick="window.print()">Print Invoice</button></div>
<div class="invoice-box">
    <div class="header">
        <div>
            <h1>INVOICE</h1>
            <p style="font-size:10px;"><?= e($app['name'] ?? 'Rosaline') ?></p>
        </div>
        <div class="header-right">
            <p><strong>Order #:</strong> <?= e($order['order_number']) ?></p>
            <p><strong>Date:</strong> <?= formatDate($order['created_at'], 'M d, Y') ?></p>
            <p><strong>Status:</strong> <?= e(ucfirst(str_replace('_', ' ', $order['status']))) ?></p>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Bill To</div>
        <p><?= e($order['shipping_name'] ?? $order['user_name'] ?? '') ?></p>
        <p><?= e($order['phone'] ?? $order['shipping_phone'] ?? '') ?></p>
        <?php if ($order['shipping_address'] ?? false): ?>
        <p><?= nl2br(e($order['shipping_address'])) ?></p>
        <?php endif; ?>
        <p><?= e($gov_name) ?></p>
    </div>

    <div class="section">
        <div class="section-title">Items</div>
        <table>
            <thead>
                <tr><th>Item</th><th style="text-align:center;">Qty</th><th style="text-align:right;">Price</th><th style="text-align:right;">Total</th></tr>
            </thead>
            <tbody>
                <?php foreach ($order['items'] as $item): ?>
                <tr>
                    <td><?= e($item['name']) ?></td>
                    <td style="text-align:center;"><?= (int)$item['quantity'] ?></td>
                    <td style="text-align:right;"><?= formatPrice($item['product_price'] ?? $item['price']) ?></td>
                    <td style="text-align:right;"><?= formatPrice(($item['product_price'] ?? $item['price']) * $item['quantity']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="totals">
        <table>
            <tr><td>Subtotal</td><td style="text-align:right;"><?= formatPrice($order['subtotal'] ?? $order['total']) ?></td></tr>
            <?php if (($order['shipping_fee'] ?? 0) > 0): ?>
            <tr><td>Shipping (<?= e($gov_name) ?>)</td><td style="text-align:right;"><?= formatPrice($order['shipping_fee']) ?></td></tr>
            <?php endif; ?>
            <tr class="final"><td>TOTAL</td><td style="text-align:right;"><?= formatPrice($order['total']) ?></td></tr>
        </table>
    </div>

    <div class="footer">
        <p><?= e($app['name'] ?? 'Rosaline') ?> — Cash on Delivery</p>
        <p style="font-size:9px;">Thank you for your purchase</p>
    </div>
</div>
</body>
</html>
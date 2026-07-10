<?php $pageTitle = 'Order Detail'; $history = $data['history'] ?? []; ?>
<section class="tf-page-heading_account flat-spacing">
    <div class="container">
        <a href="<?= url('account/orders') ?>" class="content d-inline-flex">
            <div class="account-icon d-flex">
                <i class="icon icon-ArrowLeft fs-24"></i>
            </div>
            <div class="account-infor">
                <h3 class="info_name font-instrument_serif mb-8">Order #<?= e($order['order_number']) ?></h3>
                <p class="info_more cl-text-5">Placed on <?= formatDate($order['created_at']) ?></p>
            </div>
        </a>
    </div>
</section>
<div class="account-order-detail flat-spacing-2">
    <div class="container">
        <div class="row gy-24">
            <div class="col-lg-8">
                <div class="col-left">
                    <div class="order-detail-timeline account-order_item mb-24">
                        <div class="order-heading">
                            <div>
                                <h6 class="font-instrument_serif mb-8">Tracking Timeline</h6>
                            </div>
                            <p class="order__tag <?= strtolower($order['status']) ?> text-body-s"><?= e(ucfirst(str_replace('_', ' ', $order['status']))) ?></p>
                        </div>
                        <div class="order-content">
                            <?php if (empty($history)): ?>
                            <p class="text-body-s cl-text-5">No status updates yet.</p>
                            <?php else: ?>
                            <div class="timeline-wrap">
                                <?php foreach ($history as $i => $entry): ?>
                                <div class="timeline-item step-done">
                                    <?php if ($i < count($history) - 1): ?><span class="step-line"></span><?php endif; ?>
                                    <span class="ic-wrap"><i class="icon icon-CircleCheck"></i></span>
                                    <div class="tl-content">
                                        <div class="info_left">
                                            <p class="tl_title fw-normal mb-6"><?= e(ucfirst(str_replace('_', ' ', $entry['status']))) ?></p>
                                            <p class="tl_desc text-body-s cl-text-5"><?= e($entry['notes'] ?? '') ?> — <?= formatDate($entry['created_at']) ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="account-order_item type-2">
                        <div class="order-content">
                            <h6 class="font-instrument_serif">Order Items</h6>
                            <ul class="list-prd">
                                <?php $orderItems = $order['items'] ?? []; ?>
                                <?php foreach ($orderItems as $item): ?>
                                <li class="prd-item">
                                    <div class="prd_image">
                                        <img loading="lazy" width="74" height="88" src="<?= url($item['image']) ?>" alt="<?= e($item['name']) ?>">
                                    </div>
                                    <div class="prd_infor">
                                        <div class="infor-wr">
                                            <a href="<?= url('product/' . $item['slug']) ?>" class="info__name fw-normal link-underline mb-6"><?= e($item['name']) ?></a>
                                            <p class="info__qty text-body-s cl-text-5">Qty: <?= $item['quantity'] ?></p>
                                        </div>
                                        <p class="info__price fw-normal"><?= formatPrice(($item['product_price'] ?? $item['price']) * $item['quantity']) ?></p>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-right">
                    <div class="box-summary">
                        <h6 class="title font-instrument_serif">Order Summary</h6>
                        <ul class="tf-list vertical gap-16">
                            <li class="text-body-s">
                                <span class="cl-text-5">Subtotal</span>
                                <span><?= formatPrice($order['subtotal'] ?? $order['total']) ?></span>
                            </li>
                            <?php if (($order['shipping_fee'] ?? 0) > 0): ?>
                            <li class="text-body-s">
                                <span class="cl-text-5">Shipping</span>
                                <span><?= formatPrice($order['shipping_fee']) ?></span>
                            </li>
                            <?php endif; ?>
                            <li class="br-line bg-line-5"></li>
                            <li class="fw-normal">
                                <span>Total</span>
                                <span><?= formatPrice($order['total']) ?></span>
                            </li>
                            <li class="br-line bg-line-5"></li>
                            <li class="text-body-s">
                                <span class="cl-text-5">Payment</span>
                                <span>Cash on Delivery</span>
                            </li>
                        </ul>
                    </div>
                    <div class="box-shipping">
                        <h6 class="title font-instrument_serif">Shipping Address</h6>
                        <div>
                            <p class="fw-normal mb-8"><?= e($order['shipping_name'] ?? '') ?></p>
                            <p class="text-body-s cl-text-5">
                                <?php if ($order['phone'] ?? $order['delivery_notes'] ?? $order['shipping_phone'] ?? false): ?>
                                <strong>Phone:</strong> <?= e($order['phone'] ?? $order['delivery_notes'] ?? $order['shipping_phone'] ?? '') ?><br>
                                <?php endif; ?>
                                <?= nl2br(e($order['shipping_address'] ?? '')) ?><br>
                                <?php if (!empty($order['gov_name'])): ?>
                                <strong>Governorate:</strong> <?= e($order['gov_name']) ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-btn tf-list vertical gap-20">
                        <?php if (in_array($order['status'], ['pending','confirmed'])): ?>
                        <form method="post" action="<?= url('account/orders/' . $order['id'] . '/cancel') ?>" onsubmit="return confirm('Cancel this order?')">
                            <button type="submit" class="tf-btn type-2 style-2 w-100" style="background:#dc3545;border-color:#dc3545;">Cancel Order</button>
                        </form>
                        <?php elseif ($order['status'] === 'delivered'): ?>
                        <form method="post" action="<?= url('account/orders/' . $order['id'] . '/return') ?>" onsubmit="return confirm('Request a return?')">
                            <button type="submit" class="tf-btn type-2 style-2 w-100">Request Return</button>
                        </form>
                        <?php endif; ?>
                        <a href="<?= url('account/orders/' . $order['id'] . '/invoice') ?>" class="tf-btn-line" target="_blank">
                            <span class="fw-normal text-uppercase">View Invoice</span>
                        </a>
                        <a href="<?= url('contact') ?>" class="tf-btn type-2 style-2 w-100">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
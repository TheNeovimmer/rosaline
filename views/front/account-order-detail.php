<?php $pageTitle = 'Order Detail'; ?>
<!-- Page Title -->
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
<!-- Account -->
<div class="account-order-detail flat-spacing-2">
    <div class="container">
        <div class="row gy-24">
            <div class="col-lg-8">
                <div class="col-left">
                    <div class="order-detail-timeline account-order_item mb-24">
                        <div class="order-heading">
                            <div>
                                <h6 class="font-instrument_serif mb-8">Tracking Timeline</h6>
                                <p class="text-body-s cl-text-5">Tracking Number: <?= e($order['tracking_number'] ?? 'Not available') ?></p>
                            </div>
                            <p class="order__tag <?= strtolower($order['status']) ?> text-body-s"><?= e($order['status']) ?></p>
                        </div>
                        <div class="order-content">
                            <div class="timeline-wrap">
                                <?php $steps = [['Order Placed', 'Your order has been placed successfully', 'Box'], ['Processing', 'Your order is being prepared for shipment', 'Timer'], ['Shipped', 'Your order has been shipped', 'Truck'], ['In Transit', 'Package is on the way to your location', 'DotLocation'], ['Out for Delivery', 'Package will be delivered today', 'Truck'], ['Delivered', 'Package delivered to recipient', 'CircleCheck']]; ?>
                                <?php $stepIndex = match(strtolower($order['status'])) { 'pending' => 0, 'processing' => 1, 'shipped' => 2, 'in_transit' => 3, 'out_for_delivery' => 4, 'delivered' => 5, default => 0 }; ?>
                                <?php foreach ($steps as $i => $step): ?>
                                <div class="timeline-item <?= $i <= $stepIndex ? 'step-done' : '' ?>">
                                    <?php if ($i < count($steps) - 1): ?><span class="step-line"></span><?php endif; ?>
                                    <span class="ic-wrap"><i class="icon icon-<?= $step[2] ?>"></i></span>
                                    <div class="tl-content">
                                        <div class="info_left">
                                            <p class="tl_title fw-normal mb-6"><?= $step[0] ?></p>
                                            <p class="tl_desc text-body-s cl-text-5"><?= $step[1] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
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
                                        <p class="info__price fw-normal"><?= formatPrice($item['price'] * $item['quantity']) ?></p>
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
                    <div class="box-est">
                        <div class="ic-wrap"><i class="icon icon-Clock"></i></div>
                        <div class="est-info">
                            <p class="text-body-s cl-text-5 mb-6">Estimated Delivery</p>
                            <p class="fw-normal"><?= formatDate($order['estimated_delivery'] ?? 'Pending') ?></p>
                        </div>
                    </div>
                    <div class="box-summary">
                        <h6 class="title font-instrument_serif">Order Summary</h6>
                        <ul class="tf-list vertical gap-16">
                            <li class="text-body-s">
                                <span class="cl-text-5">Subtotal</span>
                                <span><?= formatPrice($order['subtotal'] ?? $order['total']) ?></span>
                            </li>
                            <li class="text-body-s">
                                <span class="cl-text-5">Shipping</span>
                                <span><?= formatPrice($order['shipping'] ?? 0) ?></span>
                            </li>
                            <li class="br-line bg-line-5"></li>
                            <li class="fw-normal">
                                <span>Total</span>
                                <span><?= formatPrice($order['total']) ?></span>
                            </li>
                            <li class="br-line bg-line-5"></li>
                            <li class="text-body-s">
                                <span class="cl-text-5">Payment</span>
                                <span><?= e($order['payment_method'] ?? 'N/A') ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="box-shipping">
                        <h6 class="title font-instrument_serif">Shipping Address</h6>
                        <div>
                            <p class="fw-normal mb-8"><?= e($order['shipping_name'] ?? '') ?></p>
                            <p class="text-body-s cl-text-5">
                                <?= e($order['shipping_phone'] ?? '') ?><br>
                                <?= e($order['shipping_address'] ?? '') ?><br>
                                <?= e($order['shipping_city'] ?? '') ?>, <?= e($order['shipping_state'] ?? '') ?> <?= e($order['shipping_zip'] ?? '') ?><br>
                                <?= e($order['shipping_country'] ?? '') ?>
                            </p>
                        </div>
                    </div>
                    <div class="box-btn tf-list vertical gap-20">
                        <a href="<?= url('contact') ?>" class="tf-btn type-2 style-2 w-100">Contact support</a>
                        <a href="#" class="tf-btn-line">
                            <span class="fw-normal text-uppercase">Request return</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

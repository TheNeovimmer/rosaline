<?php $pageTitle = 'My Orders'; ?>
<!-- Page Title -->
<section class="tf-page-heading_account flat-spacing">
    <div class="container">
        <a href="<?= url('account') ?>" class="content d-inline-flex">
            <div class="account-icon d-flex">
                <i class="icon icon-ArrowLeft fs-24"></i>
            </div>
            <div class="account-infor">
                <h3 class="info_name font-instrument_serif mb-8">My Orders</h3>
                <p class="info_more cl-text-5">View and track your order history</p>
            </div>
        </a>
    </div>
</section>
<!-- Account -->
<div class="flat-spacing-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (empty($orders)): ?>
                <div class="text-center py-5">
                    <p class="text-body-l fw-normal mb-16">No orders yet</p>
                    <a href="<?= url('shop') ?>" class="tf-btn type-2">Start Shopping</a>
                </div>
                <?php else: ?>
                <div class="my-account-order tf-grid-layout md-col-2 gap-24">
                    <?php foreach ($orders as $order): ?>
                    <div class="account-order_item">
                        <div class="order-heading">
                            <div class="left">
                                <i class="icon icon-Box fs-20"></i>
                                <div class="order_info">
                                    <p class="order__code fw-normal mb-6">#<?= e($order['order_number']) ?></p>
                                    <p class="order__date text-body-s cl-text-5"><?= formatDate($order['created_at']) ?></p>
                                </div>
                            </div>
                            <div class="right">
                                <p class="order__tag <?= strtolower($order['status']) ?> text-body-s"><?= e($order['status']) ?></p>
                                <p class="order__price text-body-l fw-normal"><?= formatPrice($order['total']) ?></p>
                            </div>
                        </div>
                        <div class="order-content">
                            <ul class="list-prd">
                                <?php foreach ($order['items'] ?? [] as $item): ?>
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
                            <span class="br-line bg-line-5 mt-auto"></span>
                            <a href="<?= url('account/orders/' . $order['id']) ?>" class="tf-btn type-4 align-self-end">
                                <i class="icon icon-EyeOpen"></i>
                                VIEW DETAILS
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

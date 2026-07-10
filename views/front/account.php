<?php $pageTitle = 'My Account'; ?>
<!-- Page Title -->
<section class="tf-page-heading_account flat-spacing">
    <div class="container">
        <div class="content">
            <div class="account-image">
                <img loading="lazy" width="96" height="96" src="<?= asset('images/avatar/avt-10.jpg') ?>" alt="Image">
            </div>
            <div class="account-infor">
                <h3 class="info_name font-instrument_serif mb-8">Hello, <?= e($user['name'] ?? $user['first_name'] . ' ' . $user['last_name']) ?>!</h3>
                <p class="info_more cl-text-5"><?= e($user['email']) ?> · Member since <?= formatDate($user['created_at'] ?? 'now') ?></p>
            </div>
        </div>
    </div>
</section>
<!-- Account -->
<div class="flat-spacing-mix-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-3 lg-d-none">
                <div class="sidebar-account-wrap sidebar-content-wrap">
                    <div class="my-account-nav">
                        <a href="<?= url('account') ?>" class="link-account active">
                            <i class="icon icon-Dashboard fs-20"></i>
                            <span class="text fw-normal">Dashboard</span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                        <a href="<?= url('account/orders') ?>" class="link-account">
                            <i class="icon icon-Box fs-20"></i>
                            <span class="text fw-normal">My Orders</span>
                            <span class="order-number text-body-xs"><?= count($recentOrders) ?></span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                        <a href="<?= url('wishlist') ?>" class="link-account">
                            <i class="icon icon-Hearth fs-20"></i>
                            <span class="text fw-normal">Wishlist</span>
                            <span class="order-number text-body-xs"><?= $wishlistCount ?></span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                        <a href="<?= url('account/addresses') ?>" class="link-account">
                            <i class="icon icon-DotLocation fs-20"></i>
                            <span class="text fw-normal">Addresses</span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                        <a href="<?= url('account/payment') ?>" class="link-account">
                            <i class="icon icon-Payment fs-20"></i>
                            <span class="text fw-normal">Payment Methods</span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                        <a href="<?= url('account/settings') ?>" class="link-account">
                            <i class="icon icon-Setting fs-20"></i>
                            <span class="text fw-normal">Account Settings</span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                        <a href="<?= url('logout') ?>" class="link-account">
                            <i class="icon icon-Logout fs-20"></i>
                            <span class="text fw-normal">Log Out</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="my-account-content">
                    <div class="box-dashboard_item dashboard-info">
                        <div class="dash_title">
                            <h6 class="font-instrument_serif">Personal Information</h6>
                            <a href="#modalEdit" data-bs-toggle="modal" class="tf-btn-line">
                                <span class="fw-normal">EDIT</span>
                                <i class="icon icon-Edit fs-20"></i>
                            </a>
                        </div>
                        <div class="dash_content">
                            <div class="tf-grid-layout gap-24">
                                <div class="infor-item">
                                    <p class="text-body-s cl-text-5 mb-8">Full Name</p>
                                    <p class="fw-normal"><?= e($user['name'] ?? ($user['first_name'] . ' ' . $user['last_name'])) ?></p>
                                </div>
                                <div class="infor-item">
                                    <p class="text-body-s cl-text-5 mb-8">Phone Number</p>
                                    <p class="fw-normal"><?= e($user['phone'] ?? '-') ?></p>
                                </div>
                            </div>
                            <div class="tf-grid-layout gap-24">
                                <div class="infor-item">
                                    <p class="text-body-s cl-text-5 mb-8">Email</p>
                                    <p class="fw-normal"><?= e($user['email']) ?></p>
                                </div>
                                <div class="infor-item">
                                    <p class="text-body-s cl-text-5 mb-8">Date of Birth</p>
                                    <p class="fw-normal"><?= e($user['dob'] ?? '-') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-dashboard_item dashboard-order">
                        <div class="dash_title">
                            <h6 class="font-instrument_serif">Recent Orders</h6>
                            <a href="<?= url('account/orders') ?>" class="tf-btn-line">
                                <span class="fw-normal">VIEW ALL</span>
                            </a>
                        </div>
                        <div class="dash_content">
                            <?php if (empty($recentOrders)): ?>
                            <p class="text-body-s cl-text-5">No orders yet.</p>
                            <?php else: ?>
                            <ul class="list-order">
                                <?php foreach ($recentOrders as $order): ?>
                                <li class="br-line bg-line-5"></li>
                                <li class="item">
                                    <div class="dash-order_info">
                                        <p class="order__code fw-normal mb-8">#<?= e($order['order_number']) ?></p>
                                        <p class="order__date text-body-s cl-text-5"><?= formatDate($order['created_at']) ?></p>
                                    </div>
                                    <div class="dash-order_status text-end">
                                        <p class="order__tag <?= strtolower($order['status']) ?> text-body-s mb-8"><?= e($order['status']) ?></p>
                                        <p class="order__price fw-normal"><?= formatPrice($order['total']) ?></p>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="box-dashboard_item dashboard-address">
                        <div class="dash_title">
                            <h6 class="font-instrument_serif">Default Address</h6>
                            <a href="#modalEdit" data-bs-toggle="modal" class="tf-btn-line">
                                <span class="fw-normal">EDIT</span>
                                <i class="icon icon-Edit fs-20"></i>
                            </a>
                        </div>
                        <div class="dash_content">
                            <div class="address-item">
                                <i class="icon icon-DotLocation fs-20"></i>
                                <div class="address-info">
                                    <p class="info_name fw-normal mb-8"><?= e($user['name'] ?? '') ?></p>
                                    <p class="info_more text-body-s cl-text-5">
                                        <?= e($user['phone'] ?? '') ?><br>
                                        <?= e($user['address'] ?? 'No address set') ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

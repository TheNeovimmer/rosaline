<?php $pageTitle = 'Payment Methods'; ?>
<section class="tf-page-heading_account flat-spacing">
    <div class="container">
        <a href="<?= url('account') ?>" class="content d-inline-flex">
            <div class="account-icon d-flex"><i class="icon icon-ArrowLeft fs-24"></i></div>
            <div class="account-infor">
                <h3 class="info_name font-instrument_serif mb-8">Payment Methods</h3>
                <p class="info_more cl-text-5">Manage your saved payment methods</p>
            </div>
        </a>
    </div>
</section>
<div class="flat-spacing-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-3 lg-d-none">
                <div class="sidebar-account-wrap sidebar-content-wrap">
                    <div class="my-account-nav">
                        <a href="<?= url('account') ?>" class="link-account"><i class="icon icon-Dashboard fs-20"></i><span class="text fw-normal">Dashboard</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/orders') ?>" class="link-account"><i class="icon icon-Box fs-20"></i><span class="text fw-normal">My Orders</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('wishlist') ?>" class="link-account"><i class="icon icon-Hearth fs-20"></i><span class="text fw-normal">Wishlist</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/addresses') ?>" class="link-account"><i class="icon icon-DotLocation fs-20"></i><span class="text fw-normal">Addresses</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/payment') ?>" class="link-account active"><i class="icon icon-Payment fs-20"></i><span class="text fw-normal">Payment Methods</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/settings') ?>" class="link-account"><i class="icon icon-Setting fs-20"></i><span class="text fw-normal">Account Settings</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('logout') ?>" class="link-account"><i class="icon icon-Logout fs-20"></i><span class="text fw-normal">Log Out</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="my-account-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="font-instrument_serif mb-0">Saved Payment Methods</h6>
                    </div>
                    <div class="text-center py-5">
                        <i class="icon icon-Payment fs-48 cl-text-5 mb-3 d-block"></i>
                        <p class="text-body-l fw-normal mb-2">No payment methods saved</p>
                        <p class="text-body-s cl-text-5 mb-4">You can pay with credit card, PayPal, or other methods during checkout.</p>
                        <a href="<?= url('shop') ?>" class="tf-btn style-2">Continue Shopping</a>
                    </div>
                    <div class="mt-4">
                        <h6 class="font-instrument_serif mb-3">We Accept</h6>
                        <div class="d-flex gap-3">
                            <img loading="lazy" width="60" height="40" src="<?= asset('images/payment/visa.svg') ?>" alt="Visa">
                            <img loading="lazy" width="60" height="40" src="<?= asset('images/payment/mastercard.svg') ?>" alt="Mastercard">
                            <img loading="lazy" width="60" height="40" src="<?= asset('images/payment/amex.svg') ?>" alt="Amex">
                            <img loading="lazy" width="60" height="40" src="<?= asset('images/payment/paypal.svg') ?>" alt="PayPal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

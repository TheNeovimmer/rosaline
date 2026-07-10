<?php $pageTitle = 'My Account'; include 'inc/header.php'; ?>
<!-- /Header -->
        <!-- Page Title -->
        <section class="tf-page-heading_account flat-spacing">
            <div class="container">
                <a href="account-page.php" class="content d-inline-flex">
                    <div class="account-icon d-flex">
                        <i class="icon icon-ArrowLeft fs-24"></i>
                    </div>
                    <div class="account-infor">
                        <h3 class="info_name font-instrument_serif mb-8">
                            Payment Methods
                        </h3>
                        <p class="info_more cl-text-5">
                            Manage your saved cards
                        </p>
                    </div>
                </a>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Account -->
        <div class="flat-spacing-mix-1">
            <div class="container">
                <div class="my-account-payment tf-grid-layout sm-col-2 gap-24">
                    <div class="account-payment_item">
                        <div class="payment-title">
                            <div class="d-flex align-items-center gap-6">
                                <h6 class="font-instrument_serif">
                                    Visa
                                </h6>
                                <span class="mark-default text-body-s">
                                    Default
                                </span>
                            </div>
                            <a href="#modalEditPayment" data-bs-toggle="modal" class="tf-btn-line">
                                <span class="fw-normal">
                                    EDIT
                                </span>
                                <i class="icon icon-Edit fs-20"></i>
                            </a>
                        </div>
                        <div class="payment-content">
                            <div class="payment_number mb-24">
                                <div class="ic-wrap">
                                    <i class="icon icon-Payment"></i>
                                </div>
                                <div class="number">
                                    <span class="number__hidden">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                    <span class="number__hidden">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                    <span class="number__hidden">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                    <span class="number__visible fw-normal cl-text-5">
                                        4242
                                    </span>
                                </div>
                            </div>
                            <div class="payment_owner mb-16">
                                <span class="cl-text-5">
                                    Cardholder
                                </span>
                                <span class="owner__name fw-normal">
                                    Sarah Johnson
                                </span>
                            </div>
                            <div class="payment_expire">
                                <span class="cl-text-5">
                                    Expires
                                </span>
                                <span class="owner__name fw-normal">
                                    12/25
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="account-payment_item file-delete">
                        <div class="payment-title">
                            <h6 class="font-instrument_serif">
                                Mastercard
                            </h6>
                            <div class="d-flex align-items-center gap-16">
                                <a href="#modalEditPayment" data-bs-toggle="modal" class="tf-btn-line">
                                    <span class="fw-normal">
                                        EDIT
                                    </span>
                                    <i class="icon icon-Edit fs-20"></i>
                                </a>
                                <span class="remove text-primary d-flex cs-pointer">
                                    <i class="icon icon-Trash fs-20"></i>
                                </span>
                            </div>
                        </div>
                        <div class="payment-content">
                            <div class="payment_number mb-24">
                                <div class="ic-wrap">
                                    <i class="icon icon-Payment"></i>
                                </div>
                                <div class="number">
                                    <span class="number__hidden">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                    <span class="number__hidden">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                    <span class="number__hidden">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                    <span class="number__visible fw-normal cl-text-5">
                                        4242
                                    </span>
                                </div>
                            </div>
                            <div class="payment_owner mb-16">
                                <span class="cl-text-5">
                                    Cardholder
                                </span>
                                <span class="owner__name fw-normal">
                                    Sarah Johnson
                                </span>
                            </div>
                            <div class="payment_expire">
                                <span class="cl-text-5">
                                    Expires
                                </span>
                                <span class="owner__name fw-normal">
                                    12/25
                                </span>
                            </div>
                        </div>
                        <a href="#" class="tf-btn type-4 w-100 btn-light">
                            Set as default
                        </a>
                    </div>
                    <div class="wd-full text-center">
                        <a href="#modalAddPayment" data-bs-toggle="modal" class="tf-btn">
                            Add new card
                            <i class="icon icon-Plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Account -->
        <!-- Footer -->
        
<?php include 'inc/footer.php'; ?>
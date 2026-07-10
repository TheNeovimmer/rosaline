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
                            My Addresses
                        </h3>
                        <p class="info_more cl-text-5">
                            Manage your shipping addresses
                        </p>
                    </div>
                </a>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Account -->
        <div class="flat-spacing-mix-1">
            <div class="container">
                <div class="my-account-address tf-grid-layout sm-col-2 gap-24">
                    <div class="account-address_item">
                        <div class="address-title">
                            <div class="d-flex align-items-center gap-6">
                                <h6 class="font-instrument_serif">
                                    Home
                                </h6>
                                <span class="mark-default text-body-s">
                                    Default
                                </span>
                            </div>
                            <a href="#modalEdit" data-bs-toggle="modal" class="tf-btn-line">
                                <span class="fw-normal">
                                    EDIT
                                </span>
                                <i class="icon icon-Edit fs-20"></i>
                            </a>
                        </div>
                        <div class="address-content">
                            <i class="icon icon-DotLocation fs-20"></i>
                            <div class="address-info">
                                <p class="info_name fw-normal mb-8">Sarah Johnson</p>
                                <p class="info_more text-body-s cl-text-5">
                                    +1 (555) 123-4567 <br>
                                    123 Beauty Lane, Suite 100 <br>
                                    Los Angeles, CA 90001 <br>
                                    United States
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="account-address_item file-delete">
                        <div class="address-title">
                            <h6 class="font-instrument_serif">
                                Office
                            </h6>
                            <div class="d-flex align-items-center gap-16">
                                <a href="#modalEdit" data-bs-toggle="modal" class="tf-btn-line">
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
                        <div class="address-content">
                            <i class="icon icon-DotLocation fs-20"></i>
                            <div class="address-info">
                                <p class="info_name fw-normal mb-8">Sarah Johnson</p>
                                <p class="info_more text-body-s cl-text-5">
                                    +1 (555) 123-4567 <br>
                                    123 Beauty Lane, Suite 100 <br>
                                    Los Angeles, CA 90001 <br>
                                    United States
                                </p>
                            </div>
                        </div>
                        <a href="#" class="tf-btn type-4 w-100 btn-light">
                            Set as default
                        </a>
                    </div>
                    <div class="wd-full text-center">
                        <a href="#modalAddAddress" data-bs-toggle="modal" class="tf-btn">
                            Add new address
                            <i class="icon icon-Plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Account -->
        <!-- Footer -->
        
<?php include 'inc/footer.php'; ?>
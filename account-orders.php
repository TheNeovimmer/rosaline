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
                            My Orders
                        </h3>
                        <p class="info_more cl-text-5">
                            View and track your order history
                        </p>
                    </div>
                </a>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Account -->
        <div class="flat-spacing-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 d-none">
                        <div class="sidebar-account-wrap sidebar-content-wrap">
                            <div class="my-account-nav">
                                <a href="account-page.php" class="link-account active">
                                    <i class="icon icon-Dashboard fs-20"></i>
                                    <span class="text fw-normal">
                                        Dashboard
                                    </span>
                                    <span class="order-number text-body-xs">
                                        3
                                    </span>
                                    <i class="icon icon-ArrowCaretRight"></i>
                                </a>
                                <a href="account-orders.php" class="link-account">
                                    <i class="icon icon-Box fs-20"></i>
                                    <span class="text fw-normal">
                                        My Orders
                                    </span>
                                    <span class="order-number text-body-xs">
                                        12
                                    </span>
                                    <i class="icon icon-ArrowCaretRight"></i>
                                </a>
                                <a href="wishlist.php" class="link-account">
                                    <i class="icon icon-Hearth fs-20"></i>
                                    <span class="text fw-normal">
                                        Wishlist
                                    </span>
                                    <span class="order-number text-body-xs">
                                        2
                                    </span>
                                    <i class="icon icon-ArrowCaretRight"></i>
                                </a>
                                <a href="account-addresses.php" class="link-account">
                                    <i class="icon icon-DotLocation fs-20"></i>
                                    <span class="text fw-normal">
                                        Addresses
                                    </span>
                                    <span class="order-number text-body-xs">
                                        1
                                    </span>
                                    <i class="icon icon-ArrowCaretRight"></i>
                                </a>
                                <a href="account-payment.php" class="link-account">
                                    <i class="icon icon-Payment fs-20"></i>
                                    <span class="text fw-normal">
                                        Payment Methods
                                    </span>
                                    <span class="order-number text-body-xs">
                                        5
                                    </span>
                                    <i class="icon icon-ArrowCaretRight"></i>
                                </a>
                                <a href="account-payment.php" class="link-account">
                                    <i class="icon icon-Setting fs-20"></i>
                                    <span class="text fw-normal">
                                        Account Settings
                                    </span>
                                    <i class="icon icon-ArrowCaretRight"></i>
                                </a>
                                <a href="login.php" class="link-account">
                                    <i class="icon icon-Logout fs-20"></i>
                                    <span class="text fw-normal">
                                        Log Out
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="my-account-order tf-grid-layout md-col-2 gap-24">
                            <div class="account-order_item">
                                <div class="order-heading">
                                    <div class="left">
                                        <i class="icon icon-Box fs-20"></i>
                                        <div class="order_info">
                                            <p class="order__code fw-normal mb-6">
                                                #GW-2024001
                                            </p>
                                            <p class="order__date text-body-s cl-text-5">
                                                Jan 15, 2024
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p class="order__tag shipping text-body-s">
                                            Shipping
                                        </p>
                                        <p class="order__price text-body-l fw-normal">
                                            $125.00
                                        </p>
                                    </div>
                                </div>
                                <div class="order-content">
                                    <ul class="list-prd">
                                        <li class="prd-item">
                                            <div class="prd_image">
                                                <img loading="lazy" width="74" height="88"
                                                    src="assets/images/product/product-13.jpg" alt="Image">
                                            </div>
                                            <div class="prd_infor">
                                                <div class="infor-wr">
                                                    <a href="product-detail.php"
                                                        class="info__name fw-normal link-underline mb-6">
                                                        Radiance Serum
                                                    </a>
                                                    <p class="info__qty text-body-s cl-text-5">
                                                        Qty: 1
                                                    </p>
                                                </div>
                                                <p class="info__price fw-normal">
                                                    $85.00
                                                </p>
                                            </div>
                                        </li>
                                        <li class="prd-item">
                                            <div class="prd_image">
                                                <img loading="lazy" width="74" height="88"
                                                    src="assets/images/product/product-13.jpg" alt="Image">
                                            </div>
                                            <div class="prd_infor">
                                                <div class="infor-wr">
                                                    <a href="product-detail.php"
                                                        class="info__name fw-normal link-underline mb-6">
                                                        Hydrating Cream
                                                    </a>
                                                    <p class="info__qty text-body-s cl-text-5">
                                                        Qty: 1
                                                    </p>
                                                </div>
                                                <p class="info__price fw-normal">
                                                    $40.00
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <span class="br-line bg-line-5 mt-auto"></span>
                                    <a href="account-order-detail.php" class="tf-btn type-4 align-self-end">
                                        <i class="icon icon-EyeOpen"></i>
                                        VIEW DETAILS
                                    </a>
                                </div>
                            </div>
                            <div class="account-order_item">
                                <div class="order-heading">
                                    <div class="left">
                                        <i class="icon icon-Box fs-20"></i>
                                        <div class="order_info">
                                            <p class="order__code fw-normal mb-6">
                                                #GW-2024002
                                            </p>
                                            <p class="order__date text-body-s cl-text-5">
                                                Jan 10, 2024
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p class="order__tag delivered text-body-s">
                                            Delivered
                                        </p>
                                        <p class="order__price text-body-l fw-normal">
                                            $89.00
                                        </p>
                                    </div>
                                </div>
                                <div class="order-content">
                                    <ul class="list-prd">
                                        <li class="prd-item">
                                            <div class="prd_image">
                                                <img loading="lazy" width="74" height="88"
                                                    src="assets/images/product/product-13.jpg" alt="Image">
                                            </div>
                                            <div class="prd_infor">
                                                <div class="infor-wr">
                                                    <a href="product-detail.php"
                                                        class="info__name fw-normal link-underline mb-6">
                                                        Vitamin C Brightening Toner
                                                    </a>
                                                    <p class="info__qty text-body-s cl-text-5">
                                                        Qty: 1
                                                    </p>
                                                </div>
                                                <p class="info__price fw-normal">
                                                    $89.00
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <span class="br-line bg-line-5 mt-auto"></span>
                                    <a href="account-order-detail.php" class="tf-btn type-4 align-self-end">
                                        <i class="icon icon-EyeOpen"></i>
                                        VIEW DETAILS
                                    </a>
                                </div>
                            </div>
                            <div class="account-order_item">
                                <div class="order-heading">
                                    <div class="left">
                                        <i class="icon icon-Box fs-20"></i>
                                        <div class="order_info">
                                            <p class="order__code fw-normal mb-6">
                                                #GW-2024003
                                            </p>
                                            <p class="order__date text-body-s cl-text-5">
                                                Jan 05, 2024
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p class="order__tag delivered text-body-s">
                                            Delivered
                                        </p>
                                        <p class="order__price text-body-l fw-normal">
                                            $125.00
                                        </p>
                                    </div>
                                </div>
                                <div class="order-content">
                                    <ul class="list-prd">
                                        <li class="prd-item">
                                            <div class="prd_image">
                                                <img loading="lazy" width="74" height="88"
                                                    src="assets/images/product/product-13.jpg" alt="Image">
                                            </div>
                                            <div class="prd_infor">
                                                <div class="infor-wr">
                                                    <a href="product-detail.php"
                                                        class="info__name fw-normal link-underline mb-6">
                                                        Complete Skincare Set
                                                    </a>
                                                    <p class="info__qty text-body-s cl-text-5">
                                                        Qty: 1
                                                    </p>
                                                </div>
                                                <p class="info__price fw-normal">
                                                    $125.00
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <span class="br-line bg-line-5 mt-auto"></span>
                                    <a href="account-order-detail.php" class="tf-btn type-4 align-self-end">
                                        <i class="icon icon-EyeOpen"></i>
                                        VIEW DETAILS
                                    </a>
                                </div>
                            </div>
                            <div class="account-order_item">
                                <div class="order-heading">
                                    <div class="left">
                                        <i class="icon icon-Box fs-20"></i>
                                        <div class="order_info">
                                            <p class="order__code fw-normal mb-6">
                                                #GW-2023050
                                            </p>
                                            <p class="order__date text-body-s cl-text-5">
                                                Dec 20, 2023
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p class="order__tag cancelled text-body-s">
                                            Cancelled
                                        </p>
                                        <p class="order__price text-body-l fw-normal">
                                            $65.00
                                        </p>
                                    </div>
                                </div>
                                <div class="order-content">
                                    <ul class="list-prd">
                                        <li class="prd-item">
                                            <div class="prd_image">
                                                <img loading="lazy" width="74" height="88"
                                                    src="assets/images/product/product-13.jpg" alt="Image">
                                            </div>
                                            <div class="prd_infor">
                                                <div class="infor-wr">
                                                    <a href="product-detail.php"
                                                        class="info__name fw-normal link-underline mb-6">
                                                        Night Repair Mask
                                                    </a>
                                                    <p class="info__qty text-body-s cl-text-5">
                                                        Qty: 1
                                                    </p>
                                                </div>
                                                <p class="info__price fw-normal">
                                                    $65.00
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <span class="br-line bg-line-5 mt-auto"></span>
                                    <a href="account-order-detail.php" class="tf-btn type-4 align-self-end">
                                        <i class="icon icon-EyeOpen"></i>
                                        VIEW DETAILS
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Account -->
        <!-- Footer -->
        
<?php include 'inc/footer.php'; ?>
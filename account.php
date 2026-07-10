<?php $pageTitle = 'My Account'; include 'inc/header.php'; ?>
<!-- /Header -->
        <!-- Page Title -->
        <section class="tf-page-heading_account flat-spacing">
            <div class="container">
                <div class="content">
                    <div class="account-image">
                        <img loading="lazy" width="96" height="96" src="assets/images/avatar/avt-10.jpg" alt="Image">
                    </div>
                    <div class="account-infor">
                        <h3 class="info_name font-instrument_serif mb-8">
                            Hello, Sarah Johnson!
                        </h3>
                        <p class="info_more cl-text-5">
                            sarah.johnson@email.com · Member since June 2023
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Account -->
        <div class="flat-spacing-mix-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 lg-d-none">
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
                                <a href="account-setting.php" class="link-account">
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
                    <div class="col-lg-8 col-xl-9">
                        <div class="my-account-content">
                            <div class="box-dashboard_item dashboard-info">
                                <div class="dash_title">
                                    <h6 class="font-instrument_serif">
                                        Personal Information
                                    </h6>
                                    <a href="#modalEdit" data-bs-toggle="modal" class="tf-btn-line">
                                        <span class="fw-normal">
                                            EDIT
                                        </span>
                                        <i class="icon icon-Edit fs-20"></i>
                                    </a>
                                </div>
                                <div class="dash_content">
                                    <div class="tf-grid-layout gap-24">
                                        <div class="infor-item">
                                            <p class="text-body-s cl-text-5 mb-8">
                                                Full Name
                                            </p>
                                            <p class="fw-normal">
                                                Sarah Johnson
                                            </p>
                                        </div>
                                        <div class="infor-item">
                                            <p class="text-body-s cl-text-5 mb-8">
                                                Phone Number
                                            </p>
                                            <p class="fw-normal">
                                                +1 (555) 123-4567
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tf-grid-layout gap-24">
                                        <div class="infor-item">
                                            <p class="text-body-s cl-text-5 mb-8">
                                                Email
                                            </p>
                                            <p class="fw-normal">
                                                sarah.johnson@email.com
                                            </p>
                                        </div>
                                        <div class="infor-item">
                                            <p class="text-body-s cl-text-5 mb-8">
                                                Date of Birth
                                            </p>
                                            <p class="fw-normal">
                                                June 15, 1995
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-dashboard_item dashboard-order">
                                <div class="dash_title">
                                    <h6 class="font-instrument_serif">
                                        Recent Orders
                                    </h6>
                                    <a href="account-orders.php" class="tf-btn-line">
                                        <span class="fw-normal">
                                            VIEW ALL
                                        </span>
                                    </a>
                                </div>
                                <div class="dash_content">
                                    <ul class="list-order">
                                        <li class="item">
                                            <div class="dash-order_info">
                                                <p class="order__code fw-normal mb-8">
                                                    #GW-2024001
                                                </p>
                                                <p class="order__date text-body-s cl-text-5">
                                                    Jan 15, 2024
                                                </p>
                                            </div>
                                            <div class="dash-order_status text-end">
                                                <p class="order__tag shipping text-body-s mb-8">
                                                    Shipping
                                                </p>
                                                <p class="order__price fw-normal">
                                                    $125.00
                                                </p>
                                            </div>
                                        </li>
                                        <li class="br-line bg-line-5"></li>
                                        <li class="item">
                                            <div class="dash-order_info">
                                                <p class="order__code fw-normal mb-8">
                                                    #GW-2024002
                                                </p>
                                                <p class="order__date text-body-s cl-text-5">
                                                    Jan 10, 2024
                                                </p>
                                            </div>
                                            <div class="dash-order_status text-end">
                                                <p class="order__tag delivered text-body-s mb-8">
                                                    Delivered
                                                </p>
                                                <p class="order__price fw-normal">
                                                    $89.00
                                                </p>
                                            </div>
                                        </li>
                                        <li class="br-line bg-line-5"></li>
                                        <li class="item">
                                            <div class="dash-order_info">
                                                <p class="order__code fw-normal mb-8">
                                                    #GW-2024003
                                                </p>
                                                <p class="order__date text-body-s cl-text-5">
                                                    Jan 05, 2024
                                                </p>
                                            </div>
                                            <div class="dash-order_status text-end">
                                                <p class="order__tag delivered text-body-s mb-8">
                                                    Delivered
                                                </p>
                                                <p class="order__price fw-normal">
                                                    $215.00
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-dashboard_item dashboard-address">
                                <div class="dash_title">
                                    <h6 class="font-instrument_serif">
                                        Default Address
                                    </h6>
                                    <a href="#modalEdit" data-bs-toggle="modal" class="tf-btn-line">
                                        <span class="fw-normal">
                                            EDIT
                                        </span>
                                        <i class="icon icon-Edit fs-20"></i>
                                    </a>
                                </div>
                                <div class="dash_content">
                                    <div class="address-item">
                                        <i class="icon icon-DotLocation fs-20"></i>
                                        <div class="address-info">
                                            <p class="info_name fw-normal mb-8">Sarah Johnson</p>
                                            <p class="info_more text-body-s cl-text-5">
                                                +1 (555) 123-4567 <br>
                                                123 Beauty Lane, Suite 100, Los Angeles, CA 90001
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
        <!-- /Account -->
        <!-- Footer -->
        
<?php include 'inc/footer.php'; ?>

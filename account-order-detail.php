<?php $pageTitle = 'My Account'; include 'inc/header.php'; ?>
<!-- /Header -->
        <!-- Page Title -->
        <section class="tf-page-heading_account flat-spacing">
            <div class="container">
                <a href="account-orders.php" class="content d-inline-flex">
                    <div class="account-icon d-flex">
                        <i class="icon icon-ArrowLeft fs-24"></i>
                    </div>
                    <div class="account-infor">
                        <h3 class="info_name font-instrument_serif mb-8">
                            Order #GW-2024001
                        </h3>
                        <p class="info_more cl-text-5">
                            Placed on Jan 15, 2026
                        </p>
                    </div>
                </a>
            </div>
        </section>
        <!-- /Page Title -->
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
                                        <p class="text-body-s cl-text-5">Tracking Number: GW1234567890</p>
                                    </div>
                                    <p class="order__tag shipping text-body-s">
                                        Shipping
                                    </p>
                                </div>
                                <div class="order-content">
                                    <div class="timeline-wrap">
                                        <div class="timeline-item step-done">
                                            <span class="step-line"></span>
                                            <span class="ic-wrap">
                                                <i class="icon icon-Box"></i>
                                            </span>
                                            <div class="tl-content">
                                                <div class="info_left">
                                                    <p class="tl_title fw-normal mb-6">
                                                        Order Placed
                                                    </p>
                                                    <p class="tl_desc text-body-s cl-text-5">
                                                        Your order has been placed successfully
                                                    </p>
                                                </div>
                                                <p class="tl-date text-body-s cl-text-5">
                                                    Jan 15, 2025 at 10:30 AM
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-item step-done">
                                            <span class="step-line"></span>
                                            <span class="ic-wrap">
                                                <i class="icon icon-Timer"></i>
                                            </span>
                                            <div class="tl-content">
                                                <div class="info_left">
                                                    <p class="tl_title fw-normal mb-6">
                                                        Processing
                                                    </p>
                                                    <p class="tl_desc text-body-s cl-text-5">
                                                        Your order is being prepared for shipment
                                                    </p>
                                                </div>
                                                <p class="tl-date text-body-s cl-text-5">
                                                    Jan 15, 2025 at 02:45 PM
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-item step-done">
                                            <span class="step-line"></span>
                                            <span class="ic-wrap">
                                                <i class="icon icon-Truck"></i>
                                            </span>
                                            <div class="tl-content">
                                                <div class="info_left">
                                                    <p class="tl_title fw-normal mb-6">
                                                        Shipped
                                                    </p>
                                                    <p class="tl_desc text-body-s cl-text-5">
                                                        Your order has been shipped via Express Delivery
                                                    </p>
                                                </div>
                                                <p class="tl-date text-body-s cl-text-5">
                                                    Jan 16, 2025 at 09:15 AM
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-item step-done">
                                            <span class="step-line"></span>
                                            <span class="ic-wrap">
                                                <i class="icon icon-DotLocation"></i>
                                            </span>
                                            <div class="tl-content">
                                                <div class="info_left">
                                                    <p class="tl_title fw-normal mb-6">
                                                        In Transit
                                                    </p>
                                                    <p class="tl_desc text-body-s cl-text-5">
                                                        Package is on the way to your location
                                                    </p>
                                                </div>
                                                <p class="tl-date text-body-s cl-text-5">
                                                    Jan 17, 2025 at 11:30 AM
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-item">
                                            <span class="step-line"></span>
                                            <span class="ic-wrap">
                                                <i class="icon icon-Truck"></i>
                                            </span>
                                            <div class="tl-content">
                                                <div class="info_left">
                                                    <p class="tl_title fw-normal mb-6">
                                                        Out for Delivery
                                                    </p>
                                                    <p class="tl_desc text-body-s cl-text-5">
                                                        Package will be delivered today
                                                    </p>
                                                </div>
                                                <p class="tl-date text-body-s cl-text-5">
                                                    Jan 18, 2025
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-item">
                                            <span class="step-line"></span>
                                            <span class="ic-wrap">
                                                <i class="icon icon-CircleCheck"></i>
                                            </span>
                                            <div class="tl-content">
                                                <div class="info_left">
                                                    <p class="tl_title fw-normal mb-6">
                                                        Delivered
                                                    </p>
                                                    <p class="tl_desc text-body-s cl-text-5">
                                                        Package delivered to recipient
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-order_item type-2">
                                <div class="order-content">
                                    <h6 class="font-instrument_serif">
                                        Order Items
                                    </h6>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-right">
                            <div class="box-est">
                                <div class="ic-wrap">
                                    <i class="icon icon-Clock"></i>
                                </div>
                                <div class="est-info">
                                    <p class="text-body-s cl-text-5 mb-6">Estimated Delivery</p>
                                    <p class="fw-normal">Jan 20, 2025</p>
                                </div>
                            </div>
                            <div class="box-summary">
                                <h6 class="title font-instrument_serif">Order Summary</h6>
                                <ul class="tf-list vertical gap-16">
                                    <li class="text-body-s">
                                        <span class="cl-text-5">Subtotal</span>
                                        <span>$115.00</span>
                                    </li>
                                    <li class="text-body-s">
                                        <span class="cl-text-5">Shipping</span>
                                        <span>$10.00</span>
                                    </li>
                                    <li class="br-line bg-line-5"></li>
                                    <li class="fw-normal">
                                        <span>Total</span>
                                        <span>$125.00</span>
                                    </li>
                                    <li class="br-line bg-line-5"></li>
                                    <li class="text-body-s">
                                        <span class="cl-text-5">Payment</span>
                                        <span>Visa ending in <span class="fw-normal">4242</span></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="box-shipping">
                                <h6 class="title font-instrument_serif">Shipping Address</h6>
                                <div class="">
                                    <p class="fw-normal mb-8">Sarah Johnson</p>
                                    <p class="text-body-s cl-text-5">
                                        +1 (555) 123-4567 <br>
                                        123 Beauty Lane, Suite 100 <br>
                                        Los Angeles, CA 90001 <br>
                                        United States
                                    </p>
                                </div>
                            </div>
                            <div class="box-btn tf-list vertical gap-20">
                                <a href="#" class="tf-btn type-2 style-2 w-100">
                                    Contact support
                                </a>
                                <a href="#" class="tf-btn-line">
                                    <span class="fw-normal text-uppercase">
                                        Request return
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Account -->
        <!-- Footer -->
        
<?php include 'inc/footer.php'; ?>
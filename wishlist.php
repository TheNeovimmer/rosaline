<?php $pageTitle = 'Wishlist'; include 'inc/header.php'; ?>
<!-- /Header -->
        <!-- Page Title -->
        <section class="tf-page-heading_account flat-spacing">
            <div class="container">
                <a href="account-page.php" class="content">
                    <div class="account-icon d-flex">
                        <i class="icon icon-ArrowLeft fs-24"></i>
                    </div>
                    <div class="account-infor">
                        <h3 class="info_name font-instrument_serif mb-8">
                            My Wishlist
                        </h3>
                        <p class="info_more number-order_wishlist cl-text-5">
                            8 items saved
                        </p>
                    </div>
                </a>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Wishlist -->
        <div class="section-wishlist flat-spacing-mix-1">
            <div class="container">
                <div class="tf-grid-layout tf-col-2 md-col-3 xl-col-4 wrapper-wishlist">
                    <!-- Product 1 -->
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="product-detail.php" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-1.jpg" alt="Product">
                                <img class="img-hover" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-1_2.jpg" alt="Product">
                            </a>
                            <ul class="product-badge_list">
                                <li class="product-badge_item text-body-s new">New</li>
                            </ul>
                            <span class="product-action_remove remove box-icon hover-tooltip tooltip-left">
                                <i class="icon icon-HearthFill"></i>
                                <span class="tooltip">Remove Wishlist</span>
                            </span>
                            <ul class="product-action_list">
                                <li>
                                    <a href="#modalQuickView" data-bs-toggle="modal"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-EyeOpen"></span>
                                        <span class="tooltip">Quick view</span>
                                    </a>
                                </li>
                                <li class="compare">
                                    <a href="#compare" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-Compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                    class="tf-btn hv-black btn-white type-2 w-100">
                                    Add to cart
                                    <i class="icon icon-ShoppingCart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                </div>
                                <span class="rate-number text-body-xs">
                                    5.0
                                </span>
                            </div>
                            <a href="product-detail.php" class="name-product fw-normal link-underline">
                                Clear Skin Tonic
                            </a>
                            <div class="price-wrap">
                                <span class="price-new fw-normal">$22.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Product 2 -->
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="product-detail.php" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-2.jpg" alt="Product">
                                <img class="img-hover" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-2_2.jpg" alt="Product">
                            </a>
                            <span class="product-action_remove remove box-icon hover-tooltip tooltip-left">
                                <i class="icon icon-HearthFill"></i>
                                <span class="tooltip">Remove Wishlist</span>
                            </span>
                            <ul class="product-action_list">
                                <li>
                                    <a href="#modalQuickView" data-bs-toggle="modal"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-EyeOpen"></span>
                                        <span class="tooltip">Quick view</span>
                                    </a>
                                </li>
                                <li class="compare">
                                    <a href="#compare" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-Compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                    class="tf-btn hv-black btn-white type-2 w-100">
                                    Add to cart
                                    <i class="icon icon-ShoppingCart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-StarSroke"></i>
                                    <i class="icon icon-StarSroke"></i>
                                </div>
                                <span class="rate-number text-body-xs">
                                    3.5
                                </span>
                            </div>
                            <a href="product-detail.php" class="name-product fw-normal link-underline">
                                Botanical Radiance Serum
                            </a>
                            <div class="price-wrap">
                                <span class="price-new fw-normal">$14.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Product 3 -->
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="product-detail.php" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-3.jpg" alt="Product">
                                <img class="img-hover" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-3_2.jpg" alt="Product">
                            </a>
                            <ul class="product-badge_list">
                                <li class="product-badge_item text-body-s new">New</li>
                            </ul>
                            <span class="product-action_remove remove box-icon hover-tooltip tooltip-left">
                                <i class="icon icon-HearthFill"></i>
                                <span class="tooltip">Remove Wishlist</span>
                            </span>
                            <ul class="product-action_list">
                                <li>
                                    <a href="#modalQuickView" data-bs-toggle="modal"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-EyeOpen"></span>
                                        <span class="tooltip">Quick view</span>
                                    </a>
                                </li>
                                <li class="compare">
                                    <a href="#compare" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-Compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                    class="tf-btn hv-black btn-white type-2 w-100">
                                    Add to cart
                                    <i class="icon icon-ShoppingCart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-StarSroke"></i>
                                </div>
                                <span class="rate-number text-body-xs">
                                    4.0
                                </span>
                            </div>
                            <a href="product-detail.php" class="name-product fw-normal link-underline">
                                The Base Face Milk Essence
                            </a>
                            <div class="price-wrap">
                                <span class="price-new fw-normal">$42.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Product 4 -->
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="product-detail.php" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-4.jpg" alt="Product">
                                <img class="img-hover" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-4_2.jpg" alt="Product">
                            </a>
                            <span class="product-action_remove remove box-icon hover-tooltip tooltip-left">
                                <i class="icon icon-HearthFill"></i>
                                <span class="tooltip">Remove Wishlist</span>
                            </span>
                            <ul class="product-action_list">
                                <li>
                                    <a href="#modalQuickView" data-bs-toggle="modal"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-EyeOpen"></span>
                                        <span class="tooltip">Quick view</span>
                                    </a>
                                </li>
                                <li class="compare">
                                    <a href="#compare" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-Compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                    class="tf-btn hv-black btn-white type-2 w-100">
                                    Add to cart
                                    <i class="icon icon-ShoppingCart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                </div>
                                <span class="rate-number text-body-xs">
                                    5.0
                                </span>
                            </div>
                            <a href="product-detail.php" class="name-product fw-normal link-underline">
                                Multivitamin Body Serum
                            </a>
                            <div class="price-wrap">
                                <span class="price-new fw-normal">$34.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Product 5 -->
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="product-detail.php" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-5.jpg" alt="Product">
                                <img class="img-hover" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-5_2.jpg" alt="Product">
                            </a>
                            <span class="product-action_remove remove box-icon hover-tooltip tooltip-left">
                                <i class="icon icon-HearthFill"></i>
                                <span class="tooltip">Remove Wishlist</span>
                            </span>
                            <ul class="product-action_list">
                                <li>
                                    <a href="#modalQuickView" data-bs-toggle="modal"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-EyeOpen"></span>
                                        <span class="tooltip">Quick view</span>
                                    </a>
                                </li>
                                <li class="compare">
                                    <a href="#compare" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-Compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                    class="tf-btn hv-black btn-white type-2 w-100">
                                    Add to cart
                                    <i class="icon icon-ShoppingCart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-StarSroke"></i>
                                </div>
                                <span class="rate-number text-body-xs">
                                    4.0
                                </span>
                            </div>
                            <a href="product-detail.php" class="name-product fw-normal link-underline">
                                Cream for Anti-Aging
                            </a>
                            <div class="price-wrap">
                                <span class="price-new fw-normal">$12.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Product 6 -->
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="product-detail.php" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-6.jpg" alt="Product">
                                <img class="img-hover" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-6_2.jpg" alt="Product">
                            </a>
                            <ul class="product-badge_list">
                                <li class="product-badge_item text-body-s best">Bestseller</li>
                            </ul>
                            <span class="product-action_remove remove box-icon hover-tooltip tooltip-left">
                                <i class="icon icon-HearthFill"></i>
                                <span class="tooltip">Remove Wishlist</span>
                            </span>
                            <ul class="product-action_list">
                                <li>
                                    <a href="#modalQuickView" data-bs-toggle="modal"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-EyeOpen"></span>
                                        <span class="tooltip">Quick view</span>
                                    </a>
                                </li>
                                <li class="compare">
                                    <a href="#compare" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-Compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                    class="tf-btn hv-black btn-white type-2 w-100">
                                    Add to cart
                                    <i class="icon icon-ShoppingCart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                </div>
                                <span class="rate-number text-body-xs">
                                    5.0
                                </span>
                            </div>
                            <a href="product-detail.php" class="name-product fw-normal link-underline">
                                Natural Moisturizing Factors
                            </a>
                            <div class="price-wrap">
                                <span class="price-new fw-normal">$14.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Product 7 -->
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="product-detail.php" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-7.jpg" alt="Product">
                                <img class="img-hover" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-7_2.jpg" alt="Product">
                            </a>
                            <ul class="product-badge_list">
                                <li class="product-badge_item text-body-s new">New</li>
                            </ul>
                            <span class="product-action_remove remove box-icon hover-tooltip tooltip-left">
                                <i class="icon icon-HearthFill"></i>
                                <span class="tooltip">Remove Wishlist</span>
                            </span>
                            <ul class="product-action_list">
                                <li>
                                    <a href="#modalQuickView" data-bs-toggle="modal"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-EyeOpen"></span>
                                        <span class="tooltip">Quick view</span>
                                    </a>
                                </li>
                                <li class="compare">
                                    <a href="#compare" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-Compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                    class="tf-btn hv-black btn-white type-2 w-100">
                                    Add to cart
                                    <i class="icon icon-ShoppingCart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                </div>
                                <span class="rate-number text-body-xs">
                                    5.0
                                </span>
                            </div>
                            <a href="product-detail.php" class="name-product fw-normal link-underline">
                                Vitamin A Serum
                            </a>
                            <div class="price-wrap">
                                <span class="price-new fw-normal">$24.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Product 8 -->
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="product-detail.php" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-8.jpg" alt="Product">
                                <img class="img-hover" loading="lazy" width="348" height="420"
                                    src="assets/images/product/product-8_2.jpg" alt="Product">
                            </a>
                            <span class="product-action_remove remove box-icon hover-tooltip tooltip-left">
                                <i class="icon icon-HearthFill"></i>
                                <span class="tooltip">Remove Wishlist</span>
                            </span>
                            <ul class="product-action_list">
                                <li>
                                    <a href="#modalQuickView" data-bs-toggle="modal"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-EyeOpen"></span>
                                        <span class="tooltip">Quick view</span>
                                    </a>
                                </li>
                                <li class="compare">
                                    <a href="#compare" data-bs-toggle="offcanvas"
                                        class="hover-tooltip tooltip-left box-icon">
                                        <span class="icon icon-Compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                    class="tf-btn hv-black btn-white type-2 w-100">
                                    Add to cart
                                    <i class="icon icon-ShoppingCart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-Star"></i>
                                    <i class="icon icon-StarSroke"></i>
                                    <i class="icon icon-StarSroke"></i>
                                </div>
                                <span class="rate-number text-body-xs">
                                    3.0
                                </span>
                            </div>
                            <a href="product-detail.php" class="name-product fw-normal link-underline">
                                Daily Microfoliant Exfoliator
                            </a>
                            <div class="price-wrap">
                                <span class="price-new fw-normal">$19.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Wishlist -->
        <!-- Wishlist Empty -->
        <div class="tf-wishlist-empty text-center flat-spacing-5">
            <div class="container">
                <h3 class="emp_title font-instrument_serif">Nothing Saved Yet</h3>
                <p class="emp_desc cl-text-5">
                    Start saving the products you love. Explore our collections <br class="d-none d-sm-block">
                    and add items to your wishlist for later.
                </p>
                <a href="shop-default.php" class="tf-btn type-2">Start Shopping</a>
            </div>
        </div>
        <!-- /Wishlist Empty -->
        <!-- Favorite -->
        <div class="wishlist-favorite tf-btn-swiper-main">
            <div class="container">
                <span class="br-line bg-line-5"></span>
            </div>
            <div class="flat-spacing">
                <div class="container">
                    <div class="sect-heading space-1">
                        <h3 class="s-title font-instrument_serif">
                            Save Your Favorites
                        </h3>
                        <div class="group-nav_number">
                            <div class="tf-sw-nav_icon fs-20 nav-prev-swiper">
                                <i class="icon icon-ArrowCaretLeft"></i>
                            </div>
                            <div class="thumbs-pagination">
                            </div>
                            <div class="tf-sw-nav_icon fs-20 nav-next-swiper">
                                <i class="icon icon-ArrowCaretRight"></i>
                            </div>
                        </div>
                    </div>
                    <div dir="ltr" class="swiper tf-swiper swiper-type-number" data-preview="4" data-tablet="3"
                        data-mobile-sm="2" data-mobile="2" data-space="16" data-pagination="2" data-pagination-sm="2"
                        data-pagination-md="3" data-pagination-lg="4">
                        <div class="swiper-wrapper">
                            <!-- slide 1 -->
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product_wrapper">
                                        <a href="product-detail.php" class="product-img">
                                            <img class="img-product" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-1.jpg" alt="Product">
                                            <img class="img-hover" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-1_2.jpg" alt="Product">
                                        </a>
                                        <ul class="product-badge_list">
                                            <li class="product-badge_item text-body-s new">New</li>
                                        </ul>
                                        <ul class="product-action_list">
                                            <li>
                                                <a href="#modalQuickView" data-bs-toggle="modal"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-EyeOpen"></span>
                                                    <span class="tooltip">Quick view</span>
                                                </a>
                                            </li>
                                            <li class="wishlist">
                                                <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Hearth"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li class="compare">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Compare"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="product-action_bot">
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="tf-btn hv-black btn-white type-2 w-100">
                                                Add to cart
                                                <i class="icon icon-ShoppingCart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product_info">
                                        <div class="product-info__rate">
                                            <div class="star-wrap fs-12">
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                            </div>
                                            <span class="rate-number text-body-xs">
                                                5.0
                                            </span>
                                        </div>
                                        <a href="product-detail.php" class="name-product fw-normal link-underline">
                                            Clear Skin Tonic
                                        </a>
                                        <div class="price-wrap">
                                            <span class="price-new fw-normal">$22.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- slide 2 -->
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product_wrapper">
                                        <a href="product-detail.php" class="product-img">
                                            <img class="img-product" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-2.jpg" alt="Product">
                                            <img class="img-hover" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-2_2.jpg" alt="Product">
                                        </a>
                                        <ul class="product-action_list">
                                            <li>
                                                <a href="#modalQuickView" data-bs-toggle="modal"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-EyeOpen"></span>
                                                    <span class="tooltip">Quick view</span>
                                                </a>
                                            </li>
                                            <li class="wishlist">
                                                <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Hearth"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li class="compare">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Compare"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="product-action_bot">
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="tf-btn hv-black btn-white type-2 w-100">
                                                Add to cart
                                                <i class="icon icon-ShoppingCart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product_info">
                                        <div class="product-info__rate">
                                            <div class="star-wrap fs-12">
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-StarSroke"></i>
                                                <i class="icon icon-StarSroke"></i>
                                            </div>
                                            <span class="rate-number text-body-xs">
                                                3.5
                                            </span>
                                        </div>
                                        <a href="product-detail.php" class="name-product fw-normal link-underline">
                                            Botanical Radiance Serum
                                        </a>
                                        <div class="price-wrap">
                                            <span class="price-new fw-normal">$14.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- slide 3 -->
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product_wrapper">
                                        <a href="product-detail.php" class="product-img">
                                            <img class="img-product" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-3.jpg" alt="Product">
                                            <img class="img-hover" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-3_2.jpg" alt="Product">
                                        </a>
                                        <ul class="product-badge_list">
                                            <li class="product-badge_item text-body-s new">New</li>
                                        </ul>
                                        <ul class="product-action_list">
                                            <li>
                                                <a href="#modalQuickView" data-bs-toggle="modal"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-EyeOpen"></span>
                                                    <span class="tooltip">Quick view</span>
                                                </a>
                                            </li>
                                            <li class="wishlist">
                                                <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Hearth"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li class="compare">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Compare"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="product-action_bot">
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="tf-btn hv-black btn-white type-2 w-100">
                                                Add to cart
                                                <i class="icon icon-ShoppingCart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product_info">
                                        <div class="product-info__rate">
                                            <div class="star-wrap fs-12">
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-StarSroke"></i>
                                            </div>
                                            <span class="rate-number text-body-xs">
                                                4.0
                                            </span>
                                        </div>
                                        <a href="product-detail.php" class="name-product fw-normal link-underline">
                                            The Base Face Milk Essence
                                        </a>
                                        <div class="price-wrap">
                                            <span class="price-new fw-normal">$42.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- slide 4 -->
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product_wrapper">
                                        <a href="product-detail.php" class="product-img">
                                            <img class="img-product" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-4.jpg" alt="Product">
                                            <img class="img-hover" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-4_2.jpg" alt="Product">
                                        </a>
                                        <ul class="product-action_list">
                                            <li>
                                                <a href="#modalQuickView" data-bs-toggle="modal"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-EyeOpen"></span>
                                                    <span class="tooltip">Quick view</span>
                                                </a>
                                            </li>
                                            <li class="wishlist">
                                                <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Hearth"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li class="compare">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Compare"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="product-action_bot">
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="tf-btn hv-black btn-white type-2 w-100">
                                                Add to cart
                                                <i class="icon icon-ShoppingCart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product_info">
                                        <div class="product-info__rate">
                                            <div class="star-wrap fs-12">
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                            </div>
                                            <span class="rate-number text-body-xs">
                                                5.0
                                            </span>
                                        </div>
                                        <a href="product-detail.php" class="name-product fw-normal link-underline">
                                            Multivitamin Body Serum
                                        </a>
                                        <div class="price-wrap">
                                            <span class="price-new fw-normal">$34.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- slide 5 -->
                            <div class="swiper-slide">
                                <div class="card-product">
                                    <div class="card-product_wrapper">
                                        <a href="product-detail.php" class="product-img">
                                            <img class="img-product" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-5.jpg" alt="Product">
                                            <img class="img-hover" loading="lazy" width="348" height="420"
                                                src="assets/images/product/product-5_2.jpg" alt="Product">
                                        </a>
                                        <ul class="product-action_list">
                                            <li>
                                                <a href="#modalQuickView" data-bs-toggle="modal"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-EyeOpen"></span>
                                                    <span class="tooltip">Quick view</span>
                                                </a>
                                            </li>
                                            <li class="wishlist">
                                                <a href="#;" class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Hearth"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li class="compare">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="hover-tooltip tooltip-left box-icon">
                                                    <span class="icon icon-Compare"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="product-action_bot">
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="tf-btn hv-black btn-white type-2 w-100">
                                                Add to cart
                                                <i class="icon icon-ShoppingCart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product_info">
                                        <div class="product-info__rate">
                                            <div class="star-wrap fs-12">
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-Star"></i>
                                                <i class="icon icon-StarSroke"></i>
                                            </div>
                                            <span class="rate-number text-body-xs">
                                                4.0
                                            </span>
                                        </div>
                                        <a href="product-detail.php" class="name-product fw-normal link-underline">
                                            Cream for Anti-Aging
                                        </a>
                                        <div class="price-wrap">
                                            <span class="price-new fw-normal">$12.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Favorite -->
        <!-- Footer -->
        
<?php include 'inc/footer.php'; ?>

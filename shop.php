<?php $pageTitle = 'Shop'; include 'inc/header.php'; ?>
<!-- /Header -->
        <!-- Page Title -->
        <section class="tf-page-heading flat-spacing-5 position-relative">
            <div class="bg-img-item">
                <img loading="lazy" width="1920" height="498" src="assets/images/section/page-title-shop.jpg"
                    alt="Image">
            </div>
            <div class="container position-relative z-2">
                <div class="row">
                    <div class="col-9 col-sm-6">
                        <div class="content text-start">
                            <ul class="breadcrumb">
                                <li>
                                    <a href="index.php" class="link">
                                        HOME
                                    </a>
                                </li>
                                <li>
                                    <i class="icon icon-ArrowCaretRight"></i>
                                </li>
                                <li>
                                    SHOP
                                </li>
                            </ul>
                            <h3 class="page-title font-instrument_serif fw-normal">
                                Shop All Products
                            </h3>
                            <p class="page-desc cl-text-main">
                                From gentle cleansers to powerful serums, find your skin’s perfect match
                                <br class="d-none d-xl-block">
                                among our best-selling and newest skincare formulas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Shop -->
        <div class="flat-spacing-2 pb-0">
            <div class="container">
                <div class="meta-filter-shop">
                    <!-- <div id="product-count-list" class="count-text"></div> -->
                    <!-- <div id="product-count-grid" class="count-text"></div> -->
                    <div id="applied-filters"></div>
                    <button id="remove-all" class="remove-all-filters tf-btn-line fw-normal" style="display: none;">
                        CLEAR ALL FILTER
                    </button>
                </div>
                <div class="tf-shop-control sticky-top no-offset">
                    <div class="col-left">
                        <a href="#filterShop" data-bs-toggle="offcanvas" class="tf-btn-filter link">
                            <i class="icon icon-EqualizerControl"></i>
                            <span class="text fw-normal">FILTER</span>
                        </a>
                        <div class="br-line type-vertical"></div>
                        <div class="tf-control-sorting">
                            <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                                <div class="btn-select">
                                    <p class="text-uppercase fw-normal">
                                        Sort by:&nbsp;
                                        <span class="text-sort-value ">Best Selling</span>
                                    </p>
                                    <span class="icon icon-ArrowCaretDown"></span>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="select-item active remove-all-filters" data-sort-value="best-selling">
                                        <span class="text-value-check"></span>
                                        <span class="text-value-item">Best Selling</span>
                                    </div>
                                    <div class="select-item" data-sort-value="a-z">
                                        <span class="text-value-check"></span>
                                        <span class="text-value-item">Alphabetically, A-Z</span>
                                    </div>
                                    <div class="select-item" data-sort-value="z-a">
                                        <span class="text-value-check"></span>
                                        <span class="text-value-item">Alphabetically, Z-A</span>
                                    </div>
                                    <div class="select-item" data-sort-value="price-low-high">
                                        <span class="text-value-check"></span>
                                        <span class="text-value-item">Price, low to high</span>
                                    </div>
                                    <div class="select-item" data-sort-value="price-high-low">
                                        <span class="text-value-check"></span>
                                        <span class="text-value-item">Price, high to low</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-center">
                        <ul class="tf-control-layout">
                            <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                                <i class="icon-List"></i>
                            </li>
                            <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                                <i class="icon-Grid2Col"></i>
                            </li>
                            <li class="tf-view-layout-switch sw-layout-3 d-none d-md-flex" data-value-layout="tf-col-3">
                                <i class="icon-Grid3Col"></i>
                            </li>
                            <li class="tf-view-layout-switch sw-layout-4 active d-none d-lg-flex"
                                data-value-layout="tf-col-4">
                                <i class="icon-Grid4Col"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="col-right">
                        <!-- <p class="fw-normal text-uppercase text-end">
                                    28 products
                                </p> -->
                        <div class="fw-normal text-uppercase text-end">
                            <!-- <div id="product-count-list" class="count-text"></div> -->
                            <div id="product-count-grid" class="count-text"></div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-control-shop gridLayout-wrapper">
                    <div class="tf-list-layout wrapper-shop" id="listLayout" style="display: none;">
                        <!-- Product 1 -->
                        <div class="card-product product-style_list" data-brand="SkinEra"
                            data-distribute="skinConcern-1">
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
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$22.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 2 -->
                        <div class="card-product product-style_list" data-brand="Botanika"
                            data-distribute="skinConcern-2">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-2.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-2_2.jpg" alt="Product">
                                </a>
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
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$14.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 3 -->
                        <div class="card-product product-style_list" data-brand="Glowdrop"
                            data-distribute="skinConcern-3">
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
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$42.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 4 -->
                        <div class="card-product product-style_list" data-brand="Lumié" data-distribute="skinConcern-4">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-4.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-4_2.jpg" alt="Product">
                                </a>
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
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$34.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 5 -->
                        <div class="card-product product-style_list" data-brand="The Ordinary"
                            data-distribute="skinConcern-1">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-5.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-5_2.jpg" alt="Product">
                                </a>
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
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$12.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 6 -->
                        <div class="card-product product-style_list" data-brand="Caudalie"
                            data-distribute="skinConcern-2">
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
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$14.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 7 -->
                        <div class="card-product product-style_list" data-brand="SkinEra"
                            data-distribute="skinConcern-3">
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
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$24.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 8 -->
                        <div class="card-product product-style_list" data-brand="Botanika"
                            data-distribute="skinConcern-4">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-8.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-8_2.jpg" alt="Product">
                                </a>
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
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$19.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 9 -->
                        <div class="card-product product-style_list" data-brand="Glowdrop"
                            data-distribute="skinConcern-1">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-9.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-9_2.jpg" alt="Product">
                                </a>
                                <ul class="product-badge_list">
                                    <li class="product-badge_item text-body-s best">Bestseller</li>
                                </ul>
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
                                    Black Tea Anti-Aging
                                </a>
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$46.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 10 -->
                        <div class="card-product product-style_list" data-brand="Lumié" data-distribute="skinConcern-2">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-10.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-10_2.jpg" alt="Product">
                                </a>
                                <ul class="product-badge_list">
                                    <li class="product-badge_item text-body-s best">Bestseller</li>
                                </ul>
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
                                    Priming And Firming Moisturizer
                                </a>
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$38.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 11 -->
                        <div class="card-product product-style_list" data-brand="The Ordinary"
                            data-distribute="skinConcern-3">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-11.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-11_2.jpg" alt="Product">
                                </a>
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
                                    Brightening Sleeping Mask
                                </a>
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$32.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 12 -->
                        <div class="card-product product-style_list" data-brand="Caudalie"
                            data-distribute="skinConcern-4">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-12.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-12_2.jpg" alt="Product">
                                </a>
                            </div>
                            <div class="card-product_info">
                                <div class="product-info__rate">
                                    <div class="star-wrap fs-12">
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-Star"></i>
                                        <i class="icon icon-StarSroke"></i>
                                        <i class="icon icon-StarSroke"></i>
                                        <i class="icon icon-StarSroke"></i>
                                    </div>
                                    <span class="rate-number text-body-xs">
                                        2.0
                                    </span>
                                </div>
                                <a href="product-detail.php" class="name-product fw-normal link-underline">
                                    Peptide-Rich Moisturizer
                                </a>
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$46.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product 13 -->
                        <div class="card-product product-style_list" data-brand="SkinEra"
                            data-distribute="skinConcern-1">
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
                                <p class="description cl-text-5 text-line-clamp-3">
                                    Our AHA Rosaline Serum 10% gently exfoliates dead skin cells, unclogs pores, and
                                    boosts
                                    cell turnover for smoother, brighter skin. This lightweight formula absorbs quickly
                                    without stickiness, making it perfect for both day and night routines.
                                </p>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$22.00</span>
                                </div>
                                <ul class="product-action_list style-2">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="hover-tooltip box-icon">
                                            <span class="icon icon-ShoppingCart"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                            <span class="icon icon-EyeOpen"></span>
                                            <span class="tooltip">Quick view</span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        <a href="#;" class="hover-tooltip box-icon">
                                            <span class="icon icon-Hearth"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip box-icon">
                                            <span class="icon icon-Compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="wd-full justify-content-center">
                            <ul class="tf-page-pagination">
                                <li class="pag-item active">1</li>
                                <li><a href="#" class="pag-item cl-text-main link-black">2</a></li>
                                <li><a href="#" class="pag-item cl-text-main link-black">3</a></li>
                                <li>
                                    <a href="#" class="pag-item">
                                        NEXT
                                        <i class="icon icon-ArrowRight fs-20"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wrapper-shop tf-grid-layout tf-col-4" id="gridLayout">
                        <!-- Product 1 -->
                        <div class="card-product grid" data-brand="SkinEra" data-distribute="skinConcern-1">
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
                        <!-- Product 2 -->
                        <div class="card-product grid" data-brand="Botanika" data-distribute="skinConcern-2">
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
                        <!-- Product 3 -->
                        <div class="card-product grid" data-brand="Glowdrop" data-distribute="skinConcern-3">
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
                        <!-- Product 4 -->
                        <div class="card-product grid" data-brand="Lumié" data-distribute="skinConcern-4">
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
                        <!-- Product 5 -->
                        <div class="card-product grid" data-brand="The Ordinary" data-distribute="skinConcern-1">
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
                        <!-- Product 6 -->
                        <div class="card-product grid" data-brand="Caudalie" data-distribute="skinConcern-2">
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
                                    Natural Moisturizing Factors
                                </a>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$14.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Product 7 -->
                        <div class="card-product grid" data-brand="SkinEra" data-distribute="skinConcern-3">
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
                                    Vitamin A Serum
                                </a>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$24.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Product 8 -->
                        <div class="card-product grid" data-brand="Botanika" data-distribute="skinConcern-4">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-8.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-8_2.jpg" alt="Product">
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
                        <!-- Product 9 -->
                        <div class="card-product grid" data-brand="Glowdrop" data-distribute="skinConcern-1">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-9.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-9_2.jpg" alt="Product">
                                </a>
                                <ul class="product-badge_list">
                                    <li class="product-badge_item text-body-s best">Bestseller</li>
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
                                    Black Tea Anti-Aging
                                </a>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$46.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Product 10 -->
                        <div class="card-product grid" data-brand="Lumié" data-distribute="skinConcern-2">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-10.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-10_2.jpg" alt="Product">
                                </a>
                                <ul class="product-badge_list">
                                    <li class="product-badge_item text-body-s best">Bestseller</li>
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
                                    Priming And Firming Moisturizer
                                </a>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$38.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Product 11 -->
                        <div class="card-product grid" data-brand="The Ordinary" data-distribute="skinConcern-3">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-11.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-11_2.jpg" alt="Product">
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
                                    Brightening Sleeping Mask
                                </a>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$32.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Product 12 -->
                        <div class="card-product grid" data-brand="Caudalie" data-distribute="skinConcern-4">
                            <div class="card-product_wrapper">
                                <a href="product-detail.php" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-12.jpg" alt="Product">
                                    <img class="img-hover" loading="lazy" width="348" height="420"
                                        src="assets/images/product/product-12_2.jpg" alt="Product">
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
                                        <i class="icon icon-StarSroke"></i>
                                        <i class="icon icon-StarSroke"></i>
                                        <i class="icon icon-StarSroke"></i>
                                    </div>
                                    <span class="rate-number text-body-xs">
                                        2.0
                                    </span>
                                </div>
                                <a href="product-detail.php" class="name-product fw-normal link-underline">
                                    Peptide-Rich Moisturizer
                                </a>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal">$46.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Product 13 -->
                        <div class="card-product grid" data-brand="SkinEra" data-distribute="skinConcern-1">
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
                        <!-- Pagination -->
                        <div class="wd-full justify-content-center">
                            <ul class="tf-page-pagination">
                                <li class="pag-item active">1</li>
                                <li><a href="#" class="pag-item cl-text-main link-black">2</a></li>
                                <li><a href="#" class="pag-item cl-text-main link-black">3</a></li>
                                <li>
                                    <a href="#" class="pag-item">
                                        NEXT
                                        <i class="icon icon-ArrowRight fs-20"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Shop -->
        <!-- Testimonial -->
        <div class="section-testimonial-product flat-spacing pb-0">
            <div class="flat-spacing-7 bg-main">
                <div class="container">
                    <div class="row gy-30 flex-wrap-reverse">
                        <div class="col-md-6">
                            <p class="eyebrow-label cl-text-5">
                                <span class="br-dot"></span>
                                REAL GLOW STORIES
                            </p>
                            <p class="tes-text h5 font-instrument_serif lh-xl-40">
                                “I’ve tried dozens of brands, but nothing made my skin feel this calm and clear. The
                                serum
                                absorbed instantly, and my face didn’t feel sticky at all — just healthy.”
                            </p>
                            <div class="tes-author">
                                <div class="author_image">
                                    <img loading="lazy" width="64" height="64" src="assets/images/avatar/avt-2.jpg"
                                        alt="Image">
                                </div>
                                <div class="author_info">
                                    <p class="infor__name fw-normal mb-8">
                                        Alina M., 32, New York
                                    </p>
                                    <div class="star-wrap">
                                        <i class="icon icon-Star-Sharp"></i>
                                        <i class="icon icon-Star-Sharp"></i>
                                        <i class="icon icon-Star-Sharp"></i>
                                        <i class="icon icon-Star-Sharp"></i>
                                        <i class="icon icon-Star-Sharp"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="look-book-group tf-grid-layout tf-col-2 gap-16">
                                <div class="banner-lookbook wrap-lookbook_hover">
                                    <img class="img-banner" loading="lazy" width="256" height="320"
                                        src="assets/images/lookbook/look-8.jpg" alt="Image">
                                    <div class="lookbook-item position1">
                                        <div class="dropdown dropup-center dropdown-custom dropstart">
                                            <div role="dialog"
                                                class="tf-pin-btn-2 style-3 bundle-pin-item swiper-button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="ic-wrap">
                                                    <i class="icon icon-Plus text-black"></i>
                                                    <i class="icon icon-Minus text-black"></i>
                                                </span>
                                                <span class="wave"></span>
                                            </div>
                                            <div class="dropdown-menu">
                                                <div class="lookbook-product style-2">
                                                    <a href="product-detail.php" class="prd-image">
                                                        <img width="88" height="88"
                                                            src="assets/images/product/product-13.jpg" alt="Product">
                                                    </a>
                                                    <div class="prd-content">
                                                        <div class="prd_info">
                                                            <a href="product-detail.php"
                                                                class="prd__name link-underline fw-normal text-line-clamp-1">
                                                                Hydra Shine Lip Gloss
                                                            </a>
                                                            <div class="price-wrap gap-6 fw-normal">
                                                                <span class="price-new text-primary">$32.00</span>
                                                                <span class="price-old cl-text-6">$40.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner-lookbook wrap-lookbook_hover">
                                    <img class="img-banner" loading="lazy" width="256" height="320"
                                        src="assets/images/lookbook/look-9.jpg" alt="Image">
                                    <div class="lookbook-item position1">
                                        <div class="dropdown dropup-center dropdown-custom dropstart">
                                            <div role="dialog"
                                                class="tf-pin-btn-2 style-3 bundle-pin-item swiper-button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="ic-wrap">
                                                    <i class="icon icon-Plus text-black"></i>
                                                    <i class="icon icon-Minus text-black"></i>
                                                </span>
                                                <span class="wave"></span>
                                            </div>
                                            <div class="dropdown-menu">
                                                <div class="lookbook-product style-2">
                                                    <a href="product-detail.php" class="prd-image">
                                                        <img width="88" height="88"
                                                            src="assets/images/product/product-13.jpg" alt="Product">
                                                    </a>
                                                    <div class="prd-content">
                                                        <div class="prd_info">
                                                            <a href="product-detail.php"
                                                                class="prd__name link-underline fw-normal text-line-clamp-1">
                                                                Hydra Shine Lip Gloss
                                                            </a>
                                                            <div class="price-wrap gap-6 fw-normal">
                                                                <span class="price-new text-primary">$32.00</span>
                                                                <span class="price-old cl-text-6">$40.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Testimonial -->
        <!-- Box Icon -->
        <div class="flat-spacing">
            <div class="container">
                <div dir="ltr" class="swiper tf-swiper" data-preview="4" data-tablet="3" data-mobile-sm="2"
                    data-mobile="1" data-space="16" data-pagination="1" data-pagination-sm="2" data-pagination-md="3"
                    data-pagination-lg="4">
                    <div class="swiper-wrapper">
                        <!-- slide 1 -->
                        <div class="swiper-slide">
                            <div class="box-icon_V01">
                                <span class="icon">
                                    <i class="icon-CustomerExperience"></i>
                                </span>
                                <div class="content">
                                    <p class="title font-instrument_serif h6">
                                        Expert Support
                                    </p>
                                    <p class="desc cl-text-5">
                                        Talk to our skincare advisors anytime
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- slide 2 -->
                        <div class="swiper-slide">
                            <div class="box-icon_V01">
                                <span class="icon">
                                    <i class="icon-WorldDelivery"></i>
                                </span>
                                <div class="content">
                                    <p class="title font-instrument_serif h6">
                                        Free Worldwide Shipping
                                    </p>
                                    <p class="desc cl-text-5">
                                        On all orders over $50
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- slide 3 -->
                        <div class="swiper-slide">
                            <div class="box-icon_V01">
                                <span class="icon">
                                    <i class="icon-ScreenShieldCheck"></i>
                                </span>
                                <div class="content">
                                    <p class="title font-instrument_serif h6">
                                        100% Secure Checkout
                                    </p>
                                    <p class="desc cl-text-5">
                                        Secure checkout with all major cards
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- slide 4 -->
                        <div class="swiper-slide">
                            <div class="box-icon_V01">
                                <span class="icon">
                                    <i class="icon-ProductLifecycle"></i>
                                </span>
                                <div class="content">
                                    <p class="title font-instrument_serif h6">
                                        30-Day Returns
                                    </p>
                                    <p class="desc cl-text-5">
                                        Love it or return within 30 days
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-line-default tf-sw-pagination"></div>
                </div>
            </div>
        </div>
        <!-- Box Icon -->
        <!-- Footer -->
        
<?php include 'inc/footer.php'; ?>

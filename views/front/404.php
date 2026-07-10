<?php $pageTitle = '404 - Page Not Found'; ?>
<section class="tf-page-heading type-404 flat-spacing-5">
    <div class="container">
        <div class="content">
            <h3 class="page-title font-instrument_serif fw-normal">Page Not Found</h3>
            <p class="page-desc cl-text-main">
                It looks like the page you're looking for doesn't exist.
                <br class="d-none d-xl-block">
                Check out our best sellers or get back to homepage.
            </p>
            <a href="<?= url('/') ?>" class="tf-btn type-2">back to home page</a>
        </div>
    </div>
</section>
<div class="flat-spacing">
    <div class="container">
        <div class="sect-heading space-1">
            <h3 class="s-title font-instrument_serif">Best Sellers</h3>
            <a href="<?= url('shop') ?>" class="tf-btn-line fw-normal">VIEW ALL</a>
        </div>
        <div dir="ltr" class="swiper tf-swiper" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="2" data-space="16" data-pagination="2" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="<?= url('product/clear-skin-tonic') ?>" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420" src="<?= asset('images/product/product-1.jpg') ?>" alt="Clear Skin Tonic">
                                <img class="img-hover" loading="lazy" width="348" height="420" src="<?= asset('images/product/product-1_2.jpg') ?>" alt="Clear Skin Tonic">
                            </a>
                            <ul class="product-badge_list">
                                <li class="product-badge_item text-body-s new">New</li>
                            </ul>
                            <ul class="product-action_list">
                                <li><a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-EyeOpen"></span><span class="tooltip">Quick view</span></a></li>
                                <li class="wishlist"><a href="#" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-Hearth"></span><span class="tooltip">Add to Wishlist</span></a></li>
                                <li class="compare"><a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-Compare"></span><span class="tooltip">Compare</span></a></li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn hv-black btn-white type-2 w-100">Add to cart <i class="icon icon-ShoppingCart"></i></a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-Star"></i>
                                </div>
                                <span class="rate-number text-body-xs">5.0</span>
                            </div>
                            <a href="<?= url('product/clear-skin-tonic') ?>" class="name-product fw-normal link-underline">Clear Skin Tonic</a>
                            <div class="price-wrap"><span class="price-new fw-normal"><?= formatPrice(22) ?></span></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="<?= url('product/botanical-radiance-serum') ?>" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420" src="<?= asset('images/product/product-2.jpg') ?>" alt="Botanical Radiance Serum">
                                <img class="img-hover" loading="lazy" width="348" height="420" src="<?= asset('images/product/product-2_2.jpg') ?>" alt="Botanical Radiance Serum">
                            </a>
                            <ul class="product-action_list">
                                <li><a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-EyeOpen"></span><span class="tooltip">Quick view</span></a></li>
                                <li class="wishlist"><a href="#" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-Hearth"></span><span class="tooltip">Add to Wishlist</span></a></li>
                                <li class="compare"><a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-Compare"></span><span class="tooltip">Compare</span></a></li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn hv-black btn-white type-2 w-100">Add to cart <i class="icon icon-ShoppingCart"></i></a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-StarSroke"></i><i class="icon icon-StarSroke"></i>
                                </div>
                                <span class="rate-number text-body-xs">3.5</span>
                            </div>
                            <a href="<?= url('product/botanical-radiance-serum') ?>" class="name-product fw-normal link-underline">Botanical Radiance Serum</a>
                            <div class="price-wrap"><span class="price-new fw-normal"><?= formatPrice(14) ?></span></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="<?= url('product/base-face-milk-essence') ?>" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420" src="<?= asset('images/product/product-3.jpg') ?>" alt="The Base Face Milk Essence">
                                <img class="img-hover" loading="lazy" width="348" height="420" src="<?= asset('images/product/product-3_2.jpg') ?>" alt="The Base Face Milk Essence">
                            </a>
                            <ul class="product-action_list">
                                <li><a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-EyeOpen"></span><span class="tooltip">Quick view</span></a></li>
                                <li class="wishlist"><a href="#" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-Hearth"></span><span class="tooltip">Add to Wishlist</span></a></li>
                                <li class="compare"><a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-Compare"></span><span class="tooltip">Compare</span></a></li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn hv-black btn-white type-2 w-100">Add to cart <i class="icon icon-ShoppingCart"></i></a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-StarSroke"></i>
                                </div>
                                <span class="rate-number text-body-xs">4.0</span>
                            </div>
                            <a href="<?= url('product/base-face-milk-essence') ?>" class="name-product fw-normal link-underline">The Base Face Milk Essence</a>
                            <div class="price-wrap"><span class="price-new fw-normal"><?= formatPrice(42) ?></span></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-product">
                        <div class="card-product_wrapper">
                            <a href="<?= url('product/multivitamin-body-serum') ?>" class="product-img">
                                <img class="img-product" loading="lazy" width="348" height="420" src="<?= asset('images/product/product-4.jpg') ?>" alt="Multivitamin Body Serum">
                                <img class="img-hover" loading="lazy" width="348" height="420" src="<?= asset('images/product/product-4_2.jpg') ?>" alt="Multivitamin Body Serum">
                            </a>
                            <ul class="product-action_list">
                                <li><a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-EyeOpen"></span><span class="tooltip">Quick view</span></a></li>
                                <li class="wishlist"><a href="#" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-Hearth"></span><span class="tooltip">Add to Wishlist</span></a></li>
                                <li class="compare"><a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-Compare"></span><span class="tooltip">Compare</span></a></li>
                            </ul>
                            <div class="product-action_bot">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn hv-black btn-white type-2 w-100">Add to cart <i class="icon icon-ShoppingCart"></i></a>
                            </div>
                        </div>
                        <div class="card-product_info">
                            <div class="product-info__rate">
                                <div class="star-wrap fs-12">
                                    <i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-Star"></i><i class="icon icon-Star"></i>
                                </div>
                                <span class="rate-number text-body-xs">5.0</span>
                            </div>
                            <a href="<?= url('product/multivitamin-body-serum') ?>" class="name-product fw-normal link-underline">Multivitamin Body Serum</a>
                            <div class="price-wrap"><span class="price-new fw-normal"><?= formatPrice(34) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-line-default tf-sw-pagination"></div>
        </div>
    </div>
</div>

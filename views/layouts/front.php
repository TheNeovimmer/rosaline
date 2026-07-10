<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta charset="utf-8">
    <title><?= isset($pageTitle) ? $pageTitle . ' - ' : '' ?>Rosaline</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Rosaline - Premium skincare eCommerce store. Discover clean beauty products for your skincare routine.">
    <link rel="stylesheet" href="<?= asset('fonts/fonts.css') ?>">
    <link rel="stylesheet" href="<?= asset('icon/icomoon/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/swiper-bundle.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/animate.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/drift-basic.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/photoswipe.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/image-compare-viewer.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('css/styles.css') ?>">
    <link rel="shortcut icon" href="<?= asset('images/logo/favicon.png') ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= asset('images/logo/favicon.png') ?>">
</head>
<body>
    <button id="goTop">
        <span class="border-progress"></span>
        <span class="ic-wrap">
            <span class="icon icon-ArrowCaretUp"></span>
        </span>
    </button>
    <div class="preload preload-container" id="preload">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <main id="wrapper">
        <div class="menu-overlay-enabled" id="menu-overlay-enabled"></div>
        <div class="tf-topbar bg-black ssm-d-none">
            <div class="container-full">
                <div class="row align-items-center">
                    <div class="col-2 d-none d-xl-flex">
                        <div class="topbar-left">
                            <ul class="tf-list gap-16">
                                <li><a href="https://www.facebook.com/" target="_blank" class="text-white fs-20"><i class="icon icon-FacebookFill"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank" class="text-white fs-20"><i class="icon icon-InstagramFill"></i></a></li>
                                <li><a href="https://x.com/" target="_blank" class="text-white fs-20"><i class="icon icon-ThreadFill"></i></a></li>
                                <li><a href="https://www.threads.com/" target="_blank" class="text-white fs-20"><i class="icon icon-YoutubeFill"></i></a></li>
                                <li><a href="https://www.tiktok.com/" target="_blank" class="text-white fs-20"><i class="icon icon-TiktokFill"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div dir="ltr" class="swiper tf-swiper swiper-topbar" data-direction="vertical" data-auto="true" data-loop="true" data-speed="1000">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <p class="topbar-center text-white font-geist text-uppercase text-center fw-medium text-line-clamp-1">Free shipping on orders over $49! | Spring Beauty Sale - Up to 30% Off</p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="topbar-center text-white font-geist text-uppercase text-center fw-medium text-line-clamp-1">Members Save 10% Today — Join Rosaline Club</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 col-2 d-none d-xl-block">
                        <div class="tf-list justify-content-end">
                            <div class="tf-languages">
                                <select class="tf-dropdown-select style-default color-white type-languages">
                                    <option>ENGLISH</option>
                                    <option>VIETNAM</option>
                                    <option>简体中文</option>
                                    <option>اردو</option>
                                </select>
                            </div>
                            <div class="tf-currencies">
                                <select class="tf-dropdown-select style-default color-white type-currencies">
                                    <option selected data-thumbnail="<?= asset('images/country/united-state.png') ?>">USD</option>
                                    <option data-thumbnail="<?= asset('images/country/vietnam.png') ?>">VND</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <header class="tf-header header-v4 offset-top">
            <div class="header-inner">
                <div class="container-full">
                    <div class="row align-items-center">
                        <div class="col-3 col-md-4 col-lg-5">
                            <div class="header-left">
                                <div class="box-btn-open-menu d-flex">
                                    <a href="#mobileMenu" data-bs-toggle="offcanvas" class="d-xl-none"><i class="icon icon-OpenMenu fs-24"></i></a>
                                </div>
                                <nav class="box-navigation d-none d-xl-block">
                                    <ul class="box-nav-menu font-geist">
                                        <li class="menu-item">
                                            <a href="<?= url() ?>" class="item-link"><span class="text">HOME</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?= url('shop') ?>" class="item-link"><span class="text">SHOP</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?= url('blog') ?>" class="item-link"><span class="text">BLOG</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?= url('about') ?>" class="item-link"><span class="text">ABOUT</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?= url('contact') ?>" class="item-link"><span class="text">CONTACT</span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="header-center d-flex justify-content-center">
                                <a href="<?= url() ?>" class="logo-site">
                                    <img loading="lazy" width="136" height="32" src="<?= asset('images/logo/logo.svg') ?>" alt="Rosaline">
                                </a>
                            </div>
                        </div>
                        <div class="col-3 col-md-4 col-lg-5">
                            <div class="header-right">
                                <ul class="tf-list nav-icon-list justify-content-end gap-16">
                                    <li class="sm-d-none">
                                        <a href="#modalSearch" data-bs-toggle="modal" class="nav-icon-item fw-normal"><i class="icon icon-Search"></i></a>
                                    </li>
                                    <li class="sm-d-none">
                                        <?php if (\App\Core\Auth::check()): ?>
                                            <a href="<?= url('account') ?>" class="nav-icon-item fw-normal"><i class="icon icon-UserCircle"></i></a>
                                        <?php else: ?>
                                            <a href="<?= url('login') ?>" class="nav-icon-item fw-normal"><i class="icon icon-UserCircle"></i></a>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <a href="<?= url('wishlist') ?>" class="nav-icon-item fw-normal"><i class="icon icon-Hearth"></i></a>
                                    </li>
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas" class="nav-icon-item shop-cart fw-medium">
                                            <i class="icon icon-ShoppingCart"></i>
                                            <span class="number-order text-body-xs"><?= count($_SESSION['cart'] ?? []) ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?= $content ?>

        <footer class="tf-footer footer-v1 bg-black">
            <div class="footer-top">
                <div class="container">
                    <div class="row align-items-center gy-30">
                        <div class="col-lg-6">
                            <div class="ft-title text-white text-display-1 font-instrument_serif mb-24">Get 20% Off Your First Order</div>
                            <p class="ft-desc cl-text-2">Join our beauty circle for exclusive offers, skin tips & early product drops.</p>
                        </div>
                        <div class="col-lg-6">
                            <form action="#" class="form-subcribe">
                                <fieldset>
                                    <i class="icon icon-Envelope fs-20 text-white"></i>
                                    <input type="email" placeholder="YOUR EMAIL" required>
                                </fieldset>
                                <button type="submit" class="btn-action tf-btn btn-white">SUBSCRIBE <i class="icon icon-Send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="br-line bg-line-3"></div>
            <div class="footer-inner">
                <div class="container">
                    <div class="footer-inner_wrap">
                        <div class="ft-contact me-lg-auto">
                            <a href="<?= url() ?>" class="logo-site">
                                <img loading="lazy" width="204" height="48" src="<?= asset('images/logo/logo-white.svg') ?>" alt="Logo">
                            </a>
                            <ul class="tf-list vertical">
                                <li><i class="icon icon-Phone fs-20 text-white"></i><a href="tel:+18005552390" class="text-white">Phone: +1 (800) 555-2390</a></li>
                                <li><i class="icon icon-Envelope fs-20 text-white"></i><a href="mailto:support@glowlyskin.com" class="text-white">Email: support@glowlyskin.com</a></li>
                                <li class="align-items-start"><i class="icon icon-DotLocation fs-20 text-white"></i><a href="https://www.google.com/maps?q=456+Blooming+Lane,+Suite+9A+Los+Angeles,+CA+90025,+USA" target="_blank" class="text-white">456 Blooming Lane, Suite 9A<br class="d-none d-md-block">Los Angeles, CA 90025, USA</a></li>
                            </ul>
                        </div>
                        <div class="br-line"></div>
                        <div class="footer-col-block footer-wrap-1">
                            <p class="footer-heading footer-heading-mobile h6 font-instrument_serif text-white">Shop by Category</p>
                            <div class="tf-collapse-content">
                                <ul class="footer-menu-list">
                                    <li><a href="<?= url('shop') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Cleansers</a></li>
                                    <li><a href="<?= url('shop') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Serums</a></li>
                                    <li><a href="<?= url('shop') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Moisturizers</a></li>
                                    <li><a href="<?= url('shop') ?>" class="fw-normal cl-text-2 link-white text-uppercase">SPF / Sun Care</a></li>
                                    <li><a href="<?= url('shop') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Skincare Sets</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="br-line exception"></div>
                        <div class="footer-col-block footer-wrap-2 lg-pe-none">
                            <p class="footer-heading footer-heading-mobile h6 font-instrument_serif text-white">Customer Care</p>
                            <div class="tf-collapse-content">
                                <ul class="footer-menu-list">
                                    <li><a href="<?= url('faqs') ?>" class="fw-normal cl-text-2 link-white text-uppercase">FAQs</a></li>
                                    <li><a href="<?= url('terms-of-service') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Shipping & Returns</a></li>
                                    <li><a href="<?= url('contact') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Track Order</a></li>
                                    <li><a href="<?= url('contact') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="br-line"></div>
                        <div class="footer-col-block footer-wrap-3">
                            <p class="footer-heading footer-heading-mobile h6 font-instrument_serif text-white">About & Resources</p>
                            <div class="tf-collapse-content">
                                <ul class="footer-menu-list">
                                    <li><a href="<?= url('about') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Our Story</a></li>
                                    <li><a href="<?= url('terms-of-service') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Ingredients Guide</a></li>
                                    <li><a href="<?= url('blog') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Rosaline Blog</a></li>
                                    <li><a href="<?= url('terms-of-service') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Careers</a></li>
                                    <li><a href="<?= url('terms-of-service') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Affiliate Program</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="br-line bg-line-3"></div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-bottom_wrap">
                        <div class="ft-text-nocopy cl-text-6 me-auto">© 2026 ROSALINE SKIN. ALL RIGHTS RESERVED.</div>
                        <div class="br-line type-vertical lg-d-none"></div>
                        <ul class="tf-list gap-16">
                            <li><a href="https://www.facebook.com/" target="_blank" class="cl-text-2 link-white fs-20"><i class="icon icon-LogoFacebook"></i></a></li>
                            <li><a href="https://www.instagram.com/" target="_blank" class="cl-text-2 link-white fs-20"><i class="icon icon-LogoInstagram"></i></a></li>
                            <li><a href="https://x.com/" target="_blank" class="cl-text-2 link-white fs-20"><i class="icon icon-LogoX"></i></a></li>
                            <li><a href="https://www.threads.com/" target="_blank" class="cl-text-2 link-white fs-20"><i class="icon icon-LogoThread"></i></a></li>
                            <li><a href="https://www.tiktok.com/" target="_blank" class="cl-text-2 link-white fs-20"><i class="icon icon-LogoTiktok"></i></a></li>
                        </ul>
                        <div class="br-line type-vertical lg-d-none"></div>
                        <ul class="tf-list justify-content-end">
                            <li><a href="<?= url('privacy-policy') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Privacy Policy</a></li>
                            <li><a href="<?= url('terms-of-service') ?>" class="fw-normal cl-text-2 link-white text-uppercase">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <div class="canvas-header">
            <span class="flex-1 d-flex"><i class="icon icon-Close link-rotate fs-20" data-bs-dismiss="offcanvas"></i></span>
            <a href="<?= url() ?>" class="logo-site"><img loading="lazy" width="102" height="24" src="<?= asset('images/logo/logo.svg') ?>" alt="Image"></a>
            <ul class="tf-list nav-icon-list justify-content-end flex-1">
                <li data-bs-dismiss="offcanvas"><a href="#modalSearch" data-bs-toggle="modal" class="nav-icon-item fw-normal"><i class="icon icon-Search"></i></a></li>
                <li><a href="#shoppingCart" data-bs-toggle="offcanvas" class="nav-icon-item fw-normal"><i class="icon icon-ShoppingCart"></i><span class="number-order text-body-s">(<?= count($_SESSION['cart'] ?? []) ?>)</span></a></li>
            </ul>
        </div>
        <div class="br-line bg-line-5"></div>
        <div class="canvas-body">
            <div class="mb-content-top"><ul class="nav-ul-mb-2" id="wrapper-menu-navigation-v2"></ul></div>
            <div class="group-action">
                <?php if (\App\Core\Auth::check()): ?>
                    <a href="<?= url('account') ?>" class="tf-btn style-2 type-4 w-100">My Account</a>
                    <a href="<?= url('logout') ?>" class="btn-action_create tf-btn-line"><span class="fw-normal text-uppercase">Sign Out</span></a>
                <?php else: ?>
                    <a href="<?= url('login') ?>" class="tf-btn style-2 type-4 w-100">Sign In</a>
                    <a href="<?= url('register') ?>" class="btn-action_create tf-btn-line"><span class="fw-normal text-uppercase">Create an account</span></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="br-line bg-line-5"></div>
        <div class="canvas-footer">
            <ul class="tf-list gap-12">
                <li><a href="https://www.facebook.com/" target="_blank" class="link fs-20"><i class="icon icon-LogoFacebook"></i></a></li>
                <li><a href="https://www.instagram.com/" target="_blank" class="link fs-20"><i class="icon icon-LogoInstagram"></i></a></li>
                <li><a href="https://x.com/" target="_blank" class="link fs-20"><i class="icon icon-LogoX"></i></a></li>
                <li><a href="https://www.threads.com/" target="_blank" class="link fs-20"><i class="icon icon-LogoThread"></i></a></li>
                <li><a href="https://www.tiktok.com/" target="_blank" class="link fs-20"><i class="icon icon-LogoTiktok"></i></a></li>
            </ul>
            <div class="tf-list justify-content-end gap-16 group-curency-language">
                <div class="tf-languages text-body-s">
                    <select class="tf-dropdown-select style-default type-languages">
                        <option>ENGLISH</option><option>VIETNAM</option><option>简体中文</option><option>اردو</option>
                    </select>
                </div>
                <div class="tf-currencies text-body-s">
                    <select class="tf-dropdown-select style-default type-currencies">
                        <option selected data-thumbnail="<?= asset('images/country/united-state.png') ?>">USD</option>
                        <option data-thumbnail="<?= asset('images/country/vietnam.png') ?>">VND</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-search" id="modalSearch">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="ctn-wrap">
                    <div class="container">
                        <form action="<?= url('shop') ?>" class="form-search-prd" method="GET">
                            <button type="submit" class="btn-action_search link"><i class="icon icon-Search"></i></button>
                            <fieldset><input type="text" name="q" placeholder="Search product" required></fieldset>
                            <i class="icon icon-Close btn-close-popup fs-20" data-bs-dismiss="modal"></i>
                        </form>
                        <div class="pupular-search">
                            <span class="cl-text-5">Popular Searches:</span>
                            <div class="list-search">
                                <a href="<?= url('shop') ?>" class="fw-normal link-underline">SkinEra</a>
                                <a href="<?= url('shop') ?>" class="fw-normal link-underline">Cleansers</a>
                                <a href="<?= url('shop') ?>" class="fw-normal link-underline">Acne & Blemishes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="close" data-bs-dismiss="modal"></span>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end popup-shopping-cart" id="shoppingCart">
        <div class="canvas-wrapper overflow-hidden">
            <div class="popup-header">
                <div class="d-flex justify-content-between align-items-start mb-24">
                    <h6 class="font-instrument_serif">Your Cart (<span class="prd__count"><?= count($_SESSION['cart'] ?? []) ?></span>)</h6>
                    <i class="icon icon-Close btn-close-popup fs-24" data-bs-dismiss="offcanvas"></i>
                </div>
                <div class="br-line bg-line-5"></div>
            </div>
            <div class="wrap">
                <div class="tf-mini-cart-wrap list-file-delete wrap-empty_text">
                    <div class="tf-mini-cart-main">
                        <div class="tf-mini-cart-sroll">
                            <div class="tf-mini-cart-items list-empty">
                                <?php $cartItems = $_SESSION['cart'] ?? []; ?>
                                <?php if (empty($cartItems)): ?>
                                <div class="box-text_empty type-shop_cart">
                                    <div class="shop-empty_top">
                                        <span class="icon"><i class="icon-Box"></i></span>
                                        <p class="text-emp text-body-l fw-normal">Your cart is empty</p>
                                        <p class="text-body-s cl-text-5">Looks like you haven't added anything yet.<br>Start browsing and find something you'll love.</p>
                                    </div>
                                    <div class="shop-empty_bot"><a href="<?= url('shop') ?>" class="tf-btn style-2 type-2">Continue Shopping</a></div>
                                </div>
                                <?php else: ?>
                                    <?php foreach ($cartItems as $item): ?>
                                    <div class="tf-mini-cart-item">
                                        <div class="tf-mini-cart-item-info">
                                            <a href="<?= url('product/' . $item['slug']) ?>" class="img-box">
                                                <img width="74" height="89" src="<?= url($item['image']) ?>" alt="<?= e($item['name']) ?>">
                                            </a>
                                            <div class="content">
                                                <a href="<?= url('product/' . $item['slug']) ?>" class="title fw-normal"><?= e($item['name']) ?></a>
                                                <span class="price fw-normal"><?= formatPrice($item['price']) ?></span>
                                                <div class="wg-quantity">
                                                    <span class="text-body-s">Qty: <?= $item['quantity'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tf-mini-cart-bottom box-empty_clear">
                        <?php if (!empty($cartItems)): ?>
                        <div class="tf-mini-cart-total text-body-l fw-normal">
                            <span>Estimated total</span>
                            <div class="price-wrap gap-6">
                                <span class="price-new tf-totals-total-value fw-normal"><?php
                                    $total = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cartItems));
                                    echo formatPrice($total);
                                ?></span>
                            </div>
                        </div>
                        <div class="tf-mini-cart-view-checkout">
                            <a href="<?= url('cart') ?>" class="tf-btn style-2 type-2 btn-light">View cart</a>
                            <a href="<?= url('checkout') ?>" class="tf-btn style-2 type-2">Check out</a>
                        </div>
                        <?php endif; ?>
                        <p class="text-body-s text-center cl-text-5">Tax and shipping calculated at checkout</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modalCentered fade modal-share" id="modalShare">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-heading">
                    <h5 class="font-instrument_serif fw-normal">Share this Product</h5>
                    <span class="icon icon-Close link-rotate" data-bs-dismiss="modal"></span>
                </div>
                <div class="modal-main">
                    <div class="box_copy">
                        <p class="text-body-xs mb-4">Share your link</p>
                        <div class="wrap-code btn-coppy-text">
                            <p class="coppyText cl-text-5 text-body-xs" id="coppyText"><i class="icon icon-Link fs-16"></i><span class="text-line-clamp-1"><?= url('product/aha-glow-serum-10') ?></span></p>
                            <button type="button" class="btn-action-copy">COPY</button>
                        </div>
                    </div>
                    <div>
                        <p class="text-body-xs mb-8">Share to</p>
                        <ul class="tf-list gap-16">
                            <li><a href="#" class="link fs-20"><i class="icon icon-LogoFacebook"></i></a></li>
                            <li><a href="#" class="link fs-20"><i class="icon icon-LogoInstagram"></i></a></li>
                            <li><a href="#" class="link fs-20"><i class="icon icon-LogoX"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= asset('js/plugin/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/swiper-bundle.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/bootstrap-select.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/count-down.js') ?>"></script>
    <script src="<?= asset('js/plugin/infinityslide.js') ?>"></script>
    <script src="<?= asset('js/plugin/wow.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/drift.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/countto.js') ?>"></script>
    <script src="<?= asset('js/plugin/image-compare-viewer.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/gsap.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/lenis.min.js') ?>"></script>
    <script src="<?= asset('js/carousel.js') ?>"></script>
    <script src="<?= asset('js/gsapCustom.js') ?>"></script>
    <script src="<?= asset('js/main.js') ?>"></script>
    <script src="<?= asset('js/zoom.js') ?>"></script>
    <script src="<?= asset('js/plugin/photoswipe-lightbox.umd.min.js') ?>"></script>
    <script src="<?= asset('js/plugin/photoswipe.umd.min.js') ?>"></script>
</body>
</html>

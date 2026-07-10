<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta charset="utf-8">
    <title><?= isset($pageTitle) ? $pageTitle . ' - ' : '' ?>Rosaline</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Rosaline - Premium skincare eCommerce store. Discover clean beauty products for your skincare routine.">
    <link rel="stylesheet" href="assets/fonts/fonts.css">
    <link rel="stylesheet" href="assets/icon/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/drift-basic.min.css">
    <link rel="stylesheet" href="assets/css/photoswipe.css">
    <link rel="stylesheet" href="assets/css/image-compare-viewer.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/logo/favicon.png">
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
                                    <option selected data-thumbnail="assets/images/country/united-state.png">USD</option>
                                    <option data-thumbnail="assets/images/country/vietnam.png">VND</option>
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
                                            <a href="index.php" class="item-link"><span class="text">HOME</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="shop.php" class="item-link"><span class="text">SHOP</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="product-detail.php" class="item-link"><span class="text">PRODUCT</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="blog.php" class="item-link"><span class="text">BLOG</span></a>
                                        </li>
                                        <li class="menu-item position-relative">
                                            <a href="#" class="item-link">
                                                <span class="text">PAGES</span>
                                                <i class="icon icon-ArrowCaretDown"></i>
                                            </a>
                                            <div class="sub-menu sub-menu_v2">
                                                <ul class="sub-menu_list">
                                                    <li><a href="about.php" class="sub-menu_link"><span class="text">About</span></a></li>
                                                    <li><a href="contact.php" class="sub-menu_link"><span class="text">Contact</span></a></li>
                                                    <li><a href="faq.php" class="sub-menu_link"><span class="text">FAQs</span></a></li>
                                                    <li><a href="privacy-policy.php" class="sub-menu_link"><span class="text">Privacy Policy</span></a></li>
                                                    <li><a href="term-of-service.php" class="sub-menu_link"><span class="text">Term of Service</span></a></li>
                                                    <li><a href="404.php" class="sub-menu_link"><span class="text">404</span></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="header-center d-flex justify-content-center">
                                <a href="index.php" class="logo-site">
                                    <img loading="lazy" width="136" height="32" src="assets/images/logo/logo.svg" alt="Rosaline">
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
                                        <a href="login.php" class="nav-icon-item fw-normal"><i class="icon icon-UserCircle"></i></a>
                                    </li>
                                    <li>
                                        <a href="wishlist.php" class="nav-icon-item fw-normal"><i class="icon icon-Hearth"></i></a>
                                    </li>
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas" class="nav-icon-item shop-cart fw-medium">
                                            <i class="icon icon-ShoppingCart"></i>
                                            <span class="number-order text-body-xs">1</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

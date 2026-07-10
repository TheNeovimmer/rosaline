<!-- Hero -->
<div class="tf-hero-banner-v3">
    <div class="hero-image">
        <img loading="lazy" width="1920" height="938" src="<?= asset('images/section/hero-2.jpg') ?>" alt="Image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="hero-content_inner wow fadeInUp">
                <div class="hero__tag font-geist fw-medium text-third lh-22">
                    HIGH-PERFORMANCE SKINCARE
                </div>
                <p class="text-display-xl font-anton letter-space--3 text-third">
                    SERIOUS CARE <br>
                    SLEEK RESULTS
                </p>
                <p class="hero__desc font-geist text-body-l letter-space--3 text-third">
                    Potent actives, clean formulas, clinically proven radiance.
                </p>
                <a href="<?= url('shop') ?>" class="tf-btn style-2 btn-light-2 py-xl-24">
                    <i class="icon icon-Sparkle"></i>
                    <span class="fw-bold font-geist letter-space--3">
                        Shop Best Sellers
                    </span>
                </a>
            </div>
            <div class="hero-content_bottom wow fadeInUp">
                <div class="hero__author letter-space--3">
                    <p class="author-title font-geist fw-medium lh-22">
                        FORMULATED WITH
                    </p>
                    <p class="author-name font-anton text-28-34">
                        PURE ACTIVES
                    </p>
                </div>
                <div class="hero__author letter-space--3">
                    <p class="author-title font-geist fw-medium lh-22">
                        DAILY RITUAL
                    </p>
                    <p class="author-name font-anton text-28-34">
                        MAXIMUM GLOW
                    </p>
                </div>
                <div class="hero__author letter-space--3">
                    <p class="author-title font-geist fw-medium lh-22">
                        NO COMPROMISE
                    </p>
                    <p class="author-name font-anton text-28-34">
                        CLEAN BEAUTY
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Hero -->
<!-- Counter -->
<div class="flat-spacing-4 pb-0">
    <div class="container">
        <div dir="ltr" class="swiper tf-swiper wrap-sw-over" data-preview="3" data-tablet="2" data-mobile-sm="2"
            data-mobile="1" data-space-lg="64" data-space-md="16" data-space="16" data-pagination="1"
            data-pagination-sm="2" data-pagination-md="2" data-pagination-lg="3">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="wg-counter wow fadeInUp">
                        <div class="title h1 letter-space--2 font-anton view-counter">
                            <span class="number" data-to="1" data-speed="1000">0</span>M+
                        </div>
                        <p class="sub font-geist fw-medium letter-space--3">
                            COMMUNITY MEMBERS
                        </p>
                        <p class="desc font-geist cl-text-5 letter-space--3">
                            A global network of glow seekers.
                        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="wg-counter wow fadeInUp">
                        <div class="title h1 letter-space--2 font-anton view-counter">
                            <span class="number" data-to="97" data-speed="1000">0</span>%
                        </div>
                        <p class="sub font-geist fw-medium letter-space--3">
                            USERS SATISFIED
                        </p>
                        <p class="desc font-geist cl-text-5 letter-space--3">
                            Smoother skin and better texture.
                        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="wg-counter wow fadeInUp">
                        <div class="title h1 letter-space--2 font-anton view-counter">
                            <span class="number" data-to="10" data-speed="1000">0</span>X
                        </div>
                        <p class="sub font-geist fw-medium letter-space--3">
                            MODERN GLOW
                        </p>
                        <p class="desc font-geist cl-text-5 letter-space--3">
                            Advanced actives for next-gen beauty.
                        </p>
                    </div>
                </div>
            </div>
            <div class="sw-line-default tf-sw-pagination"></div>
        </div>
    </div>
</div>
<!-- /Counter -->
<!-- Featured Products -->
<div class="flat-spacing-3 flat-animate-tab">
    <div class="container">
        <div class="sect-heading-v2 space-1 space-inner-1 wow fadeInUp">
            <div class="badge-pill">
                <span class="font-geist fw-medium lh-22 letter-space--3">
                    Shop What Works
                </span>
            </div>
            <h2 class="font-anton text-uppercase letter-space--2">
                From our newest drops to <br>
                all-time best sellers.
            </h2>
        </div>
        <div class="tab-content">
            <div class="tab-pane active show" role="tabpanel">
                <div class="tf-btn-swiper-main">
                    <div dir="ltr" class="swiper tf-swiper swiper-type-scrollbar mb-20" data-preview="4"
                        data-tablet="3" data-mobile-sm="2" data-mobile="2" data-space-lg="24" data-space-md="24"
                        data-space="16" data-pagination="2" data-pagination-sm="2" data-pagination-md="3"
                        data-pagination-lg="4">
                        <div class="swiper-wrapper">
                            <?php if (!empty($featuredProducts)): ?>
                            <?php foreach ($featuredProducts as $i => $product): ?>
                            <div class="swiper-slide">
                                <div class="card-product card-s3 wow fadeInUp" data-wow-delay="<?= ($i * 0.1) ?>s">
                                    <div class="card-product_wrapper size-38d45">
                                        <a href="<?= url('product/' . e($product['slug'])) ?>" class="product-img">
                                            <img class="img-product" loading="lazy" width="348" height="420" src="<?= url(e($product['image'])) ?>" alt="<?= e($product['name']) ?>">
                                        </a>
                                        <?php if ($product['featured']): ?>
                                        <ul class="product-badge_list">
                                            <li class="product-badge_item text-body-s new">New</li>
                                        </ul>
                                        <?php endif; ?>
                                        <ul class="product-action_list">
                                            <li><a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-EyeOpen"></span><span class="tooltip">Quick view</span></a></li>
                                            <li class="wishlist">
                                                <form method="POST" action="<?= url('wishlist/add') ?>" style="display:inline">
                                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                    <button type="submit" class="hover-tooltip tooltip-left box-icon" style="border:none;background:none">
                                                        <span class="icon icon-Hearth"></span><span class="tooltip">Add to Wishlist</span>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                        <div class="product-action_bot">
                                            <form method="POST" action="<?= url('cart/add') ?>">
                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn-action_add tf-btn hv-black btn-white type-2 w-100">
                                                    <i class="icon icon-ShoppingCart"></i> Add to cart
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-product_info font-geist gap-8">
                                        <div class="product-info__rate">
                                            <div class="star-wrap fs-14">
                                                <?php for ($s = 0; $s < 5; $s++): ?>
                                                <i class="icon <?= $s < round($product['avg_rating'] ?? 5) ? 'icon-Star-Sharp' : 'icon-StarSroke' ?>"></i>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <a href="<?= url('product/' . e($product['slug'])) ?>" class="name-product lh-22 fw-medium link-underline text-uppercase"><?= e($product['name']) ?></a>
                                        <p class="product-info__desc fw-normal text-body-s lh-18 cl-text-5"><?= e($product['short_description'] ?? '') ?></p>
                                        <span class="product-info__price lh-22 fw-medium"><?= formatPrice($product['price']) ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="mb-20 d-xl-none">
                        <div class="sw-scrollbar-default">
                            <span class="tf-sw-scrollbar"></span>
                        </div>
                    </div>
                </div>
                <div class="text-center wow fadeInUp">
                    <a href="<?= url('shop') ?>" class="tf-btn type-2 style-2 btn-stroke-black py-normal">
                        <span class="fw-bold font-geist letter-space--3">
                            VIEW ALL
                        </span>
                        <i class="icon icon-ArrowRight"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Featured Products -->
<!-- Explore -->
<div class="section-banner-explore">
    <div class="bn-image overflow-hidden wow fadeIn">
        <img class="wow fadeZoomOut" loading="lazy" width="640" height="861"
            src="<?= asset('images/section/goal-1.jpg') ?>" alt="Image">
    </div>
    <div class="bn-content">
        <div class="sect-heading-v2 start space-1 space-inner-1 wow fadeInUp">
            <div class="badge-pill">
                <span class="font-geist fw-medium lh-22 letter-space--3">
                    Target Your Skin Goals
                </span>
            </div>
            <h2 class="font-anton text-uppercase letter-space--2">
                Curated rituals <br class="d-none d-xxl-block">
                for beauty that <br class="d-none d-xxl-block">
                truly evolves.
            </h2>
            <a href="<?= url('shop') ?>" class="tf-btn type-2 style-2 btn-stroke-black py-normal">
                <span class="fw-bold font-geist letter-space--3">
                    EXPLORE MORE
                </span>
                <i class="icon icon-ArrowRight"></i>
            </a>
        </div>
        <?php if (!empty($featuredCategories)): ?>
        <ul class="tf-list vertical gap-8 list-explore wow fadeInUp">
            <?php foreach ($featuredCategories as $cat): ?>
            <li>
                <a href="<?= url('shop?category=' . e($cat['slug'])) ?>" class="explore-link">
                    <p class="text text-28-34 font-anton letter-space--3">
                        <?= e(strtoupper($cat['name'])) ?>
                        <span class="text-body-m lh-22 font-geist fw-medium">
                            (<?= $cat['product_count'] ?? 0 ?>)
                        </span>
                    </p>
                    <i class="icon icon-ArrowRightUp"></i>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
    <div class="bn-image overflow-hidden wow fadeIn">
        <img class="wow fadeZoomOut" loading="lazy" width="640" height="861"
            src="<?= asset('images/section/goal-2.jpg') ?>" alt="Image">
    </div>
</div>
<!-- /Explore -->
<!-- Brand -->
<div class="flat-spacing-4">
    <div class="infiniteSlide-brand">
        <div class="infiniteSlide infiniteSlide-wrapper" data-clone="3">
            <div class="infiniteSlide-item">
                <div class="brand-logo">
                    <img loading="lazy" width="158" height="40" src="<?= asset('images/brand/brand-1.svg') ?>" alt="Image">
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="brand-logo">
                    <img loading="lazy" width="146" height="40" src="<?= asset('images/brand/brand-2.svg') ?>" alt="Image">
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="brand-logo">
                    <img loading="lazy" width="134" height="40" src="<?= asset('images/brand/brand-3.svg') ?>" alt="Image">
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="brand-logo">
                    <img loading="lazy" width="122" height="40" src="<?= asset('images/brand/brand-4.svg') ?>" alt="Image">
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="brand-logo">
                    <img loading="lazy" width="165" height="40" src="<?= asset('images/brand/brand-5.svg') ?>" alt="Image">
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="brand-logo">
                    <img loading="lazy" width="166" height="40" src="<?= asset('images/brand/brand-6.svg') ?>" alt="Image">
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="brand-logo">
                    <img loading="lazy" width="148" height="40" src="<?= asset('images/brand/brand-7.svg') ?>" alt="Image">
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="brand-logo">
                    <img loading="lazy" width="169" height="40" src="<?= asset('images/brand/brand-8.svg') ?>" alt="Image">
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="brand-logo">
                    <img loading="lazy" width="140" height="40" src="<?= asset('images/brand/brand-9.svg') ?>" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Brand -->
<!-- Trusted -->
<div class="section-trusted flat-spacing-5">
    <div class="container">
        <div class="wg-trusted">
            <div class="frame-image image-1">
                <div class="ghim">
                    <img class="wow fadeZoom" loading="lazy" width="45" height="57"
                        src="<?= asset('images/item/push-pin.png') ?>" alt="Image">
                </div>
                <div class="image wow fadeIn">
                    <img class="wow fadeZoomOut" loading="lazy" width="332" height="409"
                        src="<?= asset('images/section/expert-1.jpg') ?>" alt="Image">
                </div>
            </div>
            <div class="frame-image image-2">
                <div class="ghim">
                    <img class="wow fadeZoom" loading="lazy" width="45" height="57"
                        src="<?= asset('images/item/push-pin.png') ?>" alt="Image">
                </div>
                <div class="image wow fadeIn">
                    <img class="wow fadeZoomOut" loading="lazy" width="332" height="409"
                        src="<?= asset('images/section/expert-2.jpg') ?>" alt="Image">
                </div>
            </div>
            <div class="content">
                <div class="sect-heading-v2 space-inner-1 m-0">
                    <div class="badge-pill">
                        <span class="font-geist fw-medium lh-22 letter-space--3">
                            Trusted by Experts
                        </span>
                    </div>
                    <h3 class="font-anton lh-xl-53 text-uppercase letter-space--2 text-color-change">
                        "Dermatologist tested and clinically proven skincare that delivers visible
                        results and safe routines for every skin type, trusted by experts worldwide"
                    </h3>
                </div>
            </div>
        </div>
        <ul class="list-certified wow fadeInUp">
            <li>
                <div class="leave left">
                    <img loading="lazy" width="40" height="64" src="<?= asset('images/item/cer-left.svg') ?>" alt="Image">
                </div>
                <div class="certified letter-space--3 cl-text-5 text-uppercase">
                    <p class="name_cer font-geist text-body-s fw-normal lh-18">Dermatologist Tested</p>
                    <h6 class="font-anton">Safe for all skin types</h6>
                </div>
                <div class="leave right">
                    <img loading="lazy" width="40" height="64" src="<?= asset('images/item/cer-right.svg') ?>" alt="Image">
                </div>
            </li>
            <li>
                <div class="leave left">
                    <img loading="lazy" width="60" height="96" src="<?= asset('images/item/cer-left.svg') ?>" alt="Image">
                </div>
                <div class="certified letter-space--3 cl-text-5 text-uppercase">
                    <p class="name_cer font-geist text-body-l fw-normal">COSMOS Organic</p>
                    <h5 class="font-anton">Certified by Ecocert</h5>
                </div>
                <div class="leave right">
                    <img loading="lazy" width="60" height="96" src="<?= asset('images/item/cer-right.svg') ?>" alt="Image">
                </div>
            </li>
            <li>
                <div class="leave left">
                    <img loading="lazy" width="40" height="64" src="<?= asset('images/item/cer-left.svg') ?>" alt="Image">
                </div>
                <div class="certified letter-space--3 cl-text-5 text-uppercase">
                    <p class="name_cer font-geist text-body-s fw-normal lh-18">Clinically Proven</p>
                    <h6 class="font-anton">See results in 14 days</h6>
                </div>
                <div class="leave right">
                    <img loading="lazy" width="40" height="64" src="<?= asset('images/item/cer-right.svg') ?>" alt="Image">
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /Trusted -->
<!-- Blog Preview -->
<?php if (!empty($blogPosts)): ?>
<div class="flat-spacing-3">
    <div class="container">
        <div class="sect-heading-v2 space-inner-1 wow fadeInUp">
            <div class="badge-pill">
                <span class="font-geist fw-medium lh-22 letter-space--3">
                    The Glow Journal
                </span>
            </div>
            <h2 class="font-anton text-uppercase letter-space--2">
                Skincare wisdom, ingredient <br>
                deep dives, and ritual guides.
            </h2>
        </div>
        <div class="tf-btn-swiper-main">
            <div dir="ltr" class="swiper tf-swiper swiper-type-scrollbar" data-preview="3" data-tablet="2" data-mobile-sm="2"
                data-mobile="1" data-space-lg="24" data-space-md="16" data-space="16" data-pagination="2"
                data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                <div class="swiper-wrapper">
                    <?php foreach ($blogPosts as $i => $post): ?>
                    <div class="swiper-slide">
                        <div class="card-blog card-s3 wow fadeInUp" data-wow-delay="<?= ($i * 0.1) ?>s">
                            <div class="card-blog_img">
                                <a href="<?= url('blog/' . e($post['slug'])) ?>">
                                    <img loading="lazy" width="556" height="648"
                                        src="<?= url(e($post['image'])) ?>"
                                        alt="<?= e($post['title']) ?>">
                                </a>
                            </div>
                            <div class="card-blog_info">
                                <div class="blog-meta d-flex align-items-center gap-2">
                                    <span class="meta-date fw-normal text-body-s cl-text-5"><?= formatDate($post['published_at'] ?? $post['created_at']) ?></span>
                                    <?php if (!empty($post['category'])): ?>
                                    <span class="fw-normal text-body-s cl-text-5">/</span>
                                    <span class="meta-category text-body-s cl-text-5"><?= e($post['category']) ?></span>
                                    <?php endif; ?>
                                </div>
                                <h6 class="blog-title fw-normal">
                                    <a href="<?= url('blog/' . e($post['slug'])) ?>" class="link-underline">
                                        <?= e($post['title']) ?>
                                    </a>
                                </h6>
                                <p class="blog-desc cl-text-5"><?= e(truncate($post['excerpt'] ?? '', 120)) ?></p>
                                <a href="<?= url('blog/' . e($post['slug'])) ?>" class="tf-btn-link type-2 gap-8">
                                    <span>Read More</span>
                                    <i class="icon icon-ArrowRight"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="spacing-top-1 d-xl-none">
                <div class="sw-scrollbar-default">
                    <span class="tf-sw-scrollbar"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- /Blog Preview -->

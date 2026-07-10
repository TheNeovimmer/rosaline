<!-- Page Title -->
<div class="tf-page-heading style-single">
    <div class="container">
        <ul class="breadcrumb mb-0">
            <li><a href="<?= url('home') ?>" class="link">HOME</a></li>
            <li><i class="icon icon-ArrowCaretRight"></i></li>
            <li><a href="<?= url('shop') ?>" class="link">SHOP</a></li>
            <li><i class="icon icon-ArrowCaretRight"></i></li>
            <li class="text-uppercase"><?= e($product['name']) ?></li>
        </ul>
    </div>
</div>
<!-- /Page Title -->
<!-- Product Single -->
<section class="section-product-single tf-main-product section-image-zoom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tf-product-media-wrap sticky-top">
                    <div class="product-thumbs-slider style-row row_left">
                        <div class="flat-wrap-media-product">
                            <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started" data-spacing="0">
                                <div class="swiper-wrapper">
                                    <?php $images = !empty($product['images']) ? json_decode($product['images'], true) : [$product['image']]; ?>
                                    <?php foreach ((array) $images as $img): ?>
                                    <div class="swiper-slide">
                                        <a href="<?= url(e($img)) ?>" target="_blank"
                                            class="item" data-pswp-width="591px" data-pswp-height="714px">
                                            <img loading="lazy" width="591" height="714" class="tf-image-zoom"
                                                data-zoom="<?= url(e($img)) ?>"
                                                src="<?= url(e($img)) ?>"
                                                alt="<?= e($product['name']) ?>">
                                        </a>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="group-btn-nav">
                                    <div class="thumbs-prev tf-sw-nav">
                                        <i class="icon icon-ArrowCaretLeft"></i>
                                    </div>
                                    <div class="thumbs-next tf-sw-nav">
                                        <i class="icon icon-ArrowCaretRight"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom"
                            data-direction="vertical" data-preview="5">
                            <div class="swiper-wrapper stagger-wrap">
                                <?php foreach ((array) $images as $img): ?>
                                <div class="swiper-slide stagger-item">
                                    <div class="item">
                                        <img loading="lazy" width="105" height="130"
                                            src="<?= url(e($img)) ?>" alt="Image">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tf-product-info-wrap position-relative mt-md-0" id="tfProductInfoWrap">
                    <div class="tf-zoom-main sticky-top"></div>
                    <div class="tf-product-info-list other-image-zoom">
                        <div class="tf-product-info-heading">
                            <?php if ($product['featured']): ?>
                            <ul class="product-infor-badge d-flex">
                                <li class="product-badge_item text-body-s new">New</li>
                            </ul>
                            <?php endif; ?>
                            <div class="product-infor-meta meta_rate">
                                <div class="star-wrap">
                                    <?php for ($s = 0; $s < 5; $s++): ?>
                                    <i class="icon <?= $s < round($avgRating) ? 'icon-Star-Sharp' : 'icon-StarSroke' ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-body-s cl-text-5">
                                    <?= number_format($avgRating, 1) ?>/5 (<?= count($reviews) ?> reviews)
                                </span>
                            </div>
                            <h5 class="product-infor-name font-instrument_serif fw-normal">
                                <?= e($product['name']) ?>
                            </h5>
                            <?php if (!empty($product['tags'])): ?>
                            <ul class="product-infor-list-tag">
                                <?php foreach ($product['tags'] as $tag): ?>
                                <li>
                                    <i class="icon icon-Check"></i>
                                    <span class="text-body-s fw-normal"><?= e($tag) ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                            <div class="product-infor-price">
                                <div class="mb-4 d-flex align-items-center gap-6">
                                    <span class="price-on-sale text-body-l fw-normal text-primary">
                                        <?= formatPrice($product['sale_price'] ?? $product['price']) ?>
                                    </span>
                                    <?php if (!empty($product['sale_price']) && $product['sale_price'] < $product['price']): ?>
                                    <span class="price-on-old text-body-l cl-text-6 text-decoration-line-through">
                                        <?= formatPrice($product['price']) ?>
                                    </span>
                                    <span class="badge-sale text-body-xs">
                                        Save <?= round((1 - $product['sale_price'] / $product['price']) * 100) ?>%
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-body-xs cl-text-5">
                                    Shipping calculated at checkout.
                                </p>
                            </div>
                        </div>
                        <?php if (!empty($product['stock']) && $product['stock'] <= 10): ?>
                        <div class="tf-product-progress-sale">
                            <p class="title text-body-s fw-normal mb-8">
                                Hurry up, only <?= $product['stock'] ?> items left in stock.
                            </p>
                            <div class="progress-cart">
                                <div class="value" style="width: 0%;" data-progress="70"></div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="tf-product-variant">
                            <div class="tf-product-total-quantity">
                                <div class="group-action">
                                    <form method="POST" action="<?= url('cart/add') ?>" class="d-flex gap-10 w-100">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                        <div class="wg-quantity">
                                            <button type="button" class="btn-quantity btn-decrease">
                                                <i class="icon icon-Minus"></i>
                                            </button>
                                            <input class="quantity-product" type="text" name="quantity" value="1">
                                            <button type="button" class="btn-quantity btn-increase">
                                                <i class="icon icon-Plus"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="btn-action-price tf-btn style-2 type-2 btn-light w-100">
                                            Add To Cart
                                        </button>
                                    </form>
                                </div>
                                <a href="<?= url('checkout') ?>" class="tf-btn style-2 type-2 w-100">
                                    Buy It Now
                                </a>
                            </div>
                        </div>
                        <div class="tf-product-extra-link">
                            <form method="POST" action="<?= url('wishlist/add') ?>" style="display:inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <button type="submit" class="btn-add-wishlist product-extra-icon text-body-s link" style="border:none;background:none">
                                    <i class="icon icon-Hearth"></i>
                                    <span class="text-wish">Add to wishlist</span>
                                </button>
                            </form>
                            <a href="#modalAsk" data-bs-toggle="modal" class="product-extra-icon text-body-s link">
                                <i class="icon icon-Question"></i>
                                Ask a question
                            </a>
                            <a href="#modalShare" data-bs-toggle="modal" class="product-extra-icon text-body-s link">
                                <i class="icon icon-Share"></i>
                                Share
                            </a>
                        </div>
                        <div class="tf-product-delivery-return">
                            <div class="product-delivery">
                                <i class="icon icon-Box"></i>
                                <p class="fw-normal">Free International Shipping over $120</p>
                            </div>
                            <div class="product-delivery return">
                                <i class="icon icon-Return"></i>
                                <p class="fw-normal">Money back within 30 days for an exchange.</p>
                            </div>
                        </div>
                        <div class="tf-product-trust-seal">
                            <p class="text-seal fw-normal">Guarantee Safe Checkout:</p>
                            <ul class="list-card">
                                <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/visa.svg') ?>" alt="card"></li>
                                <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/master.svg') ?>" alt="card"></li>
                                <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/water.svg') ?>" alt="card"></li>
                                <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/paypal.svg') ?>" alt="card"></li>
                                <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/g-play.svg') ?>" alt="card"></li>
                                <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/a-store.svg') ?>" alt="card"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tf-product-accordion" id="prdDes">
                        <div class="accordion-item">
                            <div class="accordion-action h7 font-instrument_serif" data-bs-target="#faq-1"
                                data-bs-toggle="collapse" aria-expanded="true" aria-controls="faq-1" role="button">
                                <span>Description</span>
                                <span class="icon ic-accordion-custom"></span>
                            </div>
                            <div id="faq-1" class="collapse show" data-bs-parent="#prdDes">
                                <div class="accordion-content">
                                    <p class="cl-text-5"><?= nl2br(e($product['description'] ?? '')) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-action h7 font-instrument_serif collapsed"
                                data-bs-target="#faq-4" data-bs-toggle="collapse" aria-expanded="true"
                                aria-controls="faq-4" role="button">
                                <span>Reviews (<?= count($reviews) ?>)</span>
                                <span class="icon ic-accordion-custom"></span>
                            </div>
                            <div id="faq-4" class="collapse" data-bs-parent="#prdDes">
                                <div class="accordion-content">
                                    <?php if (!empty($reviews)): ?>
                                    <?php foreach ($reviews as $review): ?>
                                    <div class="mb-4 pb-4" style="border-bottom:1px solid #eee">
                                        <div class="d-flex align-items-center gap-6 mb-2">
                                            <div class="star-wrap fs-12">
                                                <?php for ($s = 0; $s < 5; $s++): ?>
                                                <i class="icon <?= $s < round($review['rating'] ?? 5) ? 'icon-Star-Sharp' : 'icon-StarSroke' ?>"></i>
                                                <?php endfor; ?>
                                            </div>
                                            <span class="text-body-s fw-bold"><?= e($review['author'] ?? 'Anonymous') ?></span>
                                            <span class="text-body-xs cl-text-5"><?= formatDate($review['created_at'] ?? '') ?></span>
                                        </div>
                                        <p class="text-body-s cl-text-5"><?= e($review['comment'] ?? '') ?></p>
                                    </div>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <p class="cl-text-5">No reviews yet. Be the first to review this product!</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Product Single -->
<!-- Related Products -->
<?php if (!empty($relatedProducts)): ?>
<div class="flat-spacing">
    <div class="container">
        <div class="sect-heading-v2 space-inner-1">
            <p class="eyebrow-label cl-text-5">
                <span class="br-dot"></span>
                CURATED SUGGESTIONS
            </p>
            <h3 class="font-instrument_serif">You May Also Like</h3>
        </div>
        <div class="tf-btn-swiper-main">
            <div dir="ltr" class="swiper tf-swiper swiper-type-scrollbar" data-preview="4" data-tablet="3"
                data-mobile-sm="2" data-mobile="2" data-space="16" data-pagination="2" data-pagination-sm="2"
                data-pagination-md="3" data-pagination-lg="4">
                <div class="swiper-wrapper">
                    <?php $relatedProducts = $related ?? []; ?>
                    <?php foreach ($relatedProducts as $rp): ?>
                    <div class="swiper-slide">
                        <div class="card-product">
                            <div class="card-product_wrapper">
                                <a href="<?= url('product/' . e($rp['slug'])) ?>" class="product-img">
                                    <img class="img-product" loading="lazy" width="348" height="420"
                                        src="<?= url(e($rp['image'])) ?>" alt="<?= e($rp['name']) ?>">
                                </a>
                                <?php if (!empty($rp['badge'])): ?>
                                <ul class="product-badge_list">
                                    <li class="product-badge_item text-body-s <?= e($rp['badge_class'] ?? 'new') ?>"><?= e($rp['badge']) ?></li>
                                </ul>
                                <?php endif; ?>
                                <ul class="product-action_list">
                                    <li><a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-EyeOpen"></span><span class="tooltip">Quick view</span></a></li>
                                    <li class="wishlist">
                                        <form method="POST" action="<?= url('wishlist/add') ?>" style="display:inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="product_id" value="<?= $rp['id'] ?>">
                                            <button type="submit" class="hover-tooltip tooltip-left box-icon" style="border:none;background:none">
                                                <span class="icon icon-Hearth"></span><span class="tooltip">Add to Wishlist</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                                <div class="product-action_bot">
                                    <form method="POST" action="<?= url('cart/add') ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="product_id" value="<?= $rp['id'] ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="tf-btn hv-black btn-white type-2 w-100">
                                            Add to cart <i class="icon icon-ShoppingCart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-product_info">
                                <div class="product-info__rate">
                                    <div class="star-wrap fs-12">
                                        <?php for ($s = 0; $s < 5; $s++): ?>
                                        <i class="icon <?= $s < round($rp['avg_rating'] ?? 5) ? 'icon-Star' : 'icon-StarSroke' ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <span class="rate-number text-body-xs"><?= number_format($rp['avg_rating'] ?? 5, 1) ?></span>
                                </div>
                                <a href="<?= url('product/' . e($rp['slug'])) ?>" class="name-product fw-normal link-underline"><?= e($rp['name']) ?></a>
                                <div class="price-wrap">
                                    <span class="price-new fw-normal"><?= formatPrice($rp['price']) ?></span>
                                </div>
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
<!-- /Related Products -->

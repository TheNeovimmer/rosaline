<?php $pageTitle = 'Wishlist'; ?>
<?php $items = $wishlistItems ?? []; ?>
<!-- Page Title -->
<section class="tf-page-heading_account flat-spacing">
    <div class="container">
        <a href="<?= url('account') ?>" class="content">
            <div class="account-icon d-flex">
                <i class="icon icon-ArrowLeft fs-24"></i>
            </div>
            <div class="account-infor">
                <h3 class="info_name font-instrument_serif mb-8">My Wishlist</h3>
                <p class="info_more number-order_wishlist cl-text-5"><?= count($items) ?> items saved</p>
            </div>
        </a>
    </div>
</section>
<?php if (empty($items)): ?>
<!-- Wishlist Empty -->
<div class="tf-wishlist-empty text-center flat-spacing-5">
    <div class="container">
        <h3 class="emp_title font-instrument_serif">Nothing Saved Yet</h3>
        <p class="emp_desc cl-text-5">
            Start saving the products you love. Explore our collections <br class="d-none d-sm-block">
            and add items to your wishlist for later.
        </p>
        <a href="<?= url('shop') ?>" class="tf-btn type-2">Start Shopping</a>
    </div>
</div>
<?php else: ?>
<!-- Wishlist -->
<div class="section-wishlist flat-spacing-mix-1">
    <div class="container">
        <div class="tf-grid-layout tf-col-2 md-col-3 xl-col-4 wrapper-wishlist">
            <?php foreach ($items as $item): ?>
            <div class="card-product">
                <div class="card-product_wrapper">
                    <a href="<?= url('product/' . $item['slug']) ?>" class="product-img">
                        <img class="img-product" loading="lazy" width="348" height="420"
                            src="<?= url($item['image']) ?>" alt="<?= e($item['name']) ?>">
                        <?php $hoverImages = !empty($item['images']) ? json_decode($item['images'], true) : null; ?>
                        <?php if (!empty($hoverImages[1])): ?>
                        <img class="img-hover" loading="lazy" width="348" height="420"
                            src="<?= url(e($hoverImages[1])) ?>" alt="<?= e($item['name']) ?>">
                        <?php endif; ?>
                    </a>
                    <?php if (!empty($item['badge'])): ?>
                    <ul class="product-badge_list">
                        <li class="product-badge_item text-body-s <?= strtolower($item['badge']) ?>"><?= e($item['badge']) ?></li>
                    </ul>
                    <?php endif; ?>
                    <span class="product-action_remove remove box-icon hover-tooltip tooltip-left">
                        <i class="icon icon-HearthFill"></i>
                        <span class="tooltip">Remove</span>
                    </span>
                    <ul class="product-action_list">
                        <li>
                            <a href="#modalQuickView" data-bs-toggle="modal" data-product-id="<?= $item['product_id'] ?>" class="hover-tooltip tooltip-left box-icon quick-view-btn">
                                <span class="icon icon-EyeOpen"></span>
                                <span class="tooltip">Quick view</span>
                            </a>
                        </li>
                        <li class="compare">
                            <a href="#compare" data-bs-toggle="offcanvas" class="hover-tooltip tooltip-left box-icon">
                                <span class="icon icon-Compare"></span>
                                <span class="tooltip">Compare</span>
                            </a>
                        </li>
                    </ul>
                    <div class="product-action_bot">
                        <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn hv-black btn-white type-2 w-100">
                            Add to cart
                            <i class="icon icon-ShoppingCart"></i>
                        </a>
                    </div>
                </div>
                <div class="card-product_info">
                    <div class="product-info__rate">
                        <div class="star-wrap fs-12">
                            <?php $rating = $item['rating'] ?? 5; for ($i = 1; $i <= 5; $i++): ?>
                            <i class="icon icon-<?= $i <= $rating ? 'Star' : 'StarSroke' ?>"></i>
                            <?php endfor; ?>
                        </div>
                        <span class="rate-number text-body-xs"><?= number_format($rating, 1) ?></span>
                    </div>
                    <a href="<?= url('product/' . $item['slug']) ?>" class="name-product fw-normal link-underline"><?= e($item['name']) ?></a>
                    <div class="price-wrap">
                        <span class="price-new fw-normal"><?= formatPrice($item['price']) ?></span>
                        <?php if (!empty($item['compare_price'])): ?>
                        <span class="price-old fw-normal"><?= formatPrice($item['compare_price']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>

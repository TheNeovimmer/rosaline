<!-- Page Title -->
<section class="tf-page-heading flat-spacing-5 position-relative">
    <div class="bg-img-item">
        <img loading="lazy" width="1920" height="498" src="<?= asset('images/section/page-title-shop.jpg') ?>" alt="Image">
    </div>
    <div class="container position-relative z-2">
        <div class="row">
            <div class="col-9 col-sm-6">
                <div class="content text-start">
                    <ul class="breadcrumb">
                        <li><a href="<?= url('home') ?>" class="link">HOME</a></li>
                        <li><i class="icon icon-ArrowCaretRight"></i></li>
                        <li>SHOP</li>
                    </ul>
                    <h3 class="page-title font-instrument_serif fw-normal">Shop All Products</h3>
                    <p class="page-desc cl-text-main">
                        From gentle cleansers to powerful serums, find your skin's perfect match
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
        <?php if (!empty($search)): ?>
        <div class="meta-filter-shop">
            <p class="fw-normal">Search results for: <strong><?= e($search) ?></strong></p>
        </div>
        <?php endif; ?>
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
                                <span class="text-sort-value">Best Selling</span>
                            </p>
                            <span class="icon icon-ArrowCaretDown"></span>
                        </div>
                        <div class="dropdown-menu">
                            <div class="select-item active" data-sort-value="best-selling">
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
                    <li class="tf-view-layout-switch sw-layout-4 active d-none d-lg-flex" data-value-layout="tf-col-4">
                        <i class="icon-Grid4Col"></i>
                    </li>
                </ul>
            </div>
            <div class="col-right">
                <div class="fw-normal text-uppercase text-end">
                    <div id="product-count-grid" class="count-text"><?= count($products) ?> products</div>
                </div>
            </div>
        </div>
        <div class="wrapper-control-shop gridLayout-wrapper">
            <div class="tf-list-layout wrapper-shop" id="listLayout" style="display: none;">
                <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                <div class="card-product product-style_list" data-brand="<?= e($product['brand'] ?? '') ?>"
                    data-distribute="skinConcern-<?= $product['category_id'] ?? '' ?>">
                    <div class="card-product_wrapper">
                        <a href="<?= url('product/' . e($product['slug'])) ?>" class="product-img">
                            <img class="img-product" loading="lazy" width="348" height="420"
                                src="<?= url(e($product['image'])) ?>" alt="<?= e($product['name']) ?>">
                            <?php $hoverImages = !empty($product['images']) ? json_decode($product['images'], true) : null; ?>
                            <?php if (!empty($hoverImages[1])): ?>
                            <img class="img-hover" loading="lazy" width="348" height="420"
                                src="<?= url(e($hoverImages[1])) ?>" alt="<?= e($product['name']) ?>">
                            <?php endif; ?>
                        </a>
                        <?php if (!empty($product['badge'])): ?>
                        <ul class="product-badge_list">
                            <li class="product-badge_item text-body-s <?= e($product['badge_class'] ?? 'new') ?>"><?= e($product['badge']) ?></li>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="card-product_info">
                        <div class="product-info__rate">
                            <div class="star-wrap fs-12">
                                <?php for ($s = 0; $s < 5; $s++): ?>
                                <i class="icon <?= $s < round($product['avg_rating'] ?? 5) ? 'icon-Star' : 'icon-StarSroke' ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <span class="rate-number text-body-xs"><?= number_format($product['avg_rating'] ?? 5, 1) ?></span>
                        </div>
                        <a href="<?= url('product/' . e($product['slug'])) ?>" class="name-product fw-normal link-underline"><?= e($product['name']) ?></a>
                        <p class="description cl-text-5 text-line-clamp-3"><?= e($product['short_description'] ?? '') ?></p>
                        <div class="price-wrap">
                            <span class="price-new fw-normal"><?= formatPrice($product['price']) ?></span>
                        </div>
                        <ul class="product-action_list style-2">
                            <li>
                                <form method="POST" action="<?= url('cart/add') ?>" style="display:inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="hover-tooltip box-icon" style="border:none;background:none">
                                        <span class="icon icon-ShoppingCart"></span>
                                        <span class="tooltip">Add to Cart</span>
                                    </button>
                                </form>
                            </li>
                            <li>
                                <a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip box-icon">
                                    <span class="icon icon-EyeOpen"></span>
                                    <span class="tooltip">Quick view</span>
                                </a>
                            </li>
                            <li class="wishlist">
                                <form method="POST" action="<?= url('wishlist/add') ?>" style="display:inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <button type="submit" class="hover-tooltip box-icon" style="border:none;background:none">
                                        <span class="icon icon-Hearth"></span>
                                        <span class="tooltip">Add to Wishlist</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php if (!empty($pagination) && $pagination['last_page'] > 1): ?>
                <div class="wd-full justify-content-center">
                    <ul class="tf-page-pagination">
                        <?php for ($page = 1; $page <= $pagination['last_page']; $page++): ?>
                        <li>
                            <?php if ($page == $pagination['current_page']): ?>
                            <span class="pag-item active"><?= $page ?></span>
                            <?php else: ?>
                            <a href="<?= url('shop?page=' . $page . (!empty($search) ? '&search=' . urlencode($search) : '')) ?>" class="pag-item cl-text-main link-black"><?= $page ?></a>
                            <?php endif; ?>
                        </li>
                        <?php endfor; ?>
                        <?php if ($pagination['current_page'] < $pagination['last_page']): ?>
                        <li>
                            <a href="<?= url('shop?page=' . ($pagination['current_page'] + 1) . (!empty($search) ? '&search=' . urlencode($search) : '')) ?>" class="pag-item">
                                NEXT <i class="icon icon-ArrowRight fs-20"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <div class="wrapper-shop tf-grid-layout tf-col-4" id="gridLayout">
                <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                <div class="card-product grid" data-brand="<?= e($product['brand'] ?? '') ?>"
                    data-distribute="skinConcern-<?= $product['category_id'] ?? '' ?>">
                    <div class="card-product_wrapper">
                        <a href="<?= url('product/' . e($product['slug'])) ?>" class="product-img">
                            <img class="img-product" loading="lazy" width="348" height="420"
                                src="<?= url(e($product['image'])) ?>" alt="<?= e($product['name']) ?>">
                            <?php $hoverImages = !empty($product['images']) ? json_decode($product['images'], true) : null; ?>
                            <?php if (!empty($hoverImages[1])): ?>
                            <img class="img-hover" loading="lazy" width="348" height="420"
                                src="<?= url(e($hoverImages[1])) ?>" alt="<?= e($product['name']) ?>">
                            <?php endif; ?>
                        </a>
                        <?php if (!empty($product['badge'])): ?>
                        <ul class="product-badge_list">
                            <li class="product-badge_item text-body-s <?= e($product['badge_class'] ?? 'new') ?>"><?= e($product['badge']) ?></li>
                        </ul>
                        <?php endif; ?>
                        <ul class="product-action_list">
                            <li><a href="#modalQuickView" data-bs-toggle="modal" class="hover-tooltip tooltip-left box-icon"><span class="icon icon-EyeOpen"></span><span class="tooltip">Quick view</span></a></li>
                            <li class="wishlist">
                                <form method="POST" action="<?= url('wishlist/add') ?>" style="display:inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <button type="submit" class="hover-tooltip tooltip-left box-icon" style="border:none;background:none">
                                        <span class="icon icon-Hearth"></span><span class="tooltip">Add to Wishlist</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                        <div class="product-action_bot">
                            <form method="POST" action="<?= url('cart/add') ?>">
                                <?= csrf_field() ?>
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
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
                                <i class="icon <?= $s < round($product['avg_rating'] ?? 5) ? 'icon-Star' : 'icon-StarSroke' ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <span class="rate-number text-body-xs"><?= number_format($product['avg_rating'] ?? 5, 1) ?></span>
                        </div>
                        <a href="<?= url('product/' . e($product['slug'])) ?>" class="name-product fw-normal link-underline"><?= e($product['name']) ?></a>
                        <div class="price-wrap">
                            <span class="price-new fw-normal"><?= formatPrice($product['price']) ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php if (!empty($pagination) && $pagination['last_page'] > 1): ?>
                <div class="wd-full justify-content-center">
                    <ul class="tf-page-pagination">
                        <?php for ($page = 1; $page <= $pagination['last_page']; $page++): ?>
                        <li>
                            <?php if ($page == $pagination['current_page']): ?>
                            <span class="pag-item active"><?= $page ?></span>
                            <?php else: ?>
                            <a href="<?= url('shop?page=' . $page . (!empty($search) ? '&search=' . urlencode($search) : '')) ?>" class="pag-item cl-text-main link-black"><?= $page ?></a>
                            <?php endif; ?>
                        </li>
                        <?php endfor; ?>
                        <?php if ($pagination['current_page'] < $pagination['last_page']): ?>
                        <li>
                            <a href="<?= url('shop?page=' . ($pagination['current_page'] + 1) . (!empty($search) ? '&search=' . urlencode($search) : '')) ?>" class="pag-item">
                                NEXT <i class="icon icon-ArrowRight fs-20"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- /Shop -->

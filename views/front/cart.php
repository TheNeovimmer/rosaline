<?php $pageTitle = 'Shopping Cart'; ?>
<?php $items = $cart ?? []; ?>
<!-- Page Title -->
<section class="tf-page-heading flat-spacing">
    <div class="container">
        <div class="row">
            <div class="col-9 col-sm-6">
                <div class="content text-start">
                    <ul class="breadcrumb">
                        <li><a href="<?= url() ?>" class="link">HOME</a></li>
                        <li><i class="icon icon-ArrowCaretRight"></i></li>
                        <li>CART</li>
                    </ul>
                    <h3 class="page-title font-instrument_serif fw-normal mb-0">
                        Your Cart (<?= count($items) ?>)
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart -->
<div class="section-shopping-cart each-list-prd flat-spacing-2 pb-0">
    <div class="container">
        <div class="row gy-30">
            <div class="col-lg-7">
                <div class="overflow-auto">
                    <div class="tf-table-page-cart">
                        <?php if (empty($items)): ?>
                        <div class="text-center py-5">
                            <p class="text-body-l fw-normal mb-16">Your cart is empty</p>
                            <a href="<?= url('shop') ?>" class="tf-btn type-2">Continue Shopping</a>
                        </div>
                        <?php else: ?>
                        <?php foreach ($items as $item): ?>
                        <div class="tf-cart_item each-prd file-delete" data-product-id="<?= $item['product_id'] ?>" data-price="<?= $item['price'] ?>">
                            <div class="cart-col cart_product">
                                <a href="<?= url('product/' . $item['slug']) ?>" class="img-prd">
                                    <img loading="lazy" width="128" height="154"
                                        src="<?= url($item['image']) ?>"
                                        alt="<?= e($item['name']) ?>">
                                </a>
                                <div class="infor-prd">
                                    <a href="<?= url('product/' . $item['slug']) ?>" class="prd_name fw-normal link-underline">
                                        <?= e($item['name']) ?>
                                    </a>
                                    <div class="price-wrap fw-normal gap-6">
                                        <p class="price-new text-primary cart_price each-price"><?= formatPrice($item['price']) ?></p>
                                    </div>
                                    <div class="cart_remove tf-btn-line fw-normal remove">
                                        REMOVE
                                    </div>
                                </div>
                            </div>
                            <div class="cart-col cart_quantity" data-cart-title="Quantity">
                                <div class="wg-quantity">
                                    <button class="btn-quantity minus-quantity"><i class="icon icon-Minus"></i></button>
                                    <input class="quantity-product" type="text" name="number" value="<?= $item['quantity'] ?>">
                                    <button class="btn-quantity plus-quantity"><i class="icon icon-Plus"></i></button>
                                </div>
                            </div>
                            <div class="cart-col cart_total fw-normal each-subtotal-price" data-cart-title="Total">
                                <?= formatPrice($item['price'] * $item['quantity']) ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="fl-sidebar-cart">
                    <div class="notification-progress">
                        <p class="fw-normal mb-8">
                            <?php $freeShippingThreshold = 200; ?>
                            <?php $freeShippingEarned = $total >= $freeShippingThreshold; ?>
                            <?php if ($freeShippingEarned): ?>
                            You've earned free shipping!
                            <?php else: ?>
                            Spend <?= formatPrice($freeShippingThreshold - $total) ?> more for free shipping
                            <?php endif; ?>
                        </p>
                        <div class="progress-cart">
                            <div class="value" style="width: <?= min(100, ($total / $freeShippingThreshold) * 100) ?>%;" data-progress="<?= min(100, ($total / $freeShippingThreshold) * 100) ?>"></div>
                        </div>
                    </div>
                    <div class="box-order-gift">
                        <div class="img-item">
                            <svg width="48" height="179" viewBox="0 0 48 179" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="18" width="12" height="179" fill="#D9D6FE" />
                                <path d="M20.352 45.12C20.1493 45.12 19.9467 44.96 19.9467 44.7146V39.1786C19.9467 38.9546 20.128 38.7733 20.352 38.7733H27.6587C27.8827 38.7733 28.064 38.9653 28.064 39.1786V44.7146C28.064 44.9706 27.8613 45.12 27.6587 45.12H20.352Z" fill="#5925DC" />
                                <path d="M18.9654 38.6026C18.8907 38.784 18.848 38.976 18.848 39.1786V44.7146C18.848 45.1306 19.0187 45.504 19.2854 45.7706C18.0587 47.392 15.296 50.208 10.0267 52.1066C9.99471 52.1173 9.97337 52.1173 9.95204 52.1386H9.94137C8.52271 52.6506 6.92271 53.088 5.13071 53.4186C4.59737 53.5146 4.08537 53.2693 3.81871 52.7893C0.16004 45.888 0.16004 38.88 3.81871 31.9786C4.07471 31.4986 4.58671 31.2533 5.13071 31.3493C13.0987 32.8426 17.1627 36.416 18.9654 38.6026Z" fill="#5925DC" />
                                <path d="M23.136 46.2186L14.3253 64.672L7.92529 56.4053L10.5066 53.0986C16.2026 51.008 19.104 47.8826 20.32 46.2186H20.352H23.136Z" fill="#5925DC" />
                                <path d="M44.1814 31.9787C47.8507 38.88 47.8507 45.888 44.1814 52.7893C43.9254 53.2693 43.4134 53.5147 42.8694 53.4187C41.0667 53.088 39.4667 52.64 38.0587 52.1387H38.0481C38.0267 52.128 37.9947 52.1173 37.9734 52.1067C32.7041 50.1973 29.9414 47.392 28.7147 45.7707C28.9814 45.504 29.1521 45.12 29.1521 44.7147V39.1787C29.1521 38.976 29.1094 38.7733 29.0347 38.6027C30.8374 36.416 34.9014 32.8427 42.8801 31.36C43.4134 31.2533 43.9254 31.4987 44.1814 31.9787Z" fill="#5925DC" />
                                <path d="M37.4933 53.0987L40.0747 56.4053L33.6747 64.6613L24.864 46.208H27.648H27.68C28.896 47.8827 31.7973 51.008 37.4933 53.0987Z" fill="#5925DC" />
                            </svg>
                        </div>
                        <p class="title text-body-l fw-normal mb-8">Buying for a loved one?</p>
                        <p class="desc cl-text-5 mb-24">Send personalized message on card along with a gift wrapper</p>
                        <a href="#" class="tf-btn-line style-purple fw-normal">ADD GIFT WRAP</a>
                    </div>
                    <div class="box-checkout">
                        <div class="tf-mini-cart-tool mb-24">
                            <div class="tf-mini-cart-tool-btn style-2 btn-checkout-note">
                                <i class="icon icon-Note"></i>
                                <span class="text-body-s fw-normal md-d-none">Order note</span>
                                <span class="text-body-s fw-normal d-md-none">Note</span>
                            </div>
                            <div class="tf-mini-cart-tool-btn style-2 btn-checkout-shipping">
                                <i class="icon icon-Timer"></i>
                                <span class="text-body-s fw-normal xxl-d-none">Estimate shipping</span>
                                <span class="text-body-s fw-normal d-xxl-none">Shipping</span>
                            </div>
                            <div class="tf-mini-cart-tool-btn style-2 btn-checkout-gift">
                                <i class="icon icon-Share"></i>
                                <span class="text-body-s fw-normal">Discount</span>
                            </div>
                        </div>
                        <div class="tf-checkout-sub-form active-checkout-note">
                            <form action="#">
                                <div class="tf-field mb-16">
                                    <label for="checkoutNote" class="text-body-xs">Special instructions</label>
                                    <textarea class="style-4" name="note" id="checkoutNote" placeholder="Add notes or special requests" required=""></textarea>
                                </div>
                                <div class="tf-cart-tool-btns">
                                    <button class="subscribe-button tf-btn type-4 style-2" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="tf-checkout-sub-form active-checkout-shipping estimate-shipping">
                            <form class="tf-mini-cart-tool-content shipping-form">
                                <div class="form-content">
                                    <div class="zipcode-message error text-body-s" style="display: none">
                                        <p class="msg-text_1 fw-normal mb-6"><i class="icon icon-Close fs-16"></i>Unable to calculate shipping</p>
                                        <p class="msg-text_2">Shipping couldn't be calculated for this address. Check your details and try again.</p>
                                    </div>
                                    <div class="zipcode-message success text-body-s" style="display: none">
                                        <p class="msg-text_1 fw-normal mb-6"><i class="icon icon-Check fs-16"></i>Shipping option available</p>
                                        <p class="msg-text_2">Standard delivery — <span class="fw-normal"> Calculated at checkout</span></p>
                                    </div>
                                    <div class="tf-field">
                                        <label for="shipping-country-checkout" class="text-body-xs">Country</label>
                                        <div class="tf-select w-100">
                                            <select id="shipping-country-checkout" class="shipping-country style-4" name="address[country]" data-default="">
                                                <option value="Tunisia" selected>Tunisia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-field">
                                        <label for="zipcode-checkout" class="text-body-xs">Zip/Postal code</label>
                                        <input type="text" placeholder="Postal code" data-opend-focus id="zipcode-checkout" class="zipcode style-4" name="address[zip]" value="">
                                    </div>
                                    <button class="subscribe-button tf-btn style-2 type-4" type="submit">Calculate</button>
                                </div>
                            </form>
                        </div>
                        <div class="tf-checkout-sub-form active-checkout-gift">
                            <form action="#">
                                <div class="tf-field mb-16">
                                    <label for="checkoutGift" class="text-body-xs">Discount code</label>
                                    <input class="style-4" type="text" id="checkoutGift" placeholder="Enter discount code here" required>
                                </div>
                                <div class="tf-cart-tool-btns">
                                    <button class="subscribe-button tf-btn type-4 style-2" type="submit">Apply</button>
                                </div>
                            </form>
                        </div>
                        <div class="br-line bg-line-5 mb-24"></div>
                        <div class="total-order text-body-l mb-8">
                            <span class="fw-normal">Estimated total</span>
                            <div class="price-wrap gap-6">
                                <span class="total fw-normal each-total-price"><?= formatPrice($total) ?></span>
                            </div>
                        </div>
                        <a href="<?= url('checkout') ?>" class="tf-btn type-2 style-2 w-100 mb-16">Check out</a>
                        <p class="text-center text-body-s cl-text-5 mb-24">Tax and shipping calculated at checkout</p>
                        <ul class="list-card justify-content-center">
                            <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/visa.svg') ?>" alt="card"></li>
                            <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/water.svg') ?>" alt="card"></li>
                            <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/master.svg') ?>" alt="card"></li>
                            <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/tripe.svg') ?>" alt="card"></li>
                            <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/paypal.svg') ?>" alt="card"></li>
                            <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/g-play.svg') ?>" alt="card"></li>
                            <li class="card-item"><img width="48" height="32" src="<?= asset('images/payment/a-store.svg') ?>" alt="card"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

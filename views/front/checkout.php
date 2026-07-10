<?php $pageTitle = 'Checkout'; ?>
<div class="tf-page-checkout position-relative">
    <span class="br-line fake-class top-0 bg-line-5"></span>
    <div class="col-left flat-spacing-2" style="margin-top:40px">
        <form class="content-left" action="<?= url('checkout/place') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="wrap-checkout box-contact">
                <div class="title">
                    <span class="h7 font-instrument_serif">Contact</span>
                    <?php if (!$user): ?>
                    <a href="<?= url('login') ?>" class="tf-btn-line fw-normal">SIGN IN</a>
                    <?php endif; ?>
                </div>
                <div class="form-content">
                    <fieldset class="tf-field">
                        <label for="email2" class="text-body-xs">Your email*</label>
                        <input id="email2" class="style-4" type="text" name="email" placeholder="Enter your email" value="<?= e(old('email', $user['email'] ?? '')) ?>" required>
                        <?php if (error('email')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('email')) ?></p><?php endif; ?>
                    </fieldset>
                </div>
            </div>
            <div class="wrap-checkout box-delivery">
                <p class="title h7 font-instrument_serif">Delivery</p>
                <div class="form-content">
                    <div class="tf-grid-layout sm-col-2 gap-8">
                        <fieldset class="tf-field">
                            <label for="deliveryFirstName" class="text-body-xs">First name</label>
                            <input id="deliveryFirstName" class="style-4" type="text" name="first_name" placeholder="First name" value="<?= e(old('first_name')) ?>" required>
                            <?php if (error('first_name')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('first_name')) ?></p><?php endif; ?>
                        </fieldset>
                        <fieldset class="tf-field">
                            <label for="deliveryLastName" class="text-body-xs">Last name</label>
                            <input id="deliveryLastName" class="style-4" type="text" name="last_name" placeholder="Last name" value="<?= e(old('last_name')) ?>" required>
                            <?php if (error('last_name')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('last_name')) ?></p><?php endif; ?>
                        </fieldset>
                    </div>
                    <fieldset class="tf-field">
                        <label for="deliveryPhone" class="text-body-xs">Phone (+216)</label>
                        <input id="deliveryPhone" class="style-4" type="tel" name="phone" placeholder="+216 XX XXX XXX" value="<?= e(old('phone')) ?>" required>
                        <small class="text-body-xs cl-text-5 mt-4 d-block">Enter Tunisian number: +216XXXXXXXX or 0XXXXXXXX</small>
                        <?php if (error('phone')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('phone')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label for="governorate" class="text-body-xs">Governorate</label>
                        <select name="governorate_id" id="governorate" class="style-4" required>
                            <option value="" data-fee="0">Select governorate</option>
                            <?php foreach ($data['governorates'] as $g): ?>
                            <option value="<?= $g['id'] ?>" data-fee="<?= (float)$g['shipping_fee'] ?>" <?= old('governorate_id') == $g['id'] ? 'selected' : '' ?>><?= e($g['name_en']) ?> (<?= formatPrice((float)$g['shipping_fee']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (error('governorate_id')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('governorate_id')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label for="deliveryAddress" class="text-body-xs">Address</label>
                        <input id="deliveryAddress" class="style-4" type="text" name="address" placeholder="Street, building, apartment" value="<?= e(old('address')) ?>" required>
                        <?php if (error('address')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('address')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label for="deliveryNotes" class="text-body-xs">Delivery notes (optional)</label>
                        <textarea id="deliveryNotes" class="style-4" name="delivery_notes" rows="2" placeholder="e.g. Leave at the door, call before delivery"><?= e(old('delivery_notes')) ?></textarea>
                    </fieldset>
                </div>
            </div>
            <div class="wrap-checkout box-payment">
                <p class="title h7 font-instrument_serif">Payment</p>
                <div class="box-payment-list" id="payment-method-box">
                    <div class="payment_accordion">
                        <label class="payment_check checkbox-wrap">
                            <input type="radio" name="payment_method" class="tf-check-rounded" id="cod" value="cod" checked>
                            <span class="pay-title text-body-s fw-normal">Cash on Delivery</span>
                        </label>
                        <?php if (!empty($data['cod']['description'])): ?>
                        <div class="payment_body form-content ps-32">
                            <p class="text-body-s"><?= e($data['cod']['description']) ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="wrap-checkout box-billing-address">
                <p class="title h7 font-instrument_serif">Billing address</p>
                <div class="list-checkbox-checkout">
                    <label for="checkBilling1" class="checkbox-checkout-item">
                        <input id="checkBilling1" name="billing" type="radio" class="tf-check-rounded" checked>
                        <span class="text text-body-s fw-normal">Same as shipping address</span>
                        <i class="icon icon-Truck"></i>
                    </label>
                    <label for="checkBilling2" class="checkbox-checkout-item">
                        <input id="checkBilling2" name="billing" type="radio" class="tf-check-rounded">
                        <span class="text text-body-s fw-normal">Use a different billing address</span>
                        <i class="icon icon-Pick"></i>
                    </label>
                </div>
            </div>
            <button type="submit" class="tf-btn style-2">Place order</button>
            <div class="tf-list flex-wrap">
                <a href="<?= url('privacy-policy') ?>" class="text-decoration-underline link">Refund policy</a>
                <a href="<?= url('privacy-policy') ?>" class="text-decoration-underline link">Shipping</a>
                <a href="<?= url('privacy-policy') ?>" class="text-decoration-underline link">Privacy policy</a>
                <a href="<?= url('terms-of-service') ?>" class="text-decoration-underline link">Terms of service</a>
                <a href="<?= url('privacy-policy') ?>" class="text-decoration-underline link">Legal notice</a>
                <a href="<?= url('contact') ?>" class="text-decoration-underline link">Contact</a>
            </div>
        </form>
    </div>
    <div class="col-right flat-spacing-2" style="margin-top:40px">
        <div class="content-right sticky-top">
            <p class="h7 font-instrument_serif mb-16">Order Summary</p>
            <ul class="list-order-product">
                <?php $cartItems = $cart ?? []; ?>
                <?php $freeThreshold = 200; ?>
                <?php foreach ($cartItems as $item): ?>
                <li class="order-item">
                    <a href="<?= url('product/' . $item['slug']) ?>" class="img-prd">
                        <img loading="lazy" width="74" height="88" src="<?= url($item['image']) ?>" alt="<?= e($item['name']) ?>">
                        <span class="prd_quanitty text-body-s"><?= $item['quantity'] ?></span>
                    </a>
                    <div class="infor-prd">
                        <a href="<?= url('product/' . $item['slug']) ?>" class="prd_name fw-normal link-underline text-line-clamp-1"><?= e($item['name']) ?></a>
                        <div class="price-wrap fw-normal gap-6">
                            <span class="price-new text-primary"><?= formatPrice($item['price']) ?></span>
                        </div>
                    </div>
                    <div class="prd_price fw-normal"><?= formatPrice($item['price'] * $item['quantity']) ?></div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php if (error('general')): ?>
            <div class="alert alert-danger py-2 mt-3"><?= e(error('general')) ?></div>
            <?php endif; ?>
            <ul class="box-total">
                <li class="fw-normal">
                    <span>Subtotal (<?= count($cartItems) ?> items)</span>
                    <span><?= formatPrice($total) ?></span>
                </li>
                <li class="fw-normal" id="shipping-row">
                    <span>Shipping</span>
                    <span id="shipping-display">Select governorate</span>
                </li>
                <?php if ($total < $freeThreshold): ?>
                <li class="fw-normal text-body-xs cl-text-5">
                    <span>Free shipping on orders over <?= formatPrice($freeThreshold) ?></span>
                    <span></span>
                </li>
                <?php endif; ?>
                <li>
                    <p class="d-grid">
                        <span class="fw-normal mb-8 text-body-l">Total</span>
                        <span class="text-body-xs cl-text-5">Cash on Delivery</span>
                    </p>
                    <span class="fw-normal" id="total-display"><?= formatPrice($total) ?></span>
                </li>
            </ul>
            <div class="mt-16 p-12" style="background:#f8f6f3;border-radius:8px">
                <p class="text-body-xs cl-text-5 mb-4"><i class="icon icon-Shield fs-14"></i> Secure checkout</p>
                <p class="text-body-xs cl-text-5">Pay when you receive. Your payment info is safe.</p>
            </div>
        </div>
    </div>
</div>
<script>
(function() {
    var subTotal = <?= json_encode($total) ?>;
    var freeThreshold = <?= json_encode($freeThreshold) ?>;
    var $gov = document.getElementById('governorate');
    var $shipDisplay = document.getElementById('shipping-display');
    var $totalDisplay = document.getElementById('total-display');

    function updateShipping() {
        var opt = $gov.options[$gov.selectedIndex];
        var fee = parseFloat(opt.getAttribute('data-fee')) || 0;
        var total = subTotal;
        if (freeThreshold > 0 && subTotal >= freeThreshold) {
            fee = 0;
            $shipDisplay.textContent = 'Free (' + formatPrice(fee) + ')';
        } else if (fee > 0) {
            $shipDisplay.textContent = formatPrice(fee);
        } else {
            $shipDisplay.textContent = 'TBD';
        }
        total = subTotal + fee;
        $totalDisplay.textContent = formatPrice(total);
    }

    function formatPrice(price) {
        return price.toFixed(3) + ' TND';
    }

    if ($gov) $gov.addEventListener('change', updateShipping);
})();
</script>

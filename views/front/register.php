<?php $pageTitle = 'Register'; ?>
<!-- Log -->
<div class="section-log tf-grid-layout gap-0 md-col-2">
    <div class="image-left">
        <img loading="lazy" width="960" height="952" src="<?= asset('images/section/log.jpg') ?>" alt="Image">
        <div class="infiniteSlide-text-icon">
            <div class="infiniteSlide infiniteSlide-wrapper" data-clone="3">
                <div class="infiniteSlide-item">
                    <p class="text h1 font-instrument_serif text-white">Beauty That Feels Like You</p>
                </div>
                <div class="infiniteSlide-item">
                    <div class="br-dot stroke-white"></div>
                </div>
                <div class="infiniteSlide-item">
                    <p class="text h1 font-instrument_serif troke-text_white">Naturally Radiant</p>
                </div>
                <div class="infiniteSlide-item">
                    <div class="br-dot stroke-white"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-right">
        <div class="content_inner">
            <h3 class="title font-instrument_serif">Create an Account</h3>
            <form action="<?= url('register') ?>" method="POST" class="form-log">
                <?= csrf_field() ?>
                <div class="form-content">
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="registerFirstname">First name*</label>
                        <input class="style-3" type="text" name="first_name" id="registerFirstname" placeholder="Your first name" value="<?= e(old('first_name')) ?>" required>
                        <?php if (error('first_name')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('first_name')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="registerLastname">Last name*</label>
                        <input class="style-3" type="text" name="last_name" id="registerLastname" placeholder="Your last name" value="<?= e(old('last_name')) ?>" required>
                        <?php if (error('last_name')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('last_name')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="registerEmail">Your email*</label>
                        <input class="style-3" type="email" name="email" id="registerEmail" placeholder="Enter your email" value="<?= e(old('email')) ?>" required>
                        <?php if (error('email')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('email')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="regPass">Password*</label>
                        <div class="password-wrapper w-100">
                            <input class="password-field style-3" type="password" name="password" id="regPass" placeholder="Enter your password" required>
                            <span class="toggle-pass icon-EyeOpen cl-text-5"></span>
                        </div>
                        <?php if (error('password')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('password')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="regPassConfirm">Confirm password*</label>
                        <div class="password-wrapper w-100">
                            <input class="password-field style-3" type="password" name="password_confirmation" id="regPassConfirm" placeholder="Confirm your password" required>
                            <span class="toggle-pass icon-EyeOpen cl-text-5"></span>
                        </div>
                    </fieldset>
                </div>
                <div class="tf-grid-layout mb-24">
                    <div class="checkbox-wrap">
                        <input type="checkbox" id="registerTerm" class="tf-check" required>
                        <label for="registerTerm" class="text-body-s text-start">
                            By clicking here, I agree to the
                            <a href="<?= url('terms-of-service') ?>" class="link-underline">Terms of use</a>
                            and
                            <a href="<?= url('privacy-policy') ?>" class="link-underline">Privacy policy.</a>
                        </label>
                    </div>
                    <div class="checkbox-wrap">
                        <input type="checkbox" id="registerSub" class="tf-check">
                        <label for="registerSub" class="text-body-s text-start">
                            Subscribe for updates on products, events, and more. <br class="d-none d-sm-block">
                            Unsubscribe anytime.
                        </label>
                    </div>
                </div>
                <div class="form-btn">
                    <button type="submit" class="tf-btn type-2 style-2 w-100">Create an account</button>
                    <a href="<?= url('login') ?>" class="tf-btn-line">
                        <span class="fw-normal text-uppercase">Back to login</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

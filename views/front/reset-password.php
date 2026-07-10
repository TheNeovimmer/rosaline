<?php $pageTitle = 'Reset Password'; ?>
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
            <h3 class="title font-instrument_serif">Reset Password</h3>
            <form action="<?= url('reset-password') ?>" method="POST" class="form-log">
                <?= csrf_field() ?>
                <div class="form-content">
                    <?php if (hasErrors() && !error('password') && !error('password_confirmation')): ?>
                    <p class="text-body-xs text-danger mb-8"><?= e(error('_general')) ?></p>
                    <?php endif; ?>
                    <input type="hidden" name="token" value="<?= e($token ?? '') ?>">
                    <input type="hidden" name="email" value="<?= e($email ?? '') ?>">
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="resetPass">New Password*</label>
                        <div class="password-wrapper w-100">
                            <input class="password-field style-3" type="password" name="password" id="resetPass" placeholder="Enter new password" required>
                            <span class="toggle-pass icon-EyeOpen cl-text-5"></span>
                        </div>
                        <?php if (error('password')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('password')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="resetPassConfirm">Confirm Password*</label>
                        <div class="password-wrapper w-100">
                            <input class="password-field style-3" type="password" name="password_confirmation" id="resetPassConfirm" placeholder="Confirm new password" required>
                            <span class="toggle-pass icon-EyeOpen cl-text-5"></span>
                        </div>
                        <?php if (error('password_confirmation')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('password_confirmation')) ?></p><?php endif; ?>
                    </fieldset>
                </div>
                <div class="form-btn">
                    <button type="submit" class="tf-btn type-2 style-2 w-100">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

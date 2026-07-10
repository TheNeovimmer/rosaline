<?php $pageTitle = 'Forgot Password'; ?>
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
            <?php if (success()): ?>
            <div class="alert alert-success text-body-s mb-16"><?= e(success()) ?></div>
            <?php endif; ?>
            <h3 class="title font-instrument_serif">Forgot Password?</h3>
            <form action="<?= url('forgot-password') ?>" method="POST" class="form-log">
                <div class="form-content">
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="forgotPass">Your email*</label>
                        <input class="style-3" type="email" name="email" id="forgotPass" placeholder="Enter your email" value="<?= e(old('email')) ?>" required>
                        <?php if (error('email')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('email')) ?></p><?php endif; ?>
                        <label for="forgotPass" class="text-body-xs cl-text-5">Enter your email address to receive a password reset link.</label>
                    </fieldset>
                </div>
                <div class="form-btn">
                    <button type="submit" class="tf-btn type-2 style-2 w-100">Send reset link</button>
                </div>
            </form>
        </div>
    </div>
</div>

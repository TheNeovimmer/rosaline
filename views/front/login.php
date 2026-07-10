<?php $pageTitle = 'Login'; ?>
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
            <h3 class="title font-instrument_serif">Login</h3>
            <form action="<?= url('login') ?>" method="POST" class="form-log">
                <div class="form-content">
                    <?php if (hasErrors() && !error('email') && !error('password')): ?>
                    <p class="text-body-xs text-danger mb-8"><?= e(error('_general')) ?></p>
                    <?php endif; ?>
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="logName">Your email*</label>
                        <input class="style-3" type="email" name="email" id="logName" placeholder="Enter your email" value="<?= e(old('email')) ?>" required>
                        <?php if (error('email')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('email')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label class="text-body-xs" for="logPass">Password*</label>
                        <div class="password-wrapper w-100">
                            <input class="password-field style-3" type="password" name="password" id="logPass" placeholder="Enter your password" required>
                            <span class="toggle-pass icon-EyeOpen cl-text-5"></span>
                        </div>
                        <?php if (error('password')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('password')) ?></p><?php endif; ?>
                        <a href="<?= url('forgot-password') ?>" class="text-body-xs text-decoration-underline link" tabindex="-1">Forgot your password?</a>
                    </fieldset>
                </div>
                <div class="form-btn">
                    <button type="submit" class="tf-btn type-2 style-2 w-100">Sign In</button>
                    <a href="<?= url('register') ?>" class="tf-btn-line">
                        <span class="fw-normal text-uppercase">Create an account</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

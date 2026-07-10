<?php $pageTitle = 'Contact'; ?>
<!-- Contact -->
<div class="section-split section-contact">
    <div class="col-content bg-main">
        <ul class="tf-breadcrumb">
            <li><a href="<?= url() ?>" class="link">HOME</a></li>
            <li><i class="icon icon-ArrowCaretRight"></i></li>
            <li>CONTACT</li>
        </ul>
        <div class="sect-heading-v2 start my-auto">
            <p class="eyebrow-label cl-text-5"><span class="br-dot"></span>GET IN TOUCH</p>
            <h3 class="s-title font-instrument_serif">We'd Love to Hear From You</h3>
            <p class="s-desc cl-text-5">Have a question about our products or need skincare advice? Our team is here to help.</p>
        </div>
    </div>
    <div class="col-media">
        <img loading="lazy" width="960" height="952" src="<?= asset('images/section/hero-contact.jpg') ?>" alt="Image">
        <div class="col-media_inner">
            <h5 class="font-instrument_serif lh-xl-40 mb-24">Send Us a Message</h5>
            <?php if (success()): ?>
            <div class="alert alert-success text-body-s mb-16"><?= e(success()) ?></div>
            <?php endif; ?>
            <form action="<?= url('contact') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="form-content mb-24">
                    <fieldset class="tf-field">
                        <label for="messName" class="text-body-xs">Your name*</label>
                        <input class="style-3" type="text" name="name" id="messName" placeholder="Enter your name" value="<?= e(old('name')) ?>" required>
                        <?php if (error('name')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('name')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label for="messEmail2" class="text-body-xs">Your email*</label>
                        <input class="style-3" type="email" name="email" id="messEmail2" placeholder="Enter your email" value="<?= e(old('email')) ?>" required>
                        <?php if (error('email')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('email')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label for="messSubject" class="text-body-xs">Your subject*</label>
                        <input class="style-3" type="text" name="subject" id="messSubject" placeholder="How can we help?" value="<?= e(old('subject')) ?>" required>
                        <?php if (error('subject')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('subject')) ?></p><?php endif; ?>
                    </fieldset>
                    <fieldset class="tf-field">
                        <label for="messFied" class="text-body-xs">Your message*</label>
                        <textarea class="style-3" name="message" id="messFied" placeholder="Tell us more about your inquiry..." required><?= e(old('message')) ?></textarea>
                        <?php if (error('message')): ?><p class="text-body-xs text-danger mt-4"><?= e(error('message')) ?></p><?php endif; ?>
                    </fieldset>
                </div>
                <button type="submit" class="tf-btn type-2 style-2 w-100">Send Message</button>
            </form>
        </div>
    </div>
</div>
<!-- Contact Information -->
<div class="section-contact-infor flat-spacing">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="sect-heading-v2 start">
                    <p class="eyebrow-label cl-text-5"><span class="br-dot"></span>CONTACT INFORMATION</p>
                    <h3 class="s-title font-instrument_serif">Questions or support? <br class="ssm-d-none">We're here to help.</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tf-grid-layout tf-col-2 gap-20 gap-xl-24">
                    <div class="box-infor">
                        <span class="ic-wrap"><i class="icon icon-ShopLocationPin"></i></span>
                        <p class="infor-title h6 font-instrument_serif">Visit Our Store</p>
                        <p class="infor-desc cl-text-5">245 Madison Avenue <br>New York, NY 10016 <br>United States</p>
                    </div>
                    <div class="box-infor">
                        <span class="ic-wrap"><i class="icon icon-Telephone"></i></span>
                        <p class="infor-title h6 font-instrument_serif">Call Us</p>
                        <p class="infor-desc cl-text-5">+1 (212) 555-0198 <br>Monday – Friday · 9am – 6pm (EST)</p>
                    </div>
                    <div class="box-infor">
                        <span class="ic-wrap"><i class="icon icon-DoubleMail"></i></span>
                        <p class="infor-title h6 font-instrument_serif">Email Us</p>
                        <p class="infor-desc cl-text-5">hello@rosaline.com<br>support@rosaline.com</p>
                    </div>
                    <div class="box-infor">
                        <span class="ic-wrap"><i class="icon icon-Clock"></i></span>
                        <p class="infor-title h6 font-instrument_serif">Working Hours</p>
                        <p class="infor-desc cl-text-5">Monday – Friday · 9am – 6pm (EST) <br>Saturday · 10am – 4pm (EST)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQs -->
<div class="flat-spacing bg-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="sect-heading-v2 space-1">
                    <p class="eyebrow-label cl-text-6"><span class="br-dot"></span>GOT QUESTIONS?</p>
                    <h3 class="s-title font-instrument_serif">Everything You Need to Know</h3>
                </div>
                <div class="faq-contact" id="faqContact">
                    <div class="accordion-item">
                        <div class="accordion-action h7 font-instrument_serif" data-bs-target="#faqContact-1" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqContact-1" role="button">
                            <span class="text">Can I use this serum with retinol?</span>
                            <span class="icon ic-accordion-custom"></span>
                        </div>
                        <div id="faqContact-1" class="collapse show" data-bs-parent="#faqContact">
                            <div class="accordion-content"><p class="cl-text-5">We recommend alternating nights. Use the serum on one night, and retinol on another, to avoid irritation.</p></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqContact-2" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqContact-2" role="button">
                            <span class="text">Is it safe for sensitive skin?</span>
                            <span class="icon ic-accordion-custom"></span>
                        </div>
                        <div id="faqContact-2" class="collapse" data-bs-parent="#faqContact">
                            <div class="accordion-content"><p class="cl-text-5">Yes, our products are formulated with sensitive skin in mind. We recommend doing a patch test before full application.</p></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqContact-3" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqContact-3" role="button">
                            <span class="text">How soon will I see results?</span>
                            <span class="icon ic-accordion-custom"></span>
                        </div>
                        <div id="faqContact-3" class="collapse" data-bs-parent="#faqContact">
                            <div class="accordion-content"><p class="cl-text-5">Most customers see visible improvements within 4-6 weeks of consistent use. Individual results may vary.</p></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqContact-4" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqContact-4" role="button">
                            <span class="text">Do I need to wear sunscreen with this product?</span>
                            <span class="icon ic-accordion-custom"></span>
                        </div>
                        <div id="faqContact-4" class="collapse" data-bs-parent="#faqContact">
                            <div class="accordion-content"><p class="cl-text-5">Yes! SPF is essential every day, regardless of the products you use. It protects your skin and prevents premature aging.</p></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqContact-5" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqContact-5" role="button">
                            <span class="text">Will it cause purging or breakouts?</span>
                            <span class="icon ic-accordion-custom"></span>
                        </div>
                        <div id="faqContact-5" class="collapse" data-bs-parent="#faqContact">
                            <div class="accordion-content"><p class="cl-text-5">Some active ingredients may cause temporary purging. This is normal and should subside within a few weeks.</p></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqContact-6" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqContact-6" role="button">
                            <span class="text">Is it pregnancy and breastfeeding safe?</span>
                            <span class="icon ic-accordion-custom"></span>
                        </div>
                        <div id="faqContact-6" class="collapse" data-bs-parent="#faqContact">
                            <div class="accordion-content"><p class="cl-text-5">Please consult your healthcare provider before using any new skincare products during pregnancy or while breastfeeding.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

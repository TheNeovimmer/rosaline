<?php $pageTitle = 'FAQ'; ?>
<section class="tf-page-heading flat-spacing">
    <div class="container">
        <div class="content">
            <ul class="breadcrumb">
                <li><a href="<?= url('/') ?>" class="link">HOME</a></li>
                <li><i class="icon icon-ArrowCaretRight"></i></li>
                <li>FAQS</li>
            </ul>
            <h3 class="page-title font-instrument_serif fw-normal">Frequently Asked Questions</h3>
            <p class="page-desc cl-text-main">
                Find answers to common questions about our products, shipping, returns, and more.
                <br class="d-none d-xl-block">
                Can't find what you're looking for? Feel free to contact us.
            </p>
        </div>
    </div>
</section>
<div class="flat-spacing">
    <div class="container">
        <div class="row gy-30">
            <div class="col-lg-4">
                <ul class="list-tab-btn-vertical sticky-top" role="tablist">
                    <li class="nav-tab-item" role="presentation">
                        <a href="#faqTab1" data-bs-toggle="tab" class="tf-btn-tab active" role="tab">
                            <span class="h6 font-instrument_serif">Orders & Shipping</span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                    </li>
                    <li class="nav-tab-item" role="presentation">
                        <a href="#faqTab2" data-bs-toggle="tab" class="tf-btn-tab" role="tab">
                            <span class="h6 font-instrument_serif fw-normal">Returns & Refunds</span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                    </li>
                    <li class="nav-tab-item" role="presentation">
                        <a href="#faqTab3" data-bs-toggle="tab" class="tf-btn-tab" role="tab">
                            <span class="h6 font-instrument_serif fw-normal">Products & Ingredients</span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                    </li>
                    <li class="nav-tab-item" role="presentation">
                        <a href="#faqTab4" data-bs-toggle="tab" class="tf-btn-tab" role="tab">
                            <span class="h6 font-instrument_serif fw-normal">Skincare Advice</span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                    </li>
                    <li class="nav-tab-item" role="presentation">
                        <a href="#faqTab5" data-bs-toggle="tab" class="tf-btn-tab" role="tab">
                            <span class="h6 font-instrument_serif fw-normal">Account & Membership</span>
                            <i class="icon icon-ArrowCaretRight"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8 flat-animate-tab">
                <div class="tab-content">
                    <div class="tab-pane active show" id="faqTab1" role="tabpanel">
                        <div class="d-grid gap-8" id="faqAccordion">
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif" data-bs-target="#faqAccordion-1" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqAccordion-1" role="button">
                                    <span class="text">How long does shipping take?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion-1" class="collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Standard shipping within Vietnam takes 3-5 business days. Express shipping is available for 1-2 business days delivery. International orders typically arrive within 7-14 business days depending on the destination.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion-2" role="button">
                                    <span class="text">Do you offer free shipping?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion-2" class="collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Yes, we offer free standard shipping on all orders over <?= formatPrice(200) ?> within Tunisia. For international orders, free shipping is available on orders over <?= formatPrice(500) ?>.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion-3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion-3" role="button">
                                    <span class="text">Can I track my order?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion-3" class="collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Absolutely! Once your order ships, you'll receive a confirmation email with a tracking number. You can also track your order directly from your account dashboard.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion-4" role="button">
                                    <span class="text">What if my package is lost or damaged?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion-4" class="collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">We're sorry to hear that. Contact our support team within 48 hours of delivery, and we'll arrange a replacement or refund. Please include photos of any damage for faster processing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion-5" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion-5" role="button">
                                    <span class="text">Do you ship internationally?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion-5" class="collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Yes, we ship to over 40 countries worldwide. Shipping rates and delivery times vary by destination. Duties and taxes may apply for international orders.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="faqTab2" role="tabpanel">
                        <div class="d-grid gap-8" id="faqAccordion_2">
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif" data-bs-target="#faqAccordion_2-1" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqAccordion_2-1" role="button">
                                    <span class="text">What is your return policy?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_2-1" class="collapse show" data-bs-parent="#faqAccordion_2">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">We accept returns within 30 days of purchase. Products must be unused and in their original packaging. Refunds are processed within 5-7 business days after we receive the return.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_2-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_2-2" role="button">
                                    <span class="text">How do I initiate a return?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_2-2" class="collapse" data-bs-parent="#faqAccordion_2">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Log into your account, go to your orders page, select the order you want to return, and click "Request Return." You'll receive a prepaid shipping label via email.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_2-3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_2-3" role="button">
                                    <span class="text">Do you offer refunds or exchanges?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_2-3" class="collapse" data-bs-parent="#faqAccordion_2">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">We offer both. You can choose a refund to your original payment method or an exchange for a different product. Exchanges are processed free of charge.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_2-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_2-4" role="button">
                                    <span class="text">Can I return sale items?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_2-4" class="collapse" data-bs-parent="#faqAccordion_2">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Sale items marked 30% off or more are final sale and cannot be returned. Regular sale items with discounts under 30% follow our standard return policy.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="faqTab3" role="tabpanel">
                        <div class="d-grid gap-8" id="faqAccordion_3">
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif" data-bs-target="#faqAccordion_3-1" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqAccordion_3-1" role="button">
                                    <span class="text">Are your products cruelty-free?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_3-1" class="collapse show" data-bs-parent="#faqAccordion_3">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Yes, all Rosaline products are 100% cruelty-free. We never test on animals and are certified by Leaping Bunny.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_3-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_3-2" role="button">
                                    <span class="text">Are your products suitable for sensitive skin?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_3-2" class="collapse" data-bs-parent="#faqAccordion_3">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Many of our products are formulated for sensitive skin. Look for the "Sensitive" badge on product pages. We recommend patch testing any new product before full application.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_3-3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_3-3" role="button">
                                    <span class="text">What ingredients do you avoid?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_3-3" class="collapse" data-bs-parent="#faqAccordion_3">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">We avoid parabens, sulfates, phthalates, synthetic fragrances, and mineral oils. Our formulations prioritize clean, naturally-derived ingredients backed by science.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_3-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_3-4" role="button">
                                    <span class="text">Do your products expire?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_3-4" class="collapse" data-bs-parent="#faqAccordion_3">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Yes, all products have a shelf life indicated on the packaging. Most products are good for 12-24 months unopened and 6-12 months after opening. Look for the PAO (Period After Opening) symbol on each product.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="faqTab4" role="tabpanel">
                        <div class="d-grid gap-8" id="faqAccordion_4">
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif" data-bs-target="#faqAccordion_4-1" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqAccordion_4-1" role="button">
                                    <span class="text">What skincare routine do you recommend?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_4-1" class="collapse show" data-bs-parent="#faqAccordion_4">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">A basic routine includes cleanser, toner, serum, moisturizer, and sunscreen (AM). For evening, double cleanse, treat, and moisturize. Visit our Skincare Advice tab or take our Skin Quiz for personalized recommendations.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_4-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_4-2" role="button">
                                    <span class="text">How do I layer my products correctly?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_4-2" class="collapse" data-bs-parent="#faqAccordion_4">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Apply products from thinnest to thickest consistency: cleanser, toner, essence, serum, eye cream, moisturizer, then sunscreen (AM) or face oil (PM). Wait 30-60 seconds between layers for absorption.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_4-3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_4-3" role="button">
                                    <span class="text">How long before I see results?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_4-3" class="collapse" data-bs-parent="#faqAccordion_4">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Results vary by product and skin type. Generally, you can expect initial improvements within 2-4 weeks, with significant changes visible after 8-12 weeks of consistent use.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_4-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_4-4" role="button">
                                    <span class="text">Can I use multiple active ingredients together?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_4-4" class="collapse" data-bs-parent="#faqAccordion_4">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Some active ingredients pair well, while others can cause irritation when combined. For example, Vitamin C is best used in the morning and retinol at night. Avoid layering AHAs/BHAs with retinol in the same routine.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="faqTab5" role="tabpanel">
                        <div class="d-grid gap-8" id="faqAccordion_5">
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif" data-bs-target="#faqAccordion_5-1" data-bs-toggle="collapse" aria-expanded="true" aria-controls="faqAccordion_5-1" role="button">
                                    <span class="text">How do I create an account?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_5-1" class="collapse show" data-bs-parent="#faqAccordion_5">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Click "Register" at the top of the page. Fill in your name, email, and password. You can also sign up using your Google or Facebook account for faster checkout.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_5-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_5-2" role="button">
                                    <span class="text">How do I reset my password?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_5-2" class="collapse" data-bs-parent="#faqAccordion_5">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Click "Forgot Password" on the login page and enter your email address. You'll receive a password reset link. For security, links expire after 60 minutes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_5-3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_5-3" role="button">
                                    <span class="text">Do you have a loyalty program?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_5-3" class="collapse" data-bs-parent="#faqAccordion_5">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Yes! Join Rosaline Rewards to earn points on every purchase. Points can be redeemed for discounts, free products, and exclusive members-only perks.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item-2">
                                <div class="accordion-action h7 font-instrument_serif collapsed" data-bs-target="#faqAccordion_5-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="faqAccordion_5-4" role="button">
                                    <span class="text">Can I update my account information?</span>
                                    <span class="icon ic-accordion-custom"></span>
                                </div>
                                <div id="faqAccordion_5-4" class="collapse" data-bs-parent="#faqAccordion_5">
                                    <div class="accordion-content">
                                        <p class="cl-text-5">Yes, log into your account and navigate to "Account Settings." You can update your name, email, password, shipping addresses, and payment methods there.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flat-spacing bg-main-4">
    <div class="container">
        <div class="sect-heading-v2 space-1 start">
            <h3 class="s-title font-instrument_serif text-white">Didn't find your answer? Contact us for assistance!</h3>
        </div>
        <div class="tf-grid-layout sm-col-2 gap-16">
            <div class="wg-assistance">
                <span class="ic-wrap"><i class="icon icon-DoubleMail"></i></span>
                <p class="assistance-title h6 font-instrument_serif">Email Us</p>
                <p class="assistance-desc cl-text-5">hello@rosaline.com<br>support@rosaline.com</p>
                <a href="<?= url('contact') ?>" class="tf-btn type-2">Email us</a>
            </div>
            <div class="wg-assistance">
                <span class="ic-wrap"><i class="icon icon-Phone"></i></span>
                <p class="assistance-title h6 font-instrument_serif">Call Us</p>
                <p class="assistance-desc cl-text-5">+1 (212) 555-0198<br>Monday – Friday · 9am – 6pm (EST)</p>
                <a href="<?= url('contact') ?>" class="tf-btn type-2">call us</a>
            </div>
        </div>
    </div>
</div>

<?php $pageTitle = 'About Us'; ?>
<!-- Hero About -->
<section class="section-hero-about flat-spacing-4">
    <div class="about-image">
        <img loading="lazy" width="1920" height="952" src="<?= asset('images/section/hero-about.jpg') ?>" alt="Image">
    </div>
    <div class="about-content">
        <div class="container-3">
            <ul class="tf-breadcrumb text-white">
                <li><a href="<?= url() ?>" class="text-white link">HOME</a></li>
                <li><i class="icon icon-ArrowCaretRight"></i></li>
                <li>ABOUT</li>
            </ul>
            <div class="row gy-24 align-items-end">
                <div class="col-md-8 col-xl-7">
                    <div class="col-left">
                        <p class="eyebrow-label text-white"><span class="br-dot bg-white"></span>ABOUT ROSALINE</p>
                        <h2 class="title font-instrument_serif text-white">Our clinically proven formulas <br class="d-none d-xxl-block">rebuild the skin's balance — restoring <br class="d-none d-xxl-block">calm, clarity, and visible radiance.</h2>
                        <ul class="tf-list gap-16 list-benefit text-white">
                            <li><i class="icon icon-Check"></i><span class="fw-normal text-body-s">Dermatologist Tested</span></li>
                            <li><i class="icon icon-Check"></i><span class="fw-normal text-body-s">Cruelty Free</span></li>
                            <li><i class="icon icon-Check"></i><span class="fw-normal text-body-s">Clean Beauty</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-xl-5">
                    <div class="col-right">
                        <ul class="tf-list list-badge flex-md-wrap justify-content-md-end">
                            <li><img loading="lazy" width="64" height="64" src="<?= asset('images/brand/natural.png') ?>" alt="Image"></li>
                            <li><img loading="lazy" width="92" height="64" src="<?= asset('images/brand/ecosert.png') ?>" alt="Image"></li>
                            <li><img loading="lazy" width="64" height="64" src="<?= asset('images/brand/soilas.png') ?>" alt="Image"></li>
                            <li><img loading="lazy" width="92" height="64" src="<?= asset('images/brand/cosmebio.png') ?>" alt="Image"></li>
                            <li><img loading="lazy" width="68" height="64" src="<?= asset('images/brand/cosmos.png') ?>" alt="Image"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Intention -->
<div class="flat-spacing">
    <div class="container">
        <div class="sect-heading-v2">
            <p class="eyebrow-label"><span class="br-dot"></span>FORMULATED WITH INTENTION</p>
            <h3 class="s-title font-instrument_serif">We believe that science isn't about constant <br class="d-none d-lg-block">change — it's about creating balance that lasts.</h3>
        </div>
        <div class="wg-box-author justify-content-center">
            <div class="author-image">
                <img loading="lazy" width="64" height="64" src="<?= asset('images/avatar/avt-4.jpg') ?>" alt="Image">
            </div>
            <div class="author-info">
                <a href="#" class="info_name fw-normal link-underline mb-4">Dr. Elena Martinez</a>
                <p class="info_duty text-body-s cl-text-5">Rosaline Co-Founder</p>
            </div>
        </div>
    </div>
</div>
<!-- Science -->
<div class="section-science flat-spacing bg-main">
    <div class="container">
        <div class="sect-heading-v2 space-1">
            <p class="eyebrow-label"><span class="br-dot"></span>CLEAN BEAUTY PHILOSOPHY</p>
            <h3 class="s-title font-instrument_serif">Nature Meets Science</h3>
            <p class="s-desc cl-text-5">We believe in the power of natural ingredients, enhanced by cutting-edge <br class="d-none d-sm-block">research to deliver results you can see and feel.</p>
        </div>
        <div dir="ltr" class="swiper tf-swiper swiper-box-icon" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="1" data-space-lg="24" data-space-md="20" data-space="16" data-pagination="1" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box-icon_V02">
                        <span class="ic-wrap"><i class="icon icon-RecycleLeaf"></i></span>
                        <a href="#" class="title h6 font-instrument_serif link-underline">Botanical Extracts</a>
                        <p class="desc cl-text-5">Sourced from organic farms across the globe, our plant-based ingredients nourish your skin naturally.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box-icon_V02">
                        <span class="ic-wrap"><i class="icon icon-WaterDropLeaf"></i></span>
                        <a href="#" class="title h6 font-instrument_serif link-underline">Hyaluronic Acid</a>
                        <p class="desc cl-text-5">Deep hydration that plumps and smooths, leaving your skin feeling refreshed and renewed.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box-icon_V02">
                        <span class="ic-wrap"><i class="icon icon-PainKiller"></i></span>
                        <a href="#" class="title h6 font-instrument_serif link-underline">Vitamin C Complex</a>
                        <p class="desc cl-text-5">Powerful antioxidants that brighten and protect against environmental stressors.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box-icon_V02">
                        <span class="ic-wrap"><i class="icon icon-DNA"></i></span>
                        <a href="#" class="title h6 font-instrument_serif link-underline">Peptide Technology</a>
                        <p class="desc cl-text-5">Advanced formulas that support collagen production for firmer, more youthful skin.</p>
                    </div>
                </div>
            </div>
            <div class="sw-line-default tf-sw-pagination"></div>
        </div>
        <ul class="tf-list fw-normal justify-content-center">
            <li><i class="icon icon-CheckCircleFill"></i>Cruelty-Free</li>
            <li><i class="icon icon-CheckCircleFill"></i>Vegan Friendly</li>
            <li><i class="icon icon-CheckCircleFill"></i>Paraben-Free</li>
            <li><i class="icon icon-CheckCircleFill"></i>Sustainably Sourced</li>
        </ul>
    </div>
</div>
<!-- Box Icon -->
<div class="flat-spacing bg-main-4">
    <div class="container">
        <div dir="ltr" class="swiper tf-swiper" data-preview="3" data-tablet="3" data-mobile-sm="2" data-mobile="1" data-space-lg="64" data-space-md="30" data-space="16" data-pagination="1" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="3">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box-icon_V01 text-sm-start">
                        <span class="icon text-white"><i class="icon-Warranty"></i></span>
                        <div class="content">
                            <p class="title font-instrument_serif h6 text-white">Dermatologist Verified</p>
                            <p class="desc cl-text-6">Every product tested & approved by leading skin experts.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box-icon_V01 text-sm-start">
                        <span class="icon text-white"><i class="icon-Mindfullness"></i></span>
                        <div class="content">
                            <p class="title font-instrument_serif h6 text-white">50+ Happy Customers</p>
                            <p class="desc cl-text-6">Trusted by over 50,000 customers worldwide since 2019.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box-icon_V01 text-sm-start">
                        <span class="icon text-white"><i class="icon-Recycle"></i></span>
                        <div class="content">
                            <p class="title font-instrument_serif h6 text-white">Sustainably Produced</p>
                            <p class="desc cl-text-6">100% recyclable packaging and carbon-neutral shipping.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-line-default style-3 tf-sw-pagination"></div>
        </div>
    </div>
</div>
<!-- Team -->
<section class="flat-spacing">
    <div class="container">
        <div class="sect-heading-v2 space-1">
            <p class="eyebrow-label"><span class="br-dot"></span>THE PEOPLE BEHIND ROSALINE</p>
            <h3 class="s-title font-instrument_serif">Meet Our Team</h3>
            <p class="s-desc cl-text-5">Passionate experts dedicated to bringing you the best in skincare innovation.</p>
        </div>
        <div dir="ltr" class="swiper tf-swiper swiper-member" data-preview="3" data-tablet="3" data-mobile-sm="2" data-mobile="1.3" data-space-xxl="64" data-space-lg="32" data-space-md="8" data-space="0" data-loop="true" data-init="2" data-center="true">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card-member">
                        <div class="member-image">
                            <img loading="lazy" width="437" height="651" src="<?= asset('images/team/team-1.jpg') ?>" alt="Image">
                            <p class="member_text text-body-s fst-italic text-white">"A former beauty editor, Sarah brings her industry expertise and vision for accessible luxury to every Rosaline product."</p>
                        </div>
                        <div class="member-infor text-center">
                            <p class="infor_name h6 font-instrument_serif mb-8">Dr. Elena Martinez</p>
                            <p class="text-body-s cl-text-5">Co-Founder & Chief Scientist</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-member">
                        <div class="member-image">
                            <img loading="lazy" width="437" height="651" src="<?= asset('images/team/team-2.jpg') ?>" alt="Image">
                            <p class="member_text text-body-s fst-italic text-white">"A former beauty editor, Sarah brings her industry expertise and vision for accessible luxury to every Rosaline product."</p>
                        </div>
                        <div class="member-infor text-center">
                            <p class="infor_name h6 font-instrument_serif mb-8">Sarah Chen</p>
                            <p class="text-body-s cl-text-5">Co-Founder & CEO</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-member">
                        <div class="member-image">
                            <img loading="lazy" width="437" height="651" src="<?= asset('images/team/team-3.jpg') ?>" alt="Image">
                            <p class="member_text text-body-s fst-italic text-white">"A former beauty editor, Sarah brings her industry expertise and vision for accessible luxury to every Rosaline product."</p>
                        </div>
                        <div class="member-infor text-center">
                            <p class="infor_name h6 font-instrument_serif mb-8">Marcus Williams</p>
                            <p class="text-body-s cl-text-5">Head of Sustainability</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial -->
<div class="section-testimonial-thumb-2 swiper-thumbs-wrap bg-main-4">
    <div class="image-left">
        <div dir="ltr" class="swiper sw-thumbs_main">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="main-image">
                        <img loading="lazy" width="960" height="960" src="<?= asset('images/section/tesimonial-1.jpg') ?>" alt="Image">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="main-image">
                        <img loading="lazy" width="960" height="960" src="<?= asset('images/section/tesimonial-1.jpg') ?>" alt="Image">
                    </div>
                </div>
            </div>
            <div class="group-direc">
                <div class="group-nav text-white">
                    <div class="d-flex fs-20 nav-prev-swiper"><i class="icon icon-ArrowCaretLeft"></i></div>
                    <div class="pagination-text">1/2</div>
                    <div class="d-flex fs-20 nav-next-swiper"><i class="icon icon-ArrowCaretRight"></i></div>
                </div>
                <div class="sw-line-default style-2 style-white tf-sw-pagination"></div>
            </div>
        </div>
    </div>
    <div class="tes-right">
        <div dir="ltr" class="swiper sw-thumbs_sub">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box-testimonial">
                        <div class="tes-rate">
                            <div class="star-wrap fs-20 text-white">
                                <i class="icon icon-Star-Sharp"></i><i class="icon icon-Star-Sharp"></i><i class="icon icon-Star-Sharp"></i><i class="icon icon-Star-Sharp"></i><i class="icon icon-Star-Sharp"></i>
                            </div>
                            <span class="text-body-s cl-text-6">15,000+ reviews</span>
                        </div>
                        <h5 class="tes-text font-instrument_serif text-white lh-xl-40">"Nothing compares to Rosaline Serum. The silky texture feels indulgent, and after just a few uses, my skin looks brighter, smoother, and refreshed."</h5>
                        <div class="tes-product">
                            <div class="prd-image">
                                <img loading="lazy" width="74" height="88" src="<?= asset('images/product/product-13.jpg') ?>" alt="Image">
                            </div>
                            <div class="prd-content">
                                <div class="prd_info">
                                    <a href="<?= url('product/hydra-shine-lip-gloss') ?>" class="info__name fw-normal link-underline">Hydra Shine Lip Gloss</a>
                                    <div class="price-wrap">
                                        <span class="price-new fw-normal text-primary"><?= formatPrice(32) ?></span>
                                        <span class="price-old fw-normal cl-text-6"><?= formatPrice(40) ?></span>
                                    </div>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn type-3">ADD</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box-testimonial">
                        <div class="tes-rate">
                            <div class="star-wrap fs-20 text-white">
                                <i class="icon icon-Star-Sharp"></i><i class="icon icon-Star-Sharp"></i><i class="icon icon-Star-Sharp"></i><i class="icon icon-Star-Sharp"></i><i class="icon icon-Star-Sharp"></i>
                            </div>
                            <span class="text-body-s cl-text-6">15,000+ reviews</span>
                        </div>
                        <h5 class="tes-text font-instrument_serif text-white lh-xl-40">"Nothing compares to Rosaline Serum. The silky texture feels indulgent, and after just a few uses, my skin looks brighter, smoother, and refreshed."</h5>
                        <div class="tes-product">
                            <div class="prd-image">
                                <img loading="lazy" width="74" height="88" src="<?= asset('images/product/product-13.jpg') ?>" alt="Image">
                            </div>
                            <div class="prd-content">
                                <div class="prd_info">
                                    <a href="<?= url('product/hydra-shine-lip-gloss') ?>" class="info__name fw-normal link-underline">Hydra Shine Lip Gloss</a>
                                    <div class="price-wrap">
                                        <span class="price-new fw-normal text-primary"><?= formatPrice(32) ?></span>
                                        <span class="price-old fw-normal cl-text-6"><?= formatPrice(40) ?></span>
                                    </div>
                                </div>
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn type-3">ADD</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Research & Develop -->
<div class="section-split section-research">
    <div class="col-media order-md-1">
        <img loading="lazy" width="960" height="960" src="<?= asset('images/section/our-value.jpg') ?>" alt="Image">
    </div>
    <div class="col-content bg-main order-md-0">
        <div class="sect-heading-v2 start">
            <p class="eyebrow-label"><span class="br-dot"></span>RESEARCH & DEVELOPMENT</p>
            <h3 class="s-title font-instrument_serif">The Science <br>Behind Beautiful Skin</h3>
            <p class="s-desc cl-text-5">Rosaline's formulas are developed through 18 months of research, combining pure ingredients with advanced skincare science.</p>
        </div>
        <ul class="tf-list flex-wrap">
            <li class="flex-column">
                <div class="h5 font-instrument_serif view-counter mb-10"><span class="number" data-to="18" data-speed="1000">0</span></div>
                <p>Months of R&D</p>
            </li>
            <li class="flex-column">
                <div class="h5 font-instrument_serif view-counter mb-10"><span class="number" data-to="200" data-speed="1000">0</span>+</div>
                <p>Clinical & Performance Tests</p>
            </li>
            <li class="flex-column">
                <div class="h5 font-instrument_serif view-counter mb-10"><span class="number" data-to="100" data-speed="1000">0</span>%</div>
                <p>Cruelty-Free</p>
            </li>
        </ul>
    </div>
</div>
<!-- Our Value -->
<div class="flat-spacing">
    <div class="container">
        <div class="sect-heading-v2 space-1">
            <p class="eyebrow-label"><span class="br-dot"></span>OUR VALUES</p>
            <h3 class="s-title font-instrument_serif">What We Stand For</h3>
        </div>
        <div dir="ltr" class="swiper tf-swiper" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="1" data-space="16" data-pagination="1" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box-icon_V01">
                        <span class="icon"><i class="icon-CareCrue"></i></span>
                        <div class="content">
                            <p class="title font-instrument_serif h6">Gentle Care</p>
                            <p class="desc cl-text-5">Formulas designed for all skin types, especially sensitive skin.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box-icon_V01">
                        <span class="icon"><i class="icon-Warranty"></i></span>
                        <div class="content">
                            <p class="title font-instrument_serif h6">Proven Results</p>
                            <p class="desc cl-text-5">Clinically tested ingredients that deliver visible improvements.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box-icon_V01">
                        <span class="icon"><i class="icon-StarSparkle"></i></span>
                        <div class="content">
                            <p class="title font-instrument_serif h6">Clean Beauty</p>
                            <p class="desc cl-text-5">Free from parabens, sulfates, and harmful chemicals.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box-icon_V01">
                        <span class="icon"><i class="icon-EcoFriendlyPackage"></i></span>
                        <div class="content">
                            <p class="title font-instrument_serif h6">Eco-Conscious</p>
                            <p class="desc cl-text-5">Sustainable sourcing and recyclable packaging.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sw-line-default tf-sw-pagination"></div>
        </div>
    </div>
</div>
<!-- Gallery -->
<div class="mb-16">
    <div class="infiniteSlide-gallery">
        <div class="infiniteSlide infiniteSlide-wrapper" data-clone="2" data-speed="100">
            <div class="infiniteSlide-item">
                <div class="gallery-v01">
                    <a href="https://www.instagram.com/" target="_blank" class="gallery-icon hover-tooltip"><i class="icon icon-LogoInstagram"></i><span class="tooltip">Instagram</span></a>
                    <div class="gallery-image"><img class="wow fadeZoomOut" width="469" height="585" src="<?= asset('images/gallery/gallery-1.jpg') ?>" alt="Image"></div>
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="gallery-v01">
                    <a href="https://www.instagram.com/" target="_blank" class="gallery-icon hover-tooltip"><i class="icon icon-LogoInstagram"></i><span class="tooltip">Instagram</span></a>
                    <div class="gallery-image"><img width="469" height="585" src="<?= asset('images/gallery/gallery-2.jpg') ?>" alt="Image"></div>
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="gallery-v01">
                    <a href="https://www.instagram.com/" target="_blank" class="gallery-icon hover-tooltip"><i class="icon icon-LogoInstagram"></i><span class="tooltip">Instagram</span></a>
                    <div class="gallery-image"><img width="469" height="585" src="<?= asset('images/gallery/gallery-3.jpg') ?>" alt="Image"></div>
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="gallery-v01 style-3">
                    <div class="gallery-image"><img width="469" height="585" src="<?= asset('images/gallery/gallery-1.jpg') ?>" alt="Image"></div>
                    <div class="gallery-content">
                        <h5 class="gallery_name font-instrument_serif lh-xl-40">Real routines, natural <br class="d-none d-md-block">glow – shared by our community.</h5>
                        <p class="gallery_desc cl-text-5">Tag us @Rosaline for a chance <br class="d-none d-md-block">to be featured!</p>
                        <a href="https://www.instagram.com/" target="_blank" class="tf-btn btn-white w-100 mt-auto">Follow Us <i class="icon icon-LogoInstagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="gallery-v01">
                    <a href="https://www.instagram.com/" target="_blank" class="gallery-icon hover-tooltip"><i class="icon icon-LogoInstagram"></i><span class="tooltip">Instagram</span></a>
                    <div class="gallery-image"><img width="469" height="585" src="<?= asset('images/gallery/gallery-4.jpg') ?>" alt="Image"></div>
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="gallery-v01">
                    <a href="https://www.instagram.com/" target="_blank" class="gallery-icon hover-tooltip"><i class="icon icon-LogoInstagram"></i><span class="tooltip">Instagram</span></a>
                    <div class="gallery-image"><img width="469" height="585" src="<?= asset('images/gallery/gallery-5.jpg') ?>" alt="Image"></div>
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="gallery-v01">
                    <a href="https://www.instagram.com/" target="_blank" class="gallery-icon hover-tooltip"><i class="icon icon-LogoInstagram"></i><span class="tooltip">Instagram</span></a>
                    <div class="gallery-image"><img width="469" height="585" src="<?= asset('images/gallery/gallery-6.jpg') ?>" alt="Image"></div>
                </div>
            </div>
            <div class="infiniteSlide-item">
                <div class="gallery-v01 style-3">
                    <div class="gallery-image"><img width="469" height="585" src="<?= asset('images/gallery/gallery-1.jpg') ?>" alt="Image"></div>
                    <div class="gallery-content">
                        <h5 class="gallery_name font-instrument_serif lh-xl-40">Real routines, natural <br class="d-none d-md-block">glow – shared by our community.</h5>
                        <p class="gallery_desc cl-text-5">Tag us @Rosaline for a chance <br class="d-none d-md-block">to be featured!</p>
                        <a href="https://www.instagram.com/" target="_blank" class="tf-btn btn-white w-100 mt-auto">Follow Us <i class="icon icon-LogoInstagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

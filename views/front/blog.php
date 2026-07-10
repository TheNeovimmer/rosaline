<?php $pageTitle = 'Blog'; ?>
<!-- Page Title -->
<section class="tf-page-heading flat-spacing">
    <div class="container">
        <div class="content">
            <ul class="breadcrumb">
                <li><a href="<?= url() ?>" class="link">HOME</a></li>
                <li><i class="icon icon-ArrowCaretRight"></i></li>
                <li>BLOG</li>
            </ul>
            <h3 class="page-title font-instrument_serif fw-normal">Read, Learn, Shop Smarter</h3>
            <p class="page-desc">Dive into skincare routines and instantly shop the products recommended <br class="d-none d-md-block">by our experts.</p>
        </div>
    </div>
</section>
<!-- Blog Grid -->
<div class="flat-spacing-mix-1">
    <div class="container">
        <?php if (empty($posts)): ?>
        <div class="text-center py-5">
            <p class="text-body-l fw-normal mb-16">No blog posts yet.</p>
            <a href="<?= url() ?>" class="tf-btn type-2">Back to Home</a>
        </div>
        <?php else: ?>
        <div class="tf-grid-layout sm-col-2 xl-col-3 gap-16">
            <?php foreach ($posts as $post): ?>
            <div class="article-blog hover-img">
                <a href="<?= url('blog/' . $post['slug']) ?>" class="blog-image img-style">
                    <img loading="lazy" width="453" height="332" src="<?= url($post['image']) ?>" alt="<?= e($post['title']) ?>">
                    <div class="blog_date text-body-xs fw-normal"><?= formatDate($post['created_at'], 'd M, Y') ?></div>
                </a>
                <div class="blog-content">
                    <a href="<?= url('blog/' . $post['slug']) ?>" class="blog_tag text-body-s fw-normal cl-text-main link"><?= e(strtoupper($post['category'] ?? 'GENERAL')) ?></a>
                    <a href="<?= url('blog/' . $post['slug']) ?>" class="blog_name h7 font-instrument_serif link-underline"><?= e($post['title']) ?></a>
                    <p class="blog_desc text-body-s cl-text-5"><?= e(truncate(strip_tags($post['excerpt'] ?? $post['content']), 120)) ?></p>
                    <a href="<?= url('blog/' . $post['slug']) ?>" class="tf-btn-icon">
                        READ ARTICLE
                        <i class="icon icon-ArrowRight"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- Pagination -->
            <?php if (!empty($pagination)): ?>
            <div class="wd-full">
                <ul class="tf-page-pagination">
                    <?php for ($i = 1; $i <= $pagination['last_page']; $i++): ?>
                    <li<?= $i === $pagination['current_page'] ? ' class="pag-item active"' : '' ?>><a href="<?= url('blog?page=' . $i) ?>" class="pag-item cl-text-main link-black"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <?php if ($pagination['current_page'] < $pagination['last_page']): ?>
                    <li><a href="<?= url('blog?page=' . ($pagination['current_page'] + 1)) ?>" class="pag-item">NEXT <i class="icon icon-ArrowRight fs-20"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $pageTitle = e($post['title'] ?? 'Blog Detail'); ?>
<section class="tf-page-heading flat-spacing">
    <div class="container">
        <div class="content">
            <ul class="breadcrumb">
                <li><a href="<?= url() ?>" class="link">HOME</a></li>
                <li><i class="icon icon-ArrowCaretRight"></i></li>
                <li><a href="<?= url('blog') ?>" class="link">BLOG</a></li>
                <li><i class="icon icon-ArrowCaretRight"></i></li>
                <li><?= e($post['title']) ?></li>
            </ul>
        </div>
    </div>
</section>
<div class="flat-spacing">
    <div class="container">
        <article class="blog-detail">
            <div class="blog-detail_img">
                <img loading="lazy" width="1060" height="560" src="<?= url($post['image'] ?? '') ?>" alt="<?= e($post['title']) ?>">
            </div>
            <div class="blog-detail_content">
                <h2 class="blog-detail_title font-instrument_serif"><?= e($post['title']) ?></h2>
                <div class="blog-detail_meta">
                    <span>By <?= e($post['author'] ?? 'Rosaline Team') ?></span>
                    <span><?= formatDate($post['created_at'] ?? 'now') ?></span>
                    <span><?= e($post['read_time'] ?? '5 min read') ?></span>
                </div>
                <div class="blog-detail_body">
                    <?= $post['content'] ?>
                </div>
            </div>
        </article>
    </div>
</div>

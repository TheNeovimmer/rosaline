<?php $post = $data['post'] ?? null; $isEdit = !is_null($post); $action = $isEdit ? url('admin/blog/' . $post['id'] . '/edit') : url('admin/blog/create'); ?>
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold"><?= $isEdit ? 'Edit' : 'Add' ?> Blog Post</div>
    <div class="card-body">
        <?php $errors = $data['errors'] ?? []; if (!empty($errors)): ?><div class="alert alert-danger py-2"><?= implode('<br>', array_map('e', $errors)) ?></div><?php endif; ?>
        <form method="post" action="<?= $action ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6 mb-3"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="<?= e($post['title'] ?? '') ?>"></div>
                <div class="col-md-6 mb-3"><label class="form-label">Slug</label><input type="text" name="slug" class="form-control" value="<?= e($post['slug'] ?? '') ?>"></div>
                <div class="col-md-6 mb-3"><label class="form-label">Author</label><input type="text" name="author" class="form-control" value="<?= e($post['author'] ?? 'Admin') ?>"></div>
                <div class="col-md-6 mb-3"><label class="form-label">Published At</label><input type="datetime-local" name="published_at" class="form-control" value="<?= e($post['published_at'] ?? '') ?>"></div>
                <div class="col-12 mb-3"><label class="form-label">Excerpt</label><textarea name="excerpt" class="form-control" rows="3"><?= e($post['excerpt'] ?? '') ?></textarea></div>
                <div class="col-12 mb-3"><label class="form-label">Content</label><textarea name="content" class="form-control" rows="12"><?= e($post['content'] ?? '') ?></textarea></div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Image</label><input type="file" name="image" class="form-control">
                    <?php if ($isEdit && !empty($post['image'])): ?><div class="mt-2"><img loading="lazy" src="<?= url(e($post['image'])) ?>" alt="" style="width:100px;height:100px;object-fit:cover;border-radius:4px;"></div><?php endif; ?>
                </div>
            </div>
            <button type="submit" class="btn btn-dark"><?= $isEdit ? 'Update' : 'Create' ?> Post</button>
        </form>
    </div>
</div>

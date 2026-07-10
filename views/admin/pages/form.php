<?php $page = $data['page'] ?? null; $isEdit = !is_null($page); $action = $isEdit ? url('admin/pages/' . $page['id'] . '/edit') : url('admin/pages/create'); ?>
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold"><?= $isEdit ? 'Edit' : 'Add' ?> Page</div>
    <div class="card-body">
        <?php $errors = $data['errors'] ?? []; if (!empty($errors)): ?><div class="alert alert-danger py-2"><?= implode('<br>', array_map('e', $errors)) ?></div><?php endif; ?>
        <form method="post" action="<?= $action ?>">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6 mb-3"><label class="form-label">Title</label><input type="text" name="title" class="form-control" value="<?= e($page['title'] ?? '') ?>"></div>
                <div class="col-md-6 mb-3"><label class="form-label">Slug</label><input type="text" name="slug" class="form-control" value="<?= e($page['slug'] ?? '') ?>"></div>
                <div class="col-12 mb-3"><label class="form-label">Content</label><textarea name="content" class="form-control" rows="16"><?= e($page['content'] ?? '') ?></textarea></div>
            </div>
            <button type="submit" class="btn btn-dark"><?= $isEdit ? 'Update' : 'Create' ?> Page</button>
        </form>
    </div>
</div>

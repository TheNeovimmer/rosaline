<?php
$category    = $data['category'] ?? null;
$categories  = $data['categories'] ?? [];
$errors      = $data['errors'] ?? [];
$isEdit   = !is_null($category);
$action   = $isEdit ? url('admin/categories/' . $category['id'] . '/edit') : url('admin/categories/create');
?>
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold"><?= $isEdit ? 'Edit' : 'Add' ?> Category</div>
    <div class="card-body">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger py-2"><?= implode('<br>', array_map('e', $errors)) ?></div>
        <?php endif; ?>
        <form method="post" action="<?= $action ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= e($category['name'] ?? '') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="<?= e($category['slug'] ?? '') ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"><?= e($category['description'] ?? '') ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Parent Category</label>
                    <select name="parent_id" class="form-select">
                        <option value="">— None —</option>
                        <?php foreach ($categories as $c): ?>
                            <?php if ($isEdit && $c['id'] == $category['id']) continue; ?>
                            <option value="<?= $c['id'] ?>" <?= ($category['parent_id'] ?? '') == $c['id'] ? 'selected' : '' ?>>
                                <?= e($c['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="<?= (int)($category['sort_order'] ?? 0) ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                <?php if ($isEdit && !empty($category['image'])): ?>
                    <div class="mt-2">
                        <img loading="lazy" src="<?= url(e($category['image'])) ?>" alt="" style="width:100px;height:100px;object-fit:cover;border-radius:4px;">
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-dark"><?= $isEdit ? 'Update' : 'Create' ?> Category</button>
        </form>
    </div>
</div>
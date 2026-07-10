<?php
$product    = $data['product'] ?? null;
$categories = $data['categories'] ?? [];
$errors     = $data['errors'] ?? [];
$isEdit     = !is_null($product);
$action     = $isEdit ? url('admin/products/' . $product['id'] . '/edit') : url('admin/products/create');
?>
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold"><?= $isEdit ? 'Edit' : 'Add' ?> Product</div>
    <div class="card-body">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger py-2"><?= implode('<br>', array_map('e', $errors)) ?></div>
        <?php endif; ?>
        <form method="post" action="<?= $action ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= e($product['name'] ?? '') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="<?= e($product['slug'] ?? '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">— Select —</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id'] ?>" <?= ($product['category_id'] ?? '') == $c['id'] ? 'selected' : '' ?>>
                                <?= e($c['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Price ($)</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="<?= e($product['price'] ?? '') ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Compare Price ($)</label>
                    <input type="number" step="0.01" name="compare_price" class="form-control" value="<?= e($product['compare_price'] ?? '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Stock Quantity</label>
                    <input type="number" name="stock_quantity" class="form-control" value="<?= (int)($product['stock_quantity'] ?? $product['stock'] ?? 0) ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Low Stock Alert</label>
                    <input type="number" name="low_stock_threshold" class="form-control" value="<?= (int)($product['low_stock_threshold'] ?? 5) ?>" min="1">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?= ($product['status'] ?? '') === 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= ($product['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3 d-flex align-items-end">
                    <div class="form-check">
                        <input type="hidden" name="featured" value="0">
                        <input type="checkbox" name="featured" value="1" class="form-check-input" id="featured" <?= !empty($product['featured']) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="featured">Featured Product</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <input type="text" name="short_description" class="form-control" value="<?= e($product['short_description'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="5"><?= e($product['description'] ?? '') ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                <?php if ($isEdit && !empty($product['image'])): ?>
                    <div class="mt-2">
                        <img loading="lazy" src="<?= url(e($product['image'])) ?>" alt="" style="width:100px;height:100px;object-fit:cover;border-radius:4px;">
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-dark"><?= $isEdit ? 'Update' : 'Create' ?> Product</button>
        </form>
    </div>
</div>
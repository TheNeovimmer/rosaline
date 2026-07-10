<?php
$gov = $data['gov'] ?? null;
$isEdit = !is_null($gov);
$action = $isEdit ? url('admin/governorates/' . $gov['id'] . '/edit') : url('admin/governorates/create');
$regions = [
    'north_east' => 'North East',
    'north_west' => 'North West',
    'central_east' => 'Central East',
    'central_west' => 'Central West',
    'south' => 'South',
];
?>
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold"><?= $isEdit ? 'Edit' : 'Add' ?> Governorate</div>
    <div class="card-body">
        <form method="post" action="<?= $action ?>">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name (English)</label>
                    <input type="text" name="name_en" class="form-control" value="<?= e($gov['name_en'] ?? '') ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name (French)</label>
                    <input type="text" name="name_fr" class="form-control" value="<?= e($gov['name_fr'] ?? '') ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Region</label>
                    <select name="region" class="form-select" required>
                        <?php foreach ($regions as $val => $label): ?>
                        <option value="<?= $val ?>" <?= ($gov['region'] ?? '') === $val ? 'selected' : '' ?>><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Shipping Fee (TND)</label>
                    <input type="number" step="0.001" min="0" name="shipping_fee" class="form-control" value="<?= e($gov['shipping_fee'] ?? '0') ?>" required>
                </div>
            </div>
            <?php if ($isEdit): ?>
            <div class="mb-3 form-check">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" <?= $gov['is_active'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-dark"><?= $isEdit ? 'Update' : 'Create' ?> Governorate</button>
            <a href="<?= url('admin/governorates') ?>" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</div>

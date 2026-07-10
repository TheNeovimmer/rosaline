<?php
$settings = $data['settings'] ?? [];
$groups = $data['groups'] ?? [];
$settingMap = [];
foreach ($settings as $s) { $settingMap[$s['key']] = $s['value']; }
$codEnabled = ($settingMap['cod_enabled'] ?? '') === '1';
?>
<h5 class="fw-normal mb-3">Settings</h5>

<form method="post" action="<?= url('admin/settings') ?>">
<?= csrf_field() ?>
<?php foreach ($groups as $groupName => $keys): ?>
<div class="card border-0 shadow-sm mb-3">
    <div class="card-header bg-white fw-semibold"><?= e($groupName) ?></div>
    <div class="card-body">
        <div class="row g-3">
            <?php foreach ($keys as $key): ?>
            <?php
            $label = ucwords(str_replace('_', ' ', $key));
            ?>
            <div class="col-md-6">
                <label class="form-label small"><?= e($label) ?></label>
                <?php if ($key === 'cod_enabled'): ?>
                <div class="form-check form-switch pt-1">
                    <input type="hidden" name="cod_enabled" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" name="cod_enabled" value="1" id="cod_enabled" <?= $codEnabled ? 'checked' : '' ?>>
                </div>
                <?php elseif (in_array($key, ['cod_description'])): ?>
                <textarea class="form-control" name="<?= e($key) ?>" rows="2"><?= e($settingMap[$key] ?? '') ?></textarea>
                <?php elseif (in_array($key, ['cod_min_amount', 'cod_max_amount'])): ?>
                <input type="number" step="0.01" min="0" class="form-control" name="<?= e($key) ?>" value="<?= e($settingMap[$key] ?? '') ?>">
                <?php elseif (in_array($key, ['store_address'])): ?>
                <textarea class="form-control" name="<?= e($key) ?>" rows="2"><?= e($settingMap[$key] ?? '') ?></textarea>
                <?php elseif ($key === 'store_email'): ?>
                <input type="email" class="form-control" name="<?= e($key) ?>" value="<?= e($settingMap[$key] ?? '') ?>">
                <?php else: ?>
                <input type="text" class="form-control" name="<?= e($key) ?>" value="<?= e($settingMap[$key] ?? '') ?>">
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endforeach; ?>
<div class="text-end">
    <button type="submit" class="btn btn-dark"><i class="icon icon-Save"></i> Save Settings</button>
</div>
</form>

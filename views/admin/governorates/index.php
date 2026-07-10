<?php $governorates = $data['governorates'] ?? []; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-normal mb-0">Governorates</h5>
    <a href="<?= url('admin/governorates/create') ?>" class="btn btn-dark btn-sm">+ Add</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Region</th>
                    <th>Shipping Fee</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($governorates)): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-4">No governorates found</td></tr>
                <?php else: ?>
                    <?php foreach ($governorates as $g): ?>
                        <tr>
                            <td><?= e($g['name_en']) ?></td>
                            <td><?= e($g['region']) ?></td>
                            <td><?= formatPrice($g['shipping_fee']) ?></td>
                            <td><?= $g['is_active'] ? 'Yes' : 'No' ?></td>
                            <td>
                                <a href="<?= url('admin/governorates/' . $g['id'] . '/edit') ?>" class="btn btn-outline-secondary btn-sm me-1">Edit</a>
                                <form method="post" action="<?= url('admin/governorates/' . $g['id'] . '/delete') ?>" class="d-inline" onsubmit="return confirm('Delete this governorate?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

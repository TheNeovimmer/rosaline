<?php $categories = $data['categories'] ?? []; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-normal mb-0">Categories</h5>
    <a href="<?= url('admin/categories/create') ?>" class="btn btn-dark btn-sm">Add Category</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Products</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($categories)): ?>
                    <tr><td colspan="4" class="text-center text-secondary py-4">No categories found</td></tr>
                <?php else: ?>
                    <?php foreach ($categories as $c): ?>
                        <tr>
                            <td><?= e($c['name']) ?></td>
                            <td><?= e($c['slug'] ?? '') ?></td>
                            <td><?= (int)($c['products_count'] ?? $c['product_count'] ?? $c['count'] ?? 0) ?></td>
                            <td>
                                <a href="<?= url('admin/categories/' . $c['id'] . '/edit') ?>" class="btn btn-outline-secondary btn-sm me-1">Edit</a>
                                <form method="post" action="<?= url('admin/categories/' . $c['id'] . '/delete') ?>" class="d-inline" onsubmit="return confirm('Delete this category?')">
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
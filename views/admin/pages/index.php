<?php $pages = $data['pages'] ?? []; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-normal mb-0">Pages</h5>
    <a href="<?= url('admin/pages/create') ?>" class="btn btn-dark btn-sm"><i class="icon icon-Plus"></i> Add Page</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table admin-table mb-0">
            <thead><tr><th>Title</th><th>Slug</th><th>Updated</th><th width="140">Actions</th></tr></thead>
            <tbody>
                <?php if (empty($pages)): ?>
                <tr><td colspan="4" class="text-center text-secondary py-4">No pages yet.</td></tr>
                <?php else: ?>
                <?php foreach ($pages as $p): ?>
                <tr>
                    <td><?= e($p['title']) ?></td>
                    <td><code>/<?= e($p['slug']) ?></code></td>
                    <td style="white-space:nowrap;"><?= formatDate($p['updated_at'] ?? $p['created_at'], 'M d, Y') ?></td>
                    <td>
                        <a href="<?= url('admin/pages/' . $p['id'] . '/edit') ?>" class="btn btn-outline-dark btn-sm">Edit</a>
                        <form method="post" action="<?= url('admin/pages/' . $p['id'] . '/delete') ?>" style="display:inline" onsubmit="return confirm('Delete this page?')">
                            <button class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

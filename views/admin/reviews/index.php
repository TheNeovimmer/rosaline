<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-normal mb-0">Product Reviews</h5>
    <div class="d-flex gap-2">
        <a href="<?= url('admin/reviews') ?>" class="btn btn-sm <?= empty($status) ? 'btn-dark' : 'btn-outline-dark' ?>">All</a>
        <a href="<?= url('admin/reviews?status=pending') ?>" class="btn btn-sm <?= $status === 'pending' ? 'btn-dark' : 'btn-outline-dark' ?>">Pending</a>
        <a href="<?= url('admin/reviews?status=approved') ?>" class="btn btn-sm <?= $status === 'approved' ? 'btn-dark' : 'btn-outline-dark' ?>">Approved</a>
        <a href="<?= url('admin/reviews?status=rejected') ?>" class="btn btn-sm <?= $status === 'rejected' ? 'btn-dark' : 'btn-outline-dark' ?>">Rejected</a>
    </div>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead><tr><th>Product</th><th>User</th><th>Rating</th><th>Comment</th><th>Status</th><th>Date</th><th width="160">Actions</th></tr></thead>
            <tbody>
                <?php if (empty($reviews)): ?>
                <tr><td colspan="7" class="text-center text-secondary py-4">No reviews.</td></tr>
                <?php else: ?>
                <?php foreach ($reviews as $r): ?>
                <tr>
                    <td><?= e(truncate($r['product_name'] ?? '', 30)) ?></td>
                    <td><?= e($r['user_name'] ?? 'Guest') ?></td>
                    <td><?= str_repeat('★', (int) $r['rating']) . str_repeat('☆', 5 - (int) $r['rating']) ?></td>
                    <td><?= e(truncate($r['comment'] ?? '', 50)) ?></td>
                    <td><span class="badge bg-<?= $r['status'] === 'approved' ? 'success' : ($r['status'] === 'rejected' ? 'danger' : 'warning') ?>"><?= e($r['status']) ?></span></td>
                    <td><?= formatDate($r['created_at']) ?></td>
                    <td>
                        <?php if ($r['status'] !== 'approved'): ?>
                        <form method="post" action="<?= url('admin/reviews/' . $r['id'] . '/approve') ?>" style="display:inline"><?= csrf_field() ?>
                            <button class="btn btn-outline-success btn-sm">Approve</button>
                        </form>
                        <?php endif; ?>
                        <?php if ($r['status'] !== 'rejected'): ?>
                        <form method="post" action="<?= url('admin/reviews/' . $r['id'] . '/reject') ?>" style="display:inline"><?= csrf_field() ?>
                            <button class="btn btn-outline-warning btn-sm">Reject</button>
                        </form>
                        <?php endif; ?>
                        <form method="post" action="<?= url('admin/reviews/' . $r['id'] . '/delete') ?>" style="display:inline" onsubmit="return confirm('Delete this review?')"><?= csrf_field() ?>
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
<?php if (!empty($pagination) && $pagination['last_page'] > 1): ?>
<div class="mt-3 d-flex justify-content-center"><?php for ($i = 1; $i <= $pagination['last_page']; $i++): ?><a href="<?= url('admin/reviews?page=' . $i . (!empty($status) ? '&status=' . $status : '')) ?>" class="btn btn-sm <?= $i == $pagination['current_page'] ? 'btn-dark' : 'btn-outline-dark' ?> mx-1"><?= $i ?></a><?php endfor; ?></div>
<?php endif; ?>

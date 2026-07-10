<?php
$users     = $data['users'] ?? [];
$currentId = $data['current_user_id'] ?? null;
$search    = $data['search'] ?? '';
$pagination = $data['pagination'] ?? [];
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-normal mb-0">Users</h5>
    <form method="get" action="<?= url('admin/users') ?>" class="d-flex gap-2">
        <input type="text" class="form-control form-control-sm" style="width:200px;" name="search" placeholder="Search users..." value="<?= e($search) ?>">
        <button type="submit" class="btn btn-dark btn-sm"><i class="icon icon-Search"></i></button>
        <?php if ($search): ?><a href="<?= url('admin/users') ?>" class="btn btn-outline-dark btn-sm">Clear</a><?php endif; ?>
    </form>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table admin-table mb-0">
            <thead><tr><th>Name</th><th>Email</th><th>Role</th><th>Orders</th><th>Registered</th><th>Actions</th></tr></thead>
            <tbody>
                <?php if (empty($users)): ?>
                <tr><td colspan="6" class="text-center text-secondary py-4">No users found</td></tr>
                <?php else: ?>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= e($u['name'] ?? '') ?></td>
                    <td><?= e($u['email'] ?? '') ?></td>
                    <td><span class="badge bg-<?= ($u['role'] ?? 'customer') === 'admin' ? 'dark' : 'secondary' ?>"><?= e(ucfirst($u['role'] ?? 'customer')) ?></span></td>
                    <td><?= (int) ($u['orders_count'] ?? 0) ?></td>
                    <td style="white-space:nowrap;"><?= formatDate($u['created_at'] ?? '', 'M d, Y') ?></td>
                    <td>
                        <a href="<?= url('admin/users/' . $u['id'] . '/edit') ?>" class="btn btn-outline-secondary btn-sm me-1">Edit</a>
                        <?php if ((int)$u['id'] !== (int)$currentId): ?>
                        <form method="post" action="<?= url('admin/users/' . $u['id'] . '/delete') ?>" class="d-inline" onsubmit="return confirm('Delete this user?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php if (!empty($pagination) && $pagination['last_page'] > 1): ?>
<div class="mt-3 d-flex justify-content-center gap-1">
    <?php for ($i = 1; $i <= $pagination['last_page']; $i++): ?>
    <a href="<?= url('admin/users?page=' . $i . ($search ? '&search=' . urlencode($search) : '')) ?>" class="btn btn-sm <?= $i === $pagination['current_page'] ? 'btn-dark' : 'btn-outline-dark' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>

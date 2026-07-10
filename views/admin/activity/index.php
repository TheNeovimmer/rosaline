<?php
$logs = $data['logs'] ?? [];
$pagination = $data['pagination'] ?? [];
$search = $data['search'] ?? '';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-normal mb-0">Activity Log</h5>
    <form method="get" action="<?= url('admin/activity') ?>" class="d-flex gap-2">
        <input type="text" class="form-control form-control-sm" style="width:200px;" name="search" placeholder="Search actions..." value="<?= e($search) ?>">
        <button type="submit" class="btn btn-dark btn-sm"><i class="icon icon-Search"></i></button>
        <?php if ($search): ?><a href="<?= url('admin/activity') ?>" class="btn btn-outline-dark btn-sm">Clear</a><?php endif; ?>
    </form>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead><tr><th>Date</th><th>User</th><th>Action</th><th>Entity</th><th>Details</th></tr></thead>
            <tbody>
                <?php if (empty($logs)): ?>
                <tr><td colspan="5" class="text-center text-secondary py-4">No activity recorded yet.</td></tr>
                <?php else: ?>
                <?php foreach ($logs as $l): ?>
                <tr>
                    <td style="white-space:nowrap;"><?= formatDate($l['created_at'], 'M d, Y H:i') ?></td>
                    <td><?= e($l['user_name'] ?? '—') ?></td>
                    <td><span class="badge bg-<?= $l['action'] === 'delete' ? 'danger' : ($l['action'] === 'create' ? 'success' : 'info') ?>"><?= e($l['action']) ?></span></td>
                    <td><?= e(ucfirst($l['entity_type'])) ?><?= $l['entity_id'] ? ' #' . $l['entity_id'] : '' ?></td>
                    <td class="text-secondary" style="font-size:13px;"><?= e(truncate($l['details'] ?? '', 80)) ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php if (!empty($pagination) && $pagination['last_page'] > 1): ?>
<div class="mt-3 d-flex justify-content-center gap-1">
    <?php for ($i = 1; $i <= $pagination['last_page']; $i++): ?>
    <a href="<?= url('admin/activity?page=' . $i . ($search ? '&search=' . urlencode($search) : '')) ?>" class="btn btn-sm <?= $i === $pagination['current_page'] ? 'btn-dark' : 'btn-outline-dark' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>

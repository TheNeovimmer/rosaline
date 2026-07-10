<?php $search = $data['search'] ?? ''; $pagination = $data['pagination'] ?? []; $messages = $data['messages'] ?? []; ?>
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <h5 class="fw-normal mb-0">Contact Messages</h5>
    <form method="get" action="<?= url('admin/contacts') ?>" class="d-flex gap-2">
        <input type="text" class="form-control form-control-sm" style="width:200px;" name="search" placeholder="Search messages..." value="<?= e($search) ?>">
        <button type="submit" class="btn btn-dark btn-sm"><i class="icon icon-Search"></i></button>
        <?php if ($search): ?><a href="<?= url('admin/contacts') ?>" class="btn btn-outline-dark btn-sm">Clear</a><?php endif; ?>
    </form>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table admin-table mb-0">
            <thead><tr><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th>Status</th><th width="120">Actions</th></tr></thead>
            <tbody>
                <?php if (empty($messages)): ?>
                <tr><td colspan="6" class="text-center text-secondary py-4">No messages.</td></tr>
                <?php else: ?>
                <?php foreach ($messages as $m): ?>
                <tr class="<?= $m['is_read'] ? '' : 'fw-bold' ?>">
                    <td><?= e($m['name']) ?></td>
                    <td><?= e($m['email']) ?></td>
                    <td><?= e(truncate($m['subject'] ?? 'No subject', 40)) ?></td>
                    <td style="white-space:nowrap;"><?= formatDate($m['created_at'], 'M d, Y') ?></td>
                    <td><?= $m['is_read'] ? '<span class="badge bg-secondary">Read</span>' : '<span class="badge bg-warning">New</span>' ?></td>
                    <td>
                        <a href="<?= url('admin/contacts/' . $m['id']) ?>" class="btn btn-outline-dark btn-sm">View</a>
                        <form method="post" action="<?= url('admin/contacts/' . $m['id'] . '/delete') ?>" style="display:inline" onsubmit="return confirm('Delete this message?')"><?= csrf_field() ?>
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
<?php if (!empty($pagination) && $pagination['last_page'] > 1): ?>
<div class="mt-3 d-flex justify-content-center gap-1">
    <?php for ($i = 1; $i <= $pagination['last_page']; $i++): ?>
    <a href="<?= url('admin/contacts?page=' . $i) ?>" class="btn btn-sm <?= $i == $pagination['current_page'] ? 'btn-dark' : 'btn-outline-dark' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>

<?php $search = $data['search'] ?? ''; $pagination = $data['pagination'] ?? []; $posts = $data['posts'] ?? []; ?>
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <h5 class="fw-normal mb-0">Blog Posts</h5>
    <div class="d-flex gap-2">
        <form method="get" action="<?= url('admin/blog') ?>" class="d-flex gap-2">
            <input type="text" class="form-control form-control-sm" style="width:200px;" name="search" placeholder="Search posts..." value="<?= e($search) ?>">
            <button type="submit" class="btn btn-dark btn-sm"><i class="icon icon-Search"></i></button>
            <?php if ($search): ?><a href="<?= url('admin/blog') ?>" class="btn btn-outline-dark btn-sm">Clear</a><?php endif; ?>
        </form>
        <a href="<?= url('admin/blog/create') ?>" class="btn btn-dark btn-sm"><i class="icon icon-Plus"></i> Add Post</a>
    </div>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table admin-table mb-0">
            <thead><tr><th>Image</th><th>Title</th><th>Author</th><th>Published</th><th width="140">Actions</th></tr></thead>
            <tbody>
                <?php if (empty($posts)): ?>
                <tr><td colspan="5" class="text-center text-secondary py-4">No posts yet.</td></tr>
                <?php else: ?>
                <?php foreach ($posts as $p): ?>
                <tr>
                    <td><?php if (!empty($p['image'])): ?><img loading="lazy" src="<?= url($p['image']) ?>" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:6px;"><?php else: ?><span class="text-secondary">—</span><?php endif; ?></td>
                    <td><?= e($p['title']) ?></td>
                    <td><?= e($p['author'] ?? 'Admin') ?></td>
                    <td style="white-space:nowrap;"><?= formatDate($p['published_at'] ?? $p['created_at'], 'M d, Y') ?></td>
                    <td>
                        <a href="<?= url('admin/blog/' . $p['id'] . '/edit') ?>" class="btn btn-outline-dark btn-sm">Edit</a>
                        <form method="post" action="<?= url('admin/blog/' . $p['id'] . '/delete') ?>" style="display:inline" onsubmit="return confirm('Delete this post?')">
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
    <a href="<?= url('admin/blog?page=' . $i . (!empty($search) ? '&search=' . urlencode($search) : '')) ?>" class="btn btn-sm <?= $i == $pagination['current_page'] ? 'btn-dark' : 'btn-outline-dark' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>

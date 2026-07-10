<?php
$products   = $data['products'] ?? [];
$search     = $data['search'] ?? '';
$pagination = $data['pagination'] ?? [];
$stockFilter = $_GET['stock'] ?? '';
?>
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <h5 class="fw-normal mb-0">Products</h5>
    <div class="d-flex gap-2">
        <a href="<?= url('admin/products/export') ?>" class="btn btn-outline-dark btn-sm"><i class="icon icon-Download"></i> CSV</a>
        <a href="<?= url('admin/products/create') ?>" class="btn btn-dark btn-sm"><i class="icon icon-Plus"></i> Add Product</a>
    </div>
</div>
<div class="d-flex gap-2 mb-3 flex-wrap">
    <form method="get" action="<?= url('admin/products') ?>" class="d-flex gap-2">
        <input type="text" class="form-control form-control-sm" style="width:200px;" name="search" placeholder="Search products..." value="<?= e($search) ?>">
        <button type="submit" class="btn btn-dark btn-sm"><i class="icon icon-Search"></i></button>
        <?php if ($search || $stockFilter): ?>
        <a href="<?= url('admin/products') ?>" class="btn btn-outline-dark btn-sm">Clear</a>
        <?php endif; ?>
    </form>
    <a href="<?= url('admin/products') ?>" class="btn btn-sm <?= !$stockFilter ? 'btn-dark' : 'btn-outline-dark' ?>">All</a>
    <a href="<?= url('admin/products?stock=low') ?>" class="btn btn-sm <?= $stockFilter === 'low' ? 'btn-dark' : 'btn-outline-dark' ?>">Low Stock</a>
    <a href="<?= url('admin/products?stock=out') ?>" class="btn btn-sm <?= $stockFilter === 'out' ? 'btn-dark' : 'btn-outline-dark' ?>">Out of Stock</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table admin-table mb-0">
            <thead><tr><th>Image</th><th>Name</th><th>SKU</th><th>Price</th><th>Stock</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr><td colspan="7" class="text-center text-secondary py-4">No products found</td></tr>
                <?php else: ?>
                <?php foreach ($products as $p): ?>
                <tr>
                    <td><?php if (!empty($p['image'])): ?><img loading="lazy" src="<?= url(e($p['image'])) ?>" alt=""><?php else: ?><span class="text-secondary">—</span><?php endif; ?></td>
                    <td><a href="<?= url('admin/products/' . $p['id'] . '/edit') ?>" class="text-dark"><?= e($p['name']) ?></a></td>
                    <td style="font-size:13px;color:#888;"><?= e($p['sku'] ?? '—') ?></td>
                    <td><?= formatPrice($p['price'] ?? 0) ?></td>
                    <td><span class="badge bg-<?= ($p['stock_quantity'] ?? 0) <= 0 ? 'danger' : (($p['stock_quantity'] ?? 0) <= 10 ? 'warning' : 'success') ?>"><?= (int) ($p['stock_quantity'] ?? 0) ?></span></td>
                    <td><span class="badge bg-<?= ($p['status'] ?? '') === 'active' ? 'success' : 'secondary' ?>"><?= e(ucfirst($p['status'] ?? 'inactive')) ?></span></td>
                    <td>
                        <a href="<?= url('admin/products/' . $p['id'] . '/edit') ?>" class="btn btn-outline-secondary btn-sm me-1">Edit</a>
                        <form method="post" action="<?= url('admin/products/' . $p['id'] . '/delete') ?>" class="d-inline" onsubmit="return confirm('Delete this product?')">
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
</div>
<?php if (!empty($pagination) && $pagination['last_page'] > 1): ?>
<div class="mt-3 d-flex justify-content-center gap-1">
    <?php for ($i = 1; $i <= $pagination['last_page']; $i++): ?>
    <a href="<?= url('admin/products?page=' . $i . ($search ? '&search=' . urlencode($search) : '') . ($stockFilter ? '&stock=' . $stockFilter : '')) ?>" class="btn btn-sm <?= $i === $pagination['current_page'] ? 'btn-dark' : 'btn-outline-dark' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>

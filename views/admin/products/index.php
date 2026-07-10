<?php
$products   = $data['products'] ?? [];
$search     = $data['search'] ?? '';
$pagination = $data['pagination'] ?? [];
$stockFilter = $_GET['stock'] ?? '';
?>
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <h5 class="fw-normal mb-0">Products</h5>
    <div class="d-flex gap-2">
        <a href="<?= url('admin/products/export') ?>" class="btn-admin btn-admin-sm"><i class="icon icon-Download"></i> CSV</a>
        <a href="<?= url('admin/products/create') ?>" class="btn-admin btn-admin-sm" style="background:var(--admin-primary);border-color:var(--admin-primary);color:#fff;"><i class="icon icon-Plus"></i> Add Product</a>
    </div>
</div>

<div class="filter-bar">
    <form method="get" action="<?= url('admin/products') ?>" class="d-flex gap-2" style="margin:0;">
        <input type="text" name="search" class="form-control form-control-sm" style="width:200px;border-radius:8px;" placeholder="Search products..." value="<?= e($search) ?>">
        <button type="submit" class="btn-admin btn-admin-sm"><i class="icon icon-Search"></i></button>
        <?php if ($search || $stockFilter): ?>
        <a href="<?= url('admin/products') ?>" class="btn-admin btn-admin-sm">Clear</a>
        <?php endif; ?>
    </form>
    <a href="<?= url('admin/products') ?>" class="btn-admin btn-admin-sm <?= !$stockFilter ? 'btn-active' : '' ?>">All</a>
    <a href="<?= url('admin/products?stock=low') ?>" class="btn-admin btn-admin-sm <?= $stockFilter === 'low' ? 'btn-active' : '' ?>">Low Stock</a>
    <a href="<?= url('admin/products?stock=out') ?>" class="btn-admin btn-admin-sm <?= $stockFilter === 'out' ? 'btn-active' : '' ?>">Out of Stock</a>
</div>

<div class="card-admin">
    <div class="card-header-chart">
        <span>All Products</span>
        <span class="card-header-sub"><?= $pagination['total'] ?? 0 ?> total</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive-wrap">
        <table class="admin-table mb-0 w-100">
            <thead><tr><th>Image</th><th>Name</th><th>SKU</th><th>Price</th><th>Stock</th><th>Status</th><th></th></tr></thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr><td colspan="7" class="text-center text-secondary py-4">No products found</td></tr>
                <?php else: ?>
                <?php foreach ($products as $p): ?>
                <tr>
                    <td>
                        <?php if (!empty($p['image'])): ?>
                            <img loading="lazy" src="<?= url(e($p['image'])) ?>" alt="">
                        <?php else: ?>
                            <span style="display:inline-flex;width:40px;height:40px;border-radius:6px;background:var(--admin-bg);align-items:center;justify-content:center;font-size:10px;color:var(--admin-text-secondary);">—</span>
                        <?php endif; ?>
                    </td>
                    <td><a href="<?= url('admin/products/' . $p['id'] . '/edit') ?>"><?= e($p['name']) ?></a></td>
                    <td><span style="font-size:12px;color:var(--admin-text-secondary);"><?= e($p['sku'] ?? '—') ?></span></td>
                    <td class="fw-semibold"><?= formatPrice($p['price'] ?? 0) ?></td>
                    <?php $threshold = $p['low_stock_threshold'] ?? 5; ?>
                    <td><span class="badge-admin bg-<?= ($p['stock_quantity'] ?? 0) <= 0 ? 'danger' : (($p['stock_quantity'] ?? 0) <= $threshold ? 'warning' : 'success') ?>"><?= (int) ($p['stock_quantity'] ?? 0) ?></span></td>
                    <td><span class="badge-admin bg-<?= ($p['status'] ?? '') === 'active' ? 'success' : 'secondary' ?>"><?= e(ucfirst($p['status'] ?? 'inactive')) ?></span></td>
                    <td>
                        <a href="<?= url('admin/products/' . $p['id'] . '/edit') ?>" class="btn-admin btn-admin-sm">Edit</a>
                        <form method="post" action="<?= url('admin/products/' . $p['id'] . '/delete') ?>" class="d-inline" onsubmit="return confirm('Delete this product?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn-admin btn-admin-sm" style="color:var(--admin-danger);border-color:var(--admin-danger);">Delete</button>
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
    <a href="<?= url('admin/products?page=' . $i . ($search ? '&search=' . urlencode($search) : '') . ($stockFilter ? '&stock=' . $stockFilter : '')) ?>" class="btn-admin btn-admin-sm <?= $i === $pagination['current_page'] ? 'btn-active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>

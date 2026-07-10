<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $page = (int) ($_GET['page'] ?? 1);
        $search = trim($_GET['search'] ?? '');
        $stockFilter = trim($_GET['stock'] ?? '');

        $where = '1=1';
        $params = [];

        if ($search !== '') {
            $where .= ' AND (name LIKE :search OR sku LIKE :search)';
            $params['search'] = '%' . $search . '%';
        }

        if ($stockFilter === 'low') {
            $where .= ' AND stock_quantity <= COALESCE(low_stock_threshold, 5) AND stock_quantity > 0';
        } elseif ($stockFilter === 'out') {
            $where .= ' AND (stock_quantity IS NULL OR stock_quantity <= 0)';
        }

        $result = Product::paginate($page, 15, $where, $params, 'id DESC');

        $this->view('admin/products/index', [
            'products'   => $result['items'],
            'pagination' => $result,
            'search'     => $search,
        ], 'admin');
    }

    public function create(): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $categories = Category::all();

        $this->view('admin/products/form', [
            'product'    => null,
            'categories' => $categories,
        ], 'admin');
    }

    public function store(): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $errors = $this->validate($_POST, [
            'name'        => 'required|min:2|max:255',
            'slug'        => 'required|min:2|max:255',
            'price'       => 'required|numeric',
            'category_id' => 'required|numeric',
            'description' => 'required|min:10',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $data = [
            'name'             => $_POST['name'],
            'slug'             => $_POST['slug'],
            'price'            => (float) $_POST['price'],
            'category_id'      => (int) $_POST['category_id'],
            'description'      => $_POST['description'],
            'short_description'=> $_POST['short_description'] ?? '',
            'compare_price'    => !empty($_POST['compare_price']) ? (float) $_POST['compare_price'] : null,
            'sku'              => $_POST['sku'] ?? '',
            'stock_quantity'     => (int) ($_POST['stock_quantity'] ?? 0),
            'low_stock_threshold'=> max(1, (int) ($_POST['low_stock_threshold'] ?? 5)),
            'featured'           => (int) ($_POST['featured'] ?? 0),
            'status'             => ($_POST['status'] ?? '') === 'active' ? 'active' : 'inactive',
        ];

        if (!empty($_FILES['image']['name'])) {
            $uploaded = $this->uploadImage($_FILES['image']);
            if ($uploaded) {
                $data['image'] = $uploaded;
            }
        }

        Product::create($data);

        $newId = \App\Core\Database::lastInsertId();
        $this->logActivity('create', 'product', $newId, 'Created product: ' . $data['name']);
        $this->withSuccess('Product created successfully.');
        $this->redirect('/admin/products');
    }

    public function edit(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $product = Product::find($id);
        if (!$product) {
            $this->redirect('/admin/products');
            return;
        }

        $categories = Category::all();

        $this->view('admin/products/form', [
            'product'    => $product,
            'categories' => $categories,
        ], 'admin');
    }

    public function update(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $product = Product::find($id);
        if (!$product) {
            $this->redirect('/admin/products');
            return;
        }

        $errors = $this->validate($_POST, [
            'name'        => 'required|min:2|max:255',
            'slug'        => 'required|min:2|max:255',
            'price'       => 'required|numeric',
            'category_id' => 'required|numeric',
            'description' => 'required|min:10',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $data = [
            'name'             => $_POST['name'],
            'slug'             => $_POST['slug'],
            'price'            => (float) $_POST['price'],
            'category_id'      => (int) $_POST['category_id'],
            'description'      => $_POST['description'],
            'short_description'=> $_POST['short_description'] ?? '',
            'compare_price'    => !empty($_POST['compare_price']) ? (float) $_POST['compare_price'] : null,
            'sku'              => $_POST['sku'] ?? '',
            'stock_quantity'     => (int) ($_POST['stock_quantity'] ?? 0),
            'low_stock_threshold'=> max(1, (int) ($_POST['low_stock_threshold'] ?? 5)),
            'featured'           => (int) ($_POST['featured'] ?? 0),
            'status'             => ($_POST['status'] ?? '') === 'active' ? 'active' : 'inactive',
        ];

        if (!empty($_FILES['image']['name'])) {
            $uploaded = $this->uploadImage($_FILES['image']);
            if ($uploaded) {
                $data['image'] = $uploaded;
            }
        }

        Product::updateWhere($data, 'id = :id', ['id' => $id]);

        $this->logActivity('update', 'product', $id, 'Updated product: ' . $data['name']);
        $this->withSuccess('Product updated successfully.');
        $this->redirect('/admin/products');
    }

    public function destroy(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        Product::deleteWhere('id = :id', ['id' => $id]);

        $this->logActivity('delete', 'product', $id, 'Deleted product ID: ' . $id);
        $this->withSuccess('Product deleted successfully.');
        $this->redirect('/admin/products');
    }

    public function export(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }

        $products = \App\Core\Database::fetchAll(
            "SELECT p.id, p.name, p.sku, p.price, p.compare_price, p.stock_quantity, p.status, c.name as category
             FROM products p LEFT JOIN categories c ON c.id = p.category_id ORDER BY p.id ASC"
        );
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=products.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID', 'Name', 'SKU', 'Price', 'Compare Price', 'Stock', 'Status', 'Category']);
        foreach ($products as $p) {
            fputcsv($out, [$p['id'], $p['name'], $p['sku'] ?? '', $p['price'], $p['compare_price'] ?? '', $p['stock_quantity'], $p['status'], $p['category'] ?? '']);
        }
        fclose($out);
        exit;
    }

    private function uploadImage(array $file): ?string
    {
        $config = require __DIR__ . '/../../../config/app.php';
        $allowed = $config['allowed_extensions'];
        $maxSize = $config['upload_max_size'];

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed)) {
            return null;
        }

        if ($file['size'] > $maxSize) {
            return null;
        }

        $filename = uniqid('product_') . '.' . $ext;
        $uploadPath = __DIR__ . '/../../../public/assets/images/products/' . $filename;

        if (!is_dir(dirname($uploadPath))) {
            mkdir(dirname($uploadPath), 0755, true);
        }

        if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
            return null;
        }

        return 'assets/images/products/' . $filename;
    }
}

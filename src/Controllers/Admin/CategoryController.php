<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $categories = Category::all();

        $this->view('admin/categories/index', [
            'categories' => $categories,
        ], 'admin');
    }

    public function create(): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $parentCategories = Category::all();

        $this->view('admin/categories/form', [
            'category'   => null,
            'categories' => $parentCategories,
        ], 'admin');
    }

    public function store(): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $errors = $this->validate($_POST, [
            'name' => 'required|min:2|max:255',
            'slug' => 'required|min:2|max:255',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $image = null;
        if (!empty($_FILES['image']['name'])) {
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $filename = 'category_' . uniqid() . '.' . $ext;
                $uploadPath = __DIR__ . '/../../../public/assets/images/categories/' . $filename;
                if (!is_dir(dirname($uploadPath))) mkdir(dirname($uploadPath), 0755, true);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                    $image = $filename;
                }
            }
        }

        Category::create([
            'name'        => $_POST['name'],
            'slug'        => $_POST['slug'],
            'description' => $_POST['description'] ?? '',
            'parent_id'   => !empty($_POST['parent_id']) ? (int) $_POST['parent_id'] : null,
            'sort_order'  => (int) ($_POST['sort_order'] ?? 0),
            'image'       => $image,
        ]);

        $this->logActivity('create', 'category', (int) \App\Core\Database::lastInsertId(), 'Created category: ' . $_POST['name']);
        $this->withSuccess('Category created successfully.');
        $this->redirect('/admin/categories');
    }

    public function edit(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $category = Category::find($id);
        if (!$category) {
            $this->redirect('/admin/categories');
            return;
        }

        $parentCategories = array_filter(Category::all(), fn($c) => (int) $c['id'] !== $id);

        $this->view('admin/categories/form', [
            'category'   => $category,
            'categories' => $parentCategories,
        ], 'admin');
    }

    public function update(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $category = Category::find($id);
        if (!$category) {
            $this->redirect('/admin/categories');
            return;
        }

        $errors = $this->validate($_POST, [
            'name' => 'required|min:2|max:255',
            'slug' => 'required|min:2|max:255',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $updateData = [
            'name'        => $_POST['name'],
            'slug'        => $_POST['slug'],
            'description' => $_POST['description'] ?? '',
            'parent_id'   => !empty($_POST['parent_id']) ? (int) $_POST['parent_id'] : null,
            'sort_order'  => (int) ($_POST['sort_order'] ?? 0),
        ];

        if (!empty($_FILES['image']['name'])) {
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $filename = 'category_' . uniqid() . '.' . $ext;
                $uploadPath = __DIR__ . '/../../../public/assets/images/categories/' . $filename;
                if (!is_dir(dirname($uploadPath))) mkdir(dirname($uploadPath), 0755, true);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                    $updateData['image'] = $filename;
                }
            }
        }

        Category::updateWhere($updateData, 'id = :id', ['id' => $id]);

        $this->logActivity('update', 'category', $id, 'Updated category: ' . $_POST['name']);
        $this->withSuccess('Category updated successfully.');
        $this->redirect('/admin/categories');
    }

    public function destroy(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        Category::deleteWhere('id = :id', ['id' => $id]);

        $this->logActivity('delete', 'category', $id, 'Deleted category ID: ' . $id);
        $this->withSuccess('Category deleted successfully.');
        $this->redirect('/admin/categories');
    }
}

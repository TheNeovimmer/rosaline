<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $page = (int) ($_GET['page'] ?? 1);
        $search = trim($_GET['search'] ?? '');
        $where = '1=1';
        $params = [];
        if ($search !== '') {
            $where .= ' AND (title LIKE :search OR author LIKE :search)';
            $params['search'] = '%' . $search . '%';
        }
        $result = BlogPost::paginate($page, 15, $where, $params, 'created_at DESC');
        $this->view('admin/blog/index', ['posts' => $result['items'], 'pagination' => $result, 'search' => $search], 'admin');
    }

    public function create(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $this->view('admin/blog/form', ['post' => null], 'admin');
    }

    public function store(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $errors = $this->validate($_POST, ['title' => 'required|min:2|max:255', 'slug' => 'required|min:2|max:255', 'content' => 'required|min:10']);
        if (!empty($errors)) { $this->withErrors($errors); $this->withOld($_POST); $this->redirectBack(); return; }

        $image = null;
        if (!empty($_FILES['image']['name'])) {
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
                $fn = 'blog_' . uniqid() . '.' . $ext;
                $p = __DIR__ . '/../../../public/assets/images/blog/' . $fn;
                if (!is_dir(dirname($p))) mkdir(dirname($p), 0755, true);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $p)) $image = 'assets/images/blog/' . $fn;
            }
        }

        BlogPost::create([
            'title' => $_POST['title'], 'slug' => $_POST['slug'],
            'content' => $_POST['content'], 'excerpt' => $_POST['excerpt'] ?? '',
            'image' => $image, 'author' => $_POST['author'] ?? 'Admin',
            'published_at' => !empty($_POST['published_at']) ? $_POST['published_at'] : date('Y-m-d H:i:s'),
        ]);
        $this->logActivity('create', 'blog_post', (int) \App\Core\Database::lastInsertId(), 'Created post: ' . $_POST['title']);
        $this->withSuccess('Post created.'); $this->redirect('/admin/blog');
    }

    public function edit(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $post = BlogPost::find($id);
        if (!$post) { $this->redirect('/admin/blog'); return; }
        $this->view('admin/blog/form', ['post' => $post], 'admin');
    }

    public function update(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $post = BlogPost::find($id);
        if (!$post) { $this->redirect('/admin/blog'); return; }
        $errors = $this->validate($_POST, ['title' => 'required|min:2|max:255', 'slug' => 'required|min:2|max:255', 'content' => 'required|min:10']);
        if (!empty($errors)) { $this->withErrors($errors); $this->withOld($_POST); $this->redirectBack(); return; }

        $data = ['title' => $_POST['title'], 'slug' => $_POST['slug'], 'content' => $_POST['content'], 'excerpt' => $_POST['excerpt'] ?? '', 'author' => $_POST['author'] ?? 'Admin'];
        if (!empty($_POST['published_at'])) $data['published_at'] = $_POST['published_at'];

        if (!empty($_FILES['image']['name'])) {
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
                $fn = 'blog_' . uniqid() . '.' . $ext;
                $p = __DIR__ . '/../../../public/assets/images/blog/' . $fn;
                if (!is_dir(dirname($p))) mkdir(dirname($p), 0755, true);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $p)) $data['image'] = 'assets/images/blog/' . $fn;
            }
        }

        BlogPost::updateWhere($data, 'id = :id', ['id' => $id]);
        $this->logActivity('update', 'blog_post', $id, 'Updated post: ' . $data['title']);
        $this->withSuccess('Post updated.'); $this->redirect('/admin/blog');
    }

    public function destroy(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        BlogPost::deleteWhere('id = :id', ['id' => $id]);
        $this->logActivity('delete', 'blog_post', $id, 'Deleted post ID: ' . $id);
        $this->withSuccess('Post deleted.'); $this->redirect('/admin/blog');
    }
}

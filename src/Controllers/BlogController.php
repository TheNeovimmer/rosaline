<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index(): void
    {
        $result = BlogPost::paginate(1, 6, 'published_at IS NOT NULL', [], 'created_at DESC');

        $this->view('front/blog', [
            'posts'      => $result['items'],
            'pagination' => $result,
        ]);
    }

    public function show(string $slug): void
    {
        $post = BlogPost::findBySlug($slug);
        if (!$post || !$post['published_at']) {
            $this->redirect('/blog');
            return;
        }

        $this->view('front/blog-detail', [
            'post' => $post,
        ]);
    }
}

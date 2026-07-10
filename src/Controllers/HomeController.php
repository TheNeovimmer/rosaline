<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index(): void
    {
        $featuredProducts = Product::getFeatured();
        $posts = BlogPost::paginate(1, 3, '1=1', [], 'created_at DESC');

        $this->view('front/home', [
            'featuredProducts'  => $featuredProducts,
            'blogPosts' => $posts['items'],
        ]);
    }
}

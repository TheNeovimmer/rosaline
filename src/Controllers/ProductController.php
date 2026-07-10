<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\Product;
use App\Models\Review;

class ProductController extends Controller
{
    public function show(string $slug): void
    {
        $product = Product::findBySlug($slug);
        if (!$product || $product['status'] !== 'active') {
            $this->redirect('/shop');
            return;
        }

        $reviews = Review::getByProduct($product['id']);
        $avgRating = Review::getAverageRating($product['id']);
        $related = Product::getRelated($product['id']);

        $this->view('front/product-detail', [
            'product'   => $product,
            'reviews'   => $reviews,
            'avgRating' => $avgRating,
            'related'   => $related,
        ]);
    }

    public function addReview(string $slug): void
    {
        if (!Auth::check()) {
            $this->redirect('/login');
            return;
        }

        $product = Product::findBySlug($slug);
        if (!$product) {
            $this->redirect('/shop');
            return;
        }

        $errors = $this->validate($_POST, [
            'rating' => 'required|numeric',
            'comment' => 'required|min:10|max:1000',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $rating = (int) $_POST['rating'];
        if ($rating < 1 || $rating > 5) {
            $this->withErrors(['rating' => ['Rating must be between 1 and 5']]);
            $this->redirectBack();
            return;
        }

        Review::create([
            'product_id' => $product['id'],
            'user_id'    => Auth::id(),
            'rating'     => $rating,
            'comment'    => $_POST['comment'],
            'status'     => 'pending',
        ]);

        $this->withSuccess('Review submitted and awaiting approval.');
        $this->redirectBack();
    }
}

<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(int $page = 1): void
    {
        $search = trim($_GET['search'] ?? '');
        $categoryId = (int) ($_GET['category'] ?? 0);
        $sort = $_GET['sort'] ?? 'newest';
        $minPrice = (float) ($_GET['min_price'] ?? 0);
        $maxPrice = (float) ($_GET['max_price'] ?? 0);

        $where = "status = 'active'";
        $params = [];
        $orderBy = match ($sort) {
            'price_asc'  => 'price ASC',
            'price_desc' => 'price DESC',
            'name_asc'   => 'name ASC',
            'name_desc'  => 'name DESC',
            default      => 'id DESC',
        };

        if ($search !== '') {
            $where .= ' AND (name LIKE :search OR description LIKE :search)';
            $params['search'] = '%' . $search . '%';
        }

        if ($categoryId > 0) {
            $where .= ' AND category_id = :category_id';
            $params['category_id'] = $categoryId;
        }

        if ($minPrice > 0) {
            $where .= ' AND price >= :min_price';
            $params['min_price'] = $minPrice;
        }

        if ($maxPrice > 0) {
            $where .= ' AND price <= :max_price';
            $params['max_price'] = $maxPrice;
        }

        $result = Product::paginate($page, 12, $where, $params, $orderBy);
        $categories = Category::all();

        $this->view('front/shop', [
            'products'   => $result['items'],
            'pagination' => $result,
            'categories' => $categories,
            'search'     => $search,
            'selected_category' => $categoryId,
            'sort'       => $sort,
            'min_price'  => $minPrice,
            'max_price'  => $maxPrice,
        ]);
    }

    public function category(string $slug): void
    {
        $category = Category::findBySlug($slug);
        if (!$category) {
            $this->redirect('/shop');
            return;
        }

        $result = Product::paginate(1, 12, "category_id = :category_id AND status = 'active'", ['category_id' => $category['id']]);
        $categories = Category::all();

        $this->view('front/shop', [
            'products'   => $result['items'],
            'pagination' => $result,
            'categories' => $categories,
            'category'   => $category,
            'selected_category' => $category['id'],
            'search'     => '',
            'sort'       => 'newest',
            'min_price'  => 0,
            'max_price'  => 0,
        ]);
    }
}

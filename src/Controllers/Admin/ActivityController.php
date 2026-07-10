<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\ActivityLog;

class ActivityController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }

        $page = max(1, (int) ($_GET['page'] ?? 1));
        $search = trim($_GET['search'] ?? '');

        $result = $search
            ? ActivityLog::search($search, $page)
            : ActivityLog::getAll($page);

        $this->view('admin/activity/index', [
            'logs' => $result['items'],
            'pagination' => [
                'current_page' => $result['current_page'],
                'last_page' => $result['last_page'],
                'total' => $result['total'],
            ],
            'search' => $search,
        ], 'admin');
    }
}

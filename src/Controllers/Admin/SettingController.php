<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }

        $settings = Setting::all();
        $groups = [
            'Store' => ['store_name', 'store_email', 'store_phone', 'store_address'],
            'Social' => ['facebook_url', 'twitter_url', 'instagram_url', 'youtube_url'],
            'Shopping' => ['currency', 'tax_rate', 'shipping_free_threshold'],
            'COD' => ['cod_enabled', 'cod_min_amount', 'cod_max_amount', 'cod_description'],
        ];

        $this->view('admin/settings/index', [
            'settings' => $settings,
            'groups' => $groups,
        ], 'admin');
    }

    public function update(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }

        $allowed = ['store_name', 'store_email', 'store_phone', 'store_address',
                     'facebook_url', 'twitter_url', 'instagram_url', 'youtube_url',
                     'currency', 'tax_rate', 'shipping_free_threshold',
                     'cod_enabled', 'cod_min_amount', 'cod_max_amount', 'cod_description'];

        foreach ($_POST as $key => $value) {
            if (in_array($key, $allowed)) {
                Setting::set($key, trim($value));
            }
        }

        $this->logActivity('update', 'settings');
        $this->withSuccess('Settings saved successfully.');
        $this->redirect('/admin/settings');
    }
}

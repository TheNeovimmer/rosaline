<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Database;

class GovernorateController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $governorates = Database::fetchAll("SELECT * FROM governorates ORDER BY name_en");
        $this->view('admin/governorates/index', ['governorates' => $governorates], 'admin');
    }

    public function create(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $this->view('admin/governorates/form', ['gov' => null], 'admin');
    }

    public function store(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        Database::query(
            "INSERT INTO governorates (name_en, name_fr, shipping_fee, region) VALUES (?, ?, ?, ?)",
            [$_POST['name_en'], $_POST['name_fr'], $_POST['shipping_fee'], $_POST['region']]
        );
        $this->logActivity('create', 'governorate', (int)Database::lastInsertId(), 'Created governorate: ' . $_POST['name_en']);
        $this->withSuccess('Governorate created.');
        $this->redirect('/admin/governorates');
    }

    public function edit(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $gov = Database::fetch("SELECT * FROM governorates WHERE id = ?", [$id]);
        if (!$gov) { $this->redirect('/admin/governorates'); return; }
        $this->view('admin/governorates/form', ['gov' => $gov], 'admin');
    }

    public function update(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        Database::query(
            "UPDATE governorates SET name_en=?, name_fr=?, shipping_fee=?, region=?, is_active=? WHERE id=?",
            [$_POST['name_en'], $_POST['name_fr'], $_POST['shipping_fee'], $_POST['region'], (int)($_POST['is_active'] ?? 0), $id]
        );
        $this->logActivity('update', 'governorate', $id, 'Updated governorate: ' . $_POST['name_en']);
        $this->withSuccess('Governorate updated.');
        $this->redirect('/admin/governorates');
    }

    public function destroy(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        Database::query("DELETE FROM governorates WHERE id = ?", [$id]);
        $this->logActivity('delete', 'governorate', $id, 'Deleted governorate ID: ' . $id);
        $this->withSuccess('Governorate deleted.');
        $this->redirect('/admin/governorates');
    }
}

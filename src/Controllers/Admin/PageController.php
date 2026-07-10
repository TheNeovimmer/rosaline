<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\Page;

class PageController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $pages = Page::all();
        $this->view('admin/pages/index', ['pages' => $pages], 'admin');
    }

    public function create(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $this->view('admin/pages/form', ['page' => null], 'admin');
    }

    public function store(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $errors = $this->validate($_POST, ['title' => 'required|min:2|max:255', 'slug' => 'required|min:2|max:255']);
        if (!empty($errors)) { $this->withErrors($errors); $this->withOld($_POST); $this->redirectBack(); return; }
        Page::create(['title' => $_POST['title'], 'slug' => $_POST['slug'], 'content' => $_POST['content'] ?? '']);
        $this->logActivity('create', 'page', (int) \App\Core\Database::lastInsertId(), 'Created page: ' . $_POST['title']);
        $this->withSuccess('Page created.'); $this->redirect('/admin/pages');
    }

    public function edit(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $page = Page::find($id);
        if (!$page) { $this->redirect('/admin/pages'); return; }
        $this->view('admin/pages/form', ['page' => $page], 'admin');
    }

    public function update(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $page = Page::find($id);
        if (!$page) { $this->redirect('/admin/pages'); return; }
        $errors = $this->validate($_POST, ['title' => 'required|min:2|max:255', 'slug' => 'required|min:2|max:255']);
        if (!empty($errors)) { $this->withErrors($errors); $this->withOld($_POST); $this->redirectBack(); return; }
        Page::updateWhere(['title' => $_POST['title'], 'slug' => $_POST['slug'], 'content' => $_POST['content'] ?? ''], 'id = :id', ['id' => $id]);
        $this->logActivity('update', 'page', $id, 'Updated page: ' . $_POST['title']);
        $this->withSuccess('Page updated.'); $this->redirect('/admin/pages');
    }

    public function destroy(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        Page::deleteWhere('id = :id', ['id' => $id]);
        $this->logActivity('delete', 'page', $id, 'Deleted page ID: ' . $id);
        $this->withSuccess('Page deleted.'); $this->redirect('/admin/pages');
    }
}

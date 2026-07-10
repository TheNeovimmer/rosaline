<?php
$user   = $data['user'] ?? [];
$errors = $data['errors'] ?? [];
?>
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold">Edit User</div>
    <div class="card-body">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger py-2"><?= implode('<br>', array_map('e', $errors)) ?></div>
        <?php endif; ?>
        <form method="post" action="<?= url('admin/users/' . $user['id'] . '/edit') ?>">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= e($user['name'] ?? '') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= e($user['email'] ?? '') ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select">
                    <option value="customer" <?= ($user['role'] ?? '') === 'customer' ? 'selected' : '' ?>>Customer</option>
                    <option value="admin" <?= ($user['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password <small class="text-secondary">(leave blank to keep current)</small></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirm" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Update User</button>
        </form>
    </div>
</div>
<?php $pageTitle = 'Account Settings'; ?>
<section class="tf-page-heading_account flat-spacing">
    <div class="container">
        <a href="<?= url('account') ?>" class="content d-inline-flex">
            <div class="account-icon d-flex"><i class="icon icon-ArrowLeft fs-24"></i></div>
            <div class="account-infor">
                <h3 class="info_name font-instrument_serif mb-8">Account Settings</h3>
                <p class="info_more cl-text-5">Manage your profile and password</p>
            </div>
        </a>
    </div>
</section>
<div class="flat-spacing-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-3 lg-d-none">
                <div class="sidebar-account-wrap sidebar-content-wrap">
                    <div class="my-account-nav">
                        <a href="<?= url('account') ?>" class="link-account"><i class="icon icon-Dashboard fs-20"></i><span class="text fw-normal">Dashboard</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/orders') ?>" class="link-account"><i class="icon icon-Box fs-20"></i><span class="text fw-normal">My Orders</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('wishlist') ?>" class="link-account"><i class="icon icon-Hearth fs-20"></i><span class="text fw-normal">Wishlist</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/addresses') ?>" class="link-account"><i class="icon icon-DotLocation fs-20"></i><span class="text fw-normal">Addresses</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/payment') ?>" class="link-account"><i class="icon icon-Payment fs-20"></i><span class="text fw-normal">Payment Methods</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/settings') ?>" class="link-account active"><i class="icon icon-Setting fs-20"></i><span class="text fw-normal">Account Settings</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('logout') ?>" class="link-account"><i class="icon icon-Logout fs-20"></i><span class="text fw-normal">Log Out</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="my-account-content">
                    <?php $errors = $data['errors'] ?? []; ?>
                    <?php if (!empty($errors)): ?><div class="alert alert-danger py-2"><?= implode('<br>', array_map('e', $errors)) ?></div><?php endif; ?>
                    <?php $success = \App\Core\Session::getFlash('success'); if ($success): ?><div class="alert alert-success py-2"><?= e($success) ?></div><?php endif; ?>
                    <form method="post" action="<?= url('account/settings') ?>">
                        <div class="box-dashboard_item">
                            <div class="dash_title"><h6 class="font-instrument_serif">Profile Information</h6></div>
                            <div class="dash_content">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control" value="<?= e(old('name', $user['name'])) ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= e(old('email', $user['email'])) ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="<?= e(old('phone', $user['phone'] ?? '')) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-dashboard_item">
                            <div class="dash_title"><h6 class="font-instrument_serif">Change Password (leave blank to keep)</h6></div>
                            <div class="dash_content">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Min 6 characters">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="tf-btn style-2">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

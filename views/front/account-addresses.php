<?php $pageTitle = 'My Addresses'; ?>
<section class="tf-page-heading_account flat-spacing">
    <div class="container">
        <a href="<?= url('account') ?>" class="content d-inline-flex">
            <div class="account-icon d-flex"><i class="icon icon-ArrowLeft fs-24"></i></div>
            <div class="account-infor">
                <h3 class="info_name font-instrument_serif mb-8">My Addresses</h3>
                <p class="info_more cl-text-5">Manage your shipping addresses</p>
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
                        <a href="<?= url('account/addresses') ?>" class="link-account active"><i class="icon icon-DotLocation fs-20"></i><span class="text fw-normal">Addresses</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/payment') ?>" class="link-account"><i class="icon icon-Payment fs-20"></i><span class="text fw-normal">Payment Methods</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('account/settings') ?>" class="link-account"><i class="icon icon-Setting fs-20"></i><span class="text fw-normal">Account Settings</span><i class="icon icon-ArrowCaretRight"></i></a>
                        <a href="<?= url('logout') ?>" class="link-account"><i class="icon icon-Logout fs-20"></i><span class="text fw-normal">Log Out</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="my-account-content">
                    <?php $success = \App\Core\Session::getFlash('success'); if ($success): ?><div class="alert alert-success py-2"><?= e($success) ?></div><?php endif; ?>
                    <?php if (!empty($data['errors'])): ?><div class="alert alert-danger py-2"><?= implode('<br>', array_map('e', $data['errors'])) ?></div><?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="font-instrument_serif mb-0">Saved Addresses</h6>
                        <button class="tf-btn style-2 btn-sm" data-bs-toggle="modal" data-bs-target="#addAddressModal">Add New</button>
                    </div>
                    <?php if (empty($addresses)): ?>
                        <p class="text-body-s cl-text-5">No addresses saved yet.</p>
                    <?php else: ?>
                        <div class="row g-3">
                            <?php foreach ($addresses as $addr): ?>
                            <div class="col-md-6">
                                <div class="card border" style="border-radius:8px;padding:20px;">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <span class="badge bg-dark"><?= e($addr['label']) ?></span>
                                        <?php if ($addr['is_default']): ?><span class="badge bg-success">Default</span><?php endif; ?>
                                    </div>
                                    <p class="fw-normal mb-1"><?= e($addr['full_name']) ?></p>
                                    <p class="text-body-s cl-text-5 mb-1"><?= e($addr['phone'] ?? '-') ?></p>
                                    <p class="text-body-s cl-text-5 mb-2"><?= e($addr['address_line1']) ?><?= $addr['address_line2'] ? ', ' . e($addr['address_line2']) : '' ?><br><?= e($addr['city'] ?? '') ?><?= !empty($addr['governorate_name']) ? ', ' . e($addr['governorate_name']) : '' ?></p>
                                    <div class="d-flex gap-2">
                                        <?php if (!$addr['is_default']): ?>
                                        <form method="post" action="<?= url('account/addresses/' . $addr['id'] . '/default') ?>"><?= csrf_field() ?>
                                            <button type="submit" class="tf-btn-link type-2 gap-4"><span class="text-body-s">Set Default</span></button>
                                        </form>
                                        <?php endif; ?>
                                        <form method="post" action="<?= url('account/addresses/' . $addr['id'] . '/delete') ?>" onsubmit="return confirm('Delete this address?')"><?= csrf_field() ?>
                                            <button type="submit" class="tf-btn-link type-2 gap-4"><span class="text-body-s text-danger">Delete</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Address Modal -->
<div class="modal fade" id="addAddressModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title font-instrument_serif">Add Address</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <form method="post" action="<?= url('account/addresses/create') ?>">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3"><label class="form-label">Label</label><select name="label" class="form-select"><option>Home</option><option>Work</option><option>Other</option></select></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Full Name</label><input type="text" name="full_name" class="form-control" required></div>
                        <div class="col-md-6 mb-3"><label class="form-label">Phone (+216)</label><input type="tel" name="phone" class="form-control" placeholder="+216 XX XXX XXX" pattern="^\+216[2-9]\d{7}$"></div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Governorate</label>
                            <select name="governorate_id" class="form-select" required>
                                <option value="">Select governorate</option>
                                <?php foreach ($data['governorates'] as $g): ?>
                                <option value="<?= $g['id'] ?>"><?= e($g['name_en']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 mb-3"><label class="form-label">Address Line 1</label><input type="text" name="address_line1" class="form-control" required></div>
                        <div class="col-12 mb-3"><label class="form-label">Address Line 2</label><input type="text" name="address_line2" class="form-control"></div>
                        <div class="col-md-6 mb-3"><label class="form-label">City</label><input type="text" name="city" class="form-control"></div>
                        <div class="col-12 mb-3"><div class="form-check"><input type="checkbox" name="is_default" class="form-check-input" id="isDefault"><label class="form-check-label" for="isDefault">Set as default address</label></div></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="tf-btn style-2">Save Address</button></div>
            </form>
        </div>
    </div>
</div>

<?php $pageTitle = 'My Account'; include 'inc/header.php'; ?>
<!-- /Header -->
        <!-- Page Title -->
        <section class="tf-page-heading_account flat-spacing">
            <div class="container">
                <a href="account-page.php" class="content d-inline-flex">
                    <div class="account-icon d-flex">
                        <i class="icon icon-ArrowLeft fs-24"></i>
                    </div>
                    <div class="account-infor">
                        <h3 class="info_name font-instrument_serif mb-8">
                            Account Settings
                        </h3>
                        <p class="info_more cl-text-5">
                            Manage your account preferences
                        </p>
                    </div>
                </a>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Account -->
        <div class="my-account-setting flat-spacing-mix-1">
            <div class="container">
                <div class="row gy-16">
                    <div class="col-lg-4">
                        <h6 class="font-instrument_serif mb-8">
                            Personal Information
                        </h6>
                        <p class="cl-text-5">
                            Update your personal details
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <form class="col-right">
                            <div class="form-content">
                                <div class="tf-grid-layout gap-8 sm-col-2">
                                    <fieldset class="tf-field">
                                        <label for="f-nameInfor" class="text-body-xs">Firsr name</label>
                                        <input type="text" id="f-nameInfor" class="style-4" value="Sarah"
                                            placeholder="Enter Your First Name" required>
                                    </fieldset>
                                    <fieldset class="tf-field">
                                        <label for="l-nameInfor" class="text-body-xs">Last name</label>
                                        <input type="text" id="l-nameInfor" class="style-4" value="Johnson"
                                            placeholder="Enter You Last Name" required>
                                    </fieldset>
                                </div>
                                <fieldset class="tf-field">
                                    <label for="phoneInfor1" class="text-body-xs">Your email</label>
                                    <input type="email" id="phoneInfor1" class="style-4" value="sarah.johnson@email.com"
                                        placeholder="Enter Your Email" required>
                                </fieldset>
                                <fieldset class="tf-field">
                                    <label for="phoneInfor2" class="text-body-xs">Phone number</label>
                                    <input type="text" id="phoneInfor2" class="style-4" value="+1 (555) 123-4567"
                                        placeholder="Enter Your Phone" required>
                                </fieldset>
                            </div>
                            <div class="br-line bg-line-5"></div>
                            <button type="submit" class="btn-action_submit tf-btn type-4 align-self-end">
                                SAVE CHANGES
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row gy-16">
                    <div class="col-lg-4">
                        <h6 class="font-instrument_serif mb-8">
                            Change Password
                        </h6>
                        <p class="cl-text-5">
                            Update your account password
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <form class="col-right">
                            <div class="form-content">
                                <fieldset class="tf-field">
                                    <label for="currentPass" class="text-body-xs">Current Password</label>
                                    <div class="password-wrapper w-100">
                                        <input class="password-field style-4" type="password" id="currentPass"
                                            placeholder="Enter current password" required>
                                        <span class="toggle-pass icon-EyeSlash cl-text-5"></span>
                                    </div>
                                </fieldset>
                                <fieldset class="tf-field">
                                    <label for="newPass" class="text-body-xs">New Password</label>
                                    <div class="password-wrapper w-100">
                                        <input class="password-field style-4" type="password" id="newPass"
                                            placeholder="Enter new password" required>
                                        <span class="toggle-pass icon-EyeSlash cl-text-5"></span>
                                    </div>
                                </fieldset>
                                <fieldset class="tf-field">
                                    <label for="confirmPass" class="text-body-xs">Confirm New Password</label>
                                    <div class="password-wrapper w-100">
                                        <input class="password-field style-4" type="password" id="confirmPass"
                                            placeholder="Confirm new password" required>
                                        <span class="toggle-pass icon-EyeSlash cl-text-5"></span>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="br-line bg-line-5"></div>
                            <button type="submit" class="btn-action_submit tf-btn type-4 align-self-end">
                                Update password
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row gy-16">
                    <div class="col-lg-4">
                        <h6 class="font-instrument_serif mb-8">
                            Privacy & Security
                        </h6>
                        <p class="cl-text-5">
                            Manage your privacy settings
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <div class="col-right list-security">
                            <div class="security-item">
                                <div class="">
                                    <p class="fw-normal mb-6">Two-Factor Authentication</p>
                                    <p class="text-body-s cl-text-5">Add an extra layer of security</p>
                                </div>
                                <label for="checkToggle1" class="checktoggle-wrap">
                                    <input id="checkToggle1" type="checkbox" class="tf-check-toggle">
                                </label>
                            </div>
                            <div class="security-item">
                                <div class="">
                                    <p class="fw-normal mb-6">Login Alerts</p>
                                    <p class="text-body-s cl-text-5">Get notified of new login attempts</p>
                                </div>
                                <label for="checkToggle2" class="checktoggle-wrap">
                                    <input id="checkToggle2" type="checkbox" class="tf-check-toggle" checked>
                                </label>
                            </div>
                            <div class="security-item">
                                <div class="">
                                    <p class="fw-normal mb-6">Save Login Info</p>
                                    <p class="text-body-s cl-text-5">Stay logged in on this device</p>
                                </div>
                                <label for="checkToggle3" class="checktoggle-wrap">
                                    <input id="checkToggle3" type="checkbox" class="tf-check-toggle" checked>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gy-16">
                    <div class="col-lg-4">
                        <h6 class="font-instrument_serif mb-8 cl-text-error_800">
                            Delete Account
                        </h6>
                        <p class="cl-text-5">
                            Permanently delete your account & all data
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <div class="col-right delete-account m-0">
                            <p class="text-notice">
                                *Once you delete your account, there is no going back. All your data, orders, and
                                preferences will be permanently removed.
                            </p>
                            <button type="submit" class="btn-delete_account tf-btn type-4 align-self-start">
                                Delete my account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Account -->
        <!-- Footer -->
        
<?php include 'inc/footer.php'; ?>
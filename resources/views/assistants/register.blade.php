<?php require APPROOT . '/views/inc_assistant/header.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Account Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="<?php echo URLROOT; ?>/assets/img/login-banner.png" class="img-fluid"
                                alt="Login Banner">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Assistant Register <a href="register.html">Not an Assistant?</a></h3>
                            </div>

                            <!-- Register Form -->
                            <form action="patient-dashboard.html">
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating">
                                    <label class="focus-label">Name</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating">
                                    <label class="focus-label">Mobile Number</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="password" class="form-control floating">
                                    <label class="focus-label">Create Password</label>
                                </div>
                                <div class="text-end">
                                    <a class="forgot-link" href="login.html">Already have an account?</a>
                                </div>
                                <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Signup</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>
                                <div class="row form-row social-login">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-facebook w-100"><i
                                                class="fab fa-facebook-f me-1"></i> Login</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-google w-100"><i
                                                class="fab fa-google me-1"></i> Login</a>
                                    </div>
                                </div>
                            </form>
                            <!-- /Register Form -->

                        </div>
                    </div>
                </div>
                <!-- /Account Content -->

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->



<?php require APPROOT . '/views/inc_assistant/footer.php'; ?>

<?php require APPROOT.'/views/inc_assistant/header.php';?>
<!-- Page Content -->
    <div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-8 offset-md-2">

							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?php echo URLROOT;?>/assets/img/login-banner.png" class="img-fluid" alt="Login Banner">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Forgot Password?</h3>
											<p class="small text-muted">Enter your mobile no to get a password reset link</p>
										</div>

										<!-- Forgot Password Form -->
										<form action="login.html">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating">
												<label class="focus-label">Phone</label>
											</div>
											<div class="text-end">
												<a class="forgot-link" href="login.html">Remember your password?</a>
											</div>
											<button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Reset Password</button>
											<div class="login-or">
											</div>
										</form>
										<!-- /Forgot Password Form -->

									</div>
								</div>
							</div>
							<!-- /Account Content -->

						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->
   <?php require APPROOT.'/views/inc_assistant/footer.php';?>

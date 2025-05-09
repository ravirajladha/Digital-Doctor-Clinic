<?php require APPROOT.'/views/inc_assistant/header.php';?>
<?php
// $otp_new = str_pad(rand(1111,9999), 4, "0", STR_PAD_LEFT);
$otp_new = 5555;
$_SESSION['otp_generated'] = $otp_new;

// session_start();
?>
<!-- Page Content -->
<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-8 offset-md-2">
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?php echo URLROOT; ?>/assets/img/login-banner.png" class="img-fluid" alt="Digitaldrclinic Login">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<form action="<?php echo URLROOT; ?>/assistants/user_otp_registration_1/<?php echo $data['id'] ;?>" autocomplete="off" method="POST">
											<div class="form-group form-focus" style="margin-bottom:30px;">
											<label >Patient Phoneno</label>
												<input type="phone"  id="phone_otp" onkeyup="checkphn(this.value)" oninput="numberOnly(this.id);" maxlength="10" class="form-control floating" placeholder="Enter Patient Phoneno" name="phone">


											</div>
											 <div class="form-group form-focus" style="margin-bottom:30px;">
											 <label >Otp</label>
												<input type="text"  name="otp" id="otp_fill" onkeyup="checkotp(this.value,<?php echo $otp_new; ?>);" required class="form-control floating" placeholder="Enter Otp">

											</div>
											<p class="ps-form__group" ><span class='pull-left' id="countdown"></span></p>
											<button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Submit</button>

											<div class="row form-row social-login">
												<div class="col-6">
												</div>
												<div class="col-6">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->

						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->


<?php require APPROOT.'/views/inc_assistant/footer.php';?>
<script>

function checkphn(phn) {
			var phn = document.getElementById("phone_otp").value;
			// alert(phn);
			var timeleft = 5;
			$.ajax({
				url: "<?php echo URLROOT; ?>/assistants/send_otp/" + phn + "/<?php echo $otp_new; ?>",
				type: 'POST',

			});
			var downloadTimer = setInterval(function function1() {

document.getElementById("countdown").innerHTML = "Resend OTP (" + timeleft + "s)";

timeleft -= 1;
if (timeleft <= 0) {

	clearInterval(downloadTimer);
	document.getElementById("countdown").innerHTML = ""
}
}, 1000);

var ThisIt = $(this);
ThisIt.addClass('invisible');
setTimeout(function() {
ThisIt.removeClass('invisible');
}, 20000);

			};
	</script>

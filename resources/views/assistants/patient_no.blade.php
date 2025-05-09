@include('inc_assistant/header')
@php
$otp_new = 5555; // You might want to use rand(1111, 9999) for a random OTP
session()->put('otp_generated', $otp_new);
@endphp
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
			@include('inc_assistant/navbar')
            <div class="col-md-7">
                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <!-- Left Column (Image) -->
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="/assets/img/02.jpg" class="img-fluid" alt="Digitaldrclinic Login">
                        </div>
                        <!-- Right Column (Login Form) -->
                        <div class="col-md-12 col-lg-6 login-right">
                            <form action="/user_otp_registration" autocomplete="off" method="POST">
                                @csrf
                                <!-- Phone Input -->
                                <div class="form-group form-focus" style="margin-bottom:30px;">
                                    <label>Patient Phone Number</label>
									<span class="text-danger fst-italic" id="DirectorphoneErrorMessage"></span>
                                    <input type="phone" id="phone_otp" onkeyup="checkphn(this.value)" oninput="numberOnly(this.id);" maxlength="10" class="form-control floating" placeholder="Enter Patient Phone No" name="phone">
                                </div>
                                <!-- OTP Input -->
                                <div class="form-group form-focus" style="margin-bottom:30px;">
                                    <label>Otp</label>
                                    <input type="text" name="otp" id="otp_fill" onkeyup="checkotp(this.value,<?php echo $otp_new; ?>);" required class="form-control floating" placeholder="Enter Otp">
                                </div>
                                <!-- Countdown Timer -->
                                <p class="ps-form__group"><span class='pull-left' id="countdown"></span></p>
                                <!-- Submit Button -->
                                <button class="btn btn-primary w-100 btn-lg login-btn" type="submit" id="submit">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Login Tab Content -->
            </div>
        </div>
    </div>
</div>





@include('inc_assistant/footer')

<script>

	$(document).ready(function(){
			function checkphn(phn) {
			var phn = document.getElementById("phone_otp").value;
			// alert(phn);
			var timeleft = 5;
			$.ajax({
				url: "/assistants/send_otp/" + phn + "/<?php echo $otp_new; ?>",
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

		function checkMobile(mobile) {
			$.ajax({
				type: 'GET',
				url: '/unique_mobile_number_assistant_patient',
				data: {
					mobile_number: mobile
				},
				success: function(response) {
					console.log(response.trim());
					if (response.trim() === 'exists') {
						$('#DirectorphoneErrorMessage').text('You are already a user');
					} else if(response.trim() === 'numberexists'){
                        $('#DirectorphoneErrorMessage').text('Please use a different number');
                    } else {
						$('#DirectorphoneErrorMessage').text('');
					}
                    updateSubmitButton();
				}
			});

		}

        function updateSubmitButton(){
            if($('#DirectorphoneErrorMessage').text() === 'Please use a different number'){
                $('#submit').prop('disabled',true);
            } else {
                $('#submit').prop('disabled',false);
            }
        }
	});

</script>

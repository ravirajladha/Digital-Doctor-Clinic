@include('inc_admins/header')

<!-- /Header -->

<?php

use App\Models\Digitaldrclininc_center;

  $ddc=Digitaldrclininc_center::all();   ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Add Assistants</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Add Assistants</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="col-md-12 col-lg-12 col-xl-12">
			<div class="card">
				<div class="card-body">
					@foreach($assistant as $assist)
					<!-- My Profile Form -->
					<form action="/admins/updateAssistant/{{$assist->id}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row form-row">
							<div class="col-12 col-md-12">
								<div class="form-group">
									<div class="change-avatar">
										<div class="profile-img">
											<img src="/uploads/assistant/{{$assist->photo}}" alt="User Image" id="changeablephoto">
										</div>
										<div class="upload-img">
											<div class="change-photo-btn">
												<span><i class="fa fa-upload"></i> Upload Photo</span>
												<input type="file" class="upload" id="photo" name="photo">
											</div>
											<small class="form-text text-muted">Allowed JPG, GIF, or PNG. Max size of 2MB</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="hidden" class="form-control" value="{{$assist->id}}" name="fname" >
                                    <input type="text" class="form-control" value="{{$assist->fname}}" name="fname">

								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" value="{{$assist->lname}}" name="lname" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Date of Birth</label>
									<input type="date" class="form-control" value="{{$assist->dob}}" name="dob" >

								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Digitaldrclininc Center</label>

									<select class="form-select form-control" name="digitaldrclininc_center_id">
									@foreach($ddc as $dc)
									<option value="{{$dc->id}}">{{$dc->name}}</option>
                                     @endforeach
									</select>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Blood Group</label>
									<select class="form-select form-control" name="blood_group">
										<option value="A-">A-</option>
										<option value="A+">A+</option>
										<option value="B-">B-</option>
										<option value="B-">B+</option>
										<option value="AB-">AB-</option>
										<option value="AB+">AB+</option>
										<option value="O-">O-</option>
										<option value="O+">O+</option>
									</select>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Email ID</label>
									<span class="text-warning fst-italic" id="DirectoremailErrorMessage"></span>
									<input type="email" class="form-control" id="email" value="{{$assist->email}}"  name="email" >
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Mobile</label>
									<span class="text-warning fst-italic" id="DirectorphoneErrorMessage"></span>
									<input type="text" value="{{$assist->mobile}}" class="form-control" id="mobile" name="mobile" >
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Address</label>
									<input type="text" class="form-control" value="{{$assist->street}} " name="street">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>City</label>
									<input type="text" class="form-control" value="{{$assist->city}}" name="city" id="city">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>State</label>
									<input type="text" class="form-control" value="{{$assist->state}}" name="state" id="state">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>ZIP Code</label>
									<input type="text" class="form-control" value="{{$assist->zip_code}}" id="pincode" name="zip_code">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Country</label>
									<input type="text" class="form-control" value="{{$assist->country}}" name="country" id="country">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Aadhar Card</label>
                                    @if($assist->aadhar_card)
                                    <a href="/uploads/assistant/{{$assist->aadhar_card}}" target="_blank"><i class="fa fa-eye"></i></a>
                                    @endif
									<input type="file" id="aadhar_card" class="form-control" value="" name="aadhar_card" >
									<p id="aadhar_name"></p>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Pan Card</label> @if($assist->pan_card)
                                    <a href="/uploads/assistant/{{$assist->pan_card}}" target="_blank"><i class="fa fa-eye"></i></a>
                                    @endif
									<input type="file" class="form-control" value="" name="pan_card" >
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label>Cancelled Cheque</label>
                                    @if($assist->cancelled_cheque)
                                    <a href="/uploads/assistant/{{$assist->cancelled_cheque}}" target="_blank"><i class="fa fa-eye"></i></a>
                                    @endif
									<input type="file" class="form-control" value="" name="cancelled_cheque" >
								</div>
							</div>

						</div>
						<div class="submit-section submit-btn-bottom float-left">
							<button type="submit" class="btn btn-primary submit-btn" id="submit" style="border-radius:8px;margin-bottom:50px;">Update</button>
						</div>
					</form>
					<!-- /My Profile Form -->
@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Page Wrapper -->


<script>
    $(document).ready(function() {

		// Photo change
		$('#photo').on('change', function () {
			var input = this;
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					// Insert the photo into the element with ID 'changeablephoto'
					$('#changeablephoto').attr('src', e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		});

        $(document).on('input', 'input[name="email"]', function() {
            var email = $(this).val();
            checkEmail(email);
        });

        $(document).on('input', 'input[name="mobile"]', function() {
            var mobile = $(this).val();
			$(this).val(mobile.substr(0,10));
            checkMobile(mobile);
        });

        // For email check
        function checkEmail(email) {
            $.ajax({
                type: 'get',
                url: '/unique_email',
                data: {
                    email: email
                },
                success: function(response) {

                    console.log(response.trim());
                    if (response.trim() === 'exists') {
                        $('#DirectoremailErrorMessage').text('Email already exists');
                    } else {
                        $('#DirectoremailErrorMessage').text('');
                    }
                }
            });
        }

        // For phone number check
        function checkMobile(mobile) {
            $.ajax({
                type: 'GET',
                url: '/unique_mobile_number',
                data: {
                    mobile_number: mobile
                },
                success: function(response) {
                    console.log(response.trim());
                    if (response.trim() === 'exists') {
                        $('#DirectorphoneErrorMessage').text('Phone number already exists');
                    } else {
                        $('#DirectorphoneErrorMessage').text('');
                    }
                }
            });
        }

		$('#email, #mobile').on('change', function() {
			var emailErrorMessage = $('#DirectoremailErrorMessage').text();
			var phoneErrorMessage = $('#DirectorphoneErrorMessage').text();
			var check = Boolean(emailErrorMessage) || Boolean(phoneErrorMessage);
			$('#submit').prop('disabled', check);
		});

		$('#mobile, #email').on('change', function() {
			var emailErrorMessage = $('#DirectoremailErrorMessage').text();
			var phoneErrorMessage = $('#DirectorphoneErrorMessage').text();
			var check = Boolean(emailErrorMessage) || Boolean(phoneErrorMessage);
			$('#submit').prop('disabled', check);
		});


		//PINCODES EXTRACTION
		$('#pincode').on('input', function() {
			var pincode = $(this).val();
			$(this).val(pincode.substr(0,6));
			if(pincode.length === 6){
				$.ajax({
					url : '{{url("pincodes")}}',
					method : 'GET',
					data : {'pincode': pincode},
					success : function(data){
						$('#city').val(data['City']);
						$('#country').val('India');
						$('#state').val(data['State']);
					}
				});
			}
		});
    });
</script>


@include('inc_admins/footer')

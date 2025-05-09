@include('inc_assistant/header')
<!-- Breadcrumb -->
<?php

use App\Models\Digitaldrclininc_center;

$ddc = Digitaldrclininc_center::all();   ?>
<style>

	.profile-image img {
		margin-bottom: 1.5rem;
	}

	.profile-image {
		width: 120px;
		height: 120px;
		margin: 0 auto;
		margin-bottom: 10px;


	}

	.profile-image img {
		border-radius: 50%;
		width: 120px;
		height: 120px;
		object-fit: cover;
	}

	.profile-menu {
		background-color: #fff;
		border: 1px solid #f0f0f0;
		padding: 0.9375rem 1.5rem;
	}

	.profile-header {
		background-color: #fff;
		border: 1px solid #f0f0f0;
		padding: 1.5rem;
	}

	.nav-tabs.nav-tabs-solid>li>a.active,
	.nav-tabs.nav-tabs-solid>li>a.active:hover,
	.nav-tabs.nav-tabs-solid>li>a.active:focus {
		background-color: #FF9600;
		border-color: #FF9600;
		color: #fff;
	}

	.nav-tabs.nav-tabs-solid {
		background-color: #fff;
		border: 0;
	}

	.align-items-center {
		align-items: center !important;
	}

	.col-auto {
		flex: 0 0 auto;
		width: auto;
	}
	.fa-map-marker-alt:before {
		content: "\f3c5";
	}
</style>

<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">

			@include('inc_assistant/navbar')

			<div class="col-md-7 col-lg-8 col-xl-9">
				<!-- akash -->
				<div class="row">
					<div class="col-md-12">
						<div class="profile-header">
							<div class="row align-items-center">
								<div class="col-auto profile-image">
									<a href="#">
										<img class="rounded-circle" alt="User Image" src="/uploads/assistant/<?php echo $get_assistant->photo;; ?>">
									</a>
								</div>
								<div class="col ml-md-n2 profile-user-info">
									<h4 class="user-name mb-0"><?php echo ucwords($get_assistant->fname . " " . $get_assistant->lname); ?></h4>
									<h6 class="text-muted"><?php //echo $get_assistan->email;
															?></h6>
									<div class="user-Location"><i class="fa fa-map-marker-alt"></i>
										<?php echo $get_assistant->street; ?>, <br>
										<?php echo $get_assistant->city . " ," . $get_assistant->zip_code; ?><br>
										<?php echo ucwords($get_assistant->state . ", " . $get_assistant->country); ?></div>
								</div>
							</div>
						</div>
						<div class="profile-menu">
							<ul class="nav nav-tabs nav-tabs-solid">
								<li class="nav-item">
									<a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
								</li>


								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#password_tab">Documents</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#edit_profile">Edit Profile</a>
								</li>
							</ul>
						</div>
						<div class="tab-content profile-tab-cont">

							<!-- Personal Details Tab -->
							<div class="tab-pane fade show active" id="per_details_tab">

								<!-- Personal Details -->
								<div class="row">
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
													<p class="col-sm-10"><?php echo ucwords($get_assistant->fname . " " . $get_assistant->lname); ?></p>
												</div>
												<div class="row">
													<p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Date of Birth</p>
													<p class="col-sm-10"><?php echo $get_assistant->dob; ?></p>
												</div>
												<div class="row">
													<p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
													<p class="col-sm-10"><?php echo $get_assistant->email; ?></p>
												</div>
												<div class="row">
													<p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
													<p class="col-sm-10"><?php echo $get_assistant->mobile; ?></p>
												</div>
												<div class="row">
													<p class="col-sm-2 text-muted text-sm-end mb-0">Address</p>
													<p class="col-sm-10 mb-0"><?php echo $get_assistant->street; ?>,<br>
														<?php echo  ucwords($get_assistant->city . " " . $get_assistant->zip_code); ?>,<br>
														<?php echo $get_assistant->state; ?>, <?php echo $get_assistant->country; ?>
													</p>
												</div>
												<div class="row">
													<p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Blood Group</p>
													<p class="col-sm-10"><?php echo $get_assistant->blood_group; ?></p>
												</div>
											</div>
										</div>

										<!-- Edit Details Modal -->
										<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Personal Details</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form>
															<div class="row form-row">
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>First Name</label>
																		<input type="text" class="form-control" value="John">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>Last Name</label>
																		<input type="text" class="form-control" value="Doe">
																	</div>
																</div>
																<div class="col-12">
																	<div class="form-group">
																		<label>Date of Birth</label>
																		<div class="cal-icon">
																			<input type="text" class="form-control datetimepicker" value="24-07-1983">
																		</div>
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>Email ID</label>
																		<input type="email" class="form-control" value="johndoe@example.com">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>Mobile</label>
																		<input type="text" value="+1 202-555-0125" class="form-control">
																	</div>
																</div>
																<div class="col-12">
																	<h5 class="form-title"><span>Address</span></h5>
																</div>
																<div class="col-12">
																	<div class="form-group">
																		<label>Address</label>
																		<input type="text" class="form-control" value="4663 Agriculture Lane">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>City</label>
																		<input type="text" class="form-control" value="Miami">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>State</label>
																		<input type="text" class="form-control" value="Florida">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>Zip Code</label>
																		<input type="text" class="form-control" value="22434">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>Country</label>
																		<input type="text" class="form-control" value="United States">
																	</div>
																</div>
															</div>
															<button type="submit" class="btn btn-primary w-100">Save Changes</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- /Edit Details Modal -->

									</div>


								</div>
								<!-- /Personal Details -->

							</div>
							<!-- /Personal Details Tab -->

							<!-- Change Password Tab -->
							<div id="password_tab" class="tab-pane fade">

								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Documents</h5>
										<div class="row">
											<div class="col-md-10 col-lg-6">
												<form>
													<div class="form-group" style="margin-bottom:40px; ">
														<label>Aadhar Card</label><br>
														<img alt="User Image" src="/uploads/assistant/<?php echo $get_assistant->aadhar_card; ?> " height="200px;" width="300px;" style="margin-left:150px;">

													</div>
													<div class="form-group" style="margin-bottom:40px;">
														<label>Pan Card</label><br>
														<img alt="User Image" src="/uploads/assistant/<?php echo $get_assistant->pan_card; ?> " height="200px;" width="
															300px;" style="margin-left:150px;">

													</div>
													<div class="form-group" style="margin-bottom:40px;">
														<label>Cancelled Cheque</label><br>
														<img alt="User Image" src="/uploads/assistant/<?php echo $get_assistant->cancelled_cheque; ?> " height="200px;" width="300px;" style="margin-left:150px;">

													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Change Password Tab -->



							<!-- Change Edit Profile Tab -->
							<div id="edit_profile" class="tab-pane fade">

								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Documents</h5>
										<div class="row">
											<div class="col-md-10 col-lg-6">
												@foreach($assistant as $assist)

												<form action="/assistants/updateAssistant/{{$assist->id}}" method="post" enctype="multipart/form-data">
													@csrf


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
																<input type="hidden" class="form-control" value="{{$assist->id}}" name="fname">
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
																<input type="date" class="form-control" value="{{$assist->dob}}" name="dob">
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
																<input type="email" class="form-control" id="email" value="{{$assist->email}}" name="email">
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Mobile</label>
																<span class="text-warning fst-italic" id="DirectorphoneErrorMessage"></span>
																<input type="text" value="{{$assist->mobile}}" class="form-control" id="mobile" name="mobile">
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
																<label>Zip Code</label>
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
																<input type="file" id="aadhar_card" class="form-control" value="" name="aadhar_card">
																<p id="aadhar_name"></p>
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Pan Card</label> @if($assist->pan_card)
																<a href="/uploads/assistant/{{$assist->pan_card}}" target="_blank"><i class="fa fa-eye"></i></a>
																@endif
																<input type="file" class="form-control" value="" name="pan_card">
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Cancelled Cheque</label>
																@if($assist->cancelled_cheque)
																<a href="/uploads/assistant/{{$assist->cancelled_cheque}}" target="_blank"><i class="fa fa-eye"></i></a>
																@endif
																<input type="file" class="form-control" value="" name="cancelled_cheque">
															</div>
														</div>


													</div>
													<div class="submit-section submit-btn-bottom float-left">
														<button type="submit" class="btn btn-primary submit-btn" id="submit" style="border-radius:8px;margin-bottom:50px;">Update</button>
													</div>
												</form>@endforeach
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Change Password Tab -->
						</div>
					</div>
				</div>
				<!-- akash -->
			</div>
		</div>
	</div>

</div>
<!-- /Page Content -->




@include('inc_assistant/footer')

@include('inc_patient/header')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Settings  </li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">

						<!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
										<img src="/{{$detailsof->image}}" alt="User Image">
										</a>
										<div class="profile-det-info">
										<h3>{{$detailsof->fname}} {{$detailsof->lname}}</h3>
										<div class="patient-details">
													<h5><b>Patient ID :</b> PT00{{$detailsof->id}} </h5>
													<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{$detailsof->address}},{{$detailsof->city}},{{$detailsof->state}}</h5>
												</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
								<nav class="dashboard-menu">
										<ul>
											<li >
												<a href="/patients/dashboard">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li >
												<a href="/patients/dependent">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height:20px;width:20px; fill:#757575;"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448c13.3 0 24-10.7 24-24s-10.7-24-24-24s-24 10.7-24 24s10.7 24 24 24z"/></svg>
													<span> Dependent</span>
												</a>
											</li>
											<li>
												<a href="/patients/all_referrals">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height:20px;width:20px; fill:#757575;"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448c13.3 0 24-10.7 24-24s-10.7-24-24-24s-24 10.7-24 24s10.7 24 24 24z"/></svg>
													<span>All Referrals</span>
												</a>
											</li>
											<li class="active">
												<a href="/patients/profile_settings">
													<i class="fas fa-user-cog"></i>
													<span>My Profile</span>
												</a>
											</li>
											<li>
												<a href="/patients/login">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- /Profile Sidebar -->

						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
							<div class="card-body">
						<!-- Create  Patient Profile Form -->
						@foreach($get_patient_detail as $patient )
                        <form action="/patients/updatePatientsbyadmin/{{$patient->id}}" method="post"  enctype="multipart/form-data">
                        @csrf
							<div class="row form-row">
							<div class="col-12 col-md-12">
										<div class="form-group">
											<div class="change-avatar">
												<div class="profile-img">
													<?php if (empty($patient->image)) { ?>
														<img src="/assets/img/patients/patient.jpg"  alt="Patient Image">
													<?php } else { ?>
														<?php
														$string = $patient->image;
														$char = "/";
														if (strpos($string, $char) !== false) {
															$imageURL = $patient->image;
														} else {
															$imageURL = '/' . $patient->image;
														}
														?>
														<img src="/{{$patient->image}}"  alt="Patient Image">
													<?php } ?>
												</div>
												<div class="upload-img mt-3">

													<div class="form-group float-label sub-label">
														<input  type="file"  placeholder="Upload Image"  name="image">
													</div>
													<small class="form-text text-muted">{{$patient->id}} Allowed JPG, GIF or PNG. Max size of 2MB</small>
												</div>
											</div>
										</div>
									</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" value="<?php echo $patient->fname; ?>" placeholder="Enter your first name" name="fname" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" placeholder="Enter your last name" name="lname" value="<?php echo $patient->lname; ?>" required>
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label>Contact Number</label>

										<input type="tel" class="form-control" placeholder="Enter Mobile" name="mobile" value="<?php echo $patient->mobile; ?>" maxlength="10" required>
										<span style="color: red" id="DirectorphoneErrorMessage2"></span>

									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Age</label>

										<input type="text" class="form-control" placeholder="Enter Age" name="age" value="<?php echo $patient->age; ?>">

									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Blood Group</label>
										<select class="form-select form-control" name="blood_group">
											<option <?php if ($patient->blood_group == "A-") {
														echo "selected";
													} ?>>A-</option>
											<option <?php if ($patient->blood_group == "A+") {
														echo "selected";
													} ?>>A+</option>
											<option <?php if ($patient->blood_group == "B-") {
														echo "selected";
													} ?>>B-</option>
											<option <?php if ($patient->blood_group == "B+") {
														echo "selected";
													} ?>>B+</option>
											<option <?php if ($patient->blood_group == "AB-") {
														echo "selected";
													} ?>>AB-</option>
											<option <?php if ($patient->blood_group == "AB+") {
														echo "selected";
													} ?>>AB+</option>
											<option <?php if ($patient->blood_group == "O-") {
														echo "selected";
													} ?>>O-</option>
											<option <?php if ($patient->blood_group == "O+") {
														echo "selected";
													} ?>>O+</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Gender</label>
										<select class="form-select form-control" name="gender">
											<option>Male</option>
											<option>Female</option>
											<option>Transgender</option>

										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Health Problem</label>
										<select class="form-select form-control">
											<option>Common Cold and Flu</option>
											<option>Headache/Migrane</option>
											<option>Bone Weakness</option>
											<option>Physiotherapy</option>
											<option>Heart Problem</option>
											<option>Orthodentist</option>


										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Email ID</label><span class="text-danger fst-italic" id="DirectoremailErrorMessage"></span>
										<input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" value="<?php echo $patient->email; ?>" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Alternate Contact Number</label>
										<span style="color: red" id="DirectorphoneErrorMessage"></span>
										<input type="text" class="form-control " placeholder="Enter Mobile No" name="alt_mobile" id="mobile" value="<?php echo $patient->alt_mobile; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Address</label>
										<input type="text" class="form-control" placeholder="Enter Address" name="address" value="<?php echo $patient->address; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>City</label>
										<input type="text" class="form-control" name="city" placeholder="Enter City" id="city" value="<?php echo $patient->city; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>State</label>
										<input type="text" class="form-control" placeholder="Enter State" name="state" id="state" value="<?php echo $patient->state; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Zip Code</label>
										<input type="text" class="form-control" placeholder="Enter Zip" name="zipcode" id="pincode" value="<?php echo $patient->zipcode; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Country</label>
										<input type="text" class="form-control" value="<?php echo $patient->country; ?>" placeholder="Enter Country" id="country" name="country">
									</div>
								</div>
							</div>
                            <button id="submit"  class="btn btn-info">Update</button>
						</form>

						<!-- /Create  Patient Profile Form -->
                   @endforeach
					</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /Page Content -->





			@include('inc_patient/footer')

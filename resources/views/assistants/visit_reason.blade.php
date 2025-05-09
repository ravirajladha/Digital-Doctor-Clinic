<?php require APPROOT.'/views/inc_doctor/header.php';?>

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
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
											<img src="assets/img/patients/patient.jpg" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>Nicolas Flowers</h3>
											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="patient-dashboard.html">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="favourites.html">
													<i class="fas fa-bookmark"></i>
													<span>Favourites</span>
												</a>
											</li>
											<li>
												<a href="chat.html">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													<small class="unread-msg">23</small>
												</a>
											</li>
											<li>
												<a href="profile-settings.html">
													<i class="fas fa-user-cog"></i>
													<span>My Profile</span>
												</a>
											</li>
											<li>
												<a href="change-password.html">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="index.html">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- / Profile Sidebar -->

						<div class="col-md-7 col-lg-8 col-xl-9 visit-reason">
							<div class="visit-progress pb-3">
								<div class="row">
									<div class="col-md-2">
										<span class="progress-text">Jaccopa Piazzi</span>
										<div class="progress">
											<div class="progress-bar bg-success" style="width:100%"></div>
										</div>
									</div>
									<div class="col-md-2">
										<span class="progress-text">Reason for visit</span>
										<div class="progress">
											<div class="progress-bar bg-success" style="width:100%"></div>
										</div>
									</div>
									<div class="col-md-2">
										<span class="progress-text">Interview</span>
										<div class="progress">
											<div class="progress-bar bg-success" style="width:0%"></div>
										</div>
									</div>
									<div class="col-md-2">
										<span class="progress-text">Health Profile</span>
										<div class="progress">
											<div class="progress-bar bg-success" style="width:0%"></div>
										</div>
									</div>
									<div class="col-md-2">
										<span class="progress-text">Pharmacy</span>
										<div class="progress">
											<div class="progress-bar bg-success" style="width:0%"></div>
										</div>
									</div>
									<div class="col-md-2">
										<span class="progress-text">Visit Type</span>
										<div class="progress">
											<div class="progress-bar bg-success" style="width:0%"></div>
										</div>
									</div>
									<div class="col-md-2">
										<span class="progress-text">Payment</span>
										<div class="progress">
											<div class="progress-bar bg-success" style="width:0%"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-body visits pt-0">
									<div class="visit-col pt-3 pb-3">
                          				<span><a href="choose-service.html"><span class="back-left"><i class="fas fa-chevron-left"></i>  </span>Back</a></span>
										<div class="visit-questions">
											<p class="ques">VISIT QUESTIONNAIRE</p>
											<p class="rsn">What is the reason for the visit?</p>
										</div>
										<div class="visit-search">
											<div class="visit-input-wrapper">
												<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for a reason">
												<label class="fa fa-search input-icon"></label>
											</div>
										</div>
                      					<p class="choose-top ps-5 pt-5 pb-2">OR CHOOSE FROM TOP REASONS</p>
										<div class="row" id="myDIV">
											<div class="col-md-6">
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Cold</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
															<span class="visit-rsn">Coronavirus (COVID-19) evaluation</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Nosal Congestion</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Prescription Refill</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Rash</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Acne</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Dermatology Bite</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Asthma</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Cold or canker sore</span>
													</label>
												</div>
											</div>

											<div class="col-md-6">

												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Cough</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Influenza(flu)</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
													<input type="checkbox" class="form-check-input" value="">
													<span class="visit-rsn">Sore Throat</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Allergies</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Acid reflux</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Allergic reaction</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Anxiety</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Back pain</span>
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label visit-btns">
														<input type="checkbox" class="form-check-input" value="">
														<span class="visit-rsn">Coronavirus (COVID-19) evaluation</span>
													</label>
												</div>
											</div>
										</div>
                    				</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->

<?php require APPROOT.'/views/inc_doctor/footer.php';?>

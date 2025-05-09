<?php require APPROOT.'/views/inc_patient/header.php';?>
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
											<img src="<?php echo URLROOT;?>/assets/img/patients/patient.jpg" alt="User Image">
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
													<span>Profile Settings</span>
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
						
						<div class="col-md-7 col-lg-8 col-xl-9 visit-question">
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

							<div class="health pt-0">
                  				<span><a href="visit-question.html"><span class="back-left"><i class="fas fa-chevron-left"></i>  </span>Back</a></span>
								<div class="health-questions">
									<p class="ques">Complete your health profile</p>                    
								</div>                      
								<div class="card">
									<div class="medications pt-3 pb-2 ps-3">
										<p>Are you currently taking any medications?</p>
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="optradio">No
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="optradio">Yes
											</label>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="medications pt-3 pb-2 ps-3">
										<p>Do you have any known drug allergies?</p>
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="optradio">No
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="optradio">Yes
											</label>
										</div>
									</div>
								</div>

								<div class="card">
									<div class="medications pt-3 pb-1 ps-3">
										<p>Do you have any medical conditions?</p>
										<div class="row">
											<div class="col-md-6">
												<div class="form-check">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="">Abnormal Thyroid
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="">Anxiety
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="">Arthritis
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="">Asthma
													</label>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-check">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="">History of fainting
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="">History of falls
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="">History of skin cancer
													</label>
												</div>
												<div class="form-check">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="">History of STD
													</label>
												</div>
											</div>
										</div>
										<p class="add-medical pt-3">+ add medical condition</p>
									</div>
								</div>
								<div>
                  					<a href="find-doctor.html" class="next-btn mb-3">Next</a>
								</div>
							</div>
						</div>
						<div class="health-profile-share">
							<p><i class="fa fa-check share-health-prof" aria-hidden="true"></i>  Share my <a href="#">health summary,</a> previous visits and medication history</p>
						</div>
					</div>
				</div>
			</div>		
			<!-- /Page Content -->
   
			




<?php require APPROOT.'/views/inc_patient/footer.php';?>
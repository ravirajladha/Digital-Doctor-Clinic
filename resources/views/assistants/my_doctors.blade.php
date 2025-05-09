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
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="my-doctors">
								<div class="row">
									<div class="col-md-4">
										<div class="card">
											<div class="card-body">
												<div class="my-doctor-img">
													<img src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" class="img-fluid" alt="User Image">
												</div> 
												<h4 class="doc-name mt-2">Dr. Christopher R <i class="fas fa-check-circle doc-check"></i></h4>
												<p class="doc-speciality">Psycho Spiritual Stress</p>
												<div class="rating mb-3">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">(0)</span>
												</div>
												<div class="row">
													<div class="col-md-6 pe-0">
														<p class="doc-location mb-0">
															<i class="fas fa-map-marker-alt"></i> Sun Valley<br>
															<i class="far fa-money-bill-alt"></i> FREE <i class="fas fa-info-circle doc-info"></i>
														</p>
													</div>
													<div class="col-md-6 ps-0 pe-0">
														<div class="view-my-doc-profile">
															<a class="profile-doc-btn" href="my-doctor-profile.html">
																View Profile
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											<div class="card-body">
												<div class="my-doctor-img">
													<img src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-03.jpg" class="img-fluid" alt="User Image">
												</div> 
												<h4 class="doc-name mt-2">Dr. Dana E <i class="fas fa-check-circle doc-check"></i></h4>
												<p class="doc-speciality">Neuroradiology</p>
												<div class="rating mb-3">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">(0)</span>
												</div>
												<div class="row">
													<div class="col-md-6 pe-0">
														<p class="doc-location mb-0">
														<i class="fas fa-map-marker-alt"></i> Dyer<br>
														<i class="far fa-money-bill-alt"></i> FREE <i class="fas fa-info-circle doc-info"></i>
														</p>
													</div>
													<div class="col-md-6 ps-0 pe-0">
														<div class="view-my-doc-profile">
															<a class="profile-doc-btn" href="my-doctor-profile.html">
																View Profile
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											<div class="card-body">
												<div class="my-doctor-img">
													<img src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-01.jpg" class="img-fluid" alt="User Image">
												</div> 
												<h4 class="doc-name mt-2">Dr. Manual Tapia <i class="fas fa-check-circle doc-check"></i></h4>
												<p class="doc-speciality">Medicine in Neuroradiology</p>
												<div class="rating mb-3">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">(0)</span>
												</div>
												<div class="row">
													<div class="col-md-6 pe-0">
														<p class="doc-location mb-0">
														<i class="fas fa-map-marker-alt"></i> - <br>
														<i class="far fa-money-bill-alt"></i> FREE <i class="fas fa-info-circle doc-info"></i>
														</p>
													</div>
													<div class="col-md-6 ps-0 pe-0">
														<div class="view-my-doc-profile">
															<a class="profile-doc-btn" href="my-doctor-profile.html">
																View Profile
															</a>
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

				</div>

			</div>		
			<!-- /Page Content -->
   





<?php require APPROOT.'/views/inc_patient/footer.php';?>
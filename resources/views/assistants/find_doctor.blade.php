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

							<div class="find-doc pt-0">

								<div class="doc-questions">
									<p class="ques">FIND A DOCTOR</p>     
									<p><span class="available">WHEN YOU ARE AVAILABLE?</span> <input type="text" value="Anytime" class="intake-box"></p> 
									<p>
									<span class="lang">LANGUAGE:</span> <input type="text" value="English" class="intake-box">
									<span class="my-doc">MY DOCTORS:</span>  <i class="fa fa-check" aria-hidden="true"></i>

									</p>               
								</div>                   

								<div class="card find-doctr">
									<div class="card-body">
										<div class="doctor-widget">
											<div class="doc-info-left">
												<div class="doctor-img">
													<img src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" class="img-fluid" alt="User Image">
												</div>
												<div class="doc-info-cont">
													<h4 class="doc-name">Dr. Mary Nielson</h4>
													<p class="doc-speciality">D.N.B. (Psychiatry)</p>
													<p class="doc-department"><img src="<?php echo URLROOT;?>/assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">Medicine in Neuroradiology</p>
													<div class="rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
														<span class="d-inline-block average-rating">(35)</span>
													</div>
													<div class="clinic-details">
														<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a href="javascript:void(0);">Get Directions</a></p>
														<p class="avail-slots">First available slots (today):</p>
													</div>
													<div class="clinic-services">													
														<span>02:10PM - 02:15PM</span>
														<span>02:15PM - 02:20PM</span>
													</div>
												</div>
											</div>
											<div class="doc-info-right">                          
												<div class="clinic-booking">
													<a class="view-prof" href="doctor-profile.html">VIEW PROFILE</a>
													<a class="full-calender" href="booking.html">FULL CALENDER</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="card find-doctr">
									<div class="card-body">
										<div class="doctor-widget">
											<div class="doc-info-left">
												<div class="doctor-img">
													<img src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" class="img-fluid" alt="User Image">
												</div>
												<div class="doc-info-cont">
													<h4 class="doc-name">Dr. Mary Nielson</h4>
													<p class="doc-speciality">D.N.B. (Psychiatry)</p>
													<p class="doc-department"><img src="<?php echo URLROOT;?>/assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">Medicine in Neuroradiology</p>
													<div class="rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
														<span class="d-inline-block average-rating">(35)</span>
													</div>
													<div class="clinic-details">
														<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a href="javascript:void(0);">Get Directions</a></p>
														<p class="avail-slots">First available slots (today):</p>
													</div>
													<div class="clinic-services">                              
														<span>02:10PM - 02:15PM</span>
														<span>02:15PM - 02:20PM</span>
													</div>
												</div>
											</div>
											<div class="doc-info-right">                          
												<div class="clinic-booking">
													<a class="view-prof" href="doctor-profile.html">VIEW PROFILE</a>
													<a class="full-calender" href="booking.html">FULL CALENDER</a>
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
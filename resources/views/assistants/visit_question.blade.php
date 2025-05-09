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
							<div class="row justify-content-center">
								<div class="questionn col-lg-9 pt-0">
									<div class="visit-col pt-3 pb-3">                      
										<div class="visit-questions">
											<p class="ques">VISIT QUESTIONNAIRE</p>                            
										</div>  
										<div class="photo pt-3 pb-2">
											<p class="photo-help">A Photo may be helpful for a treatment.</p>
											<p>You can upload a photo or document if you believe it will help the provider understand your problem better.</p>
										</div>
										<div class="row">                        
											<div class="col-md-6 uploads pt-3 pb-3">
												<div class="upload-img">
													<div class="change-photo-btn">
														<span> UPLOAD FROM A PHONE</span>
														<input type="file" class="upload">
													</div>														
												</div> 
												<p class="mt-4">We will send a text message with instructions on how to upload photos</p>                  
											</div>
											<div class="col-md-6 uploads pt-3 pb-3">
												<div class="change-photo-btn">
													<span> UPLOAD FROM THIS DEVICE</span>
													<input type="file" class="upload">
												</div>
											<p class="mt-4">Already have the photos ready? Upload them right now from here</p>                      
											</div>  
										</div>
										<hr>
										<div class="row">                        
											<div class="col-md-2">
												<span class="ques-icon"><i class="fa fa-question mt-3 mb-4" aria-hidden="true"></i></span>                  
											</div>
											<div class="col-md-10">                          
												<p class="need-photo">Why do I need to upload a photo?</p> 
												<p>Photos can be very useful for problems related to your Skin, Eye, Throat, or any issue that shows a change in color or swelling. A photo of your prescription bottle also helps if you need a refill.</p>                     
											</div>
										</div>
										<div class="row pb-3">                        
											<div class="col-md-6">
												<a href="visit-reason.html" class="bck-btn mt-5 mb-5">BACK</a>                    
											</div>
											<div class="col-md-6">
												<a href="health-profile.html" class="continue-btn mt-5 mb-5">CONTINUE</a>                                                
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
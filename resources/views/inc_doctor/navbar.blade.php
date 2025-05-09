

<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

							<!-- ESidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="/{{session('rexkod_digitaldrclinic_profile_photo')}}" alt="{{session('rexkod_digitaldrclinic_doctor_name') ? session('rexkod_digitaldrclinic_doctor_name') : 'Guest'}}">
										</a>
										<div class="profile-det-info">
											<h3></h3>

											<div class="patient-details">
												<h5 class="mb-0">{{session('rexkod_digitaldrclinic_doctor_name') }}</h5>
												<h5 class="mb-0">{{session('rexkod_digitaldrclinic_doctor_email') }}</h5>

											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="{{'doctors/dashboard'== request()->path() ? 'active' : ''}}">
												<a href="/doctors/dashboard">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li class="{{'doctors/my_patients'== request()->path() ? 'active' : ''}}" >
												<a href="/doctors/my_patients">
													<i class="fas fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li>
											<li class="{{'doctors/all_referrals'== request()->path() ? 'active' : ''}}" >
												<a href="/doctors/all_referrals">
													<i class="fas fa-user-injured"></i>
													<span>All Referrals</span>
												</a>
											</li>
											<li>
											</li>

											<li class="{{'doctors/test'== request()->path() ? 'active' : ''}}">
								                <a href="/doctors/test">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="height:20px;width:20px; fill:#757575;"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M175 389.4c-9.8 16-15 34.3-15 53.1c-10 3.5-20.8 5.5-32 5.5c-53 0-96-43-96-96V64C14.3 64 0 49.7 0 32S14.3 0 32 0H96h64 64c17.7 0 32 14.3 32 32s-14.3 32-32 32V309.9l-49 79.6zM96 64v96h64V64H96zM352 0H480h32c17.7 0 32 14.3 32 32s-14.3 32-32 32V214.9L629.7 406.2c6.7 10.9 10.3 23.5 10.3 36.4c0 38.3-31.1 69.4-69.4 69.4H261.4c-38.3 0-69.4-31.1-69.4-69.4c0-12.8 3.6-25.4 10.3-36.4L320 214.9V64c-17.7 0-32-14.3-32-32s14.3-32 32-32h32zm32 64V224c0 5.9-1.6 11.7-4.7 16.8L330.5 320h171l-48.8-79.2c-3.1-5-4.7-10.8-4.7-16.8V64H384z"/></svg>
													<span>Tests</span>
												</a>
											</li>

											<li class="{{'doctors/medicines'== request()->path() ? 'active' : ''}}">
												<a href="/doctors/medicines ">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="height:20px;width:20px; fill:#757575;"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 144c0-26.5 21.5-48 48-48s48 21.5 48 48V256H64V144zM0 144V368c0 61.9 50.1 112 112 112s112-50.1 112-112V189.6c1.8 19.1 8.2 38 19.8 54.8L372.3 431.7c35.5 51.7 105.3 64.3 156 28.1s63-107.5 27.5-159.2L427.3 113.3C391.8 61.5 321.9 49 271.3 85.2c-28 20-44.3 50.8-47.3 83V144c0-61.9-50.1-112-112-112S0 82.1 0 144zm296.6 64.2c-16-23.3-10-55.3 11.9-71c21.2-15.1 50.5-10.3 66 12.2l67 97.6L361.6 303l-65-94.8zM491 407.7c-.8 .6-1.6 1.1-2.4 1.6l4-2.8c-.5 .4-1 .8-1.6 1.2z"/></svg>
													<span>Medicines</span>
												</a>
											</li>
											<li>
											</li>
											<li class="{{'doctors/schedule_timings'== request()->path() ? 'active' : ''}}">
												<a href="/doctors/schedule_timings">
													<i class="fas fa-user-cog"></i>
													<span>Schedule Timings </span>
												</a>
											</li>
											<li class="{{'doctors/doctor_profile_settings'== request()->path() ? 'active' : ''}}">
												<a href="/doctors/doctor_profile_settings">
													<i class="fas fa-user-cog"></i>
													<span>My Profile </span>
												</a>
											</li>
											<li>
											</li>
											<li class="{{'doctors/change_password'== request()->path() ? 'active' : ''}}">
												<a href="/doctors/change_password">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="/doctors/logout">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->

						</div>

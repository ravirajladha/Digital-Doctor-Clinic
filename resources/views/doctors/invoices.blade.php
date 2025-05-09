@include('/inc_doctor/header')


			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/doctors/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoices</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Invoices</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>Dr. Mary Nielson</h3>

											<div class="patient-details">
												<h5 class="mb-0">D.N.B. (Psychiatry)</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="/doctors/dashboard">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="/doctors/my_patients">
													<i class="fas fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li>
											<li>
											</li>
											<li class="active">
												<a href="/doctors/invoices">
													<i class="fas fa-file-invoice"></i>
													<span>Invoices</span>
												</a>
											</li>
											<li>
												<a href="/doctors/reviews">
													<i class="fas fa-star"></i>
													<span>Reviews</span>
												</a>
											</li>
											<li>
											</li>
											<li>
												<a href="/doctors/add_test">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="height:20px;width:20px; fill:#757575;"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M175 389.4c-9.8 16-15 34.3-15 53.1c-10 3.5-20.8 5.5-32 5.5c-53 0-96-43-96-96V64C14.3 64 0 49.7 0 32S14.3 0 32 0H96h64 64c17.7 0 32 14.3 32 32s-14.3 32-32 32V309.9l-49 79.6zM96 64v96h64V64H96zM352 0H480h32c17.7 0 32 14.3 32 32s-14.3 32-32 32V214.9L629.7 406.2c6.7 10.9 10.3 23.5 10.3 36.4c0 38.3-31.1 69.4-69.4 69.4H261.4c-38.3 0-69.4-31.1-69.4-69.4c0-12.8 3.6-25.4 10.3-36.4L320 214.9V64c-17.7 0-32-14.3-32-32s14.3-32 32-32h32zm32 64V224c0 5.9-1.6 11.7-4.7 16.8L330.5 320h171l-48.8-79.2c-3.1-5-4.7-10.8-4.7-16.8V64H384z"/></svg>
													<span>Tests</span>
												</a>
											</li>

											<li>
												<a href="/doctors/add_medicines ">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="height:20px;width:20px; fill:#757575;"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 144c0-26.5 21.5-48 48-48s48 21.5 48 48V256H64V144zM0 144V368c0 61.9 50.1 112 112 112s112-50.1 112-112V189.6c1.8 19.1 8.2 38 19.8 54.8L372.3 431.7c35.5 51.7 105.3 64.3 156 28.1s63-107.5 27.5-159.2L427.3 113.3C391.8 61.5 321.9 49 271.3 85.2c-28 20-44.3 50.8-47.3 83V144c0-61.9-50.1-112-112-112S0 82.1 0 144zm296.6 64.2c-16-23.3-10-55.3 11.9-71c21.2-15.1 50.5-10.3 66 12.2l67 97.6L361.6 303l-65-94.8zM491 407.7c-.8 .6-1.6 1.1-2.4 1.6l4-2.8c-.5 .4-1 .8-1.6 1.2z"/></svg>
													<span>Medicines</span>
												</a>
											</li>
											<li>
												<a href="/doctors/doctor_profile_settings">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
											</li>
											<li>
												<a href="/doctors/change_password">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="/doctors/login">
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
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card card-table">
								<div class="card-body">

									<!-- Invoice Table -->
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Invoice No</th>
													<th>Patient</th>
													<th>Amount</th>
													<th>Paid On</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0010</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient.jpg" alt="User Image">
															</a>
															<a href="#">Nicolas Flowers <span>#PT0016</span></a>
														</h2>
													</td>
													<td>	&#8377;450</td>
													<td>14 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0009</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient1.jpg" alt="User Image">
															</a>
															<a href="#">Julio Hart <span>#PT0001</span></a>
														</h2>
													</td>
													<td>	&#8377;200</td>
													<td>13 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0008</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient2.jpg" alt="User Image">
															</a>
															<a href="#">Kimberly Klingler <span>#PT0002</span></a>
														</h2>
													</td>
													<td>	&#8377;100</td>
													<td>12 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0007</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient3.jpg" alt="User Image">
															</a>
															<a href="#">Robert Menard <span>#PT0003</span></a>
														</h2>
													</td>
													<td>	&#8377;350</td>
													<td>11 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0006</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient4.jpg" alt="User Image">
															</a>
															<a href="#">Eric Parks <span>#PT0004</span></a>
														</h2>
													</td>
													<td>	&#8377;275</td>
													<td>10 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0005</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient5.jpg" alt="User Image">
															</a>
															<a href="#">Ashley King <span>#PT0005</span></a>
														</h2>
													</td>
													<td>	&#8377;600</td>
													<td>9 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0004</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient6.jpg" alt="User Image">
															</a>
															<a href="#">Mark John <span>#PT0006</span></a>
														</h2>
													</td>
													<td>	&#8377;50</td>
													<td>8 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0003</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient7.jpg" alt="User Image">
															</a>
															<a href="#">Danny Grizzle <span>#PT0007</span></a>
														</h2>
													</td>
													<td>	&#8377;400</td>
													<td>7 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0002</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient8.jpg" alt="User Image">
															</a>
															<a href="#">Erica Anderson <span>#PT0008</span></a>
														</h2>
													</td>
													<td>	&#8377;550</td>
													<td>6 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="/doctors/invoice_view">#INV-0001</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm me-2">
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient9.jpg" alt="User Image">
															</a>
															<a href="#">James Madrid <span>#PT0009</span></a>
														</h2>
													</td>
													<td>	&#8377;100</td>
													<td>5 Nov 2020</td>
													<td class="text-end">
														<div class="table-action">
															<a href="/doctors/invoice_view" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- /Invoice Table -->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
@include('inc_doctor/footer')

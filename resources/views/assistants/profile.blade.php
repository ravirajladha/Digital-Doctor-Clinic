<?php require APPROOT.'/views/inc_assistant/header.php';?>

	<!-- Breadcrumb -->
    <div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">
						
							<!-- Profile Widget -->
							<div class="card widget-profile pat-widget-profile">
								<div class="card-body">
									<div class="pro-widget-content">
										<div class="profile-info-widget">
											<a href="#" class="booking-doc-img">
												<img src="<?php echo URLROOT;?>/assets/img/patients/patient.jpg" alt="User Image">
											</a>
											<div class="profile-det-info">
												<h3>Nicolas Flowers</h3>
												
												<div class="patient-details">
													<h5><b>Patient ID :</b> PT0016</h5>
													<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
												</div>
											</div>
										</div>
									</div>
									<div class="patient-info">
										<ul>
											<li>Phone <span>+1 952 001 8563</span></li>
											<li>Age <span>38 Years, Male</span></li>
											<li>Blood Group <span>AB+</span></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /Profile Widget -->
							
							<!-- Last Booking -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Last Booking</h4>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<div class="media align-items-center d-flex">
											<div class="me-3 flex-shrink-0">
												<img alt="Image placeholder" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" class="avatar  rounded-circle">
											</div>
											<div class="media-body flex-grow-1">
												<h5 class="d-block mb-0">Dr. Mary Nielson </h5>
												<span class="d-block text-sm text-muted">Medicine in Neuroradiology</span>
												<span class="d-block text-sm text-muted">14 Nov 2020 5.00 PM</span>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="media align-items-center d-flex">
											<div class="me-3 flex-shrink-0">
												<img alt="Image placeholder" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" class="avatar  rounded-circle">
											</div>
											<div class="media-body flex-grow-1">
												<h5 class="d-block mb-0">Dr. Mary Nielson </h5>
												<span class="d-block text-sm text-muted">Medicine in Neuroradiology</span>
												<span class="d-block text-sm text-muted">12 Nov 2020 11.00 AM</span>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<!-- /Last Booking -->
							
						</div>

						<div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
							<div class="card">
								<div class="card-body pt-0">
									<div class="user-tabs">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pres" data-bs-toggle="tab"><span>Prescription</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#medical" data-bs-toggle="tab"><span class="med-records">Medical Records</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#billing" data-bs-toggle="tab"><span>Billing</span></a>
											</li> 
										</ul>
									</div>
									<div class="tab-content">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Follow Up</th>
																	<th>Status</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>14 Nov 2020 <span class="d-block text-info">10.00 AM</span></td>
																	<td>12 Nov 2020</td>
																	<td>	&#8377;160</td>
																	<td>16 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-success-light">Confirm</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																				<i class="far fa-edit"></i> Edit
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>12 Nov 2020 <span class="d-block text-info">8.00 PM</span></td>
																	<td>12 Nov 2020</td>
																	<td>	&#8377;250</td>
																	<td>14 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-success-light">Confirm</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																				<i class="far fa-edit"></i> Edit
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>11 Nov 2020 <span class="d-block text-info">11.00 AM</span></td>
																	<td>10 Nov 2020</td>
																	<td>	&#8377;400</td>
																	<td>13 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-danger-light">Cancelled</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																				<i class="far fa-edit"></i> Edit
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>10 Nov 2020 <span class="d-block text-info">3.00 PM</span></td>
																	<td>10 Nov 2020</td>
																	<td>	&#8377;350</td>
																	<td>12 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-warning-light">Pending</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="edit-prescription.html" class="btn btn-sm bg-success-light">
																				<i class="far fa-edit"></i> Edit
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																				<i class="far fa-trash-alt"></i> Cancel
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>9 Nov 2020 <span class="d-block text-info">7.00 PM</span></td>
																	<td>8 Nov 2020</td>
																	<td>	&#8377;75</td>
																	<td>11 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-success-light">Confirm</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																				<i class="far fa-edit"></i> Edit
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>8 Nov 2020 <span class="d-block text-info">9.00 AM</span></td>
																	<td>6 Nov 2020</td>
																	<td>	&#8377;175</td>
																	<td>10 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-danger-light">Cancelled</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																				<i class="far fa-edit"></i> Edit
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>8 Nov 2020 <span class="d-block text-info">6.00 PM</span></td>
																	<td>6 Nov 2020</td>
																	<td>	&#8377;450</td>
																	<td>10 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-success-light">Confirm</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																				<i class="far fa-edit"></i> Edit
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>7 Nov 2020 <span class="d-block text-info">9.00 PM</span></td>
																	<td>7 Nov 2020</td>
																	<td>	&#8377;275</td>
																	<td>9 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-info-light">Completed</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="far fa-clock"></i> Reschedule
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>6 Nov 2020 <span class="d-block text-info">8.00 PM</span></td>
																	<td>4 Nov 2020</td>
																	<td>	&#8377;600</td>
																	<td>8 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-info-light">Completed</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="far fa-clock"></i> Reschedule
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>5 Nov 2020 <span class="d-block text-info">5.00 PM</span></td>
																	<td>1 Nov 2020</td>
																	<td>	&#8377;100</td>
																	<td>7 Nov 2020</td>
																	<td><span class="badge rounded-pill bg-info-light">Completed</span></td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="far fa-clock"></i> Reschedule
																			</a>
																		</div>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										<div class="tab-pane fade" id="pres">
											<div class="text-end">
												<a href="add-prescription.html" class="add-new-btn">Add Prescription</a>
											</div>
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Date </th>
																	<th>Name</th>									
																	<th>Created by </th>
																	<th></th>
																</tr>     
															</thead>
															<tbody>
																<tr>
																	<td>14 Nov 2020</td>
																	<td>Prescription 1</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-01.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. John Moffett <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>13 Nov 2020</td>
																	<td>Prescription 2</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Medicine in Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="edit-prescription.html" class="btn btn-sm bg-success-light">
																				<i class="fas fa-edit"></i> Edit
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																				<i class="far fa-trash-alt"></i> Delete
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>12 Nov 2020</td>
																	<td>Prescription 3</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-03.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Donald Kahn <span>Physical stress</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>11 Nov 2020</td>
																	<td>Prescription 4</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-04.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Brady Chambliss <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>10 Nov 2020</td>
																	<td>Prescription 5</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-05.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Marvin Campbell <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>9 Nov 2020</td>
																	<td>Prescription 6</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-06.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Eric Pruett <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>8 Nov 2020</td>
																	<td>Prescription 7</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-07.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Byron Boyd <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>7 Nov 2020</td>
																	<td>Prescription 8</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-08.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Paul Richard <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>6 Nov 2020</td>
																	<td>Prescription 9</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-09.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Byron Boyd <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>5 Nov 2020</td>
																	<td>Prescription 10</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-10.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Leonard Withers <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
															</tbody>	
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Prescription Tab -->

										<!-- Medical Records Tab -->
										<div class="tab-pane fade" id="medical">
											<div class="text-end">		
												<a href="#" class="add-new-btn" data-bs-toggle="modal" data-bs-target="#add_medical_records">Add Medical Records</a>
											</div>
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>ID</th>
																	<th>Date </th>
																	<th>Description</th>
																	<th>Attachment</th>
																	<th>Created</th>
																	<th></th>
																</tr>     
															</thead>
															<tbody>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0010</a></td>
																	<td>14 Nov 2020</td>
																	<td>Psycho Spiritual Stress</td>
																	<td><a href="#">Psychiatry-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-01.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. John Moffett <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0009</a></td>
																	<td>13 Nov 2020</td>
																	<td>Teeth Cleaning</td>
																	<td><a href="#">Psychiatry-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="edit-prescription.html" class="btn btn-sm bg-success-light" data-bs-toggle="modal" data-bs-target="#add_medical_records">
																				<i class="fas fa-edit"></i> Edit
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																				<i class="far fa-trash-alt"></i> Delete
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0008</a></td>
																	<td>12 Nov 2020</td>
																	<td>General Checkup</td>
																	<td><a href="#">cardio-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-03.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Donald Kahn <span>Physical stress</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0007</a></td>
																	<td>11 Nov 2020</td>
																	<td>General Test</td>
																	<td><a href="#">general-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-04.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Brady Chambliss <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0006</a></td>
																	<td>10 Nov 2020</td>
																	<td>Eye Test</td>
																	<td><a href="#">eye-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-05.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Marvin Campbell <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0005</a></td>
																	<td>9 Nov 2020</td>
																	<td>Leg Pain</td>
																	<td><a href="#">ortho-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-06.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Eric Pruett <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0004</a></td>
																	<td>8 Nov 2020</td>
																	<td>Head pain</td>
																	<td><a href="#">neuro-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-07.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Byron Boyd <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0003</a></td>
																	<td>7 Nov 2020</td>
																	<td>Skin Alergy</td>
																	<td><a href="#">alergy-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-08.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Paul Richard <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0002</a></td>
																	<td>6 Nov 2020</td>
																	<td>Psychiatry</td>
																	<td><a href="#">Psychiatry-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-09.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Byron Boyd <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><a href="javascript:void(0);">#MR-0001</a></td>
																	<td>5 Nov 2020</td>
																	<td>Psycho Spiritual Stress</td>
																	<td><a href="#">Psychiatry-test.pdf</a></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-10.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Leonard Withers <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
															</tbody>  	
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Medical Records Tab -->
										
										<!-- Billing Tab -->
										<div class="tab-pane" id="billing">
											<div class="text-end">
												<a class="add-new-btn" href="add-billing.html">Add Billing</a>
											</div>
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
													
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Invoice No</th>
																	<th>Doctor</th>
																	<th>Amount</th>
																	<th>Paid On</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0010</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-01.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Oscar Hazard <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;450</td>
																	<td>14 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0009</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Mary Nielson <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;300</td>
																	<td>13 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="edit-billing.html" class="btn btn-sm bg-success-light">
																				<i class="fas fa-edit"></i> Edit
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																				<i class="far fa-trash-alt"></i> Delete
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0008</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-03.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Donald Kahn <span>Physical stress</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;150</td>
																	<td>12 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0007</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-04.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Brady Chambliss <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;50</td>
																	<td>11 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0006</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-05.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Marvin Campbell <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;600</td>
																	<td>10 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0005</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-06.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Eric Pruett <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;200</td>
																	<td>9 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0004</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-07.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Byron Boyd <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;100</td>
																	<td>8 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0003</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-08.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Paul Richard <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;250</td>
																	<td>7 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0002</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-09.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Byron Boyd <span>Psychiatry</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;175</td>
																	<td>6 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a href="invoice-view.html">#INV-0001</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																				<img class="avatar-img rounded-circle" src="<?php echo URLROOT;?>/assets/img/assistants/doctor-thumb-10.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Leonard Withers <span>Neuroradiology</span></a>
																		</h2>
																	</td>
																	<td>	&#8377;550</td>
																	<td>5 Nov 2020</td>
																	<td class="text-end">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- Billing Tab -->
												
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->

<?php require APPROOT.'/views/inc_assistant/footer.php';?>
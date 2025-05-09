@include('inc_assistant/header')



<?php

use App\Models\Assistant;
use App\Models\Auth;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Online_doctor;
use App\Models\Patient;
use App\Models\Referral;

$totalref = Referral::where('assistance_id', session('rexkod_digitaldrclinic_assistant_id'))->count();
$getcount_patient=Patient::where('created_by',session('rexkod_digitaldrclinic_assistant_id'))->get();
$get_consultations = Consultation::where('assistant_id',session('rexkod_digitaldrclinic_assistant_id'))->get();
$get_assistant = Assistant::Where('email',session('rexkod_digitaldrclinic_assistant_email'))->first();
$assistant = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'))->first();
$online_doctor_count = Online_doctor::where('online', '=', '1')->count();

?>
<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			@include('inc_assistant/navbar')
			<div class="col-md-7 col-lg-8 col-xl-9">
				<div class="row">

					<div class="col-md-12">
						<div class="card dash-card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12 col-lg-4">
										<div class="dash-widget dct-border-rht">
											<div class="circle-bar circle-bar1">
												<div class="circle-graph1" data-percent="75">
													<img src="/assets/img/icon-01.png" class="img-fluid" alt="patient">
												</div>
											</div>
											<div class="dash-widget-info">
												<h6>Total Consultation</h6>
												<h3>{{count($get_consultations)}}</h3>
											</div>
										</div>
									</div>

									<div class="col-md-12 col-lg-4">
										<div class="dash-widget dct-border-rht">
											<div class="circle-bar circle-bar2">
												<div class="circle-graph2" data-percent="65">
													<img src="/assets/img/icon-02.png" class="img-fluid" alt="Patient">
												</div>
											</div>
											<div class="dash-widget-info">
												<h6>Today's Referrals</h6>
												<h3>@if($totalref)
													{{$totalref}}
													@else
													 0
													@endif
												</h3>
											</div>
										</div>
									</div>
									<div class="col-md-12 col-lg-4">
										<div class="dash-widget dct-border-rht">
											<div class="circle-bar circle-bar2">
												<div class="circle-graph2" data-percent="65">
													<img src="/assets/img/onlinedoct.webp" class="img-fluid" alt="Patient">
												</div>
											</div>
											<div class="dash-widget-info">
												<h6>Online Doctor</h6>
												<h3>{{$online_doctor_count}}</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h4 class="mb-4">Patient Consultation</h4>
						<div class="appointment-tab">

							<!-- Appointment Tab -->
							<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
								
							</ul>
							<!-- /Appointment Tab -->

							<div class="tab-content">

								<!-- Upcoming Appointment Tab -->
								<div class="tab-pane show active" id="upcoming-appointments">
									<div class="card card-table mb-0">
										<div class="card-body">
											<div class="table-responsive">
												<table id="myTable" class="datatable table table-hover table-center mb-0">

													<thead>
														<tr>
															<th>Id</th>
															<th>Patient Name</th>
															<th>Doctor Name</th>
															<th>Date</th>
															<th>Assistant</th>
														</tr>
													</thead>
													<tbody>
													<?php
                                                               $ccDeatils =Consultation::where('assistant_id',session('rexkod_digitaldrclinic_assistant_id'))->get();
															?>
															@foreach($ccDeatils as $cc)
														 <tr>
														 <td>
																<h2 class="table-avatar">

																	<a href="#">{{$cc->id}}</a>
																</h2>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="#" class="avatar avatar-sm me-2"></a>
																	<?php
                                                                   $pp = Auth::where('id',$cc->patient_id)->first()	;													?>
																	<a href="#">{{$pp->name}}</a>
																</h2>
															</td>
															<td>
																<h2 class="table-avatar">
																<?php
                                                                   $dd = Auth::where('id',$cc->doctor_id)->first()	;													?>
																	<a href="#" class="avatar avatar-sm me-2"></a>
																	<a href="#">{{optional($dd)->name}} </a>
																</h2>
															</td>
															<td>{{$cc->created_at}}</td>
															<td>{{session('rexkod_digitaldrclinic_assistant_name')}}</td>

														 </tr>
														 @endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Upcoming Appointment Tab -->

								<!-- Today Appointment Tab -->
								<div class="tab-pane" id="today-appointments">
									<div class="card card-table mb-0">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover table-center mb-0">
													<thead>
														<tr>
															<th>Patient Name</th>
															<th>Date</th>
															<th>Purpose</th>
															<th>Type</th>
															<th class="text-center">Paid Amount</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient6.jpg" alt="User Image"></a>
																	<a href="#">Mark John <span>#PT0006</span></a>
																</h2>
															</td>
															<td>14 Nov2023 <span class="d-block text-info">6.00 PM</span></td>
															<td>Fever</td>
															<td>Old Patient</td>
															<td class="text-center"> &#8377;300</td>
															<td class="text-end">
																<div class="table-action">
																	<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>

																	<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																		<i class="fas fa-check"></i> Accept
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																		<i class="fas fa-times"></i> Cancel
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient7.jpg" alt="User Image"></a>
																	<a href="#">Danny Grizzle <span>#PT0006</span></a>
																</h2>
															</td>
															<td>14 Nov2023 <span class="d-block text-info">5.00 PM</span></td>
															<td>General</td>
															<td>Old Patient</td>
															<td class="text-center"> &#8377;100</td>
															<td class="text-end">
																<div class="table-action">
																	<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>

																	<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																		<i class="fas fa-check"></i> Accept
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																		<i class="fas fa-times"></i> Cancel
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient8.jpg" alt="User Image"></a>
																	<a href="#">Erica Anderson <span>#PT0007</span></a>
																</h2>
															</td>
															<td>14 Nov2023 <span class="d-block text-info">3.00 PM</span></td>
															<td>General</td>
															<td>New Patient</td>
															<td class="text-center"> &#8377;75</td>
															<td class="text-end">
																<div class="table-action">
																	<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>

																	<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																		<i class="fas fa-check"></i> Accept
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																		<i class="fas fa-times"></i> Cancel
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient9.jpg" alt="User Image"></a>
																	<a href="#">James Madrid <span>#PT0008</span></a>
																</h2>
															</td>
															<td>14 Nov2023 <span class="d-block text-info">1.00 PM</span></td>
															<td>General</td>
															<td>Old Patient</td>
															<td class="text-center"> &#8377;350</td>
															<td class="text-end">
																<div class="table-action">
																	<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>

																	<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																		<i class="fas fa-check"></i> Accept
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																		<i class="fas fa-times"></i> Cancel
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient10.jpg" alt="User Image"></a>
																	<a href="#">Lester Wise <span>#PT0010</span></a>
																</h2>
															</td>
															<td>14 Nov2023 <span class="d-block text-info">10.00 AM</span></td>
															<td>General</td>
															<td>New Patient</td>
															<td class="text-center"> &#8377;175</td>
															<td class="text-end">
																<div class="table-action">
																	<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>

																	<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																		<i class="fas fa-check"></i> Accept
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																		<i class="fas fa-times"></i> Cancel
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient11.jpg" alt="User Image"></a>
																	<a href="#">Leonard Withers <span>#PT0011</span></a>
																</h2>
															</td>
															<td>14 Nov2023 <span class="d-block text-info">11.00 AM</span></td>
															<td>General</td>
															<td>New Patient</td>
															<td class="text-center"> &#8377;450</td>
															<td class="text-end">
																<div class="table-action">
																	<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>

																	<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																		<i class="fas fa-check"></i> Accept
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																		<i class="fas fa-times"></i> Cancel
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
								<!-- /Today Appointment Tab -->

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>
<!-- /Page Content -->

@include('inc_assistant/footer')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

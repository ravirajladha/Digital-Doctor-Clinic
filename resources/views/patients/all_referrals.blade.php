@include('inc_patient/header')
<!-- Breadcrumb -->
<?php

use App\Http\Controllers\Doctors;
use App\Models\Assistant;
use App\Models\Auth;
use App\Models\Clinics;
use App\Models\Patient;

	$detailsof = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->first();

	?>
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/patients/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Referrals</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">All Referrals</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						@include('inc_patient/navbar')
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient  Referrals</h4>
									<div class="appointment-tab">
									
										
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
													<div class="table-responsive">
						                                 <table id="myTable" class="datatable table table-hover table-center mb-0">
																<thead>
																	<tr>
																	
																	    <th>From Doctor</th>
																		<th>To Doctor</th>
																		<th>Clinic/Hospital</th>
																		<th>Referral Reason</th>
																		<th>Instructions</th>
																		<th>Date</th>
																		<th>Assistant</th>
																	
																	</tr>
																</thead>
																<tbody>
																	@foreach($referalby as  $ref)
																	<tr>

																	
																		<td>
																			<h2 class="table-avatar">
																				<?php
																				  $doctorreferral_by_doctor_id=Auth::where('id',$ref->referral_by_doctor_id)->first();
																				?>
																				<a href="#">{{ $doctorreferral_by_doctor_id->name}} <span> {{ $doctorreferral_by_doctor_id->id}}</span></a>
																			</h2>
																		</td>
																		<td>
																			<h2 class="table-avatar">
																				<?php

																						$referral_to_doctor_id=Auth::where('id',$ref->referral_to_doctor_id)->first();

																				?>
																				<a href="#">{{optional($referral_to_doctor_id)->name}} <span>{{optional($referral_to_doctor_id)->id}}</span></a>
																			</h2>
																		</td>
																		<td>
																			<h2 class="table-avatar">
																						<?php
																						$clink=Clinics::find($ref->hosipital_id);
																						?>
                         
						                                                    <a href="#">{{optional($clink)->name}} </a>
																			</h2>
																		</td>
																		<td>
																			<h2>{{optional($ref)->Rreferrals_reason}}</h2>
																		</td>
																		<td>
																			<h2>{{optional($ref)->Instructions}}</h2>
																		</td>
																		<td>
																			<h2>{{optional($ref)->referrals_date}}</h2>
																		</td>
																		<?php
                                                                            $assist=Auth::find($ref->assistance_id);
																		?>
																		<td>
																			<h2>{{optional($assist)->name}}</h2>
																		</td>
																		
																	</tr>
																	@endforeach
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
		
			@include('inc_patient/footer') 
			<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
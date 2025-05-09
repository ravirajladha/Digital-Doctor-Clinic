@include('inc_subadmins/header')

<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left: 240px">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Consultation</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Consultation</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-md-12">

				<!-- Recent Orders -->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
						<table id="myTable" class="datatable table table-hover table-center mb-0">

								<thead>
									<tr>
										<th>Doctor Name </th>
										<th>Patient Number</th>
										<th>Consultation Time</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php

									use App\Models\Auth;
									use App\Models\Doctor;
									use App\Models\Patient;
                                     if($get_consultations_data){
									  foreach ($get_consultations_data as $item) {
										if ($item->status == 1 || $item->status == null || $item->status == 0) {
											$get_doctor = Auth::where('id', $item->doctor_id)->first();

											$get_patient_id = Auth::where('id', $item->patient_id)->first();
									     ?>
											<tr>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm me-2">
															<?php if (empty($get_doctor->photo)) { ?>
																<img class="avatar-img rounded-circle" src="/assets/img/patients/patient.jpg" alt="User Image">
															<?php } else { ?>
																<img class="avatar-img rounded-circle" src="/<?php echo $get_doctor->photo; ?>" alt="User Image">
															<?php } ?>
														</a>
														<a href="#">Dr. <?php echo ucwords(optional($get_doctor)->name); ?></a>
													</h2>
												</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm me-2">

														</a>
														<a href="#"><?php echo  $get_patient_id->phone
														// $get_patient->fname ?? null . " " . $get_patient->lname ?? null ?>
														 </a>
													</h2>
												</td>
												<td><?php echo date('M jS Y', strtotime($item->updated_at)); ?> <span class="text-primary d-block"><?php echo date('h.i.s A', strtotime($item->updated_at));?> - <?php echo date('h.i.s A', strtotime($item->end_call));?></span></td>
												<td>
													<div class="status-toggle">
														<input type="checkbox" id="status_10" class="check" checked>
														<label for="status_10" class="checktoggle">checkbox</label>
													</div>
												</td>

											</tr>
										<?php } ?>
									<?php } }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /Recent Orders -->

			</div>
		</div>
	</div>
</div>
<!-- /Page Wrapper -->

@include('inc_subadmins/footer')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
$('#myTable').DataTable();
});
</script>

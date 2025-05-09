@include('inc_admins/header')


			<!-- Page Wrapper -->
            <div class="page-wrapper" style="margin-left: 240px">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Transaction</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Transaction</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
									<table id="myTable" class="datatable table table-hover table-center mb-0">

											<thead>
												<tr>
													<th>Invoice Number</th>
													<th>Assistant Name</th>
													<th>Patient ID</th>

													<th>Patient Name</th>
													<th>Total Amount</th>
													<th class="text-center">Status</th>
													<th class="text-end">Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php
												use App\Models\Assistant;
												use App\Models\Auth;
												use App\Models\Patient;

												?>
												@foreach($invoices as $invoice)
												<?php
													$assistant = Auth::where('id', $invoice->assistant_id)->first();
													$patient = Patient::where('id', $invoice->patient_id)->first();
													$auth = Auth::where('phone', $patient->mobile)->first();
												?>
												<tr>
													<td><a href="/admins/invoice/{{$invoice->id}}">{{$invoice->id}}</a></td>
													<td>{{ $assistant->name}}</td>
													<td>{{$auth->id}}</td>

													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="/assets_admin/img/patients/patient1.jpg" alt="User Image"></a>
															<a href="profile.html">{{$patient->fname}}  {{$patient->lname}}</a>
														</h2>
													</td>
													<td>{{$invoice->total_amount}}</td>
													<td class="text-center">
														<span class="badge rounded-pill bg-success inv-badge">Paid</span>
													</td>
													<td class="text-end">
														<div class="actions">
														<a class="btn btn-sm bg-info-light"  href="/admins/invoice/{{$invoice->id}}">
																<i class="fe fe-eye"></i> View
															</a>
														</div>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Wrapper -->

		<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="button" class="btn btn-primary">Save </button>
								<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->

			@include('inc_admins/footer')
			<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
$('#myTable').DataTable();
});
</script>

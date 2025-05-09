@include('inc_subadmins/header')


	<!-- Page Wrapper -->

		<div class="page-wrapper" style="margin-left: 240px">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">List of Representatives Request</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
								<li class="breadcrumb-item active">Contact Request</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="myTable" class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Serial No.</th>
													<th>Created Date</th>
													<th>Name</th>
													<th>Mobile Number</th>
													<th>Email</th>
													<th>Occupation</th>
													<th>View</th>
													<th>Edit</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($get_ngo_data as $index => $contact)
													<tr>
													     <td>{{ $index+1 }}</td>
														<td>{{ $contact->datetime }}</td>
														<td>{{ $contact->name }}</td>
														<td>{{ $contact->mobile_number }}</td>
														<td>{{ $contact->email }}</td>
														<td>{{$contact->occupation}}</td>
														<td>
															<a class="btn btn-info" href="{{ url('/sub_admins/representativesview/' . $contact->id) }}">View</a>
														</td>
														<td>
															<a class="btn btn-warning" href="{{ url('/sub_admins/representativesedit/' . $contact->id) }}">Edit</a>
														</td>
														<td>
															<?php $status = optional($contact)->status;
																if ($status == 1):
																?>
																	<a href="/sub_admins/representative_approval/<?php echo $contact->id; ?>/2" class="btn btn-rounded btn-danger">Reject</a>
																<?php else: ?>
																	<a href="/sub_admins/representative_approval/<?php echo $contact->id; ?>/1" class="btn btn-rounded btn-success">Accept</a>
																<?php endif; ?><br>
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
		</div>


	<!-- /Page Wrapper -->

	@include('inc_subadmins/footer')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
     $(document).ready(function () {
    $('#myTable').DataTable({
        "order": [[0, "desc"]] // Assuming "id" is the first column (index 0)
    });
});

</script>

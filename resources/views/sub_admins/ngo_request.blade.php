@include('inc_subadmins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left: 240px">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">List of NGO Request</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Contact Request</li>
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
										<th>Serial No.</th>
										<th>Create Date</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>NGO Type</th>
										<th>View</th>
										<th>Edit</th>
										<th>&nbsp; &nbsp; &nbsp; &nbsp; Action</th>

									</tr>
								</thead>
								<tbody>
									<?php

									use App\Models\Auth;
									use App\Models\Ngo_data;

									foreach ($get_ngo_data as $index=> $contact) { ?>
										<tr>
											<td>{{$index+1}}</td>

											<td><?php echo $contact->created_at ?></td>
											<td><?php echo $contact->name ?></td>
											<td><?php echo $contact->email;
												$auth = Auth::where('email', $contact->email)->first();
												if ($auth) {
													$update = Ngo_data::where('email', $auth->email)->first();
													$update->auth_id = $auth->id;
													$update->save();
												}

												?></td>
											<td><?php echo $contact->mobile ?></td>
											<td><?php echo $contact->ngo_type ?></td>
											<td><a class="btn btn-info" href="/sub_admins/ngo_data_view/<?php echo $contact->id; ?>">View</a></td>
											@if($contact->status==1)
											<td><a class="btn btn-warning" href="/sub_admins/ngo_data_edit/<?php echo $contact->id ?>">Edit</a></td>
											@else
											<td>
												<a class="btn btn-warning" href="/sub_admins/ngo_data_edit/<?php echo $contact->id ?>" disabled="disabled" onclick="return false;">Edit</a>
											</td>

											@endif
											<td>
												@if (optional($contact->authNgo)->status == 1)
												<form action="{{ route('sub_admins.ngoApproval', ['id' => $contact->id, 'status' => 0]) }}" method="POST">
													@csrf
													<button type="submit" class="btn btn-rounded btn-danger">Deactivate</button>
												</form>
												@else
												<form action="{{ route('sub_admins.ngoApproval', ['id' => $contact->id, 'status' => 1]) }}" method="POST">
													@csrf
													<button type="submit" class="btn btn-rounded btn-success">Activate</button>
												</form>
												@endif
											</td>
										</tr>
									<?php } ?>
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

@include('inc_subadmins/footer')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable({
			"order": [
				[0, "desc"]
			] // Assuming "id" is the first column (index 0)
		});
	});
</script>

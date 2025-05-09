@include('inc_admins/header')


			<!-- Page Wrapper -->
            <div class="page-wrapper" style="margin-left: 240px">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Patient</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>

									<li class="breadcrumb-item active">Patient</li>
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
										<div class="table-responsive">
										<table id="myTable" class="datatable table table-hover table-center mb-0">

											<thead>
												<tr>
													<th>Patient ID</th>
													<th>Patient Name</th>
													<th>Age</th>
													<th>Blood Group</th>
													<th>Email</th>
													<th>Contact No.</th>
													<th>Created Asst.</th>
													<th>Action</th>

												</tr>
											</thead>
											<tbody>

											<?php

														use App\Models\Auth;

														foreach ($get_patient as $patients) {?>
												<tr>
													<td><?php echo $patients->patient_id?></td>
													<td>
														<h2 class="table-avatar">
															<a href="/admins/patient_profile/{{$patients->id}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="/<?php echo $patients->image?>" alt="" onerror="this.onerror=null; this.src='/assets/img/219983.png';"></a>
															<a href="/admins/patient_profile/{{$patients->id}}"><?php echo $patients->fname. " ".$patients->lname;?> </a>
														</h2>
													</td>
													<td><?php echo $patients->age;?></td>
													<td><?php echo $patients->blood_group;?></td>
													<td><?php echo $patients->email;?></td>
													<td><?php echo $patients->mobile;?></td>
													<?php
														$assistname=Auth::where('id',$patients->created_by)->first();
														?>
													<td><?php echo $assistname->name;?></td>
													<td>
													<div class="actions">
													<a class="btn btn-sm bg-info-light" href="/admins/patient_profile/{{$patients->id}}">
														<i class="fe fe-eye"></i> View
													</a>
												    <a class="btn btn-sm bg-success-light" href="/admins/patient_profile_edit/{{$patients->id}}">
														<i class="fe fe-pencil"></i> Edit
													</a>
												</div>

													</td>

												</tr>
												<?php }?>

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

		@include('inc_admins/footer')
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
    $('#myTable').DataTable({
        "order": [[0, "desc"]] // Assuming "id" is the first column (index 0)
    });
});
</script>

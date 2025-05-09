<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@include('inc_subadmins/header')
</head>

<body>
	<div class="page-wrapper" style="margin-left: 240px">
		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="page-title">List of News Rooms</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">List of News Rooms</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
							<form action="/sub_admins/updateStatus" method="post">
							@csrf
								<div class="table-responsive">

									<table id="myTable" class="datatable table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Serial No.</th>
											   <th>Select </th>
												<th>Created Date</th>

												<th>Image</th>
												<th>Logo</th>

												<th>News title</th>
												<th>News description</th>
												<th>Link</th>
												<th>Delete</th>
												<th>Edit</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($displynewdata as $index=> $request) { ?>
											<tr>
												<td>{{$index+1}}</td>
												<td>
												   <input type="checkbox" name="selectedItems[]" value="<?php echo $request->id; ?>" <?php echo ($request->status == 1) ? 'checked' : ''; ?>>
												</td>
												<td><?php echo $request->created_at ?></td>
												<td>
													<a href="/uploads/newsroom/<?php echo $request->newphoto ?>" target="_blank">View</a>
												</td>
												<td>
													<a href="/uploads/newslogo/<?php echo $request->newslogo ?>" target="_blank">View</a>
												</td>
												<td><?php echo $request->title ?></td>
												<td><?php echo $request->discription ?></td>
												<td><?php echo $request->link ?></td>
												<td><a href="/sub_admins/deleteNewroom/<?php echo $request->id ?>" class="btn btn-danger">Delete</a></td>
												<td><a href="/sub_admins/edit_newsdetails/<?php echo $request->id ?>" class="btn btn-info">Edit</a></td>
											</tr>
										<?php } ?>
									</tbody>

									</table>

								</div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-danger mt-3">Update</button>
                                </div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

@include('inc_subadmins/footer')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });


</script>




</html>

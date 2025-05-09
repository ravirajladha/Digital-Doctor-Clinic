@include('inc_admins/header')
			
			
	<!-- Page Wrapper -->

		<div class="page-wrapper" style="margin-left: 240px">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">List of Representatives Requests</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
								<li class="breadcrumb-item active">Contact Requests</li>
							</ul>
						</div>
					</div>
				</div>
	
				<div class="container py-5">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="myTable" class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Created Date</th>
													<th>Name</th>
													<th>Mobile Number</th>
													<th>Email</th>
													<th>Income</th>
													<th>Village</th>
													<th>Police Station</th>
													<th>District</th>
													<th>Post</th>
													<th>Pincode</th>
													<th>Adhar Card</th>
													<th>Place Image</th>
													<th>Pradhan Verification</th>
													<th>Annual Income</th>
													<th>Occupation</th>
													<th>View</th>
													<th>Edit</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($get_ngo_data as $contact)
													<tr>
														<td>{{ $contact->datetime }}</td>
														<td>{{ $contact->name }}</td>
														<td>{{ $contact->mobile_number }}</td>
														<td>{{ $contact->email }}</td>
														<td>
															@if (!empty($contact->income))
																<a href="{{ url('/representative/'.$contact->income) }}" target="_blank">View</a>
															@endif
														{{-- income certificate --}}
														</td>
														<td>{{ $contact->village }}</td>
														<td>{{ $contact->police_station }}</td>
														<td>{{ $contact->district }}</td>
														<td>{{ $contact->post }}</td>
														<td>{{ $contact->pincode }}</td>
														<td>
															@if (!empty($contact->adhar_card))
																<a href="{{ url('/representative/'.$contact->adhar_card) }}" target="_blank">View</a>
																{{-- aadharcard --}}
															@endif
														</td>
														<td>
															@if (!empty($contact->place_img))
																<a href="{{ url('/representative/'.$contact->place_img) }}" target="_blank">View</a>
																{{-- clininc location --}}
															@endif
														</td>
														<td>
															@if (!empty($contact->pradhan_verification))
																<a href="{{ url('/representative/'.$contact->pradhan_verification) }}" target="_blank">View</a>
																{{-- praadhan verification --}}
															@endif
														</td>
														<td>
															@if (!empty($contact->year_amount))
																<a href="{{ url('/representative/'.$contact->year_amount) }}" target="_blank">View</a>
																{{-- aadharcard --}}
															@endif
														</td>
														<td>{{$contact->occupation}}</td>
														<td>
															<a class="btn btn-info" href="{{ url('admins/Representatives_page_view/' . $contact->id) }}">View</a>
														</td>
														<td>
															<a class="btn btn-warning" href="{{ url('admins/Representatives_page_edit/' . $contact->id) }}">Edit</a>
														</td>
														<td>
															<?php $status = optional($contact->authRepresentative)->status;
																if ($status == 1):
																?>
																	<a href="/admins/representative_approval/<?php echo $contact->id; ?>/0" class="btn btn-rounded btn-danger">Deactivate</a>
																<?php else: ?>
																	<a href="/admins/representative_approval/<?php echo $contact->id; ?>/1" class="btn btn-rounded btn-success">Activate</a>
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
		
	@include('inc_admins/footer')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

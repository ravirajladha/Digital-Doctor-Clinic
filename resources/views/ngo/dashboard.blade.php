@include('inc_ngo/header')
<!-- Breadcrumb -->
<?php

use App\Models\New_clinic_reg;

$representative = New_clinic_reg::where('user_type', session('rexkod_digitaldrclinic_ngo_id'))->get();
$aproverep = New_clinic_reg::where('user_type', session('rexkod_digitaldrclinic_ngo_id'))->where('status', 0)->get();
$aprove = count($aproverep);
$countrep = count($representative);
$remaning =count($aproverep);
$aprovedapplication=New_clinic_reg::where('user_type', session('rexkod_digitaldrclinic_ngo_id'))->where('status', 1)->get();
$countApprove=count($aprovedapplication);
?>
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/hospitals/dashboard">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Dashboard</h2>
			</div>
		</div>
	</div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
	<div class="container-fluid">

		<div class="row">
			@include('inc_ngo/navbar')
			<div class="col-md-7 col-lg-8 col-xl-9">

				<div class="row">
					<div class="container">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 col-lg-3">
									<div class="dash-widget dct-border-rht">
										<div class="circle-bar circle-bar2">
											<div class="circle-graph2" data-percent="65">
												<img src="/assets/img/icon-02.png" class="img-fluid" alt="Patient">
											</div>
										</div>
										<div class="dash-widget-info" style="text-align: center;">
											<div class="circle-graph1" data-percent="75">
											<img src="/{{ session('rexkod_digitaldrclinic_profilepc') }}" class="img-fluid" alt="patient" style="width: 100px; height: 100px;">
											</div>
											<h6>{{ session('rexkod_digitaldrclinic_ngo_name') }}</h6>
											<!-- <h3>{{session('rexkod_digitaldrclinic_ngo_phone') }}</h3> -->

										</div>
									</div>
								</div>
								<div class="col-md-12 col-lg-3">
									<div class="dash-widget dct-border-rht">
										<div class="circle-bar circle-bar1">

										</div>
										<div class="dash-widget-info">
											<div class="circle-graph1" data-percent="75">
												<img src="/assets/img/application.gif" class="img-fluid" alt="patient" style="width: 100px; height: 100px;">
											</div>
											<h6>Total Application</h6>
											<h3 style="text-align: center;">{{$countrep}}</h3>
										</div>
									</div>
								</div>



								<div class="col-md-12 col-lg-3">
									<div class="dash-widget">
										<div class="circle-bar circle-bar3">
											<div class="circle-graph3" data-percent="50">
												<img src="/assets/img/icon-03.png" class="img-fluid" alt="Patient">
											</div>
										</div>
										<div class="dash-widget-info">
											<div class="circle-graph1" data-percent="75">
												<img src="/assets/img/wating.gif" class="img-fluid" alt="patient" style="width: 100px; height: 100px;">
												<h6>Application Status</h6>
												<h3 style="text-align: center;" >{{$remaning}}</h3>
												<h5 style="color: green; text-align: center;">Pending</h5>
											</div>


										</div>
									</div>
								</div>
								<div class="col-md-12 col-lg-3">
									<div class="dash-widget dct-border-rht">
										<div class="circle-bar circle-bar1">

										</div>
										<div class="dash-widget-info">
											<div class="circle-graph1" data-percent="75">
												<img src="/assets/img/verified.gif" class="img-fluid" alt="patient" style="width: 100px; height: 100px;">
											</div>
											<h6>Approve Application</h6>
											<h3 style="text-align: center;">{{$countApprove}}</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- akash -->
				<br><br>
				<div class="col-md-12">
					<h4 class="mb-4">Application Status</h4>
					<div class="appointment-tab">

						<!-- Appointment Tab -->
						<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
						
						</ul>
						<!-- /Appointment Tab -->

						<div class="tab-content">

							<!-- Upcoming Appointment Tab -->
							<div class="tab-pane show active" id="upcoming-appointments">
								<div class="">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Name</th>
														<th>Contact Number</th>
														<th>Email</th>
														<th>Village</th>
														<th>Pincode</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													@foreach($representative as $reper)
													<tr>


														<td>
															<h2 class="table-avatar">
																<a href="#">{{$reper->name}} </a>
															</h2>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="#">{{$reper->mobile_number}}</a>
															</h2>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="#">{{$reper->email}} </a>
															</h2>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="#">{{$reper->village}} </a>
															</h2>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="#">{{$reper->pincode}} </a>
															</h2>
														</td>

														<td>
															<h2 class="table-avatar">
																@if($reper->status==1)
																<a href="#" class="btn btn-sm btn-success">Acceped</a>
																@elseif($reper->status=== 2)
																<a href="#" class="btn btn-sm btn-danger">Rejected</a>
																@else
																<a href="#"><img src="/assets/img/wating.gif" alt="" style="width: 30px; height: 30px;"></a>

																@endif
															</h2>
														</td>

													</tr>
													@endforeach

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- /Upcoming Appointment Tab -->



						</div>
					</div>
				</div>
				<!-- end akash -->
			</div>

			<!-- patient -->
			<!-- end patient -->

		</div>
	</div>

</div>

</div>
<!-- /Page Content -->

@include('inc_ngo/footer')

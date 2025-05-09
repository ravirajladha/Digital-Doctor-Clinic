@include('inc_patient/header')


			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Show Prescription</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Show Prescription</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">

						<div class="col-md-12 col-lg-112 col-xl-12">
							<div class="card">
								<div class="card-header">
									<!-- <h4 style="float:right;" class="card-title mb-0"></h4> -->
								<div class="row">
									<div class="col-sm-4">
								<div class="biller-info">
												<h4 class="d-block">{{$invoice->id}}</h4>
												<span class="d-block text-sm text-muted">Medicine in Neuroradiology</span>
												<span class="d-block text-sm text-muted">Newyork, United States</span>
											</div>
											</div>
										<div class="col-sm-4">
											<div class="biller-info">
											</div>
										</div>
										<div class="col-sm-4 text-sm-end">
											<div class="billing-info">
												<h4 class="d-block">{{$digital->name}} </h4>
												<p>{{$digital->phone}}</p>
												<p>{{$digital->email}}</p>
												<p>	<i class="fas fa-map-marker-alt"></i>{{$digital->address}},{{$digital->city}},{{$digital->state}},{{$digital->zipcode}}</p>
											</div>
										</div>

								</div>
								</div>
								<div class="card-body">


									<div class="row">


										<div class="col-sm-6">
											<div class="biller-info">
												<span class="d-block text-sm text-muted"><strong>{{session('rexkod_digitaldrclinic_patients_name')}}</strong></span>
												<span class="d-block text-sm text-muted"><strong>Patient ID:</strong>{{session('rexkod_digitaldrclinic_patient_id')}}</span>
												<span class="d-block text-sm text-muted">
											<strong>Gender:</strong>
											{{ isset($detailsof->gender) ? $detailsof->gender : 'Not specified' }}
										</span>
										<strong>Gender:</strong>
											{{ isset($detailsof->age) ? $detailsof->age : 'Not specified' }}
											<strong>Gender:</strong>
											{{ isset($detailsof->address) ? $detailsof->address : 'Not specified' }}
										</span>											</div>
										</div>

										<div class="col-sm-6 text-sm-end">
											<div class="billing-info">
												<span class="d-block text-sm text-muted"><strong>Prescription No:</strong>#00113</span><br>
												<span class="d-block text-sm text-muted"><strong>Date:</strong>01-02-2023</span>
											</div>
										</div>
									</div>

									<!-- Prescription Item -->
									<div class="card card-table">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover table-center">
												<thead>
													<tr>
														<th style="width: 200px"> Medicine Name</th>
														<th style="width: 100px">Quantity</th>
														<th style="width: 100px">Price</th>
														<th style="width: 100px">Description</th>
													</tr>
												</thead>
												<tbody>
													<tr>
                                                        <?php   $medicines_name = explode(',',$invoice->medicines_name);
														        $price = explode(',',$invoice->amount);
																$quantity =explode(',',$invoice->quantity);
																$description =explode(',',$invoice->description);
																$lab_test =explode(',',$invoice->invoice_test);
																$test_description = explode(',',$invoice->test_description);

														?>


														<td>
														@foreach($medicines_name as $med)

															 <p>{{ $med}}" </p><br>

															@endforeach
                                                        </td>

														<td>

															@foreach($quantity as $qt)

																<h2>{{$qt}}</h2><br>

															@endforeach
														</td>
														<td>
															@foreach($price as $pc)
															<h2 >{{$pc}}</h2><br>
															@endforeach
														</td>
														<td>
															@foreach($description as $descr)
															<span>{{$descr}}</span><br>
															@endforeach
														</td>

													</tr>

												</tbody>
												<thead>
													<tr>
														<th style="width: 200px"> Leb Test</th>
														<th style="width: 200px"> Lab description</th>

													</tr>
													<tr>
														<td>
                                                            @foreach($lab_test as $test)
															   <h3>{{$test}}</h3>
															@endforeach
														</td>
														<td>
                                                            @foreach($test_description as $des)
															   <h3>{{$des}}</h3>
															@endforeach
														</td>
													</tr>
												</thead>
												<thead>
													<tr>
														<th style="width: 200px"> Consultation fee</th>


													</tr>
													<tr>

														<td>

															   <h3>{{$invoice->consultation_fee}}</h3>

														</td>
													</tr>
												</thead>
												</table>
											</div>
										</div>
									</div>
									<div class="card card-table">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover table-center">
													<thead>
														<tr>
															<th style="min-width: 200px">Total Amount</th>


														</tr>
													</thead>
													<tbody>
														<tr>
															<td >
                                                         <h1>{{$invoice->total_amount}}</h1>
																			</td>

														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- /Prescription Item -->



								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->




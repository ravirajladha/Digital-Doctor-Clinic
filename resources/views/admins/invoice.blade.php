@include('inc_admins/header')


			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Invoice Container -->
					<div class="invoice-container">

						<div class="row">
							<div class="col-sm-6 m-b-20">
								<img alt="Logo" class="inv-logo img-fluid" src="/assets_admin/img/logo.png">
							</div>
							<div class="col-sm-6 m-b-20">
								<div class="invoice-details">
									<h3 class="text-uppercase">Invoice : {{ $invoices->id}}</h3>
									<ul class="list-unstyled mb-0">
										<li>Date: <span>{{$invoices->create_date}}</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 m-b-20">
								<ul class="list-unstyled mb-0">
									<li>Digitaldrclinic Hospital</li>
									<li>3864 Quiet Valley Lane,</li>
									<li>Sherman Oaks, CA, 91403</li>
									<li>GST No:</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
								<h6>Invoice to</h6>
								<ul class="list-unstyled mb-0">
									<li><h5 class="mb-0"><strong>{{$pasents->fname}} {{$pasents->lname}}</strong></h5></li>
									<li>{{$pasents->address}}</li>
									<li>{{$pasents->city}}, {{$pasents->state}}, {{$pasents->zipcode}}</li>
									<li>India</li>
									<li>{{$pasents->mobile}}</li>
									<li><a href="#">{{$pasents->email}}</a></li>
								</ul>
							</div>
							<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
								<h6>Payment Details</h6>
								<ul class="list-unstyled invoice-payment-details mb-0">
									<li><h5>Payment Mode: <span class="text-end">{{$invoices->paymnet_mode}}</span></h5></li>
								</ul>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>ITEM</th>
										<th class="d-none d-sm-table-cell">DESCRIPTION</th>
										<th>QTY</th>
										<th class="text-nowrap">UNIT COST</th>
										<th>TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
										<?php $med=explode(',',$invoices->medicines_name) ;  ?>
										@foreach($med as $medicine)

											 <p>{{$medicine}}</p>

										@endforeach
										</td>
										<td class="d-none d-sm-table-cell">
										<?php $description=explode(',',$invoices->description) ;  ?>
										@foreach($description as $descrip)

											 <p>{{$descrip}}</p>

										@endforeach

										</td>

										<td>
										<?php $qty=explode(',',$invoices->quantity ) ;   ?>
										@foreach($qty as $qtys)
									    <p>{{$qtys}}</p>
									  @endforeach
									</td>
										<td><?php $amt=explode(',',$invoices->amount ) ;   ?>
										@foreach($amt as $amount)
									    <p>{{$amount}}</p>
									  @endforeach</td>
										<td>

										</td>
									</tr>

								</tbody>
								<tr>
								    <th> Leb Test</th>
									<th>Test Description</th>

								</tr>
								<tr>
								<td>
									<?php
									  $test=explode(',',$invoices->invoice_test) ;
									?>
									@foreach($test as $ts)
                                      <p>{{$ts}}</p>
									@endforeach
								</td>
								<td><?php
									  $test_description=explode(',',$invoices->test_description) ;
									?>
									@foreach($test_description as $tsd)
                                      <p>{{$tsd}}</p>
									@endforeach</td>
								</tr>


							</table>
						</div>

						<div>
							<div class="row invoice-payment">
								<div class="col-sm-7">
								</div>
								<div class="col-sm-5">
									<div class="m-b-20">
										<h6 class="mt-3">Total due</h6>
										<div class="table-responsive no-border">
											<table class="table mb-0">
												<tbody>
												<tr>
														<th>Consultation Fee</th>


														<td class="text-end">{{$invoices->consultation_fee}}</td>

													<tr>
														<th>Tax: <span class="text-regular">(25%)</span></th>
														<td class="text-end">$50</td>
													</tr>
													<tr>
														<th>Total:</th>
														<td class="text-end text-primary"><h5>{{$invoices->total_amount}}</h5></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="invoice-info">
								<h5>Other information</h5>
								<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
							</div>
						</div>

					</div>
					<!-- /Invoice Container -->

				</div>
			</div>
			<!-- /Page Wrapper -->

			@include('inc_admins/footer')

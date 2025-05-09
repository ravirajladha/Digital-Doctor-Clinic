@include('inc_doctor/header')
<style>
	dropdown-menu:hover {
		background-color: #ff9600;
	}
</style>

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Referrals</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Referrals</h2>
			</div>
		</div>
	</div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
	<form action="/referralsave" method="post">
	@csrf
		<div class="row">
			<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
           <input type="hidden" value="{{$consultation_id}}" name="consultation_id">
				<!-- Profile Widget -->
				<div class="card widget-profile pat-widget-profile">
					<div class="card-body">
						<div class="pro-widget-content">
							 <input type="hidden" value="{{$assistant_id}}" name="assistance_id">
								@foreach($patients as $patient)
								<div class="profile-info-widget">
									<a href="#" class="booking-doc-img">
										<img src="/{{$patient->image}}" alt="User Image">
									</a>
									<div class="profile-det-info">
										<h3><a href="">{{$patient->fname }} {{$patient->lname }}</a></h3>
										<h3><a href="">{{$patient->email }}</a></h3>

										<div class="patient-details">
											<h5><b>Patient ID :</b> {{$patient->id}}</h5>
											<input type="hidden" name="patient_id" value="{{$patient->id}}">
											<input type="hidden" name="referral_by_doctor_id" value="{{session('rexkod_digitaldrclinic_doctor_id')}}">
											<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{$patient->address}} </h5>
										</div>
									</div>
								</div>
								@endforeach
						</div>

						<div class="patient-info">
							<ul>
								<li>Age <span>{{$patient->age}} Years,{{$patient->gender}}</span></li>
								<li>Blood Group <span>{{$patient->blood_group}}</span></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Profile Widget -->

			</div>

			<div class="col-md-7 col-lg-8 col-xl-9">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Referrals</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								@foreach($doctor_details as $doctor)
								<div class="biller-info">
									<h4 class="d-block">{{$doctor->fname}} {{$doctor->lname}}</h4>
									<span class="d-block text-sm text-muted">specialization/department : <br> {{$doctor->specialization}}/{{$doctor->department}}</span>
									<span class="d-block text-sm text-muted">{{$doctor->address_line1}}</span>
								</div>
								@endforeach
							</div>
							<div class="col-sm-6 text-sm-end">
								<div class="billing-info">
									<input type="date" name="referrals_date" class="form-control" required>
								</div>
							</div>
						</div>



						<!-- Prescription Item -->
						<div class="card card-table">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="biller-info">

											<select name="referral_to_doctor_id" id="" class="btn btn-secondary dropdown-toggle  btn-lg" style="background-color: #0e8a8a;width:80%;">
                                             <option value="0">Select Doctor</option>
												@foreach($doctor_all as $ds)
												 @if(session('rexkod_digitaldrclinic_doctor_id')!=$ds->id)
												<option value="{{$ds->id}}">{{$ds->id}}.{{$ds->name}}</option>
												@endif
												@endforeach

											</select>

										</div>
									</div>
									<div class="col-sm-6 text-sm-end">

										<select name="hosipital_id" id="" class="btn btn-secondary dropdown-toggle  btn-lg" style="background-color: #0e8a8a;width:80%;">
										<option value="0">Select Hospital</option>

										@foreach($clinics as $clinic )
											<option value="{{$clinic->id}}">{{$clinic->id}}. {{$clinic->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>


						</div>
					</div>

					<div class="card card-table">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover table-center">
									<thead>
										<tr>
											<th style="min-width: 200px">Referrals Reason</th>


										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<textarea name="Rreferrals_reason" id="" class="form-control" cols="20" rows="5"></textarea>
											</td>

										</tr>
									</tbody>
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
											<th style="min-width: 200px">Instructions</th>


										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<textarea name="Instructions" id="" class="form-control" cols="20" rows="5"></textarea>
											</td>

										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Prescription Item -->

					<!-- Signature -->
					<div class="row">
						<div class="col-md-12 text-end">
							<div class="signature-wrap">
								<div class="signature">
									Click here to sign
								</div>
								<div class="sign-name">
									<p class="mb-0">( {{$doctor->fname}} {{$doctor->lname}} )</p>
									<span class="text-muted">Signature</span>
								</div>
							</div>
						</div>
					</div>
					<!-- /Signature -->

					<!-- Submit Section -->



					<button type="submit" class="btn btn-primary submit-btn">Save</button>
					
				</div>
				<!-- /Submit Section -->

			</div>
		</div>
	</div>
	</form>
</div>


<!-- /Page Content -->

@include('inc_doctor/footer')

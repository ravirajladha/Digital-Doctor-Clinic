@include('inc_hospitals/header')
<style>
    .profile-image img {
        margin-bottom: 1.5rem;
    }

    .profile-image {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        margin-bottom: 10px;


    }

    .profile-image img {
        border-radius: 50%;
        width: 120px;
        height: 120px;
        object-fit: cover;
    }
    .profile-menu {
        background-color: #fff;
        border: 1px solid #f0f0f0;
        padding: 0.9375rem 1.5rem;
    }

    .profile-header {
        background-color: #fff;
        border: 1px solid #f0f0f0;
        padding: 1.5rem;
    }
    .nav-tabs.nav-tabs-solid>li>a.active,
    .nav-tabs.nav-tabs-solid>li>a.active:hover,
    .nav-tabs.nav-tabs-solid>li>a.active:focus {
        background-color: #FF9600;
        border-color: #FF9600;
        color: #fff;
    }

    .nav-tabs.nav-tabs-solid {
        background-color: #fff;
        border: 0;
    }

    .align-items-center {
        align-items: center !important;
    }

    .col-auto {
        flex: 0 0 auto;
        width: auto;
    }
    .fa-map-marker-alt:before {
        content: "\f3c5";
    }
</style>
<?php

use App\Models\Auth;
use App\Models\Consultation;
use App\Models\Invoices;
use App\Models\Patient;
use App\Models\Prescription;

$detailsof = Patient::where('id', $patient_id)->first();

$consultations = Consultation::where('patient_id', $detailsof->patient_id)->first();
if($consultations){
	$doctordetails = Auth::where('id', $consultations->doctor_id)->first();
	$assistancedetails = Auth::where('id', $consultations->assistant_id)->first();
	$prescriptionsDetails = Prescription::where('consultation_id', $consultations->id)->get();
	$invoice = Invoices::where('patient_id', $detailsof->id)->get();

}


?>
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Profile Settings</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_hospitals/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">
			<div class="user-tabs">
							<ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
								<li class="nav-item">
									<a class="nav-link active" href="#pat_profile" data-bs-toggle="tab">Profile Details</a>
								</li>

								<li class="nav-item">
									<a class="nav-link " href="#pat_consultation" data-bs-toggle="tab">Consultations</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#pres" data-bs-toggle="tab"><span>Prescription</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link " href="#pat_medicine" data-bs-toggle="tab">Medical records</a>
								</li>
							</ul>
						</div>
						<div class="tab-content">
							<div id="pat_profile" class="tab-pane fade show active">

									@foreach($get_patient_detail as $patient )
									<form action=" " method="post" autocomplete="off" enctype="multipart/form-data">
										@csrf
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<?php if (empty($patient->image)) { ?>
																<img src="/assets/img/patients/patient.jpg" id="userimage" alt="Patient Image">
															<?php } else { ?>
																<?php
																$string = $patient->image;
																$char = "/";
																if (strpos($string, $char) !== false) {
																	$imageURL = $patient->image;
																} else {
																	$imageURL = '/' . $patient->image;
																}
																?>
																<img src="/{{$patient->image}}" alt="Patient Image">
															<?php } ?>
														</div>
														<div class="upload-img mt-3">
                                                     </div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" value="<?php echo $patient->fname; ?>" placeholder="Enter your first name" name="fname" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control" placeholder="Enter your last name" name="lname" value="<?php echo $patient->lname; ?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Age</label>

													<input type="text" class="form-control" placeholder="Enter Age" name="age" value="<?php echo $patient->age; ?>" readonly>

												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Blood Group</label>
													<select class="form-select form-control" name="blood_group" disabled >
														<option <?php if ($patient->blood_group == "A-") {
																	echo "selected";
																} ?>>A-</option>
														<option <?php if ($patient->blood_group == "A+") {
																	echo "selected";
																} ?>>A+</option>
														<option <?php if ($patient->blood_group == "B-") {
																	echo "selected";
																} ?>>B-</option>
														<option <?php if ($patient->blood_group == "B+") {
																	echo "selected";
																} ?>>B+</option>
														<option <?php if ($patient->blood_group == "AB-") {
																	echo "selected";
																} ?>>AB-</option>
														<option <?php if ($patient->blood_group == "AB+") {
																	echo "selected";
																} ?>>AB+</option>
														<option <?php if ($patient->blood_group == "O-") {
																	echo "selected";
																} ?>>O-</option>
														<option <?php if ($patient->blood_group == "O+") {
																	echo "selected";
																} ?>>O+</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<select class="form-select form-control" name="gender">
														<option>Male</option>
														<option>Female</option>
														<option>Transgender</option>

													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Health Problem</label>
													<select class="form-select form-control">
														<option>Common Cold and Flu</option>
														<option>Headache/Migrane</option>
														<option>Bone Weakness</option>
														<option>Physiotherapy</option>
														<option>Heart Problem</option>
														<option>Orthodentist</option>


													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Address</label>
													<input type="text" class="form-control" placeholder="Enter Address" name="address" value="<?php echo $patient->address; ?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control" name="city" placeholder="Enter City" id="city" value="<?php echo $patient->city; ?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control" placeholder="Enter State" name="state" id="state" value="<?php echo $patient->state; ?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip Code</label>
													<input type="text" class="form-control" placeholder="Enter Zip" name="zipcode" id="pincode" value="<?php echo $patient->zipcode; ?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" value="<?php echo $patient->country; ?>" placeholder="Enter Country" id="country" name="country" readonly>
												</div>
											</div>
										</div>
									</form>
									<a href="/hospitals/dashboard" class="btn btn-info">Back</a>
									@endforeach
								</div>
								@if($consultations)
							<div class="tab-pane fade" id="pat_consultation">
								<div class="card card-table mb-0">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Doctor</th>
														<th>Assistant</th>
														<th>Date/Time</th>
														<th>Status</th>
														<th></th>
													</tr>
												</thead>
												<tbody>

													<tr>

														<td>
															<h2 class="table-avatar">

																<a href=" #">{{optional($doctordetails)->name}} </a>
															</h2>
														</td>
														<td>
															<h2>{{$assistancedetails->name}}</h2>
														</td>
														<td>{{$consultations->created_at}} </td>
														
														<td><span class="badge rounded-pill bg-success-light">Completed</span></td>

													</tr>


												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pres">
								<div class="card card-table mb-0">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Id</th>
														<th>Date </th>
														<th>Medicines</th>
														<th>Created by </th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													@foreach($prescriptionsDetails as $prescript)
													<tr>
														<td>{{$prescript->id}}</td>
														<td>{{$prescript->created_at}}</td>
														<td>{{$prescript->medicines}}</td>
														<td>
															{{$assistancedetails->name}}
														</td>
														<td class="text-end">
															<div class="table-action">

																<a href="/hospitals/show_prescription/{{$prescript->id}}/{{$patient_id}}" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
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
							<div class="tab-pane fade" id="pat_medicine">
								<div class="card card-table mb-0">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Doctor Name</th>
														<th>Assistant Name</th>
														<th>Patient Name</th>
														<th>Report Date</th>
														<th>Report Description</th>
														<th>Report File</th>

													</tr>
												</thead>
												<tbody>
													<tr>
														<td>{{optional($doctordetails)->name}}</td>
														<td>{{$assistancedetails->name}}</td>
														<td>{{ $detailsof->fname}} {{ $detailsof->lname}}</td>
														<td>{{ $detailsof->report_date}}</td>
														<td>{{$detailsof->report_discription}}</td>
														@if($detailsof->report_file)
														<td><a href="/{{$detailsof->report_file}}" target="_blank">View</a></td>
														@endif

													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							@endif

                    </div>
                </div>

            </div>

        </div>

    </div>

</div>


</div>
<!-- /Page Content -->


@include('inc_hospitals/footer')

@include('inc_patient/header')
<!-- Breadcrumb -->
<?php

use App\Models\Assistant;
use App\Models\Auth;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Invoices;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Referral;

$detailsof = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->first();
$auth = Auth::where('email', session('rexkod_digitaldrclinic_patients_email'))->first();
$consultations = Consultation::where('patient_id', $auth->id)->first();
if ($consultations) {
    $doctordetails = Auth::where('id', $consultations->doctor_id)->first();
    $assistancedetails = Auth::where('id', $consultations->assistant_id)->first();
    $prescriptionsDetails = Prescription::where('consultation_id', $consultations->id)->get();
    $invoice = Invoices::where('patient_id', $detailsof->id)->get();
}

?>
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Patient Profile</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Patient Profile</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">


            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">

                <!-- Patient Profile Widget -->
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="/{{ $detailsof->image }}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>{{ $detailsof->fname }} {{ $detailsof->lname }}</h3>

                                    <div class="patient-details">
                                        <h5><b>Patient ID :</b> {{ $detailsof->id }} </h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>
                                            {{ $detailsof->address }},{{ $detailsof->city }},{{ $detailsof->state }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li>Phone <span>{{ $detailsof->mobile }}</span></li>
                                <li>Age <span>{{ $detailsof->age }} Years,</span></li>
                                <li>Blood Group <span>{{ $detailsof->blood_group }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Patient Profile Widget -->

                <!-- Last Booking -->
                <div class="dashboard-widget">
                    <nav class="dashboard-menu">
                        <ul>
                            <li class="active">
                                <a href="/patients/dashboard">
                                    <i class="fas fa-columns"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="/patients/dependent">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        style="height:20px;width:20px; fill:#757575;"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path
                                            d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448c13.3 0 24-10.7 24-24s-10.7-24-24-24s-24 10.7-24 24s10.7 24 24 24z" />
                                    </svg>
                                    <span> Dependent</span>
                                </a>
                            </li>
                            <li>
                                <a href="/patients/all_referrals">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        style="height:20px;width:20px; fill:#757575;"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path
                                            d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448c13.3 0 24-10.7 24-24s-10.7-24-24-24s-24 10.7-24 24s10.7 24 24 24z" />
                                    </svg>
                                    <span>All Referrals</span>
                                </a>
                            </li>
                            <li>
                                <a href="/patients/profile_settings">
                                    <i class="fas fa-user-cog"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="/patients/login">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="user-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#pat_appointments"
                                        data-bs-toggle="tab">Consultation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pres"
                                        data-bs-toggle="tab"><span>Prescription</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#medical" data-bs-toggle="tab"><span
                                            class="med-records">Medical Records</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#billing" data-bs-toggle="tab"><span>Billing</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            @if ($consultations)
                                <!-- Appointment Tab -->

                                <div id="pat_appointments" class="tab-pane fade show active">
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

                                                                    <a href=" #">{{ optional($doctordetails)->name }}
                                                                    </a>
                                                                </h2>
                                                            </td>
                                                            <td>
                                                                <h2>{{ $assistancedetails->name }}</h2>
                                                            </td>
                                                            <td>{{ $consultations->created_at }} </td>

                                                            <td><span
                                                                    class="badge rounded-pill bg-success-light">Completed</span>
                                                            </td>

                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Appointment Tab -->

                                <!-- Prescription Tab -->
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
                                                        @foreach ($prescriptionsDetails as $prescript)
                                                            <tr>
                                                                <td>{{ $prescript->id }}</td>
                                                                <td>{{ $prescript->created_at }}</td>
                                                                <td>{{ $prescript->medicines }}</td>
                                                                <td>
                                                                    {{ $assistancedetails->name }}
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="table-action">

                                                                        <a href="/patients/show_prescription_details/{{ $prescript->id }}"
                                                                            class="btn btn-sm bg-info-light">
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
                                <!-- /Prescription Tab -->

                                <!-- Medical Records Tab -->
                                <div class="tab-pane fade" id="medical">
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
                                                            <td>{{ optional($doctordetails)->name }}</td>
                                                            <td>{{ $assistancedetails->name }}</td>
                                                            <td>{{ $detailsof->fname }} {{ $detailsof->lname }}</td>
                                                            <td>{{ $detailsof->report_date }}</td>
                                                            <td>{{ $detailsof->report_discription }}</td>
                                                            @if ($detailsof->report_file)
                                                                <td><a href="/{{ $detailsof->report_file }}"
                                                                        target="_blank">View</a></td>
                                                            @endif

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Medical Records Tab -->

                                <!-- Billing Tab -->
                                <div class="tab-pane" id="billing">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">

                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice No</th>
                                                            <th>Doctor</th>
                                                            <th>Amount</th>
                                                            <th>Paid On</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoice as $inv)
                                                            <tr>
                                                                <td>
                                                                    <a href="invoice-view.html">
                                                                        {{ $inv->id }}</a>
                                                                    <?php
                                                                    $dc = Auth::where('id', $inv->assistant_id)->first();
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href=" #"
                                                                            class="avatar avatar-sm me-2">
                                                                            <img class="avatar-img rounded-circle"
                                                                                src="/assets/img/doctors/doctor-thumb-01.jpg"
                                                                                alt="User Image">
                                                                        </a>
                                                                        <a href=" #">{{ $dc->name }} </a>
                                                                    </h2>
                                                                </td>
                                                                <td> &#8377;{{ $inv->total_amount }}</td>
                                                                <td>{{ $inv->created_at }}</td>
                                                                <td class="text-end">
                                                                    <div class="table-action">

                                                                        <a href="/patients/show_invoice/{{ $inv->id }}"
                                                                            class="btn btn-sm bg-info-light">
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
                                <!-- Billing Tab -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /Page Content -->

@include('inc_patient/footer')

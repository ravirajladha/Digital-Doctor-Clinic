@include('inc_doctor/header')
<?php

use App\Models\Auth;
use App\Models\Clinics;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Referral;

$referrals = Referral::all();

foreach ($referrals as $referral) {
}

?>

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_doctor/navbar')


            <div class="col-md-7 col-lg-8 col-xl-9">
                <!-- page header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3 class="page-title">List of Referrals</h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/doctors/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Referrals</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- page header -->
                <div class="row">
                    <div class="col-md-12">


                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-4">Patient Referrals</h4>
                                <div class="appointment-tab">

                                    <div class="tab-content">

                                        <!-- Upcoming Appointment Tab -->
                                        <div class="tab-pane show active" id="upcoming-appointments">
                                            <div class="container">
                                                <div class="card card-table mb-0">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="myTable"
                                                                class="datatable table table-hover table-center mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Id</th>
                                                                        <th>From Doctor</th>
                                                                        <th>To Doctor</th>
                                                                        <th>Patient Name</th>
                                                                        <th>Clinic/Hospital</th>
                                                                        <th>Referral Reason</th>
                                                                        <th>Instructions</th>
                                                                        <th>Referral Date</th>
                                                                        <th>Referral Created Date</th>
                                                                    </tr>
                                                                </thead>
                                                                @foreach ($referrals as $ref)
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <h2>{{ $ref->id }}</h2>
                                                                            </td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    @php
                                                                                        $doctorname = Auth::where(
                                                                                            'id',
                                                                                            $ref->referral_by_doctor_id,
                                                                                        )->first();
                                                                                    @endphp
                                                                                    <a href="#">{{ $doctorname->name ?? 'Not Define' }}
                                                                                        <span>{{ $doctorname->email ?? 'Not Define' }}</span></a>
                                                                                </h2>
                                                                            </td>

                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    @php
                                                                                        $doctorrefterto = Auth::where(
                                                                                            'id',
                                                                                            $ref->referral_to_doctor_id,
                                                                                        )->first();
                                                                                    @endphp
                                                                                    <a href="#">
                                                                                        {{ optional($doctorrefterto)->name ?? 'Not Define' }}
                                                                                        <span>{{ optional($doctorrefterto)->email ?? 'Not Define' }}</span>
                                                                                    </a>
                                                                                </h2>
                                                                            </td>

                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    @php
                                                                                        $patientref = Patient::where(
                                                                                            'id',
                                                                                            $ref->patient_id,
                                                                                        )->first();
                                                                                    @endphp
                                                                                    <a href="#">{{ $patientref->fname }}
                                                                                        {{ $patientref->lname }}
                                                                                        <span>{{ $patientref->email }}</span></a>
                                                                                </h2>
                                                                            </td>

                                                                            <td>

                                                                                <h2 class="table-avatar">
                                                                                   @php
                                                                                        $clinics = Clinics::where(
                                                                                            'id',
                                                                                            $ref->hosipital_id,
                                                                                        )->first();
                                                                                    @endphp
                                                                                    <a href="#">{{ optional($clinics)->name ?? 'Not Define' }}
                                                                                        <span>{{ optional($clinics)->email ?? 'Not Define' }}</span></a>
                                                                                </h2>
                                                                            </td>

                                                                            <td>{{ $ref->Rreferrals_reason }}</td>
                                                                            <td>{{ $ref->Instructions }} </td>
                                                                            <td>{{ $ref->referrals_date }}</td>
                                                                            <td>{{ $ref->created_at }}</td>


                                                                        </tr>
                                                                    </tbody>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Upcoming Appointment Tab -->

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->
    </div>
    @include('inc_doctor/footer')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.nav-tabs a').click(function() {
                $(this).tab('show');
            });
        });
    </script>

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
use App\Models\Clinics;
use App\Models\Patient;
use App\Models\Referral;

$clinkid = Clinics::Where('auth_id', session('rexkod_digitaldrclinic_hospital_id'))->first();
$referl = Referral::Where('hosipital_id', $clinkid->id)->get();
$countref = count($referl);

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
                <!-- new akash -->
                <div class="row">
                    <div class="tab-content">

                        <!-- Upcoming Appointment Tab -->
                        <div class="tab-pane show active" id="upcoming-appointments">
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>From Doctor</th>
                                                    <th>To Doctor</th>
                                                    <th>Patient Name</th>

                                                    <th>Referral Reason</th>
                                                    <th>Instructions</th>
                                                    <th>Referrals_date</th>
                                                    <th>Created Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($referl as $ref)
                                                    <tr>
                                                        <td>{{ $ref->id }}</td>
                                                        <?php
                                                        $dc1 = Auth::where('id', $ref->referral_by_doctor_id)->first();
                                                        $dc2 = Auth::where('id', $ref->referral_to_doctor_id)->first();
                                                        $pasent_name = Patient::where('id', $ref->patient_id)->first();
                                                        ?>
                                                        <td>
                                                            <a
                                                                href="/hospitals/doctorprofilefrom/{{ optional($dc1)->id }}">
                                                                {{ optional($dc1)->name }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="/hospitals/doctorprofileto/{{ optional($dc2)->id }}">
                                                                {{ optional($dc2)->name }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="/hospitals/profileDetails/{{ $pasent_name->id }}">
                                                                {{ $pasent_name->fname }} {{ $pasent_name->lname }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $ref->Rreferrals_reason }}</td>
                                                        <td>{{ $ref->Instructions }}</td>
                                                        <td>{{ $ref->referrals_date }}</td>
                                                        <td>{{ $ref->created_at }}</td>

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

        </div>

    </div>

</div>


</div>
<!-- /Page Content -->


@include('inc_hospitals/footer')

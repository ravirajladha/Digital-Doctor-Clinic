@include('inc_patient/header')
<!-- Breadcrumb -->
<?php

use App\Models\Patient;

$detailsof = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->first();

?>
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dependent</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Dependent</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">

            <!-- Profile Sidebar -->
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <div class="profile-sidebar">
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
                                            <h5><b>Patient ID :</b> PT00{{ $detailsof->id }} </h5>
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
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li>
                                    <a href="/patients/dashboard">
                                        <i class="fas fa-columns"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="active">
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
            </div>
            <!-- / Profile Sidebar -->
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body dependent pt-0">
                        {{-- <p class="help-title">WHO NEEDS HELP? {{ session('rexkod_digitaldrclinic_patient_id') }}</p> --}}
                        <div class="row justify-content-center">
                            @if ($dep->isEmpty())
                            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                                <div class="col-md-12 text-center">
                                    <p style="font-size:20px">No Dependence</p>
                                </div>
                            </div>

                            @else
                                @foreach ($dep as $dp)
                                    <div class="col-md-3 border">
                                        <img src="/assets/img/patients/patient.jpg" class="dependent-img"
                                            alt="Patient Image">
                                        <div class="card-body">
                                            <p>Name: {{ $dp->f_name }} {{ $dp->l_name }}</p>
                                            <p>Relative Name: {{ $dp->relative_name }}</p>
                                            <p>Gender: {{ $dp->gender }}</p>
                                            <p>Date of birth: {{ $dp->date_of_birth }}</p>
                                        </div>
                                    </div>
                                @endforeach
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

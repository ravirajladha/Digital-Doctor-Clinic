@include('inc_doctor/header')
<!-- Breadcrumb -->
<?php
use App\Models\Patient;

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
                            <h3 class="page-title">List of Patients</h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/doctors/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">My Patients</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- page header -->

                <div class="row row-grid">
                    @if (count($consultation) > 0)
                        @foreach ($consultation as $cons)
                            <?php

                            $profile = Patient::where('patient_id', $cons->patient_id)->first();
                            ?>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card widget-profile pat-widget-profile">
                                    <div class="card-body">
                                        <div class="pro-widget-content">
                                            <div class="profile-info-widget">
                                                <a href="/doctors/patient_profile/{{ $profile->id }}"
                                                    class="booking-doc-img">
                                                    @if ($profile->image != null)
                                                        <img src="/{{ $profile->image }}" alt="User Image">
                                                    @else
                                                    <img src="{{ url('assets/profile2.jpg') }}" alt="">
                                                    @endif
                                                </a>
                                                <div class="profile-det-info">
                                                    <h3><a href="/doctors/patient_profile/{{ $profile->id }}"> </a>
                                                    </h3>
                                                    <a href="/doctors/patient_profile/{{ $profile->id }}">
                                                        <div class="patient-details">
                                                            <h5><b>Consultation ID : </b> {{ $cons->id }}</h5>
                                                            <h5><b>Name :</b>{{ $profile->fname }} {{ $profile->lname }}
                                                            </h5>
                                                            <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>
                                                                {{ $profile->city }},{{ $profile->state }}
                                                            </h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="patient-info">
                                            <ul>
                                                <li>Age : <span>{{ $profile->age }} Years, </span></li>
                                                <li>Blood Group <span> {{ $profile->blood_group }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <h2>No Pateints</h2>
                        </div>
                    @endif
                </div>

            </div>

        </div>

    </div>
</div>
<!-- /Page Content -->



@include('inc_doctor/footer')

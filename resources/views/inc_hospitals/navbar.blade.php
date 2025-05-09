<?php

use App\Models\Clinics;

$hospital_data = Clinics::where('email', session('rexkod_digitaldrclinic_hospital_email'))->first();

?>
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <!-- ESidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="/{{ $hospital_data->img1 }}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3></h3>

                    <div class="patient-details">
                        <h5 class="mb-0">{{ session('rexkod_digitaldrclinic_hospital_name') }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="active">
                        <a href="/hospitals/dashboard">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="/hospitals/referral">
                            <i class="fas fa-columns"></i>
                            <span>All Referral</span>
                        </a>
                    </li>
                    <li>
                        <a href="/hospitals/hospital_profile">
                            <i class="fas fa-user-cog"></i>
                            <span>My Profile </span>
                        </a>
                    </li>

                    <li>
                        <a href="/hospitals/change_password">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('hospital.logout') }}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->

</div>

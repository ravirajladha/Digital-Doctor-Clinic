<div class="col-md-5 col-lg-4 col-xl-3">
    <!-- Profile Sidebar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <div class="profile-det-info">
                    <h3>{{ session('rexkod_digitaldrclinic_ngo_name') }}</h3>
                    <div class="patient-details">
                        <h5 class="mb-0">NGO DETAILS</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="active">
                        <a href="/ngo/dashboard">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/ngo/ngo_register/{{ session('rexkod_digitaldrclinic_ngo_phone') }}">
                            <i class="fas fa-calendar-check"></i>
                            <span>Application</span>
                        </a>
                    </li>
                    <!-- Additional menu items can be added here -->
                    <li>
                        <a href="/ngo/ngo_profile">
                         <i class="fa fa-gear"></i>
                            <span>Profile Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="/ngo/change_password">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="/ngo/logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Profile Sidebar -->
</div>

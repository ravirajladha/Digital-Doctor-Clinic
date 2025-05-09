<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

    <!-- ESidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
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
            <div class="patient-info" style="display: flex; text-align: left; margin-left: 50px;">
                <ul>
                    <li>Phone :{{ $detailsof->mobile }} </li>
                    <li>Age :{{ $detailsof->age }} Years,</li>
                    <li>Blood Group : {{ $detailsof->blood_group }}</li>
                </ul>
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
                    <li class="active">
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
    <!-- /Profile Sidebar -->

</div>

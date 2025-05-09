<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="/uploads/assistant/{{ session('rexkod_digitaldrclinic_profile_image') }}" alt="{{ session('rexkod_digitaldrclinic_assistant_name') ? session('rexkod_digitaldrclinic_assistant_name') : 'Guest' }}" class="avatar-img">
                </a>
                <div class="profile-det-info">
                <h3>ID : {{ session('rexkod_digitaldrclinic_assistant_id') ? session('rexkod_digitaldrclinic_assistant_id') : 'Guest' }}</h3>

                    <h3>{{ session('rexkod_digitaldrclinic_assistant_name') ? session('rexkod_digitaldrclinic_assistant_name') : 'Guest' }}</h3>
                    <h3>{{ session('rexkod_digitaldrclinic_assistant_email') ? session('rexkod_digitaldrclinic_assistant_email') : 'Guest' }}</h3>

                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="active">
                        <a href="/assistants/dashboard">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/view_patients">
                            <i class="fas fa-user-injured"></i>
                            <span>View Patients</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/view_doctors">
                            <i class="fas fa-stethoscope"></i>
                            <span>View Doctors</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/patient_no">
                            <i class="fas fa-user-md"></i>
                            <span>Consultation</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/all_referrals">
                            <i class="fas fa-users"></i>
                            <span>All Referrals</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/test">
                            <i class="fas fa-vial"></i>
                            <span>Tests</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/medicines">
                            <i class="fas fa-pills"></i>
                            <span>Medicines</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/stock">
                            <i class="fas fa-box"></i>
                            <span>Stock</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/invoices">
                            <i class="fas fa-file-invoice"></i>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/create_invoice">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>Create Invoice</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/labreport">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>lab reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/change_password">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assistants/logout">
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

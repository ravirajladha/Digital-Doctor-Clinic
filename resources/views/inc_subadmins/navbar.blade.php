<!-- Sidebar -->
<nav class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{'sub_admins/index'== request()->path() ? 'active' : ''}}">
                    <a href="/sub_admins/index"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                <li>
                    <a href="#"><i class="fe fe-users"></i> <span>User Management</span> <span class="fa fa-angle-double-down"></span></a>
                    <ul style="display: none;">
                        <li class="{{'sub_admins/representatives'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/representatives">Representatives</a></li>
                        <li class="{{'sub_admins/doctors'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/doctors">Doctors</a></li>
                        <li class="{{'sub_admins/assistants'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/assistants">Assistants</a></li>
                        <li class="{{'sub_admins/patients'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/patients">Patients</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fe fe-layout"></i> <span>Medical Data</span> <span class="fa fa-angle-double-down"></span></a>
                    <ul style="display: none;">
                        <li class="{{'sub_admins/specialities'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/specialities">Specialities</a></li>
                        <li class="{{'sub_admins/clinic_hospital'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/clinic_hospital">Clinic/Hospital</a></li>
                        <li class="{{'sub_admins/digitaldrclininc_center'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/digitaldrclininc_center">DDC Center</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fe fe-activity"></i> <span>Activities</span> <span class="fa fa-angle-double-down"></span></a>
                    <ul style="display: none;">
                        <li class="{{'sub_admins/transactions'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/transactions">Transactions</a></li>
                    </ul>
                </li>

                <li class="{{'sub_admins/admin_profile'== request()->path() ? 'active' : ''}}">
                    <a href="/sub_admins/admin_profile"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>

                <li>
                    <a href="#"><i class="fe fe-document"></i> <span> News Room</span> <span class="fa fa-angle-double-down"></span></a>
                    <ul style="display: none;">
                        <li class="{{'sub_admins/newsroom'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/newsroom">News Room</a></li>
                        <li class="{{'sub_admins/newsroomdetails'== request()->path() ? 'active' : ''}}"><a href="/sub_admins/newsroomdetails">News Details</a></li>
                    </ul>
                </li>

                <li class="{{'sub_admins/socialmedia'== request()->path() ? 'active' : ''}}">
                    <a href="/sub_admins/socialmedia"><i class="fe fe-user-plus"></i> <span>Social Media</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
</nav>

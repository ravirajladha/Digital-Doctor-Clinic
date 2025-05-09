
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="{{'admins/index'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/index"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>

                    <li class="{{'admins/ngo_request'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/ngo_request"><i class="fe fe-building"></i><span>NGO Registration</span></a>
                    </li>

                    <li class="{{'admins/camp_request'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/camp_request"><i class="fe fe-phone"></i><span>Camp Request</span></a>
                    </li>

                    <li class="{{'admins/representatives'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/representatives"><i class="fe fe-users"></i> <span>Representatives</span></a>
                    </li>

                    <li class="{{'admins/contact_request'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/contact_request"><i class="bi bi-person-lines-fill"></i><span>Contact Request</span></a>
                    </li>

                    <li class="{{'admins/specialities'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/specialities"><i class="fe fe-users"></i> <span>Specialities</span></a>
                    </li>

                    <li class="{{'admins/test'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/test"><i class="fe fe-users"></i> <span>Tests</span></a>
                    </li>

                    <li class="{{'admins/medicines'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/medicines"><i class="fe fe-users"></i> <span>Medicines</span></a>
                    </li>

                    <li class="{{'admins/clinic_hospital'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/clinic_hospital"><i class="fe fe-users"></i> <span>Clinic/Hospital</span></a>
                    </li>

                    <li class="{{'admins/Digitaldrclininc_center'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/Digitaldrclininc_center"><i class="fe fe-users"></i> <span>DDC Center</span></a>
                    </li>

                    <li class="{{'admins/stock'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/stock"><i class="fe fe-bar-chart"></i> <span>Stocks</span></a>
                    </li>

                    <li class="{{'admins/doctors'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/doctors"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                    </li>

                    <li class="{{'admins/assistants'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/assistants"><i class="fe fe-user"></i> <span>Assistants</span></a>
                    </li>

                    <li class="{{'admins/patients'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/patients"><i class="fe fe-user"></i> <span>Patients</span></a>
                    </li>

                    <li class="{{'admins/consultations'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/consultations"><i class="fe fe-layout"></i> <span>Consultations</span></a>
                    </li>

                    <li class="{{'admins/transactions'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/transactions"><i class="fe fe-credit-card"></i> <span>Transactions</span></a>
                    </li>
                    <li class="{{'admins/admin_profile'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/admin_profile"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                    </li>


                    <li class="{{'admins/newsroomdetails'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/newsroomdetails"><i class="fe fe-user-plus"></i> <span>News Room</span></a>
                    </li>

                    <li class="{{'admins/sub_admin_view'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/sub_admin_view"><i class="fe fe-user-plus"></i> <span>Sub Admin</span></a>
                    </li>


                    <li class="{{'admins/socialmedia'== request()->path() ? 'active' : ''}}">
                        <a href="/admins/socialmedia"><i class="fe fe-user-plus"></i> <span>Social media</span></a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- /Sidebar -->

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded',(event) => {
            // Sidebar Toggle Script
            const closeMenuButton = document.getElementById('toggle_btn');
            const sidebar = document.getElementById('sidebar');
            const pageWrapper = document.getElementsByClassName('page-wrapper');

            closeMenuButton.addEventListener('click', () => {
                sidebar.classList.toggle('closed');
                pageWrapper[0].classList.toggle('closed');
                // Toggle margin-left between 0 and 240px
                if (pageWrapper[0].style.marginLeft === '240px' ) {
                    pageWrapper[0].style.marginLeft = '0';
                } else {
                    pageWrapper[0].style.marginLeft = '240px';
                }
            });

            // Sidebar Toggle For Mobile View
            document.querySelector('.mobile-menu-toggle').addEventListener('click', function() {
                // Code to toggle your mobile menu
                // For example, you might toggle a class on the menu element
                document.querySelector('#sidebar').classList.toggle('open');
            });
        });
	</script>


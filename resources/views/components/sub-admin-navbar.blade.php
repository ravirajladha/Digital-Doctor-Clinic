<!-- Sidebar -->
@php
    use Illuminate\Support\Str;
@endphp

<nav class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="/sub_admins/index"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                @foreach ($permissions as $permission)
                    @if(Str::contains($permission, ['representatives']))
                    <li>
                        <a href="/sub_admins/representatives"><i class="fe fe-document"></i> <span>Representatives</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['doctors']))
                    <li>
                        <a href="/sub_admins/doctors"><i class="fe fe-apron"></i> <span>Doctors</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['assistants']))
                    <li>
                        <a href="/sub_admins/assistants"><i class="fe fe-user"></i> <span>Assistants</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['patients']))
                    <li>
                        <a href="/sub_admins/patients"><i class="fe fe-line-chart"></i> <span>Patients</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['clinic_hospital']))
                    <li>
                        <a href="/sub_admins/clinic_hospital"><i class="fe fe-home"></i> <span>Clinic/Hospital</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['Digitaldrclininc_center']))
                    <li>
                        <a href="/sub_admins/Digitaldrclininc_center"><i class="fe fe-building"></i> <span>DDC Center</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['specialities']))
                    <li>
                        <a href="/sub_admins/specialities"><i class="fe fe-subtract"></i> <span>Specialities</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['transactions']))
                    <li>
                        <a href="/sub_admins/transactions"><i class="fe fe-document"></i> <span>Transactions</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['newsroomdetails']))
                    <li>
                        <a href="/sub_admins/newsroomdetails"><i class="fe fe-document"></i> <span>News Room</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['socialmedia']))
                    <li>
                        <a href="/sub_admins/socialmedia"><i class="fe fe-user-plus"></i> <span>Social Media</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['ngo_request']))
                    <li>
                        <a href="/sub_admins/ngo_request"><i class="fe fe-user-plus"></i> <span>NGO Registrations</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['camp_request']))
                    <li>
                        <a href="/sub_admins/camp_request"><i class="fe fe-user-plus"></i> <span>Camp Requests</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['stock']))
                    <li>
                        <a href="/sub_admins/stock"><i class="fe fe-user-plus"></i> <span>Stocks</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['test']))
                    <li>
                        <a href="/sub_admins/test"><i class="fe fe-user-plus"></i> <span>Tests</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['contact_request']))
                    <li>
                        <a href="/sub_admins/contact_request"><i class="fe fe-user-plus"></i> <span>Contact Request</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['consultations']))
                    <li>
                        <a href="/sub_admins/consultations"><i class="fe fe-user-plus"></i> <span>Consultations</span></a>
                    </li>
                    @elseif(Str::contains($permission, ['medicines']))
                    <li>
                        <a href="/sub_admins/medicines"><i class="fe fe-file"></i> <span>Medicines</span></a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- /Sidebar -->

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Sidebar Toggle Script
        const closeMenuButton = document.getElementById('toggle_btn');
        const sidebar = document.getElementById('sidebar');
        const pageWrapper = document.getElementsByClassName('page-wrapper');

        closeMenuButton.addEventListener('click', () => {
            sidebar.classList.toggle('closed');
            pageWrapper[0].classList.toggle('closed');
            if (pageWrapper[0].style.marginLeft === '240px') {
                pageWrapper[0].style.marginLeft = '0';
            } else {
                pageWrapper[0].style.marginLeft = '240px';
            }
        });

        document.querySelector('.mobile-menu-toggle').addEventListener('click', function() {

            document.querySelector('#sidebar').classList.toggle('open');
        });
    });
</script>

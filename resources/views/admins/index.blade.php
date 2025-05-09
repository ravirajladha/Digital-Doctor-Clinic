@include('inc_admins/header')
<?php ?>
<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left:240px">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin! {{ session('rexkod_digitaldrclinic_admin_name') }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                                <i class="fe fe-users"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $doctorCount }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">Doctors</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-success">
                                <i class="fe fe-credit-card"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $patientCount }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Patients</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-danger border-danger">
                                <i class="fe fe-money"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $consultationCount }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">Consultations</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-warning border-warning">
                                <i class="fe fe-user"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $assistantCount }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Assistants</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                                <i class="fe fe-document"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $ngoCount }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">NGO</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-success">
                                <i class="fe fe-building"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $clinicCount }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Clinics</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-danger border-danger">
                                <i class="fe fe-layout"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $ddcCenterCount }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">DDC Centers</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-warning border-warning">
                                <i class="fe fe-bar-chart"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $stockCount }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Stocks</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 d-flex">

                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Doctors List <span style="font-size: 16px;">(Latest 5)</span></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="datatable table table-hover table-center mb-0">

                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Contact No.</th>
                                        <th>Email</th>
                                        <th>Clinic Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{ route('admin.view_doctor_register', ['id' => $doctor->id]) }}"
                                                        class="avatar avatar-sm me-2">
                                                        @if ($doctor->photo != null)
                                                            <img class="avatar-img rounded-circle"
                                                                src="/{{ $doctor->photo }}" alt="User Image">
                                                    </a>
                                                @else
                                                    <img class="avatar-img rounded-circle"
                                                        src="{{ url('assets/profile2.jpg') }}}}"
                                                        alt="User Image"></a>
                                    @endif
                                    <a
                                        href="{{ route('admin.view_doctor_register', ['id' => $doctor->id]) }}">{{ $doctor->fname . ' ' . $doctor->lname }}</a>
                                    </h2>
                                    </td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>
                                        {{ $doctor->clinic_name }}
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <a href="/admins/doctors">View All Doctors</a>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
            <div class="col-md-6 d-flex">

                <!-- Feed Activity -->
                <div class="card  card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Patients List <span style="font-size: 16px;">(Latest 5)</span></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable1" class="datatable table table-hover table-center mb-0">

                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Contact No.</th>
                                        <th>Email</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">

                                                    <a href="/admins/patient_profile/{{ $patient->id }}"
                                                        class="avatar avatar-sm me-2">
                                                        @if ($patient->image != null)
                                                            <img class="avatar-img rounded-circle"
                                                                src="/{{ $patient->image }}" alt="User Image">
                                                        @else
                                                            <img class="avatar-img rounded-circle"
                                                                src="{{ url('assets/profile2.jpg') }}"
                                                                alt="Profile Image">
                                                        @endif
                                                    </a>
                                                    <a
                                                        href="/admins/patient_profile/{{ $patient->id }}">{{ $patient->fname . ' ' . $patient->lname }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ $patient->mobile }}</td>
                                            <td>{{ $patient->email }}</td>
                                            <td class="text-end">{{ $patient->city }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <a href="/admins/patients">View All Patients</a>
                    </div>
                </div>
                <!-- /Feed Activity -->

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <!-- Recent Orders -->
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Consultation List <span style="font-size: 16px;">(Latest 5)</span></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable2" class="datatable table table-hover table-center mb-0">

                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Assistant Name</th>
                                        <th>Patient Name</th>
                                        <th>Consultation Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultations as $consultation)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a
                                                        href="#">{{ optional($consultation->doctor)->name ?? '-' }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#">{{ optional($consultation->assistant)->name ?? '-' }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#">{{ optional($consultation->patient)->name ?? '-' }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ $consultation->created_at->format('d/m/Y') }}<span
                                                    class="text-primary d-block">{{ $consultation->created_at->format('H:i:s') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($consultation->end_call)->format('H:i:s') }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <a href="/admins/consultations">View All Consultations</a>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->

@include('inc_admins/footer')

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

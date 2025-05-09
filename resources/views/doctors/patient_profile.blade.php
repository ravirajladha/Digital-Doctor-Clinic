@include('inc_doctor/header')




<!-- Breadcrumb -->
<div class="breadcrumb-bar">
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_doctor/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">


                    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">

                        <!-- Profile Widget -->
                        <div class="card widget-profile pat-widget-profile">
                            <div class="card-body">
                                <div class="pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="#" class="booking-doc-img">
                                            <img src="/{{ $get_patients->image }}" alt="User Image">
                                        </a>
                                        <div class="profile-det-info">
                                            <h3>{{ $get_patients->fname }} {{ $get_patients->lname }}</h3>


                                            <div class="patient-details">
                                                <h5><b>Patient ID :</b> {{ $get_patients->patient_id }}</h5>
                                                <h5>{{ $get_patients->mobile }}</h5>
                                                <h5>{{ $get_patients->email }}</h5>
                                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>
                                                    {{ $get_patients->address }},
                                                    {{ $get_patients->city }},{{ $get_patients->state }},{{ $get_patients->zipcode }}
                                                    ,</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="patient-info">
                                    <ul>
                                        <li>Age <span>{{ $get_patients->age }} Years,
                                                {{ $get_patients->gender }}</span></li>
                                        <li>Blood Group <span>{{ $get_patients->blood_group }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Profile Widget -->
                        <?php

                        use App\Models\Assistant;
                        use App\Models\Auth;
                        use App\Models\Consultation;
                        use App\Models\Invoices;
                        use App\Models\Patient;
                        use App\Models\Prescription;

                        $consultations = Consultation::where('patient_id', $get_patients->patient_id)
                            ->where('doctor_id', session('rexkod_digitaldrclinic_doctor_id'))
                            ->first();
                        $assistance = Auth::where('id', $consultations->assistant_id)->first();
                        $prescriptions = Prescription::where('consultation_id', $consultations->id)->first();
                        $findp = Auth::where('email', $get_patients->email)->first();
                        $profile = Patient::where('email', $findp->email)->first();
                        $invoice = Invoices::where('patient_id', $profile->id)->first();
                        ?>
                        <!-- Last Booking -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Profile Create Time</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="media align-items-center d-flex">
                                        <div class="me-3 flex-shrink-0">
                                            <img alt="Image placeholder" src="/assets/img/doctors/doctor-thumb-02.jpg"
                                                class="avatar  rounded-circle">
                                        </div>
                                        <div class="media-body flex-grow-1">
                                            <span
                                                class="d-block text-sm text-muted">{{ $get_patients->created_at }}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /Last Booking -->

                    </div>

                    <div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
                        <div class="card">
                            <div class="card-body pt-0">
                                <div class="user-tabs">
                                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#pat_appointments"
                                                data-bs-toggle="tab">Consultations</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pres"
                                                data-bs-toggle="tab"><span>Prescription</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#medical" data-bs-toggle="tab"><span
                                                    class="med-records">Report</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">

                                    <!-- Appointment Tab -->
                                    <div id="pat_appointments" class="tab-pane fade show active">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Doctor</th>
                                                                <th>Assistant</th>
                                                                <th>Consultation Date</th>

                                                                <th>Consultations Id</th>
                                                                <th>Status</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        @if (session('rexkod_digitaldrclinic_profile_photo') != null)
                                                                            <img class="avatar-img rounded-circle"
                                                                                src="/{{ session('rexkod_digitaldrclinic_profile_photo') }}"
                                                                                alt="User Image" width="30px">
                                                                            </a>
                                                                        @else
                                                                            <img class="avatar-img rounded-circle"
                                                                                src="{{ url('assets/profile2.jpg') }}}}"
                                                                                alt="User Image" width="30px"></a>
                                                                        @endif
                                                                        <a href="#">{{ session('rexkod_digitaldrclinic_doctor_name') }}
                                                                            <span>{{ session('rexkod_digitaldrclinic_doctor_email') }}</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>{{ $assistance->name }}</td>
                                                                <td>{{ $consultations->created_at }} <span
                                                                        class="d-block text-info">{{ $consultations->end_call }}</span>
                                                                </td>
                                                                <td>{{ $consultations->id }}</td>
                                                                <td><span
                                                                        class="badge rounded-pill bg-success-light">Confirm</span>
                                                                </td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Appointment Tab -->

                                    <!-- Prescription Tab -->
                                    <div class="tab-pane fade" id="pres">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Date </th>
                                                                <th>Medicine</th>
                                                                <th>Created by </th>
                                                                <th>View Prescription</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ optional($prescriptions)->created_at }}</td>
                                                                <td>{{ optional($prescriptions)->medicines }}</td>
                                                                <td>
                                                                    <h2 class="table-avatar">

                                                                        <a href="#">{{ $assistance->name }}
                                                                            <span>{{ $assistance->phone }}</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>


                                                                    <a href="/doctors/show_prescription/{{ $consultations->id }}"
                                                                        class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Prescription Tab -->

                                    <!-- Medical Records Tab -->
                                    <div class="tab-pane fade" id="medical">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl no</th>
                                                                <th>Name </th>
                                                                <th>Date</th>
                                                                <th>Lab Test</th>
                                                                <th>Report</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                @if ($get_patients)

                                                                    <td>

                                                                        <a href="javascript:void(0);">1</a>

                                                                        <!-- Handle the case when $invoice is null -->

                                                                    </td>
                                                                    </a>

                                                                    <td>{{ $get_patients->fname }}
                                                                        {{ $get_patients->lname }}
                                                                    </td>
                                                                    <td>{{ $get_patients->report_date }}</td>
                                                                    <td><a
                                                                            href="#">{{ $get_patients->report_discription }}</a>
                                                                    </td>
                                                                    <td>
                                                                        @if ($get_patients->report_file)
                                                                            <a href="/{{ $get_patients->report_file }}"
                                                                                target="_blank">View</a>
                                                                        @endif
                                                                    </td>
                                                                @else
                                                                    <p style="color: red;">Invoice not found</p>
                                                                @endif
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Medical Records Tab -->

                                    <!-- Billing Tab -->
                                    <div class="tab-pane" id="billing">
                                        <div class="text-end">
                                            <a class="add-new-btn" href="add-billing.html">Add Billing</a>
                                        </div>
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">

                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice No</th>
                                                                <th>Doctor</th>
                                                                <th>Amount</th>
                                                                <th>Paid On</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="invoice-view.html">#INV-0010</a>
                                                                </td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="#"
                                                                            class="avatar avatar-sm me-2">
                                                                            <img class="avatar-img rounded-circle"
                                                                                src="/assets/img/doctors/doctor-thumb-01.jpg"
                                                                                alt="User Image">
                                                                        </a>
                                                                        <a href="#">Oscar Hazard
                                                                            <span>Psychiatry</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td> &#8377;450</td>
                                                                <td>14 Nov 2023</td>
                                                                <td class="text-end">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);"
                                                                            class="btn btn-sm bg-primary-light">
                                                                            <i class="fas fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Billing Tab -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@include('/inc_doctor/footer')

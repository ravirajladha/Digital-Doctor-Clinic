@include('inc_doctor/header')

<?php

use App\Models\Auth;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Referral;
use Carbon\Carbon;
$referby = Referral::where('referral_by_doctor_id', session('rexkod_digitaldrclinic_doctor_id'))->get();
$consl = Consultation::where('doctor_id', session('rexkod_digitaldrclinic_doctor_id'))->get();
$today_consultations = Consultation::where('doctor_id', session('rexkod_digitaldrclinic_doctor_id'))
    ->whereDate('created_at', Carbon::today())
    ->get();
?>



<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_doctor/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card dash-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar1">
                                                <div class="circle-graph1" data-percent="75">
                                                    <img src="/assets/img/icon-01.png" class="img-fluid" alt="patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Total Consultation</h6>
                                                @if ($consl !== null)
                                                    <h3>{{ count($consl) }}</h3>
                                                @else
                                                    <h3>0</h3>
                                                @endif

                                                <p class="text-muted">Till Today</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar2">
                                                <div class="circle-graph2" data-percent="65">
                                                    <img src="/assets/img/icon-02.png" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Today's Consultation</h6>
                                                @if ($referby !== null)
                                                    <h3>{{ count($today_consultations) }}</h3>
                                                @else
                                                    <h3>0</h3>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="circle-bar circle-bar3">
                                                <div class="circle-graph3" data-percent="50">
                                                    <img src="/assets/img/icon-03.png" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Referrals</h6>
                                                @if ($referby !== null)
                                                    <h3>{{ count($referby) }}</h3>
                                                @else
                                                    <h3>0</h3>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Patient Consultation</h4>
                        <div class="appointment-tab">

                            <div class="tab-content">

                                <!-- Upcoming Appointment Tab -->
                                <div class="tab-pane show active" id="upcoming-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="myTable"
                                                    class="datatable table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Assistant id</th>
                                                            <th>Date</th>
                                                            <th>Purpose</th>
                                                            <th>Patient Name</th>
                                                            <th>Patient Id</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($consl as $cons)
                                                            <tr>
                                                                <td>

                                                                    <?php
                                                                    $user = Auth::where('id', $cons->assistant_id)->first();

                                                                    ?>
                                                                    <h2 class="table-avatar">
                                                                        <a href="/doctors/view_assistant/{{$cons->assistant_id}}">{{ optional($user)->name }}
                                                                            </a>
                                                                    </h2>
                                                                </td>
                                                                <td>{{ $cons->created_at }} <span
                                                                        class="d-block text-info"></span></td>
                                                                <td>General</td>
                                                                <td>
                                                                    <?php
                                                                    $name = Auth::where('id', $cons->patient_id)->first();

                                                                    ?>
                                                                    {{ $name->name }}</td>

                                                                <td>{{ $name->id }}</td>
                                                                <?php
                                                                $user = Auth::where('id', $cons->patient_id)->first();
                                                                $pp = Patient::where('email', $user->email)->first();

                                                                ?>
                                            </div>
                                            </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Upcoming Appointment Tab -->

                            <!-- Today Appointment Tab -->
                            <div class="tab-pane" id="today-appointments">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Patient Name</th>
                                                        <th>Date</th>
                                                        <th>Purpose</th>
                                                        <th>Type</th>
                                                        <th class="text-center">Paid Amount</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#" class="avatar avatar-sm me-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="/assets/img/patients/patient6.jpg"
                                                                        alt="User Image"></a>
                                                                <a href="#">Mark John <span>#PT0006</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>14 Nov2023 <span class="d-block text-info">6.00 PM</span>
                                                        </td>
                                                        <td>Fever</td>
                                                        <td>Old Patient</td>
                                                        <td class="text-center"> &#8377;300</td>
                                                        <td class="text-end">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>

                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-success-light">
                                                                    <i class="fas fa-check"></i> Accept
                                                                </a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-danger-light">
                                                                    <i class="fas fa-times"></i> Cancel
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#" class="avatar avatar-sm me-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="/assets/img/patients/patient7.jpg"
                                                                        alt="User Image"></a>
                                                                <a href="#">Danny Grizzle <span>#PT0006</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>14 Nov2023 <span class="d-block text-info">5.00 PM</span>
                                                        </td>
                                                        <td>General</td>
                                                        <td>Old Patient</td>
                                                        <td class="text-center"> &#8377;100</td>
                                                        <td class="text-end">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>

                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-success-light">
                                                                    <i class="fas fa-check"></i> Accept
                                                                </a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-danger-light">
                                                                    <i class="fas fa-times"></i> Cancel
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#" class="avatar avatar-sm me-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="/assets/img/patients/patient8.jpg"
                                                                        alt="User Image"></a>
                                                                <a href="#">Erica Anderson
                                                                    <span>#PT0007</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>14 Nov2023 <span class="d-block text-info">3.00 PM</span>
                                                        </td>
                                                        <td>General</td>
                                                        <td>New Patient</td>
                                                        <td class="text-center"> &#8377;75</td>
                                                        <td class="text-end">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>

                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-success-light">
                                                                    <i class="fas fa-check"></i> Accept
                                                                </a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-danger-light">
                                                                    <i class="fas fa-times"></i> Cancel
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#" class="avatar avatar-sm me-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="/assets/img/patients/patient9.jpg"
                                                                        alt="User Image"></a>
                                                                <a href="#">James Madrid <span>#PT0008</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>14 Nov2023 <span class="d-block text-info">1.00 PM</span>
                                                        </td>
                                                        <td>General</td>
                                                        <td>Old Patient</td>
                                                        <td class="text-center"> &#8377;350</td>
                                                        <td class="text-end">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>

                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-success-light">
                                                                    <i class="fas fa-check"></i> Accept
                                                                </a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-danger-light">
                                                                    <i class="fas fa-times"></i> Cancel
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#" class="avatar avatar-sm me-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="/assets/img/patients/patient10.jpg"
                                                                        alt="User Image"></a>
                                                                <a href="#">Lester Wise <span>#PT0010</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>14 Nov2023 <span class="d-block text-info">10.00 AM</span>
                                                        </td>
                                                        <td>General</td>
                                                        <td>New Patient</td>
                                                        <td class="text-center"> &#8377;175</td>
                                                        <td class="text-end">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>

                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-success-light">
                                                                    <i class="fas fa-check"></i> Accept
                                                                </a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-danger-light">
                                                                    <i class="fas fa-times"></i> Cancel
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#" class="avatar avatar-sm me-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="/assets/img/patients/patient11.jpg"
                                                                        alt="User Image"></a>
                                                                <a href="#">Leonard Withers
                                                                    <span>#PT0011</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>14 Nov2023 <span class="d-block text-info">11.00 AM</span>
                                                        </td>
                                                        <td>General</td>
                                                        <td>New Patient</td>
                                                        <td class="text-center"> &#8377;450</td>
                                                        <td class="text-end">
                                                            <div class="table-action">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>

                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-success-light">
                                                                    <i class="fas fa-check"></i> Accept
                                                                </a>
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm bg-danger-light">
                                                                    <i class="fas fa-times"></i> Cancel
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
                            <!-- /Today Appointment Tab -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

</div>
<!-- /Page Content -->
@include('inc_doctor.footer')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

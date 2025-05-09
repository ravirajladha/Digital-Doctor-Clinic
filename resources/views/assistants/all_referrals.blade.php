@include('inc_assistant/header')

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_assistant/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">

                <div class="row">
                    <div class="col-md-12">


                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-4">Patient Referrals</h4>
                                <div class="appointment-tab">

                                    <!-- Appointment Tab -->
                                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">

                                        <li class="nav-item">
                                            <a class="nav-link active" href="#today-appointments"
                                                data-bs-toggle="tab">Today</a>
                                        </li>
                                    </ul>
                                    <!-- /Appointment Tab -->

                                    <div class="tab-content">

                                        <!-- Upcoming Appointment Tab -->
                                        <div class="tab-pane show active" id="upcoming-appointments">
                                            <div class="card card-table mb-0">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Patient Name</th>
                                                                    <th>From Doctor</th>
                                                                    <th>To Doctor</th>

                                                                    <th>Clinic/Hospital</th>
                                                                    <th>Referral Reason</th>
                                                                    <th>Referral Instructions</th>
                                                                    <th>Referral Date</th>
                                                                    <th>Referral Create Date</th>
                                                                </tr>
                                                                <?php

                                                                use App\Models\Auth;
                                                                use App\Models\Clinics;
                                                                use App\Models\Patient;
                                                                use App\Models\Referral;

                                                                $referlas = Referral::where('assistance_id', session('rexkod_digitaldrclinic_assistant_id'))->get();

                                                                ?>
                                                            </thead>
                                                            <tbody>
                                                                @if ($referlas)
                                                                    @foreach ($referlas as $ref)
                                                                        <?php

                                                                        ?>
                                                                        <tr>
                                                                            <?php
                                                                            $doctor1 = Auth::where('id', $ref->referral_by_doctor_id)->first();
                                                                            $doctor2 = Auth::where('id', $ref->referral_to_doctor_id)->first();
                                                                            $clin = Clinics::where('id', $ref->hosipital_id)->first();
                                                                            $name = Patient::where('id', $ref->patient_id)->first();
                                                                            ?>
                                                                            <td>{{ $name->fname }} {{ $name->lname }}
                                                                            </td>
                                                                            <td>{{ $doctor1->name }}</td>
                                                                            <td>
                                                                                @if ($doctor2)
                                                                                    {{ $doctor2->name }}
                                                                                @else
                                                                                    Doctor Referral Not persent
                                                                                @endif
                                                                            </td>

                                                                            <td>
                                                                                @if ($clin)
                                                                                    {{ $clin->name }}
                                                                                @else
                                                                                    Clinic Referral Not persent
                                                                                @endif
                                                                            </td>


                                                                            <td>{{ $ref->Rreferrals_reason }}</td>
                                                                            <td>{{ $ref->Instructions }}</td>
                                                                            <td>{{ $ref->referrals_date }}</td>
                                                                            <td>{{ $ref->created_at }}</td>

                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    No data Found
                                                                @endif
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
                                                                            <a href="#"
                                                                                class="avatar avatar-sm me-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="/assets/img/patients/patient6.jpg"
                                                                                    alt="User Image"></a>
                                                                            <a href="#">Mark John
                                                                                <span>#PT0006</span></a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>14 Nov2023 <span class="d-block text-info">6.00
                                                                            PM</span></td>
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
                                                                            <a href="#"
                                                                                class="avatar avatar-sm me-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="/assets/img/patients/patient7.jpg"
                                                                                    alt="User Image"></a>
                                                                            <a href="#">Danny Grizzle
                                                                                <span>#PT0006</span></a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>14 Nov2023 <span class="d-block text-info">5.00
                                                                            PM</span></td>
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
                                                                            <a href="#"
                                                                                class="avatar avatar-sm me-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="/assets/img/patients/patient8.jpg"
                                                                                    alt="User Image"></a>
                                                                            <a href="#">Erica Anderson
                                                                                <span>#PT0007</span></a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>14 Nov2023 <span class="d-block text-info">3.00
                                                                            PM</span></td>
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
                                                                            <a href="#"
                                                                                class="avatar avatar-sm me-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="/assets/img/patients/patient9.jpg"
                                                                                    alt="User Image"></a>
                                                                            <a href="#">James Madrid
                                                                                <span>#PT0008</span></a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>14 Nov2023 <span class="d-block text-info">1.00
                                                                            PM</span></td>
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
                                                                            <a href="#"
                                                                                class="avatar avatar-sm me-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="/assets/img/patients/patient10.jpg"
                                                                                    alt="User Image"></a>
                                                                            <a href="#">Lester Wise
                                                                                <span>#PT0010</span></a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>14 Nov2023 <span
                                                                            class="d-block text-info">10.00 AM</span>
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
                                                                            <a href="#"
                                                                                class="avatar avatar-sm me-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="/assets/img/patients/patient11.jpg"
                                                                                    alt="User Image"></a>
                                                                            <a href="#">Leonard Withers
                                                                                <span>#PT0011</span></a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>14 Nov2023 <span
                                                                            class="d-block text-info">11.00 AM</span>
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

        @include('inc_assistant/footer')

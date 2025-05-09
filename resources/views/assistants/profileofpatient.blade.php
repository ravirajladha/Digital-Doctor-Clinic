@include('inc_assistant/header')
<!-- Breadcrumb -->
<?php

use App\Models\Auth;

?>

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_assistant/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="user-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                        <li class="nav-item">
                            <a class="nav-link active" href="#pat_profile" data-bs-toggle="tab">Profile Details</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="#pat_consultation" data-bs-toggle="tab">Consultations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pres" data-bs-toggle="tab"><span>Prescription</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#pat_medicine" data-bs-toggle="tab">Medical Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#invoice" data-bs-toggle="tab"><span
                                    class="med-records">Invoice</span></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">

                    <!-- Appointment Tab -->
                    <div id="pat_profile" class="tab-pane fade show active">

                        <div class="card">
                            <div class="card-body">
                                <!-- Create  Patient Profile Form -->
                                @foreach ($get_patient_detail as $patient)
                                    <form action=" " method="post" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row form-row">
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="change-avatar">
                                                        <div class="profile-img">
                                                            @if ($patient->image != null)
                                                                <img src="/{{ $patient->image }}" id="userimage"
                                                                    alt="Patient Image">
                                                            @else
                                                                <img src="{{ url('assets/profile2.jpg') }}"
                                                                    alt="">
                                                            @endif
                                                            <div class="upload-img mt-3">


                                                                <small class="form-text text-muted">Allowed JPG, GIF
                                                                    or
                                                                    PNG. Max size of 2MB</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php
                                                        echo $patient->fname; ?>" placeholder="Enter your first name"
                                                        name="fname" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your last name" name="lname"
                                                        value="<?php echo $patient->lname; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Age</label>

                                                    <input type="text" class="form-control" placeholder="Enter Age"
                                                        name="age" value="<?php echo $patient->age; ?>" readonly>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Blood Group</label>
                                                    <select class="form-select form-control" name="blood_group">
                                                        <option value="{{ $patient->blood_group }}">
                                                            {{ $patient->blood_group }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-select form-control" name="gender">
                                                        <option value="{{ $patient->gender }}">{{ $patient->gender }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Health Problem</label>
                                                    <select class="form-select form-control">
                                                        <option>Common Cold and Flu</option>
                                                        <option>Headache/Migrane</option>
                                                        <option>Bone Weakness</option>
                                                        <option>Physiotherapy</option>
                                                        <option>Heart Problem</option>
                                                        <option>Orthodentist</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Email ID</label><span class="text-danger fst-italic"
                                                        id="DirectoremailErrorMessage"></span>
                                                    <input type="email" class="form-control" placeholder="Enter Email"
                                                        name="email" id="email" value="<?php echo $patient->email; ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Contact No.</label>
                                                    <input type="text" value="<?php echo $patient->mobile; ?>"
                                                        class="form-control " placeholder="Enter Mobile No" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Alternate Mobile</label><span style="color: red"
                                                        id="DirectorphoneErrorMessage"></span>
                                                    <span style="color: red" id="DirectorphoneErrorMessage2"></span>
                                                    <input type="text" class="form-control "
                                                        placeholder="Enter Mobile No" name="alt_mobile"
                                                        id="mobile" value="<?php echo $patient->alt_mobile; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Address" name="address"
                                                        value="<?php echo $patient->address; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" name="city"
                                                        placeholder="Enter City" id="city"
                                                        value="<?php echo $patient->city; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter State" name="state" id="state"
                                                        value="<?php echo $patient->state; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Zip Code</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Zip" name="zipcode" id="pincode"
                                                        value="<?php echo $patient->zipcode; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $patient->country; ?>" placeholder="Enter Country"
                                                        id="country" name="country" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /Create  Patient Profile Form -->
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pat_consultation">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor</th>
                                                <th>Assistant</th>
                                                <th>Consultation Date</th>

                                                <th>Consultation Id</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>
                                                    {{ optional($doctor)->name }}
                                                </td>
                                                <td>{{ $assistant->name }}</td>
                                                <td>{{ $get_patient->created_at }}</td>
                                                <td>{{ $get_patient->id }}</td>
                                                <td>
                                                    @if ($get_patient->status == 1)
                                                        <button class="btn btn-sm btn-success">Success</button>
                                                    @endif
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pres">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor</th>
                                                <th>Quantity</th>
                                                <th>Days</th>

                                                <th>Timing</th>
                                                <th>View</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (optional($prescriptions)->to_doctor)
                                                <tr>

                                                    <td>

                                                        <?php

                                                        $doctorname = Auth::where('id', $prescriptions->to_doctor)->first();

                                                        ?>

                                                        {{ $doctorname->name }}
                                                    </td>
                                                    <td>{{ $prescriptions->quantity }}</td>
                                                    <td>{{ $prescriptions->days }}</td>
                                                    <td>{{ $prescriptions->timing }}</td>
                                                    <td>
                                                        <a href="/assistants/show_prescription/{{ $get_patient->id }}"
                                                            class="btn btn-sm btn-success">View</a>
                                                    </td>

                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pat_medicine">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th>Assistant Name</th>
                                                <th>Patient Name</th>
                                                <th>Report Date</th>
                                                <th>Report Description</th>
                                                <th>Report File</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> {{ optional($doctor)->name }}</td>
                                                <td>{{ $assistant->name }}</td>
                                                <td>{{ $patient->fname }} {{ $patient->lname }}</td>
                                                <td>{{ $patient->report_date }}</td>
                                                <td>{{ $patient->report_discription }}</td>
                                                <td>
                                                    @if ($patient->report_file)
                                                        <a href="/{{ $patient->report_file }}"
                                                            target="_blank">View</a>
                                                    @else
                                                        <a>Report Not created</a>
                                                    @endif
                                                </td>


                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="invoice">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>

                                                <th>Invoice No.</th>
                                                <th>Amount</th>
                                                <th>Payment Mode</th>
                                                <th>Timing</th>
                                                <th>View</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @if ($invoice != null && $invoice->id != null)
                                                    <td>{{ $invoice->id }}</td>
                                                    <td>{{ $invoice->total_amount }}</td>
                                                    <td>{{ $invoice->Payment_mode }}</td>
                                                    <td>{{ $invoice->created_at }}</td>

                                                    <td>
                                                        <a href="/assistants/invoice_view/{{ $invoice->id }}"
                                                            class="btn btn-sm btn-success">View</a>
                                                @endif
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
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







@include('inc_assistant/footer')

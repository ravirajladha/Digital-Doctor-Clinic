@include('inc_assistant/header')



<?php

use App\Models\Assistant;
use App\Models\Auth;
use App\Models\Clinics;
use App\Models\Consultation;
use App\Models\Digitaldrclininc_center;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Medicine;

$get_consultations_with_id = Consultation::Where('id', $consultation_id)->first();

$get_prescription = Prescription::where('consultation_id', $consultation_id)
    ->orderBy('created_at', 'desc') // Assuming there's a 'created_at' timestamp column
    ->first();

$get_patient_data = Patient::Where('patient_id', $get_consultations_with_id->patient_id)->first();
$get_doctor_data = Auth::Where('id', $get_consultations_with_id->doctor_id)->first();

$get_doctor_data_1 = Doctor::where('email', $get_doctor_data->email ?? null)->first();

$get_to_doctor = Doctor::where('email', $get_doctor_data->email ?? null)->first();
$get_to_clinic = Clinics::Where('name', $get_prescription->hospital_name ?? null)->first();
?>
<!-- end data -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid py-1">

        <div class="row">


            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="">
                    <div id="printableContent">
                        <div class="">
                            <!-- <h4 style="float:right;" class="card-title mb-0"></h4> -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="biller-info">
                                        <h4 class="d-block">Dr. <?php echo ucwords($get_doctor_data_1->fname . ' ' . $get_doctor_data_1->lname); ?></h4>
                                        <span class="d-block text-sm text-muted">Medicine <?php echo $get_doctor_data_1->specialization; ?></span>
                                        <span class="d-block text-sm text-muted"><?php echo $get_doctor_data_1->city; ?>,
                                            <?php echo $get_doctor_data_1->country; ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="biller-info">
                                    </div>
                                </div>
                                <div class="col-sm-4 text-sm-end">
                                    <img src="/assets/img/Digital_doctor_logo.png" class="img-fluid" alt="Logo"
                                        style="height: 50px; width: auto;">
                                    <div class="billing-info">
                                        <?php
                                        $DDccenter = Assistant::where('auth_id', session('rexkod_digitaldrclinic_assistant_id'))->first();
                                        $ddc = Digitaldrclininc_center::where('id', $DDccenter->digitaldrclininc_center_id)->first();

                                        ?>
                                        <h4 class="d-block">{{ optional($ddc)->name }} </h4>
                                        <p>Center Phone :{{ optional($ddc)->phone }}</p>
                                        <p>Address : {{ optional($ddc)->address }}</p>
                                        {{ $ddc->city }},{{ $ddc->state }},{{ $ddc->zipcode }}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>


                        <div class="row">


                            <div class="col-sm-6">
                                <div class="biller-info">
                                    <span class="d-block text-sm text-muted"><strong>Patient
                                            Name:</strong><?php echo ucwords($get_patient_data->fname . ' ' . $get_patient_data->lname); ?></span>
                                    <span class="d-block text-sm text-muted"><strong>Patient
                                            ID:</strong>PT00<?php echo $get_patient_data->id; ?></span>
                                    <span class="d-block text-sm text-muted"><strong>Age:</strong>
                                        <?php echo $get_patient_data->age; ?></span>
                                    <span class="d-block text-sm text-muted"><?php echo $get_patient_data->address; ?></span>
                                    <span
                                        class="d-block text-sm text-muted"><?php echo $get_patient_data->city; ?>,<?php echo $get_patient_data->country; ?></span>
                                </div>
                            </div>
                            @if (optional($get_prescription)->id)
                                <div class="col-sm-6 text-sm-end">
                                    <div class="billing-info">
                                        <span class="d-block text-sm text-muted"><strong>Prescription
                                                No:</strong>#00<?php echo $get_prescription->id; ?></span><br>
                                        <span
                                            class="d-block text-sm text-muted"><strong>Date:</strong><?php echo date('M jS Y', strtotime($get_prescription->created_at)); ?></span>
                                    </div>
                                </div>
                        </div>
                        <hr>
                        <!-- Prescription Item -->
                        <div class="table">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table  table-center">
                                        <thead>
                                            <tr>
                                                <th> Medicine Name</th>
                                                <th>Quantity</th>
                                                <th>Days</th>
                                                <th>Time</th>
                                                <th>Food manner</th>
                                                <th></th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <?php
                                                    $medicinesArray = explode(',', $get_prescription->medicines);
                                                    $count = 1;
                                                    foreach ($medicinesArray as $medicine) {
                                                        $medicine_name = Medicine::where("id", $medicine)->select("name")->first();
                                                        echo " <p>$count   . $medicine_name->name</p>";
                                                        $count++;
                                                    }
                                                    ?>

                                                </td>
                                                <td>
                                                    <?php $quantityArray = explode(',', $get_prescription->quantity);
                                                    foreach ($quantityArray as $qty) {
                                                        echo "<p>$qty</p>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>

                                                    <?php $dayArray = explode(',', $get_prescription->days);
                                                    foreach ($dayArray as $day) {
                                                        echo "<p>$day</p>";
                                                    }
                                                    ?>


                                                </td>
                                                <td>

                                                    <span><?php

                                                    $timeing = explode(',', $get_prescription->timing);
                                                    foreach ($timeing as $value) {
                                                        echo "<p>$value</p>";
                                                    }
                                                    ?></span>
                                                </td>
                                                <td>
                                                    <span><?php

                                                    $food = explode(',', $get_prescription->food);
                                                    foreach ($food as $value) {
                                                        echo "<p>$value</p>";
                                                    }
                                                    ?></span>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <!-- new test akash -->
                                    @if ($get_prescription->test_name)
                                        <table class="table table-center">
                                            <thead>
                                                <tr>
                                                    <th> Test Name</th>
                                                    <th>Description</th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        <?php if (empty($get_prescription->test_name)) { ?>
                                                        <p>Test Is Not Required</p>
                                                        <?php } else { ?>
                                                        <p><?php
                                                        $count = 1;

                                                        $test = explode(',', $get_prescription->test_name);
                                                        foreach ($test as $key => $value) {
                                                            echo "<p>$count  .$value</p>";
                                                            $count++;
                                                        }
                                                        ?></p>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (empty($get_prescription->test_description)) { ?>
                                                        <p>Description Is Not Required</p>
                                                        <?php } else { ?>
                                                        <p><?php
                                                        $test_ds = explode(',', $get_prescription->test_description);
                                                        foreach ($test_ds as $tst) {
                                                            echo "<p>$tst</p>";
                                                        }
                                                        ?></p>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $get_prescription->test_created; ?></p>
                                                    </td>

                                            </tbody>
                                        </table>
                                    @endif
                                    <!-- end new test akash -->
                                    <!-- new Refer Patient akash -->
                                    @if ($get_prescription->from_doctor)
                                        <table class="table table-center">
                                            <thead>
                                                <tr>
                                                    <th>From Doctor</th>
                                                    <th>To Doctor</th>
                                                    <th>Referral Reason</th>
                                                    <th>Clinic/Hospital</th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        <?php if (empty($get_prescription->from_doctor)) { ?>
                                                        <p>Refer Patient Is Not Required</p>
                                                        <?php } else { ?>
                                                        <p><?php echo $get_prescription->from_doctor; ?></p>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (empty($get_prescription->to_doctor)) { ?>
                                                        <p>Refer Patient Is Not Required</p>
                                                        <?php } else { ?>
                                                        <p><?php echo ucwords($get_to_doctor->fname . ' ' . $get_to_doctor->lname); ?></p>

                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (empty($get_prescription->referral_reason)) { ?>
                                                        <p>Refer Patient Is Not Required</p>
                                                        <?php } else { ?>
                                                        <p><?php echo $get_prescription->referral_reason; ?></p>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (empty($get_prescription->hospital_name)) { ?>
                                                        <p>Refer Patient Is Not Required</p>
                                                        <?php } else { ?>
                                                        <p><?php echo $get_to_clinic->name; ?></p>

                                                        <?php } ?>
                                                    </td>

                                            </tbody>
                                        </table>
                                    @endif
                                    <!-- new end Refer Patient akash -->
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <div class="">

                                    <!-- new row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="biller-info">
                                                <span
                                                    class="d-block text-sm text-muted"><strong>Instructions:</strong><?php echo $get_prescription->remark; ?></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 text-sm-end" style="margin-top: 200px;">
                                            <div class="billing-info">
                                                <span
                                                    class="d-block text-sm text-muted"><strong>Signature</strong><br></span><br>
                                                <span
                                                    class="d-block text-sm text-muted"><strong>Dr.<?php echo ucwords($get_doctor_data_1->fname . ' ' . $get_doctor_data_1->lname); ?></span><br>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end new row -->
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- /Prescription Item -->
                    </div>


                    <!-- Submit Section -->
                    <!-- Your existing HTML code -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="submit-section">
                                <a href="/assistants/dashboard" type="submit"
                                    class="btn btn-primary submit-btn">Back</a>
                                <!-- Add the Print button -->
                                <button type="button" class="btn btn-success submit-btn"
                                    onclick="printForm()">Print</button>
                            </div>
                        </div>
                    </div>

                    <!-- Your existing JavaScript code, or add this if not present -->
                    <script>
                        function printForm() {
                            var printContent = document.getElementById("printableContent").innerHTML;
                            var originalContent = document.body.innerHTML;
                            document.body.innerHTML = printContent;
                            window.print();
                            document.body.innerHTML = originalContent;
                        }
                    </script>

                    <!-- /Submit Section -->

                </div>

            </div>
        </div>
    </div>

</div>

</div>
<!-- /Page Content -->



@include('inc_assistant/footer')

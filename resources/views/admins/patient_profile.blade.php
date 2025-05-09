@include('inc_admins/header')
<style>
    .modal-open .main-wrapper {
        filter: none;
    }
</style>



<!-- Breadcrumb -->
<?php

use App\Models\Auth;
use App\Models\Consultation;
use App\Models\Invoices;
use App\Models\Patient;
use App\Models\Prescription;

$detailsof = Patient::where('id', $patient_id)->first();

$consultations = Consultation::where('patient_id', $detailsof->patient_id)->first();
if ($consultations) {
    $doctordetails = Auth::where('id', $consultations->doctor_id)->first();
    $assistancedetails = Auth::where('id', $consultations->assistant_id)->first();
    $prescriptionsDetails = Prescription::where('consultation_id', $consultations->id)->get();
    $invoice = Invoices::where('patient_id', $detailsof->id)->get();
}

?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Patient Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""> Patient</a></li>
                        <li class="breadcrumb-item active"> Patient</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('inc_admins/navbar')
                    <div class="col-md-7 col-lg-12 col-xl-12">
                        <div class="user-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#pat_profile" data-bs-toggle="tab">Profile
                                        Details</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " href="#pat_consultation" data-bs-toggle="tab">Consultations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pres"
                                        data-bs-toggle="tab"><span>Prescription</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#pat_medicine" data-bs-toggle="tab">Medical records</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#invoice" data-bs-toggle="tab"><span
                                            class="med-records">Invoice</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="pat_profile" class="tab-pane fade show active">

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
                                                                <?php if (empty($patient->image)) { ?>
                                                                <img src="/assets/img/patients/patient.jpg"
                                                                    id="userimage" alt="Patient Image">
                                                                <?php } else { ?>
                                                                <?php
                                                                $string = $patient->image;
                                                                $char = '/';
                                                                if (strpos($string, $char) !== false) {
                                                                    $imageURL = $patient->image;
                                                                } else {
                                                                    $imageURL = '/' . $patient->image;
                                                                }
                                                                ?>
                                                                <img src="/{{ $patient->image }}" alt="Patient Image">
                                                                <?php } ?>
                                                            </div>
                                                            <div class="upload-img mt-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo $patient->fname; ?>"
                                                            placeholder="Enter your first name" name="fname">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your last name" name="lname"
                                                            value="<?php echo $patient->lname; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Age</label>

                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Age" name="age"
                                                            value="<?php echo $patient->age; ?>">

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Blood Group</label>
                                                        <select class="form-select form-control" name="blood_group">
                                                            <option <?php if ($patient->blood_group == 'A-') {
                                                                echo 'selected';
                                                            } ?>>A-</option>
                                                            <option <?php if ($patient->blood_group == 'A+') {
                                                                echo 'selected';
                                                            } ?>>A+</option>
                                                            <option <?php if ($patient->blood_group == 'B-') {
                                                                echo 'selected';
                                                            } ?>>B-</option>
                                                            <option <?php if ($patient->blood_group == 'B+') {
                                                                echo 'selected';
                                                            } ?>>B+</option>
                                                            <option <?php if ($patient->blood_group == 'AB-') {
                                                                echo 'selected';
                                                            } ?>>AB-</option>
                                                            <option <?php if ($patient->blood_group == 'AB+') {
                                                                echo 'selected';
                                                            } ?>>AB+</option>
                                                            <option <?php if ($patient->blood_group == 'O-') {
                                                                echo 'selected';
                                                            } ?>>O-</option>
                                                            <option <?php if ($patient->blood_group == 'O+') {
                                                                echo 'selected';
                                                            } ?>>O+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-select form-control" name="gender">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                            <option>Transgender</option>

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
                                                        <input type="email" class="form-control"
                                                            placeholder="Enter Email" name="email" id="email"
                                                            value="<?php echo $patient->email; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Mobile</label>
                                                        <input type="text" value="<?php echo $patient->mobile; ?>"
                                                            class="form-control " placeholder="Enter Mobile No"
                                                            readonly disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Alternate Mobile</label><span style="color: red"
                                                            id="DirectorphoneErrorMessage"></span>
                                                        <span style="color: red"
                                                            id="DirectorphoneErrorMessage2"></span>
                                                        <input type="text" class="form-control "
                                                            placeholder="Enter Mobile No" name="alt_mobile"
                                                            id="mobile" value="<?php echo $patient->alt_mobile; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Address" name="address"
                                                            value="<?php echo $patient->address; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" name="city"
                                                            placeholder="Enter City" id="city"
                                                            value="<?php echo $patient->city; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter State" name="state" id="state"
                                                            value="<?php echo $patient->state; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>ZIP Code</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Zip" name="zipcode" id="pincode"
                                                            value="<?php echo $patient->zipcode; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo $patient->country; ?>" placeholder="Enter Country"
                                                            id="country" name="country">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <a href="/admins/patients" class="btn btn-info">Back</a>
                                        <!-- /Create  Patient Profile Form -->
                                    @endforeach
                                </div>
                            </div>
                            @if ($consultations)
                                <div class="tab-pane fade" id="pat_consultation">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Doctor</th>
                                                            <th>Assistant</th>
                                                            <th>Date/Time</th>
                                                            <th>Status</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>

                                                            <td>
                                                                <h2 class="table-avatar">

                                                                    <a href=" #">{{ optional($doctordetails)->name }}
                                                                    </a>
                                                                </h2>
                                                            </td>
                                                            <td>
                                                                <h2>{{ $assistancedetails->name }}</h2>
                                                            </td>
                                                            <td>{{ $consultations->created_at }} </td>
                                                            <td><span
                                                                    class="badge rounded-pill bg-success-light">Completed</span>
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
                                                            <th>Id</th>
                                                            <th>Date </th>
                                                            <th>Medicines</th>
                                                            <th>Created by </th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($prescriptionsDetails as $prescript)
                                                            <tr>
                                                                <td>{{ $prescript->id }}</td>
                                                                <td>{{ $prescript->created_at }}</td>
                                                                <td>{{ $prescript->medicines }}</td>
                                                                <td>
                                                                    {{ $assistancedetails->name }}
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="table-action">

                                                                        <a href="/admins/show_prescription/{{ $prescript->id }}/{{ $patient_id }}"
                                                                            class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
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
                                                            <td>{{ optional($doctordetails)->name }}</td>
                                                            <td>{{ $assistancedetails->name }}</td>
                                                            <td>{{ $detailsof->fname }} {{ $detailsof->lname }}</td>
                                                            <td>{{ $detailsof->report_date }}</td>
                                                            <td>{{ $detailsof->report_discription }}</td>
                                                            @if ($detailsof->report_file)
                                                                <td><a href="/{{ $detailsof->report_file }}"
                                                                        target="_blank">View</a></td>
                                                            @endif

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
                                                            <th>Invoice No</th>
                                                            <th>Doctor</th>
                                                            <th>Amount</th>
                                                            <th>Paid On</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoice as $inv)
                                                            <tr>
                                                                <td>
                                                                    <a href="invoice-view.html">
                                                                        {{ $inv->id }}</a>
                                                                    <?php
                                                                    $dc = Auth::where('id', $inv->assistant_id)->first();
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href=" #"
                                                                            class="avatar avatar-sm me-2">
                                                                            <img class="avatar-img rounded-circle"
                                                                                src="/assets/img/doctors/doctor-thumb-01.jpg"
                                                                                alt="User Image">
                                                                        </a>
                                                                        <a href=" #">{{ $dc->name }} </a>
                                                                    </h2>
                                                                </td>
                                                                <td> &#8377;{{ $inv->total_amount }}</td>
                                                                <td>{{ $inv->created_at }}</td>
                                                                <td class="text-end">
                                                                    <div class="table-action">

                                                                        <a href="/admins/show_invoice/{{ $inv->id }}/{{ $patient_id }}"
                                                                            class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- /Page Content -->
        @include('inc_admins/footer')

        <script>
            function take_snapshot() {
                Webcam.snap(function(data_uri) {
                    $(".image-tag").val(data_uri);
                    document.getElementById("results").innerHTML =
                        '<img id="after_capture_frame" src="' + data_uri + '"/>';
                    $("#captured_image_data").val(data_uri);
                });
            }

            function saveSnap() {
                var base64data = $("#captured_image_data").val();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/assistants/update_patient/<?php echo $patient_id; ?>",
                    data: {
                        image: base64data
                    },
                    success: function(data) {
                        // After successful save, refresh the page
                        location.reload(); // This will refresh the page
                    }
                });
            }

            $(document).ready(function() {
                Webcam.set({
                    width: 490,
                    height: 390,
                    image_format: "jpeg",
                    jpeg_quality: 90,
                });

                $('#imagechange').on('change', filechange);

                function filechange() {
                    var file = this.files[0];

                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#userimage').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(file);
                    }
                }


                //PINCODES EXTRACTION
                $('#pincode').on('input', function() {
                    var pincode = $(this).val();
                    if (pincode.length === 6) {
                        $.ajax({
                            url: '{{ url('pincodes') }}',
                            method: 'GET',
                            data: {
                                'pincode': pincode
                            },
                            success: function(data) {
                                $('#city').val(data['City']);
                                $('#country').val('India');
                                $('#state').val(data['State']);
                            }
                        });
                    }
                });

                //Mobile Number Length
                var mobileInput = document.querySelector('input[name="alt_mobile"]');

                // Get the error message element
                var mobileErrorMessage = document.getElementById('DirectorphoneErrorMessage');

                // Add an event listener to the input element
                mobileInput.addEventListener('input', function() {
                    var inputValue = mobileInput.value;

                    // Check if the input length is greater than 10
                    if (inputValue.length > 10) {
                        // Display an error message
                        mobileErrorMessage.textContent = 'Maximum 10 characters allowed.';

                        // Trim the input to 10 characters
                        mobileInput.value = inputValue.slice(0, 10);
                    } else {
                        // Clear the error message if the input is within the limit
                        mobileErrorMessage.textContent = '';
                    }
                });


                //uniquephone number
                $(document).on('input', 'input[name="alt_mobile"]', function() {
                    var mobile = $(this).val();
                    checkMobile(mobile);
                });

                function checkMobile(mobile) {
                    $.ajax({
                        type: 'GET',
                        url: '/unique_mobile_number',
                        data: {
                            mobile_number: mobile
                        },
                        success: function(response) {
                            console.log(response.trim());
                            if (response.trim() === 'exists') {
                                $('#DirectorphoneErrorMessage2').text('Phone number already exists');
                            } else {
                                $('#DirectorphoneErrorMessage2').text('');
                            }
                            updateSubmitButtonState();
                        }
                    });
                }

                //unique email
                $(document).on('input', 'input[name="email"]', function() {
                    var email = $(this).val();
                    checkEmail(email);
                });

                function checkEmail(email) {
                    $.ajax({
                        type: 'get',
                        url: '/unique_email',
                        data: {
                            email: email
                        },
                        success: function(response) {
                            console.log(response.trim());
                            if (response.trim() === 'exists') {
                                $('#DirectoremailErrorMessage').text('Email already exists');
                            } else {
                                $('#DirectoremailErrorMessage').text('');
                            }
                            updateSubmitButtonState();
                        }
                    });
                }


                $('#email, #mobile').on('change', updateSubmitButtonState);

                function updateSubmitButtonState() {
                    if ($('#DirectoremailErrorMessage').text() !== '' || $('#DirectorphoneErrorMessage2').text() !==
                        '') {
                        $('#submit').prop('disabled', true);
                        $('#start_consultation').attr('href', 'javascript:void(0);');
                    } else {
                        $('#submit').prop('disabled', false);
                        $('#start_consultation').attr('href',
                            '/assistants/start_consultation_for_patient/<?php echo $patient_id; ?>');
                    }
                }
            });
        </script>

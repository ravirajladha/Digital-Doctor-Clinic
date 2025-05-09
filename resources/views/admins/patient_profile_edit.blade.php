@include('inc_admins/header')
<style>
    .modal-open .main-wrapper {
        filter: none;
    }
</style>



<!-- Breadcrumb -->

<div class="page-wrapper" style="margin-left: 240px">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Home</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Create Patient</a></li>
                        <li class="breadcrumb-item active">Create Patient</li>
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
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <!-- Create  Patient Profile Form -->
                                @foreach ($get_patient_detail as $patient)
                                    <form action="/admins/updatePatientsbyadmin/{{ $patient->id }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row form-row">
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="change-avatar">
                                                        <div class="profile-img">
                                                            <?php if (empty($patient->image)) { ?>
                                                            <img src="/assets/img/patients/patient.jpg" id="userimage"
                                                                alt="Patient Image">
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
                                                        <div class="upload-img mt-3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $patient->fname; ?>" placeholder="Enter your first name"
                                                        name="fname" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter your last name" name="lname"
                                                        value="<?php echo $patient->lname; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile</label>

                                                    <input type="tel" class="form-control"
                                                        placeholder="Enter Mobile" name="mobile"
                                                        value="<?php echo $patient->mobile; ?>" maxlength="10" required>
                                                    <span style="color: red" id="DirectorphoneErrorMessage2"></span>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Age</label>

                                                    <input type="text" class="form-control" placeholder="Enter Age"
                                                        name="age" value="<?php echo $patient->age; ?>">

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
                                                    <input type="email" class="form-control" placeholder="Enter Email"
                                                        name="email" id="email" value="<?php echo $patient->email; ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Alternate Mobile</label>
                                                    <span style="color: red" id="DirectorphoneErrorMessage"></span>
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
                                        <button id="submit" class="btn btn-info">Update</button>
                                    </form>

                                    <!-- /Create  Patient Profile Form -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
        <!-- max -->
        <div class="modal fade" id="cam_image" role="dialog">
            <div class="modal-dialog" style="margin-left:30px !important">
                <!-- Modal content-->
                <div class="modal-content" style="width:1200px">
                    <div class="modal-header">

                        <h4 class="modal-title" style="float:left">Capture Image</h4>
                        <button type="button" style="font-size:20px" class="close"
                            onclick="Webcam.reset('#my_camera');" data-bs-dismiss="modal">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="my_camera"></div>
                                    <br />
                                    <input type="hidden" name="captured_image_data" id="captured_image_data">
                                </div>
                                <div class="col-md-6">
                                    <div id="results"></div>
                                    <br>
                                    <br />
                                    <input class="btn btn-primary" type="button" value="save"
                                        onClick="saveSnap()" data-bs-dismiss="modal" />
                                </div>
                                <div class="col-md-12 text-center">
                                    <br />
                                    <input class="btn btn-primary" type="button" value="Capture" id="imagechange2"
                                        onClick="take_snapshot()" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end max -->
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
                $(document).on('input', 'input[name="mobile"]', function() {
                    var mobile = $(this).val();
                    checkMobile(mobile);
                });

                function checkMobile(mobile) {
                    $.ajax({
                        type: 'GET',
                        url: '/unique_mobile_number_patient',
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

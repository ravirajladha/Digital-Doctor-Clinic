<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
@include('inc_assistant/header')
<style>
    .modal-open .main-wrapper {
        filter: none;
    }
</style>


<?php
$patient_id = $data['patient_id'];
$patient = $data['get_patient_detail'];
$get_patient_detail_from_auth = $data['get_patient_detail_from_auth'];
$get_specialities = $data['get_specialities'];
$doctors_id = session('patient_data')['doctors_id'] ?? null;
?>

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @include('inc_assistant/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <!-- Create  Patient Profile Form -->
                        <form action="/assistants/update_patients/<?php echo $get_patient_detail_from_auth->phone; ?>" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                @if (empty($patient->image))
                                                    <img src="/assets/img/patients/patient.jpg" id="userimage"
                                                        alt="Patient Image">
                                                @else
                                                    @php
                                                        $imageURL = $patient->image;
                                                    @endphp
                                                    <img src="/{{ $imageURL }}" alt="Patient Image">
                                                @endif
                                            </div>

                                            <div class="upload-img mt-3">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" id="imagechange" name="image"
                                                        value="{{ $patient->image ? $patient->image : '' }}">
                                                </div>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#webcamModal">
                                                    Open Webcam Modal
                                                </button>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>First Name*</label>
                                        <input type="text" class="form-control" value="<?php echo $patient->fname; ?>"
                                            placeholder="Enter your first name" name="fname" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Last Name*</label>
                                        <input type="text" class="form-control" placeholder="Enter your last name"
                                            name="lname" value="<?php echo $patient->lname; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Age*</label>

                                        <input type="number" class="form-control" placeholder="Enter Age"
                                            name="age" value="<?php echo $patient->age; ?>" required>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Blood Group*</label>
                                        <select class="form-select form-control" name="blood_group">
                                            <option value="" readonly disabled selected> --select-- </option>
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
                                        <label>Gender*</label>
                                        <select class="form-select form-control" name="gender" required>
                                            <option value="" readonly disabled selected> --select-- </option>
                                            <option {{ $patient->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option {{ $patient->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option {{ $patient->gender == 'Transgender' ? 'selected' : '' }}>
                                                Transgender</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Email ID</label><span class="text-danger fst-italic"
                                            id="DirectoremailErrorMessage"></span>
                                        <input type="email" class="form-control" placeholder="Enter Email"
                                            name="email" id="email" value="<?php echo $patient->email; ?>" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Mobile*</label>
                                        <input type="text" value="<?php echo $get_patient_detail_from_auth->phone; ?>" class="form-control "
                                            placeholder="Enter Mobile No" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Alternate Mobile</label><span style="color: red"
                                            id="DirectorphoneErrorMessage"></span>
                                        <span style="color: red" id="DirectorphoneErrorMessage2"></span>
                                        <input type="text" class="form-control " placeholder="Enter Mobile No"
                                            name="alt_mobile" id="mobile" value="<?php echo $patient->alt_mobile; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Address*</label>
                                        <input type="text" class="form-control" placeholder="Enter Address"
                                            name="address" value="<?php echo $patient->address; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Zip Code*</label>
                                        <input type="text" class="form-control" placeholder="Enter Zip"
                                            name="zipcode" id="pincode" value="<?php echo $patient->zipcode; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city"
                                            placeholder="Enter City" id="city" value="<?php echo $patient->city; ?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" placeholder="Enter State"
                                            name="state" id="state" value="<?php echo $patient->state; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" value="<?php echo $patient->country; ?>"
                                            placeholder="Enter Country" id="country" name="country" required>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn"
                                    id="submit">Submit</button>
                                <a href="/assistants/dependent/<?php echo $patient_id; ?>"
                                    class="btn btn-primary submit-btn">Dependent</a>
                                <br>
                                <br>
                            </div>
                        </form>
                        <span>Please complete the above form and then click Start consultation* </span>
                        <hr>
                        <!-- /Create  Patient Profile Form -->
                        <form method="get"
                            action="{{ $doctors_id !== null ? '/assistants/start_consultation_for_patient_doctor/' . $patient_id . '/' . $doctors_id : '/assistants/start_consultation_for_patient/' . $patient_id }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Health Problem*</label>
                                        <select class="form-select form-control" name="health_problem" required>
                                            <option value="" readonly disabled selected> --select-- </option>
                                            <option>Common Cold and Flu</option>
                                            <option>Headache/Migrane</option>
                                            <option>Bone Weakness</option>
                                            <option>Physiotherapy</option>
                                            <option>Heart Problem</option>
                                            <option>Orthodentist</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Speciality*</label>
                                        <select class="form-select form-control" name="speciality" required>
                                            <option value="" readonly disabled selected> --select-- </option>
                                            @foreach ($get_specialities as $item)
                                                <option value="{{ $item->id }}">{{ $item->speciality }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary submit-btn"
                                {{ $patient->fname ? '' : 'disabled' }}>Start Consultation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Modal for Webcam Capture -->
<div class="modal fade" id="webcamModal" tabindex="-1" aria-labelledby="webcamModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-left:30px !important">
        <div class="modal-content" style="width:1000px;">
            <div class="modal-header">
                <h5 class="modal-title" id="webcamModalLabel">Webcam Capture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div id="my_camera"></div>

                    </div>
                    <div class="col-md-6 ">
                        <div id="captured_image_area"></div>
                        <input type="hidden" id="captured_image_data">

                    </div>
                    <button class="btn btn-sm btn-primary" onclick="captureImage()" style="width: 30%;">Capture
                        Image</button>
                    <button class="btn btn-sm btn-success" onclick="saveImage()" style="width: 30%;">Save
                        Image</button>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- /Page Content -->
@include('inc_assistant/footer')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script>
    $(document).ready(function() {
        Webcam.set({
            width: 490,
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        $('#webcamModal').on('shown.bs.modal', function() {
            Webcam.attach('#my_camera');
        });

        $('#webcamModal').on('hidden.bs.modal', function() {
            Webcam.reset();
            $('#captured_image_area').empty();
        });
    });

    function captureImage() {
        Webcam.snap(function(data_uri) {
            var imageElement = $('<img>', {
                src: data_uri,
                class: 'img-fluid', // Optional: Adjust the class for styling
            });

            $('#captured_image_area').empty().append(imageElement);

            $("#captured_image_data").val(data_uri);
        });
    }

    function saveImage() {
        var base64data = $("#captured_image_data").val();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/assistants/saveWebProfile/{{ $patient_id }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                captured_image_data: base64data
            },

            success: function(data) {
                alert("Image saved!");
                $('#webcamModal').modal('hide');
                window.location.href = '/assistants/patient_details2/{{ $patient_id }}';
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                console.log(xhr.responseText);
            }
        });
    }
</script>


<script>

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

        var mobileErrorMessage = document.getElementById('DirectorphoneErrorMessage');
        mobileInput.addEventListener('input', function() {
            var inputValue = mobileInput.value;
            if (inputValue.length > 10) {
                mobileErrorMessage.textContent = 'Maximum 10 characters allowed.';

                mobileInput.value = inputValue.slice(0, 10);
            } else {
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
                    // updateSubmitButtonState();
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

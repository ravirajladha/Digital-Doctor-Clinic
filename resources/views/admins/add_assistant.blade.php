@include('inc_admins/header')

<!-- /Header -->



<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Add Assistants</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Assistants</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">

                    <!-- My Profile Form -->
                    <form action="/create_assistant" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="profile-img">
                                            <img src="/assets_admin/img/patients/patient.jpg" alt="User Image"
                                                id="changeablephoto">
                                        </div>
                                        <div class="upload-img">
                                            <div class="change-photo-btn">
                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                <input type="file" class="upload" id="photo" name="photo">
                                            </div>
                                            <small class="form-text text-muted">Allowed JPG, GIF, or PNG. Max size of
                                                2MB</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="" name="fname"
                                        placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Last Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="" name="lname"
                                        placeholder="Enter Last Name" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <!-- <div class="cal-icon"> -->
                                    <input type="date" class="form-control" value="" name="dob">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Digital Dr. Clininc Center</label>
                                    <select class="form-select form-control" name="digitaldrclininc_center_id">
                                        <option value="">Select one...</option>
                                        <?php foreach ($get_digitaldrclininc_center as $center) { ?>
                                        <option value="<?php echo $center->id; ?>"><?php echo $center->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select class="form-select form-control" name="blood_group">
                                        <option value="">Select one...</option>
                                        <option value="A-">A-</option>
                                        <option value="A+">A+</option>
                                        <option value="B-">B-</option>
                                        <option value="B-">B+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="O-">O-</option>
                                        <option value="O+">O+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Email ID<span class="text-danger">*</span></label>
                                    <span class="text-warning fst-italic" id="DirectoremailErrorMessage"></span>
                                    <input type="email" class="form-control" id="email" value=""
                                        placeholder="Enter Email ID" name="email" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Mobile<span class="text-danger">*</span></label>
                                    <span class="text-warning fst-italic" id="DirectorphoneErrorMessage"></span>
                                    <input type="tel" minlength="10" max="10" pattern="[0-9]{10}"
                                        title="Please enter a 10-digit phone number" value="" class="form-control"
                                        id="mobile" placeholder="Enter Mobile Number" name="mobile" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" value="" name="street"
                                        placeholder="Enter Street">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" value="" name="city"
                                        id="city" placeholder="Enter City">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" value="" name="state"
                                        id="state" placeholder="Enter State">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Zip Code <span style="font-size: 11px" class="small text-muted">(शहर और
                                            राज्य जानने के लिए पिनकोड दर्ज करें)</span><span
                                            class="text-danger">*</span></label>

                                    <input type="text" class="form-control" name="zip_code" id="pincode"
                                        maxlength="6" pattern="[0-9]{6}" required placeholder="Enter ZIP code"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" value="" name="country"
                                        id="country" placeholder="Enter Country">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Aadhar Card<span class="text-danger">*</span></label>
                                    <input type="file" id="aadhar_card" class="form-control" value=""
                                        name="aadhar_card" required>
                                    <p id="aadhar_name"></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Pan Card<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" value="" name="pan_card"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Cancelled Cheque<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" value=""
                                        name="cancelled_cheque" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" value="" name="password"
                                        required placeholder="Enter Password">
                                </div>
                            </div>

                        </div>
                        <div class="submit-section submit-btn-bottom float-left">
                            <button type="submit" class="btn btn-primary submit-btn" id="submit"
                                style="border-radius:8px;margin-bottom:50px;">Submit</button>
                        </div>
                    </form>
                    <!-- /My Profile Form -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->


<script>
    $(document).ready(function() {

        // Photo change
        $('#photo').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Insert the photo into the element with ID 'changeablephoto'
                    $('#changeablephoto').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $(document).on('input', 'input[name="email"]', function() {
            var email = $(this).val();
            checkEmail(email);
        });

        $(document).on('input', 'input[name="mobile"]', function() {
            var mobile = $(this).val();
            $(this).val(mobile.substr(0, 10));
            checkMobile(mobile);
        });

        // For email check
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
                }
            });
        }

        // For phone number check
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
                        $('#DirectorphoneErrorMessage').text('Phone number already exists');
                    } else {
                        $('#DirectorphoneErrorMessage').text('');
                    }
                }
            });
        }

        $('#email, #mobile').on('change', function() {
            var emailErrorMessage = $('#DirectoremailErrorMessage').text();
            var phoneErrorMessage = $('#DirectorphoneErrorMessage').text();
            var check = Boolean(emailErrorMessage) || Boolean(phoneErrorMessage);
            $('#submit').prop('disabled', check);
        });

        $('#mobile, #email').on('change', function() {
            var emailErrorMessage = $('#DirectoremailErrorMessage').text();
            var phoneErrorMessage = $('#DirectorphoneErrorMessage').text();
            var check = Boolean(emailErrorMessage) || Boolean(phoneErrorMessage);
            $('#submit').prop('disabled', check);
        });


        //PINCODES EXTRACTION
        $('#pincode').on('input', function() {
            var pincode = $(this).val();
            $(this).val(pincode.substr(0, 6));
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
    });
</script>


@include('inc_admins/footer')

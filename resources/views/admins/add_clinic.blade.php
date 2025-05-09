@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Add Clinic/Hospital</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Clinic/Hospital</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="col-md-10 col-lg-10 col-xl-12">
            <form action="/create_clinic" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Clinic/Hospital Information</h4>
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Enter Clinic/Hospital Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Type<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" name="hospital_name" required>
                                        <option value="">Select one...</option>
                                        <option value="general hospital">General Hospital</option>
                                        <option value="specialized hospital">Specialized Hospital</option>
                                        <option value="clinic">Clinic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter Clinic/Hospital Email" required>
                                </div>
                                <span id="DirectoremailErrorMessage" style="color: red;"></span>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Phone Number<span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="phone" maxlength="10"
                                        pattern="[0-9]{10}" required placeholder="Enter Clinic/Hospital Phone number"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                                <span id="DirectorphoneErrorMessage" style="color: red;"></span>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Website</label>
                                    <input type="text" class="form-control" name="website"
                                        placeholder="Enter Clinic/Hospital Website">
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Person Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="person_name"
                                        placeholder="Enter Person Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Person Phone Number<span class="text-danger">*</span></label>

                                    <input type="tel" class="form-control" name="person_phone_number" id="phone"
                                        maxlength="10" pattern="[0-9]{10}" required
                                        placeholder="Enter Person Phone Number"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Street</label>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Enter Street">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> City</label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        placeholder="Enter City">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ZIP Code <span style="font-size: 11px" class="small text-muted">(शहर और राज्य
                                            जानने के लिए पिनकोड दर्ज करें)</span><span
                                            class="text-danger">*</span></label>

                                    <input type="text" class="form-control" name="zipcode" id="pincode"
                                        maxlength="6" pattern="[0-9]{6}" required placeholder="Enter ZIP Code"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" name="state" id="state"
                                        placeholder="Enter State">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country" id="country"
                                        placeholder="Enter Country">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>GST</label>
                                    <input type="file" accept=".pdf, image/*" class="form-control"
                                        name="gst">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Aadhar card</label>
                                    <input type="file" accept="image/*" class="form-control" name="aadhaar_card">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>License or Government Approval</label>
                                    <input type="file" accept=".pdf, image/*" class="form-control"
                                        name="gov_license">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Clinic Image(1) </label>
                                    <input type="file" accept="image/*" class="form-control" name="img1">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                    <label>Clinic Image(2)</label>
                                    <input type="file" accept="image/*" class="form-control" name="img2">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Clinic Info -->
                <!-- Time Slot -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Operating Hours</h4>
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <select class="form-select form-control" name="operating_hours_date">
                                        <option value="">Select one...</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <!-- <option>1 Hour</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Timing Slot Duration</label>
                                    <select class="form-select form-control" name="operating_hours_time">
                                        <option value="">Select timing...</option>
                                        <option value="8:00 am - 11:30 am">8:00 am - 11:30 am</option>
                                        <option value="11:30 am - 1:30 pm">11:30 am - 1:30 pm</option>
                                        <option value="3:00 pm - 5:00pm">3:00 pm - 5:00pm</option>
                                        <option value="6:00 pm - 11:00pm">6:00 pm - 11:00pm</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Registrations -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Registrations</h4>
                        <div class="registrations-info">

                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" class="form-control" name="registration_year"
                                        placeholder="Enter Year of Registration">
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter Password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-section submit-btn-bottom float-left">
                    <button title="Submit" type="submit" class="btn btn-primary submit-btn"
                        style="border-radius:8px;margin-bottom:50px;">Submit</button>
                </div>
        </div>
        <!-- /Registrations -->




    </div>
    </form>
</div>
</div>
<!-- /Page Wrapper -->

@include('inc_admins/footer')
<script>
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
    //mobile check
</script>
<script>
    $(document).ready(function() {

        var mobileInput = document.querySelector('input[name="phone"]');

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

        // Phone And Email Uniqueness
        $(document).on('input', 'input[name="email"]', function() {
            var email = $(this).val();
            checkEmail(email);
        });

        $(document).on('input', 'input[name="phone"]', function() {
            var mobile = $(this).val();
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
                    updateSubmitButtonState();
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
                    updateSubmitButtonState();
                }
            });
        }

        $('#email, #phone').on('change', updateSubmitButtonState);

        function updateSubmitButtonState() {
            if ($('#DirectoremailErrorMessage').text() !== '' || $('#DirectorphoneErrorMessage').text() !==
                '') {
                $('#submit').prop('disabled', true);
            } else {
                $('#submit').prop('disabled', false);
            }
        }
    });

    function submitPrevent(event) {
        event.preventDefault();
    }
</script>

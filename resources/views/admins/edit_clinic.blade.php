@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Edit Clinic/Hospital</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Clinic/Hospital</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="col-md-10 col-lg-10 col-xl-12">
            @foreach ($clinic as $clini)
                <form action="/admins/update_clinic" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Clinic/Hospital Info</h4>
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic/Hospital Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $clini->name }}">
                                        <input type="hidden" name="id" value="{{ $clini->id }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic/Hospital Type</label>
                                        <select class="form-select form-control" name="hospital_name">
                                            <option value="general hospital">General Hospital</option>
                                            <option value="specialized hospital">Specialized Hospital</option>
                                            <option value="clinic">Clinic</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic/Hospital Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $clini->email }}" id="email">
                                    </div>
                                    <span id="DirectoremailErrorMessage" style="color: red;"></span>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic/Hospital Phone Number</label>
                                        <input type="tel" class="form-control" name="phone"
                                            value="{{ $clini->phone }}" maxlength="10">
                                    </div>
                                    <span id="DirectorphoneErrorMessage" style="color: red;"></span>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic/Hospital Website</label>
                                        <input type="text" class="form-control" value="{{ $clini->website }}"
                                            name="website">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Person Name</label>
                                        <input type="text" class="form-control" value="{{ $clini->person_name }}"
                                            name="person_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Person Phone Number</label>
                                        <input type="number" class="form-control" name="person_phone_number"
                                            value="{{ $clini->person_phone_number }}" id="phone" maxlength="10">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Street</label>
                                        <input type="text" class="form-control" value="{{ $clini->address }}"
                                            name="address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> City</label>
                                        <input type="text" class="form-control" value="{{ $clini->city }}"
                                            name="city" id="city">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ZIP Code</label>
                                        <input type="text" class="form-control" value="{{ $clini->zipcode }}"
                                            name="zipcode" id="pincode">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" value="{{ $clini->state }}"
                                            name="state" id="state">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" value="{{ $clini->country }}"
                                            name="country" id="country">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>GST</label>
                                        @if ($clini->gst)
                                            <a href="/{{ $clini->gst }} " target="_blank"><i
                                                    class="fa fa-eye"></i></a>
                                        @endif
                                        <input type="file" accept=".pdf, image/*" class="form-control"
                                            name="gst">


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Aadhar card</label>
                                        @if ($clini->aadhar_card)
                                            <a href="/{{ $clini->aadhar_card }} " target="_blank"><i
                                                    class="fa fa-eye"></i></a>
                                        @endif
                                        <input type="file" accept="image/*" class="form-control"
                                            name="aadhaar_card">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>License or government approval</label>
                                        @if ($clini->gov_license)
                                            <a href="/{{ $clini->gov_license }} " target="_blank"><i
                                                    class="fa fa-eye"></i></a>
                                        @endif
                                        <input type="file" accept=".pdf, image/*" class="form-control"
                                            name="gov_license">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Clinic Image1 </label>
                                        @if ($clini->img1)
                                            <a href="/{{ $clini->img1 }} " target="_blank"><i
                                                    class="fa fa-eye"></i></a>
                                        @endif
                                        <input type="file" accept="image/*" class="form-control" name="img1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        @if ($clini->img2)
                                            <a href="/{{ $clini->img2 }} " target="_blank"><i
                                                    class="fa fa-eye"></i></a>
                                        @endif
                                        <label>Clinic Image2</label>
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
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Timing Slot Duration</label>
                                        <select class="form-select form-control" name="operating_hours_time">
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
                                        <input type="number" value="{{ $clini->registration_year }}"
                                            class="form-control" name="registration_year">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section submit-btn-bottom float-left">
                        <button type="submit" class="btn btn-primary submit-btn"
                            style="border-radius:8px;margin-bottom:50px;">Update</button>
                    </div>
        </div>
        <!-- /Registrations -->




    </div>
    </form>
    @endforeach
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

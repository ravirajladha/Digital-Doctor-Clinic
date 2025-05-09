@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Sub Admin</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sub Admin</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="col-md-10 col-lg-10 col-xl-12">
            <form action="/admins/create_sub_admins" method="post" enctype="multipart/form-data" id="permissions-form">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> </h4>
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" required
                                        placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" required
                                        placeholder="Enter Email">
                                </div>
                                <span id="DirectoremailErrorMessage" style="color: red;"></span>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="phone" maxlength="10"
                                        pattern="[0-9]{10}" required placeholder="Enter Phone number"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                                <span id="DirectorphoneErrorMessage" style="color: red;"></span>
                            </div>



                            <!--  -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Street</label>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Enter Street name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> City</label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        placeholder="Enter City name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ZIP Code <span style="font-size: 11px" class="small text-muted">(शहर और राज्य
                                            जानने के लिए पिनकोड दर्ज करें)</span><span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="zipcode" id="pincode"
                                        maxlength="6" pattern="[0-9]{6}" required placeholder="Enter ZIP code"
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
                                <div class="form-group ">
                                    <label>Aadhar card</label>
                                    <input type="file" class="form-control" name="aadhaar_card">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Government Approval ID</label>
                                    <input type="file" class="form-control" name="gov_license">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Profile Image </label>
                                    <input type="file" class="form-control" name="profile_img">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Password </label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Permissions <span class="text-danger">*</span></label>
                                    <div class="row">
                                        @foreach ($pages as $page)
                                            <div class="col-md-3">
                                                <input type="checkbox" class="page-checkbox" name="pages[]"
                                                    value="{{ $page->url }}">
                                                {{ $page->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="submit-section submit-btn-bottom float-left">
                    <button type="submit" class="btn btn-primary submit-btn"
                        style="border-radius:8px;margin-bottom:50px;">Submit</button>
                </div>
        </div>
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
        $('#permissions-form').submit(function(event) {
            if ($('.page-checkbox:checked').length === 0) {
                event.preventDefault();
                alert('At least one permission must be selected.');
            }
        });
    });

    function submitPrevent(event) {
        event.preventDefault();
    }
</script>

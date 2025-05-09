@include('inc_admins/header')
<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">DDC Center form</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">DDC Center form</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="col-md-10 col-lg-10 col-xl-12">
            <form action="/admins/create_Digitaldrclininc_center" method="post" enctype="multipart/form-data">
                @csrf


                <!-- Clinic Info -->
                <div class="card">
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DDC Center Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter DDC Center Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Type</label>
                                    <select class="form-select form-control" name="hospital_name">
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
                                    <input type="email" class="form-control" placeholder="Enter Clinic/Hospital Email" name="email" required>
                                    <span id="emailErrorMessage" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Phone Number<span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="phone" placeholder="Enter Clinic/Hospital Phone Number" maxlength="10" required>
                                    <span id="mobileErrorMessage" class="text-danger"></span>

                                </div>
                            </div>
                            <div class="card p-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Representatives Name<span class="text-danger">*</span></label>
                                            <select name="representatives_name" id="representativesName" class="form-control">
                                                <option value="">Select Representative Name </option>
                                                @foreach($reper as $rep)
                                                @if($rep != null)
                                                <option value="{{ $rep->name }}">{{ $rep->name }}</option>
                                                @else
                                                Name is missing
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Representatives Email<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control"  name="representatives_email" id="representativesemail" readonly required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Representatives Phone<span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control" name="representatives_phone" id="representativesPhone" readonly required>
                                            <input type="tel" class="form-control" name="representatives_id" id="representatives_id" hidden>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Street</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter Street">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> City</label>
                                    <input type="text" id="city" class="form-control" name="city" placeholder="Enter  City">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ZIP Code <span style="font-size: 11px" class="small text-muted">(शहर और राज्य जानने के लिए पिनकोड दर्ज करें)</span><span class="text-danger">*</span></label>

                                    <input type="text" class="form-control" name="zipcode" id="pincode" maxlength="6" pattern="[0-9]{6}" required placeholder="Enter ZIP code" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" id="state" class="form-control" name="state" placeholder="Enter State">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" id="country" class="form-control" name="country" placeholder="Enter Country">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>License or government approval</label>
                                    <input type="file" class="form-control" name="gov_license">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Clinic Image1 </label>
                                    <input type="file" class="form-control" name="img1">
                                </div>
                            </div>

                            <div class="submit-section submit-btn-bottom float-left">
                                <button type="submit" class="btn btn-primary mybtn" style="border-radius:8px;margin-bottom:50px;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        </form>
    </div>
</div>
<!-- /Page Wrapper -->

@include('inc_admins/footer')

<script>
    var $pincodeInput = $('#pincode');
    // Add input event listener for pincode
    $pincodeInput.on('input', function() {
        var pincode = $pincodeInput.val();
        if (pincode.length === 6) {
            $.ajax({
                url: '/pincodes', // Update the URL as needed
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

    //PINCODES EXTRACTION for pincode2
    $('#pincode2').on('input', function() {
        var pincode2 = $(this).val();
        $(this).val(pincode2.substring(0, 6));
        if (pincode2.length === 6) {
            $.ajax({
                url: '{{url("pincodes")}}',
                method: 'GET',
                data: {
                    'pincode': pincode2
                },
                success: function(data) {
                    $('#city2').val(data['City']);
                    $('#country2').val('India');
                    $('#state2').val(data['State']);
                }
            });
        }
    });


    $(document).ready(function() {
        $('#representativesName').on('change', function() {
            var selectedName = $(this).val();
            $.ajax({
                url: '/representatives_number', // Update the URL as needed
                method: 'GET',
                data: {
                    'name': selectedName
                },
                success: function(data) {
                    console.log(data)
                    $('#representativesPhone').val(data['phone']);
                    $('#representatives_id').val(data['id']);
                    $('#representativesemail').val(data['reper_email']);
                }
            });
        });
    });
    $(document).ready(function() {
        $('#assitnaceDetails').on('change', function() {
            var selectedName = $(this).val();
            $.ajax({
                url: '/getassistnacePhoneNumber', // Update the URL as needed
                method: 'GET',
                data: {
                    'assistance_name': selectedName
                },
                success: function(data) {
                    console.log(data)
                    $('#assistance_phone').val(data['mobile']);
                    $('#assistance_id').val(data['id']);
                    $('#assistance_email').val(data['email']);
                    $('#assistance_profile').attr('src', '/uploads/assistant/' + data['photo']);
                    $('#assistance_profile_val').val(data['photo']);

                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Get the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('input[name="email"]').on('blur', function() {
            var email = $(this).val();
            checkEmail(email, csrfToken);
        });

        $('input[name="phone"]').on('blur', function() {
            var phone = $(this).val();
            checkMobile(phone, csrfToken);
        });

        function checkEmail(email, token) {
            $.ajax({
                type: 'POST',
                url: '/admins/checkEmailExistsddc',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: {
                    email: email
                },
                success: function(response) {
                    console.log(response);
                    if (response.status === 'exists') {
                        $('#emailErrorMessage').text('Email already exists');
                        disableSubmitButton()
                    } else {
                        $('#emailErrorMessage').text(''); // Clear the error message if it doesn't exist
                        enableSubmitButton()
                    }
                }
            });
        }

        function checkMobile(phone, token) {
            $.ajax({
                type: 'POST',
                url: '/admins/checkphoneExistsddc',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: {
                    phone: phone
                },
                success: function(response) {
                    console.log(response);
                    if (response.status === 'exists') {
                        $('#mobileErrorMessage').text('Phone already exists');
                        disableSubmitButton()
                    } else {
                        $('#mobileErrorMessage').text(''); // Clear the error message if it doesn't exist
                        enableSubmitButton()
                    }
                }
            });
        }
    });

    function disableSubmitButton() {
        $('button[type="submit"]').prop('disabled', true);
    }

    function enableSubmitButton() {
        $('button[type="submit"]').prop('disabled', false);
    }
</script>

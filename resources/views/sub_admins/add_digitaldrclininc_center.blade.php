@include('inc_subadmins/header')


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
            <form action="/sub_admins/create_Digitaldrclininc_center" method="post" enctype="multipart/form-data">
                @csrf


                <!-- Clinic Info -->
                <div class="card">
                    <div class="card-body">
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DDC Center Name</label>
                                    <input type="text" class="form-control" name="name" required>
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
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Phone Number</label>
                                    <input type="tel" class="form-control" name="phone" maxlength="10" required>
                                </div>
                            </div>
                            <div class="card p-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Representatives Name</label>
                                            <select name="representatives_name" id="representativesName"
                                                class="form-control">
                                                <option value="">Select Representative Name</option>
                                                @foreach ($reper as $rep)
                                                    @if ($rep != null)
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
                                            <label>Representatives Email</label>
                                            <input type="email" class="form-control" name="representatives_email"
                                                id="representativesemail" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Representatives Phone</label>
                                            <input type="tel" class="form-control" name="representatives_phone"
                                                id="representativesPhone" readonly required>
                                            <input type="tel" class="form-control" name="representatives_id"
                                                id="representatives_id" hidden>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Street</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> City</label>
                                    <input type="text" id="city" class="form-control" name="city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" id="pincode" class="form-control" name="zipcode" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" id="state" class="form-control" name="state">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" id="country" class="form-control" name="country">
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
                                <button type="submit" class="btn btn-primary mybtn"
                                    style="border-radius:8px;margin-bottom:50px;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        </form>
    </div>
</div>
<!-- /Page Wrapper -->

@include('inc_subadmins/footer')

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
                url: '{{ url('pincodes') }}',
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
                    $('#assistance_profile').attr('src', '/uploads/assistant/' + data[
                        'photo']);
                    $('#assistance_profile_val').val(data['photo']);

                }
            });
        });
    });
</script>

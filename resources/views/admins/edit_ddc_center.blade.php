@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Digitaldrclininc Center Update</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Digitaldrclininc Center Update</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="col-md-10 col-lg-10 col-xl-12">
            <form action="/admins/update_Digitaldrclininc_center/{{ $ddccenter->id }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <!-- Clinic Info -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DDC Center Name</label>
                                    <input type="text" class="form-control" value="{{ $ddccenter->name }}"
                                        name="name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" value="{{ $ddccenter->email }}"
                                        name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Phone Number</label>
                                    <input type="tel" class="form-control" value="{{ $ddccenter->phone }}"
                                        name="phone" maxlength="10" pattern="[0-9]{10}"
                                        title="Please enter a 10-digit phone number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Representatives Name</label>
                                    <select name="representatives_name" id="representativesName" class="form-control">
                                        <option value="">Select one...</option>
                                        <option value="{{ $ddccenter->representatives_name }}">
                                            {{ $ddccenter->representatives_name }}</option>
                                        @foreach ($reper as $rep)
                                            @if ($rep != null)
                                                <option value="{{ $rep->name }}" selected>{{ $rep->name }}</option>
                                            @else
                                                Name is missing
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Representatives Phone</label>
                                    <input type="tel" class="form-control" name="representatives_phone"
                                        value="{{ $ddccenter->representatives_phone }}" id="representativesPhone"
                                        readonly>
                                    <input type="tel" class="form-control" name="representatives_id"
                                        id="representatives_id" value="{{ $ddccenter->representatives_id }}" hidden>
                                </div>
                            </div>

                            <!--End -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Street</label>
                                    <input type="text" class="form-control" value="{{ $ddccenter->address }}"
                                        name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> City</label>
                                    <input type="text" id="city" class="form-control"
                                        value="{{ $ddccenter->city }}" name="city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ZIP Code</label>
                                    <input type="text" class="form-control" id="pincode"
                                        value="{{ $ddccenter->zipcode }}" name="zipcode">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" id="state"
                                        value="{{ $ddccenter->state }}" name="state">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" id="country"
                                        value="{{ $ddccenter->country }}" name="country">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>License or government approval</label>
                                    @if ($ddccenter->gov_license)
                                        <a href="/{{ $ddccenter->gov_license }}" target="_blank"><i
                                                class="fa fa-eye"></i></a>
                                    @endif
                                    <input type="file" class="form-control" name="gov_license">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Clinic Image1 </label>
                                    @if ($ddccenter->img1)
                                        <a href="/{{ $ddccenter->img1 }}" target="_blank"><i
                                                class="fa fa-eye"></i></a>
                                    @endif
                                    <input type="file" class="form-control" name="img1">
                                </div>
                            </div>
                            <div class="submit-section submit-btn-bottom float-left">
                                <button type="submit" class="btn btn-primary submit-btn"
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

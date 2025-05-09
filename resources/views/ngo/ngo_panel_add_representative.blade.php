@include('inc_ngo/header')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @include('inc_ngo/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="col-12 col-md-12 col-xl-12 d-flex justify-content-end mb-3">
                    <a href="/ngo/ngo_register/{{ session('rexkod_digitaldrclinic_ngo_phone') }}"
                        class="btn btn-warning">Back</a>
                </div>
                <div class="card" style="width:auto">
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <!-- Change Password Form -->

                                <form action="/apply_new_reg_clinc" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="section-header">
                                        <h2 class="text-center">ग्राम प्रधान को वरीयता दीजाएगी
                                        </h2>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>नाम <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>मोबाइल <span class="text-danger">*</span></label>
                                                <span id="DirectorphoneErrorMessage"
                                                    style="color: red; font-style:italic"></span>
                                                <input type="tel" name="mobile_number" class="form-control"
                                                    pattern="[0-9]{10}" maxlength="10" minlength="10" id="mobile_number"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>ईमेल <span class="text-danger">*</span></label>
                                                <span id="DirectoremailErrorMessage" style="color: red;"></span>
                                                <input type="mail" name="email" class="form-control" id="email"
                                                    required>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>आय प्रमाण पत्र यदि है तो  </label>
                                            <label>हाँ</label><input type="radio" name="income"
                                                onchange="showMouUpload(this)">
                                            <label>नहीं</label><input type="radio" name="income"
                                                onchange="hideMouUpload()">
                                            <input type="hidden" name="user_type"
                                                value="{{ session('rexkod_digitaldrclinic_admin_id') }}"
                                                class="form-control">

                                        </div>
                                        <div class="col-md-12" id="mouUpload" style="display: none;">
                                            <div class="form-group">
                                                <input type="file" name="income" class="form-control"
                                                    id="aadharcard">

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>आधार कार्ड फोटो <span class="text-danger">*</span></label>
                                                <input type="file" name="adhar_card" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>क्लीनिक लगवाने की स्थान का फोटो <span class="text-danger">*</span></label>
                                                <input type="file" name="place_img" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>क्लीनिक लगवाने की स्थान छितफल (sf )<span class="text-danger">*</span></label>
                                                <input type="text" name="place_map" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>क्या आप प्रधान है यदि है तो प्रमाण दें। <span>*</span></label>
                                                <input type="file" name="pradhan_verification" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>व्यवसाय <span class="text-danger">*</span></label>
                                                <input type="text" name="occupation" class="form-control"
                                                    value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>वार्षिक आय ? <span class="text-danger">*</span></label>
                                                <input type="file" name="year_amount" class="form-control" required>
                                            </div>
                                        </div>



                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>ग्राम <span class="text-danger">*</span></label>
                                                <input type="text" name="village" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>थाना <span class="text-danger">*</span></label>
                                                <input type="text" name="police_station" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>ब्लॉक <span class="text-danger">*</span></label>
                                                <input type="text" name="block" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>डाकघर <span class="text-danger">*</span></label>
                                                <input type="text" name="post" id="post"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>जिला <span class="text-danger">*</span></label>
                                                <input type="text" name="district" id="district"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>पिनकोड <span class="text-danger">*</span></label>
                                                <input type="number" name="pincode" id="pincode"
                                                    class="form-control" required>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <input type="hidden" name="otp" value="5555"
                                                    class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-4">

                                        </div>

                                        <button type="submit" class="btn btn-info" id="submit"> Submit</button>
                                    </div>
                                </form>
                                <!-- /Change Password Form -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
@include('inc_ngo/footer')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




<script>
    $(document).ready(function() {
        $(document).on('input', 'input[name="email"]', function() {
            var email = $(this).val();
            checkEmail(email);
        });

        $(document).on('input', 'input[name="mobile_number"]', function() {
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

        $('#email, #mobile_number').on('change', function() {
            if ($('#DirectoremailErrorMessage').text() !== '' || $('#DirectorphoneErrorMessage')
            .text() !== '') {
                $('#submit').prop('disabled', true);
            } else {
                $('#submit').prop('disabled', false);
            }
        });
    });


    //PINCODES EXTRACTION for pincode
    $('#pincode').on('input', function() {
        var pincode = $(this).val();
        $(this).val(pincode.substring(0, 6));
        if (pincode.length === 6) {
            $.ajax({
                url: '{{ url('pincodes') }}',
                method: 'GET',
                data: {
                    'pincode': pincode
                },
                success: function(data) {
                    $('#city').val(data['City']);
                    $('#district').val(data['District']);
                    $('#post').val(data['PostOfficeName']);
                }
            });
        }
    });
</script>

<script>
    function showMouUpload() {
        document.getElementById("mouUpload").style.display = "block";
    }

    function hideMouUpload() {
        var mouUpload = document.getElementById("mouUpload");
        if (mouUpload) {
            mouUpload.style.display = "none";
        }
    }
</script>

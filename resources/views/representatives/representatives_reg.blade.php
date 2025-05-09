<!doctype html>
<html lang="en">

<head>
    @include('inc/newheader')
</head>
<header>
    <style>
        .hindifontclass {
            font-family: 'Tiro Devanagari Hindi';
            font-style: 'normal';

        }

        @media only screen and (max-width: 767.98px) {

            .contact-box {
                margin-top: 0 !important;
            }

        }
    </style>
</header>
<!-- Breadcrumb -->


<body>


    <!-- Contact Form -->
    <div class="container-sm" style="margin-top: 100px;">

        <form action="/registerRepresentative" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card" style="width:100%;">
                <div class="section-header">
                    <h2 class="text-center mt-4">Representative Register Form</h2>
                </div>
            </div>

            <div class="row" style="margin-top: 50px;">
                <div class="col-12">
                    <!-- Basic Information -->
                    <div class="card p-2" style="width:100%;">
                        <div class="card-body">
                            <div class="section-header">
                                <h2 class="text-center">ग्राम प्रधान को वरीयता दीजाएगी
                                </h2>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>नाम <span>*</span></label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ईमेल <span>*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            required>
                                        <span id="emailErrorMessage" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>मोबाइल <span>*</span></label>
                                        <input type="tel" name="mobile_number" id="mobile" class="form-control"
                                            required>
                                        <span id="mobileErrorMessage" style="color: red;"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>आय प्रमाण पत्र यदि है तो <span>*</span></label>
                                    <label>हाँ</label><input type="radio" name="income"
                                        onchange="showMouUpload(this)">
                                    <label>नहीं</label><input type="radio" name="income" onchange="hideMouUpload()">
                                </div>
                                <div class="col-md-12" id="mouUpload" style="display: none;">
                                    <div class="form-group">
                                        <input type="file" name="income" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>आधार कार्ड फोटो <span>*</span></label>
                                        <input type="file" name="adhar_card" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>क्लीनिक लगवाने की स्थान का फोटो<span>*</span></label>
                                        <input type="file" name="place_img" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>क्लीनिक लगवाने की स्थान छितफल (sf )<span>*</span></label>
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
                                        <label>व्यवसाय <span>*</span></label>
                                        <input type="text" name="occupation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>वार्षिक आय ? <span>*</span></label>
                                        <input type="file" name="year_amount" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ग्राम <span>*</span></label>
                                        <input type="text" name="village" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>थाना <span>*</span></label>
                                        <input type="text" name="police_station" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ब्लॉक<span>*</span></label>
                                        <input type="text" name="block" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>डाकघर <span>*</span></label>
                                        <input type="text" id="PostOfficeName" name="post"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>जिला </label>
                                        <input type="text" name="district" id="district" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>पिनकोड </label>
                                        <input type="number" name="pincode" id="pincode" class="form-control"
                                            required>
                                    </div>
                                </div>


                                <input type="hidden" name="user_type" value="web">
                                <div class="col-md-4">

                                </div>
                                <button class="btn btn-info" id="submit"
                                    style="width: 100%; background:linear-gradient(to right, #00ccff, #ff2994);">
                                    Submit</button>
                            </div>
                        </div>

                        <!-- /Basic Information -->
                    </div>
                </div>
            </div>
        </form>

    </div>




</body>

</html>
@include('inc/newfooter')


<!-- allowfullscreen="" loading="lazy" -->
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('input[name="email"]').on('input', function() {
            var email = $(this).val();
            checkEmail(email);
        });

        $('input[name="mobile_number"]').on('input', function() {
            var phone = $(this).val();
            checkMobile(phone);
        });

        function checkEmail(email) {
            $.ajax({
                type: 'GET',
                url: '/unique_email',
                data: {
                    email: email
                },
                success: function(response) {
                    console.log(response);
                    if (response.trim() === 'exists') {
                        $('#emailErrorMessage').text('Email already exists');
                    } else {
                        $('#emailErrorMessage').text(
                        ''); // Clear the error message if it doesn't exist
                    }
                    updateSubmitButtonState();
                }
            });
        }

        function checkMobile(phone) {
            $.ajax({
                type: 'GET',
                url: '/unique_mobile_number',
                data: {
                    mobile_number: phone
                },
                success: function(response) {
                    console.log(response.trim());
                    if (response.trim() === 'exists') {
                        $('#mobileErrorMessage').text('Phone already exists');
                    } else {
                        $('#mobileErrorMessage').text(
                        ''); // Clear the error message if it doesn't exist
                    }
                    updateSubmitButtonState();
                }
            });
        }

        $('#email, #mobile').on('change', updateSubmitButtonState);

        function updateSubmitButtonState() {
            if ($('#emailErrorMessage').text() !== '' || $('#mobileErrorMessage').text() !== '') {
                $('#submit').prop('disabled', true);
            } else {
                $('#submit').prop('disabled', false);
            }
        }

        // PINCODES EXTRACTION
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
                        $('#district').val(data['District']);
                        $('#state').val(data['State']);
                        $('#PostOfficeName').val(data['PostOfficeName']);
                        console.log(data['PostOfficeName'])
                    }
                });
            }
        });
    });
</script>
<script>
    // Get the mobile number input element
    var mobileInput = document.querySelector('input[name="mobile_number"]');

    // Get the error message element
    var mobileErrorMessage = document.getElementById('mobileErrorMessage');

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
</script>

</html>

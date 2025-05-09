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

            .checkbox {
                display: block;

            }

        }
    </style>
</header>
<!-- Breadcrumb -->
<?php

use App\Models\Specialities;

$splist = Specialities::all();
?>

<body>
    <div class="container-fluid">
        <div class="row" style="margin-top:0px;">
            <div class="col-md-12 text-right py-4 mb-2">
                <div class="contact-box" style="margin-top:10px;"></div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="container-sm" style="padding-bottom: 50px; margin-bottom: 50px; margin-top: 30px;">

        <form action="/doctorRegister" method="post" id="form_data" enctype="multipart/form-data">
            @csrf
            <div class="card" style="width:100%;">
                <div class="section-header">
                    <h2 class="text-center mt-4">Doctor Register Form</h2>
                </div>
            </div><br>
            <br>

            <div class="row">
                <div class="col-12">

                    <!-- Basic Information -->
                    <div class="card p-3" style="width:100%;">
                        <div class="card-body">
                            <h4 class="card-title fw-3">Basic Information</h4>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="/assets_admin/img/doctors/doctor-thumb-02.jpg"
                                                    class="avatar img-circle img-thumbnail" id="blah"
                                                    alt="avatar" style="height:100px;width:100px;">
                                            </div>
                                            <div class="upload-img file-upload">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" id="image-input"
                                                        onchange="readURL(this);" name="photo">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="fname"
                                            placeholder="Enter First Name" required>
                                        <input type="hidden" class="form-control" name="status" value="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " placeholder="Enter Last Name"
                                            name="lname" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter Email ID" required>
                                        <span id="DirectoremailErrorMessage" style="color: red;"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number <span class="text-danger">*</span></label>

                                        <input type="tel" class="form-control" name="phone" maxlength="10"
                                            id="mobile_number" pattern="[0-9]{10}" required
                                            placeholder="Enter Phone number"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                                        <span id="DirectorphoneErrorMessage" style="color: red;"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 py-2">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-select form-control" name="gender">
                                            <option disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 py-2">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" name="dob">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>GST</label>
                                        <input type="file" class="form-control" name="gst">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>Aadhar card</label>
                                        <input type="file" class="form-control" name="aadhar_card">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2 p-3" style="outline: 1px solid black;">
                                    <div class="form-group">
                                        <label class="checkbox">Medical Council of India (MCI)<span>* : </span></label>
                                        <label>Yes</label>&nbsp;&nbsp;<input type="radio" name="mci"
                                            onchange="showMouUpload()">
                                        <label>No</label>&nbsp;&nbsp;<input type="radio" name="mci"
                                            onchange="hideMouUpload()">
                                    </div>
                                    <div class="col-md-12" id="mouUpload" style="display: none;">
                                        <div class="form-group">
                                            <label>MIC Number<span>*</span></label>
                                            <input type="Text" name="mci_number" placeholder="Enter MIC Number"
                                                class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Certificate<span>*</span></label>
                                            <input type="file" name="mci_certificate" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2 p-3" style="outline: 1px solid black;">
                                    <div class="form-group">
                                        <label>State Medical Council registration (SMC)<span>* : </span></label>
                                        <label>Yes</label>&nbsp;&nbsp;<input type="radio" name="smc"
                                            onchange="showMouUpload1()">
                                        <label>No</label>&nbsp;&nbsp;<input type="radio" name="smc"
                                            onchange="hideMouUpload1()">
                                    </div>
                                    <div class="col-md-12" id="mouUpload1" style="display: none;">
                                        <div
                                            class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <label>State <span>*</span></label>
                                            <select name="smc_state" class="form-control mdl-textfield__input">
                                                <option value="">Select State</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                                </option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chandigarh">Chandigarh</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                <option value="Daman and Diu">Daman and Diu</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Lakshadweep">Lakshadweep</option>
                                                <option value="Puducherry">Puducherry</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label> SMC Registration Number<span>*</span></label>
                                            <input type="text" name="smc_reg_no"
                                                placeholder="Enter SMC Registration Number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Certificate<span>*</span></label>
                                            <input type="file" name="smc_certificate" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function showMouUpload() {
                                        document.getElementById("mouUpload").style.display = "block";
                                    }

                                    function hideMouUpload() {
                                        document.getElementById("mouUpload").style.display = "none";
                                    }

                                    function showMouUpload1() {
                                        document.getElementById("mouUpload1").style.display = "block";
                                    }

                                    function hideMouUpload1() {
                                        document.getElementById("mouUpload1").style.display = "none";
                                    }
                                </script>
                            </div>
                        </div>
                    </div> <br>
                    <!-- /Basic Information -->

                    <!-- About Me -->
                    <div class="card p-3" style="width:100%;">
                        <div class="card-body">
                            <h4 class="card-title">About Me</h4>
                            <div class="form-group mb-0">
                                <label>Biography</label>
                                <textarea class="form-control mt-2" rows="3" name="about" placeholder="Bio"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /About Me -->

                    <!-- Clinic Info -->
                    <br>
                    <div class="card p-3" style="width:100%;">
                        <div class="card-body">
                            <h4 class="card-title">Clinic Information</h4>
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Clinic Name"
                                            name="clinic_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic Address</label>
                                        <input type="text" class="form-control" placeholder="Enter Clinic Address"
                                            name="clinic_address">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <!-- /Clinic Info -->

                    <!-- Contact Details -->
                    <div class="card contact-card p-3" style="width:100%;">
                        <div class="card-body">
                            <h4 class="card-title">Contact Details</h4>
                            <div class="row form-row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address Line 1</label>
                                        <input type="text" class="form-control" name="address_line1"
                                            placeholder="---Line 1---">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Address Line 2</label>
                                        <input type="text" class="form-control" name="address_line2"
                                            placeholder="---Line 2---">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <input type="text" class="form-control" id="city"
                                            placeholder="Enter City" name="city">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">State / Province</label>
                                        <input type="text" class="form-control" id="state"
                                            placeholder="Enter State" name="state">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Country</label>
                                        <input type="text" class="form-control" id="country"
                                            placeholder="Enter Country" name="country">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ZIP Code <span style="font-size: 12px"
                                                class="small text-muted">(शहर और राज्य जानने के लिए पिनकोड दर्ज
                                                करें)</span><span class="text-danger">*</span></label>

                                        <input type="text" class="form-control" id="pincode" name="postal_code"
                                            maxlength="6" pattern="[0-9]{6}" required placeholder="Enter ZIP Code"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <!-- /Contact Details -->

                    <!-- Pricing -->
                    <div class="card p-3" style="width:100%;">
                        <div class="card-body">
                            <h4 class="card-title">Pricing</h4>

                            <div class="form-group mb-0 mt-4">
                                <div id="pricing_select">
                                    <div class="custom-control form-check custom-control-inline">
                                        <input type="radio" id="price_free" name="pricing_option" value="0">
                                        <label class="form-check-label" for="price_free">Free</label>
                                    </div>
                                    <div class="custom-control form-check custom-control-inline">
                                        <input type="radio" id="price_custom" name="pricing_option">
                                        <label class="control-check" for="price_custom">Consultation fees (per
                                            consultation)</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row custom_price_cont" id="custom_price_cont" style="display:none">
                                <div class="col-md-4">
                                    <input type="number" class="form-control" id="custom_price_input"
                                        name="pricing" value="" placeholder="Enter the price">
                                </div>
                            </div>

                            <script>
                                // Add an event listener to the radio buttons
                                document.querySelector("#price_custom").addEventListener("change", function() {
                                    const customPriceCont = document.querySelector("#custom_price_cont");
                                    const customPriceInput = document.querySelector("#custom_price_input");
                                    customPriceCont.style.display = this.checked ? "block" : "none";

                                    // Set the value of the Pricing input field based on the customPriceInput visibility
                                    if (this.checked) {
                                        customPriceInput.value = ""; // Clear the input field when it's shown
                                    } else {
                                        customPriceInput.value = "0"; // Set the value to 0 when "Free" is selected
                                    }
                                });

                                // Add an event listener to the "Free" radio button
                                document.querySelector("#price_free").addEventListener("change", function() {
                                    const customPriceCont = document.querySelector("#custom_price_cont");
                                    const customPriceInput = document.querySelector("#custom_price_input");
                                    customPriceCont.style.display = this.checked ? "none" : "block";

                                    // Set the value of the Pricing input field to 0 when "Free" is selected
                                    customPriceInput.value = "0";
                                });
                            </script>

                        </div>
                    </div><br>
                    <!-- /Pricing -->

                    <!-- Services and Specialization -->
                    <div class="card services-card p-3" style="width:100%;">
                        <div class="card-body">
                            <h4 class="card-title">Services and Specialization</h4>
                            <div class="form-group mt-4">
                                <select name="department">
                                    <label>Department</label>
                                    <option value="">select department..</option>
                                    @foreach ($splist as $dep)
                                        <option value="{{ $dep->department }}">{{ $dep->department }}</option>
                                    @endforeach
                                    <!-- <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="department" value="" id="specialist"> -->

                                </select>
                                <small class="form-text text-muted">Note : Type & Press enter to add new
                                    services</small>
                            </div>
                            <div class="form-group mb-0">
                                <select name="specialization" id="">
                                    <label>Specialization </label>
                                    <option value="">Select Specialization..</option>
                                    @foreach ($splist as $sp)
                                        <option value="{{ $sp->speciality }}">{{ $sp->speciality }}</option>
                                    @endforeach
                                </select>
                                <!-- <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="specialization" value="" id="specialist"> -->
                                <small class="form-text text-muted">Note : Type & Press enter to add new
                                    specialization</small>
                            </div>
                        </div>
                    </div><br>
                    <!-- /Services and Specialization -->

                    <!-- Education -->
                    <div class="card p-3" style="width:100%;">
                        <div class="card-body">
                            <h4 class="card-title">Education</h4>
                            <div class="education-info mt-4">
                                <div class="row form-row education-cont">
                                    <div class="col-12 col-md-10 col-lg-11">
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Bachelor Degree</label>
                                                    <input type="text" class="form-control" name="bachelor_degree"
                                                        placeholder="Enter Bachelors' Degree">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>College/Institute</label>
                                                    <input type="text" class="form-control"
                                                        name="bachelor_college"
                                                        placeholder="Enter College/Institute Name">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Year of Completion</label>
                                                    <input type="text" class="form-control"
                                                        name="bachelor_completion_year"
                                                        placeholder="Enter Passout Year">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Upload Certificate</label>
                                                    <input type="file" class="form-control"
                                                        name="bachelor_document">
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Master Degree</label>
                                                    <input type="text" class="form-control" name="master_degree"
                                                        placeholder="Enter Masters Degree">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>College/Institute</label>
                                                    <input type="text" class="form-control" name="master_college"
                                                        placeholder="Enter College/Institute Name">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Year of Completion</label>
                                                    <input type="text" class="form-control"
                                                        name="master_completion_year"
                                                        placeholder="Enter Passout Year">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Upload Certificate</label>
                                                    <input type="file" class="form-control"
                                                        name="master_document">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><br>
                    <!-- /Education -->

                    <!-- Experience -->
                    <div class="card p-3" style="width:100%;">
                        <div class="card-body">
                            <h4 class="card-title">Experience</h4>
                            <div class="experience-info mt-4">
                                <div class="row form-row experience-cont">
                                    <div class="col-12 col-md-10 col-lg-11">
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Hospital Name</label>
                                                    <input type="text" placeholder="Enter Hospital Name"
                                                        class="form-control" name="experience_hospital_name">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Starting from</label>
                                                    <input type="text" class="form-control" name="experience_from"
                                                        placeholder="Enter Start Date">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Upto</label>
                                                    <input type="text" class="form-control" name="experience_to"
                                                        placeholder="Enter Last Date">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input type="text" class="form-control" name="designation"
                                                        placeholder="Enter Designation">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Upload Experience letter</label>
                                                    <input type="file" class="form-control"
                                                        name="experience_letter">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><br>
                    <!-- /Experience -->

                    <!-- Registrations --><br>
                    <div class="card p-3" style="width:100%;">
                        <div class="card-body">
                            <h4 class="card-title">Registrations</h4>
                            <div class="registrations-info mt-4">
                                <div class="row form-row reg-cont">

                                    <div class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Enter Password">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="submit-section submit-btn-bottom float-left px-3">
                            <button type="submit" class="btn btn-primary submit-btn" id="submit"
                                onsubmit="submitPrevent()" style="border-radius:8px;">Submit</button>
                        </div>
                    </div>
                    <!-- /Registrations -->
                </div>

            </div>
        </form>

    </div>
    <!-- /Contact Form -->




</body>
@include('inc/newfooter')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    // new
    $(document).ready(function() {


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function() {
            readURL(this);
        });
    });
</script>
<!-- allowfullscreen="" loading="lazy" -->
<script>
    function showMouUpload() {
        document.getElementById("mouUpload").style.display = "block";
    }

    function hideMouUpload() {
        document.getElementById("mouUpload").style.display = "none";
    }

    function showMouUpload1() {
        document.getElementById("mouUpload1").style.display = "block";
    }

    function hideMouUpload1() {
        document.getElementById("mouUpload1").style.display = "none";
    }


    function showMouUpload3() {
        document.getElementById("mouUpload3").style.display = "block";
    }

    function hideMouUpload3() {
        document.getElementById("mouUpload3").style.display = "none";
    }


    function showShowG80Upload() {
        document.getElementById("showG80Upload").style.display = "block";
    }

    function hideHideG80Upload() {
        document.getElementById("hideG80Upload").style.display = "none";
    }

    function showMouUpload5() {
        document.getElementById("mouUpload5").style.display = "block";
    }

    function hideMouUpload5() {
        document.getElementById("mouUpload5").style.display = "none";
    }
</script>
<script>
    function checkMobileNumber(mobileNumber) {
        // Replace 10 with the desired mobile number length to trigger OTP input display
        if (mobileNumber.length === 10) {
            document.getElementById('otpField').style.display = 'block';
        } else {
            document.getElementById('otpField').style.display = 'none';
        }
    }

    function checkOTP(otp) {
        // Replace '55555' with the desired OTP value
        if (otp === '55555') {
            alert('Verification successful!');
            // You can also perform additional actions here upon successful verification.
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('.chkbox').click(function() {
            var text = "";
            // alert('akash');
            $('.chkbox:checked').each(function() {
                text += $(this).val() + ',';
            })
            text = text.substring(0, text.length - 1);
            $('#selectedtext').val(text);
        })
    });

    $(document).ready(function() {
        $('.aku').click(function() {
            var data = "";
            // alert('akash');
            $('.aku:checked').each(function() {
                data += $(this).val() + ',';
            })
            data = data.substring(0, data.length - 1);
            $('#selectedtext_2').val(data);
        })
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result).width(100).height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
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

        //PINCODES EXTRACTION
        $('#pincode').on('input', function() {
            var pincode = $(this).val();
            console.log(pincode);
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
                        $('#DirectorphoneErrorMessage').text('Phone no already exists');
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

</html>

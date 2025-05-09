@include('inc_admins/header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Doctor Register Form </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Doctor</a></li>
                            <li class="breadcrumb-item active"> <?php echo $doctor->fname . ' ' . $doctor->lname; ?> </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <form style="padding-bottom: 50px; margin-bottom: 50px;"
                    action="/update_doctor_register/<?php echo $doctor->id; ?>" method="post" enctype="multipart/form-data">
                    @csrf
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

                                                        <?php if (!empty($doctor->photo)) { ?>
                                                        <?php $data = explode('/', $doctor->photo); ?>
                                                        @foreach ($data as $d)
                                                            @if ($d == 'uploads')
                                                                <img src="/{{ $doctor->photo }}" alt="">
                                                            @else
                                                                <img src="/uploads/{{ $doctor->photo }}" alt="">
                                                            @endif
                                                        @break
                                                    @endforeach

                                                    <?php } else { ?>
                                                    <img id="profile-image"
                                                        src="/assets_admin/img/doctors/doctor-thumb-02.jpg"
                                                        style="height:100px;width:100px;" alt="User Image">
                                                    <?php } ?>
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" class="upload" name="photo"
                                                            id="photo-input" onchange="displayImage()">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max
                                                        size of 2MB</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="fname"
                                                value="<?php echo $doctor->fname; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control " name="lname"
                                                value="<?php echo $doctor->lname; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                value="<?php echo $doctor->email; ?>" required>
                                            <span id="DirectoremailErrorMessage" style="color: red;"></span>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" id="mobile_number"
                                                name="phone" value="<?php echo $doctor->phone; ?>">
                                            <span id="DirectorphoneErrorMessage" style="color: red;"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender : </label>
                                            <select class="form-select form-control" name="gender">
                                                <option disabled <?php if ($doctor->gender === null) {
                                                    echo 'selected';
                                                } ?>>Select Gender</option>
                                                <option value="male" <?php if ($doctor->gender === 'male') {
                                                    echo 'selected';
                                                } ?>>Male</option>
                                                <option value="female" <?php if ($doctor->gender === 'female') {
                                                    echo 'selected';
                                                } ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="dob"
                                                value="<?php echo $doctor->dob; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>GST</label>
                                            <div class="mt-2"><?php if (!empty($doctor->gst)) { ?>
                                                <a href="/<?php echo $doctor->gst; ?>" target="_blank"
                                                    class="btn-sm btn-info m-3">View</a>

                                                <?php } else {

                                                     } ?>
                                                <input type="file" name="gst">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label>Aadhar card</label>
                                            <div class="mt-2"><?php if (!empty($doctor->aadhar_card)) { ?>
                                                <a href="/<?php echo $doctor->aadhar_card; ?>" target="_blank"
                                                    class="btn-sm btn-info m-3">View</a>


                                                <?php } else {
                                                       } ?>
                                                <input type="file" name="aadhar_card">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="outline: 1px solid black">
                                        <div class="form-group mb-0 mt-3">
                                            <div style="font-weight: 600;">Medical Council of India (MCI)</div>

                                            <div class="form-group mt-2">
                                                <label style="font-weight: 400;">Number<span
                                                        class="text-danger">*</span></label>
                                                <input type="Text" name="mci_number" class="form-control"
                                                    value="<?php echo $doctor->mci_number; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight: 400;">Certificate<span
                                                        text-danger>*</span></label>
                                                <div class="mt-2"><?php if (!empty($doctor->mci_certificate)) { ?>
                                                    <a href="/<?php echo $doctor->mci_certificate; ?>" target="_blank"
                                                        class="btn-sm btn-info m-3">View</a>
                                                    <?php } else {
                                                           } ?>
                                                    <input type="file" class="form-control" name="mci_certificate" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="outline: 1px solid black">
                                        <div class="form-group mb-0 mt-3">
                                            <div style="font-weight: 600;">State Medical Council registration (SMC)
                                            </div>
                                            <div
                                                class="form-group mt-2 mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                <label style="font-weight: 400;">State <span
                                                        class="text-danger">*</span></label>
                                                <select name="smc_state" class="form-control mdl-textfield__input"
                                                    required>
                                                    <option value="" <?php if ($doctor->smc_state === null) {
                                                        echo 'selected';
                                                    } ?>>Select State
                                                    </option>
                                                    <option value="Andhra Pradesh" <?php if ($doctor->smc_state === 'Andhra Pradesh') {
                                                        echo 'selected';
                                                    } ?>>Andhra
                                                        Pradesh</option>
                                                    <option value="Andaman and Nicobar Islands"
                                                        <?php if ($doctor->smc_state === 'Andaman and Nicobar Islands') {
                                                            echo 'selected';
                                                        } ?>>Andaman and Nicobar Islands</option>
                                                    <option value="Arunachal Pradesh" <?php if ($doctor->smc_state === 'Arunachal Pradesh') {
                                                        echo 'selected';
                                                    } ?>>
                                                        Arunachal Pradesh</option>
                                                    <option value="Assam" <?php if ($doctor->smc_state === 'Assam') {
                                                        echo 'selected';
                                                    } ?>>Assam</option>
                                                    <option value="Bihar" <?php if ($doctor->smc_state === 'Bihar') {
                                                        echo 'selected';
                                                    } ?>>Bihar</option>
                                                    <option value="Chandigarh" <?php if ($doctor->smc_state === 'Chandigarh') {
                                                        echo 'selected';
                                                    } ?>>Chandigarh
                                                    </option>
                                                    <option value="Chhattisgarh" <?php if ($doctor->smc_state === 'Chhattisgarh') {
                                                        echo 'selected';
                                                    } ?>>Chhattisgarh
                                                    </option>
                                                    <option value="Dadar and Nagar Haveli" <?php if ($doctor->smc_state === 'Dadar and Nagar Haveli') {
                                                        echo 'selected';
                                                    } ?>>
                                                        Dadar and Nagar Haveli</option>
                                                    <option value="Daman and Diu" <?php if ($doctor->smc_state === 'Daman and Diu') {
                                                        echo 'selected';
                                                    } ?>>Daman and
                                                        Diu</option>
                                                    <option value="Delhi" <?php if ($doctor->smc_state === 'Delhi') {
                                                        echo 'selected';
                                                    } ?>>Delhi</option>
                                                    <option value="Lakshadweep" <?php if ($doctor->smc_state === 'Lakshadweep') {
                                                        echo 'selected';
                                                    } ?>>Lakshadweep
                                                    </option>
                                                    <option value="Puducherry" <?php if ($doctor->smc_state === 'Puducherry') {
                                                        echo 'selected';
                                                    } ?>>Puducherry
                                                    </option>
                                                    <option value="Goa" <?php if ($doctor->smc_state === 'Goa') {
                                                        echo 'selected';
                                                    } ?>>Goa</option>
                                                    <option value="Gujarat" <?php if ($doctor->smc_state === 'Gujarat') {
                                                        echo 'selected';
                                                    } ?>>Gujarat</option>
                                                    <option value="Haryana" <?php if ($doctor->smc_state === 'Haryana') {
                                                        echo 'selected';
                                                    } ?>>Haryana</option>
                                                    <option value="Himachal Pradesh" <?php if ($doctor->smc_state === 'Himachal Pradesh') {
                                                        echo 'selected';
                                                    } ?>>Himachal
                                                        Pradesh</option>
                                                    <option value="Jammu and Kashmir" <?php if ($doctor->smc_state === 'Jammu and Kashmir') {
                                                        echo 'selected';
                                                    } ?>>Jammu
                                                        and Kashmir</option>
                                                    <option value="Jharkhand" <?php if ($doctor->smc_state === 'Jharkhand') {
                                                        echo 'selected';
                                                    } ?>>Jharkhand
                                                    </option>
                                                    <option value="Karnataka" <?php if ($doctor->smc_state === 'Karnataka') {
                                                        echo 'selected';
                                                    } ?>>Karnataka
                                                    </option>
                                                    <option value="Kerala" <?php if ($doctor->smc_state === 'Kerala') {
                                                        echo 'selected';
                                                    } ?>>Kerala</option>
                                                    <option value="Madhya Pradesh" <?php if ($doctor->smc_state === 'Madhya Pradesh') {
                                                        echo 'selected';
                                                    } ?>>Madhya
                                                        Pradesh</option>
                                                    <option value="Maharashtra" <?php if ($doctor->smc_state === 'Maharashtra') {
                                                        echo 'selected';
                                                    } ?>>Maharashtra
                                                    </option>
                                                    <option value="Manipur" <?php if ($doctor->smc_state === 'Manipur') {
                                                        echo 'selected';
                                                    } ?>>Manipur</option>
                                                    <option value="Meghalaya" <?php if ($doctor->smc_state === 'Meghalaya') {
                                                        echo 'selected';
                                                    } ?>>Meghalaya
                                                    </option>
                                                    <option value="Mizoram" <?php if ($doctor->smc_state === 'Mizoram') {
                                                        echo 'selected';
                                                    } ?>>Mizoram</option>
                                                    <option value="Nagaland" <?php if ($doctor->smc_state === 'Nagaland') {
                                                        echo 'selected';
                                                    } ?>>Nagaland</option>
                                                    <option value="Odisha" <?php if ($doctor->smc_state === 'Odisha') {
                                                        echo 'selected';
                                                    } ?>>Odisha</option>
                                                    <option value="Punjab" <?php if ($doctor->smc_state === 'Punjab') {
                                                        echo 'selected';
                                                    } ?>>Punjab</option>
                                                    <option value="Rajasthan" <?php if ($doctor->smc_state === 'Rajasthan') {
                                                        echo 'selected';
                                                    } ?>>Rajasthan
                                                    </option>
                                                    <option value="Sikkim" <?php if ($doctor->smc_state === 'Sikkim') {
                                                        echo 'selected';
                                                    } ?>>Sikkim</option>
                                                    <option value="Tamil Nadu" <?php if ($doctor->smc_state === 'Tamil Nadu') {
                                                        echo 'selected';
                                                    } ?>>Tamil Nadu
                                                    </option>
                                                    <option value="Telangana" <?php if ($doctor->smc_state === 'Telangana') {
                                                        echo 'selected';
                                                    } ?>>Telangana
                                                    </option>
                                                    <option value="Tripura" <?php if ($doctor->smc_state === 'Tripura') {
                                                        echo 'selected';
                                                    } ?>>Tripura</option>
                                                    <option value="Uttar Pradesh" <?php if ($doctor->smc_state === 'Uttar Pradesh') {
                                                        echo 'selected';
                                                    } ?>>Uttar
                                                        Pradesh</option>
                                                    <option value="Uttarakhand" <?php if ($doctor->smc_state === 'Uttarakhand') {
                                                        echo 'selected';
                                                    } ?>>Uttarakhand
                                                    </option>
                                                    <option value="West Bengal" <?php if ($doctor->smc_state === 'West Bengal') {
                                                        echo 'selected';
                                                    } ?>>West Bengal
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label style="font-weight: 400;">SMC registration
                                                    no<span class="text-danger">*</span></label>
                                                <input type="text" name="smc_reg_no" class="form-control"
                                                    value="<?php echo $doctor->smc_reg_no; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label style="font-weight: 400;">Certificate<span class="text-danger">*</span></label>
                                                <div class="mt-2"><?php if (!empty($doctor->smc_certificate)) { ?><a
                                                        href="/<?php echo $doctor->smc_certificate; ?>" target="_blank"
                                                        class="btn-sm btn-info m-3">View</a>

                                                    <?php } else {
                                                                  } ?>
                                                    <input type="file" class="form-control" name="smc_certificate" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Basic Information -->

                        <!-- About Me -->
                        <div class="card p-3" style="width:100%;">
                            <div class="card-body">
                                <h4 class="card-title">About Me</h4>
                                <div class="form-group mb-0">
                                    <label>Biography</label>
                                    <textarea class="form-control mt-2" rows="3" name="about"><?php echo $doctor->about; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /About Me -->

                        <!-- Clinic Info -->
                        <div class="card p-3" style="width:100%;">
                            <div class="card-body">
                                <h4 class="card-title">Clinic Info</h4>
                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Clinic Name</label>
                                            <input type="text" class="form-control" name="clinic_name"
                                                value="<?php echo $doctor->clinic_name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Clinic Address</label>
                                            <input type="text" class="form-control" name="clinic_address"
                                                value="<?php echo $doctor->clinic_address; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                value="<?php echo $doctor->address_line1; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Address Line 2</label>
                                            <input type="text" class="form-control" name="address_line2"
                                                value="<?php echo $doctor->address_line2; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <input type="text" class="form-control" id="city"
                                                name="city" value="<?php echo $doctor->city; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">State / Province</label>
                                            <input type="text" class="form-control" id="state"
                                                name="state" value="<?php echo $doctor->state; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Country</label>
                                            <input type="text" class="form-control" id="country"
                                                name="country" value="<?php echo $doctor->country; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Postal Code</label>
                                            <input type="text" id="pincode" class="form-control"
                                                name="postal_code" value="<?php echo $doctor->postal_code; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Contact Details -->

                        <!-- Pricing -->
                        <div class="card p-3" style="width:100%;">
                            <div class="card-body">
                                <h4 class="card-title">Pricing </h4>
                                <?php if ($doctor->pricing > 0) { ?>
                                Custom Price : <?php echo $doctor->pricing; ?>
                                <?php } else { ?>
                                Free : 0
                                <?php } ?>


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
                        </div>
                        <!-- /Pricing -->

                        <div class="card services-card">
                            <div class="card-body">
                                <h4 class="card-title">Services and Specialization</h4>
                                <div class="form-group">
                                    <label>Department</label>
                                    <?php

                                    use App\Models\Specialities;

                                    $spc = Specialities::all();

                                    ?>
                                    <select name="department" id="" class="input-tags form-control">
                                        @foreach ($spc as $sp)
                                            <option value=" {{ $sp->department }}">{{ $sp->department }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Note : Type & Press enter to add new
                                        services</small>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Specialization </label>
                                    <select name="specialization" id="" class="input-tags form-control">
                                        @foreach ($spc as $sp)
                                            <option value="{{ $sp->speciality }}">{{ $sp->speciality }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Note : Type & Press enter to add new
                                        specialization</small>
                                </div>
                            </div>
                        </div>
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
                                                        <input type="text" class="form-control"
                                                            name="bachelor_degree" value="<?php echo $doctor->bachelor_degree; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>College/Institute</label>
                                                        <input type="text" class="form-control"
                                                            name="bachelor_college" value="<?php echo $doctor->bachelor_college; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Year of Completion</label>
                                                        <input type="text" class="form-control"
                                                            name="bachelor_completion_year"
                                                            value="<?php echo $doctor->bachelor_completion_year; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Certificate</label>

                                                        <div class="mt-2">
                                                            @if ($doctor->bachelor_document)
                                                                <a href="/<?php echo $doctor->bachelor_document; ?>" target="_blank"
                                                                    class="btn-sm btn-info m-3">View</a>
                                                            @endif
                                                            <input type="file" name="bachelor_document">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Master Degree</label>
                                                        <input type="text" class="form-control"
                                                            name="master_degree" value="<?php echo $doctor->master_degree; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>College/Institute</label>
                                                        <input type="text" class="form-control"
                                                            name="master_college" value="<?php echo $doctor->master_college; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Year of Completion</label>
                                                        <input type="text" class="form-control"
                                                            name="master_completion_year"
                                                            value="<?php echo $doctor->master_completion_year; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Certificate</label>
                                                        @if ($doctor->master_document)
                                                            <div class="mt-2"><a href="/<?php echo $doctor->master_document; ?>"
                                                                    target="_blank"
                                                                    class="btn-sm btn-info m-3">View</a>
                                                        @endif
                                                        <input type="file" name="master_document">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
                                                    <input type="text" class="form-control"
                                                        name="experience_hospital_name"
                                                        value="<?php echo $doctor->experience_hospital_name; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>From</label>
                                                    <input type="text" class="form-control"
                                                        name="experience_from" value="<?php echo $doctor->experience_from; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <input type="text" class="form-control"
                                                        name="experience_to" value="<?php echo $doctor->experience_to; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input type="text" class="form-control" name="designation"
                                                        value="<?php echo $doctor->designation; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Experience letter</label>

                                                    @if ($doctor->experience_letter)
                                                        <div class="mt-2"><a href="/<?php echo $doctor->experience_letter; ?>"
                                                                target="_blank"
                                                                class="btn-sm btn-info m-3">View</a>
                                                    @endif
                                                    <input type="file" name="experience_letter">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Experience -->

                <!-- Registrations -->

                <div class="submit-section submit-btn-bottom float-left px-3">
                    <button type="submit" class="btn btn-primary submit-btn"
                        style="border-radius:8px;">Update</button>
                </div>


        </div>
        <!-- /Registrations -->
    </div>
</div>
</form>
<div class="card p-3 mb-3" style="width:100%;">
    <div class="card-body">
        <h4 class="card-title">Update Password</h4>
        <div class="experience-info mt-4">
            <div class="row form-row experience-cont">
                <div class="col-12 col-md-10 col-lg-11">
                    <p class="fw-1">If you are not changing the password keep it blank.*</p>
                    <form action="/update_doctor_password/{{$doctor->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <!-- HTML form -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Confirm Password Field -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="confirm_password">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary submit-btn mt-3"
        style="border-radius:8px;">Update</button>
                        </div>

                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

</div>

@include('inc_admins/footer')
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function displayImage() {
        var input = document.getElementById('photo-input');
        var image = document.getElementById('profile-image');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                image.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
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
            // var count = $("[type=checkbox]:checked").length;
            // $('#count').val($("[type=checkbox]:checked").length);
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
            // var count = $("[type=checkbox]:checked").length;
            // $('#count').val($("[type=checkbox]:checked").length);
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
            // var count = $("[type=checkbox]:checked").length;
            // $('#count').val($("[type=checkbox]:checked").length);
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
            // var count = $("[type=checkbox]:checked").length;
            // $('#count').val($("[type=checkbox]:checked").length);
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

{{-- password verify --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('confirm_password');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');

        function validatePassword() {
            if (passwordField.value.length < 8) {
                passwordError.textContent = 'Password must be at least 8 characters long.';
            } else {
                passwordError.textContent = '';
            }
        }

        function validateConfirmPassword() {
            if (confirmPasswordField.value !== passwordField.value) {
                confirmPasswordError.textContent = 'Passwords do not match.';
            } else {
                confirmPasswordError.textContent = '';
            }
        }

        passwordField.addEventListener('input', validatePassword);
        confirmPasswordField.addEventListener('input', validateConfirmPassword);

        // Prevent form submission if there are errors
        document.getElementById('updateForm').addEventListener('submit', function(event) {
            validatePassword();
            validateConfirmPassword();
            if (passwordError.textContent || confirmPasswordError.textContent) {
                event.preventDefault();
            }
        });
    });
</script>




</html>

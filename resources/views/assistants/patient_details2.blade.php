<?php require APPROOT . '/views/inc_assistant/header.php'; ?>
<!-- Breadcrumb -->
<?php
$patient_id = $data['patient_id'];
$doctor_id = $data['doctors_id'];
$patient = $data['get_patient_detail'];
$get_patient_detail_from_auth = $data['get_patient_detail_from_auth'];
?>
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Patient </li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Create Patient </h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php require APPROOT . '/views/inc_assistant/navbar.php'; ?>
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">

                        <!-- Create  Patient Profile Form -->
                        <form
                            action="<?php echo URLROOT; ?>/assistants/update_patient_doctor/<?php echo $patient_id; ?>/<?php echo $doctor_id; ?>"
                            method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="row form-row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <?php if (empty($patient->image)) { ?>
                                                <img src="<?php echo URLROOT; ?>/assets/img/patients/patient.jpg"
                                                    alt="User Image">
                                                <?php } else { ?>
                                                <img src="<?php echo URLROOT; ?>/uploads/<?php echo $patient->image; ?>"
                                                    alt="User Image">
                                                <?php } ?>
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" name="image">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $patient->fname; ?>"
                                            placeholder="Enter your first name" name="fname">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your last name"
                                            name="lname" value="<?php echo $patient->lname; ?>">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" class="form-control" placeholder="Enter Age"
                                            name="age" value="<?php echo $patient->age; ?>">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Blood Group</label>
                                        <select class="form-select form-control" name="blood_group">
                                            <option <?php if ($patient->blood_group == 'A-') {
                                                echo 'selected';
                                            } ?>>A-</option>
                                            <option <?php if ($patient->blood_group == 'A+') {
                                                echo 'selected';
                                            } ?>>A+</option>
                                            <option <?php if ($patient->blood_group == 'B-') {
                                                echo 'selected';
                                            } ?>>B-</option>
                                            <option <?php if ($patient->blood_group == 'B+') {
                                                echo 'selected';
                                            } ?>>B+</option>
                                            <option <?php if ($patient->blood_group == 'AB-') {
                                                echo 'selected';
                                            } ?>>AB-</option>
                                            <option <?php if ($patient->blood_group == 'AB+') {
                                                echo 'selected';
                                            } ?>>AB+</option>
                                            <option <?php if ($patient->blood_group == 'O-') {
                                                echo 'selected';
                                            } ?>>O-</option>
                                            <option <?php if ($patient->blood_group == 'O+') {
                                                echo 'selected';
                                            } ?>>O+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <input type="email" class="form-control" placeholder="Enter Email"
                                            name="email" value="<?php echo $patient->email; ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" value="<?php echo $get_patient_detail_from_auth->phone; ?>" class="form-control "
                                            placeholder="Enter Mobile No" readonly disabled>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Alternate Mobile</label>
                                        <input type="text" class="form-control " placeholder="Enter Mobile No"
                                            name="alt_mobile" value="<?php echo $patient->alt_mobile; ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Enter Address"
                                            name="address" value="<?php echo $patient->address; ?>">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city"
                                            placeholder="Enter City" value="<?php echo $patient->city; ?>">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" placeholder="Enter State"
                                            name="state" value="<?php echo $patient->state; ?>">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" class="form-control" placeholder="Enter Zip"
                                            name="zipcode" value="<?php echo $patient->zipcode; ?>">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" value="<?php echo $patient->country; ?>"
                                            placeholder="Enter Country" name="country">

                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">

                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                <br>
                                <br>
                                <a href="<?php echo URLROOT; ?>/assistants/start_consultation_for_patient2/<?php echo $patient_id; ?>/<?php echo $doctor_id; ?>"
                                    class="btn btn-secondary submit-btn"
                                    >Start Consultation</a>
                                <span>Please complete the form above and then click Start!</span>

                            </div>
                        </form>
                        <!-- /Create  Patient Profile Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Page Content -->





<?php require APPROOT . '/views/inc_assistant/footer.php'; ?>

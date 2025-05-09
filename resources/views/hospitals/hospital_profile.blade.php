@include('inc_hospitals/header')
<style>
    .profile-image img {
        margin-bottom: 1.5rem;
    }

    .profile-image {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        margin-bottom: 10px;


    }

    .profile-image img {
        border-radius: 50%;
        width: 120px;
        height: 120px;
        object-fit: cover;
    }

    .profile-menu {
        background-color: #fff;
        border: 1px solid #f0f0f0;
        padding: 0.9375rem 1.5rem;
    }

    .profile-header {
        background-color: #fff;
        border: 1px solid #f0f0f0;
        padding: 1.5rem;
    }

    .nav-tabs.nav-tabs-solid>li>a.active,
    .nav-tabs.nav-tabs-solid>li>a.active:hover,
    .nav-tabs.nav-tabs-solid>li>a.active:focus {
        background-color: #FF9600;
        border-color: #FF9600;
        color: #fff;
    }

    .nav-tabs.nav-tabs-solid {
        background-color: #fff;
        border: 0;
    }

    .align-items-center {
        align-items: center !important;
    }

    .col-auto {
        flex: 0 0 auto;
        width: auto;
    }

    .fa-map-marker-alt:before {
        content: "\f3c5";
    }
</style>
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Profile Settings</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_hospitals/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <!-- new akash -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    <a href="#">
                                        <img alt="User Image" src="/<?php echo $get_hospital_details->img1; ?>">
                                    </a>
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0"><?php echo $get_hospital_details->name; ?></h4>
                                    <h6 class="text-muted"><?php echo $get_hospital_details->email; ?></h6>
                                    <div class="user-Location"><i class="fa fa-map-marker-alt"></i>
                                        <?php echo $get_hospital_details->address; ?>, <br>
                                        <?php echo $get_hospital_details->city . ' ,' . $get_hospital_details->zipcode; ?><br>
                                        <?php echo ucwords($get_hospital_details->state . ', ' . $get_hospital_details->country); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab"
                                        href="#per_details_tab">Clinic/Hospitals Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Documents</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#password_tab2">Contact Person
                                        Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#password_tab4">Timing Schedule </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont">

                            <!-- Personal Details Tab -->
                            <div class="tab-pane fade show active" id="per_details_tab">

                                <!-- Personal Details -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                                    <p class="col-sm-10"><?php echo ucwords($get_hospital_details->name); ?></p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
                                                    <p class="col-sm-10"><?php echo $get_hospital_details->email; ?></p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
                                                    <p class="col-sm-10"><?php echo $get_hospital_details->phone; ?></p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-end mb-0">Address</p>
                                                    <p class="col-sm-10 mb-0"><?php echo $get_hospital_details->address; ?>,<br>
                                                        <?php echo ucwords($get_hospital_details->city . ' ' . $get_hospital_details->zipcode); ?>,<br>
                                                        <?php echo $get_hospital_details->state; ?>, <?php echo $get_hospital_details->country; ?>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Website Name
                                                    </p>
                                                    <p class="col-sm-10"><?php echo $get_hospital_details->website; ?></p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Type</p>
                                                    <p class="col-sm-10"><?php echo $get_hospital_details->hospital_name; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Edit Details Modal -->
                                        <div class="modal fade" id="edit_personal_details" aria-hidden="true"
                                            role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Personal Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="row form-row">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>First Name</label>
                                                                        <input type="text" class="form-control"
                                                                            value="John">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Last Name</label>
                                                                        <input type="text" class="form-control"
                                                                            value="Doe">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>
                                                                        <div class="cal-icon">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker"
                                                                                value="24-07-1983">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Email ID</label>
                                                                        <input type="email" class="form-control"
                                                                            value="johndoe@example.com">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Mobile</label>
                                                                        <input type="text" value="+1 202-555-0125"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <h5 class="form-title"><span>Address</span></h5>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Address</label>
                                                                        <input type="text" class="form-control"
                                                                            value="4663 Agriculture Lane">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>City</label>
                                                                        <input type="text" class="form-control"
                                                                            value="Miami">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>State</label>
                                                                        <input type="text" class="form-control"
                                                                            value="Florida">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Zip Code</label>
                                                                        <input type="text" class="form-control"
                                                                            value="22434">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Country</label>
                                                                        <input type="text" class="form-control"
                                                                            value="United States">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary w-100">Save
                                                                Changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Details Modal -->

                                    </div>


                                </div>
                                <!-- /Personal Details -->

                            </div>
                            <!-- /Personal Details Tab -->

                            <!-- Change Password Tab -->
                            <div id="password_tab" class="tab-pane fade">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Documents</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-6">
                                                <form>
                                                    <div class="form-group" style="margin-bottom:40px; ">
                                                        <label>GST</label><br>
                                                        <img alt="User Image" src="/<?php echo $get_hospital_details->gst; ?> "
                                                            height="200px;" width="300px;"
                                                            style="margin-left:150px;">

                                                    </div>
                                                    <div class="form-group" style="margin-bottom:40px;">
                                                        <label>License or government approval</label><br>
                                                        <img alt="User Image" src="/<?php echo $get_hospital_details->gov_license; ?> "
                                                            height="200px;" width="
															300px;"
                                                            style="margin-left:150px;">
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:40px;">
                                                        <label>Clinic/Hospitals Photos</label><br>
                                                        <img alt="User Image" src="/<?php echo $get_hospital_details->img2; ?> "
                                                            height="200px;" width="
															300px;"
                                                            style="margin-left:150px;margin-bottom:40px;">
                                                        <img alt="User Image" src="/<?php echo $get_hospital_details->img1; ?> "
                                                            height="200px;" width="
															300px;"
                                                            style="margin-left:150px;">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- person data -->
                            <div id="password_tab2" class="tab-pane fade">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Contact Person Details</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-6">
                                                <form>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name
                                                        </p>
                                                        <p class="col-sm-10"><?php echo $get_hospital_details->person_name; ?></p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Mobile
                                                        </p>
                                                        <p class="col-sm-10"><?php echo $get_hospital_details->person_phone_number; ?></p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end person data -->
                            <!-- time schedule -->
                            <div id="password_tab4" class="tab-pane fade">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Schedule Timings</h4>
                                        <div class="profile-box">
                                            <div class="row container-fluid">
                                                <div class="col-md-12">
                                                    <div class="card schedule-widget mb-0">

                                                        <!-- Schedule Header -->
                                                        <div class="schedule-header">

                                                            <!-- Schedule Nav -->
                                                            <div class="schedule-nav">
                                                                <ul class="nav nav-tabs nav-justified">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#slot_sunday">Sunday</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active"
                                                                            data-bs-toggle="tab"
                                                                            href="#slot_monday">Monday</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#slot_tuesday">Tuesday</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#slot_wednesday">Wednesday</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#slot_thursday">Thursday</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#slot_friday">Friday</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#slot_saturday">Saturday</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /Schedule Nav -->

                                                        </div>
                                                        <!-- /Schedule Header -->

                                                        <!-- Schedule Content -->
                                                        <div class="tab-content schedule-cont">

                                                            <!-- Sunday Slot -->
                                                            <div id="slot_sunday" class="tab-pane fade">
                                                                <h4 class="card-title d-flex justify-content-between">
                                                                    <span>Time Slots</span>
                                                                </h4>
                                                                <?php if ($get_hospital_details->operating_hours_date == 'Sunday') { ?>
                                                                <div class="doc-times">
                                                                    <div class="doc-slot-list">
                                                                        <?php echo $get_hospital_details->operating_hours_time; ?>
                                                                    </div>
                                                                </div>
                                                                <?php } else { ?>
                                                                <p class="text-muted mb-0">Not Available</p>
                                                                <?php } ?>
                                                            </div>
                                                            <!-- /Sunday Slot -->

                                                            <!-- Monday Slot -->
                                                            <div id="slot_monday" class="tab-pane fade">
                                                                <h4 class="card-title d-flex justify-content-between">
                                                                    <span>Time Slots</span>
                                                                </h4>
                                                                <!-- /Slot List -->
                                                                <?php if ($get_hospital_details->operating_hours_date == 'Monday') { ?>
                                                                <div class="doc-times">
                                                                    <div class="doc-slot-list">
                                                                        <?php echo $get_hospital_details->operating_hours_time; ?>
                                                                    </div>
                                                                </div>
                                                                <?php } else { ?>
                                                                <p class="text-muted mb-0">Not Available</p>
                                                                <?php } ?>
                                                            </div>
                                                            <!-- /Monday Slot -->

                                                            <!-- Tuesday Slot -->
                                                            <div id="slot_tuesday" class="tab-pane fade">
                                                                <h4 class="card-title d-flex justify-content-between">
                                                                    <span>Time Slots</span>
                                                                </h4>
                                                                <?php if ($get_hospital_details->operating_hours_date == 'Tuesday') { ?>
                                                                <div class="doc-times">
                                                                    <div class="doc-slot-list">
                                                                        <?php echo $get_hospital_details->operating_hours_time; ?> -->
                                                                    </div>
                                                                </div>
                                                                <?php } else { ?>
                                                                <p class="text-muted mb-0">Not Available</p>
                                                                <?php } ?>
                                                            </div>
                                                            <!-- /Tuesday Slot -->

                                                            <!-- Wednesday Slot -->
                                                            <div id="slot_wednesday" class="tab-pane fade">
                                                                <h4 class="card-title d-flex justify-content-between">
                                                                    <span>Time Slots</span>
                                                                </h4>
                                                                <?php if ($get_hospital_details->operating_hours_date == 'Wednesday') { ?>
                                                                <div class="doc-times">
                                                                    <div class="doc-slot-list">
                                                                        <?php echo $get_hospital_details->operating_hours_time; ?>
                                                                    </div>
                                                                </div>
                                                                <?php } else { ?>
                                                                <p class="text-muted mb-0">Not Available</p>
                                                                <?php } ?>
                                                            </div>
                                                            <!-- /Wednesday Slot -->

                                                            <!-- Thursday Slot -->
                                                            <div id="slot_thursday" class="tab-pane fade">
                                                                <h4 class="card-title d-flex justify-content-between">
                                                                    <span>Time Slots</span>
                                                                </h4>
                                                                <?php if ($get_hospital_details->operating_hours_date == 'Thursday') { ?>
                                                                <div class="doc-times">
                                                                    <div class="doc-slot-list">
                                                                        <?php echo $get_hospital_details->operating_hours_time; ?>
                                                                    </div>
                                                                </div>
                                                                <?php } else { ?>
                                                                <p class="text-muted mb-0">Not Available</p>
                                                                <?php } ?>
                                                            </div>
                                                            <!-- /Thursday Slot -->

                                                            <!-- Friday Slot -->
                                                            <div id="slot_friday" class="tab-pane fade">
                                                                <h4 class="card-title d-flex justify-content-between">
                                                                    <span>Time Slots</span>
                                                                </h4>
                                                                <?php if ($get_hospital_details->operating_hours_date == 'Friday') { ?>
                                                                <div class="doc-times">
                                                                    <div class="doc-slot-list">
                                                                        <?php echo $get_hospital_details->operating_hours_time; ?>
                                                                    </div>
                                                                </div>
                                                                <?php } else { ?>
                                                                <p class="text-muted mb-0">Not Available</p>
                                                                <?php } ?>
                                                            </div>
                                                            <!-- /Friday Slot -->

                                                            <!-- Saturday Slot -->
                                                            <div id="slot_saturday" class="tab-pane fade">
                                                                <h4 class="card-title d-flex justify-content-between">
                                                                    <span>Time Slots</span>
                                                                </h4>
                                                                <?php if ($get_hospital_details->operating_hours_date == 'Saturday') { ?>
                                                                <div class="doc-times">
                                                                    <div class="doc-slot-list">
                                                                        <?php echo $get_hospital_details->operating_hours_time; ?>
                                                                    </div>
                                                                </div>
                                                                <?php } else { ?>
                                                                <p class="text-muted mb-0">Not Available</p>
                                                                <?php } ?>
                                                            </div>
                                                            <!-- /Saturday Slot -->

                                                        </div>
                                                        <!-- /Schedule Content -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end time schedule -->
                            <!-- /Change Password Tab -->

                        </div>
                    </div>
                </div>
                <!-- end new akash  -->
            </div>
        </div>

    </div>
</div>
</div>
<!-- /Page Content -->
@include('inc_hospitals/footer')

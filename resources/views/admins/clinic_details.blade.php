@include('/inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="/<?php echo $get_clinics->aadhar_card; ?>">
                            </a>
                        </div>

                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0"><?php echo ucwords($get_clinics->name); ?></h4>
                            <h6 class="text-muted"><?php echo $get_clinics->email; ?></h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i>
                                <?php echo $get_clinics->phone; ?>, <br>
                                <?php echo $get_clinics->address; ?><br>
                                <?php echo ucwords($get_clinics->state); ?></div>
                        </div>

                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Documents</a>
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
                                            <p class="col-sm-10"><?php echo ucwords($get_clinics->name); ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Registrations</p>
                                            <p class="col-sm-10"><?php echo $get_clinics->registrations; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Registration Year
                                            </p>
                                            <p class="col-sm-10"><?php echo $get_clinics->registration_year; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Hospital Name</p>
                                            <p class="col-sm-10"><?php echo $get_clinics->hospital_name; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0">Website</p>
                                            <p class="col-sm-10 mb-0"><?php echo $get_clinics->website; ?>,<br>
                                                <?php echo ucwords($get_clinics->person_name); ?>,<br>
                                                <?php echo $get_clinics->state; ?>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Person phone number
                                            </p>
                                            <p class="col-sm-10"><?php echo $get_clinics->person_phone_number; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Details Modal -->
                                <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
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
                                                <label>Aadhar Card</label><br>
                                                <img alt="User Image" src="/<?php echo $get_clinics->aadhar_card; ?> " height="200px;"
                                                    width="300px;" style="margin-left:150px;">

                                            </div>
                                            <div class="form-group" style="margin-bottom:40px;">
                                                <label>Gst</label><br>
                                                <?php
                                                $file_path = $get_clinics->gst;
                                                $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                ?>
                                                @if ($extension == 'pdf')
                                                    <iframe src="/{{ $file_path }}"
                                                        style="width: 100%; height: 500px;"></iframe>
                                                @else
                                                    <img alt="User Image" src="/{{ $file_path }}" height="200px;"
                                                        width="300px;" style="margin-left:150px;">
                                                @endif
                                            </div>
                                            <div class="form-group" style="margin-bottom:40px;">
                                                <label>Gov Liencens</label><br>
                                                <?php
                                                $file_path = $get_clinics->gov_license;
                                                $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                ?>
                                                @if ($extension == 'pdf')
                                                    <iframe src="/{{ $file_path }}"
                                                        style="width: 100%; height: 500px;"></iframe>
                                                @else
                                                    <img alt="User Image" src="/{{ $file_path }}" height="200px;"
                                                        width="300px;" style="margin-left:150px;">
                                                @endif
                                            </div>
                                            <div class="form-group" style="margin-bottom:40px;">
                                                <label>Images</label><br>
                                                <img alt="User Image" src="/<?php echo $get_clinics->img1; ?> " height="200px;"
                                                    width="300px;" style="margin-left:150px;">

                                            </div>
                                            <div class="form-group" style="margin-bottom:40px;">
                                                <label>Images </label><br>
                                                <img alt="User Image" src="/<?php echo $get_clinics->img2; ?> " height="200px;"
                                                    width="300px;" style="margin-left:150px;">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Change Password Tab -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->
@include('/inc_admins/footer')

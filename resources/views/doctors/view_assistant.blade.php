@include('inc_doctor/header')


<!-- Breadcrumb -->
<div class="breadcrumb-bar">
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_doctor/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">

                        <!-- Profile Widget -->
                        <div class="card widget-profile pat-widget-profile">
                            <div class="card-body">
                                <div class="pro-widget-content">
                                    <div class="profile-info-widget">

                                        @if ($get_assistant->photo != null)
                                            <img class="booking-doc-img" alt="User Image"
                                                src="/uploads/assistant/<?php echo $get_assistant->photo; ?>"
                                                style="width: 100px">
                                        @else
                                            <img class="rounded-circle" src="{{ url('assets/profile2.jpg') }}"
                                                alt="" style="width: 100px">
                                        @endif
                                        <div class="profile-det-info">
                                            <h3>{{ $get_assistant->fname }} {{ $get_assistant->lname }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="patient-info">
                                    <div class="col ml-md-n2 profile-user-info">
                                        <div class="user-Location"><i class="fa fa-map-marker"></i>
                                            <?php echo $get_assistant->street; ?>, <br>
                                            <?php echo $get_assistant->city . ' ,' . $get_assistant->zip_code; ?><br>
                                            <?php echo ucwords($get_assistant->state . ', ' . $get_assistant->country); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Profile Widget -->
                    </div>

                    <div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                    <p class="col-sm-10"><?php echo ucwords($get_assistant->fname . ' ' . $get_assistant->lname); ?></p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Date of Birth</p>
                                    <p class="col-sm-10"><?php echo $get_assistant->dob; ?></p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
                                    <p class="col-sm-10"><?php echo $get_assistant->email; ?></p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
                                    <p class="col-sm-10"><?php echo $get_assistant->mobile; ?></p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Blood Group</p>
                                    <p class="col-sm-10"><?php echo $get_assistant->blood_group; ?></p>
                                </div>

                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form>
                                            <div class="form-group" style="margin-bottom:40px; ">
                                                <label>Aadhar Card</label><br>
                                                <img alt="User Image" src="/uploads/assistant/<?php echo $get_assistant->aadhar_card; ?> "
                                                    height="200px;" width="300px;" style="margin-left:150px;">

                                            </div>
                                            <div class="form-group" style="margin-bottom:40px;">
                                                <label>Pan Card</label><br>
                                                <img alt="User Image" src="/uploads/assistant/<?php echo $get_assistant->pan_card; ?> "
                                                    height="200px;" width="
															300px;"
                                                    style="margin-left:150px;">

                                            </div>
                                            <div class="form-group" style="margin-bottom:40px;">
                                                <label>Cancelled Cheque</label><br>
                                                <img alt="User Image" src="/uploads/assistant/<?php echo $get_assistant->cancelled_cheque; ?> "
                                                    height="200px;" width="300px;" style="margin-left:150px;">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /Page Content -->

@include('/inc_doctor/footer')

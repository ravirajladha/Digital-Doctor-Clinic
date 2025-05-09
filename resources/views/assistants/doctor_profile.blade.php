@include('inc_assistant/header')
<?php

use App\Models\Schedule_timing;
use Carbon\Carbon;

?>
<style>
    .doctor-img img {
        border-radius: 5px;
        object-fit: cover;

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
                        <li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Doctor Profile</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->

<div class="content">
    <div class="container">
        <?php

        use App\Models\Auth;
        use App\Models\Doctor;

        // print_r($doctor);

        ?>
        <!-- Doctor Widget -->
        <div class="card">
            <div class="card-body">
                <div class="doctor-widget">
                    <div class="doc-info-left">
                        <div class="doctor-img">
                            <?php if (empty($get_doctors_data->photo)) { ?>
                            <img src="inc_admins/assets/img/assistants/doctor-thumb-02.jpg" alt="User Image">
                            <?php } else { ?>
                            <img src="/<?php echo $get_doctors_data->photo; ?>" height="100%" width="100%" alt="User Image">
                            <?php } ?>

                        </div>
                        <div class="doc-info-cont">
                            <h4 class="doc-name"><?php echo ucwords($get_doctors_data->fname . ' ' . $get_doctors_data->lname); ?></h4>
                            <p class="doc-speciality"><?php echo $get_doctors_data->degree; ?></p>
                            <p class="doc-department"><img src="/assets/img/specialities/specialities-03.png"
                                    class="img-fluid" alt="Speciality"> <?php echo $get_doctors_data->department; ?></p>

                            <div class="clinic-details">

                            </div>
                            <div class="clinic-services">
                                <span><?php echo $get_doctors_data->specialization; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="doc-info-right">
                        <div class="clini-infos">
                            <ul>
                                <?php
                                $originalPrice = $get_doctors_data->pricing;

                                // Calculate the new price by adding 5%
                                $newPrice = $originalPrice + $originalPrice * 0.05;
                                ?>
                                <li><i class="fas fa-map-marker-alt"></i> <?php echo $get_doctors_data->city; ?>, <?php echo $get_doctors_data->country; ?>
                                </li>
                                <li><i class="far fa-money-bill-alt"></i> &#8377; {{ $newPrice }} per hour </li>
                            </ul>
                        </div>
                        <div class="doctor-action">

                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-bs-toggle="modal"
                                data-bs-target="#voice_call">
                                <i class="fas fa-phone"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-bs-toggle="modal"
                                data-bs-target="#video_call">
                                <i class="fas fa-video"></i>
                            </a>
                        </div>
                        <?php
                        $convert_doctors_to_consultant = Auth::where('email', $get_doctors_data->email)->first();
                        // print_r($doctor);
                        ?>
                        <div class="clinic-booking">
                            <a class="apt-btn" href="/assistants/videocall/<?php echo $convert_doctors_to_consultant->id; ?>">Connect With Doctor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Doctor Widget -->

        <!-- Doctor Details Tab -->
        <div class="card">
            <div class="card-body pt-0">

                <!-- Tab Menu -->
                <nav class="user-tabs mb-4">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" href="#doc_overview" data-bs-toggle="tab">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_business_hours" data-bs-toggle="tab">Consultation Time</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Tab Menu -->

                <!-- Tab Content -->
                <div class="tab-content">
                    <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                        <div class="row">
                            <div class="container">

                                <div class="col-md-12 col-lg-9">

                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About Me</h4>
                                        <p><?php echo $get_doctors_data->about; ?></p>
                                    </div>
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">Gender</h4>
                                        <p><?php echo $get_doctors_data->gender; ?></p>
                                    </div>
                                    <!-- /About Details -->
                                </div>

                                <!-- /Awards Details -->
                                <div class="service-list">
                                    <h4>Education</h4>
                                    <ul class="clearfix">
                                        <li>Bachelor Degree : <?php echo $get_doctors_data->bachelor_degree; ?></li>
                                        <li>Master Degree: <?php echo $get_doctors_data->master_degree; ?></li>

                                    </ul>
                                </div>
                                <!-- Specializations List -->
                                <div class="service-list">
                                    <h4>Specializations</h4>
                                    <ul class="clearfix">
                                        <li> specialization : <?php echo $get_doctors_data->specialization; ?></li>
                                        <li>Department :<?php echo $get_doctors_data->department; ?></li>

                                    </ul>
                                </div>
                                <!-- /Specializations List -->
                                <div class="service-list">
                                    <h4>Experience letter</h4>

                                    <ul class="clearfix">
                                        <li>Experience :
                                            @if ($get_doctors_data->experience_hospital_name)
                                                {{ $get_doctors_data->experience_hospital_name }}
                                            @else
                                                N/A
                                            @endif
                                        </li>

                                        <li>
                                            @if ($get_doctors_data->experience_letter)
                                                <a href="/{{ $get_doctors_data->experience_letter }}" target="_blank">
                                                    View</a>
                                            @else
                                                N/A
                                            @endif
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <div class="content ">
                                    <!-- Page Header -->
                                    <div class="page-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="page-title">Schedule Timings</h3>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                                    <li class="breadcrumb-item active">Schedule Timings</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Page Header -->
                                    <div class="col-md-10 col-lg-10 col-xl-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Schedule Timings</h4>
                                                        <div class="profile-box">
                                                            <div class="row">

                                                                <?php

                                                                $timging = Schedule_timing::where('doctor_id', $get_doctors_data->auth_id)->first();

                                                                ?>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card schedule-widget mb-0">

                                                                        <!-- Schedule Header -->
                                                                        <div class="schedule-header">

                                                                            <!-- Schedule Nav -->
                                                                            <div class="schedule-nav">
                                                                                <ul class="nav nav-tabs nav-justified">
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link "
                                                                                            data-bs-toggle="tab"
                                                                                            href="#slot_sunday">Sunday</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link active"
                                                                                            data-bs-toggle="tab"
                                                                                            href="#slot_monday">Monday</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link"
                                                                                            data-bs-toggle="tab"
                                                                                            href="#slot_tuesday">Tuesday</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link"
                                                                                            data-bs-toggle="tab"
                                                                                            href="#slot_wednesday">Wednesday</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link"
                                                                                            data-bs-toggle="tab"
                                                                                            href="#slot_thursday">Thursday</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link"
                                                                                            data-bs-toggle="tab"
                                                                                            href="#slot_friday">Friday</a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                        <a class="nav-link"
                                                                                            data-bs-toggle="tab"
                                                                                            href="#slot_saturday">Saturday</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <!-- /Schedule Nav -->

                                                                        </div>

                                                                        <div class="tab-content schedule-cont">
                                                                            <!-- Sunday Slot -->
                                                                            <div id="slot_sunday"
                                                                                class="tab-pane fade">
                                                                                <h4
                                                                                    class="card-title d-flex justify-content-between">
                                                                                    <span>Time Slots</span>
                                                                                    <a data-bs-toggle="modal"
                                                                                        data-bs-target="#add_time_slot_sunday">
                                                                                        <i
                                                                                            class="fa fa-plus-circle"></i>
                                                                                        Add Slot
                                                                                    </a>
                                                                                </h4>
                                                                                <!-- Slot List -->
                                                                                <?php

                                                                                if ($timging !== null) {
                                                                                    $timedisplay = explode(',', $timging->sunday);
                                                                                } else {
                                                                                    $timedisplay = null;
                                                                                }
                                                                                ?>

                                                                                <div class="doc-times">
                                                                                    @if ($timedisplay !== null)
                                                                                        @foreach ($timedisplay as $dsp)
                                                                                            <div class="doc-slot-list">
                                                                                                @if ($dsp !== '')
                                                                                                    <?php
                                                                                                    $time = Carbon::createFromFormat('H:i', $dsp);
                                                                                                    $formattedTime = $time->format('h:i A');
                                                                                                    ?>
                                                                                                    {{ $formattedTime }}
                                                                                                @endif
                                                                                                <a href="javascript:void(0)"
                                                                                                    class="delete_schedule">
                                                                                                    <i
                                                                                                        class="fa fa-times"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                                <!-- /Slot List -->
                                                                            </div>
                                                                            <!-- /Sunday Slot -->

                                                                            <!-- Monday Slot -->
                                                                            <div id="slot_monday"
                                                                                class="tab-pane fade show active">
                                                                                <h4
                                                                                    class="card-title d-flex justify-content-between">
                                                                                    <span>Time Slots</span>
                                                                                    <a data-bs-toggle="modal"
                                                                                        data-bs-target="#add_time_slot_monday">
                                                                                        <i
                                                                                            class="fa fa-plus-circle"></i>Add
                                                                                        Slot
                                                                                    </a>
                                                                                </h4>
                                                                                <?php
                                                                                if ($timging !== null) {
                                                                                    $timedisplay = explode(',', $timging->monday);
                                                                                } else {
                                                                                    $timedisplay = null;
                                                                                }

                                                                                ?>
                                                                                <div class="doc-times">
                                                                                    @if ($timedisplay !== null)
                                                                                        @foreach ($timedisplay as $dsp)
                                                                                            <div class="doc-slot-list">
                                                                                                @if ($dsp !== '')
                                                                                                    <?php
                                                                                                    $time = Carbon::createFromFormat('H:i', $dsp);
                                                                                                    $formattedTime = $time->format('h:i A');
                                                                                                    ?>
                                                                                                    {{ $formattedTime }}
                                                                                                @endif
                                                                                                <a href="javascript:void(0)"
                                                                                                    class="delete_schedule">
                                                                                                    <i
                                                                                                        class="fa fa-times"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>

                                                                            </div>

                                                                            <!-- /Monday Slot -->

                                                                            <!-- Tuesday Slot -->
                                                                            <div id="slot_tuesday"
                                                                                class="tab-pane fade">
                                                                                <h4
                                                                                    class="card-title d-flex justify-content-between">
                                                                                    <span>Time Slots</span>
                                                                                    <a data-bs-toggle="modal"
                                                                                        href="#add_time_slot_tuesday">
                                                                                        <i
                                                                                            class="fa fa-plus-circle"></i>
                                                                                        Add Slot</a>
                                                                                </h4>
                                                                                <?php
                                                                                if ($timging !== null) {
                                                                                    $timedisplay = explode(',', $timging->tuesday);
                                                                                } else {
                                                                                    $timedisplay = null;
                                                                                }
                                                                                ?>
                                                                                <div class="doc-times">
                                                                                    @if ($timedisplay !== null)
                                                                                        @foreach ($timedisplay as $dsp)
                                                                                            <div class="doc-slot-list">
                                                                                                @if ($dsp !== '')
                                                                                                    <?php
                                                                                                    $time = Carbon::createFromFormat('H:i', $dsp);
                                                                                                    $formattedTime = $time->format('h:i A');
                                                                                                    ?>
                                                                                                    {{ $formattedTime }}
                                                                                                @endif
                                                                                                <a href="javascript:void(0)"
                                                                                                    class="delete_schedule">
                                                                                                    <i
                                                                                                        class="fa fa-times"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <!-- /Tuesday Slot -->

                                                                            <!-- Wednesday Slot -->
                                                                            <div id="slot_wednesday"
                                                                                class="tab-pane fade">
                                                                                <h4
                                                                                    class="card-title d-flex justify-content-between">
                                                                                    <span>Time Slots</span>
                                                                                    <a data-bs-toggle="modal"
                                                                                        href="#add_time_wednesday">
                                                                                        <i
                                                                                            class="fa fa-plus-circle"></i>
                                                                                        Add Slot</a>
                                                                                </h4>
                                                                                <?php
                                                                                if ($timedisplay !== null) {
                                                                                    $timedisplay = explode(',', $timging->wednesday);
                                                                                } else {
                                                                                    $timedisplay = null;
                                                                                }
                                                                                ?>
                                                                                <div class="doc-times">
                                                                                    @if ($timedisplay !== null)
                                                                                        @foreach ($timedisplay as $dsp)
                                                                                            <div class="doc-slot-list">
                                                                                                @if ($dsp !== '')
                                                                                                    <?php
                                                                                                    $time = Carbon::createFromFormat('H:i', $dsp);
                                                                                                    $formattedTime = $time->format('h:i A');
                                                                                                    ?>
                                                                                                    {{ $formattedTime }}
                                                                                                @endif
                                                                                                <a href="javascript:void(0)"
                                                                                                    class="delete_schedule">
                                                                                                    <i
                                                                                                        class="fa fa-times"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <!-- /Wednesday Slot -->

                                                                            <!-- Thursday Slot -->
                                                                            <div id="slot_thursday"
                                                                                class="tab-pane fade">
                                                                                <h4
                                                                                    class="card-title d-flex justify-content-between">
                                                                                    <span>Time Slots</span>
                                                                                    <a data-bs-toggle="modal"
                                                                                        href="#add_time_thursday">
                                                                                        <i
                                                                                            class="fa fa-plus-circle"></i>
                                                                                        Add Slot</a>
                                                                                </h4>
                                                                                <?php
                                                                                if ($timging !== null) {
                                                                                    $timedisplay = explode(',', $timging->thursday);
                                                                                } else {
                                                                                    $timedisplay = null;
                                                                                }

                                                                                ?>
                                                                                <div class="doc-times">
                                                                                    @if ($timedisplay !== null)
                                                                                        @foreach ($timedisplay as $dsp)
                                                                                            <div class="doc-slot-list">
                                                                                                @if ($dsp !== '')
                                                                                                    <?php
                                                                                                    $time = Carbon::createFromFormat('H:i', $dsp);
                                                                                                    $formattedTime = $time->format('h:i A');
                                                                                                    ?>
                                                                                                    {{ $formattedTime }}
                                                                                                @endif
                                                                                                <a href="javascript:void(0)"
                                                                                                    class="delete_schedule">
                                                                                                    <i
                                                                                                        class="fa fa-times"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <!-- /Thursday Slot -->

                                                                            <!-- Friday Slot -->
                                                                            <div id="slot_friday"
                                                                                class="tab-pane fade">
                                                                                <h4
                                                                                    class="card-title d-flex justify-content-between">
                                                                                    <span>Time Slots</span>
                                                                                    <a data-bs-toggle="modal"
                                                                                        href="#add_time_friday">
                                                                                        <i
                                                                                            class="fa fa-plus-circle"></i>
                                                                                        Add Slot</a>
                                                                                </h4>
                                                                                <?php
                                                                                if ($timging !== null) {
                                                                                    $timedisplay = explode(',', $timging->friday);
                                                                                } else {
                                                                                    $timedisplay = null;
                                                                                }

                                                                                ?>
                                                                                <div class="doc-times">
                                                                                    @if ($timedisplay !== null)
                                                                                        @foreach ($timedisplay as $dsp)
                                                                                            <div class="doc-slot-list">
                                                                                                @if ($dsp !== '')
                                                                                                    <?php
                                                                                                    $time = Carbon::createFromFormat('H:i', $dsp);
                                                                                                    $formattedTime = $time->format('h:i A');
                                                                                                    ?>
                                                                                                    {{ $formattedTime }}
                                                                                                @endif
                                                                                                <a href="javascript:void(0)"
                                                                                                    class="delete_schedule">
                                                                                                    <i
                                                                                                        class="fa fa-times"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <!-- /Friday Slot -->

                                                                            <!-- Saturday Slot -->
                                                                            <div id="slot_saturday"
                                                                                class="tab-pane fade">
                                                                                <h4
                                                                                    class="card-title d-flex justify-content-between">
                                                                                    <span>Time Slots</span>
                                                                                    <a data-bs-toggle="modal"
                                                                                        href="#add_time_saturday">
                                                                                        <i
                                                                                            class="fa fa-plus-circle"></i>
                                                                                        Add Slot</a>
                                                                                </h4>
                                                                                <?php
                                                                                if ($timging !== null) {
                                                                                    $timedisplay = explode(',', $timging->saturday);
                                                                                } else {
                                                                                    $timedisplay = null;
                                                                                }
                                                                                ?>
                                                                                <div class="doc-times">
                                                                                    @if ($timedisplay !== null)
                                                                                        @foreach ($timedisplay as $dsp)
                                                                                            <div class="doc-slot-list">
                                                                                                @if ($dsp !== '')
                                                                                                    <?php
                                                                                                    $time = Carbon::createFromFormat('H:i', $dsp);
                                                                                                    $formattedTime = $time->format('h:i A');
                                                                                                    ?>
                                                                                                    {{ $formattedTime }}
                                                                                                @endif
                                                                                                <a href="javascript:void(0)"
                                                                                                    class="delete_schedule">
                                                                                                    <i
                                                                                                        class="fa fa-times"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <!-- /Saturday Slot -->

                                                                        </div>
                                                                    </div>
                                                                    <!-- /Schedule Content -->

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
                        </div>
                    </div>

                </div>
                <!-- /Business Hours Widget -->

            </div>
        </div>
    </div>
    <!-- /Business Hours Content -->

</div>
</div>
</div>
<!-- /Doctor Details Tab -->
</div>




@include('inc_assistant/footer')

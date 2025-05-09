<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    use App\Models\Patient;

    if (session('rexkod_digitaldrclinic_patient_id')); ?>
    <meta charset="utf-8">
    <title>Digital Doctor Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="/assets/img/obdu_favicon-removebg-preview.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="/assets/plugins/fancybox/jquery.fancybox.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/feather.css">

    <link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">

    <!-- Full Calander CSS -->
    <link rel="stylesheet" href="/assets/plugins/fullcalendar/fullcalendar.min.css">

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- /Top Header -->
        <?php
        $patient_data = Patient::where('patient_id', session('rexkod_digitaldrclinic_patient_id'))->first();

        ?>
        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand logo" style="height: 100px; width:300px; margin-top:30px; ">
                        <img src="/assets/img/Digital_doctor_logo.png" class="img-fluid" alt="Logo" height="100px">
                    </a>
                </div>
                <div class="main-menu-wrapper ms-auto">
                    <div class="menu-header">
                        <a href="#" class="menu-logo">
                            <img src="/assets/img/Digital_doctor_logo.png" class="img-fluid" alt="Logo">
                        </a>
                    </div>
                    <ul class="main-nav">
                </div>
                <ul class="nav header-navbar-rht">
                    <!-- User Menu -->
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <?php if ($patient_data && !empty($patient_data->image)) { ?>
                                <img src="/<?php echo $patient_data->image; ?>" width="31" alt="User Image" class="rounded-circle">
                                <?php } else { ?>
                                <img src="/assets/img/219983.png" width="31" alt="User Image"
                                    class="rounded-circle">
                                <?php } ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <?php if ($patient_data) { ?>
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <?php if (!empty($patient_data->image)) { ?>
                                    <img src="/<?php echo $patient_data->image; ?>" alt="User Image" class="avatar-img rounded-circle">
                                    <?php } else { ?>
                                    <img src="/assets/img/219983.png" alt="User Image"
                                        class="avatar-img rounded-circle">
                                    <?php } ?>
                                </div>
                                <div class="user-text">
                                    <h6><?php

                                    echo ucwords($patient_data->fname . ' ' . $patient_data->lname); ?></h6>
                                    <p class="text-muted mb-0">Patient</p>
                                </div>
                            </div>
                            <?php } ?>
                            <a class="dropdown-item" href="/patients/dashboard">Dashboard</a>
                            <a class="dropdown-item" href="/patients/profile_settings">Profile Settings</a>
                            <a class="dropdown-item" href="/patients/login">Logout</a>
                        </div>
                    </li>
                    <!-- /User Menu -->
                </ul>

            </nav>
        </header>
        <!-- /Header -->

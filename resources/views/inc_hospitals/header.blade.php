<!DOCTYPE html>
<html lang="en">
<?php if (!isset($_SESSION['rexkod_digitaldrclinic_hospital_id'])); ?>

<head>
    <meta charset="utf-8">
    <title>Digital Doctor Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="/asset_pages/img/fev.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="/assets/css/feather.css">


    <link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">

    <!-- Full Calander CSS -->
    <link rel="stylesheet" href="/assets/plugins/fullcalendar/fullcalendar.min.css">

</head>

<body>

    <?php ?>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                    </a>
                    <a href="/hospitals/dashboard" class="navbar-brand logo"
                        style="height: 100px; width:300px; margin-top:30px; ">
                        <img src="/assets/img/Digital_doctor_logo.png" class="img-fluid" alt="Logo" height="100px">
                    </a>
                </div>
                <div class="main-menu-wrapper ms-auto">
                    <div class="menu-header">
                        <a href="/hospitals/dashboard" class="menu-logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="nav header-navbar-rht">
                        <!--  User Menu -->
                        <li class="nav-item dropdown has-arrow logged-item">
                            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                                <span class="user-img">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="user-header">
                                    <div class="avatar avatar-sm">
                                        <img src="/{{ session('rexkod_digitaldrclinic_login_image') }}" alt="User Image"
                                            class="avatar-img rounded-circle">
                                    </div>
                                    <div class="user-text">
                                        <h6>Welcome</h6>
                                        <p class="text-muted mb-0"></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="/hospitals/dashboard">Dashboard</a>
                                <a class="dropdown-item" href="/hospitals/hospital_profile">Profile Settings</a>
                                <a class="dropdown-item" href="/hospitals/login">Logout</a>
                            </div>
                        </li>
                        <!-- /User Menu -->

                    </ul>
            </nav>
        </header>
        <!-- /Header -->

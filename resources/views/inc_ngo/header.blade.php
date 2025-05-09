<!DOCTYPE html>
<html lang="en">

	@php
		session_start();
		if(session('rexkod_digitaldrclinic_ngo_id')){

		} else{
			header('Location: /ngo/login');
			exit;
		}
	@endphp

	<head>
		<meta charset="utf-8">
		<title>Digital Doctor Clinic</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<!-- Favicons -->
		<link href="/asset_pages/img/fev.png" rel="icon">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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

		<!-- Custom CSS -->
		<link rel="stylesheet" href="/asset_pages/css/review.css">

	</head>

	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);"></a>
						<a href="/ngo/dashboard" class="navbar-brand logo" style="height: 100px; width:300px; margin-top:30px; ">
							<img src="/assets/img/Digital_doctor_logo.png" class="img-fluid" alt="Logo" style="width: 160px; height: 57px;">
						</a>
					</div>

					<ul class="nav header-navbar-rht">
						<!--  User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
								<span class="user-img">
									{{session('rexkod_digitaldrclinic_ngo_name') ? session('rexkod_digitaldrclinic_ngo_name') : 'Guest'}}
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<div class="user-header">
									<div class="avatar avatar-sm">
									</div>
									<div class="user-text">
										<h6>Welcome</h6>
									</div>
								</div>
								<a class="dropdown-item" href="/ngo/ngo_dashboard">Dashboard</a>
								<a class="dropdown-item" href="/ngo/ngo_profile">Profile Settings</a>
								<a class="dropdown-item" href="/ngo/logout">Logout</a>
							</div>
						</li>
						<!-- /User Menu -->
					</ul>
				</nav>
			</header>
			<!-- /Header -->

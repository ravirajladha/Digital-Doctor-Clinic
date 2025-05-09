@php
	if(session()->has('rexkod_digitaldrclinic_assistant_phone')){

	} else {
		header('Location: /assistants/login');
		exit;
	}
@endphp

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Digital Doctor Clinic</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="/asset_pages/img/fev.png">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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

			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);"></a>
						<a href="/assistants/dashboard" class="navbar-brand logo" style="width:230px; ">
							<img src="/assets/img/Digital_doctor_logo.png" class="img-fluid" alt="Logo" height="70px">
						</a>
					</div>
					<div class="main-menu-wrapper ms-auto">
						<div class="menu-header">
							<a href="#" class="menu-logo">
								<img src="/assets/img/Digital_doctor_logo.png" class="img-fluid" alt="Logo">
							</a>
						</div>
						<ul class="main-nav">
							<ul class="nav header-navbar-rht">
								<!--  User Menu -->
								<li class="nav-item dropdown has-arrow logged-item">
									<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
										<span class="user-img">
											<img class="rounded-circle" src="/uploads/assistant/{{session('rexkod_digitaldrclinic_profile_image')}}" width="31" alt="{{ session('rexkod_digitaldrclinic_assistant_name') ? session('rexkod_digitaldrclinic_assistant_name') : 'Guest'}}">
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<div class="user-header">
											<div class="avatar avatar-sm">
												<img src="/uploads/assistant/{{session('rexkod_digitaldrclinic_profile_image')}}" alt="User Image" class="avatar-img rounded-circle">
											</div>
											<div class="user-text">
												<h6>Welcome</h6>
												<p class="text-muted mb-0"></p>
											</div>
										</div>
										<a class="dropdown-item" href="/assistants/dashboard">Dashboard</a>
										<a class="dropdown-item" href="/assistants/profile_settings">Profile Settings</a>
										<a class="dropdown-item" href="/assistants/logout">Logout</a>
									</div>
								</li>
								<!-- /User Menu -->
							</ul>
						</ul>
					</div>
				</nav>
			</header>
			<!-- /Header -->

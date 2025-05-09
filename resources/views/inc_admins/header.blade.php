@php
    if(session()->has('rexkod_digitaldrclinic_admin_phone')){

    } else {
        header('Location: /admins/login');
        exit;
    }
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Digital Doctor Clinic</title>
          <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="expires" content="0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/asset_pages/img/fev.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="/assets_admin/css/feathericon.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets_admin/css/style.css">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="/assets_admin/plugins/morris/morris.css">

    <!-- Sweet Alert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">

    <!-- Custom Styles -->
    <style>
        #customeback {
			background-image: linear-gradient(to right, #00ccff, #ff2994);
		}

		.sidebar {
			background-color: #00ccff;
			max-height: 100vh; /* Set a maximum height for the sidebar */
			overflow-y: auto; /* Add a scrollbar to the sidebar if content overflows */
			position: fixed;
			top: 60px;
			left: 0;
			width: 250px;
			box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
		}

        #sidebar.closed {
            display: none; /* Hides the sidebar when it has the 'closed' class */
        }

        .page-wrapper.closed{
            margin-left: 0;;
        }


		.sidebar-menu li a:hover {
			color: #ff2994;
		}

		.sidebar-menu>ul>li>a:hover {
			background-color: #ff2994;
			color: #fff;
		}

		.sidebar-menu>ul>li.active>a:hover {
			background-color: #ff2994;
			color: #fff;
		}

		.sidebar-menu li.active a {
			background-color: #ff2994;
			color: #fff;
		}
		.header-left{

		}
		.main-wrapper {
			width: 100%;
			height: 0vh;
			min-height: 0vh;
		}

        @media(max-width:768px){
            div.page-wrapper{
                margin-left: 0 !important;
            }
            .sidebar{
                display: none;
            }
            #sidebar.open{
                display: inline-block;
                width: 100%;
            }
        }

        @media(min-width:768px){
            .mobile-menu-toggle{
                display: none;
            }
        }

        .mybtn{
        background: linear-gradient(to right, #00ccff, #ff2994);
       }
    </style>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS and JS -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>

     <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
       <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left" style="background-color:#ffffff">
            <a href="/admins/index" class="logo">
                <img src="/assets/img/Digital_doctor_logo.png" alt="Logo">
            </a>
            <a href="/admins/index" class="logo logo-small">
                <img src="/assets/img/obdu-icon.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <!-- /Logo -->

        {{-- <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a> --}}

        <!-- Mobile Menu Toggle -->
        <a href="javascript:void(0);" class="mobile-menu-toggle">
            <i class="fa fa-bars" style="margin: 4%; font-size:larger; position:relative; z-index:2"></i>
        </a>
        <!-- /Mobile Menu Toggle -->

        <!-- Header Right Menu -->
        <ul class="nav user-menu">

            <!-- User Menu -->
			<li class="nav-item dropdown has-arrow">
				<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
					<span class="user-img"><img class="rounded-circle" src="/assets_admin/img/profiles/adminimg.jpeg" width="31" alt="Ryan Taylor"></span>
				</a>
				<div class="dropdown-menu">
					<div class="user-header">
						<div class="avatar avatar-sm">
							<img src="/assets_admin/img/profiles/adminimg.jpeg" alt="User Image" class="avatar-img rounded-circle">
						</div>
						<div class="user-text">
							<h6>Admin Name</h6>
							<p class="text-muted mb-0">Administrator</p>
						</div>
					</div>
					<a class="dropdown-item" href="/admins/admin_profile">My Profile</a>
					<a class="dropdown-item" href="/admins/admin_profile">Settings</a>
					<a class="dropdown-item" href="/logout">Logout</a>
				</div>
			</li>
            <!-- /User Menu -->
        </ul>
        <!-- /Header Right Menu -->

    </div>
    <!-- /Header -->

    <!-- Include Navbar -->
    @include('inc_admins/navbar')

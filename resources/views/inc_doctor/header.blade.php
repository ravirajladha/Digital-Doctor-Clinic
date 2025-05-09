<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>

    <style>
        .fe-bell:before {
            content: "\f108";
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        @media only screen and (max-width: 991.98px) {

            .header-navbar-rht.nav>li>a:hover i,
            .header-navbar-rht.nav>li>a:focus i {
                color: #fff;
            }
        }

        .header-navbar-rht.nav>li>a:hover i,
        .header-navbar-rht.nav>li>a:focus i {
            color: #333;
        }

        .header-navbar-rht.nav>li>a>i {
            font-size: 1.5rem;
            line-height: 60px;
        }

        .header-navbar-rht.dropdown-menu {
            min-width: 200px;
            padding: 0;
        }


        .notifications .noti-content {
            height: 290px;
            width: 350px;
            overflow-y: auto;
            position: relative;
        }

        .notification-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .notifications ul.notification-list>li {
            margin-top: 0;
            border-bottom: 1px solid #f5f5f5;
        }

        .topnav-dropdown-header,
        .topnav-dropdown-footer {
            font-size: 14px;
            height: 40px;
            line-height: 40px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .topnav-dropdown-header {
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        .topnav-dropdown-header .notification-title {
            color: #333;
            display: block;
            float: left;
            font-size: 14px;
        }

        .notifications .media:last-child {
            border-bottom: none;
        }

        .notifications .media {
            margin-top: 0;
            border-bottom: 1px solid #f5f5f5;
        }

        .d-flex {
            display: flex !important;
        }

        .topnav-dropdown-header .clear-noti {
            color: #f83f37;
            float: right;
            font-size: 12px;
            text-transform: uppercase;
        }

        .topnav-dropdown-footer {
            border-top: 1px solid #eee;
        }

        .notifications .media>.avatar {
            margin-right: 10px;
        }

        .avatar-sm {
            width: 2.5rem;
            height: 2.5rem;
        }

        .avatar {
            position: relative;
            display: inline-block;
            width: 3rem;
            height: 3rem;
        }

        .flex-grow-1 {
            flex-grow: 1 !important;
        }

        .header-navbar-rht.nav>li>a .badge {
            background-color: #ff9600;
            display: block;
            font-size: 10px;
            font-weight: bold;
            min-height: 15px;
            min-width: 15px;
            position: absolute;
            right: 3px;
            color: #fff;
            top: 18px;
            right: 22px;
        }

        .rounded-pill {
            border-radius: 50rem !important;
        }

        /* luxiorious button */

        .luxury-button {
            color: white;
            border: none;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            outline: none;
        }

        .luxury-button:hover {
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }

        .luxury-button:active {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
            transform: translateY(1px);
        }
    </style>
</head>

<body>
    <?php

    use App\Models\Notification;
    $notifications = Notification::where('status', null)->orderBy('id', 'desc')->get();
    $id = session('rexkod_digitaldrclinic_doctor_id');

    $filteredNotifications = $notifications->filter(function ($notification) use ($id) {
        $rejectedDoctorIds = explode(',', $notification->reject_doctor_id);
        return !in_array($id, $rejectedDoctorIds);
    });

    ?>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);"></a>
                    <a href="/doctors/dashboard" class="navbar-brand logo"
                        style="height: 100px; width:237px; margin-top:30px; ">
                        <img src="/assets/img/Digital_doctor_logo.png" class="img-fluid" alt="Logo" height="100px">
                    </a>
                </div>
                <div class="main-menu-wrapper ms-auto">
                    <div class="menu-header">
                        <a href="/doctors/dashboard" class="menu-logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="nav header-navbar-rht">
                        <!-- Notifications -->
                        <li class="nav-item dropdown noti-dropdown" onclick="myFunction()">
                            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">


                                <i class="bi bi-bell-fill"></i>
                                @if (!$filteredNotifications->isEmpty())
                                    <span class="badge rounded-pill"></span>
                                @endif
                            </a>
                            <div class="dropdown-menu notifications"
                                style="position: absolute;inset: 0px 0px auto auto;margin: 0px;transform: translate3d(0.333313px, 62px, 0px);">
                                <div class="topnav-dropdown-header">
                                    <span class="notification-title">Notifications </span>
                                    <button class="btn btn-sm btn-danger rounded-pill luxury-button"
                                        onclick="rejectAllNotifications(event)">Clear All</button>
                                </div>
                                <div class="noti-content">

                                    <ul class="notification-list" id="test_description">
                                        @if ($filteredNotifications)
                                            @foreach ($filteredNotifications as $notification)
                                                @if ($notification->doctor_id == $id)
                                                    <div class="card m-1 notification" style="border-color: #333"
                                                        id="notification-{{ $notification->id }}"
                                                        data-id={{ $notification->id }}>
                                                        <div class="card-body p-2">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <h6 class="m-0 p-0">Patient Consultation Private
                                                                    </h6>
                                                                    <hr class="m-1">
                                                                    @if (optional($notification->notiPatient)->fname)
                                                                        <p class="mb-0">
                                                                            {{ $notification->notiPatient->fname }} is
                                                                            waiting for consultation</p>
                                                                    @endif

                                                                </div>
                                                                <div
                                                                    class="col-3 d-flex justify-content-center align-items-center">
                                                                    <div class="d-flex flex-row">
                                                                        @if (optional($notification->notiPatient)->fname)
                                                                            <form action="" method=""
                                                                                class="d-flex flex-row">
                                                                                @csrf
                                                                                <a href="/doctors/video_call/{{ $notification->id }}"
                                                                                    type="submit" name="accept"
                                                                                    value="1"
                                                                                    class="btn btn-sm btn-success rounded-circle luxury-button mb-1 me-1"
                                                                                    style="background: linear-gradient(145deg, #5ff563, #39a93f); width: 30px; height: 30px;"
                                                                                    target="_blank">
                                                                                    <i class="fas fa-check"></i></a>
                                                                                </button>

                                                                            </form>
                                                                        @endif
                                                                        <button type="" name="reject"
                                                                            id="{{ $notification->id }}" value="0"
                                                                            class="btn btn-sm btn-danger rounded-pill luxury-button"
                                                                            style="background: linear-gradient(145deg, #f15e5e, #c12d2d); width: 30px; height: 30px;"
                                                                            onclick="notificationreject(event,{{ $notification->id }})">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($notification->doctor_id == '')
                                                    <div class="card m-1 notification" style="border-color: #333"
                                                        id="notification-{{ $notification->id }}"
                                                        data-id={{ $notification->id }}>
                                                        <div class="card-body p-2">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <h6 class="m-0 p-0">Patient Consultation Public</h6>
                                                                    <hr class="m-1">
                                                                    @if (optional($notification->notiPatient)->fname)
                                                                        <p class="mb-0">
                                                                            {{ $notification->notiPatient->fname }} is
                                                                            waiting for consultation</p>
                                                                    @endif

                                                                </div>
                                                                <div
                                                                    class="col-3 d-flex justify-content-center align-items-center">
                                                                    <div class="d-flex flex-row">
                                                                        @if (optional($notification->notiPatient)->fname)
                                                                            <form action="" method=""
                                                                                class="d-flex flex-row">
                                                                                @csrf
                                                                                <a href="/doctors/video_call/{{ $notification->id }}"
                                                                                    type="submit" name="accept"
                                                                                    value="1"
                                                                                    class="btn btn-sm btn-success rounded-circle luxury-button mb-1 me-1"
                                                                                    style="background: linear-gradient(145deg, #5ff563, #39a93f); width: 30px; height: 30px;"
                                                                                    target="_blank">
                                                                                    <i class="fas fa-check"></i></a>
                                                                                </button>

                                                                            </form>
                                                                        @endif
                                                                        <button type="" name="reject"
                                                                            id="{{ $notification->id }}"
                                                                            value="0"
                                                                            class="btn btn-sm btn-danger rounded-pill luxury-button"
                                                                            style="background: linear-gradient(145deg, #f15e5e, #c12d2d); width: 30px; height: 30px;"
                                                                            onclick="notificationreject(event,{{ $notification->id }})">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                    </ul>
                                    @endif
                                </div>
                                <div class="topnav-dropdown-footer">
                                    <a href="#">View all Notifications</a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown has-arrow logged-item">
                            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                                <span class="user-img">
                                    <img src="/{{ session('rexkod_digitaldrclinic_profile_photo') }}"
                                        alt="{{ session('rexkod_digitaldrclinic_doctor_name') ? session('rexkod_digitaldrclinic_doctor_name') : 'Guest' }}"
                                        class="avatar-img rounded-circle">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="user-header">
                                    <div class="avatar avatar-sm">
                                        <img src="/{{ session('rexkod_digitaldrclinic_profile_photo') }}"
                                            alt="{{ session('rexkod_digitaldrclinic_doctor_name') ? session('rexkod_digitaldrclinic_doctor_name') : 'Guest' }}"
                                            class="avatar-img rounded-circle">
                                    </div>
                                    <div class="user-text">
                                        <h6>Welcome</h6>
                                        <p class="text-muted mb-0">
                                            {{ session('rexkod_digitaldrclinic_doctor_name') ? session('rexkod_digitaldrclinic_doctor_name') : 'Guest' }}
                                        </p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="/doctors/dashboard">Dashboard</a>
                                <a class="dropdown-item" href="/doctors/doctor_profile_settings">My Profile</a>
                                <a class="dropdown-item" href="/doctors/logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <script>
            $(document).ready(function() {
                function myFunction() {
                    setInterval($(document).ready(function() {
                        fetch_user();
                    }), 5000);

                    function fetch_user() {
                        $.ajax({
                            url: '/doctors/fetch_notification_data',
                            type: 'POST',
                            success: function(res) {
                                document.getElementById("test_description").innerHTML = res;
                            }
                        });
                    }
                };
            });

            function notificationreject(event, notificationId) {
                event.preventDefault();
                $.ajax({
                    url: '/doctors/notification/reject',
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        notification: notificationId,
                    },
                    success: function(res) {
                        $('#notification-' + notificationId).slideUp('slow', function() {
                            $(this).remove();
                        });
                    }
                });
                return false;
            }


            function rejectAllNotifications(event) {

                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will reject all notifications. Do you want to proceed?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, reject all!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var notifications = document.querySelectorAll('.notification');
                        // Extract notification ids
                        var notificationIds = [];
                        notifications.forEach(function(notification) {
                            notificationIds.push(notification.getAttribute('data-id'));
                        });
                        $.ajax({
                            url: '/doctors/notification/rejectAll',
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                notifications: notificationIds,
                            },
                            success: function(res) {
                                // Slide up and remove all notification elements
                                $('.notification').slideUp('slow', function() {
                                    $(this).remove();
                                });
                            }
                        });
                    }
                })
                return false;
            }
        </script>

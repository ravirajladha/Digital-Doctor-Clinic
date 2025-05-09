<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Digital Doctor Clinic</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/asset_pages/img/fev.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets_admin/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets_admin/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets_admin/css/style.css">

</head>
<style>
    .login-wrapper .loginbox .login-left {
        align-items: center;
        background: linear-gradient(180deg, #0e8a8a, #000000);
    }
    /* For mobile screens */
@media (max-width: 767px) {
    .loginbox img {
        width: 50%; /* Adjust as needed */
    }
}

</style>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body" style="background-image: linear-gradient(to right, #00ccff, #ff2994);">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-center">
                                    <img src="/assets/img/Admin-login.png" width="100%" height="auto" alt="" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="login-right">
                                    <div class="login-right-wrap">
                                        <h2 style="text-align: center; font-weight: 1000;"> Admin Login</h2>
                                        <!-- Form -->
                                        <form action="/admin_login" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="username"
                                                    placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="password"
                                                    placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-rounded w-100 " type="submit"
                                                    style="background-image: linear-gradient(to right, #00ccff, #ff2994); border: none;">Login</button>
                                            </div>
                                        </form>
                                        <!-- /Form -->
                                        <div class="form-group">
                                            <select class="form-select"
                                                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                <option value="/admins/login">Admin</option>
                                                <option value="/sub_admins/login">Sub Admin</option>
                                                <option value="/doctors/login">Doctor</option>
                                                <option value="/assistants/login">Assistant</option>
                                                <option value="/patients/login">Patient</option>
                                                <option value="/hospitals/login">Hospital</option>
                                                <option value="/ngo/login">Ngo</option>
                                            </select>
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
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="/assets_admin/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="/assets_admin/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="/assets_admin/js/script.js"></script>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (!empty(session()->get('failed')))
    <script type="text/javascript">
        Swal.fire({
            icon: 'warning',
            title: '{{ session('failed') }}',
            showConfirmButton: false,
            timer: 2000,
            customClass: {
                popup: 'sweetalert-message' // Apply custom CSS class to the message
            }
        });
    </script>
    @php
        session()->forget('failed');
    @endphp
@endif

@if (!empty(session()->get('success')))
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000,
            customClass: {
                popup: 'sweetalert-message' // Apply custom CSS class to the message
            }
        });
    </script>
    @php
        session()->forget('success');
    @endphp
@endif

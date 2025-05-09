@include('inc_doctor/header')
<style>


</style>


<!-- Page Content -->
<div class="content">
    <div class="container">

        <!-- Call Wrapper -->
        <div class="call-wrapper">
            <div class="call-main-row">
                <div class="call-main-wrapper">
                    <div class="call-view">
                        <div class="call-window">

                            <!-- Call Header -->
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details me-auto">
                                        <div class="float-start user-img">
                                            <a class="avatar avatar-sm me-2" href="#" title="Julio Hart">
                                                <img src="/assets/img/patients/patient1.jpg" alt="User Image"
                                                    class="rounded-circle">
                                                <span class="status online"></span>
                                            </a>
                                        </div>
                                        <div class="user-info float-start">
                                            <a href="#"><span>Julio Hart</span></a>
                                            <span class="last-seen">Online</span>
                                        </div>
                                    </div>
                                    <ul class="nav float-end custom-menu">
                                        <li class="nav-item dropdown dropdown-action">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-cog"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:void(0)" class="dropdown-item">Settings</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Call Header -->

                            <!-- Call Contents -->
                            <div class="call-contents">
                                <div class="call-content-wrap">
                                    <div class="voice-call-avatar">
                                        <img src="/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image"
                                            class="call-avatar">
                                        <span class="username">Dr. Mary Nielson</span>
                                        <span class="call-timing-count">00:59</span>
                                    </div>
                                    <div class="call-users">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="/assets/img/patients/patient1.jpg" class="img-fluid"
                                                        alt="User Image">
                                                    <span class="call-mute"><i
                                                            class="fa fa-microphone-slash"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /Call Contents -->

                            <!-- Call Footer -->
                            <div class="call-footer">
                                <div class="call-icons">
                                    <ul class="call-items">
                                        <li class="call-item">
                                            <a href="/doctors/video_call" title="Enable Video" data-placement="top"
                                                data-bs-toggle="tooltip">
                                                <i class="fas fa-video camera"></i>
                                            </a>
                                        </li>
                                        <li class="call-item">
                                            <a href="#" title="Mute" data-placement="top"
                                                data-bs-toggle="tooltip">
                                                <i class="fa fa-microphone microphone"></i>
                                            </a>
                                        </li>
                                        <li class="call-item">
                                            <a href="#" title="Add User" data-placement="top"
                                                data-bs-toggle="tooltip">
                                                <i class="fa fa-user-plus"></i>
                                            </a>
                                        </li>
                                        <li class="call-item">
                                            <a href="#" title="Add Prescription" data-placement="top"
                                                data-bs-toggle="modal" data-bs-target="#appt_details">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    style="height:25px;width:25px; fill:#757575;"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li
                                            style="background-color: #f06060;
    border-radius: 50px;
    color: #fff;
    display: inline-block;
    line-height: 10px;
    padding: 10px 25px;
	margin-top:20px;
    text-transform: uppercase;">
                                            <a href="/doctors/dashboard">
                                                <i class="material-icons" style="color:white">call_end</i>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <!-- /Call Footer -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /Call Wrapper -->

    </div>


</div>



<!-- /Page Content -->



@include('inc_doctor/footer')

<!-- Appointment Details Modal -->
<div class="modal  custom-modal " id="appt_details" style="width:500px;height:auto; margin-left:65%;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Prescription Form</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col add-more-item text-end"><a href="/doctors/referrals" class="add-experience"><i
                                class="fa fa-plus-circle"></i> Refer Patient</a></div>
                    <div class="col add-more-item text-end"><button class="add-experience"
                            style="border:none;    color: #ff9600;
    font-weight: 500;background-color:transparent;"><i
                                class="fa fa-plus-circle"></i> Add Item</button></div>
                    <div class="col add-more-item text-end"><a href="/doctors/add_test" class="add-experience"><i
                                class="fa fa-plus-circle"></i> Add Test</a></div>
                </div>

                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th style="min-width: 200px">Name</th>
                                        <th style="min-width: 80px;">Quantity</th>
                                        <th style="min-width: 80px">Days</th>
                                        <th style="min-width: 100px;">Time</th>
                                        <th style="min-width: 80px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text">
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"> Morning
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"> Afternoon
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"> Evening
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"> Night
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="btn bg-danger-light trash"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center">
                                <thead>
                                    <tr>
                                        <th style="min-width: 200px">Instructions</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <textarea name="" id=""class="form-control" cols="20" rows="5"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Submit Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            <button type="reset" class="btn btn-secondary submit-btn">Clear</button>
                        </div>
                    </div>
                </div>

                <!-- /Submit Section -->
                <!-- /Prescription Item -->

            </div>
        </div>
    </div>
</div>
<!-- /Appointment Details Modal -->

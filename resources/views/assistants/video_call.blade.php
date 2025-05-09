@include('inc_assistant/header')
<header>
    <link href="/assets/css/app.css" rel="stylesheet" type="text/css">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
</header>
<style>
    .alert_doctor {
        display: flex;
        color: none;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<!-- Page Content -->
<div class="content" style="padding: 0;">
    <div class="container-fluid">
        <div class="row">
            @include('inc_assistant/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">

                <!-- Call Wrapper -->
                <div class="call-wrapper" style="height: 90vh;">
                    <div class="call-main-row">
                        <div class="call-main-wrapper">
                            <div class="call-view">
                                <div class="call-window">
                                    <?php

                                    use App\Models\Patient;

                                    $profile = Patient::where('email', $authPatient->email)->first();
                                    ?>
                                    <!-- Call Header -->
                                    <div class="fixed-header">
                                        <div class="navbar">
                                            <div class="user-details">
                                                <div class="float-start user-img">
                                                    <a class="avatar avatar-sm me-2" href="#" title="Doctor">
                                                        @if ($profile->image)
                                                            <img src="/{{ $profile->image }}" alt="User Image"
                                                                class="rounded-circle">
                                                        @else
                                                            <img src="/assets/img/patients/patient1.jpg"
                                                                alt="User Image" class="rounded-circle">
                                                        @endif
                                                        <span class="status online"></span>
                                                    </a>
                                                </div>
                                                <div class="user-info float-start">
                                                    <a href="#"><span>{{ $authPatient->name }}</span>
                                                        {{ $consultation_id }}</a>
                                                    <span class="last-seen">Online</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert_doctor">
                                        @if (session('error'))
                                            <div class="alert alert-danger" id="errorAlert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- /Call Header -->

                                    <div class="call-contents">
                                        <div class="call-content-wrap">
                                            <div class="user-video" style="display: flex; justify-content:center;">
                                                {{-- <div id="otEmbedContainer"> --}}
                                                    <iframe
                                                        src="https://tokbox.com/embed/embed/ot-embed.js?embedId=6a569d3f-ab94-4702-ad56-ef537417b1e5&room={{ $consultation_id }}&iframe=true"
                                                        width="800px" height="100%"
                                                        allow="microphone; camera"></iframe>
                                                {{-- </div> --}}
                                            </div>

                                        </div>
                                    </div>


                                    <!-- Call Footer -->


                                    <div class="call-footer" style="padding: 0px;">
                                        <div class="call-icons">

                                            <ul class="call-items">

                                                <li class="end-call-new">
                                                    <a href="/assistants/show_prescription/{{ $consultation_id }}"
                                                        title="End Call" data-placement="top" data-bs-toggle="tooltip">
                                                        <i class="material-icons">call_end</i>
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
            </div>
        </div>
        <!-- /Call Wrapper -->

    </div>

</div>
<!-- /Page Content -->
<?php
$doctors_id = session('patient_data')['doctors_id'] ?? null;

?>

<div class="modal  custom-modal " id="pres_details" style="width:500px;height:auto; margin-left:65%;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Prescription Form {{ $doctors_id }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                                            <textarea name="" id="" class="form-control" cols="20" rows="5"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis labore minus architecto quisquam impedit id commodi eos recusandae beatae quos distinctio necessitatibus incidunt cumque veniam magnam iste, dolor earum quam suscipit? Corrupti voluptate delectus harum excepturi officia aliquid, vel eveniet in esse sunt perspiciatis, exercitationem est alias autem corporis necessitatibus.</textarea>
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
                <!-- JavaScript to open the modal -->


            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        if ($('.alert_doctor .alert-danger').length) {
            setTimeout(function() {
                $('.alert_doctor .alert-danger').fadeOut('slow');
            }, 30000); // 30 seconds in milliseconds
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        Webcam.set({
            width: 490,
            height: 390,
            image_format: "jpeg",
            jpeg_quality: 90,
        });
    });
</script>
<!-- this alert part -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.getElementById('errorAlert')) {
            Swal.fire({
                title: 'Error',
                text: document.getElementById('errorAlert').innerText,
                icon: 'error',
                showCancelButton: true,
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'swal-confirm-button',
                    cancelButton: 'swal-cancel-button'
                },
                iconHtml: '<i class="fas fa-stop"></i>'
            }).then((result) => {
                if (result.isConfirmed) {
                    redirectToOtherPage();
                } else {
                    // Handle cancel action
                }
            });
        }
    });

    function redirectToOtherPage() {
        window.location.href = "/assistants/dashboard";
    }
</script>

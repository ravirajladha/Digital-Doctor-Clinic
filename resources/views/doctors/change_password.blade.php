@include('inc_doctor/header')
<!-- Breadcrumb -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="jquery-3.7.1.min.js"></script>

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @include('inc_doctor/navbar')


            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">

                                <!-- Change Password Form -->
                                <!-- Change Password Form -->
                                <form action="/doctors/change_password" method="post" id="passwordForm">
                                    @csrf
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" id="new_password"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            class="form-control" required>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn" id="submitButton"
                                            disabled>Save Changes</button>
                                    </div>
                                </form>
                                <!-- /Change Password Form -->

                                <!-- /Change Password Form -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Page Content -->



<!-- SweetAlert JS -->
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
<!-- JavaScript -->
<script>
    $(document).ready(function() {
        $('#submitButton').prop('disabled', true);
        $('#confirm_password').on('input', function() {
            var confirm_password = $('#confirm_password').val();
            var newPassword = $('#new_password').val();



            if (confirm_password === newPassword) {
                console.log(confirm_password);
                console.log(newPassword);
                $('#submitButton').prop('disabled', false);

            } else {

                $('#submitButton').prop('disabled', true);
            }
        });
    });
</script>


@include('inc_doctor/footer')

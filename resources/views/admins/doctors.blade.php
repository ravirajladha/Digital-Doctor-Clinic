@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left:240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7">
                    <h3 class="page-title">List of Doctor</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Doctor</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="/admins/add_doctor" class="btn btn-primary float-end mt-2">Add Doctor</a>
                </div>
            </div>
        </div>



        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="datatable table table-hover table-center mb-0">

                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Created Date</th>
                                        <th>Profile Img</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Clinic/Hospital Name </th>
                                        <th>Department</th>
                                        <th>Specialization</th>
                                        <th>View</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($get_doctor as $doctor) { ?>
                                    <tr>
                                        <td>{{ $doctor->id }}</td>
                                        <td><?php echo $doctor->created_at; ?></td>
                                        <td>
                                            <?php
															if (!empty($doctor->photo)) {
																$docimg = explode('/', $doctor->photo);
																$folders = ['uploads', 'uploads/doctor'];

																$imageFound = false;

																foreach ($folders as $folder) {
																	$filePath = ("{$folder}/" . end($docimg));
																	if (file_exists($filePath)) {
																		$imageFound = true;
																		$imagePath = "{$folder}/" . end($docimg);
																		break;
																	}
																}

																if ($imageFound) {
																	?>
                                            <a href="/admins/view_doctor_register/<?php echo $doctor->id; ?>"
                                                class="avatar avatar-sm me-2">
                                                <img class="avatar-img rounded-circle" src="/{{ $imagePath }}"
                                                    alt="User Image">
                                            </a>
                                            <?php
																} else {
																	$defaultImagePath = "assets/img/219983.png"; // Replace with the actual path to your default image
																	?>
                                            <a href="/admins/view_doctor_register/<?php echo $doctor->id; ?>"
                                                class="avatar avatar-sm me-2">
                                                <img class="avatar-img rounded-circle" src="/{{ $defaultImagePath }}"
                                                    alt="Default Image">
                                            </a>
                                            <?php
																}
															} else {
																$defaultImagePath = "assets/img/219983.png";
																?>
                                            <a href="/admins/view_doctor_register/<?php echo $doctor->id; ?>"
                                                class="avatar avatar-sm me-2">
                                                <img class="avatar-img rounded-circle" src="/{{ $defaultImagePath }}"
                                                    alt="Default Image">
                                            </a>
                                            <?php
															}
															?>
                                        </td>


                                        <td><?php echo $doctor->fname . ' ' . $doctor->lname; ?></td>
                                        <td><?php echo $doctor->email; ?></td>
                                        <td><?php echo $doctor->phone; ?></td>
                                        <td><?php echo $doctor->clinic_name; ?></td>
                                        <td><?php echo $doctor->department; ?></td>
                                        <td><?php echo $doctor->specialization; ?></td>
                                        <td><a href="{{ route('admin.view_doctor_register', ['id' => $doctor->id]) }}"
                                                class="btn btn-info rounded-pill">View</a></td>
                                        <td><a href="{{ route('admin.edit_doctor_register', ['id' => $doctor->id]) }}"
                                                class="btn btn-rounded btn-warning">Edit</a></td>
                                        <td>
                                            @php
                                                if ($doctor->status == 1) {
                                                    $status = 1;
                                                } else {
                                                    $status = 0;
                                                }
                                            @endphp
                                            <form
                                                action="{{ url('/doctors/doctor_approval/' . $doctor->phone . '/' . ($doctor->status == 1 ? 0 : 1)) }}"
                                                method="GET" id="updateStatusForm-{{ $doctor->phone }}"
                                                class="update-status-form">
                                                @csrf
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_{{ $doctor->phone }}"
                                                        class="check" {{ $status == 1 ? 'checked' : '' }}>
                                                    <label for="status_{{ $doctor->phone }}"
                                                        class="checktoggle">checkbox</label>
                                                </div>
                                            </form>
                                        </td>

                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->

@include('inc_admins/footer')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "order": [
                [0, "desc"]
            ] // Assuming "id" is the first column (index 0)
        });
    });
</script>
@foreach ($get_doctor as $doctor)
    <script>
        var checkbox = document.getElementById('status_{{ $doctor->phone }}');

        checkbox.addEventListener('change', function() {
            document.getElementById('updateStatusForm-{{ $doctor->phone }}').submit();
        });
    </script>
@endforeach

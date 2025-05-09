@include('inc_subadmins/header')


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
                    <a href="/sub_admins/add_doctor" class="btn btn-primary float-end mt-2">Add Doctor</a>
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
                                        <th>Profile Image</th>
                                        <th>Doctor Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Clinic / Hospital Name </th>
                                        <th>Department</th>
                                        <th>Specialization</th>
                                        <th>View</th>
                                        <th>Details</th>
                                        <th>Action</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($get_doctor as $index => $doctor) { ?>
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
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
                                            <a href="/sub_admins/view_doctor_register/<?php echo $doctor->id; ?>"
                                                class="avatar avatar-sm me-2">
                                                <img class="avatar-img rounded-circle" src="/{{ $imagePath }}"
                                                    alt="User Image">
                                            </a>
                                            <?php
																} else {
																	$defaultImagePath = "assets/img/219983.png"; // Replace with the actual path to your default image
																	?>
                                            <a href="/sub_admins/view_doctor_register/<?php echo $doctor->id; ?>"
                                                class="avatar avatar-sm me-2">
                                                <img class="avatar-img rounded-circle" src="/{{ $defaultImagePath }}"
                                                    alt="Default Image">
                                            </a>
                                            <?php
																}
															} else {
																// If $doctor->photo is empty, display the default image directly
																$defaultImagePath = "assets/img/219983.png"; // Replace with the actual path to your default image
																?>
                                            <a href="/sub_admins/view_doctor_register/<?php echo $doctor->id; ?>"
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
                                        <td><a href="{{ route('view_doctor_register', ['id' => $doctor->id]) }}"
                                                class="btn btn-info rounded-pill">View</a></td>
                                        <td><a href="{{ route('edit_doctor_register', ['id' => $doctor->id]) }}"
                                                class="btn btn-rounded btn-warning">Edit</a></td>
                                        <td>
                                            <?php
												$status = optional($doctor->authDoc)->status;
												if ($status == 1) :
												?>
                                            <a href="/sub_admins/doctor_approval/<?php echo $doctor->phone; ?>/0"
                                                class="btn btn-rounded btn-danger">Deactivate</a>
                                            <?php else : ?>
                                            <a href="/sub_admins/doctor_approval/<?php echo $doctor->phone; ?>/1"
                                                class="btn btn-rounded btn-success">Activate</a>
                                            <?php endif; ?><br>
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

@include('inc_subadmins/footer')
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

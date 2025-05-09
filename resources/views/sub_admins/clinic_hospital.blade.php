@include('inc_subadmins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left:240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7">
                    <h3 class="page-title">Clinic/Hospitals</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Clinic / Hospitals</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="/sub_admins/add_clinic" class="btn btn-primary float-end mt-2">Add Clinic</a>
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
                                        <th>Name</th>
                                        <th>Street</th>
                                        <th>City</th>
                                        <th>ZIP Code</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($get_clinic as $index => $clinic) {
										// print_r($data);
										// die();
									?>
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="/sub_admins/get_clinic_by_id/<?php echo $clinic->id; ?>"
                                                    class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-circle" src="/<?php echo $clinic->img1; ?>"
                                                        alt="User Image">
                                                </a>
                                                <a
                                                    href="/sub_admins/get_clinic_by_id/<?php echo $clinic->id; ?>"><?php echo $clinic->name; ?></a>
                                            </h2>
                                        </td>

                                        <td><?php echo $clinic->address; ?></td>


                                        <td><?php echo $clinic->city; ?></td>
                                        <td><?php echo $clinic->zipcode; ?></td>
                                        <td><?php echo $clinic->state; ?></td>
                                        <td><?php echo $clinic->country; ?></td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm bg-info-light"
                                                    href="/sub_admins/get_clinic_by_id/{{ $clinic->id }}">
                                                    <i class="fe fe-eye"></i> View
                                                </a>
                                                <a class="btn btn-sm bg-success-light"
                                                    href="/sub_admins/edit_clinic/{{ $clinic->id }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                            </div>

                                        </td>
                                        <td>
                                            <div>
                                                <form
                                                    action="/sub_admins/change_clinic_status/<?php echo $clinic->id; ?>/<?php echo $clinic->status == 1 ? 0 : 1; ?>"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-rounded <?php echo $clinic->status == 1 ? 'btn-success' : 'btn-danger'; ?>">
                                                        <?php echo $clinic->status == 1 ? 'Activate' : 'Deactivate'; ?>
                                                    </button>
                                                </form>
                                            </div>
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
        $('#myTable').DataTable();
    });
</script>

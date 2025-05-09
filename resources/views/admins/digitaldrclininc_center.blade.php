@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left:240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7">
                    <h3 class="page-title">Digital Dr. Clinic Center</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Digital Dr. Clinic Center</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="/admins/add_Digitaldrclininc_center" class="btn btn-primary float-end mt-2">Add DDC
                        Center</a>
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
                                        <th>Assistants Name</th>
                                        <th>Street</th>
                                        <th>City</th>
                                        <th>ZIP Code</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

use App\Models\Assistant;

 foreach ($get_digitaldrclininc_center as $clinic) {
                                        // print_r($data);
                                        // die();
                                    ?>
                                    <tr>
                                        <td>{{ $clinic->id }}</td>
                                        <td>
                                            <h2 class="table-avatar">

                                                <a href="#" class="avatar avatar-sm me-2"><img
                                                        class="avatar-img rounded-circle" src="/<?php echo $clinic->img1; ?>"
                                                        alt="User Image"></a>
                                                <a href="#"><?php echo $clinic->name; ?></a>

                                            </h2>
                                        </td>
                                        <?php

                                        $assitance = Assistant::where('digitaldrclininc_center_id', $clinic->id)->first();
                                        ?>
                                        <td>{{ optional($assitance)->fname }}</td>
                                        <td><?php echo $clinic->address; ?></td>


                                        <td><?php echo $clinic->city; ?></td>
                                        <td><?php echo $clinic->zipcode; ?></td>
                                        <td><?php echo $clinic->state; ?></td>
                                        <td><?php echo $clinic->country; ?></td>
                                        <td>

                                            <div class="actions">
                                                <a class="btn btn-sm bg-info-light"
                                                    href="/admins/ddccenterview/{{ $clinic->id }}">
                                                    <i class="fe fe-eye"></i> View
                                                </a>
                                                <a class="btn btn-sm bg-success-light"
                                                    href="/admins/edit_ddc_center/{{ $clinic->id }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>

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

@include('inc_admins/footer')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

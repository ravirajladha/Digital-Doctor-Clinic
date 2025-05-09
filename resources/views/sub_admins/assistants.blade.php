@include('inc_subadmins/header')

<style>
    .datatable th,
    .datatable td {
        text-align: center;
    }
</style>

<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left:240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7">
                    <h3 class="page-title">Assistants</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Assistant</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="/sub_admins/add_assistant" class="btn btn-primary float-end mt-2">Add Assistant</a>
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
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Date Of Birth</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>DDC Center</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

									use App\Models\Digitaldrclininc_center;

									foreach ($get_assistant as $assistant) {
										// print_r($data);
										// die();
									?>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="/uploads/assistant/<?php echo $assistant->photo; ?>" target="_blank"
                                                    class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-circle"
                                                        src="/uploads/assistant/<?php echo $assistant->photo; ?>" alt="User Image">

                                            </h2>
                                        </td>
                                        <td>
                                            </a>
                                            <a
                                                href="/sub_admins/get_assistant_by_id/<?php echo $assistant->id; ?>"><?php echo $assistant->fname; ?></a>
                                        </td>

                                        <td><?php echo $assistant->dob; ?></td>


                                        <td><?php echo $assistant->email; ?></td>
                                        <td><?php echo $assistant->mobile; ?></td>
                                        <!-- <td><?php echo $assistant->street; ?></td> -->
                                        <?php
                                        $ddc_center = Digitaldrclininc_center::where('id', $assistant->digitaldrclininc_center_id)->first();
                                        ?>
                                        <td>{{ optional($ddc_center)->name }}</td>
                                        <td><a href="/sub_admins/get_assistant_by_id/<?php echo $assistant->id; ?>"
                                                class="btn btn-info">View</a></td>
                                        <td><a href="/sub_admins/get_assistant_edit/<?php echo $assistant->id; ?>"
                                                class="btn btn-warning ps-3 pe-3">Edit</a></td>
                                        <td>
                                            <div>
                                                <form
                                                    action="/sub_admins/change_assistant_status/<?php echo $assistant->mobile; ?>/<?php echo optional($assistant->authAssistant)->status == 1 ? 0 : 1; ?>"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-rounded <?php echo optional($assistant->authAssistant)->status == 1 ? 'btn-danger' : 'btn-success'; ?>">
                                                        <?php echo optional($assistant->authAssistant)->status == 1 ? 'Deactivate' : 'Activate'; ?>
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

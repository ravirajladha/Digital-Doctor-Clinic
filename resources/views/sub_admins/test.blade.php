@include('inc_subadmins/header')



<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7">
                    <h3 class="page-title">List of Tests</h3>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Test</li>
                    </ul>
                </div>

                <div class="col-sm-5 col">
                    <a href="/sub_admins/add_test" class="btn btn-primary float-end mt-2">Add test</a>
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
                                        <th>Test Name</th>
                                        <th>Created by</th>
                                        <th>Status</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

									use App\Models\Auth;
use App\Models\Test;

									foreach ($get_tests as $index => $tests) {

									?>
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <?php echo $tests->name; ?>
                                            </h2>
                                        </td>
                                        <td>
                                            <?php

                                            $createdByUser = Auth::find($tests->created_by);

                                            // Check if the user was found before accessing its properties
                                            if ($createdByUser) {
                                                echo $createdByUser->name;
                                            } else {
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <div>
                                                <form
                                                    action="/sub_admins/change_tests_status/<?php echo $tests->id; ?>/<?php echo $tests->status == 1 ? 0 : 1; ?>"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-rounded <?php echo $tests->status == 1 ? 'btn-success' : 'btn-danger'; ?>">
                                                        <?php echo $tests->status == 1 ? 'Activate' : 'Deactivate'; ?>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <x-button type="view"
                                                    url="{{ url('sub_admins/view_test/' . $tests->id) }}" />

                                                <a class="btn btn-sm bg-success-light" data-bs-toggle="modal"
                                                    href="#edit_test_details_{{ $tests->id }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                            </div>

                                            <!-- Edit Details Modal -->
                                            <div class="modal fade" id="edit_test_details_{{ $tests->id }}"
                                                aria-hidden="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Test {{ $tests->id }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php $spc = Test::where('id', $tests->id)->first();

                                                            ?>
                                                            <form action="/sub_admins/update_test" method="post"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row form-row"
                                                                    style="display: flex; text-align: center;">

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Name</label>
                                                                            <input type="text" class="form-control"
                                                                                name="name"
                                                                                value="{{ $spc->name }}">
                                                                            <input type="hidden" class="form-control"
                                                                                name="test_id"
                                                                                value="{{ $spc->id }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Description</label>
                                                                            <input type="text" class="form-control"
                                                                                name="description"
                                                                                value="{{ $spc->description }}">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-100">Save
                                                            Changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                        </div>
                        <!-- /Edit Details Modal -->
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

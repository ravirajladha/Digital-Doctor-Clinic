@include('inc_admins/header')



<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7">
                    <h3 class="page-title">List of Test</h3>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Test</li>
                    </ul>
                </div>

                <div class="col-sm-5 col">
                    <a href="/admins/add_test" class="btn btn-primary float-end mt-2">Add Test</a>
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

									foreach ($get_tests as $tests) {

									?>
                                    <tr>
                                        <td>{{ $tests->id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <?php echo $tests->name; ?>
                                            </h2>
                                        </td>
                                        <td>
                                            @php
                                                $createdByUser = Auth::find($tests->created_by);
                                            @endphp
                                            @if ($createdByUser)
                                                {{ ucwords($createdByUser->type) . ' - ' . $createdByUser->name }}
                                            @endif
                                        </td>

                                        <td>

                                            @php
                                                if ($tests->status == 1) {
                                                    $status = 1;
                                                } else {
                                                    $status = 0;
                                                }
                                            @endphp
                                            <form
                                                action="{{ url('/admins/change_tests_status/' . $tests->id . '/' . ($tests->status == 1 ? 0 : 1)) }}"
                                                method="POST" id="updateStatusForm-{{ $tests->id }}"
                                                class="update-status-form">
                                                @csrf
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_{{ $tests->id }}"
                                                        class="check" {{ $status == 1 ? 'checked' : '' }}>
                                                    <label for="status_{{ $tests->id }}"
                                                        class="checktoggle">checkbox</label>
                                                </div>
                                            </form>
                                            <script>
                                                var checkbox = document.getElementById('status_{{ $tests->id }}');

                                                checkbox.addEventListener('change', function() {
                                                    document.getElementById('updateStatusForm-{{ $tests->id }}').submit();
                                                });
                                            </script>

                                        </td>
                                        <td>
                                            <div class="actions">
                                                <x-button type="view"
                                                    url="{{ url('admins/view_test/' . $tests->id) }}" />

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
                                                            <form action="/admins/update_test" method="post"
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
@include('inc_admins/footer')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@if (session('success'))
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "Your work has been saved",
    showConfirmButton: false,
    timer: 1500
    });
@endif

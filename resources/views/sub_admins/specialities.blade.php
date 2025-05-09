@include('inc_subadmins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left:240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7 col-auto">
                    <h3 class="page-title">Specialities</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Specialities</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="#Add_Specialities_details" data-bs-toggle="modal"
                        class="btn btn-primary float-end mt-2">Add</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Department</th>
                                        <th>Specialities</th>

                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

									use App\Models\Specialities;

									foreach ($get_speciality as $index => $speciality) { ?>
                                    <tr>

                                        <td>{{$index+1}}</td>
                                        <td><?php echo $speciality->department; ?></td>
                                        <td>
                                            <?php echo $speciality->speciality; ?>

                                        </td>

                                        <td class="text-end">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light" data-bs-toggle="modal"
                                                    href="#edit_specialities_details_{{ $speciality->id }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light" onclick="confirmDelete(<?php echo $speciality->id ?>)">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit Details Modal -->
                                    <div class="modal fade" id="edit_specialities_details_{{ $speciality->id }}"
                                        aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Specialities {{ $speciality->id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php $spc = Specialities::where('id', $speciality->id)->first();

                                                    ?>
                                                    <form action="/update_speciality" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row form-row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Department </label>
                                                                    <input type="text" class="form-control"
                                                                        name="department"
                                                                        value="{{ $spc->department }}">
                                                                    <input type="hidden" class="form-control"
                                                                        name="department_id"
                                                                        value="{{ $speciality->id }}">

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Specialities</label>
                                                                    <input type="text" class="form-control"
                                                                        name="speciality"
                                                                        value="{{ $spc->speciality }}">
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

<!-- Add Modal -->
<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Specialities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/create_speciality" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Department</label>
                                <input type="text" class="form-control" name="department">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Specialities</label>
                                <input type="text" class="form-control" name="speciality">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /ADD Modal -->


@include('inc_subadmins/footer')


<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this item!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user clicks "Yes, delete it!", redirect to delete URL
                window.location.href = "/deleteSpecialities/" + id;
            }
        });
    }
</script>

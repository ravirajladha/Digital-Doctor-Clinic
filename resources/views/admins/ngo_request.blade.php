@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left: 240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of NGO Request</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contact Request</li>
                    </ul>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>NGO Type</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

									use App\Models\Auth;
									use App\Models\Ngo_data;

									foreach ($get_ngo_data as $index=> $contact) { ?>
                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        <td><?php echo $contact->created_at; ?></td>
                                        <td><?php echo $contact->name; ?></td>
                                        <td><?php echo $contact->email; ?></td>
                                        <td><?php echo $contact->mobile; ?></td>
                                        <td><?php echo $contact->ngo_type; ?></td>
                                        <td>
                                            <x-button type="view"
                                                url="{{ url('admins/ngo_data_view/' . $contact->id) }}" />
                                        </td>
                                        @if ($contact->status == 1)
                                            <td>
                                                <x-button type="edit"
                                                    url="{{ url('admins/ngo_data_edit/' . $contact->id) }}" />
                                            </td>
                                        @else
                                            <td>
                                                {{-- <a class="btn btn-sm bg-success-light"
                                                    href="/admins/ngo_data_edit/<?php echo $contact->id; ?>"
                                                    disabled="disabled" onclick="return false;"><i
                                                        class="fe fe-pencil"></i>Edit</a> --}}
                                                        <button class="btn btn-sm bg-success-light" onclick="sorry()"><i class="fe fe-pencil"></i>Edit</button>
                                            </td>
                                        @endif
                                        <td>
                                            @php
                                                if (optional($contact->authNgo)->status == 1) {
                                                    $status = 1;
                                                } else {
                                                    $status = 0;
                                                }
                                            @endphp
                                            <form
                                                action="{{ route('admins.ngoApproval', ['id' => $contact->id, 'status' => $status]) }}"
                                                method="POST" id="updateStatusForm" class="update-status-form">
                                                @csrf
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_{{ $contact->id }}"
                                                        class="check" {{ $status == 1 ? 'checked' : '' }}>
                                                    <label for="status_{{ $contact->id }}"
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "order": [
                [0, "desc"]
            ] // Assuming "id" is the first column (index 0)
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Attach change event listener to all toggle switches within forms with class 'update-status-form'
        $('.update-status-form .status-toggle input[type="checkbox"]').on('change', function() {
            // Find the closest form and submit it
            $(this).closest('form').submit();
        });
    });
    function sorry() {
        swal("Sorry!", "NGO status is not active.", "error");
    }
</script>

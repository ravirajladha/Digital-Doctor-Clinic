@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left: 240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7 col-auto">
                    <h3 class="page-title">Sub Admin</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sub Admin</li>
                    </ul>
                </div>

                <div class="col-sm-5 col">
                    <a href="/admins/sub_admin_reg" class="btn btn-primary float-end mt-2">Add new Sub Admin</a>
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
                                        <th>Contact Number</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>&nbsp; &nbsp; &nbsp; &nbsp; Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php



									foreach ($subAdmins as $contact) { ?>
                                    <tr>
                                        <td><?php echo $contact->id; ?></td>

                                        <td><?php echo $contact->created_at; ?></td>
                                        <td><?php echo $contact->name; ?></td>
                                        <td><?php echo $contact->email; ?></td>
                                        <td><?php echo $contact->phone; ?></td>

                                        <td> <x-button type="view"
                                                url="{{ url('admins/sub_view/' . $contact->id) }}" /></td>

                                        <td> <x-button type="edit"
                                                url="{{ url('admins/sub_admin_edit/' . $contact->id) }}" /></td>

                                        <td>

                                            @php
                                                if ($contact->status == 1) {
                                                    $status = 1;
                                                } else {
                                                    $status = 0;
                                                }
                                            @endphp
                                            <form
                                                action="{{ route('admins.subAdmin_approval', ['id' => $contact->auth_id, 'status' => $status == 1 ? 0 : 1]) }}"
                                                method="POST" id="updateStatusForm-{{ $contact->auth_id }}"
                                                class="update-status-form">
                                                @csrf
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_{{ $contact->auth_id }}"
                                                        class="check" {{ $status == 1 ? 'checked' : '' }}>
                                                    <label for="status_{{ $contact->auth_id }}"
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

@foreach ($subAdmins as $contact)
    <script>
        var checkbox = document.getElementById('status_{{ $contact->auth_id }}');

        checkbox.addEventListener('change', function() {
            document.getElementById('updateStatusForm-{{ $contact->auth_id }}').submit();
        });
    </script>
@endforeach

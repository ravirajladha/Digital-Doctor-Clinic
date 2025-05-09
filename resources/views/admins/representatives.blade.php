@include('inc_admins/header')


<!-- Page Wrapper -->

<div class="page-wrapper" style="margin-left: 240px">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of Representative Request</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contact Request</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
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
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Occupation</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get_ngo_data as $contact)
                                            <tr>
                                                <td>{{ $contact->id }}</td>
                                                <td>{{ $contact->datetime }}</td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->mobile_number }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->occupation }}</td>
                                                <td>
                                                    <x-button type="view"
                                                        url="{{ url('admins/Representatives_page_view/' . $contact->id) }}" />
                                                </td>
                                                <td>
                                                    <x-button type="edit"
                                                        url="{{ url('admins/Representatives_page_edit/' . $contact->id) }}" />
                                                </td>
                                                <td>
                                                    @php
                                                        if (optional($contact)->status == 1) {
                                                            $status = 1;
                                                        } else {
                                                            $status = 2;
                                                        }
                                                    @endphp
                                                    <form
                                                        action="{{ url('admins/representative_approval/' . $contact->id . '/' . $status) }}"
                                                        method="GET" id="updateStatusForm-{{ $contact->id }}"
                                                        class="update-status-form">
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
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
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
@foreach ($get_ngo_data as $contact)
    <script>
        // Get the checkbox element
        var checkbox = document.getElementById('status_{{ $contact->id }}');

        // Add an event listener for the change event
        checkbox.addEventListener('change', function() {
            // Submit the form when the checkbox is toggled
            document.getElementById('updateStatusForm-{{ $contact->id }}').submit();
        });
    </script>
@endforeach

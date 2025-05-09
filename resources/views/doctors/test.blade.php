@include('inc_doctor/header')


<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_doctor/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <!-- page header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3 class="page-title">List of Tests</h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/doctors/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Test</li>
                            </ul>
                        </div>

                        <div class="col-sm-5 col">
                            <a href="/doctors/add_test" class="btn btn-primary float-end mt-2"
                                style="border-radius: 0px;">Add test</a>
                        </div>
                    </div>
                </div>

                <!-- page header -->

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
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($get_tests as $index => $tests) {
                                            ?>
                                            <tr>
                                                <td>{{ $index }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <?php echo $tests->name; ?>
                                                    </h2>
                                                </td>
                                                <td>{{$tests->auth_name}}</td>
                                                <td>
                                                    @if ($tests->status == 1)
                                                    <button class="btn btn-sm btn-success">Approved</button>
                                                    @else
                                                    <button class="btn btn-sm btn-primary">Pending</button>
                                                    <p class="p-0 m-0" style="font-size: 10px; font-weight:500">Admin Approval Required*</p>
                                                    @endif
                                                </td>
                                                <td><x-button type="view"
                                                    url="{{ url('doctors/view_test/' . $tests->id) }}" /></td>
                                            </tr>

                                            <?php } ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page header -->

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@include('inc_doctor/footer')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

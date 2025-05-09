@include('/inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of Camp Request</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Camp Request</li>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Camp Date</th>
                                        <th>Camp Address</th>
                                        <th>Contact Number</th>
                                        <th>Visitor Count</th>
                                        <th>Organization Name</th>
                                        <td>Visitor List</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($get_camp_request as $request) {
									$str = $request->visitors_list;
									$array1 = explode(",", $str);
								?>
                                    <tr>
                                        <td>{{ $request->id }}</td>
                                        <td><?php echo $request->name; ?></td>
                                        <td><?php echo $request->last_name; ?></td>
                                        <td><?php echo $request->cmp_date; ?></td>
                                        <td><?php echo $request->cmp_adr; ?></td>
                                        <td><?php echo $request->contact_num; ?></td>
                                        <td><?php echo $request->visitors_cnt; ?></td>
                                        <td><?php echo $request->org_name; ?></td>

                                        <td>
                                            <a href="/admins/vister_details/{{ $request->id }}"
                                                class="btn btn-info">View</a>
                                        </td>

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

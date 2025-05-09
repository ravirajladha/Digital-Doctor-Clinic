@include('inc_assistant/header')
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_assistant/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-7">
                                <h3 class="page-title">List of Medicines</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Medicine</li>
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
                                                    <th>Medicine Name</th>
                                                    <th>Company Name</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($get_medicines as $tests) { ?>
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <?php echo $tests->name; ?>
                                                        </h2>
                                                    </td>
                                                    <td><?php echo $tests->company_name; ?></td>
                                                    <td>
                                                        <div class="table-action">
                                                            <?php if ($tests->stock == 1) { ?>
                                                            <a href="/assistants/stock_description/<?php echo $tests->id; ?>"
                                                                class="btn btn-sm bg-info-light">
                                                                <i class="far fa-eye"></i> View
                                                            </a>
                                                            <?php } else { ?>
                                                            <span class="btn btn-sm bg-info-light">Out Of stock </span>
                                                            <?php } ?>
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
        </div>

    </div>

</div>
<!-- /Page Content -->

@include('inc_assistant/footer')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

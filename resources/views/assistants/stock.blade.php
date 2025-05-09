    @include('inc_assistant/header')
<style>
    .modal {
    z-index: 1050; /* or a higher value if necessary */
}

</style>
</head>
<body>
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
          @include(' inc_assistant/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-7">
                                <h3 class="page-title">List of Stocks</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/assistants/dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Stocks</li>
                                </ul>
                            </div>
                            <div class="col-sm-5 col">
                                <a href="/assistants/add_stock" class="btn btn-primary float-end mt-2" style="border-radius: 0px;">Add Stocks</a>
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
                                                    <th>Stocks Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Batch Number</th>
                                                    <th>expiry_date</th>
                                                    <th>Stock Available</th>
                                                    <th>Used Stock</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($get_stock as $stock) { ?>
                                                    <?php if($stock->assistants_id == session('rexkod_digitaldrclinic_assistant_id')){ ?>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#" class="avatar avatar-sm me-2">
                                                                    <?php if (empty($stock->medicine_photo)) { ?>
                                                                        <img class="avatar-img rounded-circle" src="assets/img/patients/patient.jpg" alt="User Image">
                                                                    <?php } else { ?>
                                                                        <img class="avatar-img rounded-circle" src="/<?php echo $stock->medicine_photo; ?>" alt="User Image">
                                                                    <?php } ?>
                                                                </a>
                                                                <a href="#"><?php echo $stock->medicine_name; ?></a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <?php echo $stock->quantity; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $stock->medicines_price; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $stock->batch_number; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $stock->	expiry_date; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $stock->stock_available; ?>
                                                        </td>
                                                        <td>{{ $stock->stock_used}}</td>
                                                        <td>

                                                        <div class="actions">
												     <a class="btn btn-sm bg-success-light"  href="/assistants/edit_stock/{{ $stock->id }}">
														<i class="fe fe-pencil"></i> Edit
													</a>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>


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
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>

@include('inc_subadmins/header')
@php
    use App\Models\Auth;
    use App\Models\Digitaldrclininc_center;
@endphp

<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left:240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7">
                    <h3 class="page-title" onclick="myFunction()">List of Stock</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Stock</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <div class="form-group">
                        <form id="filterForm" action="/sub_admins/stock" method="get">
                            @csrf
                        <label>Filter the stocks based on Digital Dr. Clinic Center</label>
                        <select class="form-select form-control" name="ddc_center_id" id="dropdown">
                            <option value="0" {{ ($centerId == 0) ? 'selected' : '' }}>All</option>
                            <?php

 foreach ($get_digitaldrclininc_center as $item) { ?>

                            <option value=<?php echo $item->id; ?> {{ ($centerId == $item->id) ? 'selected' : '' }}><?php echo $item->name; ?></option>
                            <?php } ?>
                        </select>
                        </form>
                    </div>
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
                                        <th>Stock Name</th>
                                        <th>Quantity</th>
                                        <th>Stock Available</th>
                                        <th>Used Stock</th>
                                        <th>Batch Number</th>
                                        <th>Expiry Date</th>
                                        <th>Assistant</th>
                                        <th>Digital Dr.Clininc Center</th>
                                        <th>Account Status</th>

                                    </tr>
                                </thead>
                                <tbody id="akk">
                                    <?php foreach ($get_stock as $stock) {
                                        $assistant_info = $assistant->find($stock->assistants_id);
                                        ?>

                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm me-2">
                                                            <?php if (empty($stock->medicine_photo)) { ?>
                                                                <img class="avatar-img rounded-circle" src="/assets/img/patients/patient.jpg" alt="User Image">
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
                                                    <?php echo $stock->stock_available; ?>
                                                </td>
                                                <td>
                                                    <?php echo $stock->stock_used; ?>
                                                </td>
                                                <td>
                                                    <?php echo $stock->batch_number; ?>
                                                </td>
                                                <td>
                                                    <?php echo $stock->expiry_date; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                      $ass= Auth::where('id',$stock->assistants_id)->first();
                                                    ?>
                                                        {{ $ass->name}}
                                                </td>
                                                <td>

                                                    <?php
                                                    $ddc=Digitaldrclininc_center::where('id',$stock->	digitaldrclininc_center_id)->first();
                                                    echo $ddc->name;

                                                    ?>
                                                </td>

                                                <td>
                                                    <a class="btn btn-sm">Activate</a>
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
<script>


    $(document).ready(function() {
        $('#dropdown').on('change', function() {
            var option = $(this).val();
            // alert(option);
            $.get('/sub_admins/search_center', {
                option: option
            }, function(data) {
                $('#akk').html(data);
                document.getElementById("akk").innerHTML = data;


            });
        });



    });
</script>
@include('inc_subadmins/footer')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
$('#myTable').DataTable();
});
</script>


<script>
    $(document).ready(function() {
        $('#dropdown').on('change', function() {
            $('#filterForm').submit(); // Submit the form when dropdown changes
        });
    });
</script>

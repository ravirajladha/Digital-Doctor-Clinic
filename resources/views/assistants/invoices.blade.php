@include('inc_assistant/header')

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_assistant/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card card-table">
                    <div class="card-body">

                        <!-- Invoice Table -->
                        <div class="table-responsive">
                            <table id="myTable" class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Invoice No</th>
                                        <th>Patient</th>
                                        <th>Amount</th>
                                        <th>Paid On</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

use App\Models\Patient;

 foreach ($get_invoice_data as $invoice) { ?>
                                    <?php if ($invoice->assistant_id ==  session('rexkod_digitaldrclinic_assistant_id') ){ ?>
                                    <?php
                                    $get_patient_data = Patient::where('id', $invoice->patient_id)->first();
                                    //    print_r($get_patient_data);
                                    ?>
                                    <tr>
                                        <td>
                                            <a
                                                href="/assistants/invoice_view/<?php echo $invoice->id; ?>">#INV-00<?php echo $invoice->id; ?></a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar avatar-sm me-2">
                                                    <?php if (empty($get_patient_data->image)) { ?>
                                                    <img class="avatar-img rounded-circle"
                                                        src="/assets/img/patients/patient.jpg" alt="User Image">
                                                    <?php } else { ?>
                                                    <img class="avatar-img rounded-circle" src="/<?php echo $get_patient_data->image; ?>"
                                                        alt="User Image">
                                                    <?php } ?>
                                                </a>
                                                <a
                                                    href="#"><?php echo ucwords($get_patient_data->fname . ' ' . $get_patient_data->lname); ?><span>#PT00<?php print_r($get_patient_data->id); ?></span></a>
                                            </h2>
                                        </td>
                                        <td> &#8377;<?php print_r($invoice->total_amount); ?></td>
                                        <td><?php echo date('jS M Y', strtotime($invoice->created_at)); ?></td>
                                        <td class="text-end">
                                            <div class="table-action">
                                                <a href="/assistants/invoice_view/<?php echo $invoice->id; ?>"
                                                    class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /Invoice Table -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->









@include('inc_assistant/footer')

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

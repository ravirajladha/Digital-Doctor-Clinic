@include('inc_assistant/header')


<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice View</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Invoice View</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<?php

use App\Models\Assistant;
use App\Models\Auth;
use App\Models\Digitaldrclininc_center;
use App\Models\Patient;

$assistant_data = Auth::where('id', $get_invoice_data_1->assistant_id)->first();
$assistant_data_1 = Assistant::where('email', $assistant_data->email)->first();
$assistant_data_2 = Digitaldrclininc_center::where('id', $assistant_data_1->digitaldrclininc_center_id)->first();
$get_patient_data = Patient::where('id', $get_invoice_data_1->patient_id)->first();

//    print_r($get_patient_data);

?>
<!-- Page Content -->
<div class="content" id="printContent">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="invoice-content">
                    <div id="print">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-6">
                                    <div class="invoice-logo mb-0">
                                        <img src="/assets/img/Digital_doctor_logo.png" alt="logo">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="invoice-info invoice-info2 mb-0">
                                        <strong>{{ $assistant_data_2->name }}</strong>
                                        <p class="invoice-details">
                                            <?php echo $assistant_data_2->address; ?>, <?php echo $assistant_data_2->city; ?>,<br>
                                            <?php echo $assistant_data_2->state; ?>,<?php echo $assistant_data_2->zipcode; ?>, <?php echo ucwords($assistant_data_2->country); ?> <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-6">
                                    <div class="invoice-info mb-0">
                                        <p class="">
                                            <?php echo $get_patient_data->id . '' . $get_patient_data->fname . ' ' . $get_patient_data->lname; ?><br>
                                            <?php echo $get_patient_data->address; ?>, <?php echo $get_patient_data->city; ?>, <br>
                                            <?php echo $get_patient_data->state; ?>, <?php echo $get_patient_data->zipcode; ?>, <?php echo ucwords($get_patient_data->country); ?> <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="invoice-info invoice-info2 mb-0">
                                        <p>Date:
                                            <span>{{ date('jS M Y', strtotime($get_invoice_data_1->created_at)) }}</span>
                                        </p>
                                        <p>Invoice:<span>#00{{ $get_invoice_data_1->id }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="" class="table table-hover table-center mb-0">
                                            <thead>
                                                <?php $des = $get_invoice_data_1->description;
                                                $que = $get_invoice_data_1->quantity;
                                                $amo = $get_invoice_data_1->amount;
                                                $dess = explode(',', $des);
                                                $quee = explode(',', $que);
                                                $amoo = explode(',', $amo);
                                                $count = count($dess);
                                                $count1 = count($quee);
                                                $count2 = count($amoo);

                                                ?>

                                                <tr>
                                                    <th>Medicine</th>
                                                    <th>Quantity</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php $medicines = explode(',', $get_invoice_data_1->medicines_name); ?>

                                                        @foreach ($medicines as $medicine)
                                                            <p>{{ $medicine }}</p><br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <?php $quantity = explode(',', $get_invoice_data_1->quantity); ?>

                                                        @foreach ($quantity as $qty)
                                                            <p>{{ $qty }}</p><br>
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        <?php $description = explode(',', $get_invoice_data_1->description); ?>

                                                        @foreach ($description as $ds)
                                                            <p>{{ $ds }}</p><br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <?php $amount = explode(',', $get_invoice_data_1->amount); ?>

                                                        @foreach ($amount as $amt)
                                                            <p>{{ $amt }}</p><br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <div>
                                                    @if ($get_invoice_data_1->invoice_test)

                                                        <tr>
                                                            <th>Test Name</th>
                                                            <th></th>
                                                            <th>Description</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php $invoice_test = explode(',', $get_invoice_data_1->invoice_test); ?>

                                                                @foreach ($invoice_test as $it)
                                                                    <p>{{ $it }}</p><br>
                                                                @endforeach
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <?php $test_description = explode(',', $get_invoice_data_1->test_description); ?>

                                                                @foreach ($test_description as $td)
                                                                    <p>{{ $td }}</p><br>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <?php $test_amont = explode(',', $get_invoice_data_1->test_amont); ?>

                                                                @foreach ($test_amont as $tst)
                                                                    <p>{{ $tst }}</p><br>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <th>Consultation</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Amount</th>

                                                    </tr>
                                                    <tr>
                                                        <td>Dr. {{ $doctor->name }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <p>{{ $get_invoice_data_1->consultation_fee }}</p>
                                                        </td>
                                                    </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-6 col-4 ms-auto">
                                    <div class="table-responsive">
                                        <table class="invoice-table-two table">
                                            <tbody>
                                                <tr>
                                                    <th>Total Amount:</th>
                                                    <td>
                                                        <h1> &#8377;{{ $get_invoice_data_1->total_amount }}</h1>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn"
                                    onclick="printContent()">Print</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
<!-- /Page Content -->





@include('/inc_assistant/footer')
<script>
    function printContent() {
        // var printWindow = window.open('', '_blank');
        // printWindow.document.write('<html><head><title>Print</title></head><body>');
        // printWindow.document.write(document.getElementById('printContent').innerHTML);
        // printWindow.document.write('</body></html>');
        // printWindow.document.close();
        // printWindow.print();
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

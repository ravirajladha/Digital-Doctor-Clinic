@include('inc_assistant/header')
<header>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</header>
<!-- Breadcrumb -->
<style>
    .close {
        font-weight: 900px;
        border: none;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #ffc107;
        color: white;
        border: none;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        outline: none;
        border-radius: 50rem !important;
    }

    .close:hover {
        background-color: #c12d2d;
        transform: scale(1.2);

    }

    .add {
        font-weight: 900px;
        border: none;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: greenyellow;
        color: white;
        border: none;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        outline: none;
        border-radius: 50rem !important;
    }

    .add:hover {
        background-color: #c12d2d;
        transform: scale(1.2);

    }

    .total {
        width: 190px;
        height: 100px;
        border: none;
        border-radius: 20px;
        align-items: left;
        display: flex;
        text-align: center;
        font-size: 50px;
    }
</style>
{{-- <div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Billing 2</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Add Billing</h2>
            </div>
        </div>
    </div>
</div> --}}
<!-- /Breadcrumb -->
<?php

use App\Models\Assistant;
use App\Models\Digitaldrclininc_center;

$assistant = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'))->first();

$assistant_data_2 = Digitaldrclininc_center::where('id', $assistant->digitaldrclininc_center_id)->first();

// print_r($assistant_data_2);
// print_r($doctor);

?>

<div class="content" style="padding: 0;">
    <div class="container-fluid">
        <div class="row">
            @include('inc_assistant/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <form action="/store_invoice" method="post">
                        @csrf
                        <div class="card-header">
                            <center>
                                <div class="billing-info">
                                    <h4 class="d-block"><input type="text" name="create_date"
                                            value=" <?php echo date('jS M Y'); ?>" style="border: none; background-color: #fff;"
                                            readonly></h4>

                                </div>
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="biller-info">
                                        <input type="hidden" name="assistant_id"
                                            value="{{ session('rexkod_digitaldrclinic_assistant_id') }}">
                                        <input type="hidden" name="patient_id" value="{{ $patients->id }}">
                                        <h4 class="d-block">{{ $patients->fname }} {{ $patients->lname }}</h4>
                                        <span
                                            class="d-block text-sm text-muted">{{ $patients->address }},{{ $patients->city }},{{ $patients->state }},{{ $patients->zipcode }}</span>
                                        <span class="d-block text-sm text-muted">{{ $patients->mobile }},</span>
                                        <span class="d-block text-sm text-muted">Gender:{{ $patients->gender }},
                                            Age:{{ $patients->age }}, Blood Group :
                                            {{ $patients->blood_group }}</span>
                                        <span class="d-block text-sm text-muted">Consultaion id:
                                            {{ $prescription->consultation_id ?? '' }}</span>
                                        <input type="hidden" value="{{ $prescription->consultation_id ?? '' }}"
                                            name="consultation_id">
                                    </div>
                                </div>
                                <div class="col-sm-6 text-sm-end">
                                    <div class="biller-info">
                                        <img src="/assets/img/Digital_doctor_logo.png" class="img-fluid" alt="Logo"
                                            style="height: 50px; width: auto;">

                                        <input type="hidden" name="clinic_id" value="<?php echo ucwords($assistant_data_2->id); ?>">
                                        <h4 class="d-block"><?php echo ucwords($assistant_data_2->name); ?></h4>
                                        <span
                                            class="d-block text-sm text-muted"><?php echo ucwords($assistant_data_2->address); ?>,<?php echo ucwords($assistant_data_2->city); ?></span>
                                        <span class="d-block text-sm text-muted"><?php echo ucwords($assistant_data_2->state); ?>,
                                            <?php echo ucwords($assistant_data_2->zipcode); ?></span>
                                    </div>
                                </div>

                            </div>
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th style="min-width:200px;">Medicine</th>
                                                    <th style="min-width:200px;">Quantity</th>
                                                    <th style="min-width:200px;">Amount</th>
                                                    <th style="min-width:200px;">Total</th>

                                                    <th style="min-width:200px;">Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($prescribed_medicines as $index=> $item)
                                                <tr>
                                                    <td>
                                                        <input type="search" class="form-control" name="medicine[]"
                                                            list="modelslist" onchange="fetchAmount(this)" value="{{ $item->name }}">
                                                        <datalist id="modelslist">
                                                            @foreach ($medicines as $med)
                                                                <option value="{{ $med->medicine_name }}">
                                                                    {{ $med->id }}.{{ $med->medicine_name }}
                                                                </option>
                                                            @endforeach
                                                        </datalist>
                                                    </td>

                                                    <td>
                                                        <input type="number" class="form-control" id="quentity"
                                                            placeholder="Quantity" name="quantity[]"
                                                            oninput="calculateTotal()"
                                                            value="{{$prescribed_medicine_quantity[$index]}}">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="amount"
                                                            placeholder="Amount" name="amount[]"
                                                            oninput="calculateTotal()">
                                                    </td>
                                                    <td>
                                                        <input type="text" id="medcine_amount"
                                                            name="medcine_amount[]" placeholder="Value"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            placeholder="Description" name="description[]">
                                                    </td>

                                                    <td>
                                                        <!-- Create and Remove buttons -->
                                                        <button type="button" class="add"
                                                            onclick="addRow()">+</button>
                                                        <button type="button" class="close"
                                                            onclick="removeRow(this)">x</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            {{-- <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="search" class="form-control" name="medicine[]"
                                                            list="modelslist" onchange="fetchAmount(this)">
                                                        <datalist id="modelslist">
                                                            @foreach ($medicines as $med)
                                                                <option value="{{ $med->medicine_name }}">
                                                                    {{ $med->id }}.{{ $med->medicine_name }}
                                                                </option>
                                                            @endforeach
                                                        </datalist>
                                                    </td>

                                                    <td>
                                                        <input type="number" class="form-control" id="quentity"
                                                            placeholder="Quantity" name="quantity[]"
                                                            oninput="calculateTotal()">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="amount"
                                                            placeholder="Amount" name="amount[]"
                                                            oninput="calculateTotal()">
                                                    </td>
                                                    <td>
                                                        <input type="text" id="medcine_amount"
                                                            name="medcine_amount[]" placeholder="Value"
                                                            class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            placeholder="Description" name="description[]">
                                                    </td>

                                                    <td>
                                                        <!-- Create and Remove buttons -->
                                                        <button type="button" class="add"
                                                            onclick="addRow()">+</button>
                                                        <button type="button" class="close"
                                                            onclick="removeRow(this)">x</button>
                                                    </td>


                                                </tr>
                                            </tbody> --}}

                                        </table>
                                        <table class="table table-hover table-center" id="myTable1">
                                            <thead>
                                                <tr>

                                                    <th style="min-width:200px;">Test</th>
                                                    <th style="min-width:200px;">Amount</th>
                                                    <th style="min-width:200px;">Description</th>
                                                    <th style="min-width:200px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="search" class="form-control"
                                                            placeholder="Test Name" name="test[]" list="testList">

                                                        <datalist id="testList">

                                                            @foreach ($tests as $tst)
                                                                <option value="{{ $tst->name }}">
                                                                    {{ $tst->name }}</option>
                                                            @endforeach


                                                        </datalist>

                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            placeholder="Test Amount" id="amount_test"
                                                            name="test_amont[]" oninput="calculateTotal()">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            placeholder="Test Description" name="test_description[]">
                                                    </td>
                                                    <td>
                                                    </td>

                                                    <td>
                                                        <!-- Create and Remove buttons -->
                                                        <button type="button" class="add"
                                                            onclick="addRow1()">+</button>
                                                        <button type="button" class="close"
                                                            onclick="removeRow1(this)">x</button>
                                                    </td>


                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table table-hover table-center">
                                            <tr>
                                                <th style="min-width:200px;">Consultation fee <span>(Dr.
                                                        {{ $doctor->fname }} {{ $doctor->lname }})</span></th>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        placeholder="Consultation fee" id="aount_cons"
                                                        name="consultation_fee" oninput="calculateTotal()"
                                                        value="{{ $doctor->pricing }}">
                                                </td>

                                            </tr>

                                            <tr>
                                                <th style="min-width:270px;">Total</th>
                                                <td>
                                                    <input type="text" class="total" name="total_amount"
                                                        id="total_amount" style="max-width: 200px;" readonly>
                                                </td>

                                            </tr>
                                            <tr>
                                                <th style="min-width:200px;">Select Payment Mode</th>
                                                <td>
                                                    <select name="payment_mode" class="form-control"
                                                        id="payment_mode">
                                                        <option value="Cash">Cash</option>
                                                        <option value="UPI">UPI</option>
                                                        <option value="Card">Card</option>
                                                    </select>
                                                </td>


                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="submit-section">
                                        <a href="/assistants/create_invoice" type="submit"
                                            class="btn btn-secondary ">Back</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary ">Create Invoice</button>
                                    </div>

                                </div>
                            </div>


                        </div>
                </div>
            </div>
        </div>
        <!-- /Call Wrapper -->
    </div>
</div>


@include('inc_assistant/footer')

<script>
    // Initial calculation for predefined values
document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('input[name="medicine[]"]').forEach((input) => {
        fetchAmount(input);
    });
});
</script>

<script>
    function addRow() {
        var newRow = $('#myTable tbody tr:first').clone();
        newRow.find('input').val(''); // Clear input values in the new row
        $('#myTable tbody').append(newRow);
    }

    function removeRow(button) {
        // Remove the row containing the clicked button, but not if it's the first row
        var row = $(button).closest('tr');
        if (row.index() > 0) {
            row.remove();
            calculateTotal();
        }
    }
</script>
<script>
    function addRow1() {
        var newRow = $('#myTable1 tbody tr:first').clone();
        newRow.find('input').val(''); // Clear input values in the new row
        $('#myTable1 tbody').append(newRow);
    }

    function removeRow1(button) {
        // Remove the row containing the clicked button, but not if it's the first row
        var row = $(button).closest('tr');
        if (row.index() > 0) {
            row.remove();
            calculateTotal()
        }
    }
</script>

<script>
    function calculateTotal() {
        var totalAmount = 0;

        // Calculate total for medicines
        $('#myTable tbody tr').each(function() {
            var quantity = parseFloat($(this).find('input[name="quantity[]"]').val()) || 0;
            var amount = parseFloat($(this).find('input[name="amount[]"]').val()) || 0;
            var testAmount = parseFloat($(this).find('input[name="test_amont[]"]').val()) || 0;

            totalAmount += quantity * amount + testAmount;
        });

        // Calculate total for tests
        $('#myTable1 tbody tr').each(function() {
            var testAmount = parseFloat($(this).find('input[name="test_amont[]"]').val()) || 0;
            totalAmount += testAmount;
        });

        // Add consultation fee
        var consultationFee = parseFloat($('#aount_cons').val()) || 0;
        totalAmount += consultationFee;

        $('#myTable tbody tr').each(function() {
            var quantity = parseFloat($(this).find('input[name="quantity[]"]').val()) || 0;
            var amount = parseFloat($(this).find('input[name="amount[]"]').val()) || 0;

            // Calculate the product of Quantity and Amount
            var medicineTotal = quantity * amount;

            // Update the corresponding "medcine_amount" input
            $(this).find('input[name="medcine_amount[]"]').val(medicineTotal.toFixed(2));
        });
        // Update the total_amount field
        $('#total_amount').val((totalAmount * 1.05).toFixed(2));

    }
    calculateTotal();
</script>

<!-- Add a hidden input field to store the fetched amount -->
<input type="hidden" id="medicineAmount" name="medicine_amount[]">

<script>
    function fetchAmount(selectElement) {
        var selectedMedicine = $(selectElement).val();

        // Make an AJAX request to fetch the amount from the server
        $.ajax({
            type: 'GET',
            url: '/fetch-amount',
            data: {
                medicine: selectedMedicine
            },
            success: function(response) {
                // Update the corresponding amount input field with the fetched amount
                $(selectElement).closest('tr').find('input[name="amount[]"]').val(response.amount);

                // Recalculate the total
                calculateTotal();
            },
            error: function(error) {
                console.error('AJAX request failed:', error);
            }
        });
    }
</script>

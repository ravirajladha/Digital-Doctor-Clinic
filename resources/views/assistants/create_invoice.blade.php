@include('inc_assistant/header')
<style>
    .search_pasents {
        display: flex;
        justify-content: center;
        padding-top: 50px;
    }
</style>
<?php
use App\Models\Assistant;
use App\Models\Digitaldrclininc_center;
$assistant = Assistant::where('email', session('rexkod_digitaldrclinic_assistant_email'))->first();
$assistant_data_2 = Digitaldrclininc_center::where('id', $assistant->digitaldrclininc_center_id)->first();
?>

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @include('inc_assistant/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <!-- page header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3 class="page-title">List Pending Invoices</h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pending Invoices</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end -->

                <!-- page header -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th>Assistant Name</th>
                                                <th>Patient Name</th>
                                                <th>Consultation Time</th>
                                                <th>Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($consultations as $consultation)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a
                                                                href="#">{{ optional($consultation->doctor)->name ?? '-' }}</a>
                                                        </h2>
                                                    </td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#">{{ $consultation->assistant->name }}</a>
                                                        </h2>
                                                    </td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#">{{ $consultation->patient->name }}</a>
                                                        </h2>
                                                    </td>
                                                    <td>{{ $consultation->created_at->format('d/m/Y') }}<span
                                                            class="text-primary d-block">{{ $consultation->created_at->format('H:i:s') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($consultation->end_call)->format('H:i:s') }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="/assistants/create_invoice2/{{$consultation->id}}" class="btn btn-primary">Invoice</a>
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
                <!-- end page header -->

            </div>

        </div>
    </div>
</div>
<!-- /Page Content -->



@include('inc_assistant/footer')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

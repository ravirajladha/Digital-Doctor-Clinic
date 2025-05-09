@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left: 240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Medicine Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item">Medicines</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Medicine Name:</strong> {{ $medicine->name }}</p>
                                <p><strong>Company Name:</strong> {{ $medicine->company_name }}</p>
                                <p><strong>Status:</strong> {{ $medicine->status == 0 ? 'Deactive' : 'Active' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Description:</strong> {{ $medicine->description }}</p>
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

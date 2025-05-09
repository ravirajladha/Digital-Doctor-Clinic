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
                            <h3 class="page-title">Test Details</h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item">Test</li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Test Name:</strong> {{ $test->name }}</p>
                                <p><strong>Status:</strong> {{ $test->status == 0 ? 'Deactive' : 'Active' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Description:</strong> {{ $test->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Page Content -->

@include('inc_doctor/footer')

@include('inc_admins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left: 240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Contact Request Detail</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item">Contact Request</li>
                        <li class="breadcrumb-item active">Request Detail</li>
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
                                <p><strong>Name:</strong> {{ $get_contact_us->name }}</p>
                                <p><strong>Email:</strong> {{ $get_contact_us->email }}</p>
                                <p><strong>Phone:</strong> {{ $get_contact_us->phone_number }}</p>
                                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($get_contact_us->created_at)->format('d/m/Y')}}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Subject:</strong> {{ $get_contact_us->subject }}</p>
                                <p><strong>Comment:</strong> {{ $get_contact_us->comment }}</p>
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

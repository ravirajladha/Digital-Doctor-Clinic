@include('inc_assistant/header')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Test</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Add Test</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_assistant/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Add Tests</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Tests</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-10 col-xl-12">
                    <form action="/create_test" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- test Info -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Test Info</h4>
                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Test Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Test Description</label>
                                            <input type="text" class="form-control" name="description">
                                        </div>
                                    </div>
                                    <div class="submit-section submit-btn-bottom float-left">
                                        <center><button type="submit" class="btn btn-primary submit-btn"
                                                style="border-radius:8px;margin-bottom:50px;min-width: 200px;">Submit</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /test Info -->
                </div>
                </form>
            </div>

        </div>
    </div>

</div>

</div>
<!-- /Page Content -->

@include('inc_assistant/footer')

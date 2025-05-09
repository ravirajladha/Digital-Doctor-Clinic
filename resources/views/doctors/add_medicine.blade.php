@include('inc_doctor/header')

<div class="content">
    <div class="container-fluid">

        <div class="row">
          @include('inc_doctor/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Add Medicine</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/doctors/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="/doctors/medicines">Medicines</a></li>
                                <li class="breadcrumb-item active">Add Medicine</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="col-md-10 col-lg-10 col-xl-12">
                <form action="/create_medicine" method="post" enctype="multipart/form-data">
                    @csrf
                        <!-- test Info -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Medicine Info</h4>
                                <div class="row form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Medicine Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Medicine Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Medicine Description</label>
                                            <textarea class="form-control" name="description" id="" cols="30" rows="10"
                                        placeholder="Enter Medicine Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="submit-section submit-btn-bottom float-left" >
                            <center><button type="submit" class="btn btn-primary submit-btn" style="border-radius:8px;margin-bottom:50px;min-width: 200px;">Submit</button></center>
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
@include('inc_doctor/footer')

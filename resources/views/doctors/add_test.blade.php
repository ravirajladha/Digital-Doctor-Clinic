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
                            <h3 class="page-title">Add Lab Tests</h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/doctors/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/doctors/test">Test</a></li>
                                <li class="breadcrumb-item active">Add Test</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- page header -->


                <!-- Prescription Item -->
                <form action="/doctor/create_test" method="post">
                    @csrf
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-hover table-center">
                                    <thead>
                                        <tr>
                                            <th style="min-width: 200px"> Test Name</th>
                                            <th style="min-width: 80px">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="name" required>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="description" required>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="submit-section d-flex justify-content-center">
                                    <button type="reset" class="btn btn-danger submit-btn">Clear</button>
                                    <button type="submit" class="btn btn-success submit-btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@include('inc_doctor/footer')

@include('inc_subadmins/header')

<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left: 240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image"
                                    src="/{{ session('rexkod_digitaldrclinic_sub_login_img') }}">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ $admin->name }}</h4>
                            <h6 class="text-muted">{{ $admin->email }}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i> India</div>
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                            <div class="col-auto">
                                                <a class="btn btn-primary" data-bs-toggle="modal"
                                                    href="#edit_personal_details_{{ session('rexkod_digitaldrclinic_sub_admin_id') }}">Edit</a>
                                                </a>
                                            </div>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-10">{{ $admin->name }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-10">{{ $admin->email }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-10">{{ $admin->phone }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Details Modal -->
                                <div class="modal fade"
                                    id="edit_personal_details_{{ session('rexkod_digitaldrclinic_sub_admin_id') }}"
                                    aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ session('rexkod_digitaldrclinic_admin_name') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="/sub_admins/sub_admin_personal_details/{{ session('rexkod_digitaldrclinic_sub_admin_id') }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="row form-row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="name"
                                                                    value="{{ session('rexkod_digitaldrclinic_sub_admin_name') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Email ID</label>
                                                                <input type="email" class="form-control"
                                                                    name="email"
                                                                    value="{{ session('rexkod_digitaldrclinic_sub_admin_email') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Mobile</label>
                                                                <input type="number" class="form-control"
                                                                    name="phone"
                                                                    value="{{ session('rexkod_digitaldrclinic_sub_phone') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary w-100">Save
                                                        Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Edit Details Modal -->

                            </div>


                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->

@include('inc_subadmins/footer')

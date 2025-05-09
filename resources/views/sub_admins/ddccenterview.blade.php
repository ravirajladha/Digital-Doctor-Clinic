@include('inc_subadmins/header')


<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Digitaldrclininc View</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Digitaldrclininc View</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="col-md-10 col-lg-10 col-xl-12">
            <form action="/sub_admins/update_Digitaldrclininc_center/{{$ddccenter->id}}" method="post" enctype="multipart/form-data">
              @csrf

                <!-- Clinic Info -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DDC Center Name</label>
                                    <input type="text" class="form-control" value="{{$ddccenter->name}}" name="name" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" value="{{$ddccenter->email}}" name="email" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic/Hospital Phone Number</label>
                                    <input type="tel" class="form-control" value="{{$ddccenter->phone}}" name="phone" maxlength="10" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Representatives Name</label>
                                    <input type="tel" class="form-control" value="{{$ddccenter->representatives_name}}" name="representatives_name" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Representatives Phone</label>
                                    <input type="text" class="form-control" value="{{$ddccenter->representatives_phone}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Representatives Email</label>
                                    <input type="text" class="form-control" value="{{$ddccenter->representatives_email}}" disabled>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>DDC Center Phone</label>
                                    <input type="text" class="form-control" value="{{$ddccenter->phone}}" name="phone" maxlength="10" disabled>
                                </div>
                            </div>

                            <!--  -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Street</label>
                                    <input type="text" class="form-control" value="{{$ddccenter->address}}" name="address" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> City</label>
                                    <input type="text" class="form-control" value="{{$ddccenter->city}}" name="city" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" value="{{$ddccenter->zipcode}}" name="zipcode" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" value="{{$ddccenter->state}}" name="state" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" value="{{$ddccenter->country}}" name="country" disabled>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>License or government approval</label>
                                    @if($ddccenter->gov_license)
                                    <a href="/{{$ddccenter->gov_license}}"  target="_blank"><i class="fa fa-eye"></i></a>

                                    @endif
                                    <input type="file" class="form-control" name="gov_license" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Clinic Image1 </label>
                                    @if($ddccenter->img1)
                                    <a href="/{{$ddccenter->img1}}" target="_blank"><i class="fa fa-eye"></i></a>
                                    @endif
                                    <input type="file" class="form-control" name="img1" disabled>
                                </div>
                            </div>


                            <div class="submit-section submit-btn-bottom float-left">
                                <a href="/sub_admins/Digitaldrclininc_center" class="btn btn-primary submit-btn" style="border-radius:8px;margin-bottom:50px;">back</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        </form>
    </div>
</div>
<!-- /Page Wrapper -->

@include('inc_subadmins/footer')

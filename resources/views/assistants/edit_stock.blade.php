@include('inc_assistant/header')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_assistant/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Add Stocks</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Add Stocks</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php

                    use App\Models\Medicine;

                    $medicines_data = Medicine::all();
                    // print_r($doctor);
                    ?>
                    <!-- /Page Header -->
                    <div class="col-md-10 col-lg-10 col-xl-12">
                        <form action="/assistants/edit_stock_assistance/{{ $findstock->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Basic Information -->
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Basic Information</h4>
                                    <div class="row form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Medicine Name</label>
                                                <select class="form-select form-control" name="medicinename">
                                                    <?php foreach ($medicines_data as $item) { ?>
                                                    <?php if ($item->status == 1) { ?>
                                                    <option value=<?php echo $item->id; ?>><?php echo $item->name; ?></option>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Quantity <span class="text-danger">*</span></label>
                                                <input class="form-control" type="number" name="quantity"
                                                    value="{{ $findstock->quantity }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price <span class="text-danger">*</span></label>
                                                <input class="form-control" type="number" name="medicines_price"
                                                    value="{{ $findstock->medicines_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Batch Number<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="batchnumber"
                                                    value="{{ $findstock->batch_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>Medicine Expiry Date</label>
                                                <input type="date" class="form-control" name="expiry_date"
                                                    value="{{ $findstock->expiry_date }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="change-avatar">

                                                    <div class="upload-img">
                                                        <img src="/{{ $findstock->medicine_photo }}" alt=""
                                                            style="width: 50x; height: 50px;">

                                                        <div class="change-photo-btn">

                                                            <span><i class="fa fa-upload"></i> Upload Medicine
                                                                Photo</span>
                                                            <input type="file" class="upload" name="medicine_photo">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max
                                                            size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="submit-section submit-btn-bottom float-left">
                                            <button type="submit" class="btn btn-primary submit-btn"
                                                style="border-radius:8px;margin-bottom:50px;min-width: 200px;">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Information -->
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@include('inc_assistant/footer')

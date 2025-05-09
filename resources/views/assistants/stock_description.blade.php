@include('/inc_assistant/header')

<style>
    .success-status {
        background-color: rgba(133, 255, 201, 0.25);
        border-radius: 3px;
        padding: 15px 12px;
        min-width: 110px;
        color: #28A745;
        font-weight: 500;
        font-size: 14px;
    }

    .badge {
        display: inline-block;
        padding: .35em .65em;
        font-size: .75em;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
    }

    .custom-increment .input-group1 {
        display: flex;
        display: -webkit-flex;
        width: 100%;
    }

    .pt-4 {
        padding-top: 1.5rem !important;
    }

    .float-start {
        float: left !important;
    }


    .custom-increment button.btn-danger {
        border-radius: 4px 0px 0px 4px;
    }

    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer;
    }

    .custom-increment button {
        font-size: 14px;
        height: 60px;
        width: 60px;
        background: #C4E4FF;
        color: #000;
        border: 0;
        display: inline-block;
    }

    .btn-danger {
        background-color: #ff0100;
        border: 1px solid #ff0100;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    [type=button],
    [type=reset],
    [type=submit],
    button {
        -webkit-appearance: button;
    }

    input,
    button,
    a {
        transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        -ms-transition: all 0.4s ease;
        -webkit-transition: all 0.4s ease;
    }

    button,
    select {
        text-transform: none;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    .custom-increment input[type=text] {
        border: 0;
        border-radius: 0;
        padding: 7px 15px;
        text-align: center;
        width: 70%;
    }

    input[type=text],
    input[type=password] {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    input,
    button,
    a {
        transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        -ms-transition: all 0.4s ease;
        -webkit-transition: all 0.4s ease;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }



    @media only screen and (max-width: 575.98px) {
        .card {
            margin-bottom: 0.9375rem;
        }
    }


    @media only screen and (max-width: 767.98px) {
        .product-description .doctor-widget {
            text-align: left;
        }
    }

    @media only screen and (max-width: 767.98px) {
        .doctor-widget {
            -ms-flex-direction: column;
            flex-direction: column;
            text-align: center;
        }
    }

    .doctor-widget {
        display: flex;
    }


    @media only screen and (max-width: 991.98px) {
        .product-description .doc-info-left {
            flex-wrap: wrap;
            -webkit-flex-wrap: wrap;
        }
    }

    @media only screen and (max-width: 767.98px) {
        .doc-info-left {
            -ms-flex-direction: column;
            flex-direction: column;
        }
    }

    .doc-info-left {
        display: flex;
    }

    @media only screen and (max-width: 767.98px) {
        .doctor-widget .doctor-img1 {
            margin: 0 0 15px 0;
        }
    }

    @media only screen and (max-width: 991.98px) {
        .product-description .doctor-img1 {
            width: 100%;
            margin-right: 0;
            margin-bottom: 30px;
        }
    }

    .product-description .doctor-img1 {
        width: 35%;
    }

    .doctor-img1 {
        margin-right: 20px;
    }

    .doctor-img1 img {
        border-radius: 4px;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    img,
    svg {
        vertical-align: middle;
    }
</style>

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Stocks Description</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stocks Description</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<?php

use App\Models\Medicine;
use App\Models\Stock;

$get_medicines =Medicine::where('id',$id)->first();
$get_stock =Stock::where('medicine_id',$id)->first();
?>
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">

                <!-- Right Details -->
                <div class="card search-filter">
                    <div class="card-body">
                        <span class="badge text-success text-lg ">In stock</span>
                        <div class="custom-increment pt-4">
                            <div class="input-group1">
                                <span class="input-group-btn float-start">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                        <span><i class="fas fa-minus"></i></span>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class=" input-number" value="<?php echo $get_stock->quantity; ?>">
                                <span class="input-group-btn float-end">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <span><i class="fas fa-plus"></i></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="clinic-details mt-4">
                        </div>
                        <div class="flex-fill mt-4 mb-0">
                            <ul class="list-group clinic-group">
                                <li class="list-group-item">Batch Number <span class="float-end"><?php echo $get_stock->batch_number ;?></span></li>
                                <li class="list-group-item">Expiry Date <span class="float-end"><?php echo $get_stock->expiry_date ;?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-lg-9 col-xl-9">
                <!-- Doctor Widget -->
                <div class="card">
                    <div class="card-body product-description">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                <div class="doctor-img1">
                                    <?php if (empty($get_stock->medicine_photo)) { ?>
                                        <img src="/assets/img/product.jpg" class="img-fluid" alt="User Image">
                                    <?php } else { ?>
                                        <img src="/<?php echo $get_stock->medicine_photo; ?>" height="100%" width="100%" class="img-fluid" alt="User Image">
                                    <?php } ?>
                                </div>
                                <div class="doc-info-cont">
                                    <h4 class="doc-name"><?php echo  $get_stock->medicine_name; ?></h4>
                                    <p><?php echo $get_medicines->description; ?></p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /Doctor Widget -->


            </div>

        </div>
    </div>
</div>
<!-- /Page Content -->
@include('/inc_assistant/footer')

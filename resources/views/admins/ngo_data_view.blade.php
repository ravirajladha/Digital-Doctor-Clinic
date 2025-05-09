@include('inc_admins/header')

<head>
    <style>
        div.row .col-4 {
            display: flex;
            align-items: center;
        }

        a.btn.btn-sm.btn-info {
            margin: 0 !important;
        }
    </style>
</head>

<body>

    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">NGO Register Form <i class="fa fa-eye"></i></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Requests</li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="card p-3">

                    <?php foreach ($get_ngo_data as $getData) { ?>
                    <form style="padding-bottom: 50px; margin-bottom: 50px;"
                        action="/ngo_data_update/<?php echo $getData->id; ?>" method="post">
                        @csrf
                        <center>
                            <div class="form-controle">
                                <h3>आप किस प्रकार की NGO है ?</h3>
                                <label>
                                    <input readonly type="radio" name="ngo_type" value="{{ $getData->ngo_type }} "
                                        checked>{{ $getData->ngo_type }}
                                </label>
                            </div>


                            {{-- Debugging statement --}}
                        </center>

                        <br><br>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>NGO नाम <span>*</span></label>
                                    <input type="hidden" name="id" class="form-control"
                                        value="<?php echo $getData->id; ?>">

                                    <input type="text" readonly name="name" class="form-control"
                                        value="<?php echo $getData->name; ?>">
                                </div>
                            </div>
                            <input type="hidden" name="password" class="form-control" value="<?php echo $getData->mobile; ?>">

                            <div class="col-4">
                                <div class="form-group">
                                    <label>मोबाइल No <span>*</span></label>
                                    <input type="number" readonly name="phone" class="form-control"
                                        value="<?php echo $getData->mobile; ?>">

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>ईमेल <span>*</span></label>
                                    <input type="text" readonly name="email" class="form-control"
                                        value="<?php echo $getData->email; ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>पंजीकृत स्थान </label>
                                    <input type="text" readonly name="place" class="form-control"
                                        value="<?php echo $getData->place; ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>पंजीकृत क्षेत्र </label>
                                    <input type="text" readonly name="comment" class="form-control"
                                        value="<?php echo $getData->name; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <h3 class="text-center">पंजीकृत पता </h3>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>शहर/ गांव <span>*</span></label>
                                        <input type="text" readonly name="village_ngo" class="form-control"
                                            value="<?php echo $getData->village_ngo; ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>ज़िला <span>*</span></label>
                                        <input type="text" readonly name="city" class="form-control"
                                            value="<?php echo $getData->city; ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>राज्य <span>*</span></label>
                                        <input type="text" readonly name="state" class="form-control"
                                            value="<?php echo $getData->state; ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>पिन कोड <span>*</span></label>
                                        <input type="text" readonly name="pincode" class="form-control"
                                            value="<?php echo $getData->pincode; ?>">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>संपूर्ण पता। <span>*</span></label>
                                        <textarea type="text" readonly name="full_address" class="form-control" value=""><?php echo $getData->full_address; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>NGO रजिस्ट्रेशन सर्टिफिकेट अपलोड करें<span>*</span></label>
                                    <?php if (!empty($getData->ngo_certificate)) {
                                        $datango = explode('/', $getData->ngo_certificate)
                                    ?>
                                    @foreach ($datango as $ngo)
                                        @if ($ngo == 'uploads')
                                            <a href="{{ asset('/' . $getData->ngo_certificate) }}" target="_blank"
                                                class=" "><i class="fa fa-eye"></i></a>
                                        @else
                                            <a href="/uploads/{{ $getData->ngo_certificate }}" target="_blank"
                                                class=" "><i class="fa fa-eye"></i></a>
                                        @endif
                                    @break;
                                @endforeach
                                <?php } else {?>
                                <span> - नहीं</span>
                                <?php   } ?>


                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>उपनियम दस्तावेज़ अपलोड करें<span>*</span></label>
                                <?php if (!empty($getData->fact_certificate)) {
                                        $fact = explode('/', $getData->fact_certificate);
                                    ?>
                                @foreach ($fact as $fc)
                                    @if ($fc == 'uploads')
                                        <a href="{{ asset('/' . $getData->fact_certificate) }}" target="_blank"
                                            class=""><i class="fa fa-eye"></i></a>
                                    @else
                                        <a href="/uploads/{{ $getData->fact_certificate }}" target="_blank"
                                            class=""><i class="fa fa-eye"></i></a>
                                    @endif
                                @break;
                            @break;
                        @endforeach
                        </a>
                        <?php } else {?>
                        <span> - नहीं</span>
                        <?php   } ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>क्या आपकी NGO नीति आयोग के NGO दर्पण में पंजीकृत है <span>*</span></label>
                        <?php if (!empty($getData->ngo_registor_certificate)) {
                                        $ngo = explode('/', $getData->ngo_registor_certificate);

                                    ?>
                        @foreach ($ngo as $n)
                            @if ($n == 'uploads')
                                <a href="/<?php echo $getData->ngo_registor_certificate; ?>" target="_blank" class=""><i
                                        class="fa fa-eye"></i></a>
                            @else
                                <a href="/uploads/<?php echo $getData->ngo_registor_certificate; ?>" target="_blank" class=""><i
                                        class="fa fa-eye"></i></a>
                            @endif
                        @break;
                    @endforeach


                    <?php } else {?>
                    <span> - नहीं</span>
                    <?php   } ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>क्या आपके पास 80 G का रजिस्ट्रेशन है <span>*</span></label>
                    <?php if (!empty($getData->g_reg80)) {
                                        $greg = explode('/', $getData->g_reg80)

                                    ?>
                    @foreach ($greg as $gm)
                        @if ($gm == 'uploads')
                            <a href="/<?php echo $getData->g_reg80; ?>" target="_blank" class=""><i
                                    class="fa fa-eye"></i></a>
                        @else
                            <a href="/uploads/<?php echo $getData->g_reg80; ?>" target="_blank" class=""><i
                                    class="fa fa-eye"></i></a>
                        @endif
                    @break;
                @endforeach
                <?php } else {?>
                <span> - नहीं</span>
                <?php   } ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">

            <label>क्या NGO को स्वास्थ्य से संबंधित अनुभव है ?<span>*</span></label>
            @if ($getData->relationship_certificate)
                <?php
                $rel = explode('/', $getData->relationship_certificate);
                ?>
                @foreach ($rel as $r)
                    @if ($r == 'uploads')
                        <a href="/{{ $getData->relationship_certificate }}" target="_blank"
                            alt=""><i class="fa fa-eye"></i></a>
                    @else
                        <a href="/uploads/{{ $getData->relationship_certificate }}"
                            target="_blank" alt=""><i class="fa fa-eye"></i></a>
                    @endif
                @break;
            @endforeach
        @else
            <span> - नहीं</span>
        @endif


    </div>
</div>

<!-- --------------------------- -->
<!-- --------------------------- -->


<div class="form-group">
    <label>क्या NGO, FCRA/CSR -1 पंजीकृत है ?<span>*</span></label>
    @if ($getData->fcra)
        <?php

        $fact = explode('/', $getData->fcra);
        ?>
        @foreach ($fact as $fc)
            @if ($fc == 'uploads')
                <a href="/{{ $getData->fcra }}" target="_blank" alt=""><i
                        class="fa fa-eye"></i></a>
            @else
                <a href="/uploads/{{ $getData->fcra }}" target="_blank" alt=""><i
                        class="fa fa-eye"></i></a>
            @endif

        @break;
    @endforeach
@else
    <span> - नहीं</span>
@endif
</div>

<!-- --------------------------- -->


<div class="col-md-12">
<div class="form-group">
    <label>क्या NGO किसी प्रकार की उपलब्धि/पुरस्कार धारक है। ?<span>*</span></label>
    @if ($getData->ngo_achievement)
        <?php
        $kispar = explode('/', $getData->ngo_achievement);
        ?>
        @foreach ($kispar as $kr)
            @if ($kr == 'uploads')
                <a href="/{{ $getData->ngo_achievement }}" target="_blank"
                    alt=""><i class="fa fa-eye"></i></a>
            @else
                <a href="/uploads/{{ $getData->ngo_achievement }}" target="_blank"
                    alt=""><i class="fa fa-eye"></i></a>
            @endif
        @break;
    @endforeach
@else
    <span> - नहीं</span>
@endif
</div>
</div>


<div class="col-md-12">
<div class="form-group">
<div class="row">
    <div class="col-4">
        <label>आधार कार्ड अपलोड करें </label>
        @if ($getData->direactor_aadhar)
            <?php
            $kispar = explode('/', $getData->direactor_aadhar);
            ?>
            @foreach ($kispar as $kr)
                @if ($kr == 'uploads')
                    <a href="/{{ $getData->direactor_aadhar }}" target="_blank"
                        alt=""><i class="fa fa-eye"></i></a>
                @else
                    <a href="/uploads/{{ $getData->direactor_aadhar }}"
                        target="_blank" alt=""><i class="fa fa-eye"></i></a>
                @endif
            @break;
        @endforeach
    @else
        <span> - नहीं</span>
    @endif
</div>
</div>
</div>
</div>



<div class="col-md-12">
<div class="form-group">
<div class="row">
<div class="col-4">
    <label>पैन कार्ड अपलोड</label>
    @if ($getData->direactor_pan)
        <?php
        $kispar = explode('/', $getData->direactor_pan);
        ?>
        @foreach ($kispar as $kr)
            @if ($kr == 'uploads')
                <a href="/{{ $getData->direactor_pan }}" target="_blank"
                    alt=""><i class="fa fa-eye"></i></a>
            @else
                <a href="/uploads/{{ $getData->direactor_pan }}" target="_blank"
                    alt=""><i class="fa fa-eye"></i></a>
            @endif
        @break;
    @endforeach
@else
    <span> - नहीं</span>
@endif
</div>
</div>
</div>
</div>




<div class="col-md-12">
<div class="form-group">
<div class="col-4">
<label>फोटो अपलोड </label>
@if ($getData->direactor_photo)
<?php
$kispar = explode('/', $getData->direactor_photo);
?>
@foreach ($kispar as $kr)
    @if ($kr == 'uploads')
        <a href="/{{ $getData->direactor_photo }}" target="_blank"
            alt=""><i class="fa fa-eye"></i></a>
    @else
        <a href="/uploads/{{ $getData->direactor_photo }}" target="_blank"
            alt=""><i class="fa fa-eye"></i></a>
    @endif
@break;
@endforeach
@else
<span> - नहीं</span>
@endif
</div>


</div>

</div>

<div class="col-md-12">
<div class="form-group">
<label for="">NGO जिस क्षेत्र में काम करना चाहती है जनपद (जिला) का नाम
लिखें|</label>
<input type="text" name="ngotypework" class="form-control"
value="<?php echo $getData->nogtypework; ?>">
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label>NGO को कितना अनुभव है ? <span>*</span></label>
<input type="text" name="ngo_exp" class="form-control"
value="<?php echo $getData->ngo_exp; ?>">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>NGO के अनुभव का अपने शब्दों में ब्यौरा दें<span>*</span></label>
<textarea type="text" name="declearation_about_ngo" class="form-control" style="height: 15vh"><?php echo $getData->declearation_about_ngo; ?></textarea>
</div>
</div>


<div class="submit-section submit-btn-bottom float-left px-3">
<a type="back" href="/admins/ngo_request" class="btn btn-primary submit-btn"
style="border-radius:8px;">Back</a>
</div>
</form>
<?php  } ?>
</div>
</div>
</div>
</div>

</div>
<script>
    function goBack() {
        window.location.href = '/admins/ngo_request';
    }
</script>


@include('inc_admins/footer')

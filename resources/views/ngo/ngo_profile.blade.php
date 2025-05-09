@include('inc_ngo/header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Setting</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Profile Setting</h2>
            </div>
            <div class="col-12 col-md-2 d-flex justify-content-end">

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        @include('inc_ngo/navbar')

        <div class="col-sm-5 col-md-6 col-lg-8 col-xl-9">
            <div class="card w-100">
                <div class="card-title mt-5">
                    <h2 class="text-center">ग्राम प्रधान को वरीयता दीजाएगी  {{session('rexkod_digitaldrclinic_ngo_id')}}</h2>
                </div>
                <div class="card-body">
                <?php foreach ($get_ngo_data as $getData) { ?>
                    <form method="post" action="/ngo/ngo_data_update_profile/{{$getData->id}}" enctype="multipart/form-data">
                        @csrf
                        <center>
                            <div class="form-controle">
                                <h3>आप किस प्रकार की NGO है ?</h3>
                                <label>
                                </label>
                                <label>
                                <input  type="radio" name="ngo_type" value="पब्लिक ट्रस्ट" {{ $getData->ngo_type == 'पब्लिक ट्रस्ट' ? 'checked' : '' }}>पब्लिक ट्रस्ट
                            </label>
                            <label>
                                <input  type="radio" name="ngo_type" value="सुसाइटी" {{ $getData->ngo_type == 'सुसाइटी' ? 'checked' : '' }}>सुसाइटी
                            </label>
                            <label>
                                <input  type="radio" name="ngo_type" value="सेक्शन 8 कंपनी" {{ $getData->ngo_type == 'सेक्शन 8 कंपनी' ? 'checked' : '' }}>सेक्शन 8 कंपनी
                            </label>
                            </div>


                            {{-- Debugging statement --}}
                        </center>

                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>NGO नाम <span>*</span></label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $getData->id ?>">
                                    <input type="text"  name="name" class="form-control" value="<?php echo $getData->name ?>">
                                </div>
                            </div>
                            <input type="hidden" name="password" class="form-control" value="<?php echo $getData->mobile ?>">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>मोबाइल No <span>*</span></label>
                                    <input type="tel"  name="mobile" class="form-control" value="<?php echo $getData->mobile ?>" maxlength="10">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ईमेल <span>*</span></label>
                                    <input type="text"  name="email" class="form-control" value="<?php echo $getData->email ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>पंजीकृत स्थान </label>
                                    <input type="text"  name="place" class="form-control" value="<?php echo $getData->place ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>पंजीकृत क्षेत्र </label>
                                    <input type="text"  name="comment" class="form-control" value="<?php echo $getData->name ?>">
                                </div>
                            </div>
                            <div class="row">
                                <h3 class="text-center">पंजीकृत पता </h3>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>शहर/ गांव <span>*</span></label>
                                        <input type="text"  name="village_ngo" class="form-control" value="<?php echo $getData->village_ngo ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ज़िला <span>*</span></label>
                                        <input type="text"  name="city" class="form-control" value="<?php echo $getData->city ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>राज्य <span>*</span></label>
                                        <input type="text"  name="state" class="form-control" value="<?php echo $getData->state ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>पिन कोड <span>*</span></label>
                                        <input type="text"  name="pincode" class="form-control" value="<?php echo $getData->pincode ?>">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>संपूर्ण पता। <span>*</span></label>
                                        <textarea type="text"  name="full_address" class="form-control" value=""><?php echo $getData->full_address ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h3 class="text-center">कॉर्पोरेट पता</h3>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>शहर/ गांव <span>*</span></label>
                                        <input type="text"  name="cpy_city" class="form-control" value="<?php echo $getData->cpy_city ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ज़िला <span>*</span></label>
                                        <input type="text"  name="cpy_city" class="form-control" value="<?php echo $getData->cpy_city ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>राज्य <span>*</span></label>
                                        <input type="text"  name="cpy_state" class="form-control" value="<?php echo $getData->cpy_state ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>पिन कोड <span>*</span></label>
                                        <input type="text"  name="cpy_pincode" class="form-control" value="<?php echo $getData->cpy_pincode ?>">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>संपूर्ण पता। <span>*</span></label>
                                        <textarea type="text"  name="company_address" class="form-control"><?php echo $getData->company_address ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>NGO में कितने वॉलिंटियर/सदस्य हैं ? <span>*</span></label>
                                    <input type="text"  name="ngo_member" class="form-control" value="<?php echo $getData->ngo_member ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>डायरेक्टर/सर्वोच्च अधिकारी का नाम <span>*</span></label>
                                    <input type="text"  name="ngo_director_name" class="form-control" value="<?php echo $getData->ngo_director_name ?>">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>मोबाइल No <span>*</span></label>
                                    <input type="number"  name="director_phone" class="form-control" value="<?php echo $getData->director_phone ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ईमेल <span>*</span></label>
                                    <input type="email"  name="director_mail" class="form-control" value="<?php echo $getData->director_mail ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>NGO रजिस्ट्रेशन सर्टिफिकेट अपलोड करें<span>*</span></label>
                                    <?php if (!empty($getData->ngo_certificate)) {
                                        $datango = explode('/', $getData->ngo_certificate)
                                    ?>
                                        @foreach( $datango as $ngo)
                                        @if($ngo =='uploads')
                                        <a href="{{ asset('/' . $getData->ngo_certificate) }}" target="_blank" class=" "><i class="fa fa-eye"></i></a>
                                        @else
                                        <a href="/uploads/{{$getData->ngo_certificate}}" target="_blank" class=" "><i class="fa fa-eye"></i></a>
                                        @endif
                                        @break;
                                        @endforeach
                                    <?php } else {
                                    } ?>

                              <input type="file" name="ngo_certificate">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>समझौता ज्ञापन अपलोड करें (MOA)<span>*</span></label>
                                    <?php if (!empty($getData->fact_certificate)) {
                                        $fact = explode('/', $getData->fact_certificate);
                                    ?>
                                        @foreach($fact as $fc)
                                        @if($fc=='uploads')
                                        <a href="{{ asset('/' . $getData->fact_certificate) }}" target="_blank" class=""><i class="fa fa-eye"></i></a>

                                        @else
                                        <a href="/uploads/{{$getData->fact_certificate }}" target="_blank" class=""><i class="fa fa-eye"></i></a>

                                        @endif
                                        @break;
                                        @break;
                                        @endforeach
                                        </a>
                                    <?php } else {
                                    } ?>
                                    <input type="file" name="fact_certificate">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>क्या आपकी NGO नीति आयोग के NGO दर्पण में पंजीकृत है <span>*</span></label>
                                    <?php if (!empty($getData->ngo_registor_certificate)) {
                                        $ngo = explode('/', $getData->ngo_registor_certificate);

                                    ?>
                                        @foreach($ngo as $n)
                                        @if($n=='uploads')
                                        <a href="/<?php echo $getData->ngo_registor_certificate; ?>" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @else
                                        <a href="/uploads/<?php echo $getData->ngo_registor_certificate; ?>" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @endif
                                        @break;
                                        @endforeach


                                    <?php } else {
                                    } ?>
                                    <input type="file" name="ngo_registor_certificate">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>क्या आपके पास 80 G का रजिस्ट्रेशन है <span>*</span></label>
                                    <?php if (!empty($getData->g_reg80)) {
                                        $greg = explode('/', $getData->g_reg80)

                                    ?>
                                        @foreach( $greg as $gm)
                                        @if($gm=='uploads')
                                        <a href="/<?php echo $getData->g_reg80; ?>" target="_blank" class=""><i class="fa fa-eye"></i></a>

                                        @else
                                        <a href="/uploads/<?php echo $getData->g_reg80; ?>" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @endif
                                        @break;
                                        @endforeach
                                    <?php } else {
                                    } ?>
                                    <input type="file" name="g_reg80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">

                                <label>क्या NGO को स्वास्थ्य से संबंधित अनुभव है ?<span>*</span></label>
                                <?php
                                $rel = explode('/', $getData->relationship_certificate)
                                ?>
                                @foreach($rel as $r)
                                @if($r=='uploads')
                                <a href="/{{$getData->relationship_certificate}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>
                                @else
                                <a href="/uploads/{{$getData->relationship_certificate}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>
                                @endif
                                @break;
                                @endforeach


                                <input type="file" name="relationship_certificate">

                            </div>
                        </div>

                        <!-- --------------------------- -->
                        <!-- --------------------------- -->


                        <div class="form-group">
                            <label>क्या NGO, FCRA/CSR -1 पंजीकृत है ?<span>*</span></label>
                            <?php

                            $fact = explode('/', $getData->fcra);
                            ?>
                            @foreach($fact as $fc)
                            @if($fc=='uploads')
                            <a href="/{{$getData->fcra}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                            @else
                            <a href="/uploads/{{$getData->fcra}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                            @endif

                            @break;
                            @endforeach
                          <input type="file" name="fcra">

                        </div>

                        <!-- --------------------------- -->


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>क्या NGO किसी प्रकार की उपलब्धि/पुरस्कार धारक है। ?<span>*</span></label>
                                <?php
                                $kispar = explode('/', $getData->ngo_achievement);
                                ?>
                                @foreach($kispar as $kr)
                                @if($kr=='uploads')
                                <a href="/{{$getData->ngo_achievement}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                                @else
                                <a href="/uploads/{{$getData->ngo_achievement}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                                @endif
                                @break;
                                @endforeach
           <input type="file" name="ngo_achievement">
                            </div>
                        </div>

                        @if($getData->direactor_aadhar)
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>आधार कार्ड अपलोड करें </label>
                                        <?php
                                        $kispar = explode('/', $getData->direactor_aadhar);
                                        ?>
                                        @foreach($kispar as $kr)
                                        @if($kr=='uploads')
                                        <a href="/{{$getData->direactor_aadhar}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                                        @else
                                        <a href="/uploads/{{$getData->direactor_aadhar}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                                        @endif
                                        @break;
                                        @endforeach
                                        <input type="file" name="direactor_aadhar">
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif

                        @if($getData->direactor_pan)
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>पैन कार्ड अपलोड</label>
                                        <?php
                                        $kispar = explode('/', $getData->direactor_pan);
                                        ?>
                                        @foreach($kispar as $kr)
                                        @if($kr=='uploads')
                                        <a href="/{{$getData->direactor_pan}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                                        @else
                                        <a href="/uploads/{{$getData->direactor_pan}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                                        @endif
                                        @break;
                                        @endforeach
                                        <input type="file" name="direactor_pan">
                                    </div>

                                </div>
                            </div>
                        </div>

            @endif

            @if($getData->direactor_photo)
            <div class="col-md-12">
                <div class="form-group">
                        <div class="col-md-4">
                            <label>फोटो अपलोड </label>
                            <?php
                            $kispar = explode('/', $getData->direactor_photo);
                            ?>
                            @foreach($kispar as $kr)
                            @if($kr=='uploads')
                            <a href="/{{$getData->direactor_photo}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                            @else
                            <a href="/uploads/{{$getData->direactor_photo}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                            @endif
                            @break;
                            @endforeach
                            <input type="file" name="direactor_photo">
                        </div>


               </div>

            </div>
            @endif
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">NGO जिस क्षेत्र में काम करना चाहती है जनपद (जिला) का नाम चुनें </label>
                    <input type="text" name="nogtypework" class="form-control" value="<?php echo $getData->nogtypework ?>">
                </div>
            </div>

            @if($getData->block_name)
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">क्या प्रत्येक ब्लॉक में कार्य करना चाहते हैं।</label>
                    <input type="text" name="block_name" class="form-control" value="<?php echo $getData->block_name ?>">
                </div>
            </div>
            @endif

            <div class="col-md-12">
                <div class="form-group">
                    <label>NGO को कितना अनुभव है ? <span>*</span></label>
                    <input type="text" name="ngo_exp" class="form-control" value="<?php echo $getData->ngo_exp ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>NGO के अनुभव का अपने शब्दों में ब्यौरा दें<span>*</span></label>
                    <textarea type="text" name="declearation_about_ngo" class="form-control"><?php echo $getData->declearation_about_ngo ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
            <div class="submit-section submit-btn-bottom float-left px-3">
                <a type="back" href="/ngo/dashboard" class="btn btn-primary submit-btn" style="border-radius:8px;">Back</a>
            </div>
            </div>
            <div class="col-md-6">
            <div class="submit-section submit-btn-bottom float-left px-3">
                <button type="submit"  class="btn btn-primary submit-btn" style="border-radius:8px;">Update</button>
            </div>
            </div>
            </div>

            </form>
        <?php  } ?>
        </div>
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

                </div>
            </div>
        </div>
    </div>
</div>


@include('inc_ngo/footer')

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable2');
    });
</script>


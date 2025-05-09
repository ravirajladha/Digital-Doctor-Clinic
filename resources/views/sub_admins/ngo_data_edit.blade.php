<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
@include('inc_subadmins/header')

<body>

    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">NGO Register Form
                        </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Requests</li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="container py-5">

                <?php foreach ($get_ngo_data as $getData) { ?>
                    <form style="padding-bottom: 50px; margin-bottom: 50px;" action="/ngo_data_update/<?php echo $getData->id; ?>" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body"><br>
                            <center>
                                <div class="form-controle">
                                    <h3>आप किस प्रकार की NGO है ?</h3>
                                    <label>
                                        <input type="radio" name="ngo_type" value="पब्लिक ट्रस्ट" {{ $getData->ngo_type == 'पब्लिक ट्रस्ट' ? 'checked' : '' }}>पब्लिक ट्रस्ट
                                    </label>
                                    <label>
                                        <input type="radio" name="ngo_type" value="सुसाइटी" {{ $getData->ngo_type == 'सुसाइटी' ? 'checked' : '' }}>सुसाइटी
                                    </label>
                                    <label>
                                        <input type="radio" name="ngo_type" value="सेक्शन 8 कंपनी" {{ $getData->ngo_type == 'सेक्शन 8 कंपनी' ? 'checked' : '' }}>सेक्शन 8 कंपनी
                                    </label>
                                </div>


                                {{-- Debugging statement --}}
                            </center>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>NGO नाम <span>*</span></label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $getData->id ?>">

                                    <input type="text" name="name" class="form-control" value="<?php echo $getData->name ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>मोबाइल No <span>*</span></label>
                                    <input type="tel" name="mobile" id="mobile_number" class="form-control" value="<?php echo $getData->mobile ?>" maxlength="10">
                                    <span id="ngophoneErrorMessage" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ईमेल <span>*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" value="<?php echo $getData->email; ?>" required>
                                    <span id="ngoemailErrorMessage" style="color: red;"></span>



                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>पंजीकृत पता </label>
                                    <input type="text" name="place" class="form-control" value="<?php echo $getData->place ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>पंजीकृत पता </label>
                                    <input type="text" name="comment" class="form-control" value="<?php echo $getData->name ?>">
                                </div>
                            </div>
                            <div class="row">
                                <h3 class="text-center">पंजीकृत पता </h3>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>शहर/ गांव <span>*</span></label>
                                        <input type="text" name="village_ngo" class="form-control" value="<?php echo $getData->village_ngo ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ज़िला <span>*</span></label>
                                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $getData->city ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>राज्य <span>*</span></label>
                                        <input type="text" name="state" id="state" class="form-control" value="<?php echo $getData->state ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>पिन कोड <span>*</span></label>
                                        <input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo $getData->pincode ?>">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>संपूर्ण पता। <span>*</span></label>
                                        <textarea type="text" name="full_address" class="form-control" value=""><?php echo $getData->full_address ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h3 class="text-center">कॉर्पोरेट पता</h3>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>शहर/ गांव <span>*</span></label>
                                        <input type="text" name="cpy_city" class="form-control" value="<?php echo $getData->cpy_city ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ज़िला <span>*</span></label>
                                        <input type="text" id="city2" name="cpy_city" class="form-control" value="<?php echo $getData->cpy_city ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>राज्य <span>*</span></label>
                                        <input type="text" id="state2" name="cpy_state" class="form-control" value="<?php echo $getData->cpy_state ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>पिन कोड <span>*</span></label>
                                        <input type="text" name="cpy_pincode" id="pincode2" class="form-control" value="<?php echo $getData->cpy_pincode ?>">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>संपूर्ण पता। <span>*</span></label>
                                        <textarea type="text" name="company_address" class="form-control"><?php echo $getData->company_address ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>NGO में कितने वॉलिंटियर/सदस्य हैं ? <span>*</span></label>
                                    <input type="text" name="ngo_member" class="form-control" value="<?php echo $getData->ngo_member ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>डायरेक्टर/सर्वोच्च अधिकारी का नाम <span>*</span></label>
                                    <input type="text" name="ngo_director_name" class="form-control" value="<?php echo $getData->ngo_director_name ?>">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>मोबाइल No <span>*</span></label>
                                    <input type="number" name="director_phone" id="director_phone" class="form-control" value="<?php echo $getData->director_phone ?>">
                                    <span id="directorphoneErrorMessage" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>ईमेल <span>*</span></label>
                                    <input type="email" name="director_mail" id="director_mail" class="form-control" value="<?php echo $getData->director_mail ?>">
                                    <span id="directoremailErrorMessage" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>NGO रजिस्ट्रेशन सर्टिफिकेट अपलोड करें<span>*</span></label>
                                    <?php if (!empty($getData->ngo_certificate)) {
                                        $kispar = explode('/', $getData->ngo_certificate);
                                    ?>
                                        @foreach($kispar as $ki)
                                        @if($ki == 'uploads')
                                        <a href="/{{ $getData->ngo_certificate }}" target="_blank" class=" "><i class="fa fa-eye"></i></a>
                                        @else
                                        <a href="/uploads/{{ $getData->ngo_certificate }}" target="_blank" class=" "><i class="fa fa-eye"></i></a>
                                        @endif
                                        @break
                                        @endforeach
                                    <?php } else {
                                    } ?>
                                    <input type="file" name="ngo_certificate" accept=".pdf, .doc, .docx">

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>समझौता ज्ञापन अपलोड करें (MOA)<span>*</span></label>
                                    <?php if (!empty($getData->fact_certificate)) {
                                        $fact = explode('/', $getData->fact_certificate);

                                    ?>
                                        @foreach( $fact as $fa)
                                        @if($fa=='uploads')
                                        <a href="/{{$getData->fact_certificate}}" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        </a>
                                        @else
                                        <a href="/uploads/{{$getData->fact_certificate}}" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @endif
                                        @break
                                        @endforeach
                                    <?php } else {
                                    } ?>
                                    <input type="file" name="fact_certificate">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>क्या आपकी NGO नीति आयोग के NGO दर्पण में पंजीकृत है <span>*</span></label>
                                    <?php if (!empty($getData->ngo_registor_certificate)) {
                                        $ngo_reg = explode('/', $getData->ngo_registor_certificate);
                                    ?>
                                        @foreach($ngo_reg as $reg)
                                        @if($reg=='uploads')
                                        <a href="/<?php echo $getData->ngo_registor_certificate; ?>" target="_blank" class=""><i class="fa fa-eye"></i>
                                        </a>
                                        @else
                                        <a href="/uploads/<?php echo $getData->ngo_registor_certificate; ?>" target="_blank" class=""><i class="fa fa-eye"></i>
                                        </a>
                                        @endif
                                        @break
                                        @endforeach
                                    <?php }  ?>
                                    <input type="file" name="ngo_registor_certificate">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>क्या आपके पास 80 G का रजिस्ट्रेशन है <span>*</span></label>
                                    <?php if (!empty($getData->g_reg80)) {
                                        $g_reg = explode('/', $getData->g_reg80)
                                    ?>
                                        @foreach($g_reg as $regs)
                                        @if( $regs =='uploads')
                                        <a href="/<?php echo $getData->g_reg80; ?>" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @else
                                        <a href="/uploads/<?php echo $getData->g_reg80; ?>" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @endif
                                        @break
                                        @endforeach
                                    <?php }  ?>
                                    <input type="file" name="g_reg80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">

                                <label>क्या NGO को स्वास्थ्य से संबंधित अनुभव है ?<span>*</span></label>

                                @if($getData->relationship_certificate)
                                <?php
                                $relationship = explode('/', $getData->relationship_certificate)
                                ?>
                                @foreach($relationship as $rela)
                                @if($rela=='uploads')
                                <a href="/{{$getData->relationship_certificate}}" target="_blank" alt=""><i class="fa fa-eye"></i>
                                </a>
                                @else
                                <a href="/uploads/{{$getData->relationship_certificate}}" target="_blank" alt=""><i class="fa fa-eye"></i>
                                </a>
                                @endif
                                @break
                                @endforeach
                                @endif
                                <input type="file" name="relationship_certificate">

                            </div>
                        </div>


                        <div class="form-group">
                            <label>क्या NGO, FCRA/CSR -1 पंजीकृत है ?<span>*</span></label>
                            @if($getData->fcra)
                            <?php
                            $fcra = explode('/', $getData->fcra)
                            ?>
                            @foreach( $fcra as $fc)
                            @if($fc=='uploads')
                            <a href="/{{$getData->fcra}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>
                            @else
                            <a href="/uploads/{{$getData->fcra}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>
                            @endif
                            @break
                            @endforeach
                            @endif
                            <input type="file" name="fcra">
                        </div>

                        <!-- --------------------------- -->


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>क्या NGO किसी प्रकार की उपलब्धि/पुरस्कार धारक है। ?<span>*</span></label>
                                @if($getData->ngo_achievement)
                                <?php $ngo_achi = explode('/', $getData->ngo_achievement)   ?>
                                @foreach( $ngo_achi as $ngo)
                                @if($ngo=='uploads')
                                <a href="/{{$getData->ngo_achievement}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>
                                @else
                                <a href="/uploads/{{$getData->ngo_achievement}}" target="_blank" alt=""><i class="fa fa-eye"></i></a>

                                @endif
                                @break
                                @endforeach
                                @endif
                                <input type="file" name="ngo_achievement">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>आधार कार्ड अपलोड करें </label>
                                    </div>
                                    <div class="col-md-8">
                                        @if($getData->direactor_aadhar)
                                        <?php $director_pc = explode('/', $getData->direactor_aadhar); ?>
                                        @foreach($director_pc as $pc)
                                        @if($pc == 'uploads')
                                        <a href="/{{ $getData->direactor_aadhar }}" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @else
                                        <a href="/uploads/{{ $getData->direactor_aadhar }}" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @endif
                                        @break
                                        @endforeach
                                        @endif
                                        <input type="file" name="direactor_aadhar">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>पैन कार्ड अपलोड</label>
                                    </div>
                                    <div class="col-8">
                                        @if($getData->direactor_pan)
                                        <?php
                                        $diceator = explode('/', $getData->direactor_pan)
                                        ?>
                                        @foreach($diceator as $dc)
                                        @if($dc=='uploads')

                                        <a href="/{{$getData->direactor_pan }}" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @else
                                        <a href="/uploads/{{$getData->direactor_pan }}" target="_blank" class=""><i class="fa fa-eye"></i></a>
                                        @endif
                                        @break
                                        @endforeach
                                        @endif
                                        <input type="file" name="direactor_pan">

                                        <div class="modal fade" id="panCardModal" tabindex="-1" role="dialog" aria-labelledby="panCardModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="panCardModalLabel">Director's PAN Card</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('/' . $getData->direactor_pan) }}" class="img-fluid" alt="Director's PAN Card">
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Back</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>फोटो अपलोड </label>
                                    </div>
                                    <div class="col-8">
                                        @if($getData->direactor_photo)
                                        <?php
                                        $diceator_pic = explode('/', $getData->direactor_photo)

                                        ?>
                                        @foreach( $diceator_pic as $dc)
                                        @if($pc=='uploads')
                                        <a href="/{{$getData->direactor_photo }}" target="_blank"><i class="fa fa-eye"></i>
                                            @else
                                            <a href="/uploads/{{$getData->direactor_photo }}" target="_blank"><i class="fa fa-eye"></i>
                                                @endif
                                                @break
                                                @endforeach
                                                @endif
                                            </a>
                                            <input type="file" name="direactor_photo">
                                            <!-- The Modal -->
                                            <div class="modal fade" id="directorPhotoModal" tabindex="-1" role="dialog" aria-labelledby="directorPhotoModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="directorPhotoModalLabel">Director's Photo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('/' . $getData->direactor_photo) }}" class="img-fluid" alt="Director's Photo">
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Back</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">NGO जिस क्षेत्र में काम करना चाहती है जनपद (जिला) का नाम चुनें </label>
                                <input type="text" name="nogtypework" class="form-control" value="<?php echo $getData->nogtypework ?>">
                            </div>
                        </div>

                        <!-- --------------------------- -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="checkbox">क्या प्रत्येक ब्लॉक में कार्य करना चाहते हैं। ?<span>*</span></label>
                                <label>हाँ</label>
                                <input type="radio" name="block_option" value="" onchange="hideMouUpload7()" {{ $getData->block === null ? 'checked' : '' }}>
                                <label>नहीं</label>
                                <input type="radio" name="block_option" value="no" onchange="showMouUpload7()" {{ $getData->block ==! '' ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="col-md-12" id="mouUpload7" style="display: {{ $getData->block === 'no' ? 'block' : 'none' }}">
                            <div class="form-group">
                                <label>(यदि नहीं तो ब्लॉक का नाम लिखें )<span>*</span></label>
                                <input type="text" name="block_name" class="form-control" value="{{ $getData->block_name }}">
                            </div>
                        </div>



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


                        <div class="submit-section submit-btn-bottom float-left px-3">
                            <button type="submit" class="btn btn-primary submit-btn" style="border-radius:8px;">Update</button>
                        </div>
                    </form>
                <?php  } ?>
            </div>
        </div>
    </div>

    @include('inc_subadmins/footer')
</body>
<!-- Example of including jQuery from a CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function displayImage() {
        var input = document.getElementById('photo-input');
        var image = document.getElementById('profile-image');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                image.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('.chkbox').click(function() {
            var text = "";
            // alert('akash');
            $('.chkbox:checked').each(function() {
                text += $(this).val() + ',';
            })
            text = text.substring(0, text.length - 1);
            $('#selectedtext').val(text);
            // var count = $("[type=checkbox]:checked").length;
            // $('#count').val($("[type=checkbox]:checked").length);
        })
    });

    $(document).ready(function() {
        $('.aku').click(function() {
            var data = "";
            // alert('akash');
            $('.aku:checked').each(function() {
                data += $(this).val() + ',';
            })
            data = data.substring(0, data.length - 1);
            $('#selectedtext_2').val(data);
            // var count = $("[type=checkbox]:checked").length;
            // $('#count').val($("[type=checkbox]:checked").length);
        })
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result).width(100).height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('.chkbox').click(function() {
            var text = "";
            // alert('akash');
            $('.chkbox:checked').each(function() {
                text += $(this).val() + ',';
            })
            text = text.substring(0, text.length - 1);
            $('#selectedtext').val(text);

        })
    });

    $(document).ready(function() {
        $('.aku').click(function() {
            var data = "";
            // alert('akash');
            $('.aku:checked').each(function() {
                data += $(this).val() + ',';
            })
            data = data.substring(0, data.length - 1);
            $('#selectedtext_2').val(data);

        })
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result).width(100).height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- Ensure jQuery is included before this script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function showMouUpload7() {
        document.getElementById("mouUpload7").style.display = "block";
    }

    function hideMouUpload7() {
        document.getElementById("mouUpload7").style.display = "none";
    }
</script>
<script>
    function hideMouUpload7() {
        $('#mouUpload7').hide();
    }

    function showMouUpload7() {
        $('#mouUpload7').show();
    }

    $(document).ready(function() {

        if ($('input[name="block_option"]:checked').val() !== '') {
            hideMouUpload7();
        } else {
            showMouUpload7();
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Select the input elements
        var $emailInput = $('input[name="email"]');
        var $phoneInput = $('input[name="mobile"]');
        var $pincodeInput = $('#pincode');
        var $submitButton = $('#submit');
        var $directormail = $('input[name="director_mail"]')


        // Error message elements
        var $emailErrorMessage = $('#ngoemailErrorMessage');
        var $phoneErrorMessage = $('#ngophoneErrorMessage');


        // Add input event listeners for email and phone
        $emailInput.on('input', function() {
            var email = $emailInput.val();
            checkEmail(email);
        });

        $phoneInput.on('input', function() {
            var mobile = $phoneInput.val();
            checkMobile(mobile);
        });

        // Add input event listener for pincode
        $pincodeInput.on('input', function() {
            var pincode = $pincodeInput.val();
            if (pincode.length === 6) {
                $.ajax({
                    url: '/pincodes', // Update the URL as needed
                    method: 'GET',
                    data: {
                        'pincode': pincode
                    },
                    success: function(data) {
                        $('#city').val(data['City']);
                        $('#country').val('India');
                        $('#state').val(data['State']);
                    }
                });
            }
        });

        // Function to check email uniqueness
        function checkEmail(email) {
            $.ajax({
                type: 'GET',
                url: '/unique_email', // Update the URL as needed
                data: {
                    email: email
                },
                success: function(response) {
                    if (response.trim() === 'exists') {
                        $emailErrorMessage.text('Email already exists');
                    } else {
                        $emailErrorMessage.text('');
                    }
                    updateSubmitButtonState();
                }
            });
        }

        // Function to check phone number uniqueness
        function checkMobile(mobile) {
            $.ajax({
                type: 'GET',
                url: '/unique_mobile_number', // Update the URL as needed
                data: {
                    mobile_number: mobile
                },
                success: function(response) {
                    if (response.trim() === 'exists') {
                        $phoneErrorMessage.text('Phone number already exists');
                    } else {
                        $phoneErrorMessage.text('');
                    }
                    updateSubmitButtonState();
                }
            });
        }

        // Add change event listeners to update the submit button state
        $emailInput.on('change', updateSubmitButtonState);
        $phoneInput.on('change', updateSubmitButtonState);

        // Function to update the submit button state based on error messages
        function updateSubmitButtonState() {
            if ($emailErrorMessage.text() !== '' || $phoneErrorMessage.text() !== '') {
                $submitButton.prop('disabled', true);
            } else {
                $submitButton.prop('disabled', false);
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        var $directorMailInput = $('#director_mail');
        var $directorPhoneInput = $('#director_phone');
        var $demailErrorMessage = $('#directoremailErrorMessage');
        var $dphoneErrorMessage = $('#directorphoneErrorMessage');

        $directorMailInput.on('input', function() {
            var email = $directorMailInput.val();
            checkEmailDirector(email);
        });

        $directorPhoneInput.on('input', function() {
            var phone = $directorPhoneInput.val();
            checkMobileDirector(phone);
        });

        function checkEmailDirector(email) {
            $.ajax({
                type: 'GET',
                url: '/unique_email_dis',
                data: {
                    email: email
                },
                success: function(response) {
                    if (response.exists) {
                        $demailErrorMessage.text('Email already exists');
                    } else {
                        $demailErrorMessage.text('');
                    }
                    updateSubmitButtonState();
                }
            });
        }

        function checkMobileDirector(phone) {
            $.ajax({
                type: 'GET',
                url: '/unique_mobile_number_dis',
                data: {
                    mobile_number: phone
                },
                success: function(response) {
                    if (response.exists) {
                        $dphoneErrorMessage.text('Phone number already exists');
                    } else {
                        $dphoneErrorMessage.text('');
                    }
                    updateSubmitButtonState();
                }
            });
        }

        function updateSubmitButtonState() {
            // Implement your logic to enable/disable the submit button based on error messages
        }

        //PINCODES EXTRACTION for pincode2
        $('#pincode2').on('input', function() {
            var pincode2 = $(this).val();
            $(this).val(pincode2.substring(0, 6));
            if (pincode2.length === 6) {
                $.ajax({
                    url: '{{url("pincodes")}}',
                    method: 'GET',
                    data: {
                        'pincode': pincode2
                    },
                    success: function(data) {
                        $('#city2').val(data['City']);
                        $('#country2').val('India');
                        $('#state2').val(data['State']);
                    }
                });
            }
        });

    });
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('inc_subadmins/header')
</head>

<body>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Representative Register View</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Requests</li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="container py-5">
                <div class="container-sm">
                    <?php foreach ($dataValue as $datas) {

                    ?>
                    <form action="/sub_admins/uploads_registerRepresentative/{{ $datas->id }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-12">
                                <div class="container">
                                    <!-- Basic Information -->
                                    <div class="card p-2" style="width:100%;">
                                        <div class="card-body">
                                            <div class="section-header">
                                                <h2 class="text-center">ग्राम प्रधान का वरीयता
                                                </h2>
                                            </div>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>नाम <span>*</span></label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="<?php echo $datas->name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>ईमेल <span>*</span></label>
                                                        <input type="email" name="email"
                                                            id="director_mail"class="form-control"
                                                            value="<?php echo $datas->email; ?>" required>
                                                        <span id="emailErrorMessage" style="color: red;"></span>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>मोबाइल <span>*</span></label>
                                                        <input type="tel" name="mobile_number" id="director_phone"
                                                            class="form-control" maxlength="10"
                                                            value="<?php echo $datas->mobile_number; ?>">
                                                        <span id="phoneErrorMessage" style="color: red;"></span>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>आय प्रमाण पत्र यदि है तो * <span>*</span></label>
                                                    <?php
                                                         if($datas->income==''){?>

                                                    <label>हाँ</label>
                                                    <input type="radio" name="income" value="हाँ">
                                                    <label>नहीं</label>
                                                    <input type="radio" name="income" value="नहीं" checked>

                                                    <?php }else{  ?>
                                                    <label>हाँ</label>
                                                    <input type="radio" name="income" value="हाँ" checked>
                                                    <label>नहीं</label>
                                                    <input type="radio" name="income" value="नहीं">
                                                    <a href="/<?php echo $datas->income; ?>" target="_blank">View</a>

                                                    <?php }?>
                                                    <input type="file" name="income">
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>आधार कार्ड फोटो <span>*</span></label>
                                                        <?php if (!empty($datas->adhar_card)) {
                                                                $adhar= explode('/',$datas->adhar_card)
                                                                ?>
                                                        @foreach ($adhar as $adh)
                                                            @if ($adh == 'uploads')
                                                                <a href="/<?php echo $datas->adhar_card; ?>" target="_blank">View</a>
                                                            @else
                                                                <a href="/uploads/<?php echo $datas->adhar_card; ?>"
                                                                    target="_blank">View</a>
                                                            @endif
                                                        @break
                                                    @endforeach

                                                    <?php }  ?>
                                                    <input type="file" name="adhar_card">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>क्लीनिक लगवाने की स्थान का फोटो<span>*</span></label>
                                                    <?php if (!empty($datas->place_img)) {
                                                               $place_img= explode('/',$datas->place_img)
                                                               ?>
                                                    @foreach ($place_img as $adh)
                                                        @if ($adh == 'uploads')
                                                            <a href="/<?php echo $datas->place_img; ?>" target="_blank">View</a>
                                                        @else
                                                            <a href="/uploads/<?php echo $datas->place_img; ?>"
                                                                target="_blank">View</a>
                                                        @endif
                                                    @break
                                                @endforeach
                                                <?php }  ?>
                                                <input type="file" name="place_img">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>क्या आप प्रधान है यदि है तो प्रमाण दें।
                                                    <span>*</span></label>
                                                <?php if (!empty($datas->pradhan_verification)) {

                                                                $pradhan_verification= explode('/',$datas->pradhan_verification)
                                                                ?>
                                                @foreach ($pradhan_verification as $adh)
                                                    @if ($adh == 'uploads')
                                                        <a href="/<?php echo $datas->pradhan_verification; ?>" target="_blank">View</a>
                                                    @else
                                                        <a href="/uploads/<?php echo $datas->pradhan_verification; ?>"
                                                            target="_blank">View</a>
                                                    @endif
                                                @break
                                            @endforeach
                                            <?php }  ?>
                                            <input type="file" name="pradhan_verification">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>व्यवसाय <span>*</span></label>
                                            <input type="text" class="form-control" name="occupation"
                                                value="{{ $datas->occupation }}">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>वार्षिक आय ? <span>*</span></label>
                                            <?php if (!empty($datas->year_amount)) {

                                                                $year_amount= explode('/',$datas->year_amount)
                                                                ?>
                                            @foreach ($year_amount as $adh)
                                                @if ($adh == 'uploads')
                                                    <a href="/<?php echo $datas->year_amount; ?>"
                                                        target="_blank">View</a>
                                                @else
                                                    <a href="/uploads/<?php echo $datas->year_amount; ?>"
                                                        target="_blank">View</a>
                                                @endif
                                            @break
                                        @endforeach

                                        <?php }  ?>
                                        <input type="file" name="year_amount">
                                    </div>
                                </div>



                                <div class="col-4">
                                    <div class="form-group">
                                        <label>ग्राम <span>*</span></label>
                                        <input type="text" name="village" class="form-control"
                                            value="<?php echo $datas->village; ?>" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>थाना <span>*</span></label>
                                        <input type="text" name="police_station"
                                            class="form-control" value="<?php echo $datas->police_station; ?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>डाकघर <span>*</span></label>
                                        <input type="text" name="post" class="form-control"
                                            value="<?php echo $datas->post; ?>" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>जिला </label>
                                        <input type="text" name="district" id="city2"
                                            class="form-control" value="<?php echo $datas->district; ?> "
                                            required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>पिनकोड </label>
                                        <input type="number" name="pincode" id="pincode2"
                                            class="form-control" value="<?php echo $datas->pincode; ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ब्लॉक<span>*</span></label>
                                        <input type="text" name="block" class="form-control"
                                            value="{{ $datas->block }}">
                                    </div>
                                </div>
                                <div class="submit-section submit-btn-bottom float-left px-3">
                                    <button type="submit" class="btn btn-primary submit-btn"
                                        style="border-radius:8px;">Update</button>
                                </div>

                                <div class="col-4">

                                </div>

                                <div class="col-12">
                                </div>

                            </div>
                        </div>

                        <!-- /Basic Information -->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php } ?>
</div>

</div>
</div>
</div>



</body>
@include('inc_subadmins/footer')
<script>
    $(document).ready(function() {
        var $directorMailInput = $('#director_mail');
        var $directorPhoneInput = $('#director_phone');
        var $demailErrorMessage = $('#emailErrorMessage');
        var $dphoneErrorMessage = $('#phoneErrorMessage');

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


        function updateSubmitButtonState() {}

        //PINCODES EXTRACTION for pincode2
        $('#pincode2').on('input', function() {
            var pincode2 = $(this).val();
            $(this).val(pincode2.substring(0, 6));
            if (pincode2.length === 6) {
                $.ajax({
                    url: '{{ url('pincodes') }}',
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

</html>

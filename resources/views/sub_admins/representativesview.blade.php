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
                    <form action="s/registerRepresentative" method="post" enctype="multipart/form-data">
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

                                                <div class="form-group">
                                                    <label>आय प्रमाण पत्र यदि है तो * <span>*</span></label>
                                                    <?php
                                                         if($datas->income==''){?>

                                                    <label>हाँ</label>
                                                    <input readonly type="radio" name="income" value="हाँ">
                                                    <label>नहीं</label>
                                                    <input readonly type="radio" name="income" value="नहीं"
                                                        checked>

                                                    <?php }else{  ?>
                                                    <label>हाँ</label>
                                                    <input readonly type="radio" name="income" value="हाँ"
                                                        checked>
                                                    <label>नहीं</label>
                                                    <input readonly type="radio" name="income" value="नहीं">
                                                    <?php if (!empty($datas->income)) {
                                                             $income=explode('/',$datas->income);


                                                            ?>

                                                    @foreach ($income as $inc)
                                                        @if ($inc == 'uploads')
                                                            <a href="/<?php echo $datas->income; ?>" target="_blank">View</a>
                                                        @else
                                                            <a href="/uploads/<?php echo $datas->income; ?>"
                                                                target="_blank">View</a>
                                                        @endif
                                                    @break
                                                @endforeach


                                                <?php }  ?>
                                                <?php }?>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>आधार कार्ड फोटो <span>*</span></label>
                                                    <?php
                                                                if (!empty($datas->income)) {
                                                                    $income = explode('/', $datas->income);

                                                                    // Define the folders where you want to look for the image
                                                                    $folders = ['uploads', 'uploads/representative'];

                                                                    $imageFound = false;

                                                                    foreach ($folders as $folder) {
                                                                        $filePath = ("{$folder}/" . end($income));
                                                                        if (file_exists($filePath)) {
                                                                            $imageFound = true;
                                                                            $imagePath = "{$folder}/" . end($income);
                                                                            break;
                                                                        }
                                                                    }

                                                                    if ($imageFound) {
                                                                        ?>
                                                    <a href="/{{ $imagePath }}" target="_blank">View</a>
                                                    <?php
                                                                    } else {
                                                                        // Set a default image link if the image is not found in any folder
                                                                        $defaultImagePath = "/assets/profile.png"; // Replace with the actual path to your default image
                                                                        ?>
                                                    <a href="{{ $defaultImagePath }}" target="_blank">View</a>
                                                    <?php
                                                                    }
                                                                }
                                                                ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>क्लीनिक लगवाने की स्थान का फोटो<span>*</span></label>
                                                    <?php if (!empty($datas->place_img)) {
                                                                 $place_img=explode('/',$datas->place_img);

                                                                ?>
                                                    @foreach ($place_img as $inc)
                                                        @if ($inc == 'uploads')
                                                            <a href="/<?php echo $datas->place_img; ?>" target="_blank">View</a>
                                                        @else
                                                            <a href="/uploads/<?php echo $datas->place_img; ?>"
                                                                target="_blank">View</a>
                                                        @endif
                                                    @break
                                                @endforeach

                                                <?php }  ?>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>क्लीनिक लगवाने की स्थान छितफल (sf )<span>*</span></label>

                                                <input type="text" class="form-control" name="place_map"
                                                    value="{{ $datas->place_map ? $datas->place_map : 'NA' }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>क्या आप प्रधान है यदि है तो प्रमाण दें।
                                                    <span>*</span></label>
                                                <?php if (!empty($datas->pradhan_verification)) {
                                                              $pradhan_verification=explode('/',$datas->pradhan_verification);

                                                              ?>
                                                @foreach ($pradhan_verification as $inc)
                                                    @if ($inc == 'uploads')
                                                        <a href="/<?php echo $datas->pradhan_verification; ?>" target="_blank">View</a>
                                                    @else
                                                        <a href="/uploads/<?php echo $datas->pradhan_verification; ?>"
                                                            target="_blank">View</a>
                                                    @endif
                                                @break
                                            @endforeach
                                            <?php }  ?>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>व्यवसाय<span>*</span></label>
                                            <input readonly type="text" name="occupation"
                                                class="form-control" value="<?php echo $datas->village; ?>">
                                        </div>
                                    </div>
                                    @if ($datas->year_amount)
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>वार्षिक आय ? <span>*</span></label>
                                                <?php if (!empty($datas->year_amount)) { ?><a href="/<?php echo $datas->year_amount; ?>"
                                                    target="_blank">View</a>
                                                <?php }  ?>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>ग्राम <span>*</span></label>
                                            <input readonly type="text" name="village"
                                                class="form-control" value="<?php echo $datas->village; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>थाना <span>*</span></label>
                                            <input readonly type="text" name="police_station"
                                                class="form-control" value="<?php echo $datas->police_station; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>डाकघर <span>*</span></label>
                                            <input readonly type="text" name="post"
                                                class="form-control" value="<?php echo $datas->post; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>जिला </label>
                                            <input readonly type="text" name="district"
                                                class="form-control" value="<?php echo $datas->district; ?> "
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>पिनकोड </label>
                                            <input readonly type="number" name="pincode"
                                                class="form-control" value="<?php echo $datas->pincode; ?>"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>ईमेल <span>*</span></label>
                                            <input readonly type="mail" name="email"
                                                class="form-control" value="<?php echo $datas->email; ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>मोबाइल <span>*</span></label>
                                            <input readonly type="number" name="mobile_number"
                                                class="form-control" value="<?php echo $datas->mobile_number; ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="submit-section submit-btn-bottom float-left px-3">
                                        <button type="button" class="btn btn-primary" onclick="goBack()"
                                            style="border-radius:8px;">Back</button>
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



<script>
    function goBack() {
        window.location.href = '/sub_admins/representatives';
    }
</script>
@include('inc_subadmins/footer')

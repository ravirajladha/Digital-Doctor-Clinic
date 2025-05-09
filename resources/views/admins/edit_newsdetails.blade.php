<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @include('inc_admins/header')
</head>

<body>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">New Room</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">New Room</li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="container py-5">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title fw-3">News Information</h4>
                    <br><br>
                    <?php foreach($displynewdata as $datas) {  ?>
                    <form action="/admins/update_news/{{$datas->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="profile-img">

                                        <img  src="/uploads/newsroom/<?php echo $datas->newphoto ?>" class="avatar img-circle img-thumbnail" id="blah" alt="avatar" style="height:100px;width:100px;">
                                    </div>
                                    <div class="upload-img file-upload">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" class="upload" id="image-input" onchange="readURL(this);" value="<?php echo $datas->newphoto ?>" name="newsphoto">
                                        </div>
                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Title <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $datas->title ?>" class="form-control" name="title" maxlength="100" minlength="100" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea   type="text" class="form-control " name="discription"   required><?php echo $datas->discription ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link <span class="text-danger">*</span></label>
                                <input type="hidden" value="<?php echo $datas->id ?>" class="form-control" name="id" required>

                                <input type="text" value="<?php echo $datas->link ?>" class="form-control" name="link" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <div class="change-avatar">
                                    <div class="profile-img">
                                        <img src="/uploads/newslogo/<?php echo $datas->newslogo ?>" class="avatar img-circle img-thumbnail" id="blah" alt="avatar" style="height:100px;width:100px;">
                                    </div>
                                    <div class="upload-img file-upload">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Logo</span>
                                            <input type="file" class="upload" id="image-input-logo" onchange="readURL(this);" name="newslogo">
                                        </div>
                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 1MB</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <button class="btn btn-success lg">Update</button>

                    </div>
                 </form>
                 <?php }?>
                </div>
                </div>
            </div>
        </div>
</body>
@include('inc_admins/footer')

</html>
</html>
<script>
    $(document).ready(function() {
        // Function to read and display the selected image
        var readURL = function(input, targetElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    targetElement.attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

        // Event handler for file input change
        $(".file-upload .upload").on('change', function() {
            // Determine the target element based on the parent container
            var targetElement = $(this).closest('.change-avatar').find('.avatar');
            readURL(this, targetElement);
        });
    });
</script>

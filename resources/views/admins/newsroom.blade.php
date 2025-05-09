<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('inc_admins/header')
</head>

<body>
    <div class="page-wrapper" style="margin-left: 240px">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">News Room</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">News Room</li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title fw-3">News Information</h4>
                        <br><br>
                        <form action="/create_news" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-group" class="col-form-label"></label>
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="/assets_admin/img/doctors/doctor-thumb-02.jpg"
                                                    class="avatar img-circle img-thumbnail" id="blah"
                                                    alt="avatar" style="height:100px;width:100px;">
                                            </div>
                                            <div class="upload-img file-upload">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" id="image-input"
                                                        onchange="readURL(this);" name="newphoto" required>
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-group" class="col-form-label">Logo</label>

                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="/assets_admin/img/doctors/doctor-thumb-02.jpg"
                                                    class="avatar img-circle img-thumbnail" id="blah"
                                                    alt="avatar" style="height:100px;width:100px;">
                                            </div>
                                            <div class="upload-img file-upload">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Logo</span>
                                                    <input type="file" class="upload" id="image-input-logo"
                                                        onchange="readURL(this);" name="newslogo">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" required
                                            placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Link <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="link" required
                                            placeholder="Enter Link">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea id="discription" rows="5" type="text" class="form-control " name="discription" required
                                            placeholder="Enter Description"></textarea>
                                    </div>
                                </div>


                                <button class="btn btn-success lg">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
@include('inc_admins/footer')

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

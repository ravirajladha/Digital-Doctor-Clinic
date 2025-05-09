<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @include('inc_subadmins/header')
</head>

<body>
    <div class="page-wrapper" style="margin-left: 240px">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Social Media</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Social Media</li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="container py-5">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title fw-3">Social Media Links</h4>
                    <br><br>
                    <?php foreach($media as $dt) {
                        $dt->facebook;
                       
                        ?>
                       
                    <form action="/sub_admins/updateSocialmedia" method="post" > 
                        @csrf
                    <div class="row form-row">
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Facebook <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="<?php echo $dt->facebook;?>" name="facebook" required>
                                <input type="hidden" class="form-control " value="<?php echo $dt->id;?>" name="id" required/>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Instagram <span class="text-danger">*</span></label>
                                <input type="text" class="form-control " value="<?php echo $dt->Instagram;?>" name="Instagram" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Twitter <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="<?php echo $dt->twitter;?>" name="twitter" required>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Linkedin <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="<?php echo $dt->linkedin;?>" name="linkedin" required>  
                            </div>
                        </div>
                        <?php }?>
                       <button class="btn btn-success lg">Submit</button>

                    </div>
                 </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('inc_subadmins/footer')

</html>

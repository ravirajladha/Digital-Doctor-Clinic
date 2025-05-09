<!DOCTYPE html>
<html lang="en">
@include('inc/newheader')

<body>
    <div class="margintop">
        <div class="container">
            <div class="row align-items-center" style="margin-top:80px;">
                <div class="col-lg-12">
                    <div class="div-header">
                        <h6>What is camp?</h6>
                    </div>
                    <div class="about-content">
                        <p style="text-align:justify;">A health camp is a type of health education program that focuses on promoting healthy lifestyle choices and preventing health problems in which medical workers provide healthcare services to people in a particular area.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="div-header">
                        <h6>Purpose</h6>
                    </div>
                    <div class="about-content">
                        <p style="text-align:justify;">The purpose of a health camp is to educate people about health-related topics and to encourage them to make healthy lifestyle changes, provide medical assistance to people who may not have access to medical care due to either financial or geographical reasons.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="div-header">
                        <h6>Advantages</h6>
                    </div>
                    <div class="about-content">
                        <p style="text-align:justify;">Some of the advantages of health camps include increased knowledge about health-related topics, improved motivation to make healthy lifestyle changes, and increased community involvement in health promotion activities. Health camps can also help to create healthier communities by providing a safe environment for people to discuss health issues, share experiences, provide access to medical professionals for those in need.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="div service-div">

            <div class="container">

                <div class="div-header ">
                    <h2>Some important points for setting up a camp at any place</h2>
                    <p>Criteria for setting up camp</p>
                </div>
                <div class="row child-care">
                    <div class="" style='text-align:justify; '>
                        <ul class="left">
                            <li style='font-size: 16px;'><i class="fas fa-chevron-right"></i>The purpose of setting up the camp should be for the benefit of all.</li><br>
                            <li style='font-size: 16px;'><i class="fas fa-chevron-right"></i>No benefit will be taken from the place where the camp is being set up.</li><br>
                            <li style='font-size: 16px;'><i class="fas fa-chevron-right"></i>In the place where the camp will be set up, there should be an arrangement of light, water, and room.</li><br>
                            <li style='font-size: 16px;'><i class="fas fa-chevron-right"></i>The consent of at least 20 Local persons is required to set up a camp.</li><br>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="container-sm">
        <div class="contact-form">
            <div class="row">
                    <form action="/pages/add_camp" method="post" >
                        @csrf
                        <div class="row">
                            <div class="div-header text-center">
                                <h2>Form for Camp Request </h2>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name </label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name </label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Camp </label>
                                    <input type="date" name="cmp_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Camping Address </label>
                                    <input type="text" name="cmp_adr" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Number </label>
                                    <input type="text" name="contact_num" class="form-control" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>How Many Visitors Can Come </label>
                                    <input type="text" name="visitors_cnt" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name of The Organization Conducting the Camp, If Any</label>
                                    <input type="text" name="org_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>20 Names Who Are Giving Consent to Conduct the Camp <br> <strong>Names Should be Separated by Comma</strong></label>
                                    <textarea name="visitors_list" class="form-control" required>

											</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center mb-4"> <!-- Adding a card-footer div -->
                            <button class="btn bg-primary" style="background:linear-gradient(to right, #00ccff, #ff2994);">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
</body>

</html>

@include('inc/newfooter')

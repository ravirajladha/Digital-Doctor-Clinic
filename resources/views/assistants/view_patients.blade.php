@include('inc_assistant/header')

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_assistant/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row row-grid">
                    <?php foreach($get_patients as $patient){ ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card widget-profile pat-widget-profile">
                            <div class="card-body">
                                <div class="pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="/profileofpatient/{{ $patient->id }}" class="booking-doc-img">
                                            <?php if(empty($patient->image)){ ?>
                                            <img src="{{ url('assets/profile2.jpg') }}" alt="User Image">
                                            <?php }else{ ?>
                                            <img src="/<?php echo $patient->image; ?>" alt="User Image">
                                            <?php } ?>
                                        </a>
                                        <div class="profile-det-info">
                                            <h3><a href="/profileofpatient/{{ $patient->id }}"><?php echo $patient->fname; ?><?php echo $patient->lname; ?>
                                                </a></h3>

                                            <div class="patient-details">
                                                <h5><b>Patient ID :</b><?php echo $patient->patient_id; ?></h5>
                                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>
                                                    <?php echo $patient->address; ?> <?php echo $patient->city; ?> <?php echo $patient->state; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="patient-info">
                                    <ul>
                                        <li>Phone <span><?php echo $patient->mobile; ?></span></li>
                                        <li>Age <span><?php echo $patient->age; ?> Years, Male</span></li>
                                        <li>Blood Group <span><?php echo $patient->blood_group; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>




                </div>


                </table>
            </div>

        </div>

    </div>

</div>

</div>
<!-- /Page Content -->







@include('inc_assistant/footer')

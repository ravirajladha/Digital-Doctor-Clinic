@include('/inc_assistant/header')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Patient Profile</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Patient Profile</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<?php

use App\Models\Assistant;

 foreach ($data['get_consultations_data'] as $item) {; ?>
<!-- <?php echo $item->patient_id; ?> -->
<?php $assistantModel = new Assistant();
$get_patient_id = $assistantModel->get_patient_id($item->patient_id);
?>
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">

                <!-- Patient Profile Widget -->
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <?php if (empty($get_patient_id[0]->image)) { ?>
                                    <img src="/assets//img/patients/patient.jpg" alt="User Image">
                                    <?php } else { ?>
                                    <img src="/uploads/<?php echo $get_patient_id[0]->image; ?>" height="100%" width="100%"
                                        alt="User Image">
                                    <?php } ?>
                                </a>
                                <div class="profile-det-info">
                                    <h3><?php echo ucwords($get_patient_id[0]->fname . ' ' . $get_patient_id[0]->lname); ?></h3>

                                    <div class="patient-details">
                                        <h5><b>Patient ID :</b> PT00<?php echo $get_patient_id[0]->id; ?></h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <?php echo $get_patient_id[0]->city; ?>,
                                            <?php echo $get_patient_id[0]->country; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li>Age <span><?php echo $get_patient_id[0]->age; ?> Years</span></li>
                                <li>Blood Group <span><?php echo $get_patient_id[0]->blood_group; ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Patient Profile Widget -->

                <!-- Last Booking -->
                <?php $assistantModel = new Assistant();
                $get_patient_in_consultations = $assistantModel->get_patient_in_consultations($item->patient_id);
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Last Consultations</h4>
                    </div>
                    <ul class="list-group list-group-flush">

                        <?php $count = 0; ?>
                        <?php foreach ($get_patient_in_consultations as $doctor) { ?>
                        <?php if ($doctor->doctor_id != 1 && $doctor->status != 0) { ?>
                        <?php $assistantModel = new Assistant();
                        $get_doctors_consultations = $assistantModel->get_doctors_consultations($doctor->doctor_id);
                        ?>
                        <?php if ($count == 2) { ?>
                        <?php break; ?>
                        <?php } ?>
                        <?php $assistantModel = new Assistant();
                        $get_doctors_detail = $assistantModel->get_doctors_detail($get_doctors_consultations[0]->email);
                        ?>
                        <li class="list-group-item">
                            <div class="media align-items-center d-flex">
                                <div class="me-3 flex-shrink-0">
                                    <?php if (empty($get_doctors_detail[0]->photo)) { ?>
                                    <img alt="Image placeholder" src="/assets/img/doctors/doctor-thumb-02.jpg"
                                        class="avatar  rounded-circle">
                                    <?php } else { ?>
                                    <img src="/uploads/<?php echo $get_doctors_detail[0]->photo; ?>" height="100%" width="100%"
                                        class="avatar  rounded-circle" alt="User Image">
                                    <?php } ?>
                                </div>
                                <div class="media-body flex-grow-1">
                                    <h5 class="d-block mb-0"><?php echo ucwords($get_doctors_detail[0]->fname . ' ' . $get_doctors_detail[0]->lname); ?> </h5>
                                    <span class="d-block text-sm text-muted">Medicine in <?php echo $get_doctors_detail[0]->department; ?></span>
                                    <span class="d-block text-sm text-muted"><?php echo date('M jS Y', strtotime($doctor->updated_at)); ?>
                                        <?php echo date('h.i.s A', strtotime($doctor->updated_at)); ?></span>
                                </div>
                            </div>
                        </li>
                        <?php $count++; ?>

                        <?php } ?>

                        <?php } ?>

                    </ul>
                </div>
                <!-- /Last Booking -->

            </div>

            <div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="user-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#pat_appointments"
                                        data-bs-toggle="tab">Consultation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pres"
                                        data-bs-toggle="tab"><span>Prescription</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#medical" data-bs-toggle="tab"><span
                                            class="med-records">Medical Records</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#billing" data-bs-toggle="tab"><span>Billing</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <!-- Appointment Tab -->
                            <div id="pat_appointments" class="tab-pane fade show active">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Doctor</th>
                                                        <th>Date</th>
                                                        <th>Follow Up</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <?php $assistantModel = new Assistant();
                                                $get_patient_in_consultations = $assistantModel->get_patient_in_consultations($item->patient_id);
                                                ?>
                                                <tbody>
                                                    <?php foreach ($get_patient_in_consultations as $doctor) { ?>
                                                    <?php if ($doctor->doctor_id != 1 && $doctor->status != 0) { ?>
                                                    <?php $assistantModel = new Assistant();
                                                    $get_doctors_consultations = $assistantModel->get_doctors_consultations($doctor->doctor_id);
                                                    ?>
                                                    <?php $assistantModel = new Assistant();
                                                    $get_doctors_detail = $assistantModel->get_doctors_detail($get_doctors_consultations[0]->email);
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <?php if (empty($get_doctors_detail[0]->photo)) { ?>
                                                                    <img alt="Image placeholder"
                                                                        src="/assets/img/doctors/doctor-thumb-02.jpg"
                                                                        class="avatar  rounded-circle">
                                                                    <?php } else { ?>
                                                                    <img src="/uploads/<?php echo $get_doctors_detail[0]->photo; ?>"
                                                                        height="100%" width="100%"
                                                                        class="avatar  rounded-circle" alt="User Image">
                                                                    <?php } ?>
                                                                </a>
                                                                <a href=" #"><?php echo ucwords($get_doctors_detail[0]->fname . ' ' . $get_doctors_detail[0]->lname); ?> <span>Medicine in
                                                                        Neuroradiology</span></a>
                                                            </h2>
                                                        </td>

                                                        <td><?php echo date('M jS Y', strtotime($doctor->updated_at)); ?> <span
                                                                class="d-block text-info"><?php echo date('h.i.s A', strtotime($doctor->updated_at)); ?></span>
                                                        </td>
                                                        <td>16 Nov 2023</td>
                                                        <td><span
                                                                class="badge rounded-pill bg-success-light">Confirm</span>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Appointment Tab -->
                            <?php $assistantModel = new Assistant();
                            $get_patient_in_consultations = $assistantModel->get_patient_in_consultations($item->patient_id);
                            ?>
                            <!-- Prescription Tab -->
                            <div class="tab-pane fade" id="pres">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Date </th>
                                                        <th>Name</th>
                                                        <th>Created by </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($get_patient_in_consultations as $doctor) { ?>
                                                    <?php if ($doctor->doctor_id != 1 && $doctor->status != 0) { ?>
                                                    <?php $assistantModel = new Assistant();
                                                    $get_prescription = $assistantModel->get_prescription($doctor->id);
                                                    $get_consultations_with_id = $assistantModel->get_consultations_with_id($doctor->id);
                                                    $get_doctor_data = $assistantModel->get_doctor_data($get_consultations_with_id[0]->doctor_id);
                                                    $get_doctor_data_1 = $assistantModel->get_doctor_data_1($get_doctor_data[0]->email);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo date('M jS Y', strtotime($get_prescription[0]->created_at)); ?></td>
                                                        <td>Prescription <?php echo $get_prescription[0]->id; ?></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <?php if (empty($get_doctor_data_1[0]->photo)) { ?>
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets/img/doctors/doctor-thumb-01.jpg"
                                                                        alt="User Image">
                                                                    <?php } else { ?>
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/uploads/<?php echo $get_doctor_data_1[0]->photo; ?>"
                                                                        alt="User Image">
                                                                    <?php } ?>
                                                                </a>
                                                                <a href=" #">Dr.<?php echo ucwords($get_doctor_data_1[0]->fname . ' ' . $get_doctor_data_1[0]->lname); ?>
                                                                    <span>Medicine in <?php echo $get_doctor_data_1[0]->specialization; ?></span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription/<?php echo $doctor->id; ?>"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Prescription Tab -->

                            <!-- Medical Records Tab -->
                            <div class="tab-pane fade" id="medical">

                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    ` <tr>
                                                        <th>ID</th>
                                                        <th>Date </th>
                                                        <th>Description</th>
                                                        <th>Attachment</th>
                                                        <th>Created</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0010</a></td>
                                                        <td>14 Nov 2020</td>
                                                        <td>Psycho Spiritual Stress</td>
                                                        <td><a href="#">Psychiatry-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-01.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. John Moffett
                                                                    <span>Psychiatry</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0009</a></td>
                                                        <td>13 Nov 2020</td>
                                                        <td>Teeth Cleaning</td>
                                                        <td><a href="#">Psychiatry-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-02.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Mary Nielson
                                                                    <span>Psychiatry</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0008</a></td>
                                                        <td>12 Nov 2020</td>
                                                        <td>General Checkup</td>
                                                        <td><a href="#">cardio-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-03.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Donald Kahn <span>Physical
                                                                        stress</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0007</a></td>
                                                        <td>11 Nov 2020</td>
                                                        <td>General Test</td>
                                                        <td><a href="#">general-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-04.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Brady Chambliss
                                                                    <span>Neuroradiology</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0006</a></td>
                                                        <td>10 Nov 2020</td>
                                                        <td>Eye Test</td>
                                                        <td><a href="#">eye-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-05.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Marvin Campbell
                                                                    <span>Neuroradiology</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0005</a></td>
                                                        <td>9 Nov 2020</td>
                                                        <td>Leg Pain</td>
                                                        <td><a href="#">ortho-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-06.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Eric Pruett
                                                                    <span>Psychiatry</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0004</a></td>
                                                        <td>8 Nov 2020</td>
                                                        <td>Head pain</td>
                                                        <td><a href="#">neuro-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-07.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Byron Boyd
                                                                    <span>Neuroradiology</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0003</a></td>
                                                        <td>7 Nov 2020</td>
                                                        <td>Skin Alergy</td>
                                                        <td><a href="#">alergy-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-08.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Paul Richard
                                                                    <span>Neuroradiology</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0002</a></td>
                                                        <td>6 Nov 2020</td>
                                                        <td>Psychiatry</td>
                                                        <td><a href="#">Psychiatry-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-09.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Byron Boyd
                                                                    <span>Psychiatry</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0);">#MR-0001</a></td>
                                                        <td>5 Nov 2020</td>
                                                        <td>Psycho Spiritual Stress</td>
                                                        <td><a href="#">Psychiatry-test.pdf</a></td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-10.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Leonard Withers
                                                                    <span>Psychiatry</span></a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="#" class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Medical Records Tab -->

                            <!-- Billing Tab -->
                            <div class="tab-pane" id="billing">
                               
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Invoice No</th>
                                                        <th>Doctor</th>
                                                        <th>Amount</th>
                                                        <th>Paid On</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0010</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets/img/doctors/doctor-thumb-01.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Oscar Hazard
                                                                    <span>Psychiatry</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;450</td>
                                                        <td>14 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0009</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-02.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Mary Nielson
                                                                    <span>Psychiatry</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;300</td>
                                                        <td>13 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0008</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-03.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Donald Kahn <span>Physical
                                                                        stress</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;150</td>
                                                        <td>12 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0007</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-04.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Brady Chambliss
                                                                    <span>Neuroradiology</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;50</td>
                                                        <td>11 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0006</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-05.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Marvin Campbell
                                                                    <span>Neuroradiology</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;600</td>
                                                        <td>10 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0005</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-06.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Eric Pruett
                                                                    <span>Psychiatry</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;200</td>
                                                        <td>9 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0004</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-07.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Byron Boyd
                                                                    <span>Neuroradiology</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;100</td>
                                                        <td>8 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0003</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-08.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Paul Richard
                                                                    <span>Neuroradiology</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;250</td>
                                                        <td>7 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0002</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-09.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Byron Boyd
                                                                    <span>Psychiatry</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;175</td>
                                                        <td>6 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="invoice-view.html">#INV-0001</a>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href=" #" class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="/assets//img/doctors/doctor-thumb-10.jpg"
                                                                        alt="User Image">
                                                                </a>
                                                                <a href=" #">Dr. Leonard Withers
                                                                    <span>Neuroradiology</span></a>
                                                            </h2>
                                                        </td>
                                                        <td> &#8377;550</td>
                                                        <td>5 Nov 2020</td>
                                                        <td class="text-end">
                                                            <div class="table-action">

                                                                <a href="/assistants/show_prescription"
                                                                    class="btn btn-sm bg-info-light">
                                                                    <i class="far fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Billing Tab -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?php } ?>
<!-- /Page Content -->

@include('/inc_assistant/footer')

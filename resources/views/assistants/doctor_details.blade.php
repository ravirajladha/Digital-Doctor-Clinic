@include('inc_assistant/header')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/assistants/dashboard">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">View Doctors</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">View Doctors</h2>
			</div>
		</div>
	</div>
</div>
<!-- /Breadcrumb -->
<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			@include('inc_assistant/navbar')
			<div class="col-md-7 col-lg-8 col-xl-9">
				<div class="row row-grid">
					<?php foreach ($maleDoctors as $item) { ?>
						<div class="col-md-6 col-lg-4 col-xl-3">
							<div class="card widget-profile pat-widget-profile">
								<div class="card-body">
									<h3><?php echo $item->id; ?></h3>
									<div class="pro-widget-content">

										<div class="profile-info-widget">

											<a href="/assistants/doctor_profile/<?php echo $item->id; ?>" class="booking-doc-img">
												<?php if (empty($item->photo)) { ?>
													<img src="/assets/img/patients/patient.jpg" alt="User Image">
												<?php } else { ?>
													<img src="/<?php echo $item->photo; ?>" alt="User Image">
												<?php } ?>
											</a>
											<div class="profile-det-info">
												<h3><a href="/assistants/doctor_profile/<?php echo $item->id; ?>"><?php echo ucwords($item->fname . " " . $item->lname); ?></a></h3>

												<div class="patient-details">
													<h5><b>Doctor ID:</b><?php echo $item->id; ?></h5>
													<h5><b>Doctor Mail:</b><?php echo $item->email; ?></h5>

													<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <?php echo $item->city; ?>, <?php echo ucwords($item->country); ?></h5>
												</div>
											</div>
										</div>
									</div>
									<div class="patient-info">
										<ul>
											<li>Department <span><?php echo $item->department; ?></span></li>
											<li>Speciality <span><?php echo $item->specialization; ?></span>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php  } ?>



				</div>
			</div>

		</div>

	</div>
	<!-- /Page Content -->

	@include('inc_assistant/footer')

<?php require APPROOT . '/views/inc_assistant/header.php'; ?>
<style>
	.doctor-img img {
		border-radius: 5px;
		object-fit: cover;

	}
</style>
<!-- Page Content -->
<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
				<form action="<?php echo URLROOT; ?>/assistants/search_doctor" method="post">
					<!-- Search Filter -->
					<div class="card search-filter">
						<div class="card-header">
							<h4 class="card-title mb-0">Search Filter</h4>
						</div>
						<div class="card-body">
							<div class="filter-widget">
								<div class="cal-icon">
									<input type="text" class="form-control datetimepicker" name="select_date" placeholder="Select Date">
								</div>
							</div>
							<div class="filter-widget">
								<h4>Gender</h4>
								<div>
									<label class="custom_check">
										<input type="checkbox" name="gender_type" value="male" checked>
										<span class="checkmark"></span> Male Doctor
									</label>
								</div>
								<div>
									<label class="custom_check">
										<input type="checkbox" name="gender_type" value="female">
										<span class="checkmark"></span> Female Doctor
									</label>
								</div>
							</div>
							<div class="filter-widget">
								<h4>Select Specialist</h4>
								<div>
									<label class="custom_check">
										<input type="checkbox" name="select_specialist" class="select_specialist" value="Neuroradiology">
										<span class="checkmark"></span> Neuroradiology
									</label>
								</div>
								<div>
									<label class="custom_check">
										<input type="checkbox" name="select_specialist" class="select_specialist" value="Psycho Spiritual Stress">
										<span class="checkmark"></span> Psycho Spiritual Stress
									</label>
								</div>
								<div>
									<label class="custom_check">
										<input type="checkbox" name="select_specialist" class="select_specialist" value="Medicine in Neuroradiology">
										<span class="checkmark"></span> Medicine in Neuroradiology
									</label>
								</div>
								<div>
									<label class="custom_check">
										<input type="checkbox" name="select_specialist" class="select_specialist" value="Psychiatry">
										<span class="checkmark"></span> Psychiatry
									</label>
								</div>
								<div>
									<label class="custom_check">
										<input type="checkbox" name="select_specialist" class="select_specialist" value="Physical stress">
										<span class="checkmark"></span> Physical stress
									</label>
									<input type="text" id="selectedtext">
								</div>
							</div>
							<div class="btn-search">
								<button type="submit" class="btn w-100">Search</button>
							</div>
						</div>
					</div>
					<!-- /Search Filter -->
				</form>
			</div>

			<div class="col-md-12 col-lg-8 col-xl-9">
				<?php foreach ($data['get_doctors_data_1'] as $item) {  ?>
					<!-- Doctor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<a href="<?php echo URLROOT; ?>/assistants/doctor_profile/<?php echo $item->id; ?>">
											<!-- <img src="<?php echo URLROOT; ?>/assets/img/assistants/doctor-thumb-01.jpg" class="img-fluid" alt="User Image"> -->
											<?php if (empty($item->photo)) { ?>
												<img src="<?php echo URLROOT; ?>/assets/img/assistants/doctor-thumb-01.jpg" class="img-fluid" alt="User Image">
											<?php } else { ?>
												<img src="<?php echo URLROOT; ?>/uploads/<?php echo $item->photo; ?>" height="100%" width="100%" alt="User Image">
											<?php } ?>
										</a>
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name"><a href="<?php echo URLROOT; ?>/assistants/doctor_profile/<?php echo $item->id; ?>">Dr.<?php echo ucwords($item->fname . " " . $item->lname); ?></a></h4>
										<p class="doc-speciality"><?php echo $item->degree; ?></p>
										<h5 class="doc-department"><img src="<?php echo URLROOT; ?>/assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality"><?php echo $item->specialization; ?></h5>
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?php echo $item->city; ?>, <?php echo $item->country; ?></p>
											<ul class="clinic-gallery">
											</ul>
										</div>
										<div class="clinic-services">
											<span><?php echo $item->department; ?></span>
										</div>
									</div>
								</div>
								<div class="doc-info-right">
									<div class="clini-infos">
										<ul>
											<li><i class="fas fa-map-marker-alt"></i> <?php echo $item->city; ?>, <?php echo $item->country; ?></li>
											<li><i class="far fa-money-bill-alt"></i> &#8377;300 - &#8377;1000 <i class="fas fa-info-circle" data-bs-toggle="tooltip" title="Lorem Ipsum"></i> </li>
										</ul>
									</div>
									<div class="clinic-booking">
										<a class="view-pro-btn" href="<?php echo URLROOT; ?>/assistants/doctor_profile/<?php echo $item->id; ?>">View Profile</a>
										<a class="apt-btn" href="<?php echo URLROOT; ?>/assistants/voice_call">Connect With Doctor</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Doctor Widget -->
				<?php } ?>

				<div class="load-more text-center">
					<a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>
				</div>
			</div>
		</div>

	</div>

</div>
<!-- /Page Content -->
<script>
        $(document).ready(function(){
            $('.select_specialist').click(function(){
                var text ="";
               $('.select_specialist:checked').each(function(){
                text+=$(this).val()+',';
               })
			   alert(text);
                text=text.substring(0,text.length-1);
            $('#selectedtext').val(text);
            // var count=$("[type=checkbox]:checked").length;
            // $('#count').val($("[type=checkbox]:checked").length);
            })
        })
</script>

<?php require APPROOT . '/views/inc_assistant/footer.php'; ?>

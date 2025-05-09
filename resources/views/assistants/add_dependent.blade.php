@include('inc_assistant/header')


<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Dependent</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Add Dependent</h2>
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
				<div class="card">
					<div class="card-body add-dependent pt-5">
						<p class="add-title-one">Add A New Dependent</p>
						<p class="add-title-two">Dependent Information</p>

						<form action="/dependent_data" method="post" >
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" name="f_name" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" name="l_name" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Relationship to you</label>
										<select class="form-select form-control" name="relative_name" required>
											<option>Select</option>
											<option>Father</option>
											<option>Mother</option>
											<option>Sibling</option>
											<option>Spouse</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Gender</label>
										<select class="form-select form-control" name="gender">
											<option>Select</option>
											<option>Male</option>
											<option>Female</option>
											<option>Non-Binary</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Date of Birth</label>
										<div class="cal-icon">
											<input type="text" class="form-control datetimepicker" name="date_of_birth">
										</div>
									</div>
								</div>
								<input type="text" name="patient_id" value="<?php echo $id ; ?>" hidden>
								<div class="submit-section">

									<button  type="submit" class="btn btn-primary submit-btn">Submit</button>

								</div>
						</form>


					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<!-- /Page Content -->

@include('inc_assistant/footer')

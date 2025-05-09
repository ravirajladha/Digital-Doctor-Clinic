@include('inc_assistant/header')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="jquery-3.7.1.min.js"></script>




<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Change Password </li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Change Password</h2>
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
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 col-lg-6">

								<!-- Change Password Form -->
								<form action="/assistants/changePasswordAssistants" method="post" id="passwordForm">
									@csrf
									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_password" class="form-control" required>
									</div>
									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_password" id="new_password" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
									</div>
									<div class="submit-section">
										<button type="submit" class="btn btn-primary submit-btn" id="submitButton" disabled>Save Changes</button>
									</div>
								</form>
								<!-- /Change Password Form -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /Page Content -->

<script>
	$(document).ready(function() {
		$('#submitButton').prop('disabled', true);
		$('#confirm_password').on('input', function() {
			var confirm_password = $('#confirm_password').val();
			var newPassword = $('#new_password').val();



			if (confirm_password === newPassword) {
				console.log(confirm_password);
				console.log(newPassword);
				$('#submitButton').prop('disabled', false);

			} else {

				$('#submitButton').prop('disabled', true);
			}
		});
	});
</script>




@include('inc_assistant/footer');
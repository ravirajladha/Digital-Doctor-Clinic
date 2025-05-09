@include('inc_admins/header')


			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Add Tests</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Tests</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="col-md-10 col-lg-10 col-xl-12">
                    <form action="/create_test_admin" method="post" enctype="multipart/form-data">
						@csrf
							<!-- test Info -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Test Info</h4>
									<div class="row form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Test Name <span class="text-danger">*</span></label>
												<input type="hidden" name="rexkod_digitaldrclinic_admin_id" value="{{session('rexkod_digitaldrclinic_admin_id')}}">
												<input type="text" class="form-control" name="name" placeholder="Enter Test Name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Test Description</label>
												<input type="text" class="form-control" name="description" placeholder="Enter Test Description">
											</div>
										</div>
                                        <div class="submit-section submit-btn-bottom float-left" >
								<button type="submit" class="btn btn-primary submit-btn" style="border-radius:8px;margin-bottom:50px;">Submit</button>
							</div>




						</div>
						</form>
				</div>
			</div>
			<!-- /Page Wrapper -->

		@include('inc_admins/footer')

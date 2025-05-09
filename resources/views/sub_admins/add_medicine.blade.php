@include('inc_subadmins/header')
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Add Medicine</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Medicine</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="col-md-10 col-lg-10 col-xl-12">
                    <form action="/create_medicine_admin" method="post" enctype="multipart/form-data">
						@csrf
							
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Medicine Info</h4>
									<div class="row form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Medicine Name</label>
												<input type="text" class="form-control" name="name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Medicine Description</label>
												<input type="text" class="form-control" name="description">
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
		
			@include('inc_subadmins/footer')

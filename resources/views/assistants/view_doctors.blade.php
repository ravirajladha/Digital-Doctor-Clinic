@include('inc_assistant/header')

<?php

						use App\Models\Auth;
						use App\Models\Online_doctor;
						use App\Models\Specialities;

                       $sp=Specialities::all();
					?>

<!-- Page Content -->
<div id="doctorContainer">
<div class="content">
	<div class="container-fluid">
		<div class="row">
			@include('inc_assistant/navbar')
			<div class="col-md-7 col-lg-8 col-xl-9">
                <div class="container">
                    <div style="display: flex; justify-content: flex-end;">

                        <table>
                            <tr>
                                <form action="/search_doctor" method="post" id="searchForm">
                                    @csrf
                                <td>
                                    <input type="text"  id="name" onkeyup="realTimeSearch()" name="doctor_name" placeholder="Enter Doctor's First Name" class="form-control"> </td>
                                   <td>
                                   <select name="doctor_gender" id="" class="form-control" id="gender" onchange="realTimeSearch()">
                                   <option value="">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                     </select>
                                   </td>
                                <td>

                                    <select name="doctor_spic" id="" class="form-control" id="specialty" onkeyup="realTimeSearch()">
                                    <option value="">Select Speciality</option>
                                        @foreach($sp as $spec)
                                        <option value="{{$spec->speciality}}">{{$spec->speciality}}</option>
                                        @endforeach
                                    </select>

                            </td>
                                <td><button class="btn btn-lg btn-success">Search</button> </td>
                                </form>

                            </tr>
                        </table>
                    </div>
                    </div>


				<div class="row row-grid">
				<?php foreach ($get_doctors_data_1 as $item) { ?>
    					<div class="col-md-6 col-lg-4 col-xl-3">
							<div class="card widget-profile pat-widget-profile">
								<div class="card-body">
									<div class="pro-widget-content">

										<div class="profile-info-widget">

											<a href="/assistants/doctor_profile/<?php echo $item->id; ?>" class="booking-doc-img">
												<!-- <img src="/assets/img/patients/patient.jpg" alt="User Image"> -->
												<?php if (empty($item->photo)) { ?>
													<img src="/assets/img/patients/patient.jpg" alt="User Image">
												<?php } else { ?>
													<img src="/<?php echo $item->photo; ?>" alt="User Image">
												<?php } ?>
											</a>
											<div class="profile-det-info">
												<h3><a href="/assistants/doctor_profile/<?php echo $item->id; ?>">
												<?php echo ucwords($item->fname . " " . $item->lname); ?></a>
											</h3>

												<div class="patient-details">
													<h5><b>Doctor ID:</b><?php echo $item->id; ?></h5>
													<h5><b>Gender : </b><?php echo $item->gender; ?></h5>
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

					<?php   } ?>



				</div>
			</div>

		</div>

	</div>
</div>
</div>
	<!-- /Page Content -->
	<div id="doctorContainer">
    <!-- Results will be displayed here -->
</div>

	@include('inc_assistant/footer')

<!-- Add this script block after including jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

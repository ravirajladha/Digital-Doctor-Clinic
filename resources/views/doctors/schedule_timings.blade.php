<!DOCTYPE html>
<html lang="en">
<?php

use App\Models\Schedule_timing;
use Carbon\Carbon;

$timging=Schedule_timing::where('doctor_id',session('rexkod_digitaldrclinic_doctor_id'))->first();

?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>
	@include('inc_doctor/header')

	<div class="content">
		<div class="container-fluid">

			<div class="row">
				@include('inc_doctor/navbar')

				<div class="col-md-7 col-lg-8 col-xl-9">
					<div class="content container-fluid">

						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="page-title">Schedule Timings</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="/doctors/dashboard">Dashboard</a></li>
										<li class="breadcrumb-item active">Schedule Timings</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						<div class="col-md-10 col-lg-10 col-xl-12">
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
												<div class="row">



												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="card schedule-widget mb-0">

															<!-- Schedule Header -->
															<div class="schedule-header">

																<!-- Schedule Nav -->
																<div class="schedule-nav">
																	<ul class="nav nav-tabs nav-justified">
																		<li class="nav-item">
																			<a class="nav-link " data-bs-toggle="tab" href="#slot_sunday">Sunday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link active" data-bs-toggle="tab" href="#slot_monday">Monday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-bs-toggle="tab" href="#slot_tuesday">Tuesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-bs-toggle="tab" href="#slot_wednesday">Wednesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-bs-toggle="tab" href="#slot_thursday">Thursday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-bs-toggle="tab" href="#slot_friday">Friday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-bs-toggle="tab" href="#slot_saturday">Saturday</a>
																		</li>
																	</ul>
																</div>
																<!-- /Schedule Nav -->

															</div>

															<div class="tab-content schedule-cont">
																<!-- Sunday Slot -->
																<div id="slot_sunday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
																		<a data-bs-toggle="modal" data-bs-target="#add_time_slot_sunday">
																			<i class="fa fa-plus-circle"></i> Add Slot
																		</a>
																	</h4>
																	<!-- Slot List -->
																	<?php

																	   if ($timging !== null) {
																		$timedisplay=explode(',',$timging->sunday);

																	}else{
																		$timedisplay=null;
																	}
																	?>

																	<div class="doc-times">
																		@if($timedisplay !== null)
																			@foreach($timedisplay as $dsp)
																			<div class="doc-slot-list">
																			@if($dsp !== '')
																				<?php
																				$time = Carbon::createFromFormat('H:i', $dsp);
																				$formattedTime = $time->format('h:i A');
																				?>
																				{{$formattedTime}}
																				@endif
																				<a href="javascript:void(0)" class="delete_schedule">
																					<i class="fa fa-times"></i>
																				</a>
																			</div>
																			@endforeach
																		@endif
																	</div>
																	<!-- /Slot List -->
																</div>
																<!-- /Sunday Slot -->

																<!-- Monday Slot -->
																<div id="slot_monday" class="tab-pane fade show active">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
																		<a data-bs-toggle="modal" data-bs-target="#add_time_slot_monday">
																		<i class="fa fa-plus-circle"></i>Add Slot
																		</a>
																	</h4>
																	<?php
																	 if ($timging !== null) {
																		$timedisplay=explode(',',$timging->monday);
																	}else{
																		$timedisplay=null;
																	}

																	?>
																	<div class="doc-times">
																	 @if($timedisplay !== null)
																			@foreach($timedisplay as $dsp)
																			<div class="doc-slot-list">
																			@if($dsp !== '')
																				<?php
																				$time = Carbon::createFromFormat('H:i', $dsp);
																				$formattedTime = $time->format('h:i A');
																				?>
																				{{$formattedTime}}
																				@endif
																				<a href="javascript:void(0)" class="delete_schedule">
																					<i class="fa fa-times"></i>
																				</a>
																			</div>
																			@endforeach
																		@endif
																	</div>

																</div>

																<!-- /Monday Slot -->

																<!-- Tuesday Slot -->
																<div id="slot_tuesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
																		<a data-bs-toggle="modal" href="#add_time_slot_tuesday">
																			<i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php
																	 if ($timging !== null) {
																		$timedisplay=explode(',',$timging->tuesday);
																	}else{
																		$timedisplay=null;
																	}
																	?>
																	<div class="doc-times">
																	 @if($timedisplay !== null)
																			@foreach($timedisplay as $dsp)
																			<div class="doc-slot-list">
																			@if($dsp !== '')
																				<?php
																				$time = Carbon::createFromFormat('H:i', $dsp);
																				$formattedTime = $time->format('h:i A');
																				?>
																				{{$formattedTime}}
																				@endif
																				<a href="javascript:void(0)" class="delete_schedule">
																					<i class="fa fa-times"></i>
																				</a>
																			</div>
																			@endforeach
																		@endif
																	</div>
																</div>
																<!-- /Tuesday Slot -->

																<!-- Wednesday Slot -->
																<div id="slot_wednesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
																		<a data-bs-toggle="modal" href="#add_time_wednesday">
																			<i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php
																	if ($timedisplay !== null) {
																		$timedisplay=explode(',',$timging->wednesday);
																	}else{
																		$timedisplay=null;
																	}
																	?>
																	<div class="doc-times">
																	 @if($timedisplay !== null)
																			@foreach($timedisplay as $dsp)
																			<div class="doc-slot-list">
																			@if($dsp !== '')
																				<?php
																				$time = Carbon::createFromFormat('H:i', $dsp);
																				$formattedTime = $time->format('h:i A');
																				?>
																				{{$formattedTime}}
																				@endif
																				<a href="javascript:void(0)" class="delete_schedule">
																					<i class="fa fa-times"></i>
																				</a>
																			</div>
																			@endforeach
																		@endif
																	</div>
																</div>
																<!-- /Wednesday Slot -->

																<!-- Thursday Slot -->
																<div id="slot_thursday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
																		<a data-bs-toggle="modal" href="#add_time_thursday">
																			<i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php
																	if ($timging !== null) {
																		$timedisplay=explode(',',$timging->thursday);
																	}else{
																		$timedisplay=null;
																	}

																	?>
																	<div class="doc-times">
																	 @if($timedisplay !== null)
																			@foreach($timedisplay as $dsp)
																			<div class="doc-slot-list">
																			@if($dsp !== '')
																				<?php
																				$time = Carbon::createFromFormat('H:i', $dsp);
																				$formattedTime = $time->format('h:i A');
																				?>
																				{{$formattedTime}}
																				@endif
																				<a href="javascript:void(0)" class="delete_schedule">
																					<i class="fa fa-times"></i>
																				</a>
																			</div>
																			@endforeach
																		@endif
																	</div>
																</div>
																<!-- /Thursday Slot -->

																<!-- Friday Slot -->
																<div id="slot_friday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
																		<a data-bs-toggle="modal" href="#add_time_friday">
																			<i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php
																	if ($timging !== null) {
																		$timedisplay=explode(',',$timging->friday);
																	}else{
																		$timedisplay=null;
																	}

																	?>
																	<div class="doc-times">
																	 @if($timedisplay !== null)
																			@foreach($timedisplay as $dsp)
																			<div class="doc-slot-list">
																			@if($dsp !== '')
																				<?php
																				$time = Carbon::createFromFormat('H:i', $dsp);
																				$formattedTime = $time->format('h:i A');
																				?>
																				{{$formattedTime}}
																				@endif
																				<a href="javascript:void(0)" class="delete_schedule">
																					<i class="fa fa-times"></i>
																				</a>
																			</div>
																			@endforeach
																		@endif
																	</div>
																</div>
																<!-- /Friday Slot -->

																<!-- Saturday Slot -->
																<div id="slot_saturday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
																		<a data-bs-toggle="modal" href="#add_time_saturday">
																			<i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php
																	   if ($timging !== null) {
																		$timedisplay=explode(',',$timging->saturday);
																	}else{
																		$timedisplay=null;
																	}
																	?>
																	<div class="doc-times">
																	 @if($timedisplay !== null)
																			@foreach($timedisplay as $dsp)
																			<div class="doc-slot-list">
																			@if($dsp !== '')
																				<?php
																				$time = Carbon::createFromFormat('H:i', $dsp);
																				$formattedTime = $time->format('h:i A');
																				?>
																			{{$formattedTime}}

																				@endif
																				<a href="javascript:void(0)" class="delete_schedule">
																					<i class="fa fa-times"></i>
																				</a>
																			</div>
																			@endforeach
																		@endif
																	</div>
																</div>
																<!-- /Saturday Slot -->

															</div>
														</div>
														<!-- /Schedule Content -->

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>

	</div>
	<!-- Sunday Modal -->
<div class="modal fade" id="add_time_slot_sunday" tabindex="-1" role="dialog" aria-labelledby="addTimeSlotSundayLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addTimeSlotSundayLabel">Add Time Slot - Sunday</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/doctors/saveTiming" method="post">
                @csrf
                <div class="modal-body">
                  <input type="hidden" value="sunday" name="sunday">
                    <div class="form-group">
                        <label>Timing Slot Duration</label>
                        <select class="form-select form-control" name="max_time" required >
                            <option value="00:15">15 mins</option>
                            <option value="00:30">30 mins</option>
                            <option value="00:45">45 mins</option>
                            <option value="1:00">1 Hour</option>
                        </select>
                    </div>

                    <div class="row">
                        <!-- Input Fields for Sunday Modal -->
                        <div class="col-md-6">
                            <label for="input1_sunday">Time Slot 1:</label>
                            <input type="time" class="form-control" id="input1_sunday"  name="time1[]" required >
                        </div>
                        <div class="col-md-6">
                            <label for="input2_sunday">Time Slot 2:</label>
                            <input type="time" class="form-control" id="input2_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input3_sunday">Time Slot 3:</label>
                            <input type="time" class="form-control" id="input3_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input4_sunday">Time Slot 4:</label>
                            <input type="time" class="form-control" id="input4_sunday"  name="time1[]">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('#add_time_slot_sunday')">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Sunday Modal -->

	<!-- Monday Modal  id="add_time_slot_monday"-->
	<div class="modal fade" id="add_time_slot_monday" tabindex="-1" role="dialog" aria-labelledby="addTimeSlotSundayLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="addTimeSlotMondayLabel">Add Time Slot - Monday</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/doctors/saveTiming" method="post">
                @csrf
                <div class="modal-body">
                  <input type="hidden" value="monday" name="monday">
                    <div class="form-group">
                        <label>Timing Slot Duration</label>
                        <select class="form-select form-control" name="max_time" required>
                            <option>15 mins</option>
                            <option selected="selected">30 mins</option>
                            <option>45 mins</option>
                            <option>1 Hour</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="input1_sunday">Time Slot 1:</label>
                            <input type="time" class="form-control" id="input1_sunday"  name="time1[]" required >
                        </div>
                        <div class="col-md-6">
                            <label for="input2_sunday">Time Slot 2:</label>
                            <input type="time" class="form-control" id="input2_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input3_sunday">Time Slot 3:</label>
                            <input type="time" class="form-control" id="input3_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input4_sunday">Time Slot 4:</label>
                            <input type="time" class="form-control" id="input4_sunday"  name="time1[]">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('#add_time_slot_monday')">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
			</div>
		</div>
	</div>
	<!-- /Monday Modal -->

	<!--  Modal  Tuesday"-->
	<div class="modal fade" id="add_time_slot_tuesday" tabindex="-1" role="dialog" aria-labelledby="addTimeSlotSundayLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="addTimeSlotMondayLabel">Add Time Slot - Tuesday</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/doctors/saveTiming" method="post">
                @csrf
                <div class="modal-body">
                  <input type="hidden" value="tuesday" name="tuesday">
                    <div class="form-group">
                        <label>Timing Slot Duration</label>
                        <select class="form-select form-control" name="max_time" required>
                            <option>15 mins</option>
                            <option selected="selected">30 mins</option>
                            <option>45 mins</option>
                            <option>1 Hour</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="input1_sunday">Time Slot 1:</label>
                            <input type="time" class="form-control" id="input1_sunday"  name="time1[]" required >
                        </div>
                        <div class="col-md-6">
                            <label for="input2_sunday">Time Slot 2:</label>
                            <input type="time" class="form-control" id="input2_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input3_sunday">Time Slot 3:</label>
                            <input type="time" class="form-control" id="input3_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input4_sunday">Time Slot 4:</label>
                            <input type="time" class="form-control" id="input4_sunday"  name="time1[]">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('#add_time_slot_tuesday')">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
			</div>
		</div>
	</div>
	<!-- /tuesday Modal -->

	<!-- add_time_wednesday"-->
	<div class="modal fade" id="add_time_wednesday" tabindex="-1" role="dialog" aria-labelledby="addTimeSlotSundayLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="addTimeSlotMondayLabel">Add Time Slot - wednesday</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/doctors/saveTiming" method="post">
                @csrf
                <div class="modal-body">
                  <input type="hidden" value="wednesday" name="wednesday">
                    <div class="form-group">
                        <label>Timing Slot Duration</label>
                        <select class="form-select form-control" name="max_time" required>
                            <option>15 mins</option>
                            <option selected="selected">30 mins</option>
                            <option>45 mins</option>
                            <option>1 Hour</option>
                        </select>
                    </div>

                    <div class="row">
                        <!-- Input Fields for Sunday Modal -->
                        <div class="col-md-6">
                            <label for="input1_sunday">Time Slot 1:</label>
                            <input type="time" class="form-control" id="input1_sunday"  name="time1[]" required >
                        </div>
                        <div class="col-md-6">
                            <label for="input2_sunday">Time Slot 2:</label>
                            <input type="time" class="form-control" id="input2_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input3_sunday">Time Slot 3:</label>
                            <input type="time" class="form-control" id="input3_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input4_sunday">Time Slot 4:</label>
                            <input type="time" class="form-control" id="input4_sunday"  name="time1[]">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('#add_time_wednesday')">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
			</div>
		</div>
	</div>
	<!-- add_time_wednesday -->
	<!-- add_time_wednesday"-->
	<div class="modal fade" id="add_time_thursday" tabindex="-1" role="dialog" aria-labelledby="addTimeSlotSundayLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="addTimeSlotMondayLabel">Add Time Slot - Thursday</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/doctors/saveTiming" method="post">
                @csrf
                <div class="modal-body">
                  <input type="hidden" value="thursday" name="thursday">
                    <div class="form-group">
                        <label>Timing Slot Duration</label>
                        <select class="form-select form-control" name="max_time" required>
                            <option>15 mins</option>
                            <option selected="selected">30 mins</option>
                            <option>45 mins</option>
                            <option>1 Hour</option>
                        </select>
                    </div>

                    <div class="row">
                        <!-- Input Fields for Sunday Modal -->
                        <div class="col-md-6">
                            <label for="input1_sunday">Time Slot 1:</label>
                            <input type="time" class="form-control" id="input1_sunday"  name="time1[]" required >
                        </div>
                        <div class="col-md-6">
                            <label for="input2_sunday">Time Slot 2:</label>
                            <input type="time" class="form-control" id="input2_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input3_sunday">Time Slot 3:</label>
                            <input type="time" class="form-control" id="input3_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input4_sunday">Time Slot 4:</label>
                            <input type="time" class="form-control" id="input4_sunday"  name="time1[]">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('#add_time_thursday')">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
			</div>
		</div>
	</div>

	<!-- add_time_wednesday"-->
	<div class="modal fade" id="add_time_friday" tabindex="-1" role="dialog" aria-labelledby="addTimeSlotSundayLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="addTimeSlotMondayLabel">Add Time Slot - Friday</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/doctors/saveTiming" method="post">
                @csrf
                <div class="modal-body">
                  <input type="hidden" value="friday" name="friday">
                    <div class="form-group">
                        <label>Timing Slot Duration</label>
                        <select class="form-select form-control" name="max_time" required>
                            <option>15 mins</option>
                            <option selected="selected">30 mins</option>
                            <option>45 mins</option>
                            <option>1 Hour</option>
                        </select>
                    </div>

                    <div class="row">
                        <!-- Input Fields for Sunday Modal -->
                        <div class="col-md-6">
                            <label for="input1_sunday">Time Slot 1:</label>
                            <input type="time" class="form-control" id="input1_sunday"  name="time1[]" required >
                        </div>
                        <div class="col-md-6">
                            <label for="input2_sunday">Time Slot 2:</label>
                            <input type="time" class="form-control" id="input2_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input3_sunday">Time Slot 3:</label>
                            <input type="time" class="form-control" id="input3_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input4_sunday">Time Slot 4:</label>
                            <input type="time" class="form-control" id="input4_sunday"  name="time1[]">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('#add_time_friday')">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
			</div>
		</div>
	</div>
	<!-- add_time_wednesday"-->
	<div class="modal fade" id="add_time_saturday" tabindex="-1" role="dialog" aria-labelledby="addTimeSlotSundayLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="addTimeSlotMondayLabel">Add Time Slot - Saturday</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/doctors/saveTiming" method="post">
                @csrf
                <div class="modal-body">
                  <input type="hidden" value="saturday" name="saturday">
                    <div class="form-group">
                        <label>Timing Slot Duration</label>
                        <select class="form-select form-control" name="max_time" required>
                            <option>15 mins</option>
                            <option selected="selected">30 mins</option>
                            <option>45 mins</option>
                            <option>1 Hour</option>
                        </select>
                    </div>

                    <div class="row">
                        <!-- Input Fields for Sunday Modal -->
                        <div class="col-md-6">
                            <label for="input1_sunday">Time Slot 1:</label>
                            <input type="time" class="form-control" id="input1_sunday"  name="time1[]" required >
                        </div>
                        <div class="col-md-6">
                            <label for="input2_sunday">Time Slot 2:</label>
                            <input type="time" class="form-control" id="input2_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input3_sunday">Time Slot 3:</label>
                            <input type="time" class="form-control" id="input3_sunday"  name="time1[]">
                        </div>
                        <div class="col-md-6">
                            <label for="input4_sunday">Time Slot 4:</label>
                            <input type="time" class="form-control" id="input4_sunday"  name="time1[]">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('#add_time_saturday')">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function() {
		// Show the modal when the "Add Slot" link is clicked
		$('.edit-link').on('click', function(e) {
			e.preventDefault();
			var targetModal = $(this).data('bs-target');
			$(targetModal).modal('show');
		});
	});

	function closeModal(modalId) {
		$(modalId).modal('hide');
	}
</script>
@include('inc_doctor/footer')

</html>

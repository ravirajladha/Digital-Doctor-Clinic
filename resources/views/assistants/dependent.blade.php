
@include('inc_assistant/header')
<?php

use App\Models\Dependent;

			$assistant = Dependent::where('patient_id', $id)->get();

			// $assistant_data=['get_assistant_data'=>$assistant];
 ?>

<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		  @include('inc_assistant/navbar')
			<div class="col-md-7 col-lg-8 col-xl-9">
				<div class="card">
					<div class="card-body dependent pt-0">
						<p class="help-title">WHO NEEDS HELP?</p>
						<div class="row justify-content-center">
						<?php foreach ($assistant as $tests) { ?>
							<div class="col-md-3">
								<img src="/assets/img/219983.png" class="dependent-img" alt="Patient Image" height="130px">
								<p class="depedent-name pt-3 ps-4"><?php echo ucwords($tests->f_name." ".$tests->l_name);?></p>
							</div>
						<?php } ?>

							<div class="col-md-3">
								<a href="/assistants/add_dependent/<?php echo $id;?>" class="add-dependent-link">
									<i class="fa fa-plus add-dependent-img" aria-hidden="true"></i>
								</a>
								<p class="add-depedent-name pt-3">Add dependent</p>
							</div>

						</div>
                            <a href="/assistants/patient_details2/{{$id}}" class="btn btn-info">Back</a>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<!-- /Page Content -->



@include('inc_assistant/footer')

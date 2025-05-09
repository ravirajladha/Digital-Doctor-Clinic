@include('/inc_admins/header')


			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Camp Requests Visitor</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Camp Request Visitor</li>
								</ul>
							</div>

						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
									<table id="myTable" class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
												    <th>List Of Visitor</th>
												</tr>
											</thead>
											<tbody>

                                            <?php
                                                 $vister=explode(',', $campreq->visitors_list);
                                              ?>
                                              @foreach($vister as $vist)
                                              <tr>
											  <td>
                                                 {{ $vist}}
                                              </td>
                                              </tr>
                                              @endforeach

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /Page Wrapper -->
			@include('inc_admins/footer')

			<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
$('#myTable').DataTable();
});
</script>

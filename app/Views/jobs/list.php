<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>BHG HRM::Job Lists</title>
	
	<?=view('common/favicon');?>
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/datatables/css/jquery.dataTables.min.css');?>" rel="stylesheet">
	
	<?=view('common/styles');?>
	
</head>
<body>

    <?=view('common/preload');?>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <?=view('common/navheader');?>
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Job List
                            </div>
							
                        </div>
                        <?=view('common/navheaderright');?>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <?=view('common/sidebar');?>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="d-flex align-items-center mb-4 flex-wrap">
					<h4 class="fs-20 font-w600  me-auto">Vacancy List</h4>
					<div>
					<?php
					if(session()->get('userType')==1 || session()->get('userType')==3)
					{
					?>	
					<a href="<?=base_url('create-new-job');?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New Vacancy</a>
					<?php
					}
					?>
					
					</div>
				</div>
				<div class="row">
					<?php //echo '<pre>'; print_r($joblists);echo '</pre>'; ?>
					<?php if (session()->getFlashdata('error') !== NULL) : ?>
                        <div class="alert alert-primary alert-dismissible alert-alt fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                            <strong>Warning!</strong> <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success') !== NULL) : ?>
                        <div class="alert alert-secondary alert-dismissible alert-alt fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                            <strong>Success!</strong> <?php echo session()->getFlashdata('success'); ?>
                        </div>
                        
                    <?php endif; ?>
                    <?php //echo '<pre>'; print_r(session()->get('userId')); echo '</pre>'; ?>
					<div class="col-xl-12">
						<div class="table-responsive">
							<table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example3">
								
								<thead>
									<tr>
										<th>No</th>
										<th>Actions</th>
										<th>Status</th>
										<th>Company</th>
										<th>Position</th>
										<th>Posted Date</th>
										<th>Division</th>
										<th>Department</th>
										<th>Title</th>
										<th>Last Date To Apply</th>
										<th>Close Date</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Actions</th>
										<th>Status</th>
										<th>Company</th>
										<th>Position</th>
										<th>Posted Date</th>
										<th>Division</th>
										<th>Department</th>
										<th>Title</th>
										<th>Last Date To Apply</th>
										<th>Close Date</th>
									</tr>
								</tfoot>
								
								<tbody>
									<?php
									if($joblists)
									{
										foreach($joblists as $jobskey => $jobs)
										{
											switch($jobs['jobStatus'])
											{
												case 0: $badgeStyleBtn='badge-default';$badgeStyletitle = $jobs['jobStatusDesc'];break;
												case 1: $badgeStyleBtn='badge-warning';$badgeStyletitle = $jobs['jobStatusDesc'];break;
												case 2: $badgeStyleBtn='badge-success';$badgeStyletitle = $jobs['jobStatusDesc'];break;
												case 3: $badgeStyleBtn='badge-primary';$badgeStyletitle = $jobs['jobStatusDesc'];break;
												case 4: $badgeStyleBtn='badge-danger';$badgeStyletitle = $jobs['jobStatusDesc'];break;
												default:$badgeStyleBtn='badge-default';$badgeStyletitle = $jobs['jobStatusDesc'];break;
											} 
											?>
											<tr>
												<td><?php //echo '<pre>'; print_r($jobs); echo '</pre>'; ?><?=$jobskey+1;?></td>
												<td>
													<div class="action-buttons d-flex justify-content-center">
														<div class="dropdown custom-dropdown">
				                                            <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
				                                            </div>
				                                            <div class="dropdown-menu dropdown-menu-end">
				                                                <a target="_blank
				                                                " class="text-warning dropdown-item" href="<?=base_url('job-application/2/'.$jobs['jobId']);?>">Shortlisted Applications</a>
				                                                <a target="_blank
				                                                " class="text-danger dropdown-item" href="<?=base_url('job-application/3/'.$jobs['jobId']);?>">Rejected Application</a>
				                                                <a target="_blank
				                                                " class="text-success dropdown-item" href="<?=base_url('job-application/6/'.$jobs['jobId']);?>">Selected Applications</a>
				                                                <a target="_blank
				                                                " class="text-primary dropdown-item" href="<?=base_url('job-application/0/'.$jobs['jobId']);?>">All Applications</a>

				                                            </div>
				                                        </div>
														<!-- <a href="<?=base_url('job-applications/'.$jobs['jobId']);?>" class="btn btn-success light mr-2">
															<i class="fa fa-users"></i>
														</a> -->
														<a href="<?=base_url('job/'.$jobs['jobId']);?>" class="btn btn-success light mr-2">
															<svg xmlns="http://www.w3.org/2000/svg" class="svg-main-icon" width="24px" height="24px" viewBox="0 0 32 32" x="0px" y="0px"><g data-name="Layer 21"><path d="M29,14.47A15,15,0,0,0,3,14.47a3.07,3.07,0,0,0,0,3.06,15,15,0,0,0,26,0A3.07,3.07,0,0,0,29,14.47ZM16,21a5,5,0,1,1,5-5A5,5,0,0,1,16,21Z" fill="#000000" fill-rule="nonzero"></path><circle cx="16" cy="16" r="3" fill="#000000" fill-rule="nonzero"></circle></g></svg>
														</a>
														<?php if($jobs['jobStatus']==0 || $jobs['jobStatus']==4 || session()->get('userId')==3)
														{
															?>
															<a href="<?=base_url('edit-job/'.$jobs['jobId']);?>" class="btn btn-secondary light mr-2">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
																		<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
																	</g>
																</svg>
															</a>
															<?php
														}
														?>
														<!-- <a href="javascript:void(0);" class="btn btn-danger light">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"></rect>
																	<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
																	<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
																</g>
															</svg>
														</a> -->
													</div>
												</td>
												<td>
													<span class="badge <?=$badgeStyleBtn;?> badge-lg light"><?=$badgeStyletitle;?></span>
												</td>
												<td><?=$jobs['companyName'];?></td>
												<td><?=$jobs['position'];?></td>
												<td><?=date("dS M Y",strtotime($jobs['postedDate'])); ?></td>
												<td><?=$jobs['divisionName'];?></td>
												<td><?=$jobs['departmentName'];?></td>
												<td class="wspace-no"><?=$jobs['jobTypeDesc'];?></td>
												<!-- <td><?=$jobs['jobDescription'];?></td> -->
												<td><?=date("dS M Y",strtotime($jobs['lastDateToApply'])); ?></td>
												<td><?=date("dS M Y",strtotime($jobs['closeDate'])); ?></td>
												
												
											</tr>
											<?php
										}
									}
									?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
        </div>
		
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Job</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
					  <div class="modal-body">
						<div class="mb-4">
							<label  class="form-label">Position</label>
							<input type="text"  class="form-control" placeholder="Name" aria-label="name">
						</div>
						<div class="mb-4">
							<label class="form-label">Job Type</label>
							<select id="inputState" class="form-select form-control">
							  <option selected>Choose...</option>
							  <option>Part-Time</option>
							   <option>Full-Time</option>
								<option>Freelancer</option>
							</select>
						</div>
						<div class="mb-4">
							<label class="form-label">Description:</label>
							<textarea class="form-control" aria-label="With textarea"></textarea>
						</div>
						<div class="mb-4">
							<label  class="form-label">Posted Date</label>
							<div class="input-group">
								 <div class="input-group-text"><i class="far fa-clock"></i></div>
								<input size="16" type="text" value="2012-06-15" readonly class="form-control form_datetime">
							</div>
						</div>	
						<div class="mb-4">
							<label  class="form-label">Last Date To Apply</label>
							<div class="input-group">
								 <div class="input-group-text"><i class="far fa-clock"></i></div>
								<input size="16" type="text" value="2012-06-15" readonly class="form-control form_datetime">
							</div>
						</div>
						<div class="mb-4">
							<label  class="form-label">Close Date</label>
							<div class="input-group">
								 <div class="input-group-text"><i class="far fa-clock"></i></div>
								<input size="16" type="text" value="2012-06-15" readonly class="form-control form_datetime">
							</div>
						</div>	
						<div class="mb-4">
							<span>Status:<label class="radio-inline mx-3"><input type="radio" name="optradio"> Active</label></span>
							<span><label class="radio-inline me-3"><input type="radio" name="optradio"> In Active</label></span>
						</div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div>
					</div>
				</div>
			</div>
		</div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
        <?=view('common/footer');?>

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?=base_url('assets/vendor/global/global.min.js');?>"></script>
	<script src="<?=base_url('assets/vendor/chart.js/Chart.bundle.min.js');?>"></script>
	<script src="<?=base_url('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js');?>"></script>
	
	<!-- Apex Chart -->
	<script src="<?=base_url('assets/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js');?>"></script>
	
	<!-- Chart piety plugin files -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
   
	<script type="text/javascript">
		$(document).ready(function () {
    $('#example3').DataTable({
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    if (column.index() !== 0 && column.index() !== 1 && column.index() !== 2 && column.index() !== 5 && column.index() !== 8 && column.index() !== 9 && column.index() !== 10 ) {
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
 
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
 
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                    }
                });
        },
        
    });
});	
	</script>
	<!-- Dashboard 1 -->
	 
	
	
	
    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dlabnav-init.js');?>"></script>
	

    

	

</body>
</html>
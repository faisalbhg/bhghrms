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
	<title>BHG HRM::Jobs applications</title>
	
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
                                Job Application
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
					<h4 class="fs-20 font-w600 me-auto">Job Application</h4>
					<div>
					<!-- <a href="<?=base_url('create-new-job');?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New Job</a> -->
					
					
					</div>
				</div>
				<div class="row">
					<?php //echo '<pre>'; print_R($jobApplication);echo '</pre>';?>
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
					<div class="col-xl-12">
						<div class="table-responsive">
							<table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example3">
								<thead>
									<tr>
										<th>No</th>
										<th>Status</th>
										<th class="text-center">Actions</th>
										<th>Comapny</th>
										<th>Job title</th>
										<th>CV</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										
										<th>Previous Employee</th>
										<th>Applied On</th>
										
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($jobApplication as $listKey => $application)
									{
										if(session()->get('userType')==5)
										{
											if($application['createdBy'] == session()->get('userId') && $application['applicationStatus']==4)
											{
												?>
												<tr>
												<td>
													<?php //echo '<pre>'; print_r($application);echo '</pre>'; ?>
													<?=$listKey+1;?></td>
												<td id="<?=$application["applicationId"];?>-status">
												<?php 
													if($application['applicationStatus']==1)
													{
														?>
														<span class="changeStatus btn btn-warning btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>


														<?php

													}
													if($application['applicationStatus']==2)
													{
														?>
														<span class="changeStatus btn btn-success btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>


														<?php

													}
													else if($application['applicationStatus']==3)
													{
														?>
														<span class="changeStatus btn btn-danger btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													else if($application['applicationStatus']==4)
													{
														?>
														<span class="changeStatus btn btn-primary btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													else if($application['applicationStatus']==5)
													{
														?>
														<span class="changeStatus btn btn-warning btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													else if($application['applicationStatus']==6)
													{
														?>
														<span class="changeStatus btn btn-success btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													else if($application['applicationStatus']==7)
													{
														?>
														<span class="changeStatus btn btn-danger btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													?>
												</td>
												<td class="action-btn wspace-no">

													<span>
														<div class="dropdown text-end">
														<div class="btn-link text-center" data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right" style="margin: 0px;">
															<?php
															if(($application['applicationStatus']==1) || ($application['applicationStatus']==3))
															{
																$shortlistDisplay="display:block;";
															}
															else
															{
																$shortlistDisplay="display:none;";	
															}
															if(($application['applicationStatus']==1) || ($application['applicationStatus']==2))
															{
																$rejectDisplay="display:block;";
															}
															else
															{
																$rejectDisplay="display:none;";
															}
															if(($application['applicationStatus']==2) || ($application['applicationStatus']==4) || ($application['applicationStatus']==5) || ($application['applicationStatus']==6) || ($application['applicationStatus']==7))
															{
																$nextStepDisplay="display:block;";
															}
															else
															{
																$nextStepDisplay="display:none;";
															}

															if($application['applicationStatus']==6)
															{
																$selectProcessDisplay="display:block;";
															}
															else
															{
																$selectProcessDisplay="display:none;";
															}
															//echo $application['applicationStatus'];
															?>
															<a style="<?=$shortlistDisplay;?>" onclick="jobStatusChange('<?=$application["applicationId"];?>','2')" class="dropdown-item text-black" id="<?=$application["applicationId"];?>shortList" > <i class="far fa-check-circle me-1 text-success"></i>Shortlist Now</a>
															<a style="<?=$rejectDisplay;?>" class="dropdown-item text-black" onclick="jobStatusChange('<?=$application["applicationId"];?>','3')"  id="<?=$application["applicationId"];?>reject"><i class="far fa-times-circle me-1 text-danger"></i>Reject Now</a>
															<?php
															if(@$application['proposalStatus']!=3)
															{
																?>
																<a style="<?=$nextStepDisplay;?>" class="dropdown-item text-black" href="<?=base_url('application-details/'.$application['applicationId']);?>" id="<?=$application["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Update Interview</a>
																<?php
															}

															if($application['proposalID'])
															{
																if(@$application['proposalStatus']==3)
																{
																	?>
																<a  class="dropdown-item text-black" id="<?=$application["applicationId"];?>nextStep"><i class="fas fa-check me-1 text-success"></i>Proposal Approved</a>
																<?php
																}
																else
																{
																	?>
																<a style="<?=$selectProcessDisplay;?>" class="dropdown-item text-black" href="<?=base_url('job-proposal/'.$application['applicationId'].'/'.$application['proposalID']);?>" id="<?=$application["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Update Proposal</a>
																<?php
																}
																
															}
															else
															{
																?>
																<a style="<?=$selectProcessDisplay;?>" class="dropdown-item text-black" href="<?=base_url('job-proposal/'.$application['applicationId'].'/'.$application['proposalID']);?>" id="<?=$application["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Create Proposal</a>
																<?php

															}
															?> 

															

														</div>
													</div>
													</span>
													
													
													
												</td>
												<td><?=$application['companyName'];?></td>
												<td class="wspace-no"><?=$application['jobTitle'];?></td>
												<td>
													<span>
														<a target="_blank" href="<?=$application['cvUrl'];?>"><i class="fas fa-download text-warning"></i></a>
													</span>
												</td>
												<td><?=$application['applicantName'];?></td>
												<td><?=$application['email'];?></td>
												<td><?=$application['mobile'];?></td>
												
												<td><?=$application['prevEmployee'];?></td>
												<td><?=date("dS M Y",strtotime($application['applied'])); ?></td>

												
											</tr>
												<?php
											}
										}
										else
										{
										
											?>
											<tr>
												<td>
													<?php //echo '<pre>'; print_r($application);echo '</pre>'; ?>
													<?=$listKey+1;?></td>
												<td id="<?=$application["applicationId"];?>-status">
												<?php 
													if($application['applicationStatus']==1)
													{
														?>
														<span class="changeStatus btn btn-warning btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>


														<?php

													}
													if($application['applicationStatus']==2)
													{
														?>
														<span class="changeStatus btn btn-success btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>


														<?php

													}
													else if($application['applicationStatus']==3)
													{
														?>
														<span class="changeStatus btn btn-danger btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													else if($application['applicationStatus']==4)
													{
														?>
														<span class="changeStatus btn btn-primary btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													else if($application['applicationStatus']==5)
													{
														?>
														<span class="changeStatus btn btn-warning btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													else if($application['applicationStatus']==6)
													{
														?>
														<span class="changeStatus btn btn-success btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													else if($application['applicationStatus']==7)
													{
														?>
														<span class="changeStatus btn btn-danger btn-sm btn-rounded"><?=$application['applicationStatusDesc'];?></span>
														<?php
													}
													?>
												</td>
												<td class="action-btn wspace-no">

													<span>
														<div class="dropdown text-end">
														<div class="btn-link text-center" data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right" style="margin: 0px;">
															<?php
															if(($application['applicationStatus']==1) || ($application['applicationStatus']==3))
															{
																$shortlistDisplay="display:block;";
															}
															else
															{
																$shortlistDisplay="display:none;";	
															}
															if(($application['applicationStatus']==1) || ($application['applicationStatus']==2))
															{
																$rejectDisplay="display:block;";
															}
															else
															{
																$rejectDisplay="display:none;";
															}
															if(($application['applicationStatus']==2) || ($application['applicationStatus']==4) || ($application['applicationStatus']==5) || ($application['applicationStatus']==6) || ($application['applicationStatus']==7))
															{
																$nextStepDisplay="display:block;";
															}
															else
															{
																$nextStepDisplay="display:none;";
															}

															if($application['applicationStatus']==6)
															{
																$selectProcessDisplay="display:block;";
															}
															else
															{
																$selectProcessDisplay="display:none;";
															}
															//echo $application['applicationStatus'];
															?>
															<a style="<?=$shortlistDisplay;?>" onclick="jobStatusChange('<?=$application["applicationId"];?>','2')" class="dropdown-item text-black" id="<?=$application["applicationId"];?>shortList" > <i class="far fa-check-circle me-1 text-success"></i>Shortlist Now</a>
															<a style="<?=$rejectDisplay;?>" class="dropdown-item text-black" onclick="jobStatusChange('<?=$application["applicationId"];?>','3')"  id="<?=$application["applicationId"];?>reject"><i class="far fa-times-circle me-1 text-danger"></i>Reject Now</a>
															<?php
															if(@$application['proposalStatus']!=3)
															{
																?>
																<a style="<?=$nextStepDisplay;?>" class="dropdown-item text-black" href="<?=base_url('application-details/'.$application['applicationId']);?>" id="<?=$application["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Update Interview</a>
																<?php
															}

															if($application['proposalID'])
															{
																if(@$application['proposalStatus']==3)
																{
																	?>
																<a  class="dropdown-item text-black" id="<?=$application["applicationId"];?>nextStep"><i class="fas fa-check me-1 text-success"></i>Proposal Approved</a>
																<?php
																}
																else
																{
																	?>
																<a style="<?=$selectProcessDisplay;?>" class="dropdown-item text-black" href="<?=base_url('job-proposal/'.$application['applicationId'].'/'.$application['proposalID']);?>" id="<?=$application["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Update Proposal</a>
																<?php
																}
																
															}
															else
															{
																?>
																<a style="<?=$selectProcessDisplay;?>" class="dropdown-item text-black" href="<?=base_url('job-proposal/'.$application['applicationId'].'/'.$application['proposalID']);?>" id="<?=$application["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Create Proposal</a>
																<?php

															}
															?> 

															

														</div>
													</div>
													</span>
													
													
													
												</td>
												<td><?=$application['companyName'];?></td>
												<td class="wspace-no"><?=$application['jobTitle'];?></td>
												<td>
													<span>
														<a target="_blank" href="<?=$application['cvUrl'];?>"><i class="fas fa-download text-warning"></i></a>
													</span>
												</td>
												<td><?=$application['applicantName'];?></td>
												<td><?=$application['email'];?></td>
												<td><?=$application['mobile'];?></td>
												
												<td><?=$application['prevEmployee'];?></td>
												<td><?=date("dS M Y",strtotime($application['applied'])); ?></td>

												
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
	<script src="<?=base_url('assets/vendor/apexchart/apexchart.js');?>"></script>
	
	
	<!-- <script src="<?=base_url('assets/vendor/popper/popper.min.js');?>"></script>
	<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script> -->
	
	<!-- Chart piety plugin files -->
   <script src="<?=base_url('assets/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
   <script src="<?=base_url('assets/js/plugins-init/datatables.init.js');?>"></script>
	
	<!-- Dashboard 1 -->
	 
	
	
	
    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dlabnav-init.js');?>"></script>
	<script type="text/javascript">
		var myTable = $('#application').DataTable({
		    "serverSide": true,
		    "processing": true,
		    "paging": true,
		    "searching": { "regex": true },
		    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
		    "pageLength": 10,
		    "ajax": {
		        "type": "POST",
		        "url": "/getTable",
		        "dataType": "json",
		        "contentType": 'application/json; charset=utf-8',
		        "data": function (data) {
		            // Grab form values containing user options
		            var form = {};
		            $.each($("form").serializeArray(), function (i, field) {
		                form[field.name] = field.value || "";
		            });
		            // Add options used by Datatables
		            var info = { "start": 0, "length": 10, "draw": 1 };
		            $.extend(form, info);
		            return JSON.stringify(form);
		        },
		        "complete": function(response) {
		            console.log(response);
		       }
		    }
		});
	</script>
    
	<script>
	/*	$(document).ready(function(){
			//$('[data-toggle="tooltip"]').tooltip();
  return new bootstrap.Tooltip($('[data-toggle="tooltip"]'))
	});*/

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
	</script>
	<script type="text/javascript">
		function jobStatusChange(a,b)
		{
			var formData = '';
            console.log(formData);

            $.ajax({
                url: "<?=base_url('application-shortlist');?>/"+a+"/"+b,
                type: "get",
                data: formData,
                success: function(dResp) {
                    if(dResp==3)
                    {
                    	$('#'+a+'-status .changeStatus').addClass('btn-warning');
                    	$('#'+a+'-status .changeStatus').removeClass('btn-success');
                    	$('#'+a+'-status .changeStatus').html('Rejected');
                    	$('#'+a+'shortList').show();
                    	$('#'+a+'reject').hide();
                    	$('#'+a+'nextStep').hide();
                    }
                    else
                    {
                    	$('#'+a+'-status .changeStatus').addClass('btn-success');
                    	$('#'+a+'-status .changeStatus').removeClass('btn-warning');
                    	$('#'+a+'-status .changeStatus').html('Shortlisted');
                    	$('#'+a+'shortList').hide();
                    	$('#'+a+'reject').show();
                    	$('#'+a+'nextStep').show();
                    }
                }
            });
		}
	</script>

</body>
</html>
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
	<title>BHG HRM::Open Jobs applications</title>
	
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
                                Open Job Application
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
					<h4 class="fs-20 font-w600 me-auto">Open Job Application</h4>
					<div>
					
					
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
										<th>Proffession</th>
										<th>CV</th>
										<th>Certificates</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Previous Employee</th>
										<th>Applied On</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($openJobApplicants as $listKey => $openJobApplicant)
									{
										?>
										<tr>
											<td><?php //echo '<pre>'; print_R($openJobApplicant);  echo '</pre>'; ?><?=$listKey+1;?></td>
											<td id="<?=$openJobApplicant["applicationId"];?>-status">
												<?php
												switch($openJobApplicant['applicationStatus'])
												{
													case 1:$appltnStatusBtn = 'btn-outline-light';break;
													case 2:$appltnStatusBtn = 'btn-outline-success';break;
													case 3:$appltnStatusBtn = 'btn-outline-danger';break;
													case 4:$appltnStatusBtn = 'btn-outline-secondary';break;
													case 5:$appltnStatusBtn = 'btn-outline-warning';break;
													case 6:$appltnStatusBtn = 'btn-outline-primary';break;
													case 7:$appltnStatusBtn = 'btn-outline-danger';break;
													
													default:$applicationStatusDesc = '';$appltnStatusBtn = '';break;
												}
												?>
												<span class="changeStatus btn <?=$appltnStatusBtn;?> btn-sm btn-rounded"><?=$openJobApplicant['applicationStatusDesc'];?></span>
												
											</td>
											<td class="action-btn wspace-no">
												<?php //echo '<pre>'; print_r($openJobApplicant); echo '</pre>'; ?>
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
														<?php if(!empty($openJobApplicant['oGradeID']))
														{
															?>
															<a class="dropdown-item text-black" href="<?=base_url('application-details/'.$openJobApplicant['applicationId']);?>" id="<?=$openJobApplicant["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Schedule Interview</a>
															<?php
														}
														?>
														<a class="dropdown-item text-black" href="<?=base_url('categorize-application/'.$openJobApplicant['applicationId']);?>" id="<?=$openJobApplicant["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Categorize Application</a>

														<?php
														if($openJobApplicant['applicationStatus']==6)
														{
															$selectProcessDisplay="display:block;";
														}
														else
														{
															$selectProcessDisplay="display:none;";
														}
														if($openJobApplicant['proposalID'])
														{
															if($openJobApplicant['proposalStatus']==3)
															{
																?>
															<a  class="dropdown-item text-black" id="<?=$openJobApplicant["applicationId"];?>nextStep"><i class="fas fa-check me-1 text-success"></i>Proposal Approved</a>
															<?php
															}
															else
															{
																?>
															<a style="<?=$selectProcessDisplay;?>" class="dropdown-item text-black" href="<?=base_url('job-proposal/'.$openJobApplicant['applicationId'].'/'.$openJobApplicant['proposalID']);?>" id="<?=$openJobApplicant["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Update Proposal</a>
															<?php
															}
															
														}
														else
														{
															?>
															<a style="<?=$selectProcessDisplay;?>" class="dropdown-item text-black" href="<?=base_url('job-proposal/'.$openJobApplicant['applicationId'].'/'.$openJobApplicant['proposalID']);?>" id="<?=$openJobApplicant["applicationId"];?>nextStep"><i class="fas fa-arrow-right me-1 text-success"></i>Create Proposal</a>
															<?php

														}
														?> 

														

													</div>
												</div>
												</span>
												
												
												
											</td>
											<td><?=$openJobApplicant['jobDesc'];?></td>
											
											<td class="text-center">
												<span>
													<a target="_blank" href="<?=$openJobApplicant['cvUrl'];?>"><i class="fas fa-download text-warning"></i></a>
												</span>
											</td>
											<td class="text-center">
												<span>
													<a target="_blank" href="<?=$openJobApplicant['eduCertificateUrl'];?>"><i class="fas fa-download text-warning"></i></a>
												</span>
											</td>
											<td><?=$openJobApplicant['applicantName'];?></td>
											<td><?=$openJobApplicant['email'];?></td>
											<td><?=$openJobApplicant['mobile'];?></td>
											
											<td><?=$openJobApplicant['prevEmployee'];?></td>
											<td><?=date("dS M Y",strtotime($openJobApplicant['applied'])); ?></td>

											
										</tr>

										<?php
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
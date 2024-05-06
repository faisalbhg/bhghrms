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
	<title>BHG HRM::Aprove Employee Proposal</title>
	
	<!-- FAVICONS ICON -->
	<?=view('common/favicon');?>
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
	<!-- Form step -->
    <link href="<?=base_url('assets/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css" rel="stylesheet');?>">
	
	<?=view('common/styles');?>
	<style type="text/css">
		.form-wizard .nav-wizard li .nav-link span
		{
			width: fit-content;
			padding: 0px 5px;
			border-radius: 0;
		}
	</style>
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
                                Employee Proposal Details
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
				<div class="d-flex align-items-center mb-4">
					<h4 class="fs-20 font-w600 mb-0 me-auto">Applicant Proposal Details </h4>

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
					<div>
						<!-- <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3" > <i class="fas fa-envelope"></i></a>
						<a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3" ><i class="fas fa-phone-alt"></i></a>
						<a href="javascript:void(0);" class="btn btn-primary btn-sm" ><i class="fas fa-info"></i></a> -->
					
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header border-0 flex-wrap align-items-start">
								<div class="col-md-12">
									<div class="user d-sm-flex d-block pe-md-5 pe-0">
										<img src="<?=base_url('assets/images/user.jpg');?>" alt="">
										<div class="ms-sm-3 ms-0 me-md-5 md-0">
											<h5 class="mb-1 font-w600"><a href="javascript:void(0);"><?=$applicantDetails['applicantName'];?></a></h5>
											<div class="listline-wrapper mb-2">
												<span class="item"><i class="far fa-envelope"></i><?=$applicantDetails['email'];?></span>
												<span class="item"><a href="tel:<?=$applicantDetails['mobile'];?>" class=""><i class="fas fa-phone-alt"></i><?=$applicantDetails['mobile'];?></a></span>
											</div>
											<span class="item">
												<a href="<?=$applicantDetails['cvUrl'];?>" target="_blank" class="text-dark"><i class="fas fa-download me-2"></i>Download Ruseme</a>
											</span>
											
										</div>
									</div>
								</div>
								
							</div>
							<div class="card-body pt-0">
								
								<div class="row">
									<div class="col-xl-6 col-md-12">
										<?php //echo '<pre>'; print_r($applicantDetails); echo '</pre>'; ?>
										<h4 class="fs-20">Applicant Details</h4>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Full Name : </span><span class="font-w400"><?=$applicantDetails['applicantName'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Email : </span><span class="font-w400"><?=$applicantDetails['email'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Contact Number : </span><span class="font-w400"><?=$applicantDetails['mobile'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Gender : </span><span class="font-w400"><?=$applicantDetails['genderDesc'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Age : </span><span class="font-w400"><?=$applicantDetails['age'];?></span></p>
									</div>
									<div class="col-xl-6 col-md-12">
										<h4 class="mt-2 fs-20">Job Details</h4>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Company Name : </span><span class="font-w400"><?=$applicantDetails['companyName'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Job Title : </span><span class="font-w400"><?=$applicantDetails['jobTitle'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Position : </span><span class="font-w400"><?=$applicantDetails['roleName'];?></span></p>

										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Salary : </span><span class="font-w400"><?=$applicantDetails['salaryFrom'];?>AED - <?=$applicantDetails['salaryTo'];?>AED</span></p>
										
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Status : </span>
											<?php
											if($applicantDetails['proposalStatus']==3)
											{
												?>
												<a href="javascript:void(0)" class="badge badge-rounded badge-outline-success"><?=$applicantDetails['status'];?></a>
												<?php
											}
											else
											{
												?>
											<a href="javascript:void(0)" class="badge badge-rounded badge-outline-primary"><?=$applicantDetails['status'];?></a>
										<?php } ?>
										</p>

										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Grade : </span><span class="font-w400"> <?=$applicantDetails['gradeName'];?></span></p>

										

										


									</div>
									
								</div>
								
								
							</div>
							<div class="card-footer d-flex flex-wrap justify-content-between">
								<div>
									
								</div>
							</div>
						</div>
					</div>
					
				</div>

				<!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-2">Employee Proposal Info </h4>
                            </div>

                            <div class="card-body pt-0">
                            	<div class="row">
                            		<div class="col-xl-12 mb-3">
                            			<a href="<?=base_url('aproved-proposal/'.$applicantDetails['dataId']);?>" class="btn btn-success btn-sm">Approve</a>
		                                <a href="<?=base_url('reject-proposal/'.$applicantDetails['dataId']);?>" ><span class="btn btn-danger btn-sm">Reject</span></a>
		                            </div>
                            	</div>
                                <!-- Nav tabs -->
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#home1"><i class="la la-money me-2"></i> Salary</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#profile1"><i class="la la-check me-2"></i> Screening</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#contact1"><i class="la la-calendar me-2"></i>Offer Accepted Date</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                            <div class="pt-4">
                                                <h4>Salary Details</h4>
                                                <div class="row">
	                                                <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
														<div class="card text-white bg-primary">
															<ul class="list-group list-group-flush">
																<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Agreed Salary :</span><strong><?=$applicantDetails['totalSalary'];?>AED</strong></li>
																<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Basic Salary :</span><strong><?=$applicantDetails['basicSalary'];?> AED  </strong></li>
																<li class="list-group-item d-flex justify-content-between"><span class="mb-0">HRA :</span><strong><?=$applicantDetails['homeRentAllow'];?>AED </strong></li>
																<li class="list-group-item d-flex justify-content-between"><span class="mb-0">TRA :</span><strong><?=$applicantDetails['transportAllow'];?>AED </strong></li>
																<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Mobile Allowance :</span><strong><?=$applicantDetails['mobileAllow'];?>AED </strong></li>
																<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Task Allowance :</span><strong><?=$applicantDetails['otherAllow'];?>AED </strong></li>
																<?php 
																if(@$applicantDetails['companyCar']==true)
																{
																	?>
																	<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Company Car Allowed </li>
																	<?php
																}
																if(@$applicantDetails['fuel']==true)
																{ 
																	?>
																	<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Fuel Allowed</li>
																	<?php
																}
																?>
															</ul>
														</div>
													</div>
													<div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
														<div class="card text-dark">
															<ul class="list-group list-group-flush">
																<li class="list-group-item d-flex justify-content-between"></li>
																<li class="list-group-item d-flex justify-content-between"></li>
																<li class="list-group-item d-flex justify-content-between"></li>
																<li class="list-group-item d-flex justify-content-between"><span class="mb-0">HomeRentAllownace :<strong><?=$gradedetails[1]['fixedAmount'];?>AED </strong></span></li>
																<li class="list-group-item d-flex justify-content-between"><span class="mb-0">TransportAllownace :<strong><?=$gradedetails[2]['fixedAmount'];?>AED </strong></span></li>
																<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Mobile Allowance :<strong><?=$gradedetails[4]['fixedAmount'];?>AED </strong></span></li>
															</ul>
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile1">
                                            <div class="pt-4">
                                                <h4>Employee History Clearance</h4>
                                                <?php 
												foreach($screening as $screeningVal)
												{
													?>
													<p><?php if($screeningVal['screenStepReply']==1){ ?> <i class="text-success la la-check me-2"></i> <?php } else {
														?>
														<i class="text-danger la la-close me-2"></i>
														<?php
													} ?> <?=$screeningVal['screeningStepDesc'];?></p>
													
													<?php
												}
												?>
                                                
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact1">
                                            <div class="pt-4">
                                                <h4>Offer Acceptance Date</h4>
                                                <p>Offer Acceptance Date: <strong><?=date("Y-m-d",strtotime($applicantDetails['joningDate']));?></strong>
                                                </p>
                                                
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

	<script src="<?=base_url('assets/vendor/jquery-steps/build/jquery.steps.min.js');?>"></script>
    <script src="<?=base_url('assets/vendor/jquery-validation/jquery.validate.min.js');?>"></script>
    <!-- Form validate init -->
    <script src="<?=base_url('assets/js/plugins-init/jquery.validate-init.js');?>"></script>


	<!-- Form Steps -->
	<script src="<?=base_url('assets/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js');?>"></script>
	
	
	<!-- Apex Chart -->
	<script src="<?=base_url('assets/vendor/apexchart/apexchart.js');?>"></script>
	
	
	<!-- <script src="<?=base_url('assets/vendor/popper/popper.min.js');?>"></script>
	<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script> -->
	
	<!-- Chart piety plugin files -->
   <script src="<?=base_url('assets/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
   <script src="<?=base_url('assets/js/plugins-init/datatables.init.js');?>"></script>
   <script src="<?=base_url('assets/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js');?>"></script>
	
	
	
    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dlabnav-init.js');?>"></script>
	
    
	<script>
	 $(".form_datetime").datepicker({format: 'yyyy-mm-dd'});
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl)
	})
	</script>  
	<script>
		$(document).ready(function(){
			// SmartWizard initialize
			$('#smartwizard').smartWizard(); 

			$('#basicSalaryCal').keyup(function(){
				var totalSal = $('#basicSalaryCal').val();
				var basicCal = percentage(totalSal, <?=$applicantDetails['basicPerc'];?>);
				var hraCal = percentage(totalSal, <?=$applicantDetails['homeRentAllowPerc'];?>);
				var traCal = percentage(totalSal, <?=$applicantDetails['transportAllowPerc'];?>);
				var otherCal = percentage(totalSal, <?=$applicantDetails['othersAllowPerc'];?>);
				$('#basicSalCal').val(basicCal);
				$('#hraCal').val(hraCal);
				$('#traCal').val(traCal);
				$('#otherCal').val(otherCal);
			});
		});
		function percentage(num, per)
		{
		  return (num/100)*per;
		}

	</script>

</body>
</html>
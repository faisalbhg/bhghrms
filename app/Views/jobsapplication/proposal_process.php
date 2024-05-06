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
	<title>BHG HRM::Jobs applicant Screening</title>
	
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


		.wizard-content-left {
  background-blend-mode: darken;
  background-color: rgba(0, 0, 0, 0.45);
  background-image: url("https://i.ibb.co/X292hJF/form-wizard-bg-2.jpg");
  background-position: center center;
  background-size: cover;
  height: 100vh;
  padding: 30px;
}
.wizard-content-left h1 {
  color: #ffffff;
  font-size: 38px;
  font-weight: 600;
  padding: 12px 20px;
  text-align: center;
}

.form-wizard {
  color: #888888;
  
}
.form-wizard .wizard-form-radio {
  display: inline-block;
  margin-left: 5px;
  position: relative;
}
.form-wizard .wizard-form-radio input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  background-color: #dddddd;
  height: 25px;
  width: 25px;
  display: inline-block;
  vertical-align: middle;
  border-radius: 50%;
  position: relative;
  cursor: pointer;
}
.form-wizard .wizard-form-radio input[type="radio"]:focus {
  outline: 0;
}
.form-wizard .wizard-form-radio input[type="radio"]:checked {
  background-color: #fb1647;
}
.form-wizard .wizard-form-radio input[type="radio"]:checked::before {
  content: "";
  position: absolute;
  width: 10px;
  height: 10px;
  display: inline-block;
  background-color: #ffffff;
  border-radius: 50%;
  left: 1px;
  right: 0;
  margin: 0 auto;
  top: 8px;
}
.form-wizard .wizard-form-radio input[type="radio"]:checked::after {
  content: "";
  display: inline-block;
  webkit-animation: click-radio-wave 0.65s;
  -moz-animation: click-radio-wave 0.65s;
  animation: click-radio-wave 0.65s;
  background: #000000;
  content: "";
  display: block;
  position: relative;
  z-index: 100;
  border-radius: 50%;
}
.form-wizard .wizard-form-radio input[type="radio"] ~ label {
  padding-left: 10px;
  cursor: pointer;
}
.form-wizard .form-wizard-header {
  text-align: center;
}
.form-wizard .form-wizard-next-btn,
.form-wizard .form-wizard-previous-btn,
.form-wizard .form-wizard-submit {
  background-color: #315799;
  color: #ffffff;
  display: inline-block;
  min-width: 100px;
  min-width: 120px;
  padding: 10px;
  text-align: center;
}
.form-wizard .form-wizard-next-btn:hover,
.form-wizard .form-wizard-next-btn:focus,
.form-wizard .form-wizard-previous-btn:hover,
.form-wizard .form-wizard-previous-btn:focus,
.form-wizard .form-wizard-submit:hover,
.form-wizard .form-wizard-submit:focus {
  color: #ffffff;
  opacity: 0.6;
  text-decoration: none;
}
.form-wizard .wizard-fieldset {
  display: none;
}
.form-wizard .wizard-fieldset.show {
  display: block;
}
.form-wizard .wizard-form-error {
  display: none;
  background-color: #d70b0b;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.form-wizard .form-wizard-previous-btn {
  background-color: #fb1647;
}
.form-wizard .form-control {
  font-weight: 300;
  height: auto !important;
  padding: 15px;
  color: #888888;
  background: #fff;
  border: 0.0625rem solid #dededf;
}
.form-wizard .form-control:focus {
  box-shadow: none;
}
.form-wizard .form-group {
  position: relative;
  margin: 25px 0;
}
.form-wizard .wizard-form-text-label {
  position: absolute;
  left: 10px;
  top: 16px;
  transition: 0.2s linear all;
}
.form-wizard .focus-input .wizard-form-text-label {
  color: #315799;
  top: -18px;
  transition: 0.2s linear all;
  font-size: 12px;
}
.form-wizard .form-wizard-steps {
  margin: 30px 0;
}
.form-wizard .form-wizard-steps li {
  width: 25%;
  float: left;
  position: relative;
}
.form-wizard .form-wizard-steps li::after {
  background-color: #f3f3f3;
  content: "";
  height: 5px;
  left: 0;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 100%;
  border-bottom: 1px solid #dddddd;
  border-top: 1px solid #dddddd;
}
.form-wizard .form-wizard-steps li span {
  background-color: #dddddd;
  border-radius: 50%;
  display: inline-block;
  height: 40px;
  line-height: 40px;
  position: relative;
  text-align: center;
  width: 40px;
  z-index: 1;
}
.form-wizard .form-wizard-steps li:last-child::after {
  width: 50%;
}
.form-wizard .form-wizard-steps li.active span,
.form-wizard .form-wizard-steps li.activated span {
  background-color: #315799;
  color: #ffffff;
}
.form-wizard .form-wizard-steps li.active::after,
.form-wizard .form-wizard-steps li.activated::after {
  background-color: #315799;
  left: 50%;
  width: 50%;
  border-color: #315799;
}
.form-wizard .form-wizard-steps li.activated::after {
  width: 100%;
  border-color: #315799;
}
.form-wizard .form-wizard-steps li:last-child::after {
  left: 0;
}
.form-wizard .wizard-password-eye {
  position: absolute;
  right: 32px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
}
@keyframes click-radio-wave {
  0% {
    width: 25px;
    height: 25px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    width: 60px;
    height: 60px;
    margin-left: -15px;
    margin-top: -15px;
    opacity: 0;
  }
}
@media screen and (max-width: 767px) {
  .wizard-content-left {
    height: auto;
  }
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
                                Applicant Screening Details
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
					<h4 class="fs-20 font-w600 mb-0 me-auto">Applicant Proposal </h4>

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
												<a href="<?=$applicantDetails['cvUrl'];?>" target="_blank" class="text-danger"><i class="fas fa-download me-2"></i>Download Ruseme</a>
											</span>
											
										</div>
									</div>
								</div>
								
							</div>
							<div class="card-body pt-0">
								
								<div class="row">
									<div class="col-xl-6 col-md-12">
										<?php //echo '<pre>'; print_r($applicantDetails);print_r($getSalaryBreakDown); echo '</pre>'; ?>
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
                            <div class="card-body">
                            	<section class="wizard-section">
									<div class="row no-gutters">
										
										<div class="col-lg-12 col-md-6">
											<div class="form-wizard">
												<?= form_open('job-proposal/'.$applicantDetails['applicationId'],array("autocomplete"=>"off")); ?>
	                                				<?= csrf_field() ?>
	                                				<input type="hidden" value="<?=$applicantDetails['companyId'];?>" name="companyId">
	                                				<input type="hidden" value="<?=$applicantDetails['jobId'];?>" name="jobId">
	                                				<input type="hidden" value="<?=$applicantDetails['applicationId'];?>" name="applicationId">
	                                				<div class="form-wizard-header">
														<h4 class="text-center card-title">Make Proposal</h4>
														<p>Fill all form field to go next step</p>
														<ul class="list-unstyled form-wizard-steps clearfix">
															<li class="active"><span>1</span></li>
															<li><span>2</span></li>
															<li><span>3</span></li>
															<li><span>4</span></li>
														</ul>
													</div>
													<fieldset class="wizard-fieldset show">
														<h5>Salary Break Down</h5>
														<div class="row">
															<div class="col-lg-4">
																<div class="form-group mb-0">
																	<input type="number" class="form-control wizard-required" id="totalSalary" name="totalSalary">
																	<label for="totalSalary" class="wizard-form-text-label">Total Salary*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control wizard-required" id="basicSalary" name="basicSalary">
																	<label for="basicSalary" class="wizard-form-text-label">Basic Salary*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<?php 
																	/*if($getSalaryBreakDown[0]['perc']>0 && $getSalaryBreakDown[0]['fixedAmount']>0)
																	{
																		?>
																		<div class="wizard-form-radio">
																			<input name="radio-name" id="radio1" type="radio" value="<?=$getSalaryBreakDown[0]['perc'];?>">
																			<label for="radio1">Percentage: <strong><?=$getSalaryBreakDown[0]['perc'];?></strong></label>
																		</div>
																		<div class="wizard-form-radio">
																			<input name="radio-name" id="radio2" type="radio" value="<?=$getSalaryBreakDown[0]['fixedAmount'];?>">
																			<label for="radio2">Fixed Amount: <strong><?=$getSalaryBreakDown[0]['fixedAmount'];?></strong></label>
																		</div>
																		<?php
																	}
																	else if($getSalaryBreakDown[0]['perc']>0)
																	{
																		?>
																		<span><?=$getSalaryBreakDown[0]['perc'];?>% of Basic Salary</span>
																		<script type="text/javascript">callBasicSalPercentage('1','<?=$getSalaryBreakDown[0]['perc'];?>','homeRentAllownace');</script>
																		<?php
																	}
																	else if($getSalaryBreakDown[0]['fixedAmount']>0)
																	{
																		?>
																		<span>Fixed: <?=$getSalaryBreakDown[0]['fixedAmount'];?>AED</span>
																		<script type="text/javascript">autoSubmVal('2','<?=$getSalaryBreakDown[0]['fixedAmount'];?>','homeRentAllownace');</script>
																		<?php
																	}*/
																	?>
																	<span>Min: <strong><?=$applicantDetails['basicSalaryMin'];?></strong>, Max: <strong><?=$applicantDetails['basicSalaryMax'];?></strong></span>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control" id="taskAllowance" name="taskAllowance">
																	<label for="taskAllowance" class="wizard-form-text-label">Task Allowance*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<?php 
																	if($getSalaryBreakDown[3]['perc']>0 && $getSalaryBreakDown[3]['fixedAmount']>0)
																	{
																		?>
																		<div class="wizard-form-radio">
																			<input name="hraValOptn" onclick="hraClick('1','<?=$getSalaryBreakDown[3]['perc'];?>');" id="radio1" type="radio" value="<?=$getSalaryBreakDown[3]['perc'];?>">
																			<label for="radio1">Percentage: <strong><?=$getSalaryBreakDown[3]['perc'];?>%</strong></label>
																		</div>
																		<div class="wizard-form-radio">
																			<input name="hraValOptn" id="radio2" onclick="hraClick('2','<?=$getSalaryBreakDown[3]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[3]['fixedAmount'];?>">
																			<label for="radio2">Fixed Amount: <strong><?=$getSalaryBreakDown[3]['fixedAmount'];?></strong></label>
																		</div>
																		<?php
																	}
																	else if($getSalaryBreakDown[3]['perc']>0)
																	{
																		?>
																		<span><?=$getSalaryBreakDown[3]['perc'];?>% of Basic Salary</span>
																		<script type="text/javascript">callBasicSalPercentage('1','<?=$getSalaryBreakDown[3]['perc'];?>','homeRentAllownace');</script>
																		<?php
																	}
																	else if($getSalaryBreakDown[3]['fixedAmount']>0)
																	{
																		?>
																		<span>Fixed: <?=$getSalaryBreakDown[3]['fixedAmount'];?>AED</span>
																		<script type="text/javascript">autoSubmVal('2','<?=$getSalaryBreakDown[3]['fixedAmount'];?>','homeRentAllownace');</script>
																		<?php
																	}
																	?>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control wizard-required" id="homeRentAllownace" name="homeRentAllownace" readonly >
																	<label for="homeRentAllownace" class="wizard-form-text-label">Home Rent Allownace*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<?php 
																	if($getSalaryBreakDown[1]['perc']>0 && $getSalaryBreakDown[1]['fixedAmount']>0)
																	{
																		?>
																		<div class="wizard-form-radio">
																			<input name="hraValOptn" onclick="hraClick('1','<?=$getSalaryBreakDown[1]['perc'];?>');" id="radio1" type="radio" value="<?=$getSalaryBreakDown[1]['perc'];?>">
																			<label for="radio1">Percentage: <strong><?=$getSalaryBreakDown[1]['perc'];?>%</strong></label>
																		</div>
																		<div class="wizard-form-radio">
																			<input name="hraValOptn" id="radio2" onclick="hraClick('2','<?=$getSalaryBreakDown[1]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[1]['fixedAmount'];?>">
																			<label for="radio2">Fixed Amount: <strong><?=$getSalaryBreakDown[1]['fixedAmount'];?></strong></label>
																		</div>
																		<?php
																	}
																	else if($getSalaryBreakDown[1]['perc']>0)
																	{
																		?>
																		<span><?=$getSalaryBreakDown[1]['perc'];?>% of Basic Salary</span>
																		<script type="text/javascript">callBasicSalPercentage('1','<?=$getSalaryBreakDown[1]['perc'];?>','homeRentAllownace');</script>
																		<?php
																	}
																	else if($getSalaryBreakDown[1]['fixedAmount']>0)
																	{
																		?>
																		<span>Fixed: <?=$getSalaryBreakDown[1]['fixedAmount'];?>AED</span>
																		<script type="text/javascript">autoSubmVal('2','<?=$getSalaryBreakDown[1]['fixedAmount'];?>','homeRentAllownace');</script>
																		<?php
																	}
																	?>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control wizard-required" id="transportAllownace" name="transportAllownace" readonly>
																	<label for="transportAllownace" class="wizard-form-text-label">Transport Allownace*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<?php 
																	if($getSalaryBreakDown[2]['perc']>0 && $getSalaryBreakDown[2]['fixedAmount']>0)
																	{
																		?>
																		<div class="wizard-form-radio">
																			<input name="hraValOptn" onclick="hraClick('1','<?=$getSalaryBreakDown[2]['perc'];?>');" id="radio1" type="radio" value="<?=$getSalaryBreakDown[2]['perc'];?>">
																			<label for="radio1">Percentage: <strong><?=$getSalaryBreakDown[2]['perc'];?>%</strong></label>
																		</div>
																		<div class="wizard-form-radio">
																			<input name="hraValOptn" id="radio2" onclick="hraClick('2','<?=$getSalaryBreakDown[2]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[2]['fixedAmount'];?>">
																			<label for="radio2">Fixed Amount: <strong><?=$getSalaryBreakDown[2]['fixedAmount'];?></strong></label>
																		</div>
																		<?php
																	}
																	else if($getSalaryBreakDown[2]['perc']>0)
																	{
																		?>
																		<span><?=$getSalaryBreakDown[2]['perc'];?>% of Basic Salary</span>
																		<script type="text/javascript">callBasicSalPercentage('1','<?=$getSalaryBreakDown[2]['perc'];?>','homeRentAllownace');</script>
																		<?php
																	}
																	else if($getSalaryBreakDown[2]['fixedAmount']>0)
																	{
																		?>
																		<span>Fixed: <?=$getSalaryBreakDown[2]['fixedAmount'];?>AED</span>
																		<script type="text/javascript">autoSubmVal('2','<?=$getSalaryBreakDown[2]['fixedAmount'];?>','homeRentAllownace');</script>
																		<?php
																	}
																	?>
																</div>
															</div>
														</div>

														
														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control" id="mobileAllowance" name="mobileAllowance"  readonly>
																	<label for="mobileAllowance" class="wizard-form-text-label">Mobile Allowance*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<?php 
																	if($getSalaryBreakDown[4]['perc']>0 && $getSalaryBreakDown[4]['fixedAmount']>0)
																	{
																		?>
																		<div class="wizard-form-radio">
																			<input name="hraValOptn" onclick="hraClick('1','<?=$getSalaryBreakDown[4]['perc'];?>');" id="radio1" type="radio" value="<?=$getSalaryBreakDown[4]['perc'];?>">
																			<label for="radio1">Percentage: <strong><?=$getSalaryBreakDown[4]['perc'];?>%</strong></label>
																		</div>
																		<div class="wizard-form-radio">
																			<input name="hraValOptn" id="radio2" onclick="hraClick('2','<?=$getSalaryBreakDown[4]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[4]['fixedAmount'];?>">
																			<label for="radio2">Fixed Amount: <strong><?=$getSalaryBreakDown[4]['fixedAmount'];?></strong></label>
																		</div>
																		<?php
																	}
																	else if($getSalaryBreakDown[4]['perc']>0)
																	{
																		?>
																		<span><?=$getSalaryBreakDown[4]['perc'];?>% of Basic Salary</span>
																		<script type="text/javascript">callBasicSalPercentage('1','<?=$getSalaryBreakDown[4]['perc'];?>','homeRentAllownace');</script>
																		<?php
																	}
																	else if($getSalaryBreakDown[4]['fixedAmount']>0)
																	{
																		?>
																		<span>Fixed: <?=$getSalaryBreakDown[4]['fixedAmount'];?>AED</span>
																		<script type="text/javascript">autoSubmVal('2','<?=$getSalaryBreakDown[4]['fixedAmount'];?>','homeRentAllownace');</script>
																		<?php
																	}
																	?>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-4">
																<div class="accordion accordion-primary" id="accordion-one">
																	<div class="accordion-item">
																	<div class=" accordion-header rounded-lg collapsed" id="calculatebalance" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne" aria-expanded="false" role="button">
																		<span class="accordion-header-icon"></span>
																	  <span class="accordion-header-text ">Calculate Salary Break Down </span>
																	  <span class="accordion-header-indicator"></span>
																	</div>
																	<div id="collapseOne" class="collapse" aria-labelledby="calculatebalance" data-bs-parent="#accordion-one" style="">
																	  <div class="accordion-body-text">
																			<p><label>Agreed Total: <span id="agreedTotal"></span></label></p>
																			<p><label>Salary Breakdown Total: <span id="salCalTotal"></span></label></p>
																			<p><label>Balance Total: <span id="balCalTotal"></span></label></p>
																	  </div>
																	</div>
																	</div>
																	
																	
																</div>
															</div>
															
														</div>
														
														<div class="form-group clearfix">
															<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
														</div>
													</fieldset>	
													<fieldset class="wizard-fieldset">
														<h5>Emplyee Screening Information</h5>
														<div class="col-lg-4">
															<div class="row">
																<div class="mb-3 form-group">
						                                            <div class="form-check mb-2">
						                                                <input type="checkbox" class="form-check-input wizard-required" name="screen1" id="check1" value="1">
						                                                <label class="form-check-label" for="check1">Does the Candidate been an ex-employee in BHG</label>
						                                                <input type="hidden" value="Does the Candidate been an ex-employee in BHG" name="screen1Val">
						                                            </div>
						                                            <div class="form-check mb-2">
						                                                <input type="checkbox" class="form-check-input wizard-required" name="screen2" id="check2" value="2">
						                                                <label class="form-check-label" for="check2">Certificate Validity </label>
						                                                <input type="hidden" value="Certificate Validity" name="screen2Val">
						                                            </div>
						                                            <div class="form-check disabled">
						                                                <input type="checkbox" class="form-check-input wizard-required" name="screen3" id="check3" value="3" >
						                                                <label class="form-check-label" for="check3">Clearance from DUbai Police </label>
						                                                <input type="hidden" value="Clearance from DUbai Police" name="screen3Val">
						                                            </div>
						                                            <div class="form-check disabled">
						                                                <input type="checkbox" class="form-check-input wizard-required" name="screen4" id="check3" value="4" >
						                                                <label class="form-check-label" for="check3">Conflict of interest</label>
						                                                <input type="hidden" value="Conflict of interest" name="screen4Val">
						                                            </div>
						                                        </div>
															</div>
														</div>
														<div class="form-group clearfix">
															<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
															<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
														</div>
													</fieldset>	
													<fieldset class="wizard-fieldset">
														<h5>Joining Date</h5>
														<div class="col-lg-4">
															<div class="row">
																<div class="form-group">
																	<input type="date" class="form-control wizard-required" id="joiningDate" name="joiningDate">
																	<label for="username" class="wizard-form-text-label">Joining Date*</label>
																	<div class="wizard-form-error"></div>
																</div>
																
															</div>
														</div>
														<div class="form-group clearfix">
															<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
															<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
														</div>
													</fieldset>	
													<fieldset class="wizard-fieldset">
														<h5>Submit Proposal</h5>
														<div class="col-lg-4">
															<div class="row">
																
					                                            <button type="submit" class="btn btn-secondary btn-sm">Sent Proposal Approval <span class="btn-icon-end"><i class="fa fa-envelope"></i></span></button>
															</div>
														</div>
														<div class="form-group clearfix">
															<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
															<a href="javascript:;" class="form-wizard-submit float-right">Submit</a>
														</div>
													</fieldset>	
												<?=form_close();?>
											</div>
										</div>
									</div>
								</section>
                            	
	                                
								
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
			$('#basicSalary').keyup(function()
			{
				var basicSal = $('#basicSalary').val();
				var minbasicSal = <?=$applicantDetails['basicSalaryMin'];?>;
				var maxbasicSal = <?=$applicantDetails['basicSalaryMax'];?>;

				if(basicSal>=minbasicSal && basicSal<=maxbasicSal)
				{
					return true;
				}
				else
				{
					return false;
				}

			});

			

			

			$('#calculatebalance').click(function()
			{
				calculateBalance();
				
			});

			$('#totalSalary').keyup(function(){
				calculateBalance();
			});
			$('#basicSalary').keyup(function(){
				calculateBalance();
			});
			$('#homeRentAllownace').keyup(function(){
				calculateBalance();
			});
			$('#transportAllownace').keyup(function(){
				calculateBalance();
			});
			$('#taskAllowance').keyup(function(){
				calculateBalance();
			});


			
		});


		function calculateBalance()
		{
			var totalSal = $('#totalSalary').val();
			var basicSal = $('#basicSalary').val();
			var homeRentAllownace = $('#homeRentAllownace').val();
			var transportAllownace = $('#transportAllownace').val();
			var taskAllowance = $('#taskAllowance').val();
			var mobileAllowance = $('#mobileAllowance').val();
			$('#agreedTotal').html($('#totalSalary').val());
			var totalSalBreakCal = Number(basicSal)+Number(homeRentAllownace)+Number(transportAllownace)+Number(taskAllowance)+Number(mobileAllowance);
			$('#salCalTotal').html(totalSalBreakCal);
			var totlBalnce = Number(totalSal)-Number(totalSalBreakCal);
			if(totlBalnce==0)
			{
				var valTotbal = '<span class="text-success">'+totlBalnce+'</span>';
			}
			else
			{
				var valTotbal = '<span class="text-danger">'+totlBalnce+'</span>';

			}
			$('#balCalTotal').html(valTotbal);
		}


		function percentage(num, per)
		{
		  return (num/100)*per;
		}

		function imposeMinMax(el){
			if(el.value != ""){
				if(parseInt(el.value) < parseInt(el.min)){
					el.value = el.min;
				}
				if(parseInt(el.value) > parseInt(el.max)){
					el.value = el.max;
				}
			}
		}

		<?php
		if($getSalaryBreakDown[2]['perc']>0)
		{
			?>
			autoSubmVal('1','<?=$getSalaryBreakDown[2]['perc'];?>','transportAllownace');
			<?php
		}
		else if($getSalaryBreakDown[2]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[2]['fixedAmount'];?>','transportAllownace');
			<?php
		}

		if($getSalaryBreakDown[3]['perc']>0)
		{
			?>
			autoSubmVal('1','<?=$getSalaryBreakDown[3]['perc'];?>','taskAllowance');
			<?php
		}
		else if($getSalaryBreakDown[3]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[3]['fixedAmount'];?>','taskAllowance');
			<?php
		}

		if($getSalaryBreakDown[4]['perc']>0)
		{
			?>
			autoSubmVal('1','<?=$getSalaryBreakDown[4]['perc'];?>','mobileAllowance');
			<?php
		}
		else if($getSalaryBreakDown[4]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[4]['fixedAmount'];?>','mobileAllowance');
			<?php
		}
		
		?>
		



		function callBasicSal(type,val1,id)
		{
			var basicSal = $('#totalSalary').val();
			if(type==1)
			{
				$('#basicSalary').focus();
				$('#totalSalary').focus();
				$('#basicSalary').val(percentage(basicSal, val1));
			}
			else if(type==2)
			{
				$('#basicSalary').focus();
				$('#totalSalary').focus();
				$('#basicSalary').val(val1);
			}
		}

		function hraClick(type,val)
		{
			var basicSal = $('#basicSalary').val();
			if(basicSal=='')
			{
				$('input[name="hraValOptn"]:checked').prop("checked", false)
				//$(this).prop("checked", false);
				$('#basicSalary').focus();

			}
			else
			{
				$('#homeRentAllownace').focus();
				if(type==1)
				{
					var basicSal = $('#basicSalary').val();
					$('#homeRentAllownace').val(percentage(basicSal, val));
					$('#transportAllownace').focus();
				}
				else if(type==2)
				{
					$('#homeRentAllownace').val(val);
					$('#transportAllownace').focus();
				}
			}
			calculateBalance();
		}

		function autoSubmVal(type,val,id)
		{
			$('#'+id).focus();
			if(type==1)
			{
				var percVal = percentage(basicSal, val);
				if(percVal==0)
				{
					$('#'+id).val('0');
				}
				else
				{
					$('#'+id).val(percVal);
				}
				
				//$('#totalSalary').focus();
			}
			else if(type==2)
			{
				var fixVal = val;
				if(val==0)
				{
					$('#'+id).val('0');
				}
				else
				{
					$('#'+id).val(fixVal);
				}
				//$('#totalSalary').focus();
			}

		}

		jQuery(document).ready(function() {
			// click on next button
			jQuery('.form-wizard-next-btn').click(function() {
				var parentFieldset = jQuery(this).parents('.wizard-fieldset');
				var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
				var next = jQuery(this);
				var nextWizardStep = true;
				parentFieldset.find('.wizard-required').each(function(){
					var thisValue = jQuery(this).val();
					
					if( thisValue == "") {
						jQuery(this).siblings(".wizard-form-error").slideDown();
						nextWizardStep = false;
					}
					else {
						jQuery(this).siblings(".wizard-form-error").slideUp();
					}

					var minTotalSal = <?=$applicantDetails['salaryFrom'];?>;
					var maxTotalSal = <?=$applicantDetails['salaryTo'];?>;

					var minbasicSal = <?=$applicantDetails['basicSalaryMin'];?>;
					var maxbasicSal = <?=$applicantDetails['basicSalaryMax'];?>;

					if(jQuery('#totalSalary').val()>=minTotalSal && jQuery('#totalSalary').val()<=maxTotalSal)
					{
						jQuery('#totalSalary').siblings(".wizard-form-error").slideUp();
					}
					else
					{
						jQuery('#totalSalary').siblings(".wizard-form-error").slideDown();
						nextWizardStep = false;
					}
					
					if(jQuery('#basicSalary').val()>=minbasicSal && jQuery('#basicSalary').val()<=maxbasicSal)
					{
						jQuery('#basicSalary').siblings(".wizard-form-error").slideUp();
					}
					else
					{
						jQuery('#basicSalary').siblings(".wizard-form-error").slideDown();
						nextWizardStep = false;
					}
				});
				if( nextWizardStep) {
					next.parents('.wizard-fieldset').removeClass("show","400");
					currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
					next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
					jQuery(document).find('.wizard-fieldset').each(function(){
						if(jQuery(this).hasClass('show')){
							var formAtrr = jQuery(this).attr('data-tab-content');
							jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
								if(jQuery(this).attr('data-attr') == formAtrr){
									jQuery(this).addClass('active');
									var innerWidth = jQuery(this).innerWidth();
									var position = jQuery(this).position();
									jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
								}else{
									jQuery(this).removeClass('active');
								}
							});
						}
					});
				}
			});
			//click on previous button
			jQuery('.form-wizard-previous-btn').click(function() {
				var counter = parseInt(jQuery(".wizard-counter").text());;
				var prev =jQuery(this);
				var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
				prev.parents('.wizard-fieldset').removeClass("show","400");
				prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
				currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
				jQuery(document).find('.wizard-fieldset').each(function(){
					if(jQuery(this).hasClass('show')){
						var formAtrr = jQuery(this).attr('data-tab-content');
						jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
							if(jQuery(this).attr('data-attr') == formAtrr){
								jQuery(this).addClass('active');
								var innerWidth = jQuery(this).innerWidth();
								var position = jQuery(this).position();
								jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
							}else{
								jQuery(this).removeClass('active');
							}
						});
					}
				});
			});
			//click on form submit button
			jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
				var parentFieldset = jQuery(this).parents('.wizard-fieldset');
				var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
				parentFieldset.find('.wizard-required').each(function() {
					var thisValue = jQuery(this).val();
					if( thisValue == "" ) {
						jQuery(this).siblings(".wizard-form-error").slideDown();
					}
					else {
						jQuery(this).siblings(".wizard-form-error").slideUp();
					}
				});
			});
			// focus on input field check empty or not
			jQuery(".form-control").on('focus', function(){
				var tmpThis = jQuery(this).val();
				if(tmpThis == '' ) {
					jQuery(this).parent().addClass("focus-input");
				}
				else if(tmpThis !='' ){
					jQuery(this).parent().addClass("focus-input");
				}
			}).on('blur', function(){
				var tmpThis = jQuery(this).val();
				if(tmpThis == '' ) {
					jQuery(this).parent().removeClass("focus-input");
					jQuery(this).siblings('.wizard-form-error').slideDown("3000");
				}
				else if(tmpThis !='' ){
					jQuery(this).parent().addClass("focus-input");
					jQuery(this).siblings('.wizard-form-error').slideUp("3000");
				}
			});
		});


	</script>

</body>
</html>
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
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/update-proposal.css');?>">
	
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
    					<div class="dashboard_bar">Screening Process</div>
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
    			<h4 class="fs-20 font-w600 mb-0 me-auto">Screening Process </h4>
    			<?php if (session()->getFlashdata('error') !== NULL) : ?>
    				<div class="alert alert-primary alert-dismissible alert-alt fade show">
    					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    					<strong>Warning!</strong> <?php echo session()->getFlashdata('error'); ?>
    				</div>
    			<?php endif; ?>
    			<?php if (session()->getFlashdata('success') !== NULL) : ?>
      			<div class="alert alert-secondary alert-dismissible alert-alt fade show">
      				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
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
								<h4 class="card-title">Proposal Step</h4>
							</div>
							<div class="card-body">
								<?php //echo '<pre>'; print_r($applicantDetails); echo '</pre>'; ?>
								<section class="wizard-section">
									<div class="row no-gutters">
										<div class="col-lg-12 col-md-6">
											<div class="form-wizard">
												<?= form_open('job-proposal/'.$applicantDetails['applicantionId'].'/'.$applicantDetails['proposalID'],array("autocomplete"=>"off")); ?>
													<?= csrf_field() ?>
                  				<input type="hidden" value="<?=$applicantDetails['companyId'];?>" name="companyId">
                  				<input type="hidden" value="<?=$applicantDetails['jobId'];?>" name="jobId">
                  				<input type="hidden" value="<?=$applicantDetails['applicantionId'];?>" name="applicantionId">
                  				<input type="hidden" value="<?=$applicantDetails['basicPerc'];?>" name="basicPerc">
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




														<div class="card">
	                            <div class="card-header">
	                                <h4 class="card-title">Salary Break Down</h4>
	                            </div>
	                            <div class="card-body">
	                                <div class="basic-form">
	                                    <form>
	                                        <div class="mb-3 row">
	                                            <label class="col-sm-3 col-form-label">Total Salary</label>
	                                            <div class="col-sm-4">
	                                                <input type="number" class="form-control wizard-required" id="totalSalary" name="totalSalary" value="<?=$applicantDetails['totalSalary'];?>">
	                                                <span>Min: <strong><?=$applicantDetails['salaryFrom'];?></strong>, Max: <strong><?=$applicantDetails['salaryTo'];?></strong></span>
	                                            </div>
	                                        </div>
	                                        <div class="mb-3 row">
	                                            <label class="col-sm-3 col-form-label">Basic Salary</label>
	                                            <div class="col-sm-4">
	                                            	<input type="number" class="form-control wizard-required" id="basicSalary" name="basicSalary" value="<?=$applicantDetails['basicSalary'];?>">

	                                            	<!-- <?php 
																								if($getSalaryBreakDown[0]['perc']>0 && $getSalaryBreakDown[0]['fixedAmount']>0)
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
																								}
																								?> -->
																								<!-- <span><strong><?=$applicantDetails['basicPerc'];?>% of Total Salary</strong></span> -->
																								<div class="wizard-form-radio">
																									<input name="basiccheck" id="radio1" type="radio" value="40" checked onclick="basicClick('1','40');" >
																									<label for="radio1" ><strong>40% of total salary</strong></label>
																								</div>
																								<div class="wizard-form-radio">
																									<input name="basiccheck" id="radio2" type="radio" value="42"  onclick="basicClick('1','42');">
																									<label for="radio2"><strong>42% of total salary</strong></label>
																								</div>
																								<div class="wizard-form-radio">
																									<input name="basiccheck" id="radio3" type="radio" value="45" onclick="basicClick('1','45');" >
																									<label for="radio2"><strong>45% of total salary</strong></label>
																								</div>
																								<!-- <span>Min: <strong><?=$applicantDetails['basicSalaryMin'];?></strong>, Max: <strong><?=$applicantDetails['basicSalaryMax'];?></strong></span> -->
	                                            </div>
	                                        </div>
	                                        <div class="mb-3 row">
	                                            <label class="col-sm-3 col-form-label">Task Allowance</label>
	                                            <div class="col-sm-4">
	                                                <input type="number" class="form-control" id="taskAllowance" name="taskAllowance" value="<?=$applicantDetails['otherAllow'];?>" class="form-control">
	                                                <?php 
																									if($getSalaryBreakDown[3]['perc']>0 && $getSalaryBreakDown[3]['fixedAmount']>0)
																									{
																										?>
																										<div class="form-check">
																											<input class="form-check-input" name="hraValOptn" onclick="taskAClick('1','<?=$getSalaryBreakDown[3]['perc'];?>');" id="radio1" type="radio" value="<?=$getSalaryBreakDown[3]['perc'];?>">
																											<label for="radio1" class="form-check-label">Percentage: <strong><?=$getSalaryBreakDown[3]['perc'];?>%</strong></label>
																										</div>
																										<div class="form-check">
																											<input class="form-check-input" name="hraValOptn" id="radio2" onclick="taskAClick('2','<?=$getSalaryBreakDown[3]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[3]['fixedAmount'];?>">
																											<label for="radio2" class="form-check-label">Fixed Amount: <strong><?=$getSalaryBreakDown[3]['fixedAmount'];?></strong></label>
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
	                                        <div class="mb-3 row">
	                                            <label class="col-sm-3 col-form-label">Home Rent Allowance</label>
	                                            <div class="col-sm-4">
	                                                <input type="number" class="form-control wizard-required" id="homeRentAllownace" name="homeRentAllownace" readonly  value="<?=$applicantDetails['homeRentAllow'];?>">
	                                                <?php 
																									if($getSalaryBreakDown[1]['perc']>0 && $getSalaryBreakDown[1]['fixedAmount']>0)
																									{
																										?>
																										<div class="form-check">
																											<input  class="form-check-input" name="hraValOptn" onclick="hraClick('1','<?=$getSalaryBreakDown[1]['perc'];?>-<?=$getSalaryBreakDown[1]['fixedAmount'];?>',);" id="radio1" type="radio" value="<?=$getSalaryBreakDown[1]['perc'];?>">
																											<label for="radio1"  class="form-check-label">Percentage: <strong><?=$getSalaryBreakDown[1]['perc'];?>%</strong></label>
																										</div>
																										<div class="form-check">
																											<input class="form-check-input" name="hraValOptn" id="radio2" onclick="hraClick('2','<?=$getSalaryBreakDown[1]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[1]['fixedAmount'];?>">
																											<label for="radio2" class="form-check-label">Fixed Amount: <strong><?=$getSalaryBreakDown[1]['fixedAmount'];?></strong></label>
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
																									<div class="form-check custom-checkbox mb-3 checkbox-danger">
																										<input name="companyAccomodation" id="companyAccomodation"  checked type="checkbox" value="1" class="form-check-input">
																										<label for="radio2">Company Accommodation</label>
																									</div>
	                                            </div>
	                                        </div>
	                                        <fieldset class="mb-3">
	                                            <div class="row">
	                                                <label class="col-form-label col-sm-3 pt-0">Radios</label>
	                                                <div class="col-sm-9">
	                                                    <div class="form-check">
	                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option1" checked="">
	                                                        <label class="form-check-label">
	                                                            First radio
	                                                        </label>
	                                                    </div>
	                                                    <div class="form-check">
	                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option2">
	                                                        <label class="form-check-label">
	                                                            Second radio
	                                                        </label>
	                                                    </div>
	                                                    <div class="form-check disabled">
	                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option3" disabled="">
	                                                        <label class="form-check-label">
	                                                            Third disabled radio
	                                                        </label>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </fieldset>
	                                        <div class="mb-3 row">
	                                            <div class="col-sm-3">Checkbox</div>
	                                            <div class="col-sm-9">
	                                                <div class="form-check">
	                                                    <input class="form-check-input" type="checkbox">
	                                                    <label class="form-check-label">
	                                                        Example checkbox
	                                                    </label>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="mb-3 row">
	                                            <div class="col-sm-10">
	                                                <button type="submit" class="btn btn-primary">Sign in</button>
	                                            </div>
	                                        </div>
	                                    </form>
	                                </div>
	                            </div>
	                        </div>





														<div class="row">
															<div class="col-lg-4">
																<div class="form-group mb-0  focus-input">
																	<input type="number" class="form-control wizard-required" id="totalSalary" name="totalSalary" value="<?=$applicantDetails['totalSalary'];?>">
																	<label for="totalSalary" class="wizard-form-text-label">Total Salary*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<span>Min: <strong><?=$applicantDetails['salaryFrom'];?></strong>, Max: <strong><?=$applicantDetails['salaryTo'];?></strong></span>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control wizard-required" id="basicSalary" name="basicSalary" value="<?=$applicantDetails['basicSalary'];?>">
																	<label for="basicSalary" class="wizard-form-text-label">Basic Salary*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<!-- <?php 
																	if($getSalaryBreakDown[0]['perc']>0 && $getSalaryBreakDown[0]['fixedAmount']>0)
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
																	}
																	?> -->
																	<!-- <span><strong><?=$applicantDetails['basicPerc'];?>% of Total Salary</strong></span> -->
																	<div class="wizard-form-radio">
																		<input name="basiccheck" id="radio1" type="radio" value="40" checked onclick="basicClick('1','40');" >
																		<label for="radio1" ><strong>40% of total salary</strong></label>
																	</div>
																	<div class="wizard-form-radio">
																		<input name="basiccheck" id="radio2" type="radio" value="42"  onclick="basicClick('1','42');">
																		<label for="radio2"><strong>42% of total salary</strong></label>
																	</div>
																	<div class="wizard-form-radio">
																		<input name="basiccheck" id="radio3" type="radio" value="45" onclick="basicClick('1','45');" >
																		<label for="radio2"><strong>45% of total salary</strong></label>
																	</div>
																	<!-- <span>Min: <strong><?=$applicantDetails['basicSalaryMin'];?></strong>, Max: <strong><?=$applicantDetails['basicSalaryMax'];?></strong></span> -->
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control" id="taskAllowance" name="taskAllowance" value="<?=$applicantDetails['otherAllow'];?>" class="form-control">
																	<label for="taskAllowance" class="wizard-form-text-label">Task Allowance*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<?php 
																if($getSalaryBreakDown[3]['perc']>0 && $getSalaryBreakDown[3]['fixedAmount']>0)
																{
																	?>
																	<div class="form-check">
																		<input class="form-check-input" name="hraValOptn" onclick="taskAClick('1','<?=$getSalaryBreakDown[3]['perc'];?>');" id="radio1" type="radio" value="<?=$getSalaryBreakDown[3]['perc'];?>">
																		<label for="radio1" class="form-check-label">Percentage: <strong><?=$getSalaryBreakDown[3]['perc'];?>%</strong></label>
																	</div>
																	<div class="form-check">
																		<input class="form-check-input" name="hraValOptn" id="radio2" onclick="taskAClick('2','<?=$getSalaryBreakDown[3]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[3]['fixedAmount'];?>">
																		<label for="radio2" class="form-check-label">Fixed Amount: <strong><?=$getSalaryBreakDown[3]['fixedAmount'];?></strong></label>
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

														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control wizard-required" id="homeRentAllownace" name="homeRentAllownace" readonly  value="<?=$applicantDetails['homeRentAllow'];?>">
																	<label for="homeRentAllownace" class="wizard-form-text-label">Home Rent Allowance*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<?php 
																if($getSalaryBreakDown[1]['perc']>0 && $getSalaryBreakDown[1]['fixedAmount']>0)
																{
																	?>
																	<div class="form-check">
																		<input  class="form-check-input" name="hraValOptn" onclick="hraClick('1','<?=$getSalaryBreakDown[1]['perc'];?>-<?=$getSalaryBreakDown[1]['fixedAmount'];?>',);" id="radio1" type="radio" value="<?=$getSalaryBreakDown[1]['perc'];?>">
																		<label for="radio1"  class="form-check-label">Percentage: <strong><?=$getSalaryBreakDown[1]['perc'];?>%</strong></label>
																	</div>
																	<div class="form-check">
																		<input class="form-check-input" name="hraValOptn" id="radio2" onclick="hraClick('2','<?=$getSalaryBreakDown[1]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[1]['fixedAmount'];?>">
																		<label for="radio2" class="form-check-label">Fixed Amount: <strong><?=$getSalaryBreakDown[1]['fixedAmount'];?></strong></label>
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
																<div class="form-check custom-checkbox mb-3 checkbox-danger">
																	<input name="companyAccomodation" id="companyAccomodation"  checked type="checkbox" value="1" class="form-check-input">
																	<label for="radio2">Company Accommodation</label>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control wizard-required" id="transportAllownace" name="transportAllownace" readonly value="<?=$applicantDetails['transportAllow'];?>">
																	<label for="transportAllownace" class="wizard-form-text-label">Transport Allowance*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<?php 
																	if($getSalaryBreakDown[2]['perc']>0 && $getSalaryBreakDown[2]['fixedAmount']>0)
																	{
																		?>
																		<div class="form-check">
																			<input class="form-check-input" name="hraValOptn" onclick="traAClick('1','<?=$getSalaryBreakDown[2]['perc'];?>');" id="radio1" type="radio" value="<?=$getSalaryBreakDown[2]['perc'];?>">
																			<label for="radio1" class="form-check-label">Percentage: <strong><?=$getSalaryBreakDown[2]['perc'];?>%</strong></label>
																		</div>
																		<div class="form-check">
																			<input class="form-check-input" name="hraValOptn" id="radio2" onclick="traAClick('2','<?=$getSalaryBreakDown[2]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[2]['fixedAmount'];?>">
																			<label for="radio2" class="form-check-label">Fixed Amount: <strong><?=$getSalaryBreakDown[2]['fixedAmount'];?></strong></label>
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
																	<div class="form-check custom-checkbox mb-3 checkbox-danger">
																		<input name="companyTransport" id="companyTransport"  checked type="checkbox" value="1" class="form-check-input">
																		<label for="radio2">Company Transport</label>
																	</div>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control" id="mobileAllowance" name="mobileAllowance"  readonly value="<?=$applicantDetails['mobileAllowPerc'];?>">
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
																			<input name="hraValOptn" onclick="maClick('1','<?=$getSalaryBreakDown[4]['perc'];?>');" id="radio1" type="radio" value="<?=$getSalaryBreakDown[4]['perc'];?>">
																			<label for="radio1">Percentage: <strong><?=$getSalaryBreakDown[4]['perc'];?>%</strong></label>
																		</div>
																		<div class="wizard-form-radio">
																			<input name="hraValOptn" id="radio2" onclick="maClick('2','<?=$getSalaryBreakDown[4]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[4]['fixedAmount'];?>">
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
																<div class="form-group">
																	<div class="form-check custom-checkbox mb-3 checkbox-danger">
																		<input name="overtime" id="Overtime" type="checkbox" class="form-check-input" <?php if($applicantDetails['overtime']==true){ ?>checked<?php } ?> value="1" />
																		<label for="Overtime">Overtime</label>
																	</div>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-lg-4">
																<div class="form-group">
																	<div class="form-check custom-checkbox mb-3 checkbox-danger">
																		<input name="carAllowance" id="carAllowance" type="checkbox" class="form-check-input" <?php if($applicantDetails['companyCar']==true){ ?>checked<?php } ?> value="1" />
																		<label for="carAllowance">Company Car</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-4">
																<div class="form-check">
                                    <input name="fuel" id="fuelCheck" class="form-check-input" type="checkbox" <?php if($applicantDetails['fuel']==true){ ?>checked<?php } ?> value="1">
                                    <label class="form-check-label">
                                       Fuel
                                    </label>
                                </div>
																
															</div>
														</div>

														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control wizard-required" id="fuelAllowance" name="fuelAllowance" readonly value="<?=$applicantDetails['fuelAllow'];?>">
																	<label for="fuelAllowance" class="wizard-form-text-label">Fuel Allowance*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<?php 
																	if($getSalaryBreakDown[5]['perc']>0 && $getSalaryBreakDown[5]['fixedAmount']>0)
																	{
																		?>
																		<div class="wizard-form-radio">
																			<input name="fuelValOptn" onclick="fuelAClick('1','<?=$getSalaryBreakDown[5]['perc'];?>');" id="fuelValOp1" type="radio" value="<?=$getSalaryBreakDown[5]['perc'];?>">
																			<label for="fuelValOp1">Percentage: <strong><?=$getSalaryBreakDown[5]['perc'];?>%</strong></label>
																		</div>
																		<div class="wizard-form-radio">
																			<input name="fuelValOptn" id="fuelValOp1" onclick="fuelAClick('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[5]['fixedAmount'];?>">
																			<label for="fuelValOp1">Fixed Amount: <strong><?=$getSalaryBreakDown[5]['fixedAmount'];?></strong></label>
																		</div>
																		<?php
																	}
																	else if($getSalaryBreakDown[5]['perc']>0)
																	{
																		?>
																		<span><?=$getSalaryBreakDown[5]['perc'];?>% of Basic Salary</span>
																		<script type="text/javascript">callBasicSalPercentage('1','<?=$getSalaryBreakDown[5]['perc'];?>','fuelAllownace');</script>
																		<?php
																	}
																	else if($getSalaryBreakDown[5]['fixedAmount']>0)
																	{
																		?>
																		<span>Fixed: <?=$getSalaryBreakDown[5]['fixedAmount'];?>AED</span>
																		<script type="text/javascript">autoSubmVal('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>','fuelAllownace');</script>
																		<?php
																	}
																	?>
																	<div class="form-check custom-checkbox mb-3 checkbox-danger">
																			<input name="companyFuel" id="companyFuel"  <?php if($applicantDetails['fuel']==true){ ?>checked<?php } ?> type="checkbox" value="1" class="form-check-input">
																			<label for="radio2">Company Fuel</label>
																		</div>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-lg-4">
																<div class="form-group focus-input">
																	<input type="number" class="form-control wizard-required" id="foodAllowance" name="foodAllowance" readonly value="<?=$applicantDetails['foodAllow'];?>">
																	<label for="foodAllowance" class="wizard-form-text-label">food Allowance*</label>
																	<div class="wizard-form-error"></div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<?php 
																	if($getSalaryBreakDown[6]['perc']>0 && $getSalaryBreakDown[6]['fixedAmount']>0)
																	{
																		?>
																		<div class="wizard-form-radio">
																			<input name="foodValOptn" onclick="fuelAClick('1','<?=$getSalaryBreakDown[6]['perc'];?>');" id="foodValOp1" type="radio" value="<?=$getSalaryBreakDown[6]['perc'];?>">
																			<label for="foodValOp1">Percentage: <strong><?=$getSalaryBreakDown[6]['perc'];?>%</strong></label>
																		</div>
																		<div class="wizard-form-radio">
																			<input name="foodValOptn" id="foodValOp1" onclick="fuelAClick('2','<?=$getSalaryBreakDown[6]['fixedAmount'];?>');"  type="radio" value="<?=$getSalaryBreakDown[6]['fixedAmount'];?>">
																			<label for="foodValOp1">Fixed Amount: <strong><?=$getSalaryBreakDown[6]['fixedAmount'];?></strong></label>
																		</div>
																		<?php
																	}
																	else if($getSalaryBreakDown[6]['perc']>0)
																	{
																		?>
																		<span><?=$getSalaryBreakDown[6]['perc'];?>% of Basic Salary</span>
																		<script type="text/javascript">callBasicSalPercentage('1','<?=$getSalaryBreakDown[6]['perc'];?>','Allowance');</script>
																		<?php
																	}
																	else if($getSalaryBreakDown[6]['fixedAmount']>0)
																	{
																		?>
																		<span>Fixed: <?=$getSalaryBreakDown[6]['fixedAmount'];?>AED</span>
																		<script type="text/javascript">autoSubmVal('2','<?=$getSalaryBreakDown[6]['fixedAmount'];?>','foodAllowance');</script>
																		<?php
																	}
																	?>
																	<div class="form-check custom-checkbox mb-3 checkbox-danger">
																			<input name="companyFood" id="companyFood"  <?php if($applicantDetails['fuel']==true){ ?>checked<?php } ?> type="checkbox" value="1" class="form-check-input">
																			<label for="radio2">Company Food</label>
																		</div>
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
																<span id="taskAllowanceMessage" class="text-danger"></span>
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
                                  <?php
                                  foreach($screening as $screen)
                                  {
                                  	?>
                                  	<div class="form-check mb-2">
                                      <input type="checkbox" class="form-check-input wizard-required" name="screen<?=$screen['screeningStepID'];?>" id="check<?=$screen['screeningStepID'];?>" <?php if($screen['screenStepReply']==1){ ?> checked <?php } ?> value="1">
                                      <label class="form-check-label" for="check1"><?=$screen['screeningStepDesc'];?></label>
                                      <input type="hidden" value="<?=$screen['screeningStepDesc'];?>" name="screen<?=$screen['screeningStepID'];?>Val">
                                    </div>
                                  	<?php
                                  }
                                  ?>
                                </div>
															</div>
														</div>
														<div class="form-group clearfix">
															<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
															<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
														</div>
													</fieldset>

													<fieldset class="wizard-fieldset">
														<h5>Offer Acceptance Date</h5>
														<div class="col-lg-4">
															<div class="row">
																<div class="form-group  focus-input">
																	<input type="date" class="form-control wizard-required" id="joiningDate" name="joiningDate" value="<?=date("Y-m-d",strtotime($applicantDetails['joningDate']));?>">
																	<label for="username" class="wizard-form-text-label">Offer Acceptance Date*</label>
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
															<div class="row mt-5">
																<!-- <button type="submit" class="btn btn-warning btn-sm" name="sendAproval" value="2"> Update Approval <span class="btn-icon-end"><i class="fa fa-envelope"></i></span></button> -->
															</div>
														</div>
														<div class="form-group clearfix">
															<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
															<?php
															if($applicantDetails['proposalStatus']==1 || $applicantDetails['proposalStatus']==4)
															{
																?>
																<button type="submit" class="form-wizard-submit float-right">Send For Aproval</button>
																<?php
															}
															?>
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
				calculateBaseSalary();
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

			//TRA
			$('#companyTransport').click(function(){
				if($(this).prop("checked") == true){
					$('#transportAllownace').val('0');	
				}
				else
				{
					autoSubmVal('2','<?=$getSalaryBreakDown[2]['fixedAmount'];?>','transportAllownace');
				}
			});
			if($('#companyTransport').prop("checked") == true){
				$('#transportAllownace').val('0');	
			}
			else
			{
				autoSubmVal('2','<?=$getSalaryBreakDown[2]['fixedAmount'];?>','transportAllownace');
			}

			//HRA
			$('#companyAccomodation').click(function(){
				if($(this).prop("checked") == true){
					$('#homeRentAllownace').val('0');	
				}
				else
				{
					autoSubmVal('2','<?=$getSalaryBreakDown[1]['fixedAmount'];?>','homeRentAllownace')
				}
			});
			if($('#companyAccomodation').prop("checked") == true){
				$('#homeRentAllownace').val('0');	
			}
			else
			{
				autoSubmVal('2','<?=$getSalaryBreakDown[1]['fixedAmount'];?>','homeRentAllownace')
			}

			//FUEL
			$('#companyFuel').click(function(){
				if($(this).prop("checked") == true){
					$('#fuelAllownace').val('0');	
				}
				else
				{
					autoSubmVal('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>','fuelAllownace');
				}
			});

			if($('#companyFuel').prop("checked") == true){
				$('#fuelAllownace').val('0');	
			}
			else
			{
				autoSubmVal('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>','fuelAllownace');
			}

			//FOOD
			$('#companyFood').click(function(){
				if($(this).prop("checked") == true){
					$('#foodAllowance').val('0');	
				}
				else
				{
					autoSubmVal('2','<?=$getSalaryBreakDown[6]['fixedAmount'];?>','foodAllowance');
				}
			});

			if($('#companyFood').prop("checked") == true){
				$('#foodAllowance').val('0');	
			}
			else
			{
				autoSubmVal('2','<?=$getSalaryBreakDown[6]['fixedAmount'];?>','foodAllowance');
			}
		});

		function calculateBaseSalary()
		{
			var totalSal = $('#totalSalary').val();
			var callBasicSalPercentage = '<?=$applicantDetails['basicPerc'];?>';
			$('#basicSalary').val(percentage(totalSal, callBasicSalPercentage));
		}

		function calculateBalance()
		{
			var totalSal = $('#totalSalary').val();
			var basicSal = $('#basicSalary').val();
			var homeRentAllownace = $('#homeRentAllownace').val();
			var transportAllownace = $('#transportAllownace').val();
			var taskAllowance = $('#taskAllowance').val();
			var mobileAllowance = $('#mobileAllowance').val();
			var fuelAllowance = $('#fuelAllowance').val();
			var foodAllowance = $('#foodAllowance').val();
			$('#agreedTotal').html($('#totalSalary').val());
			var totalSalBreakCal = Number(basicSal)+Number(homeRentAllownace)+Number(transportAllownace)+Number(taskAllowance)+Number(mobileAllowance)+Number(fuelAllowance)+Number(foodAllowance);
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

		function calculateBalanceSubmit()
		{
			var totalSal = $('#totalSalary').val();
			var basicSal = $('#basicSalary').val();
			var homeRentAllownace = $('#homeRentAllownace').val();
			var transportAllownace = $('#transportAllownace').val();
			var taskAllowance = $('#taskAllowance').val();
			var mobileAllowance = $('#mobileAllowance').val();
			var fuelAllowance = $('#fuelAllowance').val();
			var foodAllowance = $('#foodAllowance').val();
			
			var totalSalBreakCal = Number(basicSal)+Number(homeRentAllownace)+Number(transportAllownace)+Number(taskAllowance)+Number(mobileAllowance)+Number(fuelAllowance)+Number(foodAllowance);
			
			var totlBalnce = Number(totalSal)-Number(totalSalBreakCal);
			if(totlBalnce==0)
			{
				var valTotbal = totlBalnce;
			}
			else
			{
				var valTotbal = totlBalnce;

			}
			return valTotbal;
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
		else if($getSalaryBreakDown[5]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>','fuelAllowance');
			<?php
		}
		else if($getSalaryBreakDown[6]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>','foodAllowance');
			<?php
		}
		?>

		function basicClick(type,val)
		{
			var totalSal = $('#totalSalary').val();
			if(totalSal=='')
			{
				$('input[name="basiccheck"]:checked').prop("checked", false)
				//$(this).prop("checked", false);
				$('#totalSalary').focus();
			}
			else
			{
				$('#basicSalary').focus();
				if(type==1)
				{
					var totalSalary = $('#totalSalary').val();
					$('#basicSalary').val(percentage(totalSalary, val));
					$('#basicSalary').focus();
				}
				else if(type==2)
				{
					$('#basicSalary').val(val);
					$('#basicSalary').focus();
				}
			}
			calculateBalance();
		}

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
					var taskAllowance = $('#taskAllowance').val();
					var basicSal = $('#basicSalary').val();
					basicSalTask = Number(basicSal)+Number(taskAllowance);
					var splitval = val.split("-");

					$('#homeRentAllownace').val(percentage(splitval[1], splitval[0]));
					$('#transportAllownace').focus();
				}
				else if(type==2)
				{
					$('#homeRentAllownace').val(val);
					$('#transportAllownace').focus();
				}
				else if(type==3)
				{
					$('#homeRentAllownace').val('0');
					$('#transportAllownace').focus();
				}
			}
			calculateBalance();
		}

		function taskAClick(type,val)
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

		function traAClick(type,val)
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
					$('#transportAllownace').val(percentage(basicSal, val));
					$('#transportAllownace').focus();
				}
				else if(type==2)
				{
					$('#transportAllownace').val(val);
					$('#transportAllownace').focus();
				}
				else if(type==3)
				{
					if ($("#radiocheckCompTra").is(":checked")) {
						$('#transportAllownace').val('0');
					}
					else
					{
						$('#transportAllownace').val('<?=$applicantDetails['transportAllow'];?>');	
					}
					$('#transportAllownace').focus();
				}
			}
			calculateBalance();
		}

		function maClick(type,val)
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

					/*if(jQuery('#totalSalary').val()>=minTotalSal && jQuery('#totalSalary').val()<=maxTotalSal)
					{
						jQuery('#totalSalary').siblings(".wizard-form-error").slideUp();
					}
					else
					{
						jQuery('#totalSalary').siblings(".wizard-form-error").slideDown();
						nextWizardStep = false;
					}*/
					
					/*if(jQuery('#basicSalary').val()>=minbasicSal && jQuery('#basicSalary').val()<=maxbasicSal)
					{
						jQuery('#basicSalary').siblings(".wizard-form-error").slideUp();
					}
					else
					{
						jQuery('#basicSalary').siblings(".wizard-form-error").slideDown();
						nextWizardStep = false;
					}*/

					if(calculateBalanceSubmit()!=0)
					{
						jQuery('#taskAllowance').siblings(".wizard-form-error").slideDown();
						jQuery('#taskAllowanceMessage').html('Balance '+calculateBalanceSubmit()+' is available..!');
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
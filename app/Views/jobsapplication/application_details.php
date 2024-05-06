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
	<title>BHG HRM::Jobs applicant</title>
	
	<!-- FAVICONS ICON -->
	<?=view('common/favicon');?>
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/datatables/css/jquery.dataTables.min.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css" rel="stylesheet');?>">
	
	<?=view('common/styles');?>
	<style type="text/css">
		input:active, input:focus {
            /* Remove that really annoying blue border
            that you only see when you don't want to */
            outline:none;
        }

        input[type="checkbox"] {
            font-weight:bold;
            margin-top:1em;
            padding:1em 10px;
            width:100px;
            background: #FFF;
            color:#DBDCDE;
            -webkit-appearance:none;
            position:relative;
            box-shadow:rgba(0,0,0,.3) 0 5px 4px 1px;
        }

        input[type="checkbox"]:after {
            -webkit-transition: all 300ms ease-out;
            -moz-transition: all 300ms ease-out;
            -ms-transition: all 300ms ease-out;
            -o-transition: all 300ms ease-out;
            transition: all 300ms ease-out;
            content: "No";
            position:absolute;
            height:100%;
            line-height:calc(1.5em + 6px);
            background: #223969 ;
            text-align:center;
            right:10px;
            top:0px;
            width:40%;
            box-shadow:rgba(0,0,0,.5) 0 0 3px;
            color: #FFF;
        }

        input[type="checkbox"]:checked:after {
            content: "Yes";
            right:calc(60% - 2px - 1em);
        }

        input[type="checkbox"]:before {
            -webkit-transition: all 300ms ease-out;
            -moz-transition: all 300ms ease-out;
            -ms-transition: all 300ms ease-out;
            -o-transition: all 300ms ease-out;
            transition: all 300ms ease-out;
            content: "Yes";
            position:absolute;
            height:100%;
            top:3px;
            right:calc(60% - 10px);
            width:40%;
            text-align:center;
            color: #b6b6b7;
        }

        input[type="checkbox"]:checked:before {
            content: "No";
            right:10px;
        }

        input[type="checkbox"].inactive:after {
            background:#223969;
        }

        input[type='checkbox'].ownline {
            width:100%;
            display:block;
        }
        .display-unset
        {
        	display: unset !important;
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
                                Applicant Details
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
					<h4 class="fs-20 font-w600 mb-0 me-auto">Applicant Profile</h4>

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
					<div class="col-xl-6">
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
												<a href="<?=$applicantDetails['cvUrl'];?>" target="_blank" class="text-dark"><i class="fas fa-download me-2"></i>Download Resume</a>
											</span>
											
										</div>
									</div>
								</div>
								
							</div>
							<div class="card-body pt-0">
								<h4 class="fs-20">Applicant Details</h4>
								<div class="row">
									<div class="col-xl-12 col-md-12">
										<?php //echo '<pre>'; print_r($applicantDetails); echo '</pre>'; ?>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Full Name : </span><span class="font-w400"><?=$applicantDetails['applicantName'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Email : </span><span class="font-w400"><?=$applicantDetails['email'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Contact Number : </span><span class="font-w400"><?=$applicantDetails['mobile'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Gender : </span><span class="font-w400"><?=$applicantDetails['genderDesc'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Age : </span><span class="font-w400"><?=$applicantDetails['age'];?></span></p>
									</div>
									
								</div>
								<h4 class="mt-2 fs-20">Job Details</h4>
								<div class="row">
									<div class="col-xl-12 col-md-12">
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Company Name : </span><span class="font-w400"><?=$applicantDetails['companyName'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Job Title : </span><span class="font-w400"><?=$applicantDetails['jobTitle'];?></span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Position : </span><span class="font-w400"><?=$applicantDetails['roleName'];?></span></p>

										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Current Status : </span><span class="font-w400">
											<?php
											if($applicantDetails['applicationStatus']==6)
											{
												?>
												<a href="javascript:void(0)" class="badge badge-rounded badge-outline-success"><?=$applicantDetails['currentStatus'];?></a>
												<?php
											}
											else
											{
												?>
												<a href="javascript:void(0)" class="badge badge-rounded badge-outline-warning"><?=$applicantDetails['currentStatus'];?></a>
												<?php
											}
											?></span></p>
										<!-- badge badge-rounded badge-outline-success -->
										<?php //echo '<pre>'; print_r($applicantDetails);echo '</pre>';?>


									</div>
								</div>
								<div class="row mt-2">
									<div class="col-xl-12 col-md-12">
										<div class="accordion accordion-header-shadow accordion-rounded" id="accordion-ten">
											<div class="accordion-item">
												<div class="accordion-header rounded-lg" id="accord-10One" data-bs-toggle="collapse" data-bs-target="#collapse10One" aria-controls="collapse10One" aria-expanded="true" role="button">
													<span class="accordion-header-icon"></span>
													<span class="accordion-header-text text-primary">Schedule Interview</span>
													<span class="accordion-header-indicator"></span>
												</div>
												<div id="collapse10One" class="accordion__body collapse show" aria-labelledby="accord-10One" data-bs-parent="#accordion-ten" style="">
													<div class="accordion-body-text">
														<?= form_open('schedule-interview/'.$applicantDetails['applicationId'],array("autocomplete"=>"off")); ?>
														<?= csrf_field() ?>
														<?php //echo '<pre>'; print_r($applicantDetails); echo '</pre>'; ?>
														<input type="hidden" value="<?=$applicantDetails['email']?>" name="toEmail">
														<input type="hidden" value="<?=$applicantDetails['companyName']?>" name="companyName">
														<input type="hidden" value="<?=$applicantDetails["jobTitle"];?>" name="jobTitle">
														<input type="hidden" value="<?=$applicantDetails["applicantName"];?>" name="applicantName">

														<div class="form-group">
															<label class="form-label">Date and time</label>
															<input required type="datetime-local" name="schedule_date_time" id="schedule_date_time" class="form-control solid" />
														</div>
														
														<div class="mt-4 form-group">
															<label class="form-label">Interview With</label>
															<input required type="text" name="interviewWith" id="interviewWith" class="form-control" />
														</div>
														
														<div class="hideEmail mt-4 form-group">
															<label class="form-label">CC Email: <small>(multiple email separated by ,)</small></label>
															<input type="text" id="ccEmail" name="ccEmail" class="form-control" />
														</div>
														<div class="hideEmail mt-4 form-group">
															<label class="form-label">Email Message: </label>
															<textarea class="form-control" name="mailBody" id="editorText" style="height: 200px;">After reviewing your application, we have decided to select you for the next round. I am thrilled to invite you for a job interview at our office so that we can get to know you better.</textarea>
															
														</div>
														<div class="">
															<h4>Email Body</h4>
															<span id="emailBody">Dear <?=$applicantDetails["applicantName"];?>,<br><br>Thank you once again for applying to <b><?=$applicantDetails['companyName'];?></b> for <b><?=$applicantDetails["jobTitle"];?></b> position.<br><span id="emailBodyVal">After reviewing your application, we have decided to select you for the next round. I am thrilled to invite you for a job interview at our office so that we can get to know you better.</span><br><br>Interviewers is: <b><span id="interviewWithName"></span></b><br>Interview timing: <b><span id="interviewDateTime"></span></b><br><br>Please be on time for the interview and let us if you are ready to attend the interview.<br>Looking forward to hear back from you soon..!</span>
														</div>



														<button class="mt-2 float-right btn btn-primary btn-sm mt-1" type="submit">Save & Submit</button>


															
														<?=form_close();?>
													</div>
												</div>
											</div>
											
											
										</div>

									</div>
								</div>
							</div>
							<div class="card-footer d-flex flex-wrap justify-content-between">
								<div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Application History</h4>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_TimeLine11" class="widget-timeline dlab-scroll style-1 height470 ps ps--active-y">
                                	<?php //echo '<pre>'; print_r($history);echo '</pre>'; ?>
                                    <ul class="timeline">
                                    	<?php
                                    	//echo '<pre>'; print_r($schedule); echo '</pre>';
                                    	
                                    	foreach($history as $histVal)
                                    	{
                                    		//echo '<pre>'; print_r($histVal); echo '</pre>';exit;
                                    		switch($histVal['mid'])
                                    		{
                                    			case 2:$pannelCole = 'info';break;
                                    			case 3:$pannelCole = 'danger';break;
                                    			case 4:$pannelCole = 'primary';break;
                                    			case 5:$pannelCole = 'warning';break;
                                    			case 6:$pannelCole = 'success';break;
                                    			default:$pannelCole = 'warning';break;
                                    		}
                                    		
                                    		?>
	                                    	<li>
	                                            <div class="timeline-badge <?=$pannelCole;?>"></div>
	                                            <a class="timeline-panel text-muted" href="#">
	                                            	<?php if($histVal['loggedOn']!=''){ ?>
	                                                <span><?=timeago($histVal['loggedOn']);?></span>
	                                            <?php } ?>
	                                                <h6 class="mb-0"><?=$histVal['history'];?> </h6>
	                                                <?php if($histVal['mid']==4)
		                                            {
		                                            	?>
		                                            	<p>Interview Schedule Time: <span class="text-dark display-unset"><?=date("dS M Y H:i A",strtotime($histVal['scheduledTime'])); ?></span></p>
		                                            	<p>Interview with: <span class="text-dark display-unset"><?=$histVal['interviewWith']; ?></span></p>
		                                            	<h5>Email Details</h5>
		                                            	<p>Email to: <span class="text-dark display-unset"><?=$histVal['toEmail']; ?></span><br>
		                                            	<?php 
		                                            	if($histVal['ccEmail'])
		                                            	{
		                                            		?>
		                                            	CC Email: <span class="text-dark display-unset"><?=$histVal['ccEmail']; ?></span><br>
		                                            		<?php
		                                            	}
		                                            	if($histVal['bccEmail']){
		                                            		?>
		                                            	BCC Email: <span class="text-dark display-unset"><?=$histVal['bccEmail']; ?></span><br>
			                                            	<?php
			                                            }
			                                            if($histVal['mailBody']){
		                                            		?>
		                                            	Email Body: <span class="text-dark display-unset"><?=$histVal['mailBody']; ?></span><br>
			                                            	<?php
			                                            }
			                                            ?>
			                                            </p>

		                                            	<div class="accordion-item">
															<div class="accordion-header rounded-lg collapsed" id="accord-10Two" data-bs-toggle="collapse" data-bs-target="#collapse10Two" aria-controls="collapse10Two" aria-expanded="false" role="button" style="border: 0.0625rem solid #315799;">
																<span class="accordion-header-icon"></span>
																<span class="accordion-header-text text-danger"><b>Interview Result</b></span>
																<span class="accordion-header-indicator"></span>
															</div>
															<div id="collapse10Two" class="accordion__body collapse" aria-labelledby="accord-10Two" data-bs-parent="#accordion-ten" style="">
																<div class="accordion-body-text">
																	<?= form_open('interview-result/'.$applicantDetails['applicationId'],array("autocomplete"=>"off")); ?>
																	<?= csrf_field() ?>
																	<div class="form-group">
																			<div class="form-check custom-checkbox mb-3 checkbox-success check-xl">
																				<input type="radio" class="form-check-input"  id="customCheckBox9" required="" name="chkinterviewResult" value="6">
																				<label class="form-check-label" for="customCheckBox9">Selected</label>
																			</div>
																			<div class="form-check custom-checkbox mb-3 checkbox-danger check-xl">
																				<input type="radio" class="form-check-input"  id="customCheckBox9" required="" name="chkinterviewResult" value="7">
																				<label class="form-check-label" for="customCheckBox9">Not Selected</label>
																			</div>
																			<div class="form-check custom-checkbox mb-3 checkbox-warning check-xl">
																				<input type="radio" class="form-check-input"  id="customCheckBox9" required="" name="chkinterviewResult" value="5">
																				<label class="form-check-label" for="customCheckBox9">Waiting</label>
																			</div>
																		</div>
																		<div class="hideEmail mt-4 form-group">
																			<label class="form-label">Comment: </label>
																			<textarea class="form-control" name="comments" id="editorText" style="height: 200px;"></textarea>
																			
																		</div>
																		<button class="float-right btn btn-primary btn-sm mt-1" type="submit">Save & Submit</button>
																		
																	<?=form_close();?>
																</div>
															</div>
														</div>
		                                            	
		                                            	<?php
		                                            }
		                                            else
		                                            {
		                                            	?>
		                                            	<p>Comments: <?=$histVal['comments']; ?></p>
		                                            	<?php
		                                            }
		                                            ?>
	                                                <small class="mb-0">Change by: <?=$histVal['loggedBy'];?></small>
	                                            </a>
	                                            
	                                        </li>
                                    		<?php
                                    	}
                                    	function timeago($time, $tense='ago') {
										    // declaring periods as static function var for future use
										    static $periods = array('year', 'month', 'day', 'hour', 'minute', 'second');

										    // checking time format
										    if(!(strtotime($time)>0)) {
										        return trigger_error("Wrong time format: '$time'", E_USER_ERROR);
										    }

										    // getting diff between now and time
										    $now  = new DateTime('now');
										    $time = new DateTime($time);
										    $diff = $now->diff($time)->format('%y %m %d %h %i %s');
										    // combining diff with periods
										    $diff = explode(' ', $diff);
										    $diff = array_combine($periods, $diff);
										    // filtering zero periods from diff
										    $diff = array_filter($diff);
										    // getting first period and value
										    $period = key($diff);
										    $value  = current($diff);

										    // if input time was equal now, value will be 0, so checking it
										    if(!$value) {
										        $period = 'seconds';
										        $value  = 0;
										    } else {
										        // converting days to weeks
										        if($period=='day' && $value>=7) {
										            $period = 'week';
										            $value  = floor($value/7);
										        }
										        // adding 's' to period for human readability
										        if($value>1) {
										            $period .= 's';
										        }
										    }

										    // returning timeago
										    return "$value $period $tense";
										}
                                    	?>
                                        
                                    </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: -126px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 126px; height: 370px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 94px; height: 276px;"></div></div></div>
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
	
	
	<!-- Apex Chart -->
	<script src="<?=base_url('assets/vendor/apexchart/apexchart.js');?>"></script>
	
	
	<!-- <script src="<?=base_url('assets/vendor/popper/popper.min.js');?>"></script>
	<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script> -->
	
	<!-- Chart piety plugin files -->
   <script src="<?=base_url('assets/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
   <script src="<?=base_url('assets/js/plugins-init/datatables.init.js');?>"></script>
   <script src="<?=base_url('assets/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js');?>"></script>
	
		<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

	
	
    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dlabnav-init.js');?>"></script>
	
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>	
	<script>
	 $(".form_datetime").datepicker({format: 'yyyy-mm-dd'});
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl)
	})

	$(document).ready(function(){

		$('#schedule_date_time').blur(function(){
			var inputval = $('#schedule_date_time').val().split("T");
			var dateval = new Date(inputval[1]+"/"+inputval[0]+"/"+inputval[2]);

			$('#interviewDateTime').html(inputval[0]+' '+inputval[1]);

		});

		$('#interviewWith').keyup(function(){
			$('#interviewWithName').html($('#interviewWith').val());
		});
		$('#editorText').keyup(function(){
			$('#emailBodyVal').html($('#editorText').val());
		});


		var checks = document.querySelectorAll("input[type='checkbox']");

		for(var i =0;i<checks.length;i++) {
			/*
			Some javascript is necessary
			just to identify when a value
			has been selected.
			*/
			var cb = checks[i];
			cb.classList.add("inactive");
			cb.onchange = (function(x){
			this.classList.remove("inactive");
			});
		}

		$('.hideEmail').show();
		

		$('#checkemailsend').click(function() {
			if($(this).is(':checked'))
			{
				$('.hideEmail').show(100);
			}
			else
			{
				$('.hideEmail').hide(100);
			}
		});
		
	});
	</script>  
</body>
</html>
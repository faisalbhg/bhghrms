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
	<title>BHG HRM::Open Jobs Applicant Details</title>
	
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
                                Open Job Applicant Details
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
					<h4 class="fs-20 font-w600 mb-0 me-auto">Open Job Applicant Profile</h4>

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
												<a href="<?=$applicantDetails['cvUrl'];?>" target="_blank" class="text-dark"><i class="fas fa-download me-2"></i>Download Ruseme</a>
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

										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Current Status : </span><span class="font-w400"><?=$applicantDetails['currentStatus'];?></span></p>


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
                        	<?php //echo '<pre>'; print_r($applicantDetails); echo '</pre>'; ?>
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Application History</h4>
                            </div>
                            <div class="card-body">

                            	<?= form_open('categorize-application/'.$applicantDetails['applicationId'],array("autocomplete"=>"off")); ?>
								<?= csrf_field() ?>
								<?php //echo '<pre>'; print_r($applicantDetails); echo '</pre>'; ?>
								<input type="hidden" value="<?=$applicantDetails['email']?>" name="toEmail">
								<input type="hidden" value="<?=$applicantDetails['companyName']?>" name="companyName">
								<input type="hidden" value="<?=$applicantDetails["jobTitle"];?>" name="jobTitle">
								<input type="hidden" value="<?=$applicantDetails["applicantName"];?>" name="applicantName">
								<div class="row">
									<div class="col-xl-6  col-md-6 mb-4">
									  <label  class="form-label font-w600">Company Name<span class="text-danger scale5 ms-2">*</span></label>
										<select  class="form-select form-control" name="companyId" id="selectCompany" >
											<option selected value="0">Choose...</option>
											<?php
											if($companyList)
											{
												foreach($companyList as $clkey => $clvalue)
												{
													?>
													<option <?php if($applicantDetails['oCompanyID']==$clvalue['companyId']){ ?> selected <?php } ?> value="<?=$clvalue['companyId'];?>"><?=$clvalue['companyName'];?></option>
													<?php
												}
											}
											?>
										</select>

									</div>
									<div class="col-xl-6  col-md-6 mb-4" id="divisionResponse">
										<?php
											if($divisions)
											{
												?>
										<label  class="form-label font-w600">Divisions<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="divisionID" id="divisionID">
												<option selected value="0">Choose...</option>
												<?php
												if($divisions)
												{
													foreach($divisions as $dvkkey => $division)
													{
													  	?>
													  	<option <?php if($applicantDetails['oDivisionID']==$division['divisionId']){ ?> selected <?php } ?> value="<?=$division['divisionId'];?>"><?=$division['divisionName'];?></option>
													  	<?php
													}
												}
												?>
											</select>
										<?php }
										?>
											
									</div>
									<div class="col-xl-6  col-md-6 mb-4" id="departmentDataResponse">
									  <?php
												if($departmentList)
												{
													?>
										<label  class="form-label font-w600">Department<span class="text-danger scale5 ms-2">*</span></label>
											<select onchange="getGradeList();"  class="form-select form-control" name="departmentID" id="department">
												<option selected value="0">Choose...</option>
												<?php
												if($departmentList)
												{
													foreach($departmentList as $dlkkey => $dlvalue)
													{
													  	?>
													  	<option <?php if($applicantDetails['oDepartmentID']==$dlvalue['departmentId']){ ?> selected <?php } ?> value="<?=$dlvalue['departmentId'];?>"><?=$dlvalue['departmentName'];?></option>
													  	<?php
													}
												}
												?>
											</select>
										<?php }
												?>
											
									</div>
									<div class="col-xl-6  col-md-6 mb-4" id="positionResponse">
										<?php
												if($positionList)
												{
													?>
									  <label  class="form-label font-w600">Positions<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="positionID" id="positionID">
												<option selected value="0">Choose...</option>
												<?php
												if($positionList)
												{
													foreach($positionList as $pstkkey => $position)
													{
													  	?>
													  	<option <?php if($applicantDetails['oRoleID']==$position['roleId']){ ?> selected <?php } ?> value="<?=$position['roleId'];?>"><?=$position['roleName'];?></option>
													  	<?php
													}
												}
												?>
											</select>
											<?php }
												?>
											
									</div>
									<div class="col-xl-6  col-md-6 mb-4" id="positionGradeDataResponse">
									  <div class="col-xl-6  col-md-6 mb-4">
										<?php
										foreach($gradeList as $gradeVal)
										{
											?>
											<div class="form-check custom-checkbox mb-3">
												<input type="radio" class="form-check-input clickGrade" id="gradeVal<?=$gradeVal['gradeID'];?>" name="gradeSelect" value="<?=$gradeVal['gradeID'];?>" <?php if($applicantDetails['oGradeID']==$gradeVal['gradeID']){ ?> checked <?php } ?> required="">
												<label class="form-check-label" for="customCheckBox1"><?=$gradeVal['gradeName'];?></label>
											</div>
											<?php
										}
										?>
										
									</div>

									
									</div>
									<div class="col-xl-6  col-md-6 mb-4" id="budgetDataResponse">
									  	<?php
										if($positionData)
										{
											?>
											<label  class="form-label font-w600">Job Position Details</label>
											<div class="col-sm-12 " style="background:#f8f8f8; border: 0.0625rem solid #dededf;padding: 0.3125rem 1.25rem;color: #6e6e6e;border-radius: 1rem;">
												
												<p><label class="form-label font-w600">Company: </label> <?=$positionData['companyName'];?></p>
												<!-- <p><label class="form-label font-w600">Position: </label> <?=$positionData['roleName'];?></p> -->
												<p><label class="form-label font-w600">Grade: </label> <?=$positionData['gradeName'];?></p>
												<p><label class="form-label font-w600">Salary: </label> <?=$positionData['salaryFrom'];?>-<?=$positionData['salaryTo'];?></p>
											</div>
											<?php
										}
										?>

									</div>
									<!-- <div class="col-xl-6  col-md-6 mb-4">
										<span>Show Salary:<label class="radio-inline mx-3"><input type="radio" checked name="showsalary"> Active</label></span>
										<span><label class="radio-inline me-3"><input type="radio" name="showsalary"> In Active</label></span>
									</div> -->
								</div>
								



								<button class="mt-2 float-right btn btn-primary btn-sm mt-1" type="submit">Save & Submit</button>


									
								<?=form_close();?>
                               
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

    <script type="text/javascript">
		$(document).ready(function(){

			$('#selectCompany').change(function(){
				$.ajax({
					url: "<?=base_url('get-divisions');?>",
					type: "get",
					data: {'companyId':$('#selectCompany').val()} ,
					success: function (dprtmntResponse) {
					console.log(dprtmntResponse);
					$('#divisionResponse').html(dprtmntResponse.divisionsData);
					$('#departmentDataResponse').html('');
					$('#positionResponse').html('');
					$('#positionDataResponse').html('');
					$('#budgetDataResponse').html();

					// You will get response from your PHP page (what you echo or print)
					},
					error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
					}
				});
				

			});
		});
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

		$('#divisionID').change(function()
		{
			$.ajax({
				url: "<?=base_url('get-department');?>",
				type: "get",
				data: {'comapnyId':$('#selectCompany').val(),'divisionId':$('#divisionID').val()} ,
				success: function (departmentResponse) {
					console.log(departmentResponse);
					$('#departmentDataResponse').html(departmentResponse.departmentListData);
				//$('#salaryResponse').html(positionsResponse.salaryData);

				// You will get response from your PHP page (what you echo or print)
				},
				error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				}
			});
		});
		$('#positionID').change(function()
		{
			$.ajax({
				url: "<?=base_url('get-grade-position');?>",
				type: "get",
				data: {'comapnyId':$('#selectCompany').val(),'positionID':$('#positionID').val()} ,
				success: function (gradeResponse) {
					console.log(gradeResponse);
					$('#positionGradeDataResponse').html(gradeResponse.gradeSelectVal);
				//$('#salaryResponse').html(positionsResponse.salaryData);

				// You will get response from your PHP page (what you echo or print)
				},
				error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				}
			});
		});

		$('.clickGrade').click(function()
		{
			var selectedGrade = $('input[name="gradeSelect"]:checked').val();
			//alert(selectedGrade);

			$.ajax({
				url: "<?=base_url('positions-data');?>",
				type: "get",
				data: {'gradeID':selectedGrade} ,
				success: function (budgetResponse) {
					console.log(budgetResponse);
					$('#budgetDataResponse').html(budgetResponse.BudgetDetailsData);
				//$('#salaryResponse').html(positionsResponse.salaryData);

				// You will get response from your PHP page (what you echo or print)
				},
				error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				}
			});
		});
	});
	</script>  

	<script type="text/javascript">
		function getGradeList()
		{
			$.ajax({
				url: "<?=base_url('get-position-grade');?>",
				type: "get",
				data: {'comapnyId':$('#selectCompany').val(),'deptId':$('#department').val(),'page':'job'} ,
				success: function (gradeResponse) {
				console.log(gradeResponse);
				$('#positionResponse').html(gradeResponse.positionData);
				//$('#salaryResponse').html(positionsResponse.salaryData);

				// You will get response from your PHP page (what you echo or print)
				},
				error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				}
			});
		}
	</script>



	
</body>
</html>
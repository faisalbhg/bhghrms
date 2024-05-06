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
	<title>BHG HRMS::Create Job</title>
	
	<?=view('common/favicon');?>
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/datatables/css/jquery.dataTables.min.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css');?>" rel="stylesheet">
	
	<?=view('common/styles');?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
	
	
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
                                New Job
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
					<h4 class="fs-20 font-w600 mb-0 me-auto">New Job</h4>
					
				</div>
				<div class="row">
					<div class="col-xl-12">
						<?php if (isset($validation)) : ?>
                                <div class="alert alert-primary alert-dismissible alert-alt fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                    <strong>Error!</strong> <?= $validation->listErrors() ?>
                                </div>
                                
                            <?php endif; ?>
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
						<div class="card">
							
                            <?php //echo '<pre>'; print_R($job);echo '</pre>'; ?>
                            <?= form_open('edit-job/'.$job['jobId'],array("autocomplete"=>"off")); ?>
                                <?= csrf_field() ?>
								<div class="card-body">
									<div class="row">
										<div class="col-xl-6  col-md-6 mb-4">
										  <label  class="form-label font-w600">Company Name<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="companyId" id="selectCompany" >
												<option value="0">Choose...</option>
												<?php
												if($companyList)
												{
													foreach($companyList as $clkey => $clvalue)
													{
														?>
														<option <?php if($clvalue['companyId']==$job['companyId']){ ?> selected <?php } ?> value="<?=$clvalue['companyId'];?>"><?=$clvalue['companyName'];?></option>
														<?php
													}
												}
												?>
											</select>

										</div>
										<div class="col-xl-6  col-md-6 mb-4" id="divisionResponse">
											<label  class="form-label font-w600">Divisions<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="divisionID" id="divisionID">
												<option selected value="0">Choose...</option>
												<?php
												if($divisions)
												{
													foreach($divisions as $dvkkey => $division)
													{
													  	?>
													  	<option <?php if($division['divisionId']==$job['divisionId']){ ?> selected <?php } ?> value="<?=$division['divisionId'];?>"><?=$division['divisionName'];?></option>
													  	<?php
													}
												}
												?>
											</select>
											
										</div>

										<div class="col-xl-6  col-md-6 mb-4" id="departmentDataResponse">
										  <label  class="form-label font-w600">Department<span class="text-danger scale5 ms-2">*</span></label>
											<select onchange="getGradeList();"  class="form-select form-control" name="departmentID" id="department">
												<option selected value="0">Choose...</option>
												<?php
												if($departmentList)
												{
													foreach($departmentList as $dlkkey => $dlvalue)
													{
													  	?>
													  	<option <?php if($dlvalue['departmentId']==$job['deptId']){ ?> selected <?php } ?> value="<?=$dlvalue['departmentId'];?>"><?=$dlvalue['departmentName'];?></option>
													  	<?php
													}
												}
												?>
											</select>
											

										</div>
										<div class="col-xl-6  col-md-6 mb-4" id="positionResponse">
											<label  class="form-label font-w600">Positions<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="positionID" id="positionID">
												<option selected value="0">Choose...</option>
												<?php
												if($positionList)
												{
													foreach($positionList as $pstkkey => $position)
													{
													  	?>
													  	<option <?php if($position['roleId']==$job['roleId']){ ?> selected <?php } ?> value="<?=$position['roleId'];?>"><?=$position['roleName'];?></option>
													  	<?php
													}
												}
												?>
											</select>
											
										  
										</div>
										<div class="col-xl-6  col-md-6 mb-4" id="positionGradeDataResponse">
											<div class="col-xl-6  col-md-6 mb-4">
											<?php
											foreach($gradeList as $gradeVal)
											{
												?>
												<div class="form-check custom-checkbox mb-3">
													<input <?php if($gradeVal['gradeID']==$job['grade']){ ?> checked <?php } ?>  type="radio" class="form-check-input clickGrade" id="gradeVal<?=$gradeVal['gradeID'];?>" name="gradeSelect" value="<?=$gradeVal['gradeID'];?>" required="">
													<label class="form-check-label" for="customCheckBox1"><?=$gradeVal['gradeName'];?></label>
												</div>
												<?php
											}
											?>
											
										</div>

										
										</div>
										<div class="col-xl-6  col-md-6 mb-4" id="budgetDataResponse">
											
											<label  class="form-label font-w600">Job Position Details</label>
											<div class="col-sm-12 " style="background:#f8f8f8; border: 0.0625rem solid #dededf;padding: 0.3125rem 1.25rem;color: #6e6e6e;border-radius: 1rem;">
												<p><label class="form-label font-w600">Company: </label> <?=$job['companyName'];?></p>
												<p><label class="form-label font-w600">Grade: </label> <?=$job['gradeName'];?></p>
												<p><label class="form-label font-w600">Salary: </label> <?=$job['salaryFrom'];?>-<?=$job['salaryTo'];?></p>
											</div>job


										  
										</div>
										<!-- <div class="col-xl-6  col-md-6 mb-4">
											<span>Show Salary:<label class="radio-inline mx-3"><input type="radio" checked name="showsalary"> Active</label></span>
											<span><label class="radio-inline me-3"><input type="radio" name="showsalary"> In Active</label></span>
										</div> -->
									</div>

									<div class="row">
										<?php //echo '<pre>'; print_r($job); echo '</pre>'; ?>
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Recruitment Type<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="recruitmentType" id="recruitmentType" required>
											  <option selected value="">Choose...</option>
											  <option <?php if($job['recruitmentType']==1){ ?> selected <?php } ?> value="1">New</option>
											   <option <?php if($job['recruitmentType']==2){ ?> selected <?php } ?> value="2">Replacement</option>
											</select>
										</div>
										<div class="col-xl-6  col-md-6 mb-4 replacementDiv" <?php if($job['recruitmentType']==1){ ?>style="display: none;" <?php }?> >
											<label  class="form-label font-w600">Reason<span class="text-danger scale5 ms-2"></span></label>
											<textarea name="reason" class="form-control" placeholder="Reson of Replacement"><?=$job['recruitmentReason'];?></textarea>
										</div>
										<div class="col-xl-6  col-md-6 mb-4 replacementDiv" <?php if($job['recruitmentType']==1){ ?>style="display: none;" <?php }?> >
											<label  class="form-label font-w600">Employee Id<span class="text-danger scale5 ms-2"></span></label>
											<input type="text" name="employeeNumber" class="form-control" placeholder="Employee ID" value="<?=$job['replacementEmpNumber'];?>"/>
										</div>
										<div class="col-xl-6  col-md-6 mb-4 replacementDiv" <?php if($job['recruitmentType']==1){ ?>style="display: none;" <?php }?> >
											<label  class="form-label font-w600">Employee Name<span class="text-danger scale5 ms-2"></span></label>
											<input type="text" name="employeeName" class="form-control" placeholder="Employee Name" value="<?=$job['replacementEmpName'];?>" />
										</div>

										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Work Location<span class="text-danger scale5 ms-2"></span></label>
											<input type="text" name="workLocation" class="form-control" placeholder="Work Location" value="<?=$job['workLocation'];?>"/>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Job Type<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control solid" name="jobType">
											  <option selected value="">Choose...</option>
											  <option <?php if($job['jobType']==1){ ?> selected <?php } ?> value="1">Full-Time</option>
											   <option <?php if($job['jobType']==2){ ?> selected <?php } ?> value="2">Part-Time</option>
											    <option <?php if($job['jobType']==3){ ?> selected <?php } ?> value="3">Freelancer</option>
											</select>
										</div>
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Select Experience<span class="text-danger scale5 ms-2">*</span></label>
											<select class="form-control" name="experienceDetails" required>
												<option value="">-Select-</option>
												<option <?php if($job['experienceDetails']=='0-1 Years'){ ?>selected<?php } ?> value="0-1 Years">0-1 Years</option>
												<option <?php if($job['experienceDetails']=='1-2 Years'){ ?>selected<?php } ?> value="1-2 Years">1-2 Years</option>
												<option <?php if($job['experienceDetails']=='2-3 Years'){ ?>selected<?php } ?> value="2-3 Years">2-3 Years</option>
												<option <?php if($job['experienceDetails']=='3-6 Years'){ ?>selected<?php } ?> value="3-6 Years">3-6 Years</option>
												<option <?php if($job['experienceDetails']=='6-10 Years'){ ?>selected<?php } ?> value="6-10 Years">6-10 Years</option>
												<option <?php if($job['experienceDetails']=='10-More'){ ?>selected<?php } ?> value="10-More">10-More</option>
											</select>
											
										</div>
									</div>
									<div class="row" >
										<div class="col-xl-6  col-md-6 mb-4">
										  <label  class="form-label font-w600">Enter Education Level:<span class="text-danger scale5 ms-2">*</span></label>
											<select class="form-control single-select-placeholder js-states" name="qualification">
												<option value="" selected="selected" disabled="disabled">-Select-</option>
												<option <?php if($job['qualification']=='No formal education'){ ?>selected<?php } ?> value="No formal education">No formal education</option>
											    <option <?php if($job['qualification']=='High school'){ ?>selected<?php } ?> value="High school">High school</option>
											    <option <?php if($job['qualification']=='Diploma'){ ?>selected<?php } ?> value="Diploma">Diploma</option>
											    <option <?php if($job['qualification']=='Vocational qualification'){ ?>selected<?php } ?> value="Vocational qualification">Vocational qualification</option>
											    <option <?php if($job['qualification']=='Bachelors degree'){ ?>selected<?php } ?> value="Bachelors degree">Bachelor's degree</option>
											    <option <?php if($job['qualification']=='Masters degree'){ ?>selected<?php } ?> value="Masters degree">Master's degree</option>
											    <option <?php if($job['qualification']=='Doctorate or higher'){ ?>selected<?php } ?> value="Doctorate or higher">Doctorate or higher</option>
											</select>
										</div>

										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Select Gender:<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control solid" name="gender">
												<option selected value="">Choose...</option>
												<option <?php if($job['gender']==1){ ?> selected <?php } ?> value="1">Male</option>
												<option <?php if($job['gender']==2){ ?> selected <?php } ?> value="2">Female</option>
												<option <?php if($job['gender']==3){ ?> selected <?php } ?> value="3">Any</option>
											</select>
										</div>
										
										
										<div class="col-xl-6  col-md-6 mb-4">
										  <label  class="form-label font-w600">No. of Vancancy<span class="text-danger scale5 ms-2">*</span></label>
											<input type="number" class="form-control solid" placeholder="Name" name="noVacant" aria-label="name" value="<?=$job['noVacant'];?>">
										</div>
										
									</div>
									<div class="row">
										
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Posted Date<span class="text-danger scale5 ms-2">*</span></label>
											<div class="input-group">
												 <div class="input-group-text"><i class="far fa-clock"></i></div>
												<input size="16" type="text" name="postedDate" value="<?=date("Y-m-d", strtotime($job['postedDate']));?>" readonly class="form-control form_datetime solid">
											</div>
										</div>
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Last Date To Apply<span class="text-danger scale5 ms-2">*</span></label>
											<div class="input-group">
												 <div class="input-group-text"><i class="far fa-clock"></i></div>
												<input size="16" type="text" name="lastDateToApply" value="<?=date("Y-m-d", strtotime($job['lastDateToApply']));?>" readonly class="form-control form_datetime solid">
											</div>
										</div>
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Close Date<span class="text-danger scale5 ms-2">*</span></label>
											<div class="input-group">
												 <div class="input-group-text"><i class="far fa-clock"></i></div>
												<input size="16" type="text" name="closeDate" value="<?=date("Y-m-d", strtotime($job['closeDate']));?>" readonly class="form-control form_datetime solid">
											</div>
										</div>
									</div>
									
									<div class="row">
										
										<div class="col-xl-12 mb-4">
											  <label  class="form-label font-w600">Job Title:<span class="text-danger scale5 ms-2">*</span></label>
											  <input type="text" class="form-control solid" placeholder="Job Title" aria-label="name" name="jobTitle" value="<?=$job['jobTitle'];?>">
										</div>
										<div class="col-xl-12 mb-4">
											  <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
											  <textarea id="editor" class="form-control solid" aria-label="With textarea" name="jobDecription" style="height: 200px;"><?=$job['jobDescription'];?></textarea>
										</div>
									</div>
									<!-- <div>
										<span>Status:<label class="radio-inline mx-3"><input type="radio" name="optradio"> Active</label></span>
										<span><label class="radio-inline me-3"><input type="radio" name="optradio"> In Active</label></span>
									</div> -->
								</div>
								<div class="card-footer text-end">
									<div>
										<?php 
											if($job['jobStatus']==0)
											{
												?>
												<a href="<?=base_url('send-aprove-job/'.$job['jobId']);?>" class="btn btn-warning me-2 btn-sm mb-3"><i class="fa fa-check me-2"></i>Send for Aproval</a>
												<?php
											}
											if($job['jobStatus']==1)
											{
												?>
												<a  class="badge badge-rounded badge-outline-danger"><i class="flaticon-381-diamond me-2"></i>Job Not yet Aproved</a>
												<?php
											}
											if($job['jobStatus']==2)
											{
												?>
												<a href="<?=base_url('post-job/'.$job['jobId']);?>" class="btn btn-warning btn-md me-2 mb-3"><i class="fa fa-bookmark me-2"></i>Post now</a>
												<a  class="badge badge-rounded badge-outline-success"><i class="far fa-check-circle me-2"></i>Job Approved</a>
												<?php
											}
											if($job['jobStatus']==3)
											{
												?>
												<a  class="badge badge-rounded badge-outline-success"><i class="far fa-check-circle me-2"></i>Job Posted</a>
												<?php
											}
											if($job['jobStatus']==4)
											{
												?>
												<a  class="badge badge-rounded badge-outline-danger"><i class="flaticon-381-diamond me-2"></i>Job Rejected</a>
												<button type="submit" class="btn btn-success btn-sm" name="forApproval" value="1">Save & Send For Approval</button>
												<?php
											}
											?>
										<button type="submit" class="btn btn-primary" name="forApproval" value="1">Send for Approval</button>
										<button type="submit" class="btn btn-info" name="forApproval" value="0">Save Only</button>
									</div>
								</div>
							<?=form_close();?>
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
	$(".form_datetime").datepicker({format: 'yyyy-mm-dd'});
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl)
	})
	</script>
	<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#recruitmentType').change(function(){
				if($(this).val()==2)
				{
					$('.replacementDiv').show(100);
				}
				else
				{
					$('.replacementDiv').hide(100);
				}
			});

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
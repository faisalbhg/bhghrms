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
					<?php //echo '<pre>'; print_r(session()->get()); echo '</pre>'; ?>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
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
                            <?= form_open('create-new-job',array("autocomplete"=>"off")); ?>
                                <?= csrf_field() ?>
								<div class="card-body">
									<div class="row">
										<?php
											if(session()->get('userType')==1 || session()->get('userType')==2)
											{
												?>
										<div class="col-xl-6  col-md-6 mb-4" >
											
										  <label  class="form-label font-w600">Company Name<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="companyId" id="selectCompany" >
												<option selected value="0">Choose...</option>
												<?php
												if($companyList)
												{
													foreach($companyList as $clkey => $clvalue)
													{
														?>
														<option value="<?=$clvalue['companyId'];?>"><?=$clvalue['companyName'];?></option>
														<?php
													}
												}
												?>
											</select>
										
										</div>
										<?php } ?>
										<div class="col-xl-6  col-md-6 mb-4" id="divisionResponse" >
										</div>
										<div class="col-xl-6  col-md-6 mb-4" id="departmentDataResponse" >
										  
											
										</div>
										<div class="col-xl-6  col-md-6 mb-4" id="positionResponse">
											<?php
											if(session()->get('userType')==5 || session()->get('userType')==6)
											{
												?>
											<label  class="form-label font-w600">Positions<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="positionID" id="positionID">
												<option selected value="0">Choose...</option>
												<?php
												$departmentId='';
												$companyId = '';
												if($positionList)
												{
													foreach($positionList as $pstkkey => $position)
													{
													  	?>
													  	<option data-department="<?=$position['departmentId'];?>" data-company="<?=$position['companyId'];?>"  value="<?=$position['roleId'];?>"><?=$position['roleName'];?> - (<?=$position['departmentName'];?>)</option>
													  	<?php
													  	$departmentId = $position['departmentId'];
													  	$companyId = $position['companyId'];
													}
												}
												?>
											</select>
											<input type="hidden" value="<?=$departmentId;?>" name="departmentIdHide" id="departmentIdHide">
											<input type="hidden" value="<?=$companyId;?>" name="companyIdHide" id="companyIdHide">
											<?php } ?>
										  
										</div>
										<div class="col-xl-6  col-md-6 mb-4" id="positionGradeDataResponse">
										  
										</div>
										<div class="col-xl-6  col-md-6 mb-4" id="budgetDataResponse">
										  
										</div>
										<!-- <div class="col-xl-6  col-md-6 mb-4">
											<span>Show Salary:<label class="radio-inline mx-3"><input type="radio" checked name="showsalary"> Active</label></span>
											<span><label class="radio-inline me-3"><input type="radio" name="showsalary"> In Active</label></span>
										</div> -->
									</div>
									<div class="row">
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Recruitment Type<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="recruitmentType" id="recruitmentType" required>
											  <option selected value="">Choose...</option>
											  <option value="1">New</option>
											   <option value="2">Replacement</option>
											</select>
										</div>
										<div class="col-xl-6  col-md-6 mb-4 replacementDiv" style="display: none;">
											<label  class="form-label font-w600">Reason<span class="text-danger scale5 ms-2"></span></label>
											<textarea name="reason" class="form-control" placeholder="Reson of Replacement"></textarea>
										</div>
										<div class="col-xl-6  col-md-6 mb-4 replacementDiv" style="display: none;">
											<label  class="form-label font-w600">Employee Id<span class="text-danger scale5 ms-2"></span></label>
											<input type="text" name="employeeNumber" class="form-control" placeholder="Employee ID" />
										</div>
										<div class="col-xl-6  col-md-6 mb-4 replacementDiv" style="display: none;">
											<label  class="form-label font-w600">Employee Name<span class="text-danger scale5 ms-2"></span></label>
											<input type="text" name="employeeName" class="form-control" placeholder="Employee Name" />
										</div>

										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Work Location<span class="text-danger scale5 ms-2"></span></label>
											<input type="text" name="workLocation" class="form-control" placeholder="Work Location" />
										</div>
									</div>
									<div class="row">
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Job Type<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="jobType" required>
											  <option selected value="0">Choose...</option>
											  <option value="1">Full-Time</option>
											   <option value="2">Part-Time</option>
											    <option value="3">Freelancer</option>
											</select>
										</div>
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Select Experience<span class="text-danger scale5 ms-2">*</span></label>
											<select class="form-control" name="experienceDetails" required>
												<option value="">-Select-</option>
												<option value="0-1 Years">0-1 Years</option>
												<option value="1-2 Years">1-2 Years</option>
												<option value="2-3 Years">2-3 Years</option>
												<option value="3-6 Years">3-6 Years</option>
												<option value="6-10 Years">6-10 Years</option>
												<option value="10-More">10-More</option>
											</select>
											
										</div>
									</div>
									<div class="row" >
										<div class="col-xl-6  col-md-6 mb-4">
										  <label  class="form-label font-w600">Enter Education Level:<span class="text-danger scale5 ms-2">*</span></label>
											<select class="form-control single-select-placeholder js-states" name="qualification">
												<option value="" selected="selected" disabled="disabled">-Select-</option>
												<option value="No formal education">No formal education</option>
											    <option value="High school">High school</option>
											    <option value="Diploma">Diploma</option>
											    <option value="Vocational qualification">Vocational qualification</option>
											    <option value="Bachelors degree">Bachelors degree</option>
											    <option value="Masters degree">Masters degree</option>
											    <option value="Doctorate or higher">Doctorate or higher</option>
											</select>
										</div>

										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Select Gender:<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="gender"  required>
												<option value="1">Male</option>
												<option value="2">Female</option>
												<option selected value="3">Any</option>
											</select>
										</div>
										
										
										<div class="col-xl-6  col-md-6 mb-4">
										  <label  class="form-label font-w600">No. of Vancancy<span class="text-danger scale5 ms-2">*</span></label>
											<input type="number" class="form-control" placeholder="No. of Vancancy" name="noVacant" aria-label="name"  required>
										</div>
										
									</div>
									<div class="row">
										
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Posted Date<span class="text-danger scale5 ms-2">*</span></label>
											<div class="input-group">
												 <div class="input-group-text"><i class="far fa-clock"></i></div>
												<input size="16" type="text" name="postedDate" value="<?=date('Y-m-d');?>" readonly class="form-control form_datetime solid" >
											</div>
										</div>
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Last Date To Apply<span class="text-danger scale5 ms-2">*</span></label>
											<div class="input-group">
												 <div class="input-group-text"><i class="far fa-clock"></i></div>
												<input size="16" type="text" name="lastDateToApply" value="<?=date('Y-m-d');?>" readonly class="form-control form_datetime solid">
											</div>
										</div>
										<div class="col-xl-6  col-md-6 mb-4">
											<label  class="form-label font-w600">Close Date<span class="text-danger scale5 ms-2">*</span></label>
											<div class="input-group">
												 <div class="input-group-text"><i class="far fa-clock"></i></div>
												<input size="16" type="text" name="closeDate" value="<?=date('Y-m-d');?>" readonly class="form-control form_datetime solid">
											</div>
										</div>
									</div>
									
									<div class="row">
										
										<div class="col-xl-12 mb-4">
											  <label  class="form-label font-w600">Job Title:<span class="text-danger scale5 ms-2">*</span></label>
											  <input type="text" class="form-control" placeholder="Job Title" aria-label="name" name="jobTitle"  required>
										</div>
										<div class="col-xl-12 mb-4">
											  <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
											  <textarea id="editor" class="form-control" aria-label="With textarea" name="jobDecription" style="height: 200px;"  ></textarea>
										</div>
									</div>
									<!-- <div>
										<span>Status:<label class="radio-inline mx-3"><input type="radio" name="optradio"> Active</label></span>
										<span><label class="radio-inline me-3"><input type="radio" name="optradio"> In Active</label></span>
									</div> -->
								</div>
								<div class="card-footer text-end">
									<div>
										<button type="reset" class="btn btn-primary me-3">Close</button>
										<button type="submit" class="btn btn-secondary" name="forApproval" value="1">Send for Approval</button>
										<button type="submit" class="btn btn-default" name="forApproval" value="0">Save as Draft</button>
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
		});
	</script>
	<script type="text/javascript">
												$(document).ready(function(){
												$('#positionID').change(function()
												{
													$('#departmentIdHide').val($('#positionID').find(':selected').attr('data-department'));
													$('#companyIdHide').val($('#positionID').find(':selected').attr('data-company'));
													;
													$.ajax({
														url: "<?=base_url('get-grade-position');?>",
														type: "get",
														data: {'comapnyId':'<?=session()->get('companyId');?>','positionID':$('#positionID').val()} ,
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
												});
											</script>
</body>
</html>
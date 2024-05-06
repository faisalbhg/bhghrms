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
	<title>BHG HRMS::Create HRMS User</title>
	
	<?=view('common/favicon');?>
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/datatables/css/jquery.dataTables.min.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css');?>" rel="stylesheet">
	
	<?=view('common/styles');?>
	
	<style type="text/css">
		.ck-editor__editable
		{
			height: 250px;
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
                                Create HRMS User
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
					<h4 class="fs-20 font-w600  me-auto">New HRMS User</h4>
					<div>
					<a href="<?=base_url('hrms-users-list');?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-list me-2"></i>User List</a>
					
					</div>
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
                            <?= form_open('hrms-new-user',array("autocomplete"=>"off")); ?>
                                <?= csrf_field() ?>
								<div class="card-body">
									<div class="col-xl-6">
										<div class="row">
											

											<div class="col-xl-12  col-md-6 mb-4">
												<label  class="form-label font-w600">Full Name<span class="text-danger scale5 ms-2">*</span></label>
												<input type="text" class="form-control" placeholder="Full Name" aria-label="fullName" name="fullName">

											</div>

											<div class="col-xl-12  col-md-6 mb-4">
												<label  class="form-label font-w600">Company<span class="text-danger scale5 ms-2">*</span></label>
												<select class="form-control" name="companyId"  id="selectCompany">
													<option value="">-Select-</option>
													<?php
													foreach($companies as $company)
													{
													?>
													<option value="<?=$company['companyId'];?>"><?=$company['companyName'];?></option>
													<?php
													}

													?>
												</select>

											</div>

											<div class="col-xl-12  col-md-6 mb-4" id="divisionResponse">
											</div>
											<div class="col-xl-12  col-md-6 mb-4" id="departmentDataResponse">
											</div>
											<div class="col-xl-12  col-md-6 mb-4" id="positionResponse">
											</div>
										</div>
										<div class="row">

											<div class="col-xl-12  col-md-6 mb-4">
												<label  class="form-label font-w600">User Name<span class="text-danger scale5 ms-2">*</span></label>
												<input type="email" class="form-control" placeholder="User Name" aria-label="userName" required name="userName">

											</div>
										</div>
										<div class="row">

											<div class="col-xl-12  col-md-6 mb-4">
												<label  class="form-label font-w600">User type<span class="text-danger scale5 ms-2">*</span></label>
												<select class="form-control" name="userType"  id="userType">
													<option value="">-Select-</option>
													<option value="1">Admin</option>
													<option value="2">HR</option>
													<option value="3">Management</option>
													<option value="4">User</option>
													<option value="5">Head</option>
													<option value="6">General Manager</option>
												</select>

											</div>

											<div class="col-xl-12  col-md-6 mb-4" id="userGroupResponse">
											</div>
											
										</div>
									</div>
									<!-- <div>
										<span>Status:<label class="radio-inline mx-3"><input type="radio" name="optradio"> Active</label></span>
										<span><label class="radio-inline me-3"><input type="radio" name="optradio"> In Active</label></span>
									</div> -->
								</div>
								<div class="card-footer text-end">
									<div>
										<button type="submit" class="btn btn-primary" name="forApproval" value="0">Save</button>
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

			$('#selectCompany').change(function(){
				$.ajax({
					url: "<?=base_url('get-divisions');?>",
					type: "get",
					data: {'companyId':$('#selectCompany').val()} ,
					success: function (divisionResponse) {
					console.log(divisionResponse);
					$('#divisionResponse').html(divisionResponse.divisionsData);
					

					// You will get response from your PHP page (what you echo or print)
					},
					error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
					}
				});

				$.ajax({
					url: "<?=base_url('get-user-group');?>",
					type: "get",
					data: {'companyId':$('#selectCompany').val()} ,
					success: function (userGroupResponse) {
					console.log(userGroupResponse);
					$('#userGroupResponse').html(userGroupResponse.userGroupVal);
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
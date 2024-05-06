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
	<title>BHG HRMS::Edit <?=$company['companyName'];?> Comapny</title>
	
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
                                Edit <?=$company['companyName'];?>
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
					<h4 class="fs-20 font-w600  me-auto">Edit <?=$company['companyName'];?></h4>
					<div>
					<a href="<?=base_url('hrms-companies');?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-list me-2"></i>Company List</a>
					
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
                            <?= form_open('hrms-update-company/'.$company['companyId'],array("autocomplete"=>"off")); ?>
                                <?= csrf_field() ?>
								<div class="card-body">
									<div class="col-xl-6">
										<div class="row">
											<div class="col-xl-12  col-md-6 mb-4">
												<label  class="form-label font-w600">Company Name<span class="text-danger scale5 ms-2">*</span></label>
												<input type="text" class="form-control" placeholder="Company Name" aria-label="name" name="companyName" value="<?=$company['companyName'];?>">

											</div>
											
											
											<div class="col-xl-12 mb-4">
												  <label  class="form-label font-w600">Address:<span class="text-danger scale5 ms-2">*</span></label>
												  <textarea id="editor" class="form-control solid" aria-label="With textarea" name="companyAddress" style="height: 200px;"><?=$company['address'];?></textarea>
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
					url: "<?=base_url('department-list');?>",
					type: "get",
					data: {'companyId':$('#selectCompany').val()} ,
					success: function (dprtmntResponse) {
					console.log(dprtmntResponse);
					$('#departmentResponse').html(dprtmntResponse.departmentListData);
					$('#positionResponse').html('');
					$('#positionDataResponse').html('');

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
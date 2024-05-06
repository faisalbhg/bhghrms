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
	<title>BHG HRMS::Offer Letter</title>
	
	<?=view('common/favicon');?>
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/datatables/css/jquery.dataTables.min.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css');?>" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url('assets/vendor/select2/css/select2.min.css');?>">
	
	<?=view('common/styles');?>
	
	<style type="text/css">
		.ck-editor__editable
		{
			height: 250px;
		}
		.loading {
  display: flex;
  justify-content: center;
}
.loading div {
  width: 1rem;
  height: 1rem;
  margin: 2rem 0.3rem;
  background: #979fd0;
  border-radius: 50%;
  -webkit-animation: 0.9s bounce infinite alternate;
          animation: 0.9s bounce infinite alternate;
}
.loading div:nth-child(2) {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}
.loading div:nth-child(3) {
  -webkit-animation-delay: 0.6s;
          animation-delay: 0.6s;
}

@-webkit-keyframes bounce {
  to {
    opacity: 0.3;
    transform: translate3d(0, -1rem, 0);
  }
}

@keyframes bounce {
  to {
    opacity: 0.3;
    transform: translate3d(0, -1rem, 0);
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
                                New Offer Letter
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
					<h4 class="fs-20 font-w600  me-auto">New Offer Letter</h4>
					<div>
					<a href="<?=base_url('offer-letters');?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-list me-2"></i>Offer Letters List</a>
					
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
                            <?= form_open('job-offerletter/'.$companyId.'/'.$jobApplicatId.'/'.$proposalId,array("autocomplete"=>"off")); ?>
                                <?= csrf_field() ?>
								<div class="card-body">
									<div class="col-xl-6">
										<div class="row">
											<div class="col-xl-12  col-md-6 mb-4">
												<label  class="form-label font-w600">Passport Number<span class="text-danger scale5 ms-2">*</span></label>
												<input type="text" class="form-control" placeholder="Passport Number" aria-label="name" name="passport" id="passport" required>

											</div>

											<div class="col-xl-12  col-md-6 mb-4">
												<label  class="form-label font-w600">Country<span class="text-danger scale5 ms-2">*</span></label>
												<select class="form-control" name="nationality" id="single-select" required>
													<?php foreach(config('SiteConfig')->countries as $countryCode => $country)
													{
														?>
														<option value="<?=$countryCode?>"><?=$country;?></option>
														<?php
													}
													?>
												</select>

											</div>

											<div class="col-xl-12  col-md-6 mb-4">
												<label  class="form-label font-w600">Probation<span class="text-danger scale5 ms-2">*</span></label>
												<input type="text" class="form-control" placeholder="Probation" aria-label="name" name="probation" id="probation" required>

											</div>

											


											
											
											
										</div>

										<div class="row">
                                            <label class="col-form-label col-sm-3 pt-0">Offer Letter Template</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridOfferType" value="option1" checked="" required />
                                                    <label class="form-check-label">
                                                        All Inclusive
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridOfferType" value="option2" required />
                                                    <label class="form-check-label">
                                                        All Inclusive - Insurance Not Covered
                                                    </label>
                                                </div>
                                                <div class="form-check disabled">
                                                    <input class="form-check-input" type="radio" name="gridOfferType" value="option3" required />
                                                    <label class="form-check-label">
                                                        Accommodation & Transportation By Company
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
									</div>
									<!-- <div>
										<span>Status:<label class="radio-inline mx-3"><input type="radio" name="optradio"> Active</label></span>
										<span><label class="radio-inline me-3"><input type="radio" name="optradio"> In Active</label></span>
									</div> -->

									<!-- Large modal -->
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" id="getmodelOffer">Preview</button>
                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Offer Letter</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="modelOffer">
                                                	<div class="loading">
                                                		<div></div>
                                                		<div></div>
                                                		<div></div>
                                                	</div>
                                                </div>
                                                
                                                <div class="modal-footer" id="modelOfferFooter">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<!-- <div class="card-footer text-end">
									<div>
										<button type="button" class="btn btn-primary" name="forApproval" value="0">Preview Offer Letter</button>


									</div>
								</div> -->
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
	<script src="<?=base_url('assets/vendor/select2/js/select2.full.min.js');?>"></script>
    <script src="<?=base_url('assets/js/plugins-init/select2-init.js');?>"></script>
	
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

			$('#getmodelOffer').click(function(){
				$('#modelOfferFooter').hide();
				$.ajax({
					url: "<?=base_url('get-model-offer');?>",
					type: "get",
					data: {'companyId':'<?=$companyId;?>','jobApplicatId':'<?=$jobApplicatId;?>','proposalId':'<?=$proposalId;?>','passport':$('#passport').val(),'nationality':$('#single-select').val(),'probation':$('#probation').val(),'gridOfferType':$('input[name="gridOfferType"]:checked').val()} ,
					success: function (offerResponse) {
					console.log(offerResponse);
					$('#modelOffer').html(offerResponse.offerLetter);
					$('#modelOfferFooter').show();
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
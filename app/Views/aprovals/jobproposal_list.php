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
	<title>BHG HRM::Jobs Proposal List</title>
	
	<?=view('common/favicon');?>
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/vendor/datatables/css/jquery.dataTables.min.css');?>" rel="stylesheet">
	
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
                                Job Proposal
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
					<h4 class="fs-20 font-w600 me-auto">Proposal Approval List</h4>
					<div>
					</div>
				</div>
				<div class="row">
					<?php //echo '<pre>'; print_R($jobApplication);echo '</pre>';?>
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
					<div class="col-xl-12">
						<?php //echo '<pre>'; print_r($proposalLList); echo '</pre>'; ?>
						<div class="table-responsive">
							<table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example3">
								<thead>
									<tr>
										<th>No</th>
										<th class="text-center">Actions</th>
										<th>Name</th>
										<th>Company</th>
										<th>Department</th>
										<th>Position</th>
										<th>Salary</th>
										<th>Grade</th>
										<th>Joining Date</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($proposalLList as $listKey => $application)
									{
										?>
										<tr>
											<td><?=$listKey+1;?></td>
											<td class="action-btn wspace-no">
												<div class="action-buttons d-flex justify-content-center">
													<a href="<?=base_url('aprove-proposal/'.$application['proposalID']);?>" class="btn btn-success light mr-2">
														<svg xmlns="http://www.w3.org/2000/svg" class="svg-main-icon" width="24px" height="24px" viewBox="0 0 32 32" x="0px" y="0px"><g data-name="Layer 21"><path d="M29,14.47A15,15,0,0,0,3,14.47a3.07,3.07,0,0,0,0,3.06,15,15,0,0,0,26,0A3.07,3.07,0,0,0,29,14.47ZM16,21a5,5,0,1,1,5-5A5,5,0,0,1,16,21Z" fill="#000000" fill-rule="nonzero"></path><circle cx="16" cy="16" r="3" fill="#000000" fill-rule="nonzero"></circle></g></svg>
													</a>
												</div>
											</td>
											<td><?=$application['applicantName'];?></td>
											<td><?=$application['companyName'];?></td>
											<td class="wspace-no"><?=$application['departmentName'];?></td>
											<td class="wspace-no"><?=$application['position'];?></td>
											<td><?=$application['totalSalary'];?></td>
											<td><?=$application['gradeName'];?></td>
											<td><?=date("dS M Y",strtotime($application['joningDate'])); ?></td>
										</tr>

										<?php
									}
									?>
										
									
								</tbody>
							</table>
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
	
	<!-- Dashboard 1 -->
	 
	
	
	
    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dlabnav-init.js');?>"></script>
	
    
	<script>
	/*	$(document).ready(function(){
			//$('[data-toggle="tooltip"]').tooltip();
  return new bootstrap.Tooltip($('[data-toggle="tooltip"]'))
	});*/

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
	</script>
	<script type="text/javascript">
		function jobStatusChange(a,b)
		{
			var formData = '';
            console.log(formData);

            $.ajax({
                url: "<?=base_url('application-shortlist');?>/"+a+"/"+b,
                type: "get",
                data: formData,
                success: function(dResp) {
                    if(dResp==3)
                    {
                    	$('#'+a+'-status .changeStatus').addClass('btn-danger');
                    	$('#'+a+'-status .changeStatus').removeClass('btn-success');
                    	$('#'+a+'-status .changeStatus').html('Rejected');
                    	$('#'+a+'shortList').show();
                    	$('#'+a+'reject').hide();
                    	$('#'+a+'nextStep').hide();


                    }
                    else
                    {
                    	$('#'+a+'-status .changeStatus').addClass('btn-success');
                    	$('#'+a+'-status .changeStatus').removeClass('btn-danger');
                    	$('#'+a+'-status .changeStatus').html('Shortlisted');
                    	$('#'+a+'shortList').hide();
                    	$('#'+a+'reject').show();
                    	$('#'+a+'nextStep').show();
                    }
                }
            });
		}
	</script>

</body>
</html>
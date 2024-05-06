
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content=" " />
	<meta property="og:title" content=" " />
	<meta property="og:description" content=" " />
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>BHG HRM::Job </title>
	
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
                                Job View
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
					<h4 class="fs-20 font-w600  me-auto">Job Approval Lists</h4>
					<div>
					<a href="<?=base_url('jobs-list');?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-list me-2"></i>Job Approval Lists</a>
					
					
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-xxl-4">
						<div class="row">
							<?php //echo '<pre>'; print_R($job);echo '</pre>'; ?>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="fs-20 mb-0">Overview</h4>
									</div>
									<div class="card-body pt-4">
										<div class="mb-3 d-flex">
											<h5 class="mb-1 fs-14 custom-label">Job Title:</h5>
											<span><?=$job['jobTitle'];?></span>	
										</div>
										<div class="mb-3 d-flex">
											<h5 class="mb-1 fs-14 custom-label">Eligibility:</h5>
											<span><?=$job['qualification'];?></span>	
										</div>
										<div class="mb-3 d-flex">
											<h5 class="mb-1 fs-14 custom-label">Experience:</h5>
											<span><?=$job['experienceDetails'];?> Exp</span>	
										</div>
										<div class="mb-3 d-flex">
											<h5 class="mb-1 fs-14 custom-label">Vacancy:</h5>
											<span><?=$job['noVacant'];?></span>	
										</div>
										<div class="mb-3 d-flex">
											<h5 class="mb-1 fs-14 custom-label">Job Type:</h5>
											<span><?=$job['jobTypeDesc'];?></span>	
										</div>
										<div class="mb-3 d-flex">
											<h5 class="mb-1 fs-14 custom-label">Gender:</h5>
											<span><?=$job['genderType'];?></span>	
										</div>
										<div class="mb-3 d-flex">
											<h5 class="mb-1 fs-14 custom-label">Posted Date:</h5>
											<span><?=date("dS M Y",strtotime($job['postedDate'])); ?></span>	
										</div>
										<div class="mb-3 d-flex">
											<h5 class="mb-1 fs-14 custom-label">Last Apply Date:</h5>
											<span><?=date("dS M Y",strtotime($job['lastDateToApply'])); ?></span>	
										</div>
										<div class="mb-3 d-flex">
											<h5 class="mb-1 fs-14 custom-label">Closed Date:</h5>
											<span><?=date("dS M Y",strtotime($job['closeDate'])); ?></span>	
										</div>
									</div>
									<!-- <div class="card-footer border-0 pt-0 ">
										<div class="d-flex justify-content-between flex-wrap">
											<a href="javascript:void(0);" class="btn btn-primary btn-sm mb-3"><i class="fas fa-check me-2 "></i>Apply Now</a>
											<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm mb-3"><i class="fas fa-phone-volume me-2"></i>Contact Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>	
					<div class="col-xl-9 col-xxl-8">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block">
										<h4 class="fs-20 d-block"><a href="javascript:void(0);"><?=$job['position'];?></a></h4>
										<div class="d-block">
											<span class="me-2"><a href="javascript:void(0);"><i class="fas fa-briefcase me-2"></i><?=$job['companyName'];?></a></span>
											<span class="me-2"><a href="javascript:void(0);"><i class="fas fa-map-marker-alt me-2"></i>UAE</a></span>
											<!-- <span><a href="javascript:void(0);"><i class="fas fa-eye me-2"></i>View</a></span> -->
										</div>
									</div>
									<div class="card-body">
										<h4 class="fs-20 mb-3">Description</h4>
										<div class="ms-4">
											<?=$job['jobDescription'];?>
											<!-- <p><i class="fas fa-dot-circle me-2"></i>We are Looking For a PHP Doveloper, who is must be familiar with the PHP fundamentals& PHP framwork. Experience with Laravel & mixs, Livewire </p>
											<p><i class="fas fa-dot-circle me-2 "></i>Good knowledge of SQL and related databases, with a preference for those with MySQL experience.</p>
											<p><i class="fas fa-dot-circle me-2 "></i>Excellent knowledge of the basic PHP 7 or web server exploits along with their solutions.</p>
											<p><i class="fas fa-dot-circle me-2 "></i>Experience building or maintaining a CMS.</p>
											<p><i class="fas fa-dot-circle me-2 "></i>Knowledge of MVC frameworks.</p>
											<p><i class="fas fa-dot-circle me-2 "></i>A detailed understanding of database design and administration.</p>
											<p><i class="fas fa-dot-circle me-2 "></i>The ability to integrate a variety of data sources and databases into a single system.</p> -->
										</div>
										
										<hr>
										<h4 class="fs-20 mb-3">Job Details</h4>
										<div class="row mb-3">
											<div class="col-xl-6">
												<div class="ms-4">
													<p class="font-w500 mb-3"><span class="custom-label">Division :</span><span class="font-w400"> <?=$job['divisionName'];?></span></p>
													<p class="font-w500 mb-3"><span class="custom-label">Department :</span><span class="font-w400"> <?=$job['departmentName'];?></span></p>
													<p class="font-w500 mb-3"><span class="custom-label">Position :</span><span class="font-w400"> <?=$job['position'];?></span></p>
													
													
													
												</div>
											</div>
											<div class="col-xl-6">
												<div class="ms-4">
													<p class="font-w500 mb-3"><span class="custom-label">Job Grade :</span><span class="font-w400"> <?=$job['gradeName'];?></span></p>
													<p class="font-w500 mb-3"><span class="custom-label">Salary:</span><span class="font-w400"><?=$job['salaryFrom'];?>AED - <?=$job['salaryTo'];?>AED</span></p>
													
												</div>
											</div>
											<div class="col-xl-6">
												<div class="ms-4">
													
													
													
													
												</div>
											</div>
											
											
										</div>	
										<div class="d-flex justify-content-between py-4 border-bottom border-top flex-wrap">
											<span>Job ID: #<?=$job['jobId'];?></span>
											<span>Created By <strong><?=$job['jobCreatedBy'];?></strong>/ <?=date("dS M Y",strtotime($job['created'])); ?></span>
										</div>
									</div>
									<div class="card-footer border-0">
										<div>
											<!-- <a href="<?=base_url('edit-job/'.$job['jobId']);?>" class="btn btn-primary btn-md me-2 mb-3"><i class="fas fa-edit me-2"></i>Edit</a> -->
											<?php if($job['jobStatus']==1)
											{
												?>
												<a href="<?=base_url('aprovejob/'.$job['dataId']);?>" class="btn btn-success btn-md me-2 mb-3"><i class="far fa-check-circle me-2"></i>Approve Now</a>
												

												<a href="<?=base_url('reject-job/'.$job['dataId']);?>" class="btn btn-danger btn-md me-2 mb-3"><i class="flaticon-381-diamond me-2"></i>Reject</a>
												<?php
											}
											if($job['jobStatus']==2)
											{
												?>
												<a href="<?=base_url('post-job/'.$job['jobId']);?>" class="btn btn-warning btn-md me-2 mb-3"><i class="fa fa-bookmark me-2"></i>Post now</a>
												<?php
											}
											?>
											

											
											

											<!-- <a href="javascript:void(0);" class="btn btn-warning btn-md me-2 mb-3"><i class="fas fa-trash me-2"></i>Delete</a> -->
											
										</div>
									</div>
								</div>
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

</body>
</html>
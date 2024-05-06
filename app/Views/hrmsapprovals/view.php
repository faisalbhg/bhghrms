<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:title" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>BHG HR :: Aprovals</title>
	
	<?=view('common/favicon');?>
	
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
                               Companies
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
				
				<div class="d-flex align-items-center justify-content-between my-0 flex-wrap">
					<div class="sm-mb-0 mb-3">
						<h4 class="fs-20 font-w600  me-auto">Approvals</h4>
						<span>2 Levels Aprovals</span>
					</div>
					
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12 col-xxl-12 col-lg-12">
		                        <div class="card border-0 pb-0 m-0">
		                            <div class="card-header border-0 pb-0">
		                                <h4 class="card-title">Message</h4>
		                            </div>
		                            <div class="card-body"> 
		                                <div id="DZ_W_Todo3" class="widget-media dlab-scroll height370 ps ps--active-y">
		                                    <ul class="timeline">
		                                        <li>
		                                            <div class="timeline-panel">
														<div class="media me-2">
															<img alt="image" width="50" src="<?=base_url('assets/images/avatar/1.jpg');?>">
														</div>
		                                                <div class="media-body">
															<h5 class="mb-1">Alfie Mason </h5>
															<p class="mb-1">Position</p>
															<a href="#" class="btn btn-primary btn-xxs shadow">Edit</a>
															<a href="#" class="btn btn-outline-danger btn-xxs">Delete</a>
														</div>
														<div class="dropdown">
															<button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="false">
																<svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
		                                        </li>
		                                        <li>
		                                            <div class="timeline-panel">
														<div class="media me-2 media-info">
															KG
														</div>
														<div class="media-body">
															<h5 class="mb-1">Jacob Tucker </h5>
															<p class="mb-1">Position</p>
															<a href="#" class="btn btn-primary btn-xxs shadow">Edit</a>
															<a href="#" class="btn btn-outline-danger btn-xxs">Delete</a>
														</div>
														<div class="dropdown">
															<button type="button" class="btn btn-info light sharp" data-bs-toggle="dropdown">
																<svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
		                                        </li>
		                                        
		                                    </ul>
		                                <div class="ps__rail-x" style="left: 0px; bottom: -241px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 241px; height: 324px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 139px; height: 185px;"></div></div></div>
		                            </div>
		                        </div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- <div class="d-flex align-items-center justify-content-between flex-wrap">
					<div class="sm-mb-0 mb-3">
						<h5 class="mb-0">Showing 5 of 102 Data</h5>
					</div>
					<nav>
						<ul class="pagination pagination-circle">
							<li class="page-item page-indicator">
								<a class="page-link" href="javascript:void(0)">Prev</a>
							</li>
							<li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a>
							</li>
							<li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
							<li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
							<li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
							<li class="page-item page-indicator">
								<a class="page-link" href="javascript:void(0)">Next</a>
							</li>
						</ul>
					</nav>
				</div> -->
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

	<script src="<?=base_url('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js');?>"></script>
	
	<!-- Apex Chart -->
	
	<!-- Chart piety plugin files -->
	<!-- Dashboard 1 -->
    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dlabnav-init.js');?>"></script>
	
    

</body>
</html>
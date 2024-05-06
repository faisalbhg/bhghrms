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
	<meta property="og:image" content=" " />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>BHG HRM::Admin Users</title>
	
	<?=view('common/favicon');?>
    <!-- Datatable -->
    <link href="<?=base_url('assets/vendor/datatables/css/jquery.dataTables.min.css');?>" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
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
                                Hrms Admin Users
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
            <div class="container-fluid">
            	<div class="d-flex align-items-center mb-4 flex-wrap">
					<h4 class="fs-20 font-w600  me-auto">HRMS Admin Users List</h4>
					<div>
					<a href="<?=base_url('hrms-new-user');?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New User</a>
					
					</div>
				</div>
                <!-- row -->


                <div class="row">
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Profile Datatable</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Company</th>
                                                <th>Department</th>
                                                <th>Position</th>
                                                <th>User Group</th>
                                                <th>User Type</th>
                                                <th>Last Login</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
                                        	foreach($usersList as $useKe => $user)
                                        	{
	                                        	?>
	                                        	<tr>
	                                        		<td><?=$useKe+1;?></td>
	                                                <td><?=$user['fullName'];?></td>
	                                                <td><?=$user['userName'];?></td>
	                                                <td><?=$user['companyName'];?></td>
	                                                <td><?=$user['departmentName'];?></td>
	                                                <td><a href="javascript:void(0);"><strong><?=$user['roleName'];?></strong></a></td>
	                                                <td><a href="javascript:void(0);"><strong><?=$user['groupName'];?></strong></a></td>
	                                                <td><?=$user['userTypeDesc'];?></td>
	                                                <td>
	                                                	<?php
	                                                		if($user['lastLoggedIn']){
	                                                			echo date("dS M Y H:i A",strtotime($user['lastLoggedIn']));
	                                                		}
	                                                	?>
	                                               	</td>
	                                                <td>
														<div class="d-flex">
															<a href="<?=base_url('edit-user/'.$user['userId']);?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
															<!-- <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> -->
														</div>												
													</td>												
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
	<!-- Apex Chart -->
	<script src="<?=base_url('assets/vendor/apexchart/apexchart.js');?>"></script>
	
    <!-- Datatable -->
    <script src="<?=base_url('assets/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?=base_url('assets/js/plugins-init/datatables.init.js');?>"></script>

	<script src="<?=base_url('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js');?>"></script>

    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dlabnav-init.js');?>"></script>
	
    
</body>
</html>
<!--**********************************
            Sidebar start
        ***********************************-->

        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<div class="dropdown header-profile2 ">
					<a class="nav-link " href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
						<div class="header-info2 d-flex align-items-center">
							<img src="<?=base_url('assets/images/profile/pic1.jpg');?>" alt=""/>

							<div class="d-flex align-items-center sidebar-info">
								<div>
									<?php //echo '<pre>'; print_r(session()->get()); echo '</pre>'; ?>
									<span class="font-w400 d-block"><?=session()->get('fullName');?></span>
									<small class="text-end font-w400"><?=session()->get('roleName');?></small>
								</div>	
								<i class="fas fa-chevron-down"></i>
							</div>
							
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<!-- <a href="<?=base_url('profile');?>" class="dropdown-item ai-icon ">
							<svg  xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
							<span class="ms-2">Profile </span>
						</a>
						<a href="<?=base_url('inbox');?>" class="dropdown-item ai-icon">
							<svg  xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
							<span class="ms-2">Inbox </span>
						</a> -->
						<a href="<?=base_url('logout');?>" class="dropdown-item ai-icon">
							<svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
							<span class="ms-2">Logout </span>
						</a>
					</div>
				</div>
				<ul class="metismenu" id="menu">

					<?php if(session()->get('userType')==1 || session()->get('userType')==2)
					{
						?>
                    
						<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
								<i class="flaticon-093-waving"></i>
								<span class="nav-text">Recruitment</span>
							</a>
	                        <ul aria-expanded="false">
	                        	<li><a href="<?=base_url('create-new-job');?>">Create New Vacancy</a></li>
	                            <li><a href="<?=base_url('jobs-list');?>">Vacancies</a></li>
	                            <li><a href="<?=base_url('job-applications');?>">Applications</a></li>
	                            <li><a href="<?=base_url('open-job-applications');?>">Applications without Listing</a></li>
	                            <li><a href="<?=base_url('job-proposals');?>">Proposals</a></li>

	                            <li><a href="<?=base_url('offer-letters');?>">Offer Letter  </a></li>
	                        </ul>
	                    </li>


                    <?php
                	}
                	if(session()->get('userType')==1 || session()->get('userType')==3 || session()->get('userType')==6)
					{
						
	                	?>
	                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
								<i class="flaticon-013-checkmark"></i>
								<span class="nav-text">Approval Request</span>
							</a>
	                        <ul aria-expanded="false">
	                        	<li><a href="<?=base_url('aproval-jobs');?>">Pending Vacancies</a></li>
	                            <li><a href="<?=base_url('aproval-jobproposal');?>">Pending Proposals</a></li>
	                        </ul>
	                    </li>
	                    <?php
                	}
                	if(session()->get('userType')==5 || session()->get('userType')==6 )
					{
						
	                	?>
	                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
								<i class="flaticon-013-checkmark"></i>
								<span class="nav-text">Vacancy</span>
							</a>
	                        <ul aria-expanded="false">
	                        	<li><a href="<?=base_url('create-new-job');?>">Create New Vacancy</a></li>
	                        	<li><a href="<?=base_url('jobs-list');?>">Vacancies</a></li>
	                        	<li><a href="<?=base_url('job-applications');?>">Applications</a></li>
	                        </ul>
	                    </li>
	                    <?php
                	}

                	if(session()->get('userType')==1)
					{
						?>
                    
						

	                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
								<i class="flaticon-022-copy"></i>
								<span class="nav-text">HRMS Admins</span>
							</a>
	                        <ul aria-expanded="false">
	                            <li><a href="<?=base_url('hrms-users-list');?>">Admin Users</a></li>
	                            <li><a href="<?=base_url('hrms-companies');?>">Companies</a></li>
	                            <li><a href="<?=base_url('hrms-divisions');?>">Divisions</a></li>
	                            <li><a href="<?=base_url('hrms-departments');?>">Department</a></li>
	                            <li><a href="<?=base_url('hrms-positions');?>">Positions</a></li>
	                            <li><a href="<?=base_url('hrms-grades');?>">Grade</a></li>
	                        </ul>
	                    </li>


                    <?php
                	}
                	?>
                    
                </ul>
				
				<div class="copyright">
					<p><strong>BHG HRMS</strong> © <?=date('Y');?> All Rights Reserved</p>
					<p class="fs-12">Made by BHG IT</p>

				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
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
	<title>BHG HRM::Grades List</title>
	
	<!-- FAVICONS ICON -->
	<?=view('common/favicon');?>
    <!-- Custom Stylesheet -->
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
    <?=view('common/styles');?>
     <link rel="stylesheet" href="<?=base_url('assets/css/sortable/style.css');?>">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
   <?=view('common/preload');?>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<?=view('common/navheader');?>
        <!--**********************************
            Nav header end
        ***********************************-->

		
		
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Hrms Grades List
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

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?=view('common/sidebar');?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?=base_url('hrms-grades');?>">Grade</a></li>
						<li class="breadcrumb-item"><a href="<?=base_url('gradeEdit/'.$salaryDetail['grade']);?>">Details</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row" id="gradeSalaryResponse">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                        <div class="card overflow-hidden">
                            <div class="card-body">

                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12" >
                                            <h4 class="card-title"><?=$salaryDetail['gradeName'];?> <small>(<?=$salaryDetail['companyName'];?>)</small></h4>
                                            <hr>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Salary</span> <strong class="text-muted">Min: <?=$salaryDetail['salaryFrom'];?>, Max <?=$salaryDetail['salaryTo'];?>   </strong></li>

                                                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Basic Salary</span>      <strong class="text-muted">Min: <?=$salaryDetail['basicSalaryMin'];?>, Max: <?=$salaryDetail['basicSalaryMax'];?>  </strong></li>

                                                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Joining Fare</span>      <strong class="text-muted"><?=config('SiteConfig')->joiningFare[$salaryDetail['joiningFare']];?> </strong></li>
                                                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Air Ticket Frequency</span>      <strong class="text-muted"><?=config('SiteConfig')->airTicketFreq[$salaryDetail['airTicketFreq']];?>  </strong></li>
                                                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Air Ticket Entiltment</span>      <strong class="text-muted"><?=config('SiteConfig')->airTicketEntilt[$salaryDetail['airTicketEntilt']];?>  </strong></li>
                                                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Air Fare</span>      <strong class="text-muted"><?=$salaryDetail['airFare'];?> </strong></li>

                                                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Health Insurance</span>      <strong class="text-muted"><?=$salaryDetail['healthInsu'];?>  </strong></li>
                                                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Food Allowance</span>      <strong class="text-muted"><?=config('SiteConfig')->allowance[$salaryDetail['foodAllow']];?>  </strong></li>
                                                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Allowed Food</span>      <strong class="text-muted"><?=$salaryDetail['allowFood'];?> </strong></li>
                                            </ul>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <h4 class="card-title">Salary Break Down</h4>
                                            <hr>
                                            <div class="table-responsive recentOrderTable">
                                                <table class="table table-striped table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Percentage</th>
                                                            <th scope="col">Fixed Amount</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach($salaryBreakdowns as $salaryBreakdown)
                                                        {
                                                            ?>
                                                            <tr>
                                                                <th><?=$salaryBreakdown['description'];?></th>
                                                                <th><span class="badge badge-dark light"><?=$salaryBreakdown['percentage'];?>%</span></th>
                                                                <th><span class="badge badge-dark"><?=$salaryBreakdown['fixedAmount'];?></span></th>
                                                                
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
                            <div class="card-footer border-0 mt-0">
                                <button class="btn btn-primary btn-lg btn-block" id="editSalaryDetails"><i class="fa fa-bell-o"></i> Edit </button>
                            </div>
                        </div>
                    </div>
                <div>
                <div class="row" >
                    <?php

                    foreach($getApprovalMatrixList as $stageId => $getApprovalMatrix)
                    {
                        ?>
                        <div class="col-xl-6 col-xxl-6 col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title"><?=$StageTitle[$stageId];?></h4>
                                </div>
                                <?php //echo '<pre>'; print_r($salaryDetail['grade']); echo '</pre>'; ?>
                                <?php //echo '<pre>'; print_r($getApprovalMatrix); echo '</pre>'; ?>
                                <div class="card-body">
                                    <div class="recipe">
                                        <div class="recipe__ingredients">
                                            <?= form_open('update-approvals',array("autocomplete"=>"off","id"=>"updateAproval")); ?>
                                                <?= csrf_field() ?>

                                                <table class="table table-striped table-responsive-sm" cellpadding="0" cellspacing="0" border="0" class="recipe-table" id="recipeTable<?=$stageId;?>">
                                                    <tbody id="recipeTableBody<?=$stageId;?>">
                                                        <?php
                                                        foreach($getApprovalMatrix as $keygam => $keygamVal)
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td class="drag-handler"></td>
                                                                <td class="recipe-table__cell">
                                                                    <input type="hidden" value="<?=$stageId;?>" name="stageid">
                                                                    <input type="hidden" value="<?=$salaryDetail['companyId'];?>" name="companyid">
                                                                    <input type="hidden" value="<?=$salaryDetail['grade'];?>" name="gradeid">
                                                                    <select name="user[<?=$stageId;?>][]">
                                                                        <?php foreach($usersList as $user)
                                                                        {
                                                                            ?>
                                                                            <option <?php if($keygamVal->UserId == $user['userId']) { ?> selected <?php } ?> value="<?=$user['userId'];?>"><?=$user['userName'];?> - <?=$user['fullName'];?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </td>
                                                                <td class="recipe-table__cell">
                                                                    <button class="recipe-table__del-row-btn">x</button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="recipe-table__add-row">
                                                    <span class="recipe-table__add-row-btn" id="addNewLine<?=$stageId;?>">+</span>
                                                </div>
                                                 <div class="col-sm-6 mt-5" style="margin: 0 auto;">
                                                    <button type="submit" class="btn btn-rounded btn-secondary btn-sm">Save & Update</button>
                                                </div>
                                            <?=form_close();?>
                                        </div>
                                    </div>
                                    <script id="rowTemplate<?=$stageId;?>" type="text/template">
                                        <tr>
                                            <td class="drag-handler"></td>
                                            <td class="recipe-table__cell">
                                                <input type="hidden" value="<?=$stageId;?>" name="stageid">
                                                <input type="hidden" value="<?=$companyId;?>" name="companyid">
                                                <input type="hidden" value="<?=$grade;?>" name="gradeid">
                                                <select name="user[<?=$stageId;?>][]">
                                                    <?php foreach($usersList as $user)
                                                    {
                                                        ?>
                                                        <option value="<?=$user['userId'];?>"><?=$user['userName'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            
                                            <td class="recipe-table__cell">
                                                <button class="recipe-table__del-row-btn">x</button>
                                            </td>
                                        </tr>
                                    </script>
                                    
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?=view('common/footer');?>
        <!--**********************************
            Footer end
        ***********************************-->

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
    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dlabnav-init.js');?>"></script>
	<script src='https://sortablejs.github.io/Sortable/Sortable.js'></script>
    <script  src="<?=base_url('assets/js/sortable/script.js');?>"></script>
    <?php

    foreach($getApprovalMatrixList as $stageId1 => $getApprovalMatrix)
    {
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                var $tableBody = $('#recipeTableBody<?=$stageId1;?>');
                var $menu = $('#menu');
                //$(document).on('click', '.recipe-table__add-row-btn', function (e) {
                $(document).on('click', '#addNewLine<?=$stageId1;?>', function (e) {
                    var $el = $(e.currentTarget);
                    var htmlString = $('#rowTemplate<?=$stageId1;?>').html();
                    $tableBody.append(htmlString);
                    return false;
                });

                $tableBody.on('click', '.recipe-table__del-row-btn', function (e) {
                    var $el = $(e.currentTarget);
                    var $row = $el.closest('tr');
                    $row.remove();
                    return false;
                });
                Sortable.create(
                    $tableBody[0],
                    {
                        animation: 150,
                        scroll: true,
                        handle: '.drag-handler',
                        onEnd: function () {
                            
                        }
                    }
                );
            });
        </script>
        <?php
    }
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#editSalaryDetails').click(function(){
                $.ajax({
                    url: "<?=base_url('get-grade-salary-details');?>",
                    type: "get",
                    data: {'gradeId':'<?=$salaryDetail['grade'];?>'} ,
                    success: function (gradeSalaryDetailsResponse) {
                        console.log(gradeSalaryDetailsResponse);
                        // You will get response from your PHP page (what you echo or print)
                        $('#gradeSalaryResponse').html(gradeSalaryDetailsResponse.getGradeSalaryDetails);
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
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
						<li class="breadcrumb-item"><a href="<?=base_url('gradeEdit/'.$grade);?>">Add</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row" id="gradeSalaryResponse">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                        <div class="card overflow-hidden">
                            <?= form_open('save-grade-salary-details',array("autocomplete"=>"off","id"=>"updateAproval")); ?>
                                <div class="card-body mt-0 pt-0">
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12" >
                                            <h4 class="card-title">Salary Details</h4>
                                            <hr class="m-0 p-0">
                                            <div class="basic-form">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="grade" value="<?=$grade;?>">
                                                <input type="hidden" name="companyId" value="<?=$companyId;?>">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                        <label class="form-label">Min Salary</label>
                                                        <input type="number" name="salaryFrom" class="form-control" placeholder="" value="">
                                                    </div>
                                                    <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                        <label class="form-label">Max Salary</label>
                                                        <input type="number" name="salaryTo" class="form-control" placeholder="" value="">
                                                    </div>
                                                    <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                        <label class="form-label">Min Basic Salary</label>
                                                        <input type="number" name="basicSalaryMin" class="form-control" placeholder="" value="">
                                                    </div>
                                                    <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                        <label class="form-label">Max Basic Salary</label>
                                                        <input type="number" name="basicSalaryMax" class="form-control" placeholder="" value="">
                                                    </div>

                                                    <div class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Joining Fare</label>
                                                        <select name="joiningFare" class="form-control">
                                                            <?php
                                                            foreach(config('SiteConfig')->joiningFare as $jfKey => $joiningFare)
                                                            {
                                                            ?>
                                                            <option value="<?=$jfKey;?>"><?=$joiningFare;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Air Ticket Frequency</label>
                                                        <select name="airTicketFreq" class="form-control">
                                                            <?php
                                                            foreach(config('SiteConfig')->airTicketFreq as $atfKey => $airTicketFreq)
                                                            {
                                                            ?>
                                                            <option value="<?=$atfKey;?>" ><?=$airTicketFreq;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Air Ticket Entiltment</label>
                                                        <select name="airTicketEntilt" class="form-control">
                                                            <?php
                                                            foreach(config('SiteConfig')->airTicketEntilt as $atefKey => $airTicketEntilt)
                                                            {
                                                            ?>
                                                            <option value="<?=$atefKey;?>" ><?=$airTicketEntilt;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Health Insurance</label>
                                                        <select name="healthInsurance" class="form-control">
                                                            <?php
                                                            foreach(config('SiteConfig')->healthInsurance as $hifKey => $healthInsurance)
                                                            {
                                                            ?>
                                                            <option value="<?=$hifKey;?>" ><?=$healthInsurance;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="foodallowance" type="checkbox" name="foodAllow" value="1">
                                                            <label class="form-check-label">
                                                                food Allowance
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="allowedFoodDiv" class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Allowed Food</label>
                                                        <input type="text" name="allowFood" class="form-control" placeholder="" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <h4 class="card-title">Salary Break Down</h4>
                                            <hr class="m-0 p-0">
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
                                                        <tr>
                                                            <td>Basic</td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="BasicPer" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="BasicFix" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Home Rent Allownace</td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="HomeRentAllownacePer" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="HomeRentAllownaceFix" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Transport Allownace</td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="TransportAllownacePer" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="TransportAllownaceFix" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Task Allowance</td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="TaskAllowancePer" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="TaskAllowanceFix" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile Allowance</td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="MobileAllowancePer" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="MobileAllowanceFix" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fuel Allowance</td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="FuelAllowancePer" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="FuelAllowanceFix" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Food Allowance</td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="FoodAllowancePer" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" value="" name="FoodAllowanceFix" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            <?=form_close();?>
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
                                                                    <input type="hidden" value="<?=$keygamVal->UserId;?>" name="userId[<?=$stageId;?>][]">
                                                                    <input type="hidden" value="<?=$keygamVal->LevelId;?>" name="levelId[<?=$stageId;?>][]">
                                                                    <input type="text" name="aproval[<?=$stageId;?>][]" class="recipe__text-field" value="<?=$keygamVal->FullName;?>" placeholder="Ingredient">
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
                                                    <span class="recipe-table__add-row-btn">+</span>
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
                                                <input type="hidden" value="" name="userId[<?=$stageId;?>][]">
                                                <input type="hidden" value="" name="levelId[<?=$stageId;?>][]">
                                                <input type="text" name="aproval[<?=$stageId;?>][]" class="recipe__text-field" value="" placeholder="">
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
                $(document).on('click', '.recipe-table__add-row-btn', function (e) {
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
</body>
</html>
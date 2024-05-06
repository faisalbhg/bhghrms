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
						<li class="breadcrumb-item active"><a href="<?=base_url('hrms-grades');?>">Grades</a></li>
						<li class="breadcrumb-item"><a href="<?=base_url('hrms-grades');?>">Lists</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                	<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="mb-3 row">
                                        	<div class="col-sm-6">
                                        		<div class="row">
		                                            <div class="col-sm-9">
		                                                <select class="form-control wide" id="getGradeList">
		                                                	<option value="">Select Company</option>
		                                                	<?php foreach($companies as $company){
			                                                	?>
			                                                	<option value="<?=$company['companyId'];?>"><?=$company['companyName'];?></option>
			                                                	<?php
			                                                	}
			                                                ?>
														</select>
		                                            </div>
		                                            <!-- <div class="col-sm-3">
		                                            	<button type="submit" class="btn btn-primary">Search</button>
		                                            </div> -->
		                                        </div>
	                                        </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>

                <div class="row" id="getListResponse">
                    <style type="text/css">
                        .bar {
  background-color: #fce0de;
  min-width: 300px;
  min-height: 5px;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
}
.bar::after {
  content: "";
  min-height: 5px;
  position: absolute;
  background: red;
  transform: translateX(-100%);
  animation: animate 3s infinite;
}
.bar::before {
  content: "";
  min-height: 5px;
  position: absolute;
  background: red;
  transform: translateX(-100%);
  animation: animate 3s ease-out infinite;
  animation-delay: 1s;
  z-index: 5;
}

.by {
  position: fixed;
  bottom: 10px;
  right: 10px;
  font-family: "roboto";
  font-size: 20px;
}
@keyframes animate {
  0% {
    transform: translateX(-100%);
    min-width: 10px;
  }
  100% {
    transform: translateX(300%);
    min-width: 400px;
  }
}

                    </style>
                    <div class="bar progressBarLoad" style="display:none;"></div>
                    
    					<div class="col-lg-12" >
                            <div class="card" id="getListResponse">
                                <div class="card-header">
                                    <h4 class="card-title">Grade List</h4>
                                </div>
                                <div class="card-body py-0">
                                    <div class="table-responsive" >
                                        <table class="table table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th><strong>SL NO.</strong></th>
                                                    <th><strong>GRADE</strong></th>
                                                    <th><strong>COMPANY</strong></th>
                                                    <th><strong></strong></th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr>
                                                    <td colspan="4" align="center"> Select Company</td>
                                                </tr>
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('#getGradeList').change(function(){
                $('.progressBarLoad').show();
                $('#getListResponse').hide(100);
				$.ajax({
					url: "<?=base_url('get-grades');?>",
					type: "get",
					data: {'companyId':$('#getGradeList').val()} ,
					success: function (gradeResponse) {
						console.log(gradeResponse);
						// You will get response from your PHP page (what you echo or print)
                        $('.progressBarLoad').hide();
                        $('#getListResponse').show(100);
                        $('#getListResponse').html(gradeResponse.gradeList);
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
<!DOCTYPE html>
<html lang="en" class="h-100">

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
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>BHG HRM::Login</title>
	
	<?=view('common/favicon');?>
    <?=view('common/styles');?>

</head>

<body class="vh-100">
    <div class="authincation h-100" style=" background-size:cover; background-position: 100%; background-repeat: no-repeat;">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="<?=base_url('assets/images/logo.svg');?>" width="100%" alt=""></a>
									</div>
                                    <h3 class="text-center mb-4">Forgot Password</h3>
                                    <?php if (isset($validation)) : ?>
                                        <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                            </button>
                                            <strong>Error!</strong> <?= $validation->listErrors() ?>
                                        </div>
                                        
                                    <?php endif; ?>
                                    <?php if (session()->getFlashdata('error') !== NULL) : ?>
                                        <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                            </button>
                                            <strong>Warning!</strong> <?php echo session()->getFlashdata('error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (session()->getFlashdata('success') !== NULL) : ?>
                                        <div class="alert alert-success alert-dismissible alert-alt fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                            </button>
                                            <strong>Success!</strong> <?php echo session()->getFlashdata('success'); ?>
                                        </div>
                                        
                                    <?php endif; ?>
                                    <?= form_open('forgot-password',array("autocomplete"=>"off")); ?>
                                        <?= csrf_field() ?>

                                        <div class="mb-3">
                                            <label class="text-label form-label" for="validationCustomUsername">Username</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Enter your username.." required=""  value="<?= set_value('username'); ?>" name="username">
                                                <div class="invalid-feedback">
                                                    Please Enter a username.
                                                  </div>
                                            </div>
                                        </div>

                                        
                                    
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            
                                            <div class="mb-3">
                                                <a href="<?=base_url('login');?>">Login here?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                                        </div>
                                    <?=form_close();?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?=base_url('assets/vendor/global/global.min.js');?>"></script>
    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
    <script src="<?=base_url('assets/js/dlabnav-init.js?v=0.6');?>"></script>
	
</body>
</html>
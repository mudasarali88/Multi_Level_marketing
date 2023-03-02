<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
    <title>Admin | Reset Password </title>
	
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
		<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Nunito:400,300,700" rel="stylesheet" id="fontFamilySrc" />
<link href=" <?= base_url()."assets/admin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" ?>" rel="stylesheet" />
	<link href="<?= base_url()."assets/admin/plugins/bootstrap/css/bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= base_url()."assets/admin/plugins/font-awesome/css/font-awesome.min.css" ?>" rel="stylesheet" />
	<link href="<?= base_url()."assets/admin/css/animate.min.css" ?>" rel="stylesheet" />
	<link href="<?= base_url()."assets/admin/css/style.min.css" ?>" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url()."assets/admin/plugins/pace/pace.min.js" ?>"></script>
	<!-- ================== END BASE JS ================== -->
	<!--[if lt IE 9]>
	    <script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
        <style>
            .invoice, .login-content, .register-content{
                box-shadow:0 2px 0 rgba(0, 0, 0, 0.0) !important;
            }
            
        </style>
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-container">
	    <!-- begin login -->
		<div class="login">
		    <!-- begin login-brand -->
            <div class="login-brand bg-white text-inverse border-bottom-1">
                <img src="<?= base_url()."assets/admin/img/logodecor.jpg" ?>" height="36" class="pull-right" alt="" /> Reset Password
            </div>
                    <div class="panel" style="height: 300px">
                    <!-- end login-brand -->
                    <!-- begin login-content -->
                    <div class="login-content" id="login-panel">
                        <h4 class="text-center  m-t-0 m-b-20"></h4>
                        
                        <?php if($user){ ?>
                        <form action="<?= base_url()."admin/resetpassword/".$this->uri->segment(3)?>" method="POST" class="form-input-flat">
                            <div class="form-group">
                                <?php if ($this->session->flashdata('message')) { ?>
                                    <div class="alert alert-danger">
                                        <strong>Alert!</strong> <?= $this->session->flashdata('message') ?>.
                                    </div>
                                <?php } ?>
                                   <?php if ($this->session->flashdata('messageSuccess')) { ?>
                                    <div class="alert alert-success">
                                        <strong>Success! </strong> <?= $this->session->flashdata('messageSuccess') ?>.
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <div class="text-danger">
                                    <?php echo form_error('password'); ?>
                                </div>
                                <input type="password" class="form-control input-lg" name="Password"  required  placeholder="Enter New Password" />
                            </div>

                            <div class="form-group">
                                <div class="text-danger">
                                    <?php echo form_error('ConfirmPassword'); ?>
                                </div>
                                <input type="password" class="form-control input-lg" name="ConfirmPassword" required placeholder="Enter Password again" />
                            </div>

                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-lime btn-lg btn-block">Submit</button>
                                </div>
                            </div>

                            <div class="text-left">
                                <a href="<?= base_url()."admin"?>"  class="text-muted"> Go to login?</a>
                            </div>
                        </form>
                        <?php }else{ ?>
                        <div class="alert alert-danger">
                            <strong>Alert!</strong> Invalid link.Please try again for getting correct link.
                        </div>
                        <?php } ?>
                    </div>
                    <!-- end login-content -->
                    
                    </div>
                    
                </div>
		<!-- end login -->
	</div>
	<!-- end page container -->
	
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url()."assets/admin/plugins/jquery/jquery-1.9.1.min.js" ?>"></script>
	<script src="<?= base_url()."assets/admin/plugins/jquery/jquery-migrate-1.1.0.min.js" ?>"></script>
	<script src="<?= base_url()."assets/admin/plugins/jquery-ui/ui/minified/jquery-ui.min.js" ?>"></script>
	<script src="<?= base_url()."assets/admin/plugins/bootstrap/js/bootstrap.min.js" ?>"></script>

	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
	<![endif]-->
	<script src="<?= base_url()."assets/admin/plugins/slimscroll/jquery.slimscroll.min.js" ?>"></script>
	<script src="<?= base_url()."assets/admin/plugins/jquery-cookie/jquery.cookie.js" ?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    	<script src="<?= base_url()."assets/admin/js/formvalidation.js" ?>"></script>
    <script src="<?= base_url()."assets/admin/js/formvalidation_bootstrap.js" ?>"></script>
    	<script src="<?= base_url()."assets/admin/js/custom.js" ?>"></script>
    <script src="<?= base_url()."assets/admin/js/demo.min.js" ?>"></script>
    <script src="<?= base_url()."assets/admin/js/apps.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
		    App.init();
		    Demo.initThemePanel();
		});
	</script>
</body>
</html>

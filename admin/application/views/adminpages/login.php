<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
    <title>Admin | Login Page </title>
	
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
                <img src="<?= base_url()."assets/admin/img/logo.png" ?>" height="36" class="pull-right" alt="" /> Login Panel
            </div>
                    <div class="panel" style="height: 300px">
                    <!-- end login-brand -->
                    <!-- begin login-content -->
                    <div class="login-content" id="login-panel">
                        <h4 class="text-center  m-t-0 m-b-20">Great to have you back!</h4>
                        <form action="Adminlogincheck
                        " method="POST" name="login_form" class="form-input-flat" id="login_form">
                            <div class="form-group">
                                <?php if ($this->session->flashdata('message')) { ?>
                                    <div class="alert alert-danger">
                                        <strong>Alert!</strong> <?= $this->session->flashdata('message') ?>.
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <div class="text-danger">
                                    <?php echo form_error('email'); ?>
                                </div>
                                <input type="email" class="form-control input-lg" name="email" value="<?php echo set_value('email'); ?>" required autofocus placeholder="Email Address" />
                            </div>

                            <div class="form-group">
                                <div class="text-danger">
                                    <?php echo form_error('password'); ?>
                                </div>
                                <input type="password" class="form-control input-lg" name="password" required placeholder="Password" />
                            </div>

                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-lime btn-lg btn-block">Sign in to your account</button>
                                </div>
                            </div>

                            <div class="text-left">
                                <a href="javascript:void(0);" onclick="loginForgotPanel('forgot')"  class="text-muted"> Forgot Your Password?</a>
                            </div>
                        </form>
                    </div>
                    <!-- end login-content -->
                    
                    
                    <!-- begin password panel -->
                    <div class="login-content" id="pass-panel" style="display: none">
                        <form action="<?= base_url()."admin/forgetpass"?>" method="POST" name="login_form" class="form-input-flat" id="forget_form">
                            <div class="form-group">
                               <div class="message">
                              </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" id="email" name="email"  required autofocus placeholder="Email Address" />
                            </div>

                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-lime btn-lg btn-block">Submit</button>
                                </div>
                            </div>

                            <div class="text-left">
                                   <a href="javascript:loginForgotPanel('login');"   class="text-muted">Go to login</a>
                            </div>
                        </form>
                    </div>
                    <!-- end password panel -->
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

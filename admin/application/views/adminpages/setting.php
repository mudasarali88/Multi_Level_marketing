<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
$userinfo = Admininfo($this->session->userdata('ID'));
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Dashboard</a></li>
        <li class="active">Setting </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Setting</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
            <?php if ($this->session->flashdata('message')) { ?>
                <?= $this->session->flashdata('message') ?>
            <?php } ?>

            <div class="col-md-10">
                <form class="form-horizontal fv-form fv-form-bootstrap"  name="setting" method="post">
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Current Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="currentPassword" placeholder="Enter Current Password" required="">
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('currentPassword'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Change Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="Password" placeholder="Enter new Password" required="">
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('Password'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Confirm Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password" required="" >
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('ConfirmPassword'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 col-md-offset-3">
                        <button type="submit" value="submit" class="btn btn-success  m-r-5">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end section -->
    </div>
<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
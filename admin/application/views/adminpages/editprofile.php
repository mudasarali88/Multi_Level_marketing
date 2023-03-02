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
        <li class="active">Edit Profile </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Profile</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
            <?php if ($this->session->flashdata('message')) { ?>
                <?= $this->session->flashdata('message') ?>
            <?php } ?>

            <div class="col-md-10">
                <form class="form-horizontal fv-form fv-form-bootstrap"  name="editProfile" method="post" enctype="multipart/form-data">

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">First Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="FirstName"  name="FirstName" required="" value="<?php echo $userinfo[0]['FirstName']; ?>" placeholder="Enter last name"  data-parsley-required="true">
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('FirstName'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="LastName" value="<?php echo $userinfo[0]['LastName']; ?>" required="" placeholder="Enter last name" >
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('LastName'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-5">
                            <input type="email" class="form-control" name="Email" value="<?php echo $userinfo[0]['Email']; ?>" required="" placeholder="Enter Email Address" >
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('Email'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-4">
                            <input type="file" class="form-control" name="Image">
                        </div>
                        <div class="col-md-4">
                            <?php if (!empty($userinfo[0]['Image'])) { ?>
                            <img class="my-image" src="<?= base_url() . "assets/images/" . $userinfo[0]['Image'] ?>" width="100" height="100" alt="" />
                            <?php } ?>
                        </div>

                    </div>

                    <div class="col-md-7 col-md-offset-3">
                        <button type="submit" value="submit" class="btn btn-success  m-r-5">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end section -->
    </div>


<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
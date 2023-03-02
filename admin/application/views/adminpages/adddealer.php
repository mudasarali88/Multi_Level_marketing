<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
    <!-- begin #content -->
    <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Admin</a></li>
        <li class="active">Add Dealer </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Dealer</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">

            <div class="col-md-10">
                <div class="message col-md-8">
                    <?php if ($this->session->flashdata('message')) { ?>
                        <?= $this->session->flashdata('message') ?>
                    <?php } ?>
                </div>
                <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"   method="post" enctype="multipart/form-data">

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">First Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="FirstName"  name="FirstName" value="<?php echo set_value('FirstName'); ?>" placeholder="Enter last name" required="">
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
                            <input type="text" class="form-control" name="LastName" value="<?php echo set_value('LastName'); ?>" placeholder="Enter last name" required="" >
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
                            <input type="email" class="form-control" name="Email" value="<?php echo set_value('Email'); ?>" placeholder="Enter Email Address" required="" >
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('Email'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="Password" placeholder="Enter Password" required >
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
                            <input type="password" class="form-control" name="ConfirmPassword" placeholder="Enter Password" required>
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('ConfirmPassword'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-5">
                            <input type="file" class="form-control" name="Image">
                        </div>

                    </div>
                    <div class="col-md-7 col-md-offset-3">
                        <button type="submit" value="submit" class="btn btn-success width-100 m-r-5">Submit</button>
                        <button class="btn btn-default width-100" type="reset">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end section -->
    </div>
    <div class="row m-t-20">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border">
            <h2 class="m-b-20">
                Dealer List
            </h2>
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                    <tr class="inverse">
                        <th>Sr#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($DealerList as $item) {
                        $i++; ?>
                        <tr class="odd gradeX" id="row_<?= $item['ID'] ?>">
                            <td><?= $i ?></td>
                            <td><?= $item['FirstName'] ?></td>
                            <td><?= $item['LastName'] ?></td>
                            <td><?= $item['Email'] ?></td>
                            <td><?php if($item['status']){
                                    echo "<button class='btn btn-sm btn-success'>Active</button>";
                                }else{ echo "<button class='btn btn-sm btn-danger'>Ban</button>"; } ?>
                            </td>

                            <td><?php if (empty($item['Image'])) {
                                    echo "N/A";
                                } else {
                                    ?>
                                    <img class="my-image" src="<?= base_url() . "assets/images/" . $item['Image'] ?>" width="50" height="50">
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?= base_url() . "admin/EditDealer/" . $item['ID'] ?>"> <button  class="btn btn-xs btn-primary update"><i class="fa fa-pencil-square-o"></i></button></a>
                                <button onclick="deleteAdmin('<?=  base_url() ?>',<?= $item['ID'] ?>,'Dealer')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
                                <?php if($item['status']){ ?>
                                    <a href='<?= base_url() ?>admin/statusChange/<?= $item['ID'] ?>/0' class='btn btn-sm btn-danger'>Ban Account</a>
                                <?php }else{ ?>
                                    <a href='<?= base_url() ?>admin/statusChange/<?= $item['ID'] ?>/1' class='btn btn-sm btn-success'>Activate</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <!-- end panel -->
        </div>
        <!-- end section-container -->

    </div>
    <!-- end row -->


<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
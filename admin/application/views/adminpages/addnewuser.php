<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
$userinfo = Admininfo($this->uri->segment(3));
?>
    <!-- begin #content -->
    <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Admin</a></li>
        <li class="active">Edit User </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit User</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">

            <div class="col-md-10">


                <!-- <a href="<?= base_url()."admin/AddUser"?>" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add User</a>
                 -->
                <div class="message col-md-8">
                    <?php if ($this->session->flashdata('message')) { ?>
                        <?= $this->session->flashdata('message') ?>
                    <?php } ?>
                </div>
                <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12 "  method="post" enctype="multipart/form-data">

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">First Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="FirstName"  name="FirstName" value="<?php echo set_value('FirstName'); ?>" placeholder="Enter last name" required="" >
                        </div>
<!--                         <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('FirstName'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="LastName" value="<?php echo set_value('LastName'); ?>" required="" placeholder="Enter last name" >
                        </div>
<!--                         <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('LastName'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-5">
                            <input type="radio" name="gender" value="Male" checked=""> Male
                                <input type="radio" name="gender" value="Female"> Female
                                
                        </div>
<!--                         <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('LastName'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Birthday</label>
                        <div class="col-md-5">
                            <input name="dob" id="tbDate" type="date" class="form-control datepicker" required="" value="">
                        </div>
<!--                         <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('LastName'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-5">
                            <input class="form-control" id="phone" name="Telephone" type="number" required="" value="">
                        </div>
<!--                         <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('LastName'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-5">
                            <input type="email" class="form-control" name="Email" value="<?php echo set_value('Email'); ?>" required="" placeholder="Enter Email Address" >

                            <!-- <input type="hidden" class="form-control" name="old_Email" value="<?php echo $userinfo[0]['Email']; ?>" required="" placeholder="Enter Email Address" > -->
                        </div>
                 <!--        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('Email'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Tree Node</label>
                        <div class="col-md-5">
                            <select class="form-control" id="treeNodeSide" name="basicNodeSide" required="" value="">
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                          </select>
                        </div>
<!--                         <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('LastName'); ?>
                            </div>
                        </div> -->
                    </div>

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="Password" placeholder="Enter Password" required="">
                        </div>
<!--                         <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('Password'); ?>
                            </div>
                        </div> -->
                    </div>


                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Sponsor</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="sponsor" placeholder="Refferal ID" name="sponsor" value="" required="">
                        </div>
         <!--                <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('address'); ?>
                            </div>
                        </div> -->
                    </div>
                    
                   
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Select Plan</label>
                        <div class="col-md-5">
                            <select name="splan" class="form-control" id="plan" required="">
                                    <option value="<?=$splan['ID']?>"><?php echo $splan['cat_title']?></option>
                            </select>
                        </div>
         <!--                <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('address'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Select Package</label>
                        <div class="col-md-5">
                            <select name="spackage" class="form-control" id="package" required="">
                                <?php foreach ($packages as $pkey): ?>
                                    <option value="<?=$pkey['ID']?>"><?=$pkey['subcat_title']?></option>
                                <?php endforeach ?>
                                    
                          </select>
                        </div>
         <!--                <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('address'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-md-7 col-md-offset-3">
                        <button type="submit" value="submit" class="btn btn-success width-100 m-r-5">Update</button>
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
                User List
            </h2>
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                    <tr class="inverse">
                        <th>Sr#</th>
                        <th>First Name</th>
                        <!-- <th>Last Name</th> -->
                        <th>Contact</th>
                        <!-- <th>Image</th> -->
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($UserList as $item) {

                        $i++; ?>
                        <tr class="odd gradeX" id="row_<?= $item['ID'] ?>">
                            <td><?= $i ?></td>
                            <td><?= $item['FirstName'] ?> <?= $item['LastName'] ?></td>
                            <!-- <td><?= $item['LastName'] ?></td> -->
                            <td><?= $item['Email'] ?><br><?= $item['Telephone'] ?></td>
                            <!-- <td><?php if (empty($item['Image'])) {
                                    echo "N/A";
                                } else {
                                    ?>
                                    <img class="my-image" src="<?= base_url() . "assets/images/" . $item['Image'] ?>" width="50" height="50">
                                <?php } ?></td> -->
                            <td>
                                <a href="<?= base_url() . "admin/EditUser/" . $item['ID'] ?>"> <button  class="btn btn-xs btn-primary update"><i class="fa fa-pencil-square-o"></i></button></a>
                                <button onclick="deleteAdmin('<?=  base_url() ?>',<?= $item['ID'] ?>,'User')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
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
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
                            <input type="text" class="form-control" id="FirstName"  name="FirstName" value="<?php echo $userinfo[0]['FirstName']; ?>" placeholder="Enter last name" required="" >
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
                            <input type="text" class="form-control" name="LastName" value="<?php echo $userinfo[0]['LastName']; ?>" required="" placeholder="Enter last name" >
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
                            <input type="email" class="form-control" name="Email" value="<?php echo $userinfo[0]['Email']; ?>" required="" placeholder="Enter Email Address" >

                            <input type="hidden" class="form-control" name="old_Email" value="<?php echo $userinfo[0]['Email']; ?>" required="" placeholder="Enter Email Address" >
                        </div>
                 <!--        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('Email'); ?>
                            </div>
                        </div> -->
                    </div>

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Change Password (optional)</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="Password" placeholder="Enter Password" >
                        </div>
<!--                         <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('Password'); ?>
                            </div>
                        </div> -->
                    </div>

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Confirm Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="ConfirmPassword" placeholder="Enter Password" >
                        </div>
 <!--                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('ConfirmPassword'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="Telephone" placeholder="Enter Password"  value="<?php echo $userinfo[0]['Telephone']; ?>" >
                        </div>
 <!--                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('Telephone'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="address" placeholder="Enter Address"  value="<?php echo $userinfo[0]['Address']; ?>">
                        </div>
         <!--                <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('address'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Gender</label>
                        <div class="col-md-5">
                            <select class="form-control" name="gender">
                                <option value="Male" <?=($userinfo[0]['gender']=='Male'?'selected':'')?>>Male</option>
                                <option value="Female" <?=($userinfo[0]['gender']=='Female'?'selected':'')?>>FeMale</option>
                                <option value="Others" <?=($userinfo[0]['gender']=='Others'?'selected':'')?>>Other</option>
                            </select> 
                            <!-- <input type="password" class="form-control" name="ConfirmPassword" placeholder="Enter Password"  value="<?php echo $userinfo[0]['Email']; ?>"> -->
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('ConfirmPassword'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Birthday</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="dob" placeholder="date"  value="<?php echo $userinfo[0]['dob']; ?>">
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('ConfirmPassword'); ?>
                            </div>
                        </div> -->
                    </div>
                    
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-5">
                            <select  class="form-control" name="Country" id="signupCountry">
                                
                            <?php foreach ($countryList as $countryItem): ?>
                                
                            <option value="<?=$countryItem['name']?>" <?=($userinfo[0]['Country']==$countryItem['name']?'selected':'')?>><?=$countryItem['name']?></option>
                            <?php endforeach ?>
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">State</label>
                        <div class="col-md-5">
                            <select  class="form-control" name="State" id="signupState">
                                
                            <?php foreach ($stateList as $stateItem): ?>
                                
                            <option value="<?=$stateItem['name']?>" <?=($userinfo[0]['Country']==$stateItem['name']?'selected':'')?>><?=$stateItem['name']?></option>
                            <?php endforeach ?>
                            </select>
                    </div>
                </div>
                    
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-5">
                            <select  class="form-control" name="City" id="signupCity">
                                    
                            <?php foreach ($cityList as $cityItem): ?>
                                
                            <option value="<?=$cityItem['name']?>" <?=($userinfo[0]['Country']==$cityItem['name']?'selected':'')?>><?=$cityItem['name']?></option>
                            <?php endforeach ?>
                            
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Zip Code</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="ZipCode" placeholder="Enter Password"  value="<?php echo $userinfo[0]['ZipCode']; ?>">
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
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-5">
                           <textarea  name="description" class="form-control" cols="50" rows="8">
                               <?php echo $userinfo[0]['description']; ?>
                           </textarea>
                        </div>
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
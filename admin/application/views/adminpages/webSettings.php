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
        <li class="active">Web Setting </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Web Setting</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div container>
    <div class="row">

        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
                <form class="form-horizontal fv-form fv-form-bootstrap"  method="post">
            <?php if ($this->session->flashdata('message')) { ?>
                <?= $this->session->flashdata('message') ?>
            <?php } ?>

            <div class="col-md-8 col-md-offset-1">
                <div class="row">
                    <!-- <div class="text text-left col-sm-12"><h4>Signup Settings</h4></div> -->
                    <div class="form-group m-b-5 col-sm-6">
                        <label class=" control-label">WebSite Name</label>
                        <div class="">
                            <input type="text" class="form-control" name="site_name" placeholder="site title" required="" value="<?=$setting['site_name']?>" >
                        </div>
                        <div class="">
                            <div class="text-danger">
                                <?php echo form_error('site_name'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-5 col-sm-6 pull-right">
                        <label class=" control-label">Website Contact</label>
                        <div class="">
                            <input type="text" class="form-control" name="site_contact" placeholder="Contact" required="" value="<?=$setting['site_contact']?>" >
                        </div>
                        <div class="">
                            <div class="text-danger">
                                <?php echo form_error('site_contact'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-5 col-sm-6">
                        <label class=" control-label">Website Email</label>
                        <div class="">
                            <input type="text" class="form-control" name="site_email" placeholder="site email" required="" value="<?=$setting['site_email']?>" >
                        </div>
                        <div class="">
                            <div class="text-danger">
                                <?php echo form_error('site_email'); ?>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group m-b-5 col-sm-6 pull-right">
                        <label class=" control-label">Address to show on web</label>
                        <div class="">
                            <input type="text" class="form-control" name="site_address" placeholder="site address" required="" value="<?=$setting['site_address']?>" >
                        </div>
                        <div class="">
                            <div class="text-danger">
                                <?php echo form_error('site_address'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="text col-sm-12">
                        <hr>
                        
                    </div> -->
                    <!-- <div class="text text-left  col-sm-12"><h4>Ads Settings</h4></div> -->
                    <div class="form-group m-b-5 col-sm-6">
                        <label class=" control-label">Advance Package Comission(%)</label>
                        <div class="">
                            <input type="text" class="form-control" name="customerAdRate" placeholder="Customer Ad Charges" required="" value="<?=$setting['customerAdRate']?>" >
                        </div>
                        <div class="">
                            <div class="text-danger">
                                <?php echo form_error('customerAdRate'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group m-b-5 col-sm-6 pull-right">
                        <label class=" control-label">Employee Ad Charges($)</label>
                        <div class="">
                            <input type="text" class="form-control" name="employeeAdRate" placeholder="Employee ad charges" required="" value="<?=$setting['employeeAdRate']?>" >
                        </div>
                        <div class="">
                            <div class="text-danger">
                                <?php echo form_error('employeeAdRate'); ?>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="form-group m-b-5 col-sm-6">
                        <label class="control-label">Customer Ad Through Employee Charges($) </label>
                        <div class="">
                            <input type="text" class="form-control" name="customerAdFromEmployeeRate" placeholder="Customer Ad Through Employee Charges" required="" value="<?=$setting['customerAdFromEmployeeRate']?>" >
                        </div>
                        <div class="">
                            <div class="text-danger">
                                <?php echo form_error('customerAdFromEmployeeRate'); ?>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="form-group m-b-5 col-sm-6 pull-right">
                        <label class="control-label">Commission to Emplyee from Through Emplyee Ads(%) </label>
                        <div class="">
                            <input type="text" class="form-control" name="commissionToEmplyee" placeholder="Commission to Emplyee from Through Emplyee Ads" required="" value="<?=$setting['commissionToEmplyee']?>" >
                        </div>
                        <div class="">
                            <div class="text-danger">
                                <?php echo form_error('commissionToEmplyee'); ?>
                            </div>
                        </div>
                    </div> -->
                     <!-- <div class="text col-sm-12">
                        <hr>
                        
                    </div> -->
                     
                            
                    <div class="form-group col-sm-12">
                        <button type="submit" value="submit" class="btn btn-success pull-right">Change Settings</button>
                    </div>
                <!-- </form> -->
            </div>
            </div>
        </form>
        </div>
        <!-- end section -->
    </div>
    </div>
<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Payment Packages</a></li>
        <li class="active">Edit Payment Packages</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Payment Packages</h1>
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

                <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"  name="AddSlider" method="post" enctype="multipart/form-data">

                    
                    <div class="form-group m-b-10">


                        <label class="col-md-5 control-label">Package Title</label>
                        
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="packageTitle" value="<?= $package['packageTitle'];?>">
                        </div>



                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">Package Duaration(days)</label>
                        
                        <div class="col-md-5">
                            <input type="number" class="form-control" name="duration" value="<?= $package['duration'];?>">
                            <input type="hidden" class="form-control" name="packageId" value="<?= $package['packageId'];?>">
                        </div>

                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">Package Charges($)</label>
                        
                        <div class="col-md-5">
                            <input type="number" class="form-control" name="packageCharges" value="<?= $package['packageCharges'];?>">
                        </div>

                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">Package Discount(%)</label>
                        
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="packageDiscount" value="<?= $package['packageDiscount'];?>">
                        </div>

                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">User Type</label>
                        
                        <div class="col-md-5">
                            <select  class="form-control" name="userType" required>
                                <option value="">Select User Type</option>
                                <option value="c"<?=($package['customerType']=='c'?'SELECTED':'')?>>Customer</option>
                                <option value="e"<?=($package['customerType']=='e'?'SELECTED':'')?>>Employee</option>
                                <option value="te"<?=($package['customerType']=='te'?'SELECTED':'')?>>Through Emplyee</option>
                            </select>
                        </div>

                    </div>
                    
                    <div class="col-md-7 col-md-offset-5">
                        <button type="submit" value="submit"  class="btn btn-success width-100 m-r-5">Submit</button>
                        <button class="btn btn-default width-100" type="reset">Cancel</button>
                    </div>
                </form>
            </div>

    <!-- end row -->





        </div>
        <!-- end section -->
    </div>
    

<?php
require_once(APPPATH . "views/includes/admin/footer.php");

?>

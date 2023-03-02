<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Payment Packages</a></li>
        <li class="active">Add Payment Package</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Payment Package</h1>
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
                            <input type="text" class="form-control" name="packageTitle" required>
                        </div>

                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">Package Duaration(days)</label>
                        
                        <div class="col-md-5">
                            <input type="number" class="form-control" name="duration" required>
                        </div>

                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">Package Charges($)</label>
                        
                        <div class="col-md-5">
                            <input type="number" class="form-control" name="packageCharges" required>
                        </div>

                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">Discount(%)</label>
                        
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="packageDiscount" required>
                        </div>

                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">Package For</label>
                        
                        <div class="col-md-5">
                            <select  class="form-control" name="userType" required>
                                <option value="">Select User Type</option>
                                <option value="c">Customer</option>
                                <option value="e">Employee</option>
                                <option value="te">Through Emplyee</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-7 col-md-offset-5">
                        <button type="submit" value="submit"  class="btn btn-success width-100 m-r-5">Submit</button>
                        <button class="btn btn-default width-100" type="reset">Cancel</button>
                    </div>
                </form>
            </div>

    <div class="row m-t-20 col-md-12">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border">
            <h2 class="m-b-20">
                Payment Packages
            </h2>
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                    <tr class="inverse">
                        <th width="15%">Sr#</th>
                        <th>Package Title</th>
                        <th>Package Duration</th>
                        <th>Package Charges</th>
                        <th>Status</th>
                        <th width="15%">Action</th>


                    </tr>
                    </thead>
                    <tbody>

                    <?php $i = 0;
                    if(isset($packages)){
                    foreach ($packages as $item) {
                        $i++; ?>
                        <tr class="odd gradeX" id="row_<?= $item['packageId'] ?>">
                            <td><?= $i ?></td>
                            <td><p><?= $item['packageTitle'] ?></p></td>
                            <td><p><?= $item['duration'] ?></p></td>
                            <td><p><?= $item['packageCharges'] ?></p></td>
                            <td><?php if ($item['status'] == '1'): ?>
                                <a href="<?= base_url()?>Admin/updatePackage/0/<?= $item['packageId'] ?>"><label class="label-success label_adj" data-toggle="tooltip" title="click to deactivate!">Active</label></a>
                            <?php else: ?>
                                <a href="<?= base_url()?>Admin/updatePackage/1/<?= $item['packageId'] ?>"><label class="label-warning label_adj" data-toggle="tooltip" title="click to activate!">deactive</label></a>
                            <?php endif ?>
                        </td>
                            <td>
                                <a onclick="confirm('Are you sure??')" href="<?= base_url()?>admin/deletePackage/<?= $item['packageId'] ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                <a href="<?= base_url()?>admin/EditPackage/<?= $item['packageId'] ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> edit</a>
                            </td>
                        </tr>
                    <?php }} ?>

                    </tbody>
                </table>
            </div>
            <!-- end panel -->
        </div>
        <!-- end section-container -->

    </div>
    <!-- end row -->





        </div>
        <!-- end section -->
    </div>
    

<?php
require_once(APPPATH . "views/includes/admin/footer.php");

?>

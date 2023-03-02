<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?= base_url() ?>country">Coupens</a></li>
        <li class="active">Add Coupen </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Coupen</h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
            
            <div class="col-md-10">
                <!-- <a href="<?= base_url()."country/subCategories"?>" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Sub Category</a> -->

                <div class="message col-md-8">
                <?php if ($this->session->flashdata('message')) { ?>
                    <?= $this->session->flashdata('message') ?>
                <?php } ?>
                </div>
            <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"  name="Country" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ads_id" value="<? -$this->uri->segment(3) ?>">

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Coupen Code </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="coupenCode" required="" value="<?php echo set_value('coupenCode'); ?>" placeholder="Cupen COde"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('coupenCode'); ?>
                            </div>
                        </div>
                    </div>

                <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Start Date</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control"  name="startDate"  value="<?php echo set_value('startDate'); ?>" placeholder=""   data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('startDate'); ?>
                            </div>
                        </div>
                    </div>
                <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">End Date</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control"  name="endDate"  value="<?php echo set_value('endDate'); ?>" placeholder=""   data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('endDate'); ?>
                            </div>
                        </div>
                    </div>


                <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('limit'); ?>
                        </div>
                        <label class="col-md-3 control-label">Usage Limit</label>
                        <div class="col-md-5">
                            <input type="number" placeholder="leave empty if unlimited usage Required" class="form-control" value="<?php echo set_value('limit'); ?>" name="limit">
                        </div>
                </div>

                <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('discountPersontage'); ?>
                        </div>
                        <label class="col-md-3 control-label">Discount %</label>
                        <div class="col-md-5">
                            <input type="number" placeholder="leave empty if unlimited Discount Required" class="form-control" value="<?php echo set_value('discountPersontage'); ?>" name="discountPersontage">
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
                Country List
            </h2>
            <!-- begin panel -->
            <?php //echo "<pre>";var_dump($categories); ?>
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                        <tr class="inverse">
                        <th>Sr#</th>
                        <th>Coupen Code</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Usage Limit</th>
                        <th>Discount %</th>
                        <th>Status</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($coupen as $item) {
                         // echo "<pre>"; var_dump($item); die();

                            $i++; ?>
                         <tr class="odd gradeX" id="row_<?= $item['coupenId'] ?>">
                                <td><?= $i ?></td>
                                <td><?= $item['coupenCode'] ?></td>
                                <td><?= date('M d, Y', strtotime($item['fromDate'])) ?></td>
                                <td><?= date('M d, Y', strtotime($item['toDate'])) ?></td>
                                <td><?= $item['limit'] ?></td>
                                <td><?= $item['discountPersontage'] ?></td>
                                <td>
                                    <?php if($item['coupenStatus']=='1'): ?>
                                <a href="<?=base_url()?>Coupen/changeCoupenStatus/0/<?=$item['coupenId']?>"><img src="<?=base_url()?>assets/images/on.png" width="20" title="Click to change Global Status"></a>
                                <?php else: ?>
                                <a href="<?=base_url()?>Coupen/changeCoupenStatus/1/<?=$item['coupenId']?>"><img src="<?=base_url()?>assets/images/off.png" width="20" title="Click to change Global Status"></a>
                                <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() . "Coupen/EditCoupen/" . $item['coupenId'] ?>"> 
                                        <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></button>
                                    </a>
                                    <button onclick="deleteCoupen('<?=  base_url() ?>',<?= $item['coupenId'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
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
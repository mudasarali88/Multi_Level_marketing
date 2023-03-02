<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
    <!-- begin #content -->
    <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Post</a></li>
        <li class="active">Edit Post</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Post</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
            <div class="message">
                <?php if ($this->session->flashdata('message')) { ?>
                    <?= $this->session->flashdata('message') ?>

                <?php 
                var_dump($coupen);
            } ?>
            </div>
                       <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"  name="Country" method="post" enctype="multipart/form-data">

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Coupen Code </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="coupenCode" required="" value="<?= $coupen[0]['coupenCode'] ?>" placeholder="Cupen COde"  data-parsley-required="true">
                            <!-- <input type="text" class="form-control"  name="coupenCode" required="" value="$country[0]['sortname']" placeholder="Cupen COde"  data-parsley-required="true"> -->

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
                            <input type="date" class="form-control"  name="startDate"  value="<?= $coupen[0]['fromDate'] ?>" placeholder=""   data-parsley-required="true">
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
                            <input type="date" class="form-control"  name="endDate"  value="<?= $coupen[0]['toDate'] ?>" placeholder=""   data-parsley-required="true">
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
                            <input type="number" placeholder="leave empty if unlimited usage Required" class="form-control" value="<?= $coupen[0]['limit'] ?>" name="limit">
                        </div>
                </div>

                <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('discountPersontage'); ?>
                        </div>
                        <label class="col-md-3 control-label">Discount %</label>
                        <div class="col-md-5">
                            <input type="number" placeholder="leave empty if unlimited Discount Required" class="form-control" value="<?= $coupen[0]['discountPersontage'] ?>" name="discountPersontage">
                        </div>
                </div>


                <div class="col-md-7 col-md-offset-3">
                        <button type="submit" value="submit" class="btn btn-success width-100 m-r-5">Submit</button>
                        <button class="btn btn-default width-100" type="reset">Cancel</button>
                    </div>
                </form>
        </div>
        <!-- end section -->
    </div>

<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
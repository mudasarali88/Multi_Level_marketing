<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Sub Package</a></li>
        <li class="active">Edit Package </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Package</h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
          <div class="col-md-10">
                <a href="<?= base_url()."categories/subCategories"?>" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Package</a>
            
              <div class="message col-md-8">
            <?php if ($this->session->flashdata('message')) { ?>
                   <?= $this->session->flashdata('message') ?>
            <?php } ?>
            </div>
            <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"  name="subcat_Categories" method="post"  enctype="multipart/form-data">

                <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Select Plan </label>
                        <div class="col-md-5">
                            <select class="form-control"  name="cat_ID" required="">
                                <option value="">Select Plan</option>
                                <?php foreach ($categories as $item) { ?>
                                <option value="<?= $item['ID'] ?>" <?php if($subcategory[0]['cat_ID'] == $item['ID']){echo'selected';} ?>><?= $item['cat_title'] ?></option>
                              <?php   } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('cat_ID'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Package title</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="subcat_title" required="" value="<?= $subcategory[0]['subcat_title'] ?>"   data-parsley-required="true">
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('subcat_title'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Package Price</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control"  name="price" value="<?= $subcategory[0]['price'] ?>" placeholder="price"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('price'); ?>
                            </div>
                        </div>
                    </div>

              <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Comission %</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control"  name="comission"  value="<?= $subcategory[0]['comission'] ?>" placeholder="e.g 10, 15, 20"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('comission'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('subcatimage'); ?>
                        </div>
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-5">
                            <input type="file" class="form-control" name="subcatimage">
                        </div>
                </div>
                  <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Badge Title</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="badge_title"  value="<?php echo set_value('badge_text'); ?>" placeholder="badge title"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('badge_text'); ?>
                            </div>
                        </div>
                    </div>
              <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Badge Color</label>
                        <div class="col-md-5">
                            <input type="color" class="form-control"  name="badge_color"  value="<?php echo set_value('badge_color'); ?>" placeholder="#cccccc"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('badge_color'); ?>
                            </div>
                        </div>
                    </div> -->
                              


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

        <!-- end section-container -->

    </div>
    <!-- end row -->


<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
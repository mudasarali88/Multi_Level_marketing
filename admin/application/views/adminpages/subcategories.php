<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Plan</a></li>
        <li class="active">Add Package </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Package</h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
            
            <div class="col-md-10">
                <a href="<?= base_url()."categories"?>" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Plan</a>
            <div class="message col-md-8">
                <?php if ($this->session->flashdata('message')) { ?>
                    <?= $this->session->flashdata('message') ?>
                <?php } ?>
                </div>
            <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"   name="subcat_title" method="post" enctype="multipart/form-data">

                <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Select Plan </label>
                        <div class="col-md-5">
                            <select class="form-control"  name="cat_ID" required="">
                                <option value="">Select Plan</option>
                                <?php foreach ($categories as $item) { ?>
                                <option value="<?= $item['ID'] ?>"><?= $item['cat_title'] ?></option>
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
                        <label class="col-md-3 control-label">Package</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="subcat_title" required="" value="<?php echo set_value('subcat_title'); ?>" placeholder="Enter Package"  data-parsley-required="true">
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
                            <input type="number" class="form-control"  name="price"  value="<?php echo set_value('price'); ?>" placeholder="price"  data-parsley-required="true">
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
                            <input type="number" class="form-control"  name="comission"  value="<?php echo set_value('comission'); ?>" placeholder="e.g 10, 15, 20"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('comission'); ?>
                            </div>
                        </div>
                    </div>
              <!-- <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Is Parent</label>
                        <div class="col-md-5">
                            <select  class="form-control isParentClass"  name="isParent" required>
                                <option value="">Select One</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('isParent'); ?>
                            </div>
                        </div>
                    </div>
              <div class="form-group m-b-10 parentSubCat" style="display: none;">
                        <label class="col-md-3 control-label">Choose Parent</label>
                        <div class="col-md-5">
                            <select  class="form-control parentId"  name="parentId">
                                <option value="">Select Parent</option>
                                <?php foreach ($parentSubcategories as $parentkey): ?>
                                    
                                <option value="<?=$parentkey['ID']?>"><?=$parentkey['subcat_title']?></option>
                                <?php endforeach ?>
                            </select>
                            
                        </div>  
                        
                    </div>
                    <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('subcatimage'); ?>
                        </div>
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-5">
                            <input type="file" class="form-control" name="subcatimage">
                        </div>
                </div> -->
              <!-- <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Short Description</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="badge_title"  value="<?php echo set_value('badge_text'); ?>" placeholder="Description"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('badge_text'); ?>
                            </div>
                        </div>
                    </div> -->
              <!-- <div class="form-group m-b-10">
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

            <div class="form-group m-b-10 col-md-12">
                <label class="col-md-4 control-label m-t-10">Select Plan for View Package list</label>
                <div class="col-md-5">
                    <select class="form-control"  name="" onchange="javascript:if($(this).val() !=''){window.location.href='<?= base_url() ?>categories/subCategories/'+$(this).val();}">
                        <option value="">Select Plan</option>
                        <?php foreach ($categories as $item) { ?>
                            <option value="<?= $item['ID'] ?>" <?php if($this->uri->segment(3)==$item['ID']){echo"selected";} ?>><?= $item['cat_title'] ?></option>
                        <?php   } ?>
                    </select>
                </div>
            </div>

            <?php if($subcategories){?>
            <h2 class="m-b-20">
               Package List <?php if($this->uri->segment(3)){  echo"For ".$category[0]['cat_title']; }?>

            </h2>
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                        <tr class="inverse">
                            <th>Sr#</th>
                            <th>Package</th>
                            <th>Plan</th>
                            <th>Price</th>
                            <th>Comission %</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($subcategories as $item) {
                            $i++; ?> 
                        <tr class="odd gradeX" id="row_<?= $item['ID'] ?>">
                        <td><?= $i ?></td>
                        <td><?= $item['subcat_title'] ?></td>
                        <td><?= $item['cat_title'] ?></td>
                        <td><?=$item['price']?></td>
                        <td><?=$item['comission']?></td>
                        <td>
                        <a href="<?= base_url() . "categories/EditsubCategories/" . $item['ID'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                        <button onclick="deletesubCategories('<?=  base_url() ?>',<?= $item['ID'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- end panel -->
            <?php } ?>

        </div>
        <!-- end section-container -->

    </div>
    <!-- end row -->


<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
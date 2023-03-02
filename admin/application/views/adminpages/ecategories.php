<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Categories</a></li>
        <li class="active">Categories </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Categories</h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
                <?php if ($this->session->flashdata('message')) { ?>
                    <?= $this->session->flashdata('message') ?>
                <?php } ?>
                <div class="message col-md-8">
                </div>
            
            <div class="col-md-10">
                <a href="<?= base_url()."E_categories/subCategories"?>" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i>Add Sub Categories</a>

            <form action="<?= base_url()."E_categories"?>" class="form-horizontal fv-form fv-form-bootstrap row col-md-12"  name="Category" method="post" enctype="multipart/form-data">

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Category title </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="cat_title" required="" value="<?php echo set_value('cat_title'); ?>" placeholder="Enter Category"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('cat_title'); ?>
                            </div>
                        </div>
                    </div>

                <!-- <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Position number</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control"  name="cat_order"  value="<?php echo set_value('cat_order'); ?>" placeholder="0"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('cat_order'); ?>
                            </div>
                        </div>
                    </div> -->
               <!--  <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Icon class</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="cat_class"  value="" placeholder="fa fa-star"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('cat_order'); ?>
                            </div>
                        </div>
                    </div> -->


                <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('Image'); ?>
                        </div>
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
                Categories List
            </h2>
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                        <tr class="inverse">
                        <th width="10%">Sr#</th>
                        <th width="20%">Categories</th>
                        <th width="20%">Image</th>
                        <th width="25%">Show on index</th>
                        <th width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($categories as $item) {
                            $i++; ?>
                         <tr class="odd gradeX" id="row_<?= $item['ID'] ?>">
                                <td><?= $i ?></td>
                                <td><?= $item['cat_title'] ?></td>
                                 <td>
                                <?php if($item['Image'] != ''){ ?>
                                <image class="my-image" src="<?= base_url()."assets/images/CategoriesImages/".$item['Image'] ?>" width="70" height="70" />
                                <?php }else{echo "N/A";} ?>

                                </td>
                                 <td>
                                <?php if($item['show'] != '0'){ ?>
                                    <a href="categories/showDat/0/<?= $item['ID'] ?>" class="label label-success">Show</a>
                                   
                                <?php }else{ ?>
                                     <a href="categories/showDat/1/<?= $item['ID'] ?>" class="label label-danger">Do not Show</a>
                               <?php } ?>
                                </td>
                                <td class="text-right">
                                    <a href="<?= base_url() . "E_categories/EditCategories/" . $item['ID'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                                    <a href="<?= base_url() . "E_categories/subCategories/" . $item['ID'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> subcategories </button></a>
                                     <button onclick="deleteCategories('<?=  base_url() ?>',<?= $item['ID'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
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
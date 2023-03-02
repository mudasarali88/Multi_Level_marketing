<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
    <!-- begin #content -->
    <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Product</a></li>
        <li class="active">Edit Product</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Product</h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
            <div class="message">
                <?php if ($this->session->flashdata('message')) { ?>
                    <?= $this->session->flashdata('message') ?>
                <?php } ?>
            </div>
            <form class="form-horizontal fv-form fv-form-bootstrap"  name="Addproduct" method="post" enctype="multipart/form-data">

                <div class="col-md-6"><!--- English end----->

                    <div class="form-group m-b-10">
                        <div class="text-danger">
                            <?php echo form_error('product_title'); ?>
                        </div>
                        <label class="col-md-2 control-label">Title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" required=""  name="product_title" value="<?php echo $product[0]['product_title']  ?>" placeholder="Enter product title">
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <div class="text-danger">
                            <?php echo form_error('price'); ?>
                        </div>
                        <label class="col-md-2 control-label">Price ($)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" required=""  name="price" value="<?php echo $product[0]['price']  ?>" placeholder="Enter product price">
                        </div>
                    </div>

                </div><!--- English end----->


                <div class="col-md-12">

                    <div class="form-group m-b-10 ">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('dealer_ID'); ?>
                        </div>
                        <label class="col-md-1 control-label">Dealer</label>
                        <div class="col-md-5 text-left">
                            <select class="form-control select2"   name="dealer_ID" required="">
                                <option value="">Select Dealer</option>
                                <?php foreach ($dealers as $item) { ?>
                                    <option value="<?= $item['ID'] ?>" <?php if($product[0]['dealer_ID']==$item['ID']){ echo 'selected';} ?>><?= $item['FirstName']." ".$item['LastName']." | ".$item['Email'] ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-b-10 ">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('cat_ID'); ?>
                        </div>
                        <label class="col-md-1 control-label">Category</label>
                        <div class="col-md-5 text-left">
                            <select class="form-control select2" onchange="getCategoriesID('<?=  base_url() ?>',this.value)"  name="cat_ID" required="">
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $item) { ?>
                                    <option value="<?= $item['ID'] ?>" <?php if($product[0]['cat_ID']==$item['ID']){ echo 'selected';} ?>><?= $item['cat_title'] ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <div class=" col-md-offset-2  text-danger">
                            <?php echo form_error('subcat_ID'); ?>
                        </div>
                        <label class="col-md-1 control-label">Sub Category</label>
                        <div class="col-md-5">
                            <select class="form-control select2" id="subcat_ID"  name="subcat_ID" required>
                                <option value="">Select Sub Category</option>
                                <?php foreach ($subcategories as $item) { ?>
                                    <option value="<?= $item['ID'] ?>" <?php if($product[0]['subcat_ID']==$item['ID']){ echo 'selected';} ?>><?= $item['subcat_title'] ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <div class="text-danger">
                            <?php echo form_error('product_desc'); ?>
                        </div>
                        <label class="col-md-1 control-label">Description</label>
                        <div class="col-md-5">
                            <textarea class="form-control"  name="product_desc" required=""><?php echo $product[0]['product_desc']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('isHomepage'); ?>
                        </div>
                        <label class="col-md-2 control-label text-left">Is Home page product?</label>
                        <div class="col-md-4 m-t-10">
                            Yes<input type="radio" class="" name="isHomepage" required="" value="1" <?php if($product[0]['isHomepage']){echo"checked";} ?> > No <input type="radio" class="" name="isHomepage" required="" <?php if(!$product[0]['isHomepage']){echo"checked";} ?> value="0">
                        </div>
                    </div>


                    <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('Image'); ?>
                        </div>
                        <label class="col-md-1 control-label">Image</label>
                        <div class="col-md-5">
                            <input type="file" class="form-control" name="Image"  value="<?php echo set_value('image'); ?>">
                        </div>
                        <div class="col-md-5">
                            <image class="my-image" src="<?= base_url()."assets/images/".$product[0]['Image'] ?>" width="150" height="100" />
                        </div>

                    </div>


                </div>
                <div class="m-b-10 col-md-7 col-md-offset-1 m-t-25">
                    <button type="submit" value="submit" class="btn btn-success width-100 m-r-5">Update</button>

                </div>

            </form>
        </div>
        <!-- end section -->
    </div>

<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
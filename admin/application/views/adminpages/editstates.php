<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">States</a></li>
        <li class="active">Edit States </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit States</h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
          <div class="col-md-10">
                <a href="<?= base_url()."country/States"?>" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add States</a>
            
              <div class="message col-md-8">
            <?php if ($this->session->flashdata('message')) { ?>
                   <?= $this->session->flashdata('message') ?>
            <?php } ?>
            </div>
            <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"  name="subcat_Categories" method="post">

                <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Select Country </label>
                        <div class="col-md-5">
                            <select class="form-control"  name="country_id" required="">
                                <option value="">Select Country</option>
                                <?php foreach ($country as $item) { 
                                    // var_dump($item); die();
                                    ?>
                                <option value="<?= $item['id'] ?>" <?php if($state[0]['country_id']==$item['id']){echo"selected";} ?>>
                                    <?= $item['name'] ?></option>
                              <?php   } ?>
                            </select>
                            <!-- <input type="text" class="form-control"  name="subcat_title" required="" value="<?= $categories[0]['id'] ?>" placeholder="<?= $categories[0]['name'] ?>"   data-parsley-required="true"> -->
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('country_id'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">State</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="state" required="" value="<?= $state[0]['name'] ?>"   data-parsley-required="true">
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('state'); ?>
                            </div>
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

        <!-- end section-container -->

    </div>
    <!-- end row -->


<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
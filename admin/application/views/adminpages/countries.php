<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?= base_url() ?>country">Country</a></li>
        <li class="active">Add Country </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Country</h1>
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

                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">ISO Code </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="sort_name" required="" value="<?php echo set_value('sort_name'); ?>" placeholder="e.g PK"  data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('sort_name'); ?>
                            </div>
                        </div>
                    </div>

                <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Country Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="country_name"  value="<?php echo set_value('country_name'); ?>" placeholder="Enter Country Name"   data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('country_name'); ?>
                            </div>
                        </div>
                    </div>
                <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Country code</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="phone_code"  value="<?php echo set_value('phone_code'); ?>" placeholder="e.g +92"   data-parsley-required="true">
                        </div>  
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('phone_code'); ?>
                            </div>
                        </div>
                    </div>


               <!--  <div class="form-group m-b-10">
                        <div class="col-md-offset-2  text-danger">
                            <?php echo form_error('Image'); ?>
                        </div>
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-5">
                            <input type="file" class="form-control" name="Image">
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
            <h2 class="m-b-20">
                Country List
            </h2>
            <!-- begin panel -->
            <?php //echo "<pre>";var_dump($categories); ?>
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                        <tr class="inverse">
                        <th width="10%">Sr#</th>
                        <th width="15%">ISO Code</th>
                        <th width="25%">Country</th>
                        <th width="20%">Country Code</th>
                        <th width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($countries as $item) {
                         // echo "<pre>"; var_dump($item); die();

                            $i++; ?>
                         <tr class="odd gradeX" id="row_<?= $item['id'] ?>">
                                <td><?= $i ?></td>
                                <td><?= $item['sortname'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['phonecode'] ?></td>
                                <td>
                                    <a href="<?= base_url() . "Country/EditCountries/" . $item['id'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                                    <a href="<?= base_url() . "Country/states/" . $item['id'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Add States</button></a>
                                    <button onclick="deleteCountries('<?=  base_url() ?>',<?= $item['id'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
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
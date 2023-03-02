<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">State</a></li>
        <li class="active">Add State </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add State</h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border p-b-10">
            
            <div class="col-md-10">
                <a href="<?= base_url()."Country/States/".$this->uri->segment(3)?>" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add State</a>
            <div class="message col-md-8">
                <?php if ($this->session->flashdata('message')) { ?>
                    <?= $this->session->flashdata('message') ?>
                <?php } ?>
                </div>
            <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"   name="subcat_title" method="post">

                <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Select Country </label>
                        <div class="col-md-5">
                            <select class="form-control"  name="country_ID" required="">
                                <option value="">Select Country</option>
                                <?php foreach ($countries as $item) { ?>
                                <option value="<?= $item['id'] ?>" <?=($item['id']==$this->uri->segment(3)?'SELECTED':'')?>><?= $item['name'] ?></option>
                              <?php   } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('country_ID'); ?>
                            </div>
                        </div>
                    </div>
                     
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">State</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="state" required="" value="<?php echo set_value('state'); ?>" placeholder="Enter State"  data-parsley-required="true">
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('state'); ?>
                            </div>
                            <?php
                 // var_dump($subcategories); die(); 
                ?> 
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

            <div class="form-group m-b-10 col-md-12">
                <label class="col-md-4 control-label m-t-10">Select Country for View Satets list</label>
                <div class="col-md-5">
                    <select class="form-control"  name="" onchange="javascript:if($(this).val() !=''){window.location.href='<?= base_url() ?>country/states/'+$(this).val();}">
                        <option value="">Select Country</option>
                        <?php foreach ($countries as $item) { ?>
                            <option value="<?= $item['id'] ?>" <?php if($this->uri->segment(3)==$item['id']){echo"selected";} ?>>
                                <?= $item['name'] ?>
                            </option>
                        <?php   } ?>
                    </select>
                </div>
            </div>

            <?php if($stateContry){ 
                ?>
            <h2 class="m-b-20">
               StateList List <?php if($this->uri->segment(3)){  echo"For ".$country[0]['name']; }?>

            </h2>
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                        <tr class="inverse">
                            <th>Sr#</th>
                            <th>States</th>
                            <!-- <th>Category</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($stateContry as $item) {
                            $i++; ?> 
                        <tr class="odd gradeX" id="row_<?= $item['id'] ?>">
                        <td><?= $i ?></td>
                        <td><?= $item['name'] ?></td>
                        <!-- <td><?= $item[''] ?></td> -->
                        <td>
                        <a href="<?= base_url() . "country/EditStates/" . $item['id'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                        <a href="<?= base_url() . "Country/cities/" . $this->uri->segment(3).'/'.$item['id'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Add Cities</button></a>
                        <button onclick="deleteStates('<?=  base_url() ?>',<?= $item['id'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
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
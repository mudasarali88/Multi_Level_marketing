<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Cities</a></li>
        <li class="active">Add Cities </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Cities</h1>
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
            <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"   name="subcat_title" method="post">

                <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">Select State </label>
                        <div class="col-md-5">
                            <select class="form-control"  name="state_id" required="">
                                <option value="">Select State</option>
                                <?php foreach ($state as $item) { ?>
                                <option value="<?= $item['id'] ?>" <?=($this->uri->segment(4)==$item['id']?'SELECTED':'')?>><?= $item['name'] ?></option>
                              <?php   } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('state_id'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control"  name="city" required="" value="<?php echo set_value('city'); ?>" placeholder=""  data-parsley-required="true">
                        </div>
                        <div class="col-md-4">
                            <div class="text-danger">
                                <?php echo form_error('city'); ?>
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
                <label class="col-md-4 control-label m-t-10">Select State for View Cities list</label>
                <div class="col-md-5">
                    <select class="form-control"  name="" onchange="javascript:if($(this).val() !=''){window.location.href='<?= base_url() ?>country/Cities/'+<?= $this->uri->segment(3) ?>+'/'+$(this).val();}">
                        <option value="">Select state</option>
                        <?php foreach ($state as $item) { ?>
                            <option value="<?= $item['id'] ?>" <?php if($this->uri->segment(4)==$item['id']){echo"selected";} ?>>
                                <?= $item['name'] ?>
                            </option>
                        <?php   } ?>
                    </select>
                </div>
            </div>

            <?php if($cityState){ 
                ?>
            <h2 class="m-b-20">
               City List <?php if($this->uri->segment(4)){  echo"For ".$stateOne[0]['name']; }?>

            </h2>
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                        <tr class="inverse">
                            <th>Sr#</th>
                            <th>Cities</th>
                            <!-- <th>Category</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($cityState as $item) {
                            $i++; ?> 
                        <tr class="odd gradeX" id="row_<?= $item['id'] ?>">
                        <td><?= $i ?></td>
                        <td><?= $item['cityName'] ?></td>
                        <!-- <td><?= $item[''] ?></td> -->
                        <td>
                        <a href="<?= base_url() . "country/EditCities/" .$this->uri->segment(3).'/'.$this->uri->segment(4).'/'. $item['id'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                        <button onclick="deleteCity('<?=  base_url() ?>',<?= $item['id'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
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
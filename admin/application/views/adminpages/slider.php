<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Slider</a></li>
        <li class="active">Add Slider</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Slider</h1>
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

                <form class="form-horizontal fv-form fv-form-bootstrap row col-md-12"  name="AddSlider" method="post" enctype="multipart/form-data">

                    
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">Image (Size 847*388 Px )</label>
                        
                        <div class="col-md-5">
                            <input type="file" class="form-control" name="Image">
                        </div>

                    </div>
                    <div class="form-group m-b-10">

                        <!-- <div class="col-md-offset-2  text-danger"> -->

                            <?php echo form_error('country'); ?>

                        <!-- </div> -->

                        <label class="col-md-5 control-label">Country</label>

                        <div class="col-md-5 country_list"id="country_list">

                            <select class="country" name="country[]" id="country" required="" multiple="multiple" onchange="getStatesWithCountry(1);">

                                <?php

                                foreach ($topCountry as $country) {

                                    ?>

                                    <option value="<?= $country->id ?>"><?= $country->name ?></option>

                                <?php } ?>



                            </select>

                        </div>

                        <!--                        <div class="col-md-5">

                                                    <input type="text" class="form-control" name="country" id="country" required="" onkeyup="autoSuggest(1);"  placeholder="Select Country">

                                                </div>-->

                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">States</label>
                        <div class="col-md-5" >
                            <select class="states" name="states[]" id="states" required="" multiple="multiple" onchange="getCitiesWithStates(1);">
                                <option value="">---Select States---</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">City</label>
                        <div class="col-md-5">
                            <select class="city" name="city[]" id="city" required="" multiple="multiple">
                                <option value="">---Select city---</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-5">
                        <button type="submit" value="submit"  class="btn btn-success width-100 m-r-5">Submit</button>
                        <button class="btn btn-default width-100" type="reset">Cancel</button>
                    </div>
                </form>
            </div>

    <div class="row m-t-20 col-md-12">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border">
            <h2 class="m-b-20">
                Slider Images
            </h2>
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                    <tr class="inverse">
                        <th width="15%">Sr#</th>
                        <th>Image</th>
                        <th>Global</th>
                        <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $i = 0;
                    if(isset($Slider)){
                    foreach ($Slider as $item) {
                        // var_dump($item);
                        $i++; ?>
                        <tr class="odd gradeX" id="row_<?= $item['id'] ?>">
                            <td><?= $i ?></td>
                            <td><?php if (empty($item['image'])) {
                                    echo "N/A";
                                } else {
                                    ?>
                                    <img class="my-image" src="<?= base_url() . "assets/images/" . $item['image'] ?>" width="50" height="50">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($item['isGlobal']=='1'): ?>
                                <a href="<?=base_url()?>admin/changeSliderStatus/0/<?=$item['id']?>"><img src="<?=base_url()?>assets/images/on.png" width="20" title="Click to change Global Status"></a>
                                <?php else: ?>
                                <a href="<?=base_url()?>admin/changeSliderStatus/1/<?=$item['id']?>"><img src="<?=base_url()?>assets/images/off.png" width="20" title="Click to change Global Status"></a>
                                <?php endif; ?>
                                    
                            </td>
                            <td>
                                <button onclick="deleteSlider('<?=  base_url() ?>',<?= $item['id'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                            </td>
                        </tr>
                    <?php }} ?>

                    </tbody>
                </table>
            </div>
            <!-- end panel -->
        </div>
        <!-- end section-container -->

    </div>
    <!-- end row -->





        </div>
        <!-- end section -->
    </div>
    

<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>
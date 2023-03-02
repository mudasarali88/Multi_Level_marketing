<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Gifs</a></li>
        <li class="active">Edit Gif</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Gif</h1>
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
                        <label class="col-md-5 control-label">Gif Title</label>
                        
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="gifTitle" value="<?= $gif['gifTitle'];?>">
                        </div>
                        <input type="hidden" class="form-control" name="gifId" value="<?= $gif['gifId'];?>">

                    </div>
                    <div class="form-group m-b-10">
                        <label class="col-md-5 control-label">Gif Image</label>
                        
                        <div class="col-md-5">
                            <input type="file" class="form-control" name="gifImg" value="<?= $gif['gifImg'];?>">
                        </div>

                    </div>
                    <!--  -->
                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('country'); ?>

                        </div>

                        <label class="col-md-5 control-label">Country</label>

                        <div class="col-md-5 country_list"id="country_list">

                            <select class="country" name="country[]" id="country" multiple="multiple" onchange="getStatesWithCountry(1);">

                                <?php

                                foreach ($topCountry as $country) {

                                    foreach ($countryList as $count) {

                                        ?>

                                        <option value="<?= $country->id ?>" <?php if ($country->id == $count->id) { ?>selected<?php } ?>><?= $country->name ?></option>

                                        <?php

                                    }

                                }

                                ?>





                            </select>

                        </div>

                    </div>



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('states'); ?>

                        </div>

                        <label class="col-md-5 control-label">States</label>

                        <div class="col-md-5" >

                            <select class="states" name="states[]" id="states" multiple="multiple" onchange="getCitiesWithStates(1);">

                                <?php

                                foreach ($stateList as $state) {

                                    ?>

                                    <option value="<?= $state->id ?>" selected><?= $state->name ?></option>

                                <?php } ?>





                            </select>

                        </div>

                    </div>



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('city'); ?>

                        </div>

                        <label class="col-md-5 control-label">City</label>

                        <div class="col-md-5">

                            <select class="city" name="city[]" id="city" multiple="multiple">

                                <?php

                                foreach ($cityList as $city) {

                                    ?>

                                    <option value="<?= $city->id ?>" selected><?= $city->name ?></option>

                                <?php } ?>





                            </select>

                        </div>

                    </div>
                    <!--  -->
                    <div class="col-md-7 col-md-offset-5">
                        <button type="submit" value="submit"  class="btn btn-success width-100 m-r-5">Submit</button>
                        <button class="btn btn-default width-100" type="reset">Cancel</button>
                    </div>
                </form>
            </div>

    <!-- end row -->





        </div>
        <!-- end section -->
    </div>
    

<?php
require_once(APPPATH . "views/includes/admin/footer.php");

?>

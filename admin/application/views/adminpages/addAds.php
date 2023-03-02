<?php

require_once(APPPATH . "views/includes/admin/header.php");

require_once(APPPATH . "views/includes/admin/menu.php");

?>

<!-- begin #content -->

<div id="content" class="content">

    <!-- begin breadcrumb -->

    <ol class="breadcrumb pull-right">

        <li><a href="javascript:;">Ads</a></li>

        <li class="active">Add Ads</li>

    </ol>

    <!-- end breadcrumb -->

    <!-- begin page-header -->

    <h1 class="page-header">Add Ads</h1>

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

            <form class="form-horizontal fv-form fv-form-bootstrap"  name="Addads" id="adsForm_submit" class="adsForm_submit" method="post" enctype="multipart/form-data" >



                <div class="col-md-6">



                    <div class="form-group m-b-10">

                        <div class="text-danger">

                            <?php echo form_error('company_name'); ?>

                        </div>

                        <label class="col-md-2 control-label">Company Name</label>

                        <div class="col-md-10">

                            <input type="text" class="form-control" required=""  name="company_name" id="company_name" value="<?php echo set_value('company_name'); ?>" placeholder="Enter company name">

                        </div>

                    </div>



                </div>



                <div class="col-md-12">



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('company_url'); ?>

                        </div>

                        <label class="col-md-1 control-label">Company URL</label>

                        <div class="col-md-5 text-left">

                            <input type="text" class="form-control"  name="company_url" id="company_url" value="<?php echo set_value('company_url'); ?>" placeholder="Enter company url">

                        </div>

                    </div>

                </div>

                <div class="col-md-12">



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('email'); ?>

                        </div>

                        <label class="col-md-1 control-label">Email</label>

                        <div class="col-md-5 text-left">

                            <input type="text" class="form-control"  name="email"  value="<?php echo set_value('email'); ?>" placeholder="Enter email address">

                        </div>

                    </div>

                </div>

                <div class="col-md-12">



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('nature_bus'); ?>

                        </div>

                        <label class="col-md-1 control-label">Title</label>

                        <div class="col-md-5 text-left">

                            <input type="text" class="form-control" required=""  name="nature_bus" id="nature_bus" value="<?php echo set_value('nature_bus'); ?>" placeholder="Enter nature of business">

                        </div>

                    </div>

                </div>

                <div class="col-md-12">



                    <div class="form-group m-b-10 ">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('cat_ID'); ?>

                        </div>

                        <label class="col-md-1 control-label">Category</label>

                        <div class="col-md-5 text-left">

                            <select class="form-control select2" onchange="getCategoriesID('<?= base_url() ?>', this.value)"  name="cat_ID" id="cat_ID" required="">

                                <option value="">Select Category</option>

                                <?php foreach ($categories as $item) { ?>

                                    <option value="<?= $item['ID'] ?>"><?= $item['cat_title'] ?></option>

                                <?php } ?>

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

                            </select>

                        </div>

                    </div>



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('country'); ?>

                        </div>

                        <label class="col-md-1 control-label">Country</label>

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

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('states'); ?>

                        </div>

                        <label class="col-md-1 control-label">States</label>

                        <div class="col-md-5" >

                            <select class="states" name="states[]" id="states" required="" multiple="multiple" onchange="getCitiesWithStates(1);">

                                <option value="">---Select States---</option>



                            </select>

<!--                            <input type="text" class="form-control" name="states" id="states" required="" onkeyup="autoSuggest(2);" placeholder="Select states">-->

                        </div>

                    </div>



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('city'); ?>

                        </div>

                        <label class="col-md-1 control-label">City</label>

                        <div class="col-md-5">

                            <select class="city" name="city[]" id="city" required="" multiple="multiple">

                                <option value="">---Select city---</option>



                            </select>

<!--                            <input type="text" class="form-control" name="city" id="city" required="" onkeyup="autoSuggest(3);" placeholder="Select city">-->

                        </div>

                    </div>



                    <div class="form-group m-b-10">



                        <label class="col-md-1 control-label">Image 1</label>

                        <div class="col-md-3">

                            <!-- <input type="file" class="form-control" name="image_1" id="image_1" required="" onchange="checkImageContent(1);" > -->
                            <input type="file" class="form-control" name="image_1" id="image_1" required=""   >
                            <!-- <label id="fp" /> -->
                        </div>
                        <div class="col-sm-2">
                            <p>
                                <span id="preview"></span>
                                image must be in 800px and less then 5mb.
                            </p>
                        </div>


                    </div>

                    <div class="form-group m-b-10">



                        <label class="col-md-1 control-label">Image 2</label>

                        <div class="col-md-3">

                            <input type="file" class="form-control" name="image_2" id="image_2"   onchange="checkImageContent(2);">

                        </div>
                        <div class="col-sm-2">
                            <p>
                                image must be in 800px and less then 5mb.
                            </p>
                        </div>

                        <label class="col-md-1 control-label">Video 1 (optional)</label>

                        <div class="col-md-5">

                            <input type="text" class="form-control" name="video_2" id="video_2"  placeholder="Enter youtube link" onkeyup="checkLinkContent(2);" >

                        </div>

                    </div> 

                    <div class="form-group m-b-10">



                        <label class="col-md-1 control-label">Image 3 </label>

                        <div class="col-md-3">

                            <input type="file" class="form-control" name="image_3" id="image_3"  onchange="checkImageContent(3);">

                        </div>
                        <div class="col-sm-2">
                            <p>
                                image must be in 800px and less then 5mb.
                            </p>
                        </div>

                        <label class="col-md-1 control-label">Video 2 (optional)</label>

                        <div class="col-md-5">

                            <input type="text" class="form-control" name="video_3" id="video_3"  placeholder="Enter youtube link" onkeyup="checkLinkContent(3);" >

                        </div>

                    </div>

                    

                    <div class="form-group m-b-10">



                        <label class="col-md-1 control-label">Image 4</label>

                        <div class="col-md-3">

                            <input type="file" class="form-control" name="image_4" id="image_4"  onchange="checkImageContent(5);">

                        </div>
                        <div class="col-sm-2">
                            <p>
                                image must be in 800px and less then 5mb.
                            </p>
                        </div>

                        <label class="col-md-1 control-label">Video 3 (optional)</label>

                        <div class="col-md-5">

                            <input type="text" class="form-control" name="video_4" id="video_5"  placeholder="Enter youtube link" onkeyup="checkLinkContent(5);">

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('contact'); ?>

                        </div>

                        <label class="col-md-1 control-label">Contact</label>

                        <div class="col-md-5">

                            <input type="text" class="form-control" name="contact" id="contact" required="" value="<?php echo set_value('contact'); ?>" placeholder="Enter contact number">

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('whats_app'); ?>

                        </div>

                        <label class="col-md-1 control-label">What's App</label>

                        <div class="col-md-5">

                            <input type="text" class="form-control" name="whats_app" id="whats_app" value="<?php echo set_value('whats_app'); ?>" placeholder="Enter what's app number">

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('position_number'); ?>

                        </div>

                        <label class="col-md-1 control-label">Position Number</label>

                        <div class="col-md-5">

                            <input type="number" class="form-control" name="position_number" id="position_number" required="" value="<?php echo set_value('position_number'); ?>" placeholder="Enter position number">

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('des'); ?>

                        </div>

                        <label class="col-md-1 control-label">Short Description</label>

                        <div class="col-md-5">

                            <textarea name="des" class="form-control" id="des" required=""></textarea>

                        </div>

                    </div>
                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('des'); ?>

                        </div>

                        <label class="col-md-1 control-label">Description</label>

                        <div class="col-md-9">

                           <div class="col-md-12">
                            <?php
                                echo textedit();  
                                ?>
                            </div>

                        </div>

                    </div>



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('slider_image'); ?>

                        </div>

                        <label class="col-md-2 control-label text-left">Slider Image?</label>

                        <div class="col-md-4 m-t-10">

                            Yes<input type="radio" class="" name="slider_image" id="slider_image_yes" required="" value="1"> No <input type="radio" class="" name="slider_image" id="slider_image_no" required="" checked value="0">

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('slider_image'); ?>

                        </div>

                        <label class="col-md-2 control-label text-left">Global?</label>

                        <div class="col-md-4 m-t-10">

                            Yes<input type="radio" class="" name="global" id="global_yes" required="" value="1"> No <input type="radio" class="" name="global" id="global_no" required="" checked value="0">

                        </div>

                    </div>



                </div>

                <div class="m-b-10 col-md-7 col-md-offset-1 m-t-25">

                    <button type="submit" value="submit" class="btn btn-success width-100 m-r-5">Submit</button>

                    <button class="btn btn-default width-100" type="reset" onclick="resetForm();">Cancel</button>

                    <!--                    <button type="button" value="Add origin" class="btn btn-success width-100 m-r-5" onclick="appendCountryCityBox();">Add origin</button>-->

                </div>



            </form>

        </div>

        <!-- end section -->

    </div>



    <?php

    require_once(APPPATH . "views/includes/admin/footer.php");

    ?>

   
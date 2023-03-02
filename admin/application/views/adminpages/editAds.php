<?php

require_once(APPPATH . "views/includes/admin/header.php");

require_once(APPPATH . "views/includes/admin/menu.php");

?>

<!-- begin #content -->

<div id="content" class="content">

    <!-- begin breadcrumb -->

    <ol class="breadcrumb pull-right">

        <li><a href="javascript:;">Ads</a></li>

        <li class="active">Edit Ads</li>

    </ol>

    <!-- end breadcrumb -->

    <!-- begin page-header -->

    <h1 class="page-header">Edit Ads</h1>

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

                <input type="hidden" name="ads_id" value="<? -$this->uri->segment(3) ?>">

                <div class="col-md-6">



                    <div class="form-group m-b-10">

                        <div class="text-danger">

                            <?php echo form_error('company_name'); ?>

                        </div>

                        <label class="col-md-2 control-label">Company Name</label>

                        <div class="col-md-10">

                            <input type="text" class="form-control" required=""  name="company_name" id="company_name" value="<?= $ads->name ?>" placeholder="Enter company name">

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

                            <input type="text" class="form-control"   name="company_url" id="company_url" value="<?= $ads->url ?>" placeholder="Enter company url">

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

                            <input type="text" class="form-control" required=""  name="email" id="email" value="<?= $ads->email ?>" placeholder="Enter email address">

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

                            <input type="text" class="form-control" required=""  name="nature_bus" id="nature_bus" value="<?= $ads->nature_of_bus ?>" placeholder="Enter nature of business">

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

                                    <option value="<?= $item['ID'] ?>"<?php

                                    if ($ads->cat_id_fk == $item['ID']) {

                                        echo 'selected';

                                    }

                                    ?> ><?= $item['cat_title'] ?></option>

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

                                <?php foreach ($subcategories as $item) { ?>

                                    <option value="<?= $item['ID'] ?>"<?php

                                    if ($ads->sub_cat_id_fk == $item['ID']) {

                                        echo 'selected';

                                    }

                                    ?> ><?= $item['subcat_title'] ?></option>

                                        <?php } ?>

                            </select>

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('country'); ?>

                        </div>

                        <label class="col-md-1 control-label">Country</label>

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

                        <label class="col-md-1 control-label">States</label>

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

                        <label class="col-md-1 control-label">City</label>

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

                    <div class="form-group m-b-10">

                        <label class="col-md-1 control-label">Image 1</label>

                        <div class="col-md-5">

                            <input type="file" class="form-control" name="image_1" id="image_1" onchange="checkImageContent(1);">

                            <?php if ($ads->image_1 != '') { ?>

                                <br />

                                <img class="my-image" src="<?= base_url() ?>/assets/images/<?= $ads->image_1 ?>" width="45" height="45">

                            <?php } ?>

                        </div>

                    </div>

                    <div class="form-group m-b-10">



                        <label class="col-md-1 control-label">Image 2</label>

                        <div class="col-md-5">

                            <input type="file" class="form-control" name="image_2" id="image_2"   onchange="checkImageContent(2);">

                            <?php if ($ads->image_2 != '') { ?>

                                <br />

                                <img class="my-image" src="<?= base_url() ?>/assets/images/<?= $ads->image_2 ?>" width="45" height="45">

                            <?php } ?>

                        </div>

                        <label class="col-md-1 control-label">Video 1 (optional)</label>

                        <div class="col-md-5">

                            <input type="text" class="form-control" name="video_2" id="video_2" value="<?= $ads->video_2 ?>"  placeholder="Enter youtube link" onkeyup="checkLinkContent(2);" >

                        </div>

                    </div> 

                    <div class="form-group m-b-10">



                        <label class="col-md-1 control-label">Image 3</label>

                        <div class="col-md-5">

                            <input type="file" class="form-control" name="image_3" id="image_3"  onchange="checkImageContent(3);">

                            <?php if ($ads->image_3 != '') { ?>

                                <br />

                                <img class="my-image" src="<?= base_url() ?>/assets/images/<?= $ads->image_3 ?>" width="45" height="45">

                            <?php } ?>

                        </div>

                        <label class="col-md-1 control-label">Video 2 (optional)</label>

                        <div class="col-md-5">

                            <input type="text" class="form-control" name="video_3" id="video_3" value="<?= $ads->video_3 ?>"  placeholder="Enter youtube link" onkeyup="checkLinkContent(3);" >

                        </div>

                    </div>

                    

                    <div class="form-group m-b-10">



                        <label class="col-md-1 control-label">Image 4</label>

                        <div class="col-md-5">

                            <input type="file" class="form-control" name="image_4" id="image_5"  onchange="checkImageContent(5);">

                            <?php if ($ads->image_5 != '') { ?>

                                <br />

                                <img class="my-image" src="<?= base_url() ?>/assets/images/<?= $ads->image_5 ?>" width="45" height="45">

                            <?php } ?>

                        </div>

                        <label class="col-md-1 control-label">Video 3 (optional)</label>

                        <div class="col-md-5">

                            <input type="text" class="form-control" name="video_4" id="video_5" value="<?= $ads->video_5 ?>" placeholder="Enter youtube link" onkeyup="checkLinkContent(5);">

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('contact'); ?>

                        </div>

                        <label class="col-md-1 control-label">Contact</label>

                        <div class="col-md-5">

                            <?php

                            $myarr = array();

                            foreach ($contact as $con) {

                                if ($con->contact_type == 0) {

                                    array_push($myarr, $con->contact_number);

                                }

                            }

                            $contactList = implode(",", $myarr);

                            ?>



                            <input type="text" class="form-control" name="contact" id="contact" required="" value="<?php echo $contactList ?>" placeholder="Enter contact number">

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('whats_app'); ?>

                        </div>

                        <label class="col-md-1 control-label">What's App</label>

                        <div class="col-md-5">

                            <?php

                            $myarr = array();

                            foreach ($contact as $con) {

                                if ($con->contact_type == 1) {

                                    array_push($myarr, $con->contact_number);

                                }

                            }

                            $contactList = implode(",", $myarr);

                            ?>

                            <input type="text" class="form-control" name="whats_app" id="whats_app" required="" value="<?php echo $contactList ?>" placeholder="Enter what's app number">

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('position_number'); ?>

                        </div>

                        <label class="col-md-1 control-label">Position Number</label>

                        <div class="col-md-5">

                            <input type="number" class="form-control" name="position_number" id="position_number" required="" value="<?= $ads->position_number ?>" placeholder="Enter position number">

                        </div>

                    </div>



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('des'); ?>

                        </div>

                        <label class="col-md-1 control-label">Short Description</label>

                        <div class="col-md-5">

                            <textarea name="des" class="form-control" id="des" required=""><?= $ads->des ?></textarea>

                        </div>

                    </div>
                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('des'); ?>

                        </div>

                        <label class="col-md-1 control-label">Description</label>

                        <div class="col-md-9">

                           <?php
                                require("assets/rte/fckeditor.php");
                                $oFCKeditor = new FCKeditor('FCKeditor');
                                $oFCKeditor->BasePath = base_url()."assets/rte/" ;
                                if(isset($ads->longdes)){ 
                                    $oFCKeditor->Value = $ads->longdes;
                                } else {
                                    $oFCKeditor->Value = "";
                                }
                                $oFCKeditor->Create();
                                ?>

                        </div>

                    </div>



                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('slider_image'); ?>

                        </div>

                        <label class="col-md-2 control-label text-left">Slider Image?</label>

                        <div class="col-md-4 m-t-10">

                            Yes <input type="radio" class="" name="slider_image" id="slider_image_yes" required="" value="1" <?php if ($ads->slider_image == 1) { ?> checked <?php } ?>>

                            No <input type="radio" class="" name="slider_image" id="slider_image_no" required="" value="0" <?php if ($ads->slider_image == 0) { ?> checked <?php } ?>>

                        </div>

                    </div>

                    <div class="form-group m-b-10">

                        <div class="col-md-offset-2  text-danger">

                            <?php echo form_error('slider_image'); ?>

                        </div>

                        <label class="col-md-2 control-label text-left">Global?</label>

                        <div class="col-md-4 m-t-10">

                            Yes <input type="radio" class="" name="global" id="global_yes" required="" value="1" <?php if ($ads->isGlobal == 1) { ?> checked <?php } ?>>

                            No <input type="radio" class="" name="global" id="global_no" required=""  value="0" <?php if ($ads->isGlobal == 0) { ?> checked <?php } ?>>

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

   
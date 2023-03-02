<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Product</a></li>
        <li class="active">Ads Detail </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Ads Detail</h1>
    <!-- end page-header -->

    <div class="row m-t-20">
        <div class="message">
            <?php if ($this->session->flashdata('message')) { ?>
                <?= $this->session->flashdata('message') ?>
            <?php } ?>

        </div>
        <!-- begin section-container -->
        <div class="section-container section-with-top-border">
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-tables"  class="table table-bordered table-hover">
                    <thead>
                        <tr class="inverse">
                            <th>Country</th>
                            <th>States</th>
                            <th>City</th>
                            <th>Images</th>
                            <th>Videos</th>
                            <th>Contact</th>
                            <th>What's App</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="odd gradeX" id="row">

                            <td>
                                <?php
                                foreach ($adsCountry as $item) {
                                    echo $item->name . "<br />";
                                }
                                ?>
                            </td>
                            <td><?php
                                foreach ($adsStates as $item) {
                                    echo $item->name . "<br />";
                                }
                                ?></td>
                            <td><?php
                                foreach ($adsCity as $item) {
                                    echo $item->name . "<br />";
                                }
                                ?></td>
                            <td>
                                <?php
                                if ($adsDetail[0]->image_1 != '') {
                                    ?>
                                    <img src="<?= base_url() ?>assets/images/<?php echo $adsDetail[0]->image_1; ?>" width="50" height="50" class="my-image"><br />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?>

                                <?php
                                if ($adsDetail[0]->image_2 != '') {
                                    ?>
                                    <img src="<?= base_url() ?>assets/images/<?php echo $adsDetail[0]->image_2; ?>" width="50" height="50" class="my-image"><br />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?>

                                <?php
                                if ($adsDetail[0]->image_3 != '') {
                                    ?>
                                    <img src="<?= base_url() ?>assets/images/<?php echo $adsDetail[0]->image_3; ?>" width="50" height="50" class="my-image"><br />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?>

                                <?php
                                if ($adsDetail[0]->image_4 != '') {
                                    ?>
                                    <img src="<?= base_url() ?>assets/images/<?php echo $adsDetail[0]->image_4; ?>" width="50" height="50" class="my-image"><br />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?>

                                <?php
                                if ($adsDetail[0]->image_5 != '') {
                                    ?>
                                    <img src="<?= base_url() ?>assets/images/<?php echo $adsDetail[0]->image_5; ?>" width="50" height="50" class="my-image"><br />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?>



                            </td>
                            <td>

                                <?php
                                if ($adsDetail[0]->video_2 != '') {
                                    ?>
                                    <iframe width="160" height="160" src="<?php echo $adsDetail[0]->video_1; ?>"></iframe><br />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?>

                                <?php
                                if ($adsDetail[0]->video_3 != '') {
                                    ?>
                                    <iframe width="160" height="160" src="<?php echo $adsDetail[0]->video_1; ?>"></iframe><br />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?>

                                <?php
                                if ($adsDetail[0]->video_4 != '') {
                                    ?>
                                    <iframe width="160" height="160" src="<?php echo $adsDetail[0]->video_1; ?>"></iframe><br />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?>

                                <?php
                                if ($adsDetail[0]->video_5 != '') {
                                    ?>
                                    <iframe width="160" height="160" src="<?php echo $adsDetail[0]->video_5; ?>"></iframe><br />
                                <?php } else { ?>
                                    &nbsp;
                                <?php } ?>



                            </td>
                            <td><?php
                                foreach ($adsContact as $item) {
                                    if ($item->contact_type == 0)
                                        echo $item->contact_number . "<br />";
                                }
                                ?></td>
                            <td><?php
                                foreach ($adsContact as $item) {
                                    if ($item->contact_type == 1)
                                        echo $item->contact_number . "<br />";
                                }
                                ?></td>


                        </tr>


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
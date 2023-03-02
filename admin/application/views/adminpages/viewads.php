<?php

require_once(APPPATH . "views/includes/admin/header.php");

require_once(APPPATH . "views/includes/admin/menu.php");

?>

<!-- begin #content -->

<div id="content" class="content">

    <!-- begin breadcrumb -->

    <ol class="breadcrumb pull-right">

        <li><a href="javascript:;">Product</a></li>

        <li class="active">Product List </li>

    </ol>

    <!-- end breadcrumb -->

    <!-- begin page-header -->

    <h1 class="page-header">Product list</h1>

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

                <table id="data-table"  class="table table-bordered table-hover">

                    <thead>

                        <tr class="inverse">

                            <th>Sr#</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Nature of Busniess</th>

                            <th>URL</th>

                            <th>Category</th>

                            <th>Sub Category</th>

                            <th>Slider Image</th>

                            <th width="15%">Action</th>

                        </tr>

                    </thead>

                    <tbody>



                        <?php

                        $i = 0;

                        foreach ($ads as $item) {

                            $i++;

                            ?> 



                            <tr class="odd gradeX" id="row_<?= $item->id ?>">

                                <td><?= $i ?></td>

                                <td><?= $item->name ?></td>

                                <td><?= $item->email ?></td>

                                <td><?= $item->nature_of_bus ?></td>

                                <td><?= $item->url ?></td>

                                <td><?= $item->cat_title ?></td>

                                <td><?= $item->subcat_title ?></td>

                                <td><?php

                                    if ($item->slider_image) {

                                        echo "<button class='btn btn-sm btn-success'>Yes</button>";

                                    } else {

                                        echo "<button class='btn btn-sm btn-danger'>No</button>";

                                    }

                                    ?>

                                </td>



                                <td>
<div>
                                    <a href="<?= base_url() . "ads/detailAds/" . $item->id ?>"> <button  class="btn btn-xs btn-primary">Detail</button></a>
</div>
<br>
<div>

                                    <a href="<?= base_url() . "ads/editAds/" . $item->id ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
</div>
<br>
<div>

                                    <button onclick="deleteadd(<?= $item->id ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
</div>
<br>
                                    <button onclick="changesStatue(<?= $item->id ?>)" class="btn btn-xs btn-primary">
                                        <input type="hidden" value="<?= $item->status ?>" id="status<?= $item->id ?>" name="status"/>  

                                        <?php

                                        if ($item->status == 1) {

                                            echo "Active";

                                        } else {

                                            echo "Inactive";

                                        }

                                        ?>

                                    </button>



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
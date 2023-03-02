<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
    <!-- begin #content -->
    <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Post</a></li>
        <li class="active">Post List </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Post list</h1>
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
                        <th width="5%">Sr#</th>
                        <th width="20%">Post Title</th>
                        <th width="30%">Description</th>
                        <th width="10%">Status</th>
                        <th width="15%">Image</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($posts as $item) {
                        $i++; ?>
                        <tr class="odd gradeX" id="row_<?= $item['ID'] ?>">
                            <td><?= $i ?></td>
                            <td><?= $item['post_title'] ?></td>
                            <td><?= $item['post_desc'] ?></td>
                            <td><?php if($item['status']){
                                    echo "<button class='btn btn-sm btn-success'>Active</button>";
                                }else{ echo "<button class='btn btn-sm btn-danger'>In-Active</button>"; } ?>
                            </td>

                            <td><img src="<?= base_url().'assets/images/BlogImages/'.$item['Image'] ?>" width="50" height="50" class="my-image" ></td>
                            <td>
                                <a href="<?= base_url() . "blog/Editpost/" . $item['ID'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                                <button onclick="deletepost('<?=  base_url() ?>',<?= $item['ID'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
                                <?php if($item['status']){ ?>
                                    <a href='<?= base_url() ?>blog/statusChange/<?= $item['ID'] ?>/0' class='btn btn-sm btn-danger'>Make DeActive</a>
                                <?php }else{ ?>
                                    <a href='<?= base_url() ?>blog/statusChange/<?= $item['ID'] ?>/1' class='btn btn-sm btn-success'>Make Active</a>
                                <?php } ?>
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
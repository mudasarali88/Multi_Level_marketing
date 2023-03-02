<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
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
                            <th>Product Title</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>is Homepage Pro</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($products as $item) {
                            $i++; ?> 
                        <tr class="odd gradeX" id="row_<?= $item['ID'] ?>">
                                <td><?= $i ?></td>
                                <td><?= $item['product_title'] ?></td>
                                <td><?= $item['cat_title'] ?></td>
                                <td><?= $item['subcat_title'] ?></td>
                            <td><img src="<?= base_url().'assets/images/'.$item['Image'] ?>" width="50" height="50" class="my-image" ></td>

                            <td><?php if($item['status']){
                                    echo "<button class='btn btn-sm btn-success'>Approved</button>";
                                }else{ echo "<button class='btn btn-sm btn-danger'>Rejected</button>"; } ?>
                            </td>

                            <td><?php if($item['isHomepage']){
                                    echo "<button class='btn btn-sm btn-success'>Yes</button>";
                                }else{ echo "<button class='btn btn-sm btn-danger'>No</button>"; } ?>
                            </td>

                            <td>
                                <?php if($item['isHomepage']){ ?>
                                    <a href='<?= base_url() ?>product/setHomepageProduct/<?= $item['ID'] ?>/0' class='btn btn-sm btn-danger'>Remove From Homepage</a>
                                <?php  }else{ ?>
                                    <a href='<?= base_url() ?>product/setHomepageProduct/<?= $item['ID'] ?>/1' class='btn btn-sm btn-success'>Add to Homepage</a>
                                <?php } ?>
<br><br>
                                <a href="<?= base_url() . "product/Editproduct/" . $item['ID'] ?>"> <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i></button></a>
                                <button onclick="deleteproduct('<?=  base_url() ?>',<?= $item['ID'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
                                <?php if($item['status']){ ?>
                                   <a href='<?= base_url() ?>product/statusChange/<?= $item['ID'] ?>/0' class='btn btn-sm btn-danger'>Reject</a>
                                   <?php }else{ ?>
                                    <a href='<?= base_url() ?>product/statusChange/<?= $item['ID'] ?>/1' class='btn btn-sm btn-success'>Approve</a>
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
<?php require_once(APPPATH . "views/includes/admin/footer.php"); ?>
 <!-- include_once('includes/header.php'); ?> -->
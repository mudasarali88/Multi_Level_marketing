<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">NewsLetter</a></li>
        <li class="active">Email list </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Email list</h1>
    <!-- end page-header -->
  
    <div class="row m-t-20">
        <div class="message">
            
        </div>
        <!-- begin section-container -->
        <div class="section-container section-with-top-border">
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                        <tr class="inverse">
                            <th>Sr#</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($email as $item) {
                            $i++; ?> 
                        <tr class="odd gradeX" id="row_<?= $item['ID'] ?>">
                                <td><?= $i ?></td>
                                <td><?= $item['Email'] ?></td>
                                <td>
                                    <button onclick="deleteNewsletter('<?=  base_url() ?>',<?= $item['ID'] ?>)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
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
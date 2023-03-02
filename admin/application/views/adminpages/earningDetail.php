<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
    <!-- begin #content -->
    <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Admin</a></li>
        <li class="active">User List </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">User List</h1>
    <!-- end page-header -->

    <div class="row m-t-20">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border">
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                    <tr class="inverse">
                        <th>Sr#</th>
                        <th>Description</th>
                        <!-- <th>Date</th> -->
                        <th>Earnings</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($UserList as $item) {
                        $i++; ?>
                        <tr class="odd gradeX" id="row_<?= $item['ID'] ?>">
                            <td><?= $i ?></td>
                            <td><?= $item['description'] ?> </td>
                            <!-- <td><?= date('M d, Y', strtotime($item['created_date'])) ?></td> -->
                            <td><?= $item['amount'] ?></td>
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
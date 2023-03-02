<?php
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>
    <!-- begin #content -->
    <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Admin</a></li>
        <li class="active">Top Earner </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Top Earner</h1>
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
                        <th>Name</th>
                        <th>Contact</th>
                        
                        <th>Refferral Id</th>
                        <th>Earnings</th>
                        <th>Balance</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($UserList as $item) {
                        $i++; ?>
                        <tr class="odd gradeX" id="row_<?= $item['ID'] ?>">
                            <td><?= $i ?></td>
                            <td><?= $item['FirstName'] ?> <?= $item['LastName'] ?></td>
                            <!-- <td><?= $item['LastName'] ?></td> -->
                            <td><?= $item['Email'] ?><br><?= $item['Telephone'] ?></td>
                           
                            <td><?= $item['refId'] ?></td>
                            <td><?= $item['earning'] ?></td>
                            <td><?= $item['balance'] ?></td>
                            

                            
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
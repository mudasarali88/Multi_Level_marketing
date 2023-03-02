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
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Earnings</th>
                        <th>Withdraw</th>
                        <th>Balance</th>
                        <th>Withdraw Amount</th>
                        <th>Action</th>
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
                            <td><?= $item['Email'] ?></td>
                            <td><?= $item['earning'] ?></td>
                            <td><?= $item['withdrawl'] ?></td>
                            <td><?= $item['balance'] ?></td>
                            <td><?= $item['withdrawAmount'] ?></td>
                            <td>
                                <a href="<?= base_url() . "admin/withdrawProcess/" . $item['id'] ?>"> <button  class="btn btn-xs btn-primary update">Process</button></a>
                             
                                    <!-- <button onclick="deleteAdmin('<?=  base_url() ?>',<?= $item['ID'] ?>,'User')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button> -->
                                <!-- <?php if($item['status']){ ?>
                                    <a href='<?= base_url() ?>admin/statusChange/<?= $item['ID'] ?>/0' class='btn btn-sm btn-danger'>Ban Account</a>
                                <?php }else{ ?>
                                    <a href='<?= base_url() ?>admin/statusChange/<?= $item['ID'] ?>/1' class='btn btn-sm btn-success'>Activate</a>
                                <?php } ?> -->
                                <!-- <?php if($item['paymentStatus']=='1'){ ?>
                                    <a href='<?= base_url() ?>admin/signupPaymentStts/<?= $item['ID'] ?>/0' class='btn btn-sm btn-success' title="Click to Chnage Status">Payment Varified</a>
                                <?php }else{ ?>
                                    <a href='<?= base_url() ?>admin/signupPaymentStts/<?= $item['ID'] ?>/1' class='btn btn-sm btn-danger' title="Click to Chnage Status">Payment not Varified</a>
                                <?php } ?> -->
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
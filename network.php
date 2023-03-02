<?php
require_once('inc/header.php');
require_once('inc/side.php');
$ref = refferalsByUser($_SESSION['user']['refId'], $_SESSION['user']['refId2']);
?>
    <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h3> My Refferals</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Plan</th>
                            <th>Package</th>
                            <th>Start date</th>
                            <th>Ref Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ref as $item): ?>
                        <tr>
                            <td><?=$item['FirstName']?> <?=$item['FirstName']?></td>
                            <td><?=$item['Email']?></td>
                            <td><?=$item['Telephone']?></td>
                            <td><?=$item['cat_title']?></td>
                            <td><?=$item['subcat_title']?></td>
                            <td><?=$item['created_date']?></td>
                            <td><?=$item['refCount']?></td>
                        </tr>
                        <?php endforeach ?>
                        
                    </tbody>
                </table>
            </div>
           
            </div>
    </section>
</div>
<?php require_once('inc/footer.php'); ?>

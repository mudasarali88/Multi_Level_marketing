<?php 
    require_once('inc/header.php');
    require_once('inc/side.php'); 
    $userData = getCountRefferalsByUserId($_SESSION['user']['ID']);
    $myEarnings = getEarningsByUserId($_SESSION['user']['ID']);
 ?>

  <div class="content-wrapper">
  <section class="content-header text-center">
      <h1>
        Earning
        
      </h1>
   
    </section>
 <section class="content">
  <div class="row">
<div class="panel  panel-primary">
    <div class="panel-body" >
        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="panel-heading" >Earnings</h3>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-sm-4">
                    <div class=" col-sm-12 alert bg-success">
                        <strong>Total Earnings</strong><br>
                        <strong><?=$userData->earning?></strong>
                    </div>
                </div>
                <div class="col-sm-4">

                    <div class="col-sm-12 bg-danger alert">
                        <strong> Total Withdrawal</strong><br>
                        <strong> <?=$userData->withdrawl?> </strong>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-12 bg-info alert">
                        <strong>eWallet Balance</strong><br>
                        <strong><?=$userData->balance?></strong>
                    </div>
                </div>

            </div>
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!-- <th>Name</th> -->
                        <!-- <th>Email</th> -->
                        <!-- <th>Contact</th> -->
                        <!-- <th>Start date</th> -->
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($myEarnings as $item): ?>
                    <tr>
                        <!-- <td><?=$item['FirstName']?> <?=$item['FirstName']?></td> -->
                        <!-- <td><?=$item['Email']?></td> -->
                        <!-- <td><?=$item['Telephone']?></td> -->
                        <!-- <td><?=$item['created_date']?></td> -->
                        <td><?=$item['description']?></td>
                        <td><?=$item['amount']?></td>
                    </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>     
        </div>
        </div>
        </div>
</div>

    </section>
  </div>
  <!-- /.content-wrapper -->
<?php require_once('inc/footer.php');?>

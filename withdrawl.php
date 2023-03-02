<?php 
require_once('inc/header.php');
require_once('inc/side.php');
$totalReferal = getCountRefferalsByUserId($_SESSION['user']['ID']);
if (!isset($_SESSION["user"]) ) {
     header('location:index.php');
  }
ob_start();
  if (isset($_POST['withdraw'])) 
  {
    $error = withdrawRequest();
  }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Withdrawl
      </h1>
  
    </section>

    <!-- Main content -->
    <section class="content">
    
         <div class="container">
           
             <div class="row"> 
                 <div class="col-md-12 col-lg-12">
                 <div class="panel panel-default">
                   <div class="panel-body">
                    <?=$error?'<p class="alert text-center bg-danger">'.$error.'</p>':''?>
                    <?=$_GET['msg']?'<p class="alert text-center bg-success">'.$_GET['msg'].'</p>':''?>

                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'> 
                      <table class='table table-bordered table-striped table-hover'>
                        <tr>
                          <th>eWallet Balance</th>
                          <th>Withdrawal</th>
                          <th>Total Paid Out</th>
                        </tr>
                        <tr>
                          <td><?=$totalReferal->balance?></td>
                          <td><?=$totalReferal->withdrawl?></td>
                          <td><?=$totalReferal->withdrawl?></td>
                        </tr>
                      </table>
                    </div>
                  <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <form method = "post" name = "withdrawform" id = "withdrawform" role = "form">
                      <!-- <input type = hidden name = withdraw value = 1> -->
                      <div class = "form-group">
                        <label>eWallet Balance</label>
                        <label>$<?=$totalReferal->balance?></label>
                      </div>
                      <div class = "form-group">
                        <label for = "amount"> Please enter Withdraw Amount</label>
                        <!-- <input type = "number" class = "form-control" name="amount" id="amount" placeholder=" Please enter Withdraw Amount" required> -->
                        <input type = "number" max="<?=$totalReferal->balance?>" min="20" class = "form-control" name = "amount" id = "amount" placeholder = " Please enter Withdraw Amount" required>
                      </div>
                      <!-- <div class = "form-group">
                        <label for = "password_ewal">Enter Your Account Password</label>
                        <input type = "password" class = "form-control" name = "password_ewal" id = "password_ewal" placeholder = "Account password" required="">
                      </div> -->
                      <input type = "submit" class = "btn btn-success" name="withdraw" value = "Withdraw"/>
                    </form>
                  </div>
                  <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <br />
                      <b>Notes:<br /> Minimum Withdraw amount is 20. 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
 </section>
 </div>
  <!-- /.content-wrapper -->
 <?php require_once('inc/footer.php');?>

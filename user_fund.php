<?php require_once('inc/header.php');?>
<?php require_once('inc/side.php'); ?>

<?php require_once('login_fun.php');
ob_start();
if (!isset($_SESSION["username"]) ) {
     header('location:index.php');
	}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fund Transfer
        
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content" >
  <div class="panel panel-default"> 
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 class="panel-heading">Instant Fund Transfer</h3>
 </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div style="font-weight:bold; color:#000; margin-left: 20px; margin-right: 20px;">Step:1</div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <form method="post" id="form1" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px;">
            <input name="token" type="hidden" value="97238746a3e6a95a82eb3ce1fa0b4936" />
            <input name="dotransfer" type="hidden" value="1" />
            <div class="form-group">
                <label>eWallet Balance:</label>
                <label>$0.00</label>
            </div>
            <div class="form-group">
                <label for="username"><span style="color:red;">*</span> Transfer To (Username)</label>
                <input name="username" class="form-control" type="text" id="username" placeholder=" Transfer To (Username)"  style="border-radius: 5px; " value=""/>
            </div>
            <div class="form-group">
                <label for="amount"><span style="color:red;">*</span>Amount ($)</label>

                <input name="amount"  class="form-control" style="border-radius: 5px; " type="text" placeholder="Amount"  id="amount" value=""/>
            </div>
            <div class="form-group">
                <label> Fund transfer charges:</label>
                <label>$1.00</label>
            </div>
            <input class="btn btn-success" name="dotransfer" type="submit" value="Continue">
            <input name="reset" type="reset" value="Reset" class="btn btn-info" >
        </form>
    </div>

        </div>






    </section>
  </div>
  <!-- /.content-wrapper -->
 <?php require_once('inc/footer.php');?>

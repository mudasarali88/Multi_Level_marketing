<?php require_once('inc/header.php'); ?>
<?php require_once('inc/side.php'); ?>
 <?php require_once('login_fun.php');
ob_start();
if (!isset($_SESSION["username"]) ) {
     header('location:index.php');
	}
?> <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">



      <!-- /content_begin-->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h3> Hits</h3>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <table class="table table-striped table-hover">
            <tbody><tr><th class="th1"> Hits Today</th><th class="th1" style="border-left:none;"> Last 7 Days</th><th class="th1" style="border-left:none;"> This Month</th><th class="th1" style="border-left:none;"> Last Month</th><th class="th1" style="border-left:none;"> Total Hits</th></tr>
            <tr align="center"><td class="td1">0</td><td class="td1" style="border-left:none;">0</td><td class="td1" style="border-left:none;">0</td><td class="td1" style="border-left:none;">0</td><td class="td1" style="border-left:none;">0</td></tr>
            </tbody></table></div><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <fieldset><legend><strong> Last 10 visitors</strong></legend><strong></strong></fieldset></div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <fieldset><legend>
            <strong> Last 10 referers</strong>
          </legend><strong></strong></fieldset></div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <fieldset><legend>
            <strong> Best referers</strong>
          </legend><strong></strong></fieldset></div></div>






    </section>
  </div>
  <!-- /.footer -->
 <?php require_once('inc/footer.php'); ?>

  

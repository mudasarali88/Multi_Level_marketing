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
        Edit Profile
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="panel panel-default">
         <div class="panel-body">
         <div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li ><a href="basic_details.php">Basic</a></li>
            <li ><a href="professional_details.php">Professional</a></li>
            <li class="active"><a href="subscriptions.php">Subscriptions</a></li>
            <li ><a href="account_settings.php"> Account Settings</a></li>
        </ul>
    </div><br />
             
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
<form method="post" action="">
<table border="0" cellpadding=5 cellspacing=2>
    <tr><td valign=top><input type=checkbox class=input2 name=list[] value="1" checked disabled></td>
        <td valign=top width=200><span style="font-weight:bold;">Admin Messages</span></td>
  <td valign=top width=350>Important site Admin messages (Cannot be unsubscribed) </td>
    </tr>
  <tr><td colspan=3></td></tr><tr><td valign=top><input type=checkbox class=input2 name=list[] value="2" checked></td><td valign=top width=200><span style="font-weight:bold;">Site Announcements</span></td>
  <td valign=top width=350>Site announcements and notifications</td>
    </tr>
  <tr><td colspan=3></td></tr><tr><td valign=top><input type=checkbox class=input2 name=list[] value="4" checked></td><td valign=top width=200><span style="font-weight:bold;">Member Messages</span></td>
  <td valign=top width=350>Messages from other members</td></tr>
  <tr><td colspan=3></td></tr></table><br />Above list shows the e-mail alerts that you have subscribed. Uncheck the corresponding tick mark to unsubscribe from the mailing list<br /><br />
<input class="col-sm-5 btn btn-success" type="submit" name="submit" value="Update">
</form>
             </div>
</div>
                </div></div>

    </section>
  </div>
  <!-- /.content-wrapper -->
  


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  

<?php require_once('inc/footer.php');?>
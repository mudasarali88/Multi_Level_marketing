<?php require_once('inc/header.php');?>
<?php require_once('inc/side.php'); ?>
<?php //require_once('login_fun.php');
ob_start();
$mymsgs = getMsgs();
// var_dump($mymsgs);
if(isset($_GET['del']))
{
  $recieve_message = delete_reciever_messsage($_GET['del']);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>Messages</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="user_inbox.php">Inbox</a></li>
  <li><a href="user_msg.php">Outbox</a></li>        </ul>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<span style="font-weight:bold; margin:10px;"><br />Showing records 0 to 0 of 0</span>
<!-- <form name="form1" method="post"> -->
<table class="table table-striped table-hover">
<tr>
    <th>From</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Action</th>
    
</tr>
<?php foreach ($mymsgs as $mkey): ?>
  <tr>
    <td><?=$mkey['FirstName']?> <?=$mkey['LastName']?></td>
    <td><?=$mkey['msgSubject']?></td>
    <td><?=$mkey['Message']?></td>
    <td><a onclick="return confirm('Are You Sure To Delete Message');" href="?del=<?=$mkey['ID']?>" style="font-size: 18px;"><i class="fa fa-trash"></i></a></td>
  </tr>
<?php endforeach ?>
    
    
    
    
  </table>

</div>
</div>
</div>
<!-- </section> -->
</section>

<!-- /.content-wrapper -->

  <!-- /.content-wrapper -->
 <?php require_once('inc/footer.php');?>
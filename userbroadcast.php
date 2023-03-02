<?php require_once('inc/header.php');?>
<?php require_once('inc/side.php'); ?>
<?php require_once('login_fun.php');
  ob_start();
  if (!isset($_SESSION["username"]) ) {
       header('location:index.php');
    }
   $user_id = $_SESSION["Distributer_id"];
   //$query="SELECT * from users Where Distributor_id='$user_id'";
   $s_username=$_SESSION['username'];
    $mysql="SELECT * from users Where username='$s_username'";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9  ">
                        <!-- /content_begin-->
<script>

    $(document).ready(function() {
        $('#message_form').bootstrapValidator({
            message: "This value is not valid.",
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                subject: {
                    message: "SUBJECT CAN NOT BE LEFT BLANK",
                    validators: {
                        notEmpty: {
                            message: "SUBJECT CAN NOT BE LEFT BLANK"
                        }
                    }
                }
            }
        });
    });

</script>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3>Broadcast</h3>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            </div>

             <?php

            if (isset($_POST['submit_form'])) {
                $Broadcast = sendBroadcost();
            } 
        ?>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <?php
            if(isset($msg)){
            echo "<span class='pull-right' style='color:green;font-size:22px;'>$msg</span>";
            }else if (isset($error)) {
                echo "<span class='alert alert-danger'>$error</span>";
            }
             ?>
        <form name="#" method="post">
            <input type="hidden" name="action" value="send">
            <div class="form-group">
                <label for="to">To</label>
                <select class="form-control" id="to" disabled name="to" required>
                    <option value="1" SELECTED> All referrals under me</option>
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>

            </div>
            <div class="form-group">
                  <label for="message">Message</label>
                <textarea name="message" id="message"  class="form-control" rows="3" placeholder="Message" required></textarea>
            </div>
            <input type="submit" name="submit_form" value="Send" class="col-sm-5 btn btn-success">
            <br><br><br>


            
        </form>
    </div>

</div>

</div>

    </section>
</div>

  <!-- /.content-wrapper -->
<?php require_once('inc/footer.php');?>
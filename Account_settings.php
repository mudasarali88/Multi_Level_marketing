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
            <li><a href="basic_details.php">Basic</a></li>
            <li  ><a href="professional_details.php">Professional</a></li>
             <!-- <li ><a href="subscriptions.php">Subscriptions</a></li> -->
            <!-- <li class="active"><a href="account_settings.php">Account Settings</a></li> -->
        </ul>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 voffset-2">
                    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form name="mydetails" action="" method="post" onsubmit="return checkform(this)">
            <div class="row offset-2">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    Fields marked with <span style="color:red;">*</span>are mandatory<br><br>
                    <fieldset ><legend> Member Information</legend>
                        <table class="table ">

                            <tr>
                                <td> Membership No.:</td>
                                <td><b>1681</b></td>
                            </tr>
                            <tr>
                                <td>Username:</td>
                                <td><b>najmi786</b></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td>* * * * &nbsp;<a href="#">Change Password</a></td>
                            </tr>
                            <tr>
                                <td>Transaction password:</td>
                                <td>* * * * &nbsp;<a href="#">Change Transaction Password</a></td>
                            </tr>
                            <tr>
                                <td><span class="mandatory_block">*</span> Mobile/Cell No.:
                                <td><b><input class="form-control" type="text" id="mobile" name="mobile" value="3335883410" /></b></td>
                            </tr>
                            <tr>
                                <td><span class="mandatory_block">*</span>email:</td>
                                <td><input name="email" id="email" class="form-control" type="email" id="email" maxlength="60" value="rohail_ahmed12@hotmail.com" ></td>
                            </tr>
                            <tr>
                                <td> Membership Plan:</td>
                                <td><b>Basic Plan </b><br />
                                     Recurring Fees:  <b>$0.00</b><br />
                                     Recurring Term:  <b> NONE ( <a href="my_rec_invoices.php">My Recurring Invoices</a> )</b><br />
                                    Minimum Product Purchase per Half Year:  <b> $0.00</b><br />
                                    Minimum Product Purchase per Quarter:  <b> $0.00</b><br />
                                    Minimum Product Purchase per Month:  <b> $0.00</b><br />
                                    Minimum Product Purchase per Week:  <b> $0.00</b><br />
                                    Your Commission will be Credited:  <b>  Weekly/Monthly  </b><br />
                                </td>
                            </tr>
                            <tr>
                                <td>Membership Renewal:</td>
                                <td>
                                                                        -
                                                                    </td>
                            </tr>
                            <tr>
                                <td>Sponsor:</td>
                                <td><b>digitalworld</b></td>
                            </tr>
                            <tr>
                                <td>Parent (Upline User):</td>
                                <td>digitalworld</td>
                            </tr>
                            <tr>
                                <td>Joining Date:</td>
                                <td><b>16th August 2018</b></td>
                            </tr>
                            <tr>
                                <td>Activation Date:</td>
                                <td><b>16th August 2018</b></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 voffset-3">
                                          <br><br>
                                        <fieldset><legend>Payment Preferences</legend>
                        
                                                        <table class="table">
                                <tr>
                                    <td colspan="2">
                                        <span class="mandatory_block">*</span>How do you want to receive your commission?
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        

                                        <input class=input name="paymentpref" id="paymentpref"  type="radio" value="banktransf"   onClick="showMore('showbank')">&nbsp;Bank Transfer<br />                                        <input class=input name="paymentpref" id="paymentpref"  type="radio" value="cheque" checked  onClick="showMore('showcheque')">&nbsp;Check<br />                                                                            </td>
                                </tr>
                            </table>

                            
                                                        <div id="showbank" class="hide">
                                <table class="table">
                                    <tr>
                                        <td colspan="3"><b>Bank Details:</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            A\c Holder name:
                                        </td>
                                        <td><input name="payee" class="form-control" type="text" id="payee" maxlength="60" value="" ></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Account No.:
                                        </td>
                                        <td><input name="accountnum" class="form-control" type="text" id="accountnum" maxlength="20" value="" ></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Bank:
                                        </td>
                                        <td><input name="bank" class="form-control" type="text" id="bank" maxlength="40" value="" ></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Branch:
                                        </td>
                                        <td ><input name="branch" class="form-control" type="text" id="branch" maxlength="40" value="" ></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">  IBAN\BIC\SWIFT \NEFT\RTGS \Routing No.:</td>
                                        <td><input name="ifsc" class="form-control" type="text" id="ifsc" maxlength="31" value="" ></td>
                                    </tr>
                                </table>
                            </div>
                                                                                    <div id="showcheque" class="visible">
                                <table class="table" >
                                    <tr>
                                        <td colspan="2">
                                            <b>Check Details:</b>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            Check Payee:
                                        </td>
                                        <td> <input name="cheque" class="form-control" type="text" id="cheque" maxlength="60" value="arif" ></td>
                                    </tr>
                                </table>
                            </div>
                            
                                                        
                            <table class="table" >
                                <tr>
                                    <td colspan="2"><b>Taxpayer Identification Number:</b></td>
                                </tr>
                                <tr>
                                    <td>  ITIN\SSN\National ID:</td>
                                    <td><input name="pan" class="form-control" type="text" id="pan" maxlength="30" value="12345"></td>
                                </tr>
                            </table>
                        </fieldset>


                                        </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix" >
                    <input class="btn btn-success btn-block" type="submit" name="Submit" value="Save">
                </div>
            </div>
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
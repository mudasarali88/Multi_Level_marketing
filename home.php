<?php 
ob_start();
require_once('inc/header.php');
require_once('inc/side.php'); 
$plan = planById($_SESSION['user']['splan']);
$package = packageById($_SESSION['user']['spackage']);
$totalReferal = getCountRefferalsByUserId($_SESSION['user']['ID']);
$AdvancePackages = getPackagesByPlanId(30);
if (isset($_POST['choosePackage']))
{
	$error = upgradeUserPlan();
}
// var_dump($plan['cat_title']); 

?>
	<div class="content-wrapper">
			<!-- Content Header (Page header) -->
		<section class="content-header">
				<h1> Dashboard </h1>
		</section>
			<!-- Main content -->
			<section class="content">
				<div class="panel panel-default">
						<div class="panel-body">
							<!-- /////////////// -->
							<div class="row">
								<?=$error?'<p class="alert bg-success text-center">'.$error.'</p>':''?>
								<?=($_REQUEST['msg']?'<p class="alert bg-success text-center">'.$_REQUEST['msg'].'</p>':'')?>
						      <div class="col-lg-3">
						        <div class="panel panel-info">
						          <div class="panel-heading">
						            <div class="row">
						              <div class="col-xs-6">
						                <i class="fa fa-address-card-o fa-5x"></i>
						              </div>
						              <div class="col-xs-6 text-right">
						                <p class="announcement-heading">1</p>
						                <p class="announcement-text">Profiles</p>
						              </div>
						            </div>
						          </div>
						          <a href="Account_settings.php">
						            <div class="panel-footer announcement-bottom">
						              <div class="row">
						                <div class="col-xs-6">
						                  Expand
						                </div>
						                <div class="col-xs-6 text-right">
						                  <i class="fa fa-arrow-circle-right"></i>
						                </div>
						              </div>
						            </div>
						          </a>
						        </div>
						      </div>
						      <div class="col-lg-3">
						        <div class="panel panel-warning">
						          <div class="panel-heading">
						            <div class="row">
						              <div class="col-xs-6">
						                <i class="fa fa-money fa-5x"></i>
						                <!-- <i class="fa fa money"></i> -->
						              </div>
						              <div class="col-xs-6 text-right">
						                <p class="announcement-heading"><?=$totalReferal->balance?></p>
						                <p class="announcement-text"> My Earnings</p>
						              </div>
						            </div>
						          </div>
						          <a href="user_earning.php">
						            <div class="panel-footer announcement-bottom">
						              <div class="row">
						                <div class="col-xs-6">
						                  Expand
						                </div>
						                <div class="col-xs-6 text-right">
						                  <i class="fa fa-arrow-circle-right"></i>
						                </div>
						              </div>
						            </div>
						          </a>
						        </div>
						      </div>
						      <div class="col-lg-3">
						        <div class="panel panel-danger">
						          <div class="panel-heading">
						            <div class="row">
						              <div class="col-xs-6">
						                <i class="fa fa-users fa-5x"></i>
						              </div>
						              <div class="col-xs-6 text-right">
						                <p class="announcement-heading"><?=$totalReferal->refCount?></p>
						                <p class="announcement-text">My Team Members</p>
						              </div>
						            </div>
						          </div>
						          <a href="network.php">
						            <div class="panel-footer announcement-bottom">
						              <div class="row">
						                <div class="col-xs-6">
						                  Expand
						                </div>
						                <div class="col-xs-6 text-right">
						                  <i class="fa fa-arrow-circle-right"></i>
						                </div>
						              </div>
						            </div>
						          </a>
						        </div>
						      </div>
						      <div class="col-lg-3">
						        <div class="panel panel-success">
						          <div class="panel-heading">
						            <div class="row">
						              <div class="col-xs-6">
						                <i class="fa fa-comments fa-5x"></i>
						              </div>
						              <div class="col-xs-6 text-right">
						                <p class="announcement-heading">0</p>
						                <p class="announcement-text"> Total Messages</p>
						              </div>
						            </div>
						          </div>
						          <a href="#">
						            <div class="panel-footer announcement-bottom">
						              <div class="row">
						                <div class="col-xs-6">
						                  Expand
						                </div>
						                <div class="col-xs-6 text-right">
						                  <i class="fa fa-arrow-circle-right"></i>
						                </div>
						              </div>
						            </div>
						          </a>
						        </div>
						      </div>
						    </div><!-- /.row -->
							<!-- /////////////// -->
							<hr style="height: 6px; border-top: 3px double #8c8b8b;">
							<div class="row">
								
								<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
									<div  style="background-color:#ffcbc4; border-top:5px  #c48c85 solid; padding:20px;">
									
										<table width="100%" border="0" class="table table-hover">
											<tr>
												<td colspan="2" class="text-center"><h3> My Details</h3></td>
											</tr>
											<tr>
												<td><span style="font-size:1.2em;">Email</span>: </td>
												<td><span style="font-size:1.2em;"><?=$_SESSION['user']['Email']?> </td>        
											</tr>
											<tr>
												<td><span style="font-size:1.2em;">Mobile/Cell</span>: </td>
												<td><span style="font-size:1.2em;"><?=$_SESSION['user']['Telephone']?></span></td>
											</tr>
											<tr>
												<td><span style="font-size:1.2em;">Ref Id</span>: </td>
												<td><span style="font-size:1.2em;"><?=$totalReferal->refId?></span></td>
											</tr>
											<tr>
												<td ><span style="font-size:1.2em;">refId2</span>:</td>
												<td> <span style="font-size:1.2em;"><?=($totalReferal->refId2?$totalReferal->refId2:'N/A')?></span></td>
											</tr>
											
											<tr>
												<td><span style="font-size:1.2em;">Plan</span>: </td>
												<td><span style="font-size:1.2em;"><?=$plan?>&nbsp;<?=($totalReferal->refCount>=2 && $totalReferal->adnaveLvlRefId==''?'<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Upgrade</button>':'')?></span></td>
											</tr>
											<tr>
												<td><span style="font-size:1.2em;">Package</span>: </td>
												<td><span style="font-size:1.2em;"><?=$package?></span></td>
											</tr>
											<tr>
												<td colspan="2"><div style="float:right;"><a href="account_settings.php">View Details</a></div></td>
											</tr>
										</table>
										</div>
									</div>
									<div  class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div class="panel">
											<div class="panel-body" style=" height:444px; background-color:#a4fcb4; border-top:5px green solid">
											<h3 class="text-center"> Announcements</h3>
											<hr>
											<?php $run=mysqli_query($con,"SELECT `id`, `type`, `message`, `date` FROM `Announcements` "); ?>

											<table  width="100%">
											<?php
												while ($result=mysqli_fetch_assoc($run))
												{
													$id=$result['id'];
													$message=$result['message'];
													?>
													<tr>
														<td>
															<marquee ><b> <?php echo $message ?><br><br>  <b> </b></marquee>
														</td>
													</tr>
											<?php
												}
											?>
											</table>
											</div>
										</div>
									</div>
									
								</div><!--/row-->
							</div>
						</section>
					</div>
		<!-- /.content-wrapper -->
		<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Advance Level Packeges</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<?php foreach ($AdvancePackages as $item): ?>
	          	<div class="col-sm-4">
	          		<!-- <div class="vl" style="border-left: 1px solid green; height: 200px;"></div> -->
	          		<form method="post">
	          		<p>Package: <b><?=$item['subcat_title']?></b></p>
	          		<p>Price:<b><?=$item['price']?></b></p>
	          		<input type="hidden" name="packagePrice" value="<?=$item['price']?>">
	          		<input type="hidden" name="packageName" value="<?=$item['ID']?>">
	          		<p><input type="submit" name="choosePackage" class="btn btn-success" value="Choose package"></p>
	          		</form>
	          	</div>
          	<?php endforeach ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	<?php require_once('inc/footer.php'); ?>


		<!-- Add the sidebar's background. This div must be placed
							immediately after the control sidebar -->
		

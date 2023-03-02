<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost","root","admin","mlm_");

function seo_friendly_url($string){
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    return strtolower(trim($string, '-'));
}
function cleanString($string='')
{
		// Strip HTML Tags
	$clear = strip_tags($string);
	// Clean up things like &amp;
	$clear = html_entity_decode($clear);
	// Strip out any url-encoded stuff
	$clear = urldecode($clear);
	// Replace non-AlNum characters with space
	$clear = preg_replace('/[^A-Za-z0-9]/', ' ', $clear);
	// Replace Multiple spaces with single space
	$clear = preg_replace('/ +/', ' ', $clear);
	// Trim the string of leading/trailing space
	$clear = trim($clear);
	return $clear;
}
function getAllPlans($value='')
{
	global $con;
	$array	= array();
	$squery	= "select * from categories ORDER BY cat_title ASC LIMIT 1";
	$zahid	= mysqli_query($con,$squery);
	while($rows = mysqli_fetch_assoc($zahid))
	{
		$array[] = $rows;
	}
	// var_dump($array); die;
	return $array;
}
function getPackagesByPlanId($value='')
{
	global $con;
	$array	=  array();
	$squery	=  "select * from subcategories WHERE cat_ID = $value";
	$zahid	=  mysqli_query($con,$squery);
	while($rows = mysqli_fetch_assoc($zahid))
	{
		$array[] = $rows;
	}
	// var_dump($array); die;
	return $array;
}
function registerNewUser()
{
	global $con;
	if($_POST['sponsor'] && $_POST['sponsor']!='')
	{
		$sponsor	=	$_POST['sponsor'];

		$refData = mysqli_query($con, "SELECT * FROM users WHERE refId = '$sponsor'");
		$numRows = mysqli_num_rows($refData);
		// $numRows = 1;
		if($numRows==1)
		{
			$fname		=	cleanString($_POST['fname']);
			$lname		=	cleanString($_POST['lname']);
			$password	=	sha1($_POST['password']);
			$gender		=	$_POST['gender'];
			$dob		=	$_POST['dob'];
			$email		=	$_POST['email'];
			$phonenumber=	cleanString($_POST['phonenumber']);
			$splan		=	$_POST['splan'];
			$spackage	=	$_POST['spackage'];
			$basicNodeSide	=	$_POST['treeNodeSide'];

			$duplicateEmailChk = mysqli_query($con, "SELECT * FROM users WHERE Email = '$email'");
			if(mysqli_num_rows($duplicateEmailChk)<=0)
			{
				$query1 = "INSERT INTO `users` (`FirstName`, `LastName`, `Password`, `gender`, `dob`, `Email`, `Telephone`, `sponsor`, `splan`, `spackage`, `basicNodeSide`) VALUES ('$fname', '$lname', '$password', '$gender','$dob', '$email', '$phonenumber','$sponsor', '$splan', '$spackage', '$basicNodeSide')";
				$run = mysqli_query($con,$query1);
				if($run)
				{
					header('location:index.php?msg=Your application is under process, you will be notified after processing');
				}
				else
				{
					return "Try Again";
				}
			}
			else
			{
				return "Email Already Exist Please try another";
			}
		}
		else
		{
			return "Refferal id is invalid";
		}
	}
	else
	{
		return "Refferal Should not be empty";
	}
}
function registerNew($value='')
{
	global $con;
	if($_POST['sponsor'] && $_POST['sponsor']!='')
	{
		$sponsor	=	$_POST['sponsor'];
		$treeRef	= 	$_POST['sponsor'];
		$treeRefLoop	= 	$_POST['sponsor'];

		$dataComissionRef = mysqli_query($con, "SELECT * FROM users WHERE refId = '$sponsor'");
		if(mysqli_num_rows($dataComissionRef)<=0)
		{
			return "Refferal id is invalid";
		}
		else
		{
			$dataComissionRefCount = mysqli_fetch_object($dataComissionRef);
		
			if($dataComissionRefCount->refCount>=2)
			{
				$basicNodeSide = $_POST['treeNodeSide'];
				$upperLvl = $dataComissionRefCount->user_level+1;
				$refPerson='';

				while($refPerson==''){
				$treeRefRawData = mysqli_query($con, "SELECT * FROM users WHERE user_level = $upperLvl AND basicNodeSide = '$basicNodeSide' AND sponsor = '$treeRefLoop' ORDER BY ID ASC LIMIT 1");
				// $treeRefRawData = mysqli_query($con, "SELECT * FROM users WHERE refCount < 2 AND user_level > $upperLvl AND basicNodeSide = '$basicNodeSide' ORDER BY ID ASC LIMIT 1");
					if(mysqli_num_rows($treeRefRawData) == 0){
						$treeRefData = $treeRefData;
						$refPerson='a';
					}elseif(mysqli_num_rows($treeRefRawData) == 1){
						$treeRefData = mysqli_fetch_object($treeRefRawData);
						$upperLvl = $treeRefData->user_level+1;
						$treeRefLoop = $treeRefData->refId;
						$refPerson='';
					}
				}

				$treeRef = $treeRefData->refId;

				$treeLevel = $treeRefData->user_level + 1;

				$treerefCount = $treeRefData->refCount;

				$treeParentId = $treeRefData->ID;

				$basicNodeSide = $_POST['treeNodeSide'];
			}
			else
			{
				$treeLevel = $dataComissionRefCount->user_level + 1;
				
				$treerefCount = $dataComissionRefCount->refCount;
				
				$treeParentId = $dataComissionRefCount->ID;
				
				if($dataComissionRefCount->refCount==1)
				{
					$basicNodeSide = 'right';
				}
				else{
					$basicNodeSide = 'left';
					
				}
			}
		}
		
	}
	else
	{
		return "Refferal id is invalid";
	}
		// var_dump($treeLevel); die;
	// var_dump($dataComissionRefCount->user_level); die;
	$fname		=	cleanString($_POST['fname']);
	$lname		=	cleanString($_POST['lname']);
	$password	=	sha1($_POST['password']);
	$gender		=	$_POST['gender'];
	$dob		=	$_POST['dob'];
	$email		=	$_POST['email'];
	$phonenumber=	cleanString($_POST['phonenumber']);
	$splan		=	$_POST['splan'];
	$spackage	=	$_POST['spackage'];
	// $basicNodeSide = $_POST['treeNodeSide'];

	$query1 = "INSERT INTO `users` (`FirstName`, `LastName`, `Password`, `gender`, `dob`, `Email`, `Telephone`, `sponsor`, `refId2`, `splan`, `spackage`, `user_level`, `basicNodeSide`) VALUES ('$fname', '$lname', '$password', '$gender','$dob', '$email', '$phonenumber','$sponsor', '$treeRef', '$splan', '$spackage', '$treeLevel', '$basicNodeSide')";
	
	$run = mysqli_query($con,$query1);
	
	if($run)
	{
		$LastId 				= mysqli_insert_id($con);

		$refId					= $fname.$LastId;

		$query2 				= mysqli_query($con, "UPDATE users SET refId = '$refId' WHERE ID = $LastId");

		$packagePriceData		= mysqli_query($con, "SELECT * FROM subcategories WHERE ID = '$spackage'");
		$packagePrice 			= mysqli_fetch_object($packagePriceData);

		$comissionTranfered		= ($packagePrice->price*$packagePrice->comission)/100;

		$refCount 				= $treerefCount+1;

		$refCountUpdate			= mysqli_query($con, "UPDATE users SET refCount = $refCount WHERE ID = $treeParentId");

		$totalEarnings			= $dataComissionRefCount->earning + $comissionTranfered; 
		
		$balance 				= $dataComissionRefCount->balance + $comissionTranfered; 
		
		$updateEarnings			= mysqli_query($con, "UPDATE users SET earning = '$totalEarnings', balance = '$balance' WHERE ID = $dataComissionRefCount->ID");
		
		$insertComision			= mysqli_query($con, "INSERT INTO `earnings` (`refferedId`, `packageId`, `amount`, `refererId`, `description`) VALUES ('$LastId', '$spackage', '$comissionTranfered', '$dataComissionRefCount->ID', 'Refferal Comission');");
		
		$perfactTreeComission	= calcAndTransPerfactTreeComission($treeLevel-1, $treeLevel, $packagePrice->price, $refId);

			header('location:index.php?msg=registered Successfully Please Login Here');
    }
	else
	{
     $error = "Something Went Wrong Please Try Again";
     
     return $error;
    }

}

$totalTreeNodes = 0;
function calcAndTransPerfactTreeComission($parentLevel, $childLevel, $amount, $childRefId)
{
	global $totalTreeNodes;
	// $totalTreeNodes = 0;
	global $con;
	for ($i=$parentLevel; $i > 0 ; $i--) 
	{ 
		$n = $childLevel - $i;
		$n = $n + 1;
		$totalChildShouldBe = pow(2, $n) - 2;

		$ChildRawData = mysqli_query($con, "SELECT * FROM users WHERE refId = '$childRefId';");
		$ChildData = mysqli_fetch_object($ChildRawData);
		$totalTreeNodes = 0;
		countNodes($ChildData->refId2);
		 // var_dump($totalChildShouldBe);
		 // var_dump($totalTreeNodes); 
		if($totalChildShouldBe == $totalTreeNodes)
		{
			/*$parentQuery = mysqli_query($con, "SELECT * FROM users WHERE refId = '$childRefId';");
			$childData = mysqli_fetch_object($childQuery);*/

			$parentDataQuery = mysqli_query($con, "SELECT * FROM users WHERE refId = '$ChildData->refId2';");
			$parentData = mysqli_fetch_object($parentDataQuery);
			if($parentData->deletestatus=='1'){
			$comissionTranfered = ($amount*10)/100;
			$insertComision		= mysqli_query($con, "INSERT INTO `earnings` (`refferedId`, `amount`, `refererId`, `description`) VALUES ('$childData->ID', '$comissionTranfered', '$parentData->ID', 'Basic Level Completion Comission');");

			$totalEarnings = $parentData->earning + $comissionTranfered;
			$totalBalance = $parentData->balance + $comissionTranfered;
			$updateEarnings			= mysqli_query($con, "UPDATE users SET earning = '$totalEarnings', balance = '$totalBalance' WHERE ID = $parentData->ID");
			}
			$childRefId = $parentData->refId;
		}
		else
		{
			break;
		}
	} //die;


}

function countNodes($parentid='') 
 {
 	global $totalTreeNodes;
 	global $con;
  $sql="SELECT * FROM users WHERE refId2='$parentid'";
  $result=mysqli_query($con, $sql);
  $i=0;
  while (true) {
    $row=mysqli_fetch_array($result);
    if (!$row) break;
    if ($i==0) echo "";
    $i=1;
    $totalTreeNodes++;
    echo $totalTreeNodes;
    echo '';
    countNodes($row['refId']);
    //echo '</li>';
  }
  if ($i>0) echo  '';

}
function userLoginProcess()
{
	global $con;
	$username =$_POST["username"];
    $password =sha1($_POST["password"]);
    
    $query = mysqli_query($con, "select * from users Where Email ='$username' AND password ='$password' AND isUser = '1' AND status = '1' AND active = '1' AND deletestatus = '1';");
    if(mysqli_num_rows($query) == 1)
    {
     	$data = mysqli_fetch_assoc($query);
     	$_SESSION['user'] = $data;
     	$_SESSION['isLogin'] = TRUE;
     	header('Location:home.php');
    }
    else
    {
    	$error = 'Email OR Password is incorrect please try again';
    }
}
function getLogout()
{
	$_SESSION['user'] = '';
    $_SESSION['isLogin'] = FALSE;
    unset($_SESSION);
    session_destroy();
    header('Location:index.php?msg=Logout Successfully');
}
function getCountRefferalsByUserId($id='')
{
	global $con;
	$data = mysqli_query($con, "SELECT * FROM users WHERE ID = $id;");
	$return = mysqli_fetch_object($data);
	return $return;
}
function planById($id='')
{
	global $con;
	$data = mysqli_query($con, "SELECT cat_title FROM categories WHERE ID = $id;");
	$return = mysqli_fetch_object($data);
	return $return->cat_title;
}
function packageById($id='')
{
	global $con;
	$data = mysqli_query($con, "SELECT subcat_title FROM subcategories WHERE ID = $id;");
	$return = mysqli_fetch_object($data);
	return $return->subcat_title;
}
function refferalsByUser($refId = '', $refId2 = '')
{
	$array = array();
	global $con;
	$data = mysqli_query($con, "SELECT * FROM users JOIN subcategories ON users.spackage=subcategories.ID JOIN categories ON users.splan=categories.ID WHERE users.sponsor = '$refId' OR users.sponsor = '$refId2';");
	while($row = mysqli_fetch_assoc($data))
	{
		$array[] = $row;
	}
	return $array;
}
 //$abc = 0;
 function prinChildQuestions($parentid='') 
 {
 	 //global $abc;
 	global $con;
  $sql="SELECT *,users.Image as uimage,categories.cat_title,subcategories.subcat_title FROM users join categories on users.splan = categories.ID join subcategories on users.spackage = subcategories.ID WHERE users.refId2='$parentid'";
  $result=mysqli_query($con, $sql);
  $i=0;
  while (true) {
    $row=mysqli_fetch_array($result);
    if (!$row) break;
    if ($i==0) echo "<ul>";
    $i=1;
     //$abc++;
     
    echo '<li><a class=""><h6>'.$row['refId'].'<h6><img width="50" class="img img-circle tooltip-col" style="border: 1px solid #000;" src="images/'.(!empty($row['uimage'])?$row['uimage']: 'dunny.jpg').'">
    <h4>'.$row['FirstName'].' '.$row['LastName'].'</h4></a><span class="tooltiptext4"><i class="fa fa-phone" aria-hidden="true"></i> <br>1800 555 444</span>';
    //echo $abc;
    prinChildQuestions($row['refId']);
    echo '</li>';
  }
  if ($i>0) echo  '</ul>';
}
function getEarningsByUserId($id)
{
	$array = array();
	global $con;
	$data = mysqli_query($con, "SELECT * FROM earnings WHERE earnings.refererId = '$id';");
		// var_dump("SELECT * FROM earnings JOIN users ON earnings.refferedId=users.ID WHERE earnings.refererId = '$id';"); die;
	while($row = mysqli_fetch_assoc($data))
	{
		$array[] = $row;
	}
	return $array;
}
function upgradeUserPlan()
{
	global $con;
	$package_id = $_POST['packageName'];
	$packagePrice = $_POST['packagePrice'];
	$userId = $_SESSION['user']['ID'];
	$parentQuery = mysqli_query($con, "SELECT * FROM users WHERE spackage = '$package_id' AND refCountAdvanceLvl < 2 AND ID <> $userId ORDER BY ID ASC LIMIT 1");
	$parentData = mysqli_fetch_object($parentQuery);
	if($parentData != ''){
		$adnaveLvlRefId = $parentData->ID;
		$advancLvlNo =  $parentData->advancLvlNo+1;

	}else{
			$adnaveLvlRefId = 0;
			$advancLvlNo = 1;
		}
	$query = mysqli_query($con, "UPDATE users SET spackage = $package_id, splan = 30, adnaveLvlRefId = $adnaveLvlRefId, advancLvlNo = $advancLvlNo  WHERE ID=$userId;");
	if($query)
	{
		$refCountTotal = $parentData->refCountAdvanceLvl + 1;
		$parentUpdate = mysqli_query($con, "UPDATE users SET refCountAdvanceLvl = '$refCountTotal' WHERE ID=$adnaveLvlRefId;");
		$_SESSION['user']['splan'] = 30;
		$_SESSION['user']['spackage'] = $package_id;
		$perfactTreeComission	= calcAndTransPerfactTreeComissionAdvance($advancLvlNo-1, $advancLvlNo, $packagePrice->price, $userId);
		//var_dump($_SESSION); 
		//die;
		header('Location:home.php?msg=Your Account has been Upgraded');
		// return "Your Account has been Upgraded";
	}
	else
	{
		return "Something went wrong please try again";
	}
}
$totalTreeNodesAdvance = 0;
function calcAndTransPerfactTreeComissionAdvance($parentLevel, $childLevel, $amount='', $childRefIdadvance)
{
	global $totalTreeNodesAdvance;
	// $totalTreeNodesAdvance = 0;
	global $con;
	$removingLvl = 1;
	for ($i=$parentLevel; $i > 0 ; $i--) 
	{
		if ($removingLvl >= 8) {
			break;
		 	# code...
		 } 
		$n = $childLevel - $i;
		$n = $n + 1;
		$totalChildShouldBe = pow(2, $n) - 2;

		$ChildRawData = mysqli_query($con, "SELECT * FROM users WHERE ID = '$childRefIdadvance';");
		$ChildData = mysqli_fetch_object($ChildRawData);
		//var_dump($ChildData); 
		$totalTreeNodesAdvance = 0;
		countNodesAdvance($ChildData->adnaveLvlRefId);

		$packageDataQry = mysqli_query($con, "SELECT * FROM subcategories WHERE ID = '$ChildData->spackage';");
		$packageData = mysqli_fetch_object($packageDataQry);
		// var_dump($packageData); die;
		// var_dump($packageData); die;
		 // var_dump($totalChildShouldBe);
		 // var_dump($totalTreeNodesAdvance); 
	// var_dump($ChildData);
	 //die;
		if($totalChildShouldBe == $totalTreeNodesAdvance)
		{
			/*$parentQuery = mysqli_query($con, "SELECT * FROM users WHERE refId = '$childRefId';");
			$childData = mysqli_fetch_object($childQuery);*/

			$parentDataQuery = mysqli_query($con, "SELECT * FROM users WHERE ID = '$ChildData->adnaveLvlRefId';");
			$parentData = mysqli_fetch_object($parentDataQuery);
			////////////////////
			if ($parentData->deletestatus=='1') {
				# code...
			$comissionTranfered = ($packageData->price*$packageData->comission)/100;
			$insertComision		= mysqli_query($con, "INSERT INTO `earnings` (`refferedId`, `amount`, `refererId`, `description`) VALUES ('$childData->ID', '$comissionTranfered', '$parentData->ID', 'Advance Level Completion Comission');");

			$totalEarnings = $parentData->earning + $comissionTranfered;
			$totalBalance = $parentData->balance + $comissionTranfered;
			$updateEarnings			= mysqli_query($con, "UPDATE users SET earning = '$totalEarnings', balance = '$totalBalance' WHERE ID = $parentData->ID");
			
			}
			$childRefIdadvance = $parentData->ID;
			$removingLvl++;
		}
		else
		{
			break;
		}
	} //die;


}

function countNodesAdvance($parentid='') 
 {
 	global $totalTreeNodesAdvance;
 	global $con;
  $sql="SELECT * FROM users WHERE adnaveLvlRefId='$parentid'";
  $result=mysqli_query($con, $sql);
  $i=0;
  while (true) {
    $row=mysqli_fetch_array($result);
    if (!$row) break;
    if ($i==0) echo "";
    $i=1;
    $totalTreeNodesAdvance++;
    echo $totalTreeNodesAdvance;
    echo '';
    countNodes($row['refId']);
    //echo '</li>';
  }
  if ($i>0) echo  '';

}
function withdrawRequest()
{
	global $con;
	$userId = $_SESSION['user']['ID'];
	$amount = $_POST['amount'];
	$query = mysqli_query($con, "INSERT INTO withdrawrequest (userId, amount, status) VALUES($userId, '$amount', 0);");
	if($query)
	{
		header('Location:withdrawl.php?msg=Request Submited to Admin and put to Review');
	}
}
function getUserData()
{
	global $con;
	$data = mysqli_query($con, "SELECT * FROM users WHERE ID = ".$_SESSION['user']['ID']);
	$return = mysqli_fetch_assoc($data);
	// var_dump($return); die;
	return $return;
}
function userUpdate($value='')
{
	global $con;
	$firstname = $_POST['firstname'];
         $lastname = $_POST['lastname'];
         $gender = $_POST['gender'];
         $dob = $_POST['dob'];
         $address = $_POST['address'];
         $country = $_POST['country'];
         $state = $_POST['state'];
         $city = $_POST['city'];
         $zipcode = $_POST['pincode'];
         $language = $_POST['language'];
         $description = $_POST['description'];
         $Telephone = $_POST['Telephone'];
         
         if($_FILES['img']['name'] !='')
         {
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES["img"]["name"]);
            $ext = end($temp);
            if(in_array($ext, $allowedExts))
            {
                $newfilename = date('dmYHis').'_'.$_FILES['img']['name'].'.'.$ext;
                $destin = 'images/'.$newfilename;
                if(move_uploaded_file($_FILES["img"]["tmp_name"], $destin))
                {
                    $img = $newfilename;
                    $query ="UPDATE users SET FirstName='$firstname', LastName='$lastname', gender='$gender', dob='$dob', Address='$address', Country='$country',State='$state', City='$city', ZipCode='$zipcode', description='$description', Telephone='$Telephone' Image = '$img' WHERE ID =".$_SESSION['user']['ID'];
                }
            }
         }
         else
         {
           $query ="UPDATE users SET FirstName='$firstname', LastName='$lastname', gender='$gender',
            dob='$dob', Address='$address', Country='$country',State='$state',
            City='$city', ZipCode='$zipcode', description='$description', Telephone='$Telephone' WHERE ID =".$_SESSION['user']['ID'];
         }
    
     //show of person against which amount came
//forget password on email 
//user data editing 
//rewards lists
//not delete , suspend that guy 
//auto binary tree 
//minimum with draw amount ???
     // var_dump($query); die;
    
       $run = mysqli_query($con,$query); 
       return true;
       // header('Location:');
}
function sendBroadcost()
{
	global $con;
	$refId = $_SESSION['user']['refId'];
	// $To = $_POST['to'];
    $Subject = $_POST['subject'];
    $Message = $_POST['message'];
    $from = $_SESSION['user']['ID'];
    $recieversQry = mysqli_query($con, "SELECT ID FROM users WHERE sponsor = '$refId'");
    while ($rkey = mysqli_fetch_assoc($recieversQry))
    {
    	$topersom = $rkey['ID'];
    	$mysql = mysqli_query($con ,"INSERT INTO `broadcast`(`msgTo`, `msgSubject`, `Message`, `msgFrom`) VALUES($topersom,'$Subject','$Message', '$from')");
    	# code...
    }
    return true;
}
function getMsgs()
{
	$array = array();
	global $con;
	$data = mysqli_query($con, "SELECT broadcast.*, users.FirstName, users.LastName  FROM broadcast LEFT JOIN users ON broadcast.msgFrom=users.ID WHERE broadcast.receiver_deleted_status='1' AND broadcast.msgTo = ".$_SESSION['user']['ID']);
		// var_dump("SELECT broadcast.*, users.FirstName, users.LastName  FROM broadcast LEFT JOIN users ON broadcast.msgFrom=users.ID WHERE broadcast.receiver_deleted_status='1' AND broadcast.msgTo = ".$_SESSION['user']['ID']); die;
	while($row = mysqli_fetch_assoc($data))
	{
		$array[] = $row;
	}
	return $array;
}
function getsendMsgs()
{
	$array = array();
	global $con;
	$data = mysqli_query($con, "SELECT broadcast.*, users.FirstName, users.LastName  FROM broadcast LEFT JOIN users ON broadcast.msgTo=users.ID WHERE broadcast.sender_deleted_status='1' AND broadcast.msgFrom = ".$_SESSION['user']['ID']);
		// var_dump("SELECT broadcast.*, users.FirstName, users.LastName  FROM broadcast LEFT JOIN users ON broadcast.msgTo=users.ID WHERE broadcast.sender_deleted_status='1' AND broadcast.msgFrom = ".$_SESSION['user']['ID']); die;
	while($row = mysqli_fetch_assoc($data))
	{
		$array[] = $row;
	}
	return $array;
}
function delete_reciever_messsage($ID)
{
	global $con;

	$query = "UPDATE broadcast SET receiver_deleted_status='0' WHERE ID='$ID'";

	if (mysqli_query($con,$query)) 
		{
			header('Location:user_inbox.php');

		}
		else{
			return false;
		}
}
function delete_outbox_message($ID)
{
	global $con;

	$query = "UPDATE broadcast SET sender_deleted_status='0' WHERE ID='$ID'";

	if (mysqli_query($con,$query)) 
		{
			header('Location:user_inbox.php');

		}
		else{
			return false;
		}
}
function userRecoverProcess()
{	//mudasarali88@gmail.com
	global $con;
	$email = $_POST['username'];

	$query =mysqli_query($con, "SELECT Email FROM users WHERE Email = '$email'");
	if(mysqli_num_rows($query)==1)
	{
		$data = mysqli_fetch_object($query);
		$newpassword = randomPassword();

		require 'phpmailer/PHPMailerAutoload.php';

		$mail = new PHPMailer();

		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPDebug = 2; 
		$mail->SMTPSecure = "ssl";
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = 'mahi9698224@gmail.com';
		$mail->Password = 'mahi12345';

		$mail->setFrom('info@mlm.com', 'MLM Marketing');
		$mail->addAddress($data->Email);
		$mail->Subject = 'User Password Reset';
		$mail->Body = 'Your Password has been reset. Please login with this new password: '.$newpassword;

		if ($mail->send())
		{ 
			global $con;
		    $newpassword = sha1($newpassword);
		    $query =" UPDATE users SET Password ='$newpassword' Where Email='$data->Email' ";

		    if(mysqli_query($con,$query))
		    {
				header('Location:forgetpassword.php?msg=Password has been reset please check your email account');

		    }
		    else
		    {
				header('Location:forgetpassword.php?msg=Something went wrong please try again');

		    }
		    
		}
		
	}
	else
	{
		header('Location:forgetpassword.php?msg=Account Not found');
	}
}
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>



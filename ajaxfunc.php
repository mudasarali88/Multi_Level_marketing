<?php
 		require_once('inc/connect.php');

	if($_POST['catId'] && $_POST['catId'] !='')
	{
		$option='';
		$packages = getPackagesByPlanId($_POST['catId']);
		foreach ($packages as $pkey) 
		{
			$option .= '<option value="'.$pkey['ID'].'">'.$pkey['subcat_title'].'</option>';
		}
		echo json_encode(array('data'=>$option));
	}

?>
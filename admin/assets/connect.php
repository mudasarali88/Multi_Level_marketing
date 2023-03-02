<?php

// $con = mysqli_connect("localhost","root","admin","mlm_");
 function prinChildQuestions($parentid='') 
 {
  $con = mysqli_connect("localhost","root","admin","mlm_");
  $sql="SELECT *,users.Image as uimage,categories.cat_title,subcategories.subcat_title FROM users join categories on users.splan = categories.ID join subcategories on users.spackage = subcategories.ID WHERE users.refId2='$parentid'";
  // var_dump($sql); die;
  $result=mysqli_query($con, $sql);
  $i=0;
  while (true) {
    $row=mysqli_fetch_array($result);
    if (!$row) break;
    if ($i==0) echo "<ul>";
    $i=1;
    echo '<li class=""><a><img style="border: 1px solid #000;" class="imgset img-circle" src="'.base_url().'../images/'.(!empty($row['uimage'])?$row['uimage']: 'dunny.jpg').'">
    <h4>'.$row['FirstName'].' '.$row['LastName'].'</h4></a>';
    prinChildQuestions($row['refId']);
    echo '</li>';
  }
  //$i++;
  if ($i>0) echo  '</ul>';
  //return $htm;
}
 function prinChildQuestionsAdvance($parentid='', $package='') 
 {
 	$con = mysqli_connect("localhost","root","admin","mlm_");
  $sql="SELECT *,users.Image as uimage,categories.cat_title,subcategories.subcat_title FROM users join categories on users.splan = categories.ID join subcategories on users.spackage = subcategories.ID WHERE users.adnaveLvlRefId='$parentid' AND spackage = '$package'";
 	// var_dump($sql); die;
  $result=mysqli_query($con, $sql);
  $i=0;
  while (true) {
    $row=mysqli_fetch_array($result);
    if (!$row) break;
    if ($i==0) echo "<ul>";
    $i=1;
    echo '<li class="imgset"><a><img src="'.base_url().'../images/'.(!empty($row['uimage'])?$row['uimage']: 'dunny.jpg').'">
    <h4>'.$row['FirstName'].' '.$row['LastName'].'</h4><h5>'.$row['cat_title'].'</h5><h5>'.$row['subcat_title'].'</h5></a>';
    prinChildQuestionsAdvance($row['ID'], $row['spackage']);
    echo '</li>';
  }
  //$i++;
  if ($i>0) echo  '</ul>';
  //return $htm;
}
?>
<style type="text/css">
  .imgset a
  {
    border:none;
  }
  .imgset img
  {
    border:solid 1px #000 !important;
    border-radious:50% !important;
    padding:10px !important;
  }
</style>
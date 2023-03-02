<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('cleanURL'))

{

    function cleanURL($string='') 

	{

   		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

      $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   		$string = strtolower($string); // Removes special chars.

   		return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

	} 
	


}
if ( ! function_exists('textedit'))

{

    function textedit($string='') 

  {

      require("assets/rte/fckeditor.php");
        $oFCKeditor = new FCKeditor('FCKeditor');
        $oFCKeditor->BasePath = base_url()."assets/rte/" ;
        if(isset($obj['privacy_policy'])){ 
            $oFCKeditor->Value = $obj['privacy_policy'];
        } else {
            $oFCKeditor->Value = "";
        }
        $texteditor = $oFCKeditor->Create();
        return $texteditor;
  } 



}
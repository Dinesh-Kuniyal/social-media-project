<?php
if(!defined('Opiverse_Pages_Auth_Constant')){
    $Error_Location = 'location: '. $Error_Base_Url .'403/';
    header($Error_Location);
}
?>
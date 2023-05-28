<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
    die("<h1>You have not permission to acces this Page.</h1>");
    exit;
}else{
    function RemoveRequest($SelfUserID, $FUID){
        $connection = $GLOBALS['connection'];
        $Delete = mysqli_query($connection, "DELETE FROM `requests` WHERE `request_by`='$SelfUserID' AND `request_to`='$FUID'");
        if($Delete){
            return true;
        }else{
            return false;
        }
    }
}
?>
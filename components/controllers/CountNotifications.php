<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../../modules/connection.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    if(isset($_SESSION['user_id'])){
        $SelfUserId = $_SESSION['user_id'];
        $Select = mysqli_query($connection, "SELECT * FROM `notifications` WHERE `sent_to`='$SelfUserId' AND `status`='UNSEEN'");
        if(mysqli_num_rows($Select) > 0){
            echo "SetNotifications('". mysqli_num_rows($Select) ."')";
        }else{
            echo "SetNullNotifications()";
        }
    }else{
        die("You don't have permssion to access this page");
    }
}else{
    die("You don't have permssion to access this page");
}
?>
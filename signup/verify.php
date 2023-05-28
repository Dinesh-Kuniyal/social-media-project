<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include_once('../modules/connection.php');
$user_id = $_SESSION['user_id'];
$EnteredOTP = mysqli_real_escape_string($connection, $_POST['Entered_OTP']);
$UserAllData = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `users` WHERE `user_id`=$user_id"));
$RealOTP = $UserAllData['ROTP'];
if($RealOTP == $EnteredOTP){
    $UpdateUser = "UPDATE `users` SET `verified`='YES' WHERE `user_id`=$user_id";
    $queryUpdate = mysqli_query($connection, $UpdateUser);
    if($queryUpdate){
        echo "window.location.href = '../'";
    }else{
        echo "ShowVerifyAlert('Error in verifying Try Again')";
    }
}else{
    echo "ShowVerifyAlert('Incorrect OTP')";
}
?>
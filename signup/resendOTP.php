<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include_once('../modules/connection.php');
$user_id = $_SESSION['user_id'];
$UserData =  mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `users` WHERE `user_id`=$user_id"));
$userEmail = $UserData['email'];
$subject = "Verify your cultcheck account";
$RandomOTP = rand(100000, 999999);
$name = $UserData['name'];
$body = '<div class="main-outer-main-container" style="width: 94%;height: auto;padding: 10px;border-radius: 4px;margin-left: auto;margin-right: auto;margin-top: 10px;flex-flow: column;justify-content: center;align-items: center;border: 1px solid rgba(0,0,0,.4);">
<img src="https://i.ibb.co/VJYd9SK/logo.png" alt="ERROR" style="width: 150px;">
<h2>Hello, '.$name.'</h2>
<span>Thanks for joining opiverse</span>
<h4>This is the OTP for verification : '. $RandomOTP .'</h4>
</div>';
$header = "From: dineshkuniyal0@gmail.com";
$header .= "MIME-Version: Opiverse\r\n";
$header .= "Content-type: text/html\r\n";
if (mail($userEmail, $subject, $body, $header)) {
    $UpdateOTP = "UPDATE `users` SET `ROTP`=$RandomOTP WHERE `user_id`=$user_id";
    $UpdateQuery = mysqli_query($connection, $UpdateOTP);
    if ($UpdateQuery) {
        echo "ShowVerifyAlert('OTP sent to your email address')";
    } else {
        echo "ShowVerifyAlert('Error in creating your account. Try Again Later')";
    }
} else {
    echo "ShowVerifyAlert('Error in sending OTP to your email address')";
}
?>
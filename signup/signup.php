<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include("../modules/connection.php");
$name = mysqli_real_escape_string($connection, $_POST['name']);
$username = mysqli_real_escape_string($connection, $_POST['username']);
$usertype = mysqli_real_escape_string($connection, $_POST['usertype']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = md5(mysqli_real_escape_string($connection, $_POST['password']));

$select_email = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `users` WHERE `email`='{$email}'"));
if ($select_email > 0) {
    die("SetFormAlert('Email already used. Use different one or Login with this email')");
}

$select_username = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `users` WHERE `username`='{$username}'"));
if ($select_username > 0) {
    die("SetFormAlert('Username already used. Please choose a different one !')");
}

$previous_count = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `users` WHERE 1"));
$previous_count += 1;
$subject = "Verify your cultcheck account";
$RandomOTP = rand(100000, 999999);

$date = date('d-M-y');
$body = '<div style="width: 94%;height: auto;padding: 10px;border-radius: 4px;margin-left: auto;margin-right: auto;margin-top: 10px;flex-flow: column;justify-content: center;align-items: center;border: 1px solid rgba(0,0,0,.4);">
<img src="https://i.ibb.co/VJYd9SK/logo.png" alt="ERROR" style="width: 150px;">
<h2>Hello, ' . $name . '</h2>
<span>Thanks for joining opiverse</span>
<h4>This is the OTP for verification : ' . $RandomOTP . '</h4>
</div>';
$header = "From: dineshkuniyal0@gmail.com";
$header .= "MIME-Version: Opiverse\r\n";
$header .= "Content-type: text/html\r\n";
if (mail($email, $subject, $body, $header)) {
    $UpdateOTP = "INSERT INTO `users`(`name`, `username`, `email`, `user_type`, `password`, `user_id`, `datetimestamp`, `verified`, `ROTP`, `joined`, `about`, `CoverImg`, `ProfileImg`)
     VALUES ('$name','$username','$email','$usertype','$password','$previous_count',current_timestamp(),'NO','$RandomOTP','$date','Hey, I am new here','','')";
    $UpdateQuery = mysqli_query($connection, $UpdateOTP);
    if ($UpdateQuery) {
        echo "OpenVerifyBox()";
    } else {
        echo "SetFormAlert('Error in creating your account. Try Again Later')";
    }
} else {
    echo "SetFormAlert('Error in sending OTP to your email address')";
}

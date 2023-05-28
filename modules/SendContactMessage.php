<?php
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
$name = mysqli_real_escape_string($connection, $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$message = mysqli_real_escape_string($connection, $_POST['message']);
$localIP = getHostByName(getHostName());
date_default_timezone_set('Asia/Kolkata');
$combinedDT = date('Y-m-d H:i:s');
if ($name === "" || $email === "" || $message === "") {
    echo "ERROR";
} else {
    if (isValidEmail($email)) {
        $insertQuery = mysqli_query($connection, "INSERT INTO `contactmessages`(`name`, `email`, `message`, `ip`, `timestamp`) VALUES ('$name','$email','$message','$localIP','$combinedDT')");
        if ($insertQuery) {
            echo "DONE";
        } else {
            echo "ERROR";
        }
    } else {
        echo "Invalid Email";
    }
}

function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

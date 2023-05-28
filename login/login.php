<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include_once("../modules/connection.php");
$name = mysqli_real_escape_string($connection, $_POST['UsernameEmail']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$encPass = md5($password); 
$sql = "SELECT * FROM `users` WHERE `username`='{$name}' AND `password`='{$encPass}' OR `email`='{$name}' AND `password`='{$encPass}'";
$query = mysqli_query($connection, $sql);
if(mysqli_num_rows($query) > 0){
    // Logged In
    $row = mysqli_fetch_assoc($query);
    $_SESSION['user_id'] = $row['user_id'];
    echo "window.location.href = '../'";
    
}else{
    echo "SetLoginAlert('Incorrect details')";
}
?>
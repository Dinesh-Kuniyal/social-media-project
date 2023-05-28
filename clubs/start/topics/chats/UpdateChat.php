<?php
session_start();
define('Opiverse_Const_Private', TRUE);
$user_id = $_SESSION['user_id'];
include("../../../../modules/connection.php");
$club_id = mysqli_real_escape_string($connection, $_POST['club_id']);
$message = mysqli_real_escape_string($connection, $_POST['message']);
if($message != ""){
$insert = mysqli_query($connection, "INSERT INTO `topicdiscuss`(`msg`, `message_by`, `topic_id`, `timestamp`) VALUES ('$message','$user_id','$club_id',current_timestamp())");
}
?>
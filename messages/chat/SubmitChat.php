<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../../modules/connection.php');
$SelfUserId = $_SESSION['user_id'];
$ChatterID = mysqli_real_escape_string($connection, $_POST['Chatter-ID']);
$Message = mysqli_real_escape_string($connection, $_POST['message-input']);
if ($Message != "") {
    if (CheckFriends($connection, $SelfUserId, $ChatterID)) {
        $InsertQuery = "INSERT INTO `messages`(`msg`, `message_by`, `message_to`, `status`, `timestamp`) VALUES ('$Message','$SelfUserId','$ChatterID','UNSEEN',current_timestamp())";
        if (mysqli_query($connection, $InsertQuery)) {
            echo "DONE";
        } else {
            echo "ERROR";
        }
    } else {
        echo "ERROR";
    }
}
// Check if already friends 
function CheckFriends($connection, $user_one, $user_two){
    $SelectFriend = mysqli_query($connection, "SELECT * FROM `friends` WHERE `user_one`='$user_one' AND `user_two`='$user_two' OR `user_one`='$user_two' AND `user_two`='$user_one'");
    if(mysqli_num_rows($SelectFriend) > 0){
        return true;
    }else{
        return false;
    }
}

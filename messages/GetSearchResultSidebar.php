<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include("../modules/connection.php");
$SelfUserId = $_SESSION['user_id'];
$query = mysqli_real_escape_string($connection, $_POST['query']);
$queryText = '%' . $query . '%';
$Search = mysqli_query($connection, "SELECT * FROM `users` WHERE `name` OR `username` LIKE '{$queryText}' LIMIT 25");
if (mysqli_num_rows($Search) > 0) {
    while ($row = mysqli_fetch_assoc($Search)) {
        $SelectUser = SelectUser($connection, $row['user_id']);
        $ChatterUserName = $SelectUser['username'];
        $ChatIframeUrl = "'chat/?user_name=" . $ChatterUserName . "'";
        if ($row['user_id'] != $SelfUserId) {
            if (CheckFriends($connection, $row['user_id'], $SelfUserId)) {
                echo '<li onclick="ChangeChat(' . $ChatIframeUrl . ');OpenUserList()" class="chat-sidebar-user-items">
                    <img src="../resources/uploads/profiles/' . UserProfileImage($connection, $row['user_id']) . '" alt="Failed To Load Image..">
                    <div class="user-details-sidebar-chat">
                        <span class="users-name-chat-sidebar">' . $SelectUser['name'] . '</span>
                        <span class="last-message-chat-sidebar">' . $SelectUser['username'] . '</span>
                    </div>
                </li>';
            } else {
                // $ChatIframeUrl = "'chat/?user_name=" . $ChatterUserName . "'";
                echo '<li onclick=ChangeWindowLocation("../users/?username=' . $ChatterUserName . '") class="chat-sidebar-user-items">
                    <img src="../resources/uploads/profiles/' . UserProfileImage($connection, $row['user_id']) . '" alt="Failed To Load Image..">
                    <div class="user-details-sidebar-chat">
                        <span class="users-name-chat-sidebar">' . $SelectUser['name'] . '</span>
                        <span class="last-message-chat-sidebar">' . $SelectUser['username'] . '</span>
                    </div>
                </li>';
            }
        }
    }
} else {
    echo "No users Found";
}


function SelectUser($connection, $user_id){
    $select = "SELECT * FROM `users` WHERE `user_id`='{$user_id}'";
    $sql = mysqli_query($connection, $select);
    $UserData = mysqli_fetch_assoc($sql);
    return $UserData;
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

// Function to get user profile Image And set to default
function UserProfileImage($connection, $user_id){
    $select = "SELECT * FROM `users` WHERE `user_id`='{$user_id}'";
    $sql = mysqli_query($connection, $select);
    $UserData = mysqli_fetch_assoc($sql);
    if($UserData['ProfileImg'] === ""){
        $UserProfileImage = "sample.png";
    }else{
        $UserProfileImage = $UserData['ProfileImg'];
    }
    return $UserProfileImage;
}

?>
<?php
session_start();
define('Opiverse_Const_Private', TRUE);
$user_id = $_SESSION['user_id'];
include("../../../modules/connection.php");
$club_id = mysqli_real_escape_string($connection, $_POST['club_id']);
$SelectAllChats = mysqli_query($connection, "SELECT * FROM `clubdiscuss` WHERE `club_id`='{$club_id}' ORDER BY `id`");
if (mysqli_num_rows($SelectAllChats) > 0) {
    $result = "";
    while ($row = mysqli_fetch_assoc($SelectAllChats)) {
        $time = $row['timestamp'];
        $temp = $time[11].$time[12].$time[13].$time[14].$time[15];
        $temp0 = (int)$time[11].(int)$time[12];
        // $result.=$temp0;
        if($temp0 <= 11){
            $temp.=' AM';
        }else{
            $temp.=' PM';
        }
        $msg_user_id = $row['message_by'];
        if ($user_id == $msg_user_id) {
            $result.='<div class="message-detail-container outgoing-message-container">'. $row['msg'] . '</div>
        <span class="outgoing-message-time">'.$temp.'</span>';
        } else {
            $MessageUserdata = SelectUser($connection, $msg_user_id);
            if($MessageUserdata['ProfileImg'] === ""){
                $MessageByUserImage = "sample.png";
            }else{
                $MessageByUserImage = $MessageUserdata['ProfileImg'];
            }
            $result.='<div class="message-detail-container incoming-message-container">
        <a href="../../../users/?username='. $MessageUserdata['username'] .'" target="_blank"><img class="person-image-chat" src="../../../resources/uploads/profiles/'.$MessageByUserImage.'" alt="ERROR"></a>
        ' . $row['msg'] . '
    </div>
    <span class="incomming-message-time">'.$temp.'</span>';
        }
    }
    echo $result;
} else {
    echo "No Messages available. Once you send message they will appear here.";
}

# Function to select user by user_id
function SelectUser($connection, $user_id){
    $select = "SELECT * FROM `users` WHERE `user_id`='{$user_id}'";
    $sql = mysqli_query($connection, $select);
    $UserData = mysqli_fetch_assoc($sql);
    return $UserData;
}
<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../components/controllers/SelectUser.php');
include('../components/controllers/UserProfileImage.php');
if (isset($_SESSION['user_id'])) {
    $SelfUserID = $_SESSION['user_id'];
    $DoneFriendsArray = array();
    $SelectAllUserMessages = mysqli_query($connection, "SELECT * FROM `messages` WHERE `message_by`='$SelfUserID' OR `message_to`='$SelfUserID' ORDER BY `id` DESC");
    if (mysqli_num_rows($SelectAllUserMessages) > 0) {
        while ($MessageUserData = mysqli_fetch_assoc($SelectAllUserMessages)) {
            if ($MessageUserData['message_by'] == $SelfUserID) {
                $ChatterId = $MessageUserData['message_to'];
            } else {
                $ChatterId = $MessageUserData['message_by'];
            }
            if (!in_array($ChatterId, $DoneFriendsArray)) {
                array_push($DoneFriendsArray, $ChatterId);
                $LastMessage =  mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `messages` WHERE `message_by`='$SelfUserID' AND `message_to`='$ChatterId' OR `message_to`='$SelfUserID' AND `message_by`='$ChatterId' ORDER BY `id` DESC LIMIT 1"));
                $time = $LastMessage['timestamp'];
                $temp = $time[11] . $time[12] . $time[13] . $time[14] . $time[15];
                $temp0 = (int)$time[11] . (int)$time[12];
                if ($temp0 <= 11) {
                    $temp .= ' AM';
                } else {
                    $temp .= ' PM';
                }
                $SelectChatter = SelectUser($ChatterId);
                $ChatterUserName = $SelectChatter['username'];
                $ChatIframeUrl = "'chat/?user_name=" . $ChatterUserName . "'";
                if ($LastMessage['message_by'] === $SelfUserID) {
                    echo '<li onclick="ChangeChat(' . $ChatIframeUrl . ');OpenUserList()" class="chat-sidebar-user-items">
                        <img src="../resources/uploads/profiles/' . UserProfileImage($ChatterId) . '" alt="Failed To Load Image..">
                        <div class="user-details-sidebar-chat">
                            <span class="users-name-chat-sidebar">' . $SelectChatter['name'] . '</span>
                            <span class="last-message-chat-sidebar">' . $LastMessage['msg'] . '</span>
                        </div>
                        <div class="time-and-unssen-count-chats-sidebar">
                            <span class="last-message-time">' . $temp . '</span>
                        </div>
                    </li>';
                } else {
                    $UnseenMessageSelect = mysqli_query($connection, "SELECT * FROM `messages` WHERE `message_by`='$ChatterId' AND `message_to`='$SelfUserID' AND `status`='UNSEEN'");
                    if (mysqli_num_rows($UnseenMessageSelect) > 0) {
                        echo '<li onclick="ChangeChat(' . $ChatIframeUrl . ');OpenUserList()" class="chat-sidebar-user-items">
                    <img src="../resources/uploads/profiles/' . UserProfileImage($ChatterId) . '" alt="Failed To Load Image..">
                    <div class="user-details-sidebar-chat">
                        <span class="users-name-chat-sidebar">' . $SelectChatter['name'] . '</span>
                        <span class="last-message-chat-sidebar">' . $LastMessage['msg'] . '</span>
                    </div>
                    <div class="time-and-unssen-count-chats-sidebar">
                        <span class="last-message-time">' . $temp . '</span>
                        <span class="unseen-message-count">' . mysqli_num_rows($UnseenMessageSelect) . '</span>
                    </div>
                </li>';
                    } else {
                        echo '<li onclick="ChangeChat(' . $ChatIframeUrl . ');OpenUserList()"  class="chat-sidebar-user-items">
                            <img src="../resources/uploads/profiles/' . UserProfileImage($ChatterId) . '" alt="Failed To Load Image..">
                            <div class="user-details-sidebar-chat">
                                <span class="users-name-chat-sidebar">' . $SelectChatter['name'] . '</span>
                                <span class="last-message-chat-sidebar">' . $LastMessage['msg'] . '</span>
                            </div>
                            <div class="time-and-unssen-count-chats-sidebar">
                                <span class="last-message-time">' . $temp . '</span>
                            </div>
                        </li>';
                    }
                }
            }
        }
    } else {
        echo "You should make friends first to chat with anyone";
    }
} else {
    echo "ERROR";
}

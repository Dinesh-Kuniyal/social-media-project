<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include_once('../../modules/connection.php');
$SelfUserId = $_SESSION['user_id'];
$ChatterId = mysqli_real_escape_string($connection, $_POST['ChatterId']);
// Check if already friends 
function CheckFriends($connection, $user_one, $user_two)
{
    $SelectFriend = mysqli_query($connection, "SELECT * FROM `friends` WHERE `user_one`='$user_one' AND `user_two`='$user_two' OR `user_one`='$user_two' AND `user_two`='$user_one'");
    if (mysqli_num_rows($SelectFriend) > 0) {
        return true;
    } else {
        return false;
    }
}
if (CheckFriends($connection, $SelfUserId, $ChatterId)) {
    $SelectAllMessages = "SELECT * FROM `messages` WHERE `message_by`='$SelfUserId' AND `message_to`='$ChatterId' OR `message_by`='$ChatterId' AND `message_to`='$SelfUserId'";
    $SetSeen = SetAllMessageToSeen($connection, $ChatterId, $SelfUserId);
    $ExQuery = mysqli_query($connection, $SelectAllMessages);
    if (mysqli_num_rows($ExQuery) > 0 && $SetSeen) {
        while ($ChatData = mysqli_fetch_assoc($ExQuery)) {
            $time = $ChatData['timestamp'];
            $temp = $time[11] . $time[12] . $time[13] . $time[14] . $time[15];
            $temp0 = (int)$time[11] . (int)$time[12];
            if ($temp0 <= 11) {
                $temp .= ' AM';
            } else {
                $temp .= ' PM';
            }
            if ($ChatData['message_by'] === $SelfUserId) {
                if ($ChatData['type'] === "FILE") {
                    echo '<div class="message-detail-container file-message outgoing-message-container">
                    <a class="file_link-msg" href="../../resources/uploads/files/' . $ChatData['file_id'] . '" target="_blank">
                        <i class="messae-file-icom" data-feather="file"></i>
                        ' . $ChatData['msg'] . '
                    </a>
                </div>
                <span class="outgoing-message-time">' . $temp . '</span>';
                } else {
                    // Message Sent By Self
                    echo '<div class="message-detail-container outgoing-message-container">
                    ' . $ChatData['msg'] . '
                    </div>
                    <span class="outgoing-message-time">' . $temp . '</span>';
                }
            } else {
                // Message Sent By Another Chatter
                if ($ChatData['type'] === "FILE") {
                    echo '<div class="message-detail-container file-message incoming-message-container">
                    <a class="file_link-msg" href="../../resources/uploads/files/' . $ChatData['file_id'] . '" target="_blank">
                        <i class="messae-file-icom" data-feather="file"></i>
                        ' . $ChatData['msg'] . '
                    </a>
                </div>
                <span class="incomming-message-time">' . $temp . '</span>';
                } else {
                    // Message Sent By Self
                    echo '<div class="message-detail-container incoming-message-container">
                    ' . $ChatData['msg'] . '
                    </div>
                    <span class="incomming-message-time">' . $temp . '</span>';
                }
            }
        }
    } else {
        echo "<div class='No Message Box'>No messages available..</div>";
    }
} else {
    echo "<div class='unable-tochat-label'>You can only chat with your friends.</div>";
}

function SetAllMessageToSeen($connection, $messageBy, $messageTo)
{
    $Query = mysqli_query($connection, "UPDATE `messages` SET `status`='SEEN' WHERE `message_to`='$messageTo' AND `message_by`='$messageBy'");
    if ($Query) {
        return true;
    } else {
        return false;
    }
}

<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../../components/controllers/SelectUser.php');
include('../../components/controllers/UserProfileImage.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    if(isset($_SESSION['user_id'])){
        $SelfUserId = $_SESSION['user_id'];
        $SelectAllNotifications = mysqli_query($connection, "SELECT * FROM `notifications` WHERE `sent_to`='$SelfUserId'");
        $SetAllNotificationsToSeen = mysqli_query($connection, "UPDATE `notifications` SET `status`='SEEN' WHERE `sent_to`='$SelfUserId'");
        if(mysqli_num_rows($SelectAllNotifications) > 0){
            while($row = mysqli_fetch_assoc($SelectAllNotifications)){
                $NotiferId = $row['sent_by'];
                $NotiferData = SelectUser($NotiferId);
                $headerBaseUrl = $_POST['ERROR_CODE_SECURITYKEY'];
                echo '<div id="NotificationID'. $row['id'] .'" class="request-inner-holder-w-100">
                <a href="">
                    <img src="'. $headerBaseUrl .'resources/uploads/profiles/'. UserProfileImage($NotiferId) .'" alt="Profile Image">
                </a>
                <div class="notification-content-req">
                    <a href="">'. $NotiferData['username'] .' ('. $NotiferData['name'] .')</a> : sent the friend request to you.
                </div>
                <div class="accept-del-request-btn">
                    <div class="btn-holder-notify request-accept-btn" onclick="AcceptRequest('. $row['id'] .')">
                        <i class="notify-icons" data-feather="user-check"></i>
                    </div>
                    <div class="btn-holder-notify" onclick="DeleteRequest('. $row['id'] .')">
                        <i class="notify-icons" data-feather="x"></i>
                    </div>
                </div>
            </div>';
            }
        }else{
            echo '<div class="notification-content-holder">
            No new notifications
        </div>';
        }
    }else{
        die("You don't have permssion to acces this page");
    }
}else{
    die("You don't have permssion to acces this page");
}
?>
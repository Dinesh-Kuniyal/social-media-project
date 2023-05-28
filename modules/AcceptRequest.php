<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    if (isset($_SESSION['user_id'])) {
    $SelfUserID = $_SESSION['user_id'];
    $NotifyID = $connection->escape_string($_POST['ReferenceId']);
    $NotiferData = FetchNotificationData($NotifyID);
    $requesterID = $NotiferData['sent_by'];
    $RecieverId = $NotiferData['sent_to'];
    if ($RecieverId != $SelfUserID) {
        die("We restrict certain activites to protect our system");
        exit;
    } else {
        if (!CheckFriends($requesterID, $RecieverId)) {
            // Insert Into Friends
            // Delete request And Notification
            if (InsertFriends($requesterID, $RecieverId) && DeleteRequestNotification($requesterID, $RecieverId)) {
                echo "DONE";
            } else {
                echo mysqli_error($connection);
            }
        } else {
            // Delete request And Notification
            if (DeleteRequestNotification($requesterID, $RecieverId)) {
                echo "DONE";
            } else {
                echo mysqli_error($connection);
            }
        }
    }
    } else {
        die("You Don't have permission to access this page.");
    }
} else {
    die("You Don't have permission to access this page.");
}

function CheckFriends($UserOne, $UserTwo)
{
    $connection = $GLOBALS['connection'];
    $stmt = mysqli_prepare($connection, "SELECT * FROM `friends` WHERE
     `user_one` = ? AND `user_two` = ?
      OR
     `user_one` = ? AND `user_two`= ?");
    $stmt->bind_param('ssss', $UserOne, $UserTwo, $UserTwo, $UserOne);
    $stmt->execute();
    $stmt->store_result();
    $countrows = $stmt->num_rows();
    if($countrows > 0){
        return true;
    }else{
        return false;
    }
}

function FetchNotificationData($Notify_ID)
{
    $connection = $GLOBALS['connection'];
    $stmt = mysqli_prepare(
        $connection,
        "SELECT * FROM `notifications` WHERE `id` = ? "
    );
    $stmt->bind_param('i', $Notify_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $DataArray = $result->fetch_assoc();
    return $DataArray;
}

function InsertFriends($userone, $usertwo)
{
    $insert = mysqli_query($GLOBALS['connection'], "INSERT INTO `friends`(`user_one`, `user_two`, `timestamp`) VALUES ('$userone','$usertwo',current_timestamp())");
    if($insert){
        return true;
    }else{
        return false;
    }
}

function DeleteRequestNotification($RequestBy, $requestTo)
{
    $connection = $GLOBALS['connection'];
    $temp = "DELETE FROM `notifications` WHERE `sent_by`='$RequestBy' AND `sent_to`='$requestTo'";
    $DeleteNotify = mysqli_query($connection, $temp);
    $temp0 = "DELETE FROM `requests` WHERE `request_by`='$RequestBy' AND `request_to`='$requestTo'";
    $DeleteRequest = mysqli_query($connection, $temp0);
    if ($DeleteNotify && $DeleteRequest) {
        return true;
    } else {
        return false;
    }
}

<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    if (isset($_SESSION['user_id'])) {
        $SelfUserID = $_SESSION['user_id'];
        $NotifyID = $connection->escape_string($_POST['ReferenceId']);
        $NotiferData = FetchNotificationData($NotifyID);
        $RequesterID = $NotiferData['sent_by'];
        $RecieverId = $NotiferData['sent_to'];
        if ($RecieverId != $SelfUserID) {
            die("We restrict certain activites to protect our system");
            exit;
        } else {
            if(DeleteRequestNotification($RequesterID, $RecieverId)){
                echo "DONE";
            }else{
                echo mysqli_error($connection);
            }
        }
    } else {
        die("You don't have permission to acces this Page..");
    }
} else {
    die("You don't have permission to acces this Page..");
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

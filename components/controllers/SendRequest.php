<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../../components/controllers/RemoveRequest.php');
include('../../components/controllers/SelectUser.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    if (isset($_SESSION['user_id'])) {
        $SelfUserId = $_SESSION['user_id'];
        $FUID = mysqli_real_escape_string($connection, $_POST['FUID']);
        if (CheckFriends($SelfUserId, $FUID)) {
            if(RemoveFriends($SelfUserId, $FUID)){
                echo "ReloadPage()";
            }else{
                echo "ERROR";
            }
        } else {
            if (CheckAlreadyRequested($SelfUserId, $FUID)) {
                if (RemoveRequest($SelfUserId, $FUID) && DeleteNotification($SelfUserId, $FUID)) {
                    echo "SetBtnToSendRequest()";
                } else {
                    echo "ERROR";
                }
            } else {
                $content = "ERROR CODE OPIVERSE";
                if (SendRequest($SelfUserId, $FUID) && SendNotification($SelfUserId, $FUID, $content)) {
                    echo "SetBtnToRequested()";
                } else {
                    echo "ERROR";
                }
            }
        }
    } else {
        die("You don't have permssion to access this page.");
    }
} else {
    die("You don't have permssion to access this page.");
}
function GetDay()
{
    $a = date('d');
    $b = date('F');
    $c = "20" . date('y');
    $Date = $a . " " . $b . " " . $c;
    return $Date;
}
function SendRequest($SelfUserId, $FUID)
{
    $Date = GetDay();
    $InsertQuery = mysqli_query($GLOBALS['connection'], "INSERT INTO `requests`(`request_by`, `request_to`, `datetimestamp`, `date`) VALUES ('$SelfUserId','$FUID',current_timestamp(),'$Date')");
    if ($InsertQuery) {
        return true;
    } else {
        return false;
    }
}
function CheckAlreadyRequested($SelfUserId, $FUID)
{
    $Select = mysqli_query($GLOBALS['connection'], "SELECT * FROM `requests` WHERE `request_by`='$SelfUserId' AND `request_to`='$FUID'");
    if (mysqli_num_rows($Select) > 0) {
        return true;
    } else {
        return false;
    }
}
function SendNotification($NotifyBy, $NotifyTo, $content)
{
    $date = GetDay();
    $insert = mysqli_query($GLOBALS['connection'], "INSERT INTO `notifications`(`sent_by`, `sent_to`, `content`, `date`, `timestamp`, `status`, `type`) VALUES ('$NotifyBy','$NotifyTo','$content','$date',current_timestamp(),'UNSEEN','REQUEST')");
    if ($insert) {
        return true;
    } else {
        return false;
    }
}
function DeleteNotification($NotifyBy, $NotifyTo)
{
    $Delete = mysqli_query($GLOBALS['connection'], "DELETE FROM `notifications` WHERE `sent_by`='$NotifyBy' AND `sent_to`='$NotifyTo' AND `type`='REQUEST'");
    if ($Delete) {
        return true;
    } else {
        return false;
    }
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
    if ($countrows > 0) {
        return true;
    } else {
        return false;
    }
}
function RemoveFriends($UserOne, $UserTwo)
{
    $connection = $GLOBALS['connection'];
    $Delete = "DELETE FROM `friends` WHERE `user_one`='$UserOne' AND `user_two`='$UserTwo' OR `user_one`='$UserTwo' AND `user_two`='$UserOne'";
    if (mysqli_query($connection, $Delete)) {
        return true;
    } else {
        return false;
    }
}
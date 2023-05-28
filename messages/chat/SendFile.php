<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../../modules/connection.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    if (isset($_SESSION['user_id'])) {
        $SelfUserId = $_SESSION['user_id'];
        $RecieverId = mysqli_real_escape_string($connection, $_POST['reciever_userID']);
        if (CheckFriends($connection, $SelfUserId, $RecieverId)) {
            $FileName = $connection->escape_string($_POST['file_name']);
            $FileType = $connection->escape_string($_POST['file_type']);
            $file_name = $_FILES['send_file']['name'];
            $file_type = $_FILES['send_file']['type'];
            $tmp_name = $_FILES['send_file']['tmp_name'];
            date_default_timezone_set('Asia/Kolkata');
            $currentDateTime = date('d-M-Y H:i');
            $newDateTime = date('d-M-Y h:i A', strtotime($currentDateTime));
            $time = time();
            $new_file_name = $SelfUserId . $time . $file_name;
            $sizeInByte = $_FILES['send_file']['size'];
            $FileSize = formatBytes($sizeInByte);
            if (move_uploaded_file($tmp_name, "../../resources/uploads/files/" . $new_file_name)) {
                $Insert = "INSERT INTO
                 `media`(`name`, `file_destination`, `php_file_type`, `js_file_type`, `timestamp`, `created_date`, `File_Size`)
                 VALUES
                  ('$file_name','$new_file_name','$file_type','$FileType',current_timestamp(), '$newDateTime', '$FileSize')";
                $query = mysqli_query($connection, $Insert);
                $InsertMessage = mysqli_query(
                    $connection,
                    "INSERT INTO `messages`(`msg`, `message_by`, `message_to`, `status`, `type`, `timestamp`, `file_id`)
                 VALUES ('$FileName','$SelfUserId','$RecieverId','UNSEEN','FILE',current_timestamp(), '$new_file_name')"
                );
                if ($query && $InsertMessage) {
                    echo "DONE";
                } else {
                    echo mysqli_error($connection);
                }
            } else {
                echo mysqli_error($connection);
            }
        } else {
            echo "ERROR";
        }
    } else {
        die("You don't have permission to acces this page");
    }
} else {
    die("You don't have permission to acces this page");
}
function CheckFriends($connection, $user_one, $user_two)
{
    $SelectFriend = mysqli_query($connection, "SELECT * FROM `friends` WHERE `user_one`='$user_one' AND `user_two`='$user_two' OR `user_one`='$user_two' AND `user_two`='$user_one'");
    if (mysqli_num_rows($SelectFriend) > 0) {
        return true;
    } else {
        return false;
    }
}
function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'KB', 'MB', 'GB', 'TB');   

    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
}
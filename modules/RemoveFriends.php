<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('connection.php');
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
            echo "ReloadPage()";
        }
    } else {
        die("You don't have permission to acces this page");
    }
} else {
    die("You don't have permission to acces this page");
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
?>
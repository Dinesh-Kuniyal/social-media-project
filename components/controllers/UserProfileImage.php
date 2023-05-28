<?php
// Fucntion to set profile Covers 
if (!isset($_SESSION['user_id'])) {
    die("<h1>You have not permission to acces this Page.</h1>");
} else {
    if (!defined('Opiverse_Pages_Auth_Constant')) {
        die("<h1>You have not permission to acces this Page.</h1>");
    } else {
        function UserProfileImage($user_id)
        {
            $select = "SELECT * FROM `users` WHERE `user_id`='{$user_id}'";
            $sql = mysqli_query($GLOBALS['connection'], $select);
            $UserData = mysqli_fetch_assoc($sql);
            if ($UserData['ProfileImg'] === "") {
                $UserProfileImage = "sample.png";
            } else {
                $UserProfileImage = $UserData['ProfileImg'];
            }
            return $UserProfileImage;
        }
    }
}

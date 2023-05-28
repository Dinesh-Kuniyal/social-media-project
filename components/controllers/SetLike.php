<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../../modules/connection.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    if ($_SESSION['user_id']) {
        $user_id = $_SESSION['user_id'];
        $article_id = mysqli_real_escape_string($connection, $_POST['article_id']);
        $CheckIfLiked = mysqli_query($connection, "SELECT * FROM `likes` WHERE `liked_by`='$user_id' AND `article_id`='$article_id'");
        if (mysqli_num_rows($CheckIfLiked) > 0) {
            // Remove from liked
            if (mysqli_query($connection, "DELETE FROM `likes` WHERE `liked_by`='$user_id' AND `article_id`='$article_id'")) {
                echo "DONE";
            } else {
                echo "ERROR";
            }
        } else {
            // Set into likes
            if (mysqli_query($connection, "INSERT INTO `likes`(`liked_by`, `article_id`, `timestamp`) VALUES ('$user_id','$article_id',current_timestamp())")) {
                echo "DONE";
            } else {
                echo "ERROR";
            }
        }
    } else {
        die("You don't have permission to acces this Page");
    }
} else {
    die("You don't have permission to acces this Page");
}

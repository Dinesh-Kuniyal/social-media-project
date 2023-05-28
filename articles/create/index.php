<?php
session_start();
define('Opiverse_Pages_Auth_Constant', TRUE);

$Header_Base_Url = "../../";
$Error_Base_Url = "../../";

define('Opiverse_Const_Private', TRUE);
include('../../modules/connection.php');

if (isset($_SESSION['user_id'])) {
    $SelfUserId = $_SESSION['user_id'];
    include('../../components/articles/main.php');
} else {
    header("location: ../../login/");
}

if (isset($_POST['submit'])) {
    $date = date('d-M-Y');
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $club_id = mysqli_real_escape_string($connection, $_POST['club_id']);
    $topic_id = mysqli_real_escape_string($connection, $_POST['topic_id']);
    $overview = mysqli_real_escape_string($connection, $_POST['overview']);
    $body = mysqli_real_escape_string($connection, $_POST['body']);
    $extra = mysqli_real_escape_string($connection, $_POST['extra']);
    $conclusion = mysqli_real_escape_string($connection, $_POST['conclusion']);
    if (empty($title) || empty($club_id) || empty($topic_id) || empty($overview) || empty($body) || empty($conclusion)) {
        echo "<script>alert('All input fields must be filled out')</script>";
    } else {
        $insertQuery = "INSERT INTO `articles`(`club_id`, `topic_id`, `title`, `overview`, `MainContent`, `Extra`, `conclusion`, `BannerImage`, `ContentImage`, `timestamp`, `articleby`, `createdAt`) VALUES ('$club_id','$topic_id','$title','$overview','$body','$extra','$conclusion','','',current_timestamp(),'$SelfUserId', '$date')";
        if (mysqli_query($connection, $insertQuery)) {
            echo "<script>alert('Article Added succesfully'); window.location.href = '../../';</script>";
        } else {
            echo "<script>alert('Error in creating your article try again later..')</script>";
        }
    }
}

<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include("../modules/connection.php");
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../components/controllers/SelectUser.php');
include('../components/controllers/SetProfileCovers.php');
include("../components/controllers/UserProfileImage.php");
if (!isset($_SESSION['user_id'])) {
    header("location: ../login/");
} else {
    $Header_Base_Url = "../";
    $Error_Base_Url = "../";
    $SelfUserId = $_SESSION['user_id'];
    $SelfUserDataFetched = SelectUser($SelfUserId);
}
function ValidateUserByUserName($username)
{
    $Select = mysqli_num_rows(mysqli_query($GLOBALS['connection'], "SELECT * FROM `users` WHERE `username`='$username'"));
    if ($Select > 0) {
        return true;
    } else {
        return false;
    }
}
if (isset($_GET['username'])) {
    // Checking if user exist or not
    $username = $_GET['username'];
    if (ValidateUserByUserName($username)) {
        $username = $_GET['username'];
        $TargetUserId = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `users` WHERE `username`='$username'"));
        $TargetUserId = $TargetUserId['user_id'];
        $TargetedUserData = SelectUser($TargetUserId);
    } else {
        header('location: ../404/');
    }
} else {
    header('location: ../404/');
}
if ($SelfUserId === $TargetUserId) {
    header("location: ../update/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $TargetedUserData['username']; ?> (<?php echo $TargetedUserData['name']; ?>) | Opiverse</title>
    <?php include('../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="script.js" defer></script>
</head>

<body>
    <?php include('../components/loader.php'); ?>
    <div class="header-container">
        <?php include('../partials/header.php'); ?>
    </div>
    <div class="main-app-container">
        <?php include('../components/users/main.php'); ?>
        <?php include('../components/users/suggestion.php'); ?>
    </div>
    <div class="footer-container">
        <?php include('../partials/footer.php'); ?>
    </div>
</body>

</html>
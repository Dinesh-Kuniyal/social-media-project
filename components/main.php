<?php
if (!isset($_SESSION)) {
    session_start();
}

// Constant for pages  
if (!defined('Opiverse_Pages_Auth_Constant')) {
    die("You don't have permission to access this page.");
}

// Constant for connection file
define('Opiverse_Const_Private', TRUE);

include('modules/connection.php');
$SelfUserId = $_SESSION['user_id'];
include('components/controllers/SelectUser.php');
include('components/controllers/SelectClub.php');
include('components/controllers/UserProfileImage.php');
include('components/controllers/SetProfileCovers.php');
$SelfUserDataArray = SelectUser($SelfUserId);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opiverse</title>
    <?php include('components/links.php'); ?>
    <link rel="stylesheet" href="resources/home/main.css">
    <script src="resources/home/script.js" defer></script>
</head>

<body>
    <?php include('components/loader.php'); ?>
    <div class="header-container">
        <?php include('partials/header.php'); ?>
    </div>
    <div class="main-app-container">
        <?php include('partials/main.php'); ?>
    </div>
    <div class="footer-container">
        <?php include('partials/footer.php'); ?>
    </div>
</body>

</html>
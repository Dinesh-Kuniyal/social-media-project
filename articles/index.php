<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $SelfUserId = $_SESSION['user_id'];
    if (isset($_GET['id'])) {
        define('Opiverse_Const_Private', TRUE);
        define('Opiverse_Pages_Auth_Constant', TRUE);
        include('../modules/connection.php');
        include('../components/controllers/SelectTopic.php');
        include('../components/controllers/SelectClub.php');
        include('../components/controllers/SelectUser.php');
        include('../components/controllers/SetProfileCovers.php');
        include('../components/controllers/UserProfileImage.php');
        $Header_Base_Url = "../";
        $Error_Base_Url = "../";
        $TargetedArticleId = $_GET['id'];
        $Selectarticle = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id`='$TargetedArticleId'");
        if (mysqli_num_rows($Selectarticle) > 0) {
            $TargetArticleData = mysqli_fetch_assoc($Selectarticle);
        } else {
            header("location: ../404/");
        }
        $SelectArticleByUser = SelectUser($TargetArticleData['articleby']);
    } else {
        header("location: ../404/");
    }
} else {
    header("location: ../login/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <?php include('../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php include('../components/loader.php'); ?>
    <div class="header-container">
        <?php include('../partials/header.php'); ?>
    </div>
    <div class="main-app-container">
        <?php include('../components/ArticleInfo/main.php'); ?>
    </div>
    <div class="footer-container">
        <?php include('../partials/footer.php'); ?>
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>

</html>
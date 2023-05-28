<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
    die("You don't have permission to access this page.");
}
include('../../components/controllers/SelectUser.php');
$SelectSelfUser = SelectUser($_SESSION['user_id']);
if($SelectSelfUser['user_type'] != 'writer'){
    header("location: ../../");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article | Create</title>
    <?php include('../../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php include('../../components/loader.php'); ?>
    <div class="header-container">
        <?php include('../../partials/header.php'); ?>
    </div>
    <div class="main-app-container">
        <?php include('../../components/articles/form.php'); ?>
    </div>
    <div class="footer-container">
        <?php include('../../partials/footer.php'); ?>
    </div>
</body>

</html>
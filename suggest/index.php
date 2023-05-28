<?php
session_start();
if (isset($_SESSION['user_id'])) {
    define('Opiverse_Const_Private', TRUE);
    define('Opiverse_Pages_Auth_Constant', TRUE);
    include('../modules/connection.php');
    $Header_Base_Url = "../";
    $Error_Base_Url = "../";
} else {
    header("location: ../login/");
}
if (isset($_POST['Submit'])) {
    $user_id = $_SESSION['user_id'];
    $uname = mysqli_real_escape_string($connection, $_POST['uname']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $opinion = mysqli_real_escape_string($connection, $_POST['opinion']);
    date_default_timezone_set('Asia/Kolkata');
    $combinedDT = date('Y-m-d H:i:s');
    if (empty($uname) || empty($name) || empty($opinion)) {
        echo "<script>alert('Error in sending your message try again later..')</script>";
    } else {
        $sql = "INSERT INTO `suggest`(`name`, `user_id`, `opinion`, `timestamp`, `uname`)
         VALUES (?, ?, ?, ?, ?)";
        $insert = $connection->prepare($sql);
        if ($insert->execute([$name, $user_id, $opinion, $combinedDT, $uname])) {
            echo "<script>alert('Thanks for your suggestion...')</script>";
        } else {
            echo "<script>alert('Error in sending your message try again later..')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php include('../components/loader.php'); ?>
    <div class="header-container">
        <?php include('../partials/header.php'); ?>
    </div>
    <div class="main-app-container">
        <form action="" method="POST">
            <h3>Suggest A Club Or Topic</h3>
            <select required name="uname">
                <option value="club">Club</option>
                <option value="topic">Topic</option>
            </select>
            <input name="name" required type="text" placeholder="Club/Topic Name">
            <textarea required name="opinion" placeholder="Your Opinion"></textarea>
            <button class="submit-btn" type="submit" name="Submit">Submit</button>
        </form>
    </div>
    <div class="footer-container">
        <?php include('../partials/footer.php'); ?>
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>

</html>
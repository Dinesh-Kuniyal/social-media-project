<?php
session_start();
if ($_SESSION['user_id']) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
        define('Opiverse_Const_Private', TRUE);
        define('Opiverse_Pages_Auth_Constant', TRUE);
        include('connection.php');
        include('../components/controllers/SelectUser.php');

        // Getting USER ID from session varibales
        $user_id = $_SESSION['user_id'];

        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $about = mysqli_real_escape_string($connection, $_POST['about']);
        // echo "alert('".$name."')";
        if (!empty($name) && !empty($username)) {
            $UsernameCounts = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `users` WHERE `username`='$username' AND NOT `user_id`='$user_id'"));
            // echo "alert('".$UsernameCounts."')";
            if ($UsernameCounts > 0) {
                echo "SetFormAlertEditF('Username not available..')";
            } else {
                $update = "UPDATE `users` SET `name`='$name',`username`='$username',`about`='$about' WHERE `user_id`='$user_id'";
                $Query = mysqli_query($connection, $update);
                if ($Query) {
                    echo "SetFormAlertEditF('Profile update succesfully. Changes may take some time to occur.');";
                } else {
                    echo "SetFormAlertEditF('Error in updating. Try again')";
                }
            }
        } else {
            echo "SetFormAlertEditF('All input filed must be filled out')";
        }
    } else {
        die("You don't have permission to acces this page");    }
} else {
    die("You don't have permission to acces this page");
}

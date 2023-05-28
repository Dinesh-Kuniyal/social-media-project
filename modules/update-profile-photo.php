<?php
session_start();
if ($_SESSION['user_id']) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
        $user_id = $_SESSION['user_id'];
        define('Opiverse_Const_Private', TRUE);
        include("connection.php");
        define('Opiverse_Pages_Auth_Constant', TRUE);
        include('../components/controllers/SelectUser.php');
        $img_name = $_FILES['profile-photo-input']['name'];
        $img_type = $_FILES['profile-photo-input']['type'];
        $tmp_name = $_FILES['profile-photo-input']['tmp_name'];
        $time = time();
        $new_img_name = $time . $user_id . $img_name;
        $imgInfo = getimagesize($tmp_name);
        $mime = $imgInfo['mime'];

        switch ($mime) {
            case 'image/jpg';
            case 'image/jpeg';
                $image = imagecreatefromjpeg($tmp_name);
                break;
            case 'image/png';
                $image = imagecreatefrompng($tmp_name);
                break;
            case 'image/gif';
                $image = imagecreatefromgif($tmp_name);
                break;
            default:
                $image = imagecreatefrompng($tmp_name);
        }

        $OldImageData = SelectUser($user_id);
        $OldImageName = $OldImageData['ProfileImg'];
        if ($OldImageName === "") {
            if (imagejpeg($image, "../resources/uploads/profiles/" . $new_img_name, 50)) {
                $updatePhoto = "UPDATE `users` SET `ProfileImg`='$new_img_name' WHERE `user_id`='{$user_id}'";
                $query = mysqli_query($connection, $updatePhoto);
                $src = "../resources/uploads/profiles/" . $new_img_name;
                if ($query) {
                    echo "SetFormAlertEditF('Profile photo updated.'); UpdateProfilePhotoPic('" . $src . "');";
                } else {
                    echo "SetFormAlertEditF('Error in updating profile photo')";
                }
            } else {
                echo "SetFormAlertEditF('Error in updating profile photo')";
            }
        } else {
            if (imagejpeg($image, "../resources/uploads/profiles/" . $new_img_name, 50)) {
                $OldImageSrc = '../resources/uploads/profiles/' . $OldImageName;
                $updatePhoto = "UPDATE `users` SET `ProfileImg`='$new_img_name' WHERE `user_id`='{$user_id}'";
                $query = mysqli_query($connection, $updatePhoto);
                $src = "../resources/uploads/profiles/" . $new_img_name;
                if ($query) {
                    if (unlink($OldImageSrc)) {
                        echo "SetFormAlertEditF('Profile photo updated.'); UpdateProfilePhotoPic('" . $src . "')";
                    } else {
                        echo "SetFormAlertEditF('Error in updating profile photo')";
                    }
                } else {
                    echo "SetFormAlertEditF('Error in updating profile photo')";
                }
            } else {
                echo "SetFormAlertEditF('Error in updating profile photo')";
            }
        }
    } else {
        die("You don't have permission to acces this page");
    }
} else {
    die("You don't have permission to acces this page");
}

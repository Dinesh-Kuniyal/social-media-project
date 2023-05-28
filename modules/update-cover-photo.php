<?php
session_start();
if ($_SESSION['user_id']) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
        define('Opiverse_Const_Private', TRUE);
        include("connection.php");
        define('Opiverse_Pages_Auth_Constant', TRUE);
        include('../components/controllers/SelectUser.php');
        $user_id = $_SESSION['user_id'];
        $img_name = $_FILES['CoverPhoto']['name'];
        $img_type = $_FILES['CoverPhoto']['type'];
        $tmp_name = $_FILES['CoverPhoto']['tmp_name'];
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
        $OldImageName = $OldImageData['CoverImg'];
        if ($OldImageName === "") {
            if (imagejpeg($image, "../resources/uploads/cover/" . $new_img_name, 50)) {
                $OldImageSrc = '../resources/uploads/cover/' . $OldImageName;
                $updatePhoto = "UPDATE `users` SET `CoverImg`='$new_img_name' WHERE `user_id`='{$user_id}'";
                $query = mysqli_query($connection, $updatePhoto);
                $src = "../resources/uploads/cover/" . $new_img_name;
                if ($query) {
                    echo "SetFormAlertEditF('Cover photo updated.'); UpdateProfilePhoto('" . $src . "')";
                } else {
                    echo "SetFormAlertEditF('Error in updating cover photo')";
                }
            } else {
                echo "SetFormAlertEditF('Error in updating cover photo')";
            }
        } else {
            if (imagejpeg($image, "../resources/uploads/cover/" . $new_img_name, 50)) {
                $OldImageSrc = '../resources/uploads/cover/' . $OldImageName;
                $updatePhoto = "UPDATE `users` SET `CoverImg`='$new_img_name' WHERE `user_id`='{$user_id}'";
                $query = mysqli_query($connection, $updatePhoto);
                $src = "../resources/uploads/cover/" . $new_img_name;
                if ($query) {
                    if (unlink($OldImageSrc)) {
                        echo "SetFormAlertEditF('Cover photo updated.'); UpdateProfilePhoto('" . $src . "')";
                    } else {
                        echo "SetFormAlertEditF('Error in updating cover photo')";
                    }
                } else {
                    echo "SetFormAlertEditF('Error in updating cover photo')";
                }
            } else {
                echo "SetFormAlertEditF('Error in updating cover photo')";
            }
        }
    } else {
        die("You don't have permission to acces this page.");
    }
} else {
    die("You don't have permission to acces this page.");
}

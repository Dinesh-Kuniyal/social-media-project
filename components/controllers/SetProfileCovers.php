<?php
// Fucntion to set profile Covers 
if(!isset($_SESSION['user_id'])){
    die("<h1>You have not permission to acces this Page.</h1>");
}else{
    if (!defined('Opiverse_Pages_Auth_Constant')) {
        die("<h1>You have not permission to acces this Page.</h1>");
    }else{
        function SetProfileCovers($user_id){
            $SelectUser = SelectUser($user_id);
            if($SelectUser['CoverImg'] === ""){
                $random = rand(1, 6);
                $newRandomize = $random . ".jpg";
                $CoverPhotoImage = $newRandomize;
            }else{
                $CoverPhotoImage = $SelectUser['CoverImg'];
            }
            return $CoverPhotoImage;
        }
    }
}
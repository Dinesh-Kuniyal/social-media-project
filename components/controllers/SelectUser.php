<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
    echo "<h1>You have not permission to acces this Page.</h1>";
}else{
    function SelectUser($user_id){
        $connection = $GLOBALS['connection'];
        $SelectQuery = mysqli_query($connection, "SELECT * FROM `users` WHERE `user_id`='$user_id'");
        if(mysqli_num_rows($SelectQuery) > 0){
            return mysqli_fetch_assoc($SelectQuery);
        }else{
            return mysqli_error($connection);
        }
    }
}
?>
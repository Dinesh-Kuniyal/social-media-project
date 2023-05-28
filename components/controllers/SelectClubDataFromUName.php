<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
    echo "<h1>You have not permission to acces this Page.</h1>";
}else{
    function SelectClubDataFromUName($club_name){
        $connection = $GLOBALS['connection'];
        $SelectQuery = mysqli_query($connection, "SELECT * FROM `clubs` WHERE `unique_name`='$club_name'");
        if(mysqli_num_rows($SelectQuery) > 0){
            return mysqli_fetch_assoc($SelectQuery);
        }else{
            return mysqli_error($connection);
        }
    }
}
?>
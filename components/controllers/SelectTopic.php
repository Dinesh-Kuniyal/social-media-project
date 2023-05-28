<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
    echo "<h1>You have not permission to acces this Page.</h1>";
}else{
    function SelectTopic($topic_id){
        $connection = $GLOBALS['connection'];
        $select = "SELECT * FROM `topics` WHERE `id`='{$topic_id}'";
        $sql = mysqli_query($connection, $select);
        $ClubData = mysqli_fetch_assoc($sql);
        return $ClubData;
    }
}

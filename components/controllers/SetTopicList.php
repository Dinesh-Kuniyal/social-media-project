<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../../modules/connection.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    if ($_SESSION['user_id']) {
        $club_id = mysqli_real_escape_string($connection, $_POST['club_id']);
        $SelectAllTopics = mysqli_query($connection, "SELECT * FROM `topics` WHERE `club_id`='$club_id'");
        $AllOutput = "";
        $FName = "";
        $Fid;
        $i=0;
        while($row = mysqli_fetch_assoc($SelectAllTopics)){
            if($i==0){
                $FName = $row['name'];
                $Fid = $row['id'];
            }
            $AllOutput .= '<div onclick="ChangeTopicId('. $row['id'] .', this.innerText)" class="option">'. $row["name"] .'</div>';
            $i++;
        }
        echo "SetAllTopics('". $AllOutput ."'); SetFirstTopic('". $FName ."', ". $Fid .");";
    } else {
        die("You don't have permission to acces this Page");
    }
} else {
    die("You don't have permission to acces this Page");
}

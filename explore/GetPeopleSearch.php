<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../components/controllers/UserProfileImage.php');
if (isset($_SESSION['user_id'])) {
    $SelfUSerId = $_SESSION['user_id'];
    $SearchQuery = mysqli_real_escape_string($connection, $_POST['SearchQuery']);
    if ($SearchQuery != "") {
        $queryText = '%' . $SearchQuery . '%';
        $Search = mysqli_query($connection, "SELECT * FROM `users` WHERE `name` LIKE '{$queryText}' OR `username` LIKE '{$queryText}'");
        if (mysqli_num_rows($Search) > 0) {
            while ($row = mysqli_fetch_assoc($Search)) {
                PrintDetails(UserProfileImage($row['user_id']), $row['name'], $row['username']);
            }
        } else {
            echo "No Results Found. Use Different Keyword..";
        }
    } else {
        $SelectAllLatestTopics = mysqli_query($connection, "SELECT * FROM `users` WHERE 1 ORDER BY `id` DESC LIMIT 10");
        while ($row = mysqli_fetch_assoc($SelectAllLatestTopics)) {
            PrintDetails(UserProfileImage($row['user_id']), $row['name'], $row['username']);
        }
    }
} else {
    echo "ERROR (LOGIN TO WATCH RESULTS)";
}


function PrintDetails($ProfileImage, $User_Name, $username)
{
    echo '<div onclick=ChangeWindowLocation("../users/?username='.$username.'") class="topic-list-container">
    <img src="../resources/uploads/profiles/' . $ProfileImage . '" alt="ERROR" class="topic-image-result">
    <h4 class="topic-name">' . $User_Name . '</h4>
    <span class="topic-club-name">' . $username . '</span>
</div>';
}
?>
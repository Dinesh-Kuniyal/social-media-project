<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../components/controllers/SelectClub.php');
if (isset($_SESSION['user_id'])) {
    $SelfUSerId = $_SESSION['user_id'];
    $SearchQuery = mysqli_real_escape_string($connection, $_POST['SearchQuery']);
    if ($SearchQuery != "") {
        $queryText = '%' . $SearchQuery . '%';
        $Search = mysqli_query($connection, "SELECT * FROM `topics` WHERE `name` LIKE '{$queryText}'");
        if (mysqli_num_rows($Search) > 0) {
            while ($row = mysqli_fetch_assoc($Search)) {
                $SelectClub = SelectClub($row['club_id']);
                PrintDetails($row['logo'], $row['name'], $SelectClub['name'], $SelectClub['unique_name'], $row['id']);
            }
        } else {
            echo "No Results Found. Use Different Keyword..";
        }
    } else {
        $SelectAllLatestTopics = mysqli_query($connection, "SELECT * FROM `topics` WHERE 1 ORDER BY `id` DESC LIMIT 10");
        while ($row = mysqli_fetch_assoc($SelectAllLatestTopics)) {
            $SelectClub = SelectClub($row['club_id']);
            PrintDetails($row['logo'], $row['name'], $SelectClub['name'], $SelectClub['unique_name'], $row['id']);
        }
    }
} else {
    echo "ERROR (LOGIN TO WATCH RESULTS)";
}


function PrintDetails($ImagePath, $TopicName, $ClubName, $UniqueClubName, $TopicId)
{
    echo '<div onclick=ChangeWindowLocation("../clubs/?club_name='.$UniqueClubName.'&topic_id='.$TopicId.'") class="topic-list-container">
    <img src="../resources/uploads/topics/' . $ImagePath . '" alt="ERROR" class="topic-image-result">
    <h4 class="topic-name">' . $TopicName . '</h4>
    <span class="topic-club-name">' . $ClubName . '</span>
</div>';
}

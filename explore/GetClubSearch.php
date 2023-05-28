<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
if (isset($_SESSION['user_id'])) {
    $SelfUSerId = $_SESSION['user_id'];
    $SearchQuery = mysqli_real_escape_string($connection, $_POST['SearchQuery']);
    if ($SearchQuery != "") {
        $queryText = '%' . $SearchQuery . '%';
        $Search = mysqli_query($connection, "SELECT * FROM `clubs` WHERE `name` LIKE '{$queryText}'");
        if (mysqli_num_rows($Search) > 0) {
            while ($row = mysqli_fetch_assoc($Search)) {
                $club_id = $row['id'];
                $UniqueClubName = $row['unique_name'];
                $ArticlesCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `articles` WHERE `club_id`='{$club_id}'"));
                PrintDetails($row['logo'], $row['name'], $ArticlesCount, $UniqueClubName);
            }
        } else {
            echo "No Results Found. Use Different Keyword..";
        }
    } else {
        $SelectAllLatestTopics = mysqli_query($connection, "SELECT * FROM `clubs` WHERE 1 ORDER BY `id` DESC LIMIT 10");
        while ($row = mysqli_fetch_assoc($SelectAllLatestTopics)) {
            $club_id = $row['id'];
            $UniqueClubName = $row['unique_name'];
            $ArticlesCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `articles` WHERE `club_id`='{$club_id}'"));
            PrintDetails($row['logo'], $row['name'], $ArticlesCount, $UniqueClubName);
        }
    }
} else {
    echo "ERROR (LOGIN TO WATCH RESULTS)";
}


function PrintDetails($ImagePath, $ClubName, $ArticlesCount, $UniqueClubName)
{
    echo '<div onclick=ChangeWindowLocation("../clubs/?club_name=' . $UniqueClubName . '") class="flexed-club-container">
    <img src="../resources/uploads/clubs/' . $ImagePath . '" alt="Error">
    <div class="club-details">
        <h3>' . $ClubName . '</h3>
        <span class="articles-count">' . $ArticlesCount . ' articles</span>
    </div>
</div>';
}

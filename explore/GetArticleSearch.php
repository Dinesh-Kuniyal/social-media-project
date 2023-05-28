<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../components/controllers/SelectTopic.php');
include('../components/controllers/SelectClub.php');
if (isset($_SESSION['user_id'])) {
    $SelfUSerId = $_SESSION['user_id'];
    $SearchQuery = mysqli_escape_string($connection, $_POST['SearchQuery']);
    if ($SearchQuery != "") {
        $queryText = '%' . $SearchQuery . '%';
        $Search = mysqli_query($connection, "SELECT * FROM `articles` WHERE `title` LIKE '{$queryText}'");
        if (mysqli_num_rows($Search) > 0) {
            while ($row = mysqli_fetch_assoc($Search)) {
                $ArticleTopicInfo = SelectTopic($row['topic_id']);
                $ArticleSelectClub = SelectClub($row['club_id']);
                $ArticleId = $row['id'];
                echo '<div onclick=ChangeWindowLocation("../articles/?id='. $ArticleId .'") class="article-list-container">
                <img src="../resources/uploads/topics/'. $ArticleTopicInfo['logo'] .'" alt="Failed To Load Image..">
                <div class="artcile-detail-container">
                    <h3 class="article-heading">
                        ' . $row['title'] . '
                    </h3>
                    <div class="article-topic-and-club-name">
                        ' . $ArticleTopicInfo['name'] . ' (' . $ArticleSelectClub['name'] . ')
                    </div>
                    <div class="article-date">
                        13 July 2022
                    </div>
                </div>
            </div>';
            }
        } else {
            echo "No Results Found. Use Different Keyword..";
        }
    } else {
        $SelectAllLatestArticle = mysqli_query($connection, "SELECT * FROM `articles` WHERE 1 ORDER BY `id` DESC LIMIT 10");
        while ($row = mysqli_fetch_assoc($SelectAllLatestArticle)) {
            $ArticleTopicInfo = SelectTopic($row['topic_id']);
            $ArticleSelectClub = SelectClub($row['club_id']);
            $ArticleId = $row['id'];
            echo '<div onclick=ChangeWindowLocation("../articles/?id='. $ArticleId .'") class="article-list-container">
            <img src="../resources/uploads/topics/'. $ArticleTopicInfo['logo'] .'"" alt="Failed To Load Image..">
            <div class="artcile-detail-container">
                <h3 class="article-heading">
                    ' . $row['title'] . '
                </h3>
                <div class="article-topic-and-club-name">
                    ' . $ArticleTopicInfo['name'] . ' (' . $ArticleSelectClub['name'] . ')
                </div>
                <div class="article-date">
                    13 July 2022
                </div>
            </div>
        </div>';
        }
    }
} else {
    echo "ERROR (LOGIN TO WATCH RESULTS)";
}

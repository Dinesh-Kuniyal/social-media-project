<?php
session_start();
$Header_Base_Url = "../";
$Error_Base_Url = "../";
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
} else {
    $keyword = "";
}
if ($_SESSION['user_id']) {
    $SelfUserID = $_SESSION['user_id'];
} else {
    header(("location: ../404/"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore | Cultcheck</title>
    <?php include('../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="script.js" defer type="text/javascript"></script>
</head>

<body>
    <?php include('../components/loader.php'); ?>
    <div class="header-container">
        <?php include('../partials/header.php'); ?>
    </div>
    <div class="main-app-container">
        <div class="explore-page-header">
            <h2>Explore</h2>
            <input class="explore_search_input" type="search" value="<?php echo $keyword; ?>" name="query_input_holder" placeholder="Search something.. (articles, clubs, topics, users)">
        </div>
        <div class="sub-menu">
            <div onclick="ChangeTab(this, this.innerHTML)" class="list-items">Articles</div>
            <div onclick="ChangeTab(this, this.innerHTML)" class="list-items">Topics</div>
            <div onclick="ChangeTab(this, this.innerHTML)" class="list-items">Clubs</div>
            <div onclick="ChangeTab(this, this.innerHTML)" class="list-items">Peoples</div>
        </div>
        <div class="main-app-container-sub">
            <div class="main-container">

                <!-- // For Articles  -->
                <!-- <div class="article-list-container">
                <img src="../images/topics/1657383905trading.jpeg" alt="Failed To Load Image..">
                <div class="artcile-detail-container">
                    <h3 class="article-heading">
                        Blockchain Development is awesome.
                        An now ready to go.
                    </h3>
                    <div class="article-topic-and-club-name">
                        Blockchain (Technology)
                    </div>
                    <div class="article-date">
                        13 July 2022
                    </div>
                </div>
            </div> -->

                <!-- // For Clubs  -->
                <!-- <div class="flexed-club-container">
                <img src="../images/clubs/1657170025writing.jpg" alt="Failed To Load Image..">
                <div class="club-details">
                    <h3>Technology</h3>
                    <span class="articles-count">1,234 articles</span>
                </div>
            </div>-->

                <!-- // For  Topics  -->
                <!-- <div class="topic-list-container">
                <img src="../images/topics/1657381090russiaVSukraine.jpg" alt="Failed To Load Image.." class="topic-image-result">
                <h4 class="topic-name">Blockchain Development</h4>
                <span class="topic-club-name">Technology</span>
            </div> -->

                <!-- // For Peoples  -->
                <!-- <div class="topic-list-container">
                <img src="../images/profiles/1657984128270591622social.jpeg" alt="Failed To Load Image.." class="topic-image-result">
                <h4 class="topic-name">Dinesh Kuniyal</h4>
                <span class="topic-club-name">dinesh_kuniyal</span>
            </div> -->

            </div>
            <div class="suggestions-container"></div>
        </div>
    </div>
    <div class="footer-container">
        <?php include('../partials/footer.php'); ?>
    </div>

</body>

</html>
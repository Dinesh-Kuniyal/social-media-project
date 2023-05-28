<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../../../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../../../components/controllers/SelectClub.php');
include('../../../components/controllers/SelectUser.php');
// echo $_GET['club_id'];
if ($_SESSION['user_id']) {
    $SelfUserId = $_SESSION['user_id'];
} else {
    die("You don't have permission to acces this page");
    exit;
}
if (!isset($_GET['club_id']) && isset($_GET['topic_id'])) {
    $topic_id = $_GET['topic_id'];
    $SelectAllArtcles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `topic_id`='$topic_id'");
} elseif (isset($_GET['club_id']) && !isset($_GET['topic_id'])) {
    $club_id = $_GET['club_id'];
    $SelectAllArtcles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `club_id`='$club_id'");
} else {
    header("location: ../../../404/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Feeds</title>
    <?php include('../../../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

    <?php include('../../../components/loader.php'); ?>


    <?php
    while ($ArticleData = mysqli_fetch_assoc($SelectAllArtcles)) {

        // Setting User Profile Images 
        $TargetUserId = $ArticleData['articleby'];
        $FetchTargetUserData = SelectUser($TargetUserId);
        if ($FetchTargetUserData['ProfileImg'] === "") {
            $TagetUserImage = "sample.png";
        } else {
            $TagetUserImage = $FetchTargetUserData['ProfileImg'];
        }


        // Genrating Random Cover 
        $random = rand(1, 6);
        $newRandomize = $random . ".jpg";
        if ($FetchTargetUserData['CoverImg'] === "") {
            $CreatedPath = $newRandomize;
        } else {
            $CreatedPath = $FetchTargetUserData['CoverImg'];
        }
    ?>
        <!-- // Feed 1  -->
        <div class="main-feed-container">
            <div style="background-image: url(../../../resources/uploads/cover/<?php echo $CreatedPath; ?>);" class="feed-header-image"></div>
            <div class="feeds-detail-container">
                <h4 class="feed-title"><?php echo $ArticleData['title']; ?></h4>
                <div class="feed-by-user-detail">
                    <a target="_blank" class="profile-link-feed-section" href="../../../users/?username=<?php echo $FetchTargetUserData['username']; ?>">
                        <img src="../../../resources/uploads/profiles/<?php echo $TagetUserImage; ?>" alt="Profile Photo">
                        <span class="feed-by-user-name"><?php echo $FetchTargetUserData['name']; ?></span>
                    </a>
                    <span class="feed-by-label"><?php echo $ArticleData['createdAt']; ?></span>
                </div>
                <div id="unique-content-id" class="feed-text-content">
                    <?php echo $ArticleData['overview']; ?>
                    <br><br>
                    <?php echo $ArticleData['MainContent']; ?>
                    <br><br>
                    <?php echo $ArticleData['Extra']; ?>
                    <br>
                    <?php echo $ArticleData['conclusion']; ?>
                </div>
                <div class="feed-footer">
                    <div class="feed-footer-reactions">
                        <?php
                        $article_id = $ArticleData['id'];
                        $CheckIfLiked = mysqli_query($connection, "SELECT * FROM `likes` WHERE `liked_by`='$SelfUserId' AND `article_id`='$article_id'");
                        if (mysqli_num_rows($CheckIfLiked) > 0) {
                        ?>
                            <div class="feed-footer-icons active-like-btn like-btn-article-footer" onclick="SetLike('<?php echo $ArticleData['id']; ?>', this)">
                                <i class="footer-icons-feed" data-feather="thumbs-up"></i>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="feed-footer-icons like-btn-article-footer" onclick="SetLike('<?php echo $ArticleData['id']; ?>', this)">
                                <i class="footer-icons-feed" data-feather="thumbs-up"></i>
                            </div>
                        <?php
                        }
                        ?>
                        <div onclick="CopyLink('http://localhost/opiverse/articles/?id=<?php echo $ArticleData['id']; ?>')" class="feed-footer-icons">
                            <i class="footer-icons-feed" data-feather="share-2"></i>
                        </div>
                    </div>
                    <a target="_blank" href="../../../articles/?id=<?php echo $article_id; ?>" class="feed-read-more-btn">Read more</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <script defer>
        const CopyLink = (link) => {
            if (navigator.clipboard.writeText(link)) {
                alert("Link Copied");
            } else {
                alert("Error.. Try Again Later...");
            }
        }
        const SetLike = (article_id, SelfElement) => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../../../components/controllers/SetLike.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        if (xhr.responseText === "DONE" && xhr.responseText != "ERROR") {
                            SelfElement.classList.toggle("active-like-btn");
                        } else {
                            console.log(xhr.response);
                        }
                    }
                }
            };
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("article_id=" + article_id);
        };
    </script>
</body>

</html>
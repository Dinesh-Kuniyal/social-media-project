<?php
session_start();
define('Opiverse_Const_Private', TRUE);
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../../modules/connection.php');
include('../../components/controllers/SelectClub.php');
include('../../components/controllers/SelectTopic.php');
include('../../components/controllers/SelectClubDataFromUName.php');
// include('../../modules/functions.php');
if (isset($_GET['club_name']) && isset($_GET['topic_id'])) {
    $topic_id = $_GET['topic_id'];
    $club_name = $_GET['club_name'];
    $GetTopicData = SelectTopic($topic_id);
    $GetClubData = SelectClubDataFromUName($club_name);
    $GivenClubId = $GetClubData['id'];
    $BannerBoldName = $GetTopicData['name']; // Topic Name
    $BannerSubData = $GetClubData['name']; // Club Name ( Sub Banner Details )
    $ChatUrlBannerIcon = "topics/chats/?topic_id=" . $topic_id; // Chat Url ( Topic Discussion )
    $ArticleListUrl = "topics/?topic_id=" . $topic_id; // All Articles of Targeted Topic
    $BannerImageSrc = "../../resources/uploads/topics/" . $GetTopicData['logo']; // Club Banner
} elseif (isset($_GET['club_name']) && !isset($_GET['topic_id'])) {
    // echo "Ok";
    $club_name = $_GET['club_name'];
    $GetClubData = SelectClubDataFromUName($club_name);
    $BannerBoldName = $GetClubData['name']; // Club Name ( Targeted )
    $GivenClubId =  $GetClubData['id']; // Club Id ( Targeted )
    // Articles Count Of Given (Targeted) Club >>
    $ArticlesCountClub = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `articles` WHERE `club_id`='$GivenClubId'"));
    $BannerSubData = $ArticlesCountClub . ' articles';
    $ChatUrlBannerIcon = "chats/?club_id=" . $GivenClubId;
    $ArticleListUrl = "topics/?club_id=" . $GivenClubId;
    $BannerImageSrc = "../../resources/uploads/clubs/" . $GetClubData['logo']; // Club Banner
} else {
    header("location: ../../404/");
}
// $TargetClubName = $_GET['club_name'];
// echo "<script>alert('".$TargetClubName."')</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs | Opiverse</title>
    <?php include('../../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="responsive.css" type="text/css">
</head>

<body>
    <?php include('../../components/loader.php'); ?>
    <div class="main-app-container-clubs-start">
        <div class="club-banner-start-sidebar">
            <i onclick="OpenUserListInner()" id="BackBtnClubBanner" class="BackBtnClubBanner" data-feather="chevron-left"></i>
            <img class="club-logo-banner" src="<?php echo $BannerImageSrc; ?>" alt="Failed To Load Image..">
            <div class="club-details-banner">
                <span class="club-name-banner"><?php echo $BannerBoldName; ?></span>
                <span class="club-article-count"><?php echo $BannerSubData; ?></span>
            </div>
            <script type="text/javascript">
                const SetBannerInformation = (topic_id) => {
                    let club_name_banner = document.querySelector(".club-name-banner");
                    let club_sub_text_count = document.querySelector(".club-article-count");
                }
            </script>
            <div class="banner-icons-club-start">
                <!-- <span class="club-members-count">
                    <i class="members-logo-clubs-banner" data-feather="user"></i>
                    <small class="mem-count-banner">12,890</small>
                </span> -->
                <i onclick="ChangeIframeUrl('<?php echo $ChatUrlBannerIcon; ?>')" class="club-discuus-icon-banner" data-feather="message-circle"></i>
                <i onclick="ChangeIframeUrl('<?php echo $ArticleListUrl; ?>')" class="club-feed-icon-banner" data-feather="book"></i>
                <i onclick="ToggleInfoBox()" class="club-info-icon-banner" data-feather="more-horizontal"></i>
            </div>

        </div>
        <div class="app-inner-container-for-sidebar-and-info">
            <div class="club-main-info-container">

                <iframe class="feeds-iframe-start-page" src="<?php echo $ArticleListUrl; ?>" frameborder="0"></iframe>

            </div>
            <?php
            // $SelectGivenCLub = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROm `clubs` WHERE `unique_name`='$TargetClubName'"));
            // $GivenClubId = $SelectGivenCLub['id'];
            ?>
            <div class="clubs-start-right-sidebar">
                <img class="club-logo-sidebar" src="../../resources/uploads/clubs/<?php echo $GetClubData['logo']; ?>" alt="Failed To Load Image..">
                <div class="club-name-start-sidebar"><?php echo $GetClubData['name']; ?></div>
                <span class="tagline-club-start-sdiebar"><?php echo $GetClubData['details']; ?></span>
                <span class="sub-heading-sidebar-start-club">Topics</span>
                <ul class="list-container-of-club-topics">
                    <?php
                    $SelectAllCLubTopics = mysqli_query($connection, "SELECT * FROM `topics` WHERE `club_id`='$GivenClubId'");
                    while ($LoopedClubTopics = mysqli_fetch_assoc($SelectAllCLubTopics)) {
                        $targetTopicId = $LoopedClubTopics['id'];
                        $GenratedChatUrl = "topics/chats/?topic_id=" . $targetTopicId;
                        $temp = $LoopedClubTopics['club_id'];
                        $tempData = SelectClub($temp);
                        $TopicClubName = $tempData['name'];
                        $SelectAllTopicsArticles = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `articles` WHERE `topic_id`='$targetTopicId'"));
                    ?>
                        <li onclick="ChangePageAsTopic('topics/?topic_id=<?php echo $targetTopicId; ?>', '<?php echo $LoopedClubTopics['name'] ?>', '<?php echo $TopicClubName; ?>', '<?php echo $GenratedChatUrl; ?>', '../../resources/uploads/topics/<?php echo $LoopedClubTopics['logo']; ?>')" class="list-item-of-club-topics">
                            <img src="../../resources/uploads/topics/<?php echo $LoopedClubTopics['logo']; ?>" alt="Failed To Load Image..">
                            <div class="topic-detail-list">
                                <span class="topics-name-sidebar"><?php echo $LoopedClubTopics['name']; ?></span>
                                <span class="articles-count-sidebar"><?php echo $SelectAllTopicsArticles; ?> Articles</span>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                    <script>
                        const InnerIframe = document.querySelector(".feeds-iframe-start-page");
                        const ChangeIframeUrl = (url) => {
                            InnerIframe.setAttribute('src', url);
                        }
                        const ChangePageAsTopic = (ArticleUrl, TopicName, TopicClubName, ChatUrl, LogoSrc) => {
                            let ClubLogoBanner = document.querySelector(".club-logo-banner");
                            let ClubNameBanner = document.querySelector(".club-name-banner");
                            let BannerSubData = document.querySelector(".club-article-count");
                            let ChatIconBanner = document.querySelector(".club-discuus-icon-banner");
                            let ArticleIconBanner = document.querySelector(".club-feed-icon-banner");
                            ClubLogoBanner.setAttribute('src', LogoSrc);
                            ClubNameBanner.innerHTML = TopicName;
                            BannerSubData.innerHTML = TopicClubName;
                            ChatIconBanner.setAttribute('onclick', 'ChangeIframeUrl("' + ChatUrl + '")');
                            ArticleIconBanner.setAttribute('onclick', 'ChangeIframeUrl("' + ArticleUrl + '")');
                            ChangeIframeUrl(ArticleUrl);
                        }
                    </script>
                </ul>
            </div>
        </div>

    </div>
    <script src="script.js" type="text/javascript"></script>
</body>

</html>
<style>
    .main-feed-container {
        width: 100%;
        height: auto;
        overflow: hidden;
        background-color: #fff;
        padding: 5px;
        margin-top: 1rem;
        border-radius: 4px;
    }

    .main-feed-container .feed-header-image {
        width: 100%;
        height: 150px;
        background-size: cover;
        border-radius: 4px;
    }

    .feeds-detail-container {
        width: 97%;
        padding: 10px;
        height: auto;
        background-color: #fff;
        margin-top: -50px;
        border-radius: 8px;
        margin-left: auto;
        margin-right: auto;
        height: auto;
    }

    .feed-title {
        background-color: #fff;
        color: #300 !important;
    }

    .feed-by-user-detail {
        display: flex;
        align-items: center;
        padding: 1rem 0px;
        gap: 6px;
    }

    .feed-by-user-detail img {
        width: 30px;
        border-radius: 2px;
        background-color: #333;
        height: 30px;
    }

    .feed-by-user-name {
        font-size: 14px;
        color: var(--base-purple);
        /* color: rgb(0, 139, 139); */
        font-weight: 600;
    }

    .feed-by-label {
        color: var(--base-purple);
        font-size: 12px;
        display: block;
        margin-left: auto;
    }

    .feed-text-content {
        font-size: 13px;
        height: auto;
        overflow: hidden;
        max-height: 180px;
    }

    .feed-footer {
        width: 100%;
        height: auto;
        padding: 1rem 0px;
        padding-bottom: 0px;
        display: flex;
        align-items: center;
    }

    .feed-footer-reactions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .feed-footer-icons {
        width: 30px;
        height: 30px;
        background-color: rgba(103, 78, 240, .6);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 200ms ease-in-out;
    }

    .like-btn-article-footer:hover {
        opacity: 1 !important;
    }

    .feed-footer-icons:hover {
        /* background-color: rgb(103, 78, 240); */
        opacity: .7;
    }

    .active-like-btn {
        background-color: rgb(103, 78, 240)
    }

    .footer-icons-feed {
        width: 18px;
    }

    .feed-read-more-btn {
        width: 100px;
        height: 30px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: auto;
        background-color: var(--base-purple);
        color: #fff;
        font-weight: lighter;
        border-radius: 8px;
        font-size: 12px;
        cursor: pointer;
        transition: all 250ms ease-in-out;
    }

    .feed-read-more-btn:hover {
        opacity: .8;
    }

    .profile-link-feed-section {
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>
<?php
$SelectAllArticles = mysqli_query($connection, "SELECT articles.*, `clubs`.`name` AS club_name, `clubs`.`unique_name` ,`topics`.`name` AS topic_name FROM `articles` LEFT JOIN `clubs` ON `articles`.`club_id`=`clubs`.`id` LEFT JOIN `topics` ON `topics`.`id` = `articles`.`topic_id` WHERE 1 ORDER BY `id`");
while ($LoopedArticleData = mysqli_fetch_assoc($SelectAllArticles)) {
    $ArticleBy = $LoopedArticleData['articleby'];
    $SelectArticleUser = SelectUser($ArticleBy);
?>
    <div class="main-feed-container">
        <div style="background-image: url(resources/uploads/cover/<?php echo SetProfileCovers($ArticleBy); ?>);" class="feed-header-image"></div>
        <div class="feeds-detail-container">
            <h4 class="feed-title"><?php echo $LoopedArticleData['title']; ?></h4>
            <style>
                .article_parent_details {
                    margin-top: 10px;
                    color: #000099;
                    text-decoration: underline;
                    /* font-style: italic; */
                    font-size: 13px;
                }
            </style>
            <div class="article_parent_details">
                <a href="clubs/?club_name=<?php echo $LoopedArticleData['unique_name'] ?>&topic_id=<?php echo $LoopedArticleData['topic_id'] ?>">
                    <?php echo $LoopedArticleData['club_name'] . " [" . $LoopedArticleData['topic_name'] . "]"; ?>
                </a>
            </div>
            <div class="feed-by-user-detail">
                <a class="profile-link-feed-section" href="users/?username=<?php echo $SelectArticleUser['username']; ?>">
                    <img src="resources/uploads/profiles/<?php echo UserProfileImage($ArticleBy); ?>" alt="Failed To Load Image..">
                    <span class="feed-by-user-name"><?php echo $SelectArticleUser['name']; ?></span>
                </a>
                <span class="feed-by-label"><?php echo $LoopedArticleData['createdAt']; ?></span>
            </div>
            <div id="unique-content-id" class="feed-text-content">
                <?php echo $LoopedArticleData['overview']; ?>
                <br><br>
                <?php echo $LoopedArticleData['MainContent']; ?>
                <br><br>
                <?php echo $LoopedArticleData['Extra']; ?>
                <br><br>
                <?php echo $LoopedArticleData['conclusion']; ?>
            </div>
            <div class="feed-footer">
                <div class="feed-footer-reactions">
                    <?php
                    $article_id = $LoopedArticleData['id'];
                    $CheckIfLiked = mysqli_query($connection, "SELECT * FROM `likes` WHERE `liked_by`='$SelfUserId' AND `article_id`='$article_id'");
                    if (mysqli_num_rows($CheckIfLiked) > 0) {
                    ?>
                        <div class="feed-footer-icons active-like-btn like-btn-article-footer" onclick="SetLike('<?php echo $LoopedArticleData['id']; ?>', this)">
                            <i class="footer-icons-feed" data-feather="thumbs-up"></i>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="feed-footer-icons like-btn-article-footer" onclick="SetLike('<?php echo $LoopedArticleData['id']; ?>', this)">
                            <i class="footer-icons-feed" data-feather="thumbs-up"></i>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    $club_id = $LoopedArticleData['club_id'];
                    $topic_id = $LoopedArticleData['topic_id'];
                    $temp = SelectClub($club_id);
                    $ClubName = $temp['unique_name'];
                    ?>
                    <a href="http://localhost/opiverse/clubs/?club_name=<?php echo $ClubName; ?>&topic_id=<?php echo $topic_id; ?>">
                        <div class="feed-footer-icons">
                            <i class="footer-icons-feed" data-feather="message-circle"></i>
                        </div>
                    </a>
                    <div onclick="CopyLink('http://localhost/opiverse/articles/?id=<?php echo $LoopedArticleData['id']; ?>')" class="feed-footer-icons">
                        <i class="footer-icons-feed" data-feather="share-2"></i>
                    </div>
                </div>
                <a href="articles/?id=<?php echo $LoopedArticleData['id']; ?>" class="feed-read-more-btn">Read more</a>
            </div>
        </div>
    </div>
<?php
}
?>
<script type="text/javascript">
    const CopyLink = (link) => {
        if (navigator.clipboard.writeText(link)) {
            alert("Link Copied");
        } else {
            alert("Error.. Try Again Later...");
        }
    }
</script>
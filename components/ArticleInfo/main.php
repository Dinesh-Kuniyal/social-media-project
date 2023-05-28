<div class="main-article-info-page">
    <div class="main-feed-container">
        <div style="background-image: url(../resources/uploads/cover/<?php echo SetProfileCovers($SelectArticleByUser['user_id']); ?>);" class="feed-header-image"></div>
        <div class="feeds-detail-container">
            <h4 class="feed-title">
                <?php echo $TargetArticleData['title']; ?> </h4>
            <div class="feed-by-user-detail">
                <a class="profile-link-feed-section" href="../users/?username=<?php echo $SelectArticleByUser['username']; ?>">
                    <img src="../resources/uploads/profiles/<?php echo UserProfileImage($SelectArticleByUser['user_id']); ?>" alt="Profile Image">
                    <span class="feed-by-user-name"><?php echo $SelectArticleByUser['name']; ?></span>
                </a>
                <span class="feed-by-label"><?php echo $TargetArticleData['createdAt']; ?></span>
            </div>
            <div id="unique-content-id" class="feed-text-content">
                <?php echo $TargetArticleData['overview']; ?>
                <br><br>
                <?php echo $TargetArticleData['MainContent']; ?>
                <br><br>
                <?php echo $TargetArticleData['Extra']; ?>
                <br><br>
                <?php echo $TargetArticleData['conclusion']; ?>
            </div>
            <div class="feed-footer">
                <div class="feed-footer-reactions">
                    <?php
                    $article_id = $TargetArticleData['id'];
                    $CheckIfLiked = mysqli_query($connection, "SELECT * FROM `likes` WHERE `liked_by`='$SelfUserId' AND `article_id`='$article_id'");
                    if (mysqli_num_rows($CheckIfLiked) > 0) {
                    ?>
                        <div class="feed-footer-icons active-like-btn like-btn-article-footer" onclick="SetLike('<?php echo $TargetedArticleId; ?>', this)">
                            <i class="footer-icons-feed" data-feather="thumbs-up"></i>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="feed-footer-icons like-btn-article-footer" onclick="SetLike('<?php echo $TargetedArticleId; ?>', this)">
                            <i class="footer-icons-feed" data-feather="thumbs-up"></i>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    $club_id = $TargetArticleData['club_id'];
                    $topic_id = $TargetArticleData['topic_id'];
                    $temp = SelectClub($club_id);
                    $ClubName = $temp['unique_name'];
                    ?>
                    <a href="http://localhost/opiverse/clubs/?club_name=<?php echo $ClubName; ?>&topic_id=<?php echo $topic_id; ?>">
                        <div class="feed-footer-icons">
                            <i class="footer-icons-feed" data-feather="message-circle"></i>
                        </div>
                    </a>
                    <div onclick="CopyLink('http://localhost/opiverse/articles/?id=<?php echo $TargetArticleData['id']; ?>')" class="feed-footer-icons">
                        <i class="footer-icons-feed" data-feather="share-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="suggested-articles-container">
    <div class="inner-article-suggestion-container">
        <h3>Suggested Article</h3>
        <?php
        $TargetArticleClubId = $TargetArticleData['club_id'];
        $Select = mysqli_query($connection, "SELECT * FROM articles WHERE `club_id`='$TargetArticleClubId' AND NOT `id`='$TargetedArticleId' ORDER BY `id` DESC LIMIT 12");
        if (mysqli_num_rows($Select) > 0) {
            while ($FetchedSuggestedData = mysqli_fetch_assoc($Select)) {
                $TopicInfo = SelectTopic($FetchedSuggestedData['topic_id']);
        ?>
                <a href="http://localhost/opiverse/articles/?id=<?php echo $FetchedSuggestedData['id']; ?>">
                    <div class="suggested-article">
                        <img class="article_suggestion-club-image" src="../resources/uploads/topics/<?php echo $TopicInfo['logo']; ?>" alt="Club Image">
                        <?php echo $FetchedSuggestedData['title']; ?>
                    </div>
                </a>
        <?php
            }
        } else {
            echo "<div class='no-suggestion-label'>No suggestion.</div>";
        }
        ?>
    </div>
</div>
<script type="text/javascript">
    const CopyLink = (link) => {
        if (navigator.clipboard.writeText(link)) {
            alert("Link Copied");
        } else {
            alert("Error.. Try Again Later...");
        }
    }
</script>
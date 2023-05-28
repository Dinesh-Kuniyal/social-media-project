<style>
    .main-home-club-suggest-holder {
        flex: 1;
        background-color: #fff;
        border-radius: 4px;
        overflow-y: scroll;
        padding: 8px;
    }

    .main-home-club-suggest-holder::-webkit-scrollbar {
        width: 5px;
        border-radius: 100px;
        background-color: transparent;
    }

    .main-home-club-suggest-holder::-webkit-scrollbar-thumb {
        width: 100%;
        border-radius: 100px;
        background-color: var(--base-purple);
    }

    .suggest-club-list-items {
        width: 100%;
        min-height: 40px;
        display: flex;
        gap: 10px;
        padding: 5px;
        align-items: center;
        margin-top: 10px;
        background-color: rgba(0, 0, 0, .2);
        border-radius: 4px;
        transition: all 200ms ease-in-out;
    }

    .suggest-club-list-items:hover {
        background-color: rgba(0, 0, 0, .4);
    }

    .club-logo-suggestion {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .suggested-club-info {
        height: 100%;
        display: flex;
        flex-flow: column;
        justify-content: center;
    }

    .articles-count-clubs {
        color: rgba(0, 0, 0, .4);
        font-size: 12px;
    }
</style>
<div class="main-home-club-suggest-holder">
    <h4>Recommended for you</h4>
    <?php
    $SelectAllClubs = mysqli_query($connection, "SELECT clubs.*, COUNT(`articles`.`id`) as articles_count FROM `clubs` LEFT JOIN `articles` ON `clubs`.`id`=`articles`.`club_id` GROUP BY `clubs`.`id`");
    while ($ClubData = mysqli_fetch_assoc($SelectAllClubs)) {
        // echo "<pre>";
        // print_r($ClubData);
    ?>
        <a class="suggest-club-list-items" href="clubs/?club_name=<?php echo $ClubData['unique_name'] ?>">
            <img class="club-logo-suggestion object-images-cover-center" src="resources/uploads/clubs/<?php echo $ClubData['logo']; ?>" alt="Club Image">
            <div class="suggested-club-info">
                <span class="club-name-suggested"><?php echo $ClubData['name']; ?></span>
                <span class="articles-count-clubs"><?php echo $ClubData['articles_count']; ?> Articles</span>
            </div>
        </a>
    <?php
    }
    ?>
</div>
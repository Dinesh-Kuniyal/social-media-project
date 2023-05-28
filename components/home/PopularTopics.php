<style>
    /* // Right Sidebar  */
    .right-sidebar-container {
        height: 100%;
        width: 100%;
        display: flex;
        flex-flow: column;
        top: 0px;
        z-index: 0;
        right: 0px;
    }

    .inner-right-sidebar-container {
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: 4px;
        padding: 10px;
        display: flex;
        flex-flow: column;
    }

    .right-sidebar-heading {
        display: flex;
        align-items: center;
        text-transform: capitalize;
        position: relative;
    }

    .right-sidebar-heading::after {
        content: '';
        width: 60px;
        height: 2.5px;
        background-color: var(--base-purple);
        opacity: .9;
        position: absolute;
        top: 110%;
        border-radius: 10px;
    }

    .right-sidebar-heading .edit-icon-right-sidebar {
        margin-left: auto;
        width: 20px;
    }

    .edit-icon-right-sidebar:hover {
        stroke: #300;
    }

    .right-sidebar-list {
        flex-grow: 1;
        list-style-type: none;
        margin-top: 10px;
        overflow: hidden;
        padding-right: 10px;
        overflow-y: scroll;
        transition: all 250ms ease-in-out;
    }

    .right-sidebar-list::-webkit-scrollbar {
        width: 5px;
        background-color: rgba(0, 0, 0, .3);
        border-radius: 10px;
    }

    .right-sidebar-list::-webkit-scrollbar-thumb {
        background-color: var(--base-purple);
        border-radius: 10px;
        transition: all 250ms ease-in-out;
    }

    .right-sidebar-list::-webkit-scrollbar-thumb:hover {
        opacity: .7;
    }

    .right-sidebar-list a {
        position: relative;
        transition: all 250ms ease-in-out;
    }

    .right-sidebar-list a:hover {
        opacity: .8;
    }

    .right-sidebar-list-item {
        width: 100%;
        display: flex;
        gap: 10px;
        margin-top: 10px;
        padding: 5px 5px;
        cursor: pointer;
        border-bottom: 1px solid rgba(0, 0, 0, .2);
    }

    .sidebar-logo-topic {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #333;
    }

    .sidebar-topic-details {
        display: flex;
        flex-flow: column;
        justify-content: center;
        overflow: hidden;
    }

    .topic-name-right-sidebar {
        font-size: 14px;
        font-weight: 500;
        color: #300;
    }

    .members-count-topic {
        font-size: 12px;
        color: rgba(0, 0, 0, .5);
    }

    .show-more-btn-right-sidebar {
        height: 35px;
        font-size: 12px;
        color: #300;
        cursor: pointer;
        position: relative;
        display: flex;
        align-items: center;
    }

    .show-more-btn-right-sidebar::before {
        content: '';
        position: absolute;
        width: 50px;
        height: 2px;
        background-color: #300;
        border-radius: 10px;
        top: 80%;
    }
</style>
<div class="right-sidebar-container">
    <div class="inner-right-sidebar-container">
        <h4 class="right-sidebar-heading">
            Some popular topics
            <i data-feather="edit" class="edit-icon-right-sidebar"></i>
        </h4>
        <ul class="right-sidebar-list">
            <?php
            $SelectAllTopics = mysqli_query($connection, "SELECT * FROM `topics` WHERE 1");
            while ($row = mysqli_fetch_assoc($SelectAllTopics)) {      
                $TopicClubId = $row['club_id'];
                $SelectTopicClub = SelectClub($TopicClubId);
            ?>
                <a href="clubs/?club_name=<?php echo $SelectTopicClub['unique_name'] ?>&topic_id=<?php echo $row['id']; ?>">
                    <div class="cover-animator-topic-suggestion"></div>
                    <li class="right-sidebar-list-item">
                        <img class="sidebar-logo-topic object-images-cover-center" src="resources/uploads/topics/<?php echo $row['logo']; ?>" alt="Topic Image">
                        <div class="sidebar-topic-details">
                            <span class="topic-name-right-sidebar"><?php echo $row['name']; ?></span>
                            <span class="members-count-topic">
                                <?php
                                echo $SelectTopicClub['name']; 
                                ?>
                            </span>
                        </div>
                    </li>
                </a>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
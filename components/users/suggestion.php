<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
    die("You Don't have permission to acces this page");
    exit;
}
?>
<style>
    .main-suggestion-outer-container {
        width: clamp(300px, 100%, 400px);
        padding: 10px;
        padding-left: 0px;
    }

    .inner-suggestion-container-users {
        width: 100%;
        height: 100%;
        background-color: #fff;
        border-radius: 3px;
        padding: 10px;
    }

    @media screen and (max-width: 800px) {
        .main-suggestion-outer-container {
            width: 100%;
            padding: 10px;
            padding: 10px;
        }
    }

    .flexed-container {
        display: flex;
        margin-top: 10px;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-around;
    }

    .user-profile-suggestion-s {
        background: rgba(0, 0, 0, .2);
        padding: 10px;
        border-radius: 4px;
        flex: 4;
        display: flex;
        min-width: 180px;
        flex-flow: column;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 2px;
        cursor: pointer;
        transition: all 200ms ease-in-out;
        -webkit-transition: all 200ms ease-in-out;
        -moz-transition: all 200ms ease-in-out;
    }

    .user-profile-suggestion-s:hover {
        background-color: rgba(0, 0, 0, .4);
    }

    .user-profile-suggestion-s h3 {
        text-align: center;
    }

    .user-profile-image-suggestion {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    .user-profile-suggestion-s span {
        color: #333;
        font-size: 13px;
    }
</style>
<div class="main-suggestion-outer-container">
    <div class="inner-suggestion-container-users">
        <h4>Suggested user</h4>
        <div class="flexed-container">
            <?php
            $SelectAllUsers = mysqli_query($connection, "SELECT * FROM `users` WHERE NOT `user_id`='$SelfUserId' AND NOT `user_id`='$TargetUserId'");
            if (mysqli_num_rows($SelectAllUsers) > 0) {
                $suggestedCount = 0;
                while ($SuggestedUserdata = mysqli_fetch_assoc($SelectAllUsers)) {
                    if($suggestedCount >= 18){
                        break;
                    }
                    if (!CheckFriends($SelfUserId, $SuggestedUserdata['user_id'])) {
            ?>
                        <a href="../users/?username=<?php echo $SuggestedUserdata['username']; ?>">
                            <div class="user-profile-suggestion-s">
                                <img class="user-profile-image-suggestion" src="../resources/uploads/profiles/<?php echo UserProfileImage($SuggestedUserdata['user_id']); ?>" alt="Profile Image">
                                <h3><?php echo $SuggestedUserdata['name']; ?></h3>
                                <span>@<?php echo $SuggestedUserdata['username']; ?></span>
                            </div>
                        </a>
            <?php
            $suggestedCount++;
                    }
                }
            } else {
                echo "No Suggested Uers";
            }
            ?>
        </div>
    </div>

</div>
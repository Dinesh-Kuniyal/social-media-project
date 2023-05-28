<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
    die("You Don't have permission to acces this page");
    exit;
}
function CheckFriends($UserOne, $UserTwo)
{
    $connection = $GLOBALS['connection'];
    $stmt = mysqli_prepare($connection, "SELECT * FROM `friends` WHERE
    `user_one` = ? AND `user_two` = ?
     OR
    `user_one` = ? AND `user_two`= ?");
    $stmt->bind_param('ssss', $UserOne, $UserTwo, $UserTwo, $UserOne);
    $stmt->execute();
    $stmt->store_result();
    $countrows = $stmt->num_rows();
    if ($countrows > 0) {
        return true;
    } else {
        return false;
    }
}
?>
<style>
    .main-outer-user-container {
        flex: 1;
        padding: 10px;
        min-width: 320px;
    }

    .inner-main-conatiner {
        border-radius: 3px;
        background-color: #fff;
    }

    .user-bannner-image-container {
        width: 100%;
        background-size: cover;
        background-position: center;
        height: 120px;
        border-radius: 3px;
        z-index: 1;
    }

    .user-profile-image-users {
        display: block;
        width: 130px;
        height: 130px;
        margin-top: -65px;
        display: block;
        margin-left: auto;
        background-color: #333;
        border-radius: 50%;
        margin-right: auto;
        z-index: 2;
    }

    .username-users-page {
        text-align: center;
        margin-top: 4px;
    }

    .user-name-users-page {
        color: #333;
        font-size: 14px;
        display: block;
        text-align: center;
    }

    .user-about-container-users-page {
        color: var(--base-purple);
        display: block;
        text-align: center;
        padding: 5px;
    }

    .user-page-loader {
        width: 30px;
        height: 30px;
        border: 4px solid #333;
        border-radius: 50%;
        display: none;
        margin-left: auto;
        border-top: 4px solid transparent;
        margin-right: auto;
        animation: loader 1s infinite ease-in-out;
        -webkit-animation: loader 1s infinite ease-in-out;
        -moz-animation: loader 1s infinite ease-in-out;
    }

    @keyframes loader {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .user-page-btn-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 10px;
    }

    .user-page-btn {
        padding: 5px 10px;
        color: #fff;
        border-radius: 4px;
        border: 2px solid var(--base-purple);
        cursor: pointer;
        transition: all 200ms ease-in-out;
        -webkit-transition: all 200ms ease-in-out;
        -moz-transition: all 200ms ease-in-out;
        background-color: var(--base-purple);
    }

    .user-page-btn:hover {
        opacity: .7;
    }

    .user-page-btn-outlined {
        padding: 5px 10px;
        color: #333;
        border-radius: 4px;
        cursor: pointer;
        border: 2px solid var(--base-purple);
        transition: all 200ms ease-in-out;
        -webkit-transition: all 200ms ease-in-out;
        -moz-transition: all 200ms ease-in-out;
    }

    .user-page-btn-outlined:hover {
        opacity: .7;
    }
</style>
<div class="main-outer-user-container">
    <div class="inner-main-conatiner">
        <input type="text" id="FUID" value="<?php echo $TargetUserId; ?>" hidden>
        <div style="background-image: url(../resources/uploads/cover/<?php echo SetProfileCovers($TargetUserId); ?>);" class="user-bannner-image-container"></div>
        <img class="user-profile-image-users" src="../resources/uploads/profiles/<?php echo UserProfileImage($TargetUserId); ?>" alt="<?php echo $TargetedUserData['name']; ?>">
        <h2 class="username-users-page"><?php echo $TargetedUserData['name']; ?></h2>
        <span class="user-name-users-page">@<?php echo $TargetedUserData['username']; ?></span>
        <div class="user-about-container-users-page">
            <?php echo $TargetedUserData['about']; ?>
        </div>
        <div class="user-page-loader"></div>
        <?php
        if (CheckFriends($SelfUserId, $TargetUserId)) {
        ?>
            <div class="user-page-btn-container">
                <div class="user-page-btn send-request-btn">Friends</div>
                <a href="../messages/?user_name=<?php echo $TargetedUserData['username'] ?>">
                    <div class="user-page-btn-outlined">Message</div>
                </a>
            </div>
        <?php
        } else {
        ?>
            <div class="user-page-btn-container">
                <div class="user-page-btn send-request-btn">
                    <?php

                    $CheckRequested = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `requests` WHERE `request_by`='$SelfUserId' AND `request_to`='$TargetUserId'"));
                    if ($CheckRequested > 0) {
                        echo "REQUESTED";
                    } else {
                        echo "Send Request";
                    }
                    ?>
                </div>
                <!-- <div class="user-page-btn-outlined">
                Message
            </div> -->
            </div>
        <?php
        }
        ?>
    </div>
</div>
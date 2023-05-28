<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
    $Error_Base_Url = '../error/';
    $Error_Location = 'location: ' . $Error_Base_Url . '403/';
    header($Error_Location);
}
?>
<style>
    .main-header-container {
        width: 100%;
        display: flex;
        align-items: center;
        padding: 0px 10px;
        background-color: transparent;
    }

    .header-logo-image {
        height: 50px;
    }

    .search-input {
        width: clamp(280px, 100%, 400px);
        height: 35px;
        background-color: rgb(232, 240, 254);
        border-radius: 4px;
        border: none;
        padding: 10px;
    }

    .search-input:focus {
        outline: none;
    }

    .icons-container-header {
        display: flex;
        gap: 2rem;
    }

    .header-navigation-icons {
        stroke: #333;
        fill: #333;
    }

    .profile-image-header-link {
        width: 30px;
        height: 30px;
        border-radius: 4px;
    }

    .profile-link-header {
        display: flex;
        font-size: 14px;
        background-color: var(--base-purple);
        padding: 4px 5px;
        border-radius: 4px;
        color: #fff;
        align-items: center;
        gap: 4px;
    }

    .icon-holder-header {
        display: flex;
        align-items: center;
    }

    .icons-container-header {
        margin-left: auto;
        padding-right: 10px;
    }

    .notify-text {
        position: relative;
    }

    .notify-text::after {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-align: center;
        font-size: 12px;
        width: 16px;
        overflow: hidden;
        border-radius: 4px;
        top: 0px;
        right: -10px;
        height: 16px;
        background-color: red;
        content: attr(data-text);
    }

    @media screen and (max-width: 500px) {
        .search-input {
            display: none;
        }
    }

    .main-notification-box {
        position: fixed;
        z-index: 9;
        padding: 10px;
        border-radius: 4px;
        right: 0px;
        top: 40px;
        width: clamp(300px, 100%, 400px);
        display: none;
    }

    .notification-inner-container {
        background-color: #eee;
        padding: 10px;
        border-radius: 4px;
        display: flex;
        flex-flow: column;
    }

    .notification-box-heading {
        display: flex;
        align-items: center;
        color: #333;
        justify-content: space-between;
    }

    .notification-close-btn {
        color: #333;
        cursor: pointer;
    }

    .notification-content-holder {
        background-color: #fff;
        padding: 10px;
        border-radius: 4px;
    }

    .Request-notification-holder {
        width: 100%;
        flex: 1;
        background-color: #fff;
        padding: 5px;
        border-radius: 4px;
        display: flex;
        gap: 1rem;
        flex-flow: column;
        align-items: center;
        max-height: 400px;
        overflow-y: scroll;
    }

    .request-inner-holder-w-100 {
        display: flex;
        align-items: center;
    }

    .Request-notification-holder::-webkit-scrollbar {
        display: none;
    }

    .Request-notification-holder a img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .notification-content-req {
        flex: 1;
        padding: 0px 4px;
        font-size: 13px;
    }

    .accept-del-request-btn {
        display: flex;
        gap: 4px;
    }

    .notify-icons {
        width: 20px;
        stroke: #333;
    }

    .btn-holder-notify {
        aspect-ratio: 1/1;
        background-color: #ccc;
        padding: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        transition: all 200ms ease-in-out;
    }

    .btn-holder-notify:hover {
        opacity: .7;
    }

    .notification-content-req a {
        color: rgba(0, 0, 0, .7);
    }

    .notification-loader {
        width: 30px;
        height: 30px;
        border: 4px solid var(--base-purple);
        display: none;
        margin-left: auto;
        margin-right: auto;
        border-radius: 50%;
        margin-top: 10px;
        border-top: 4px solid transparent;
        animation: NotifyLoader 1s infinite ease-in-out;
        -webkit-animation: NotifyLoader 1s infinite ease-in-out;
        -moz-animation: NotifyLoader 1s infinite ease-in-out;
    }

    @keyframes NotifyLoader {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
<div class="main-notification-box">
    <div class="notification-inner-container">
        <h4 class="notification-box-heading">Notifications
            <span class="notification-close-btn"><i data-feather="x"></i></span>
        </h4>
        <div class="notification-loader"></div>
        <div class="Request-notification-holder"></div>
    </div>
</div>
<div class="main-header-container">
    <img src="<?php echo $Header_Base_Url; ?>logo.png" alt="LOGO" class="header-logo-image">
    <form action="<?php echo $Header_Base_Url; ?>explore/" class="header-search-form">
        <input type="search" placeholder="Search Something.." class="search-input" name="search">
    </form>
    <div class="icons-container-header">
        <?php
        $HeaderTempId = $_SESSION['user_id'];
        $HeaderTemp = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `users` WHERE `user_id`='$HeaderTempId'"));
        ?>
        <a href="<?php echo $Header_Base_Url; ?>" class="icon-holder-header">
            <i style="fill: none;" class="header-navigation-icons" data-feather="home"></i>
        </a>
        <a href="<?php echo $Header_Base_Url; ?>explore/" class="icon-holder-header">
            <i style="fill: none;" class="header-navigation-icons" data-feather="compass"></i>
        </a>
        <a href="<?php echo $Header_Base_Url; ?>clubs/" class="icon-holder-header">
            <i class="header-navigation-icons" data-feather="users"></i>
        </a>
        <?php
        $UnseenMessageCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `messages` WHERE `message_to`='$HeaderTempId' AND `status`='UNSEEN'"));
        if ($UnseenMessageCount > 0) {
        ?>
            <a href="<?php echo $Header_Base_Url; ?>messages/" class="icon-holder-header messages-btn notify-text" data-text="<?php echo $UnseenMessageCount; ?>">
                <i class="header-navigation-icons" data-feather="message-square"></i>
            </a>
        <?php
        } else {
        ?>
            <a href="<?php echo $Header_Base_Url; ?>messages/" class="icon-holder-header messages-btn" data-text="4">
                <i class="header-navigation-icons" data-feather="message-square"></i>
            </a>
        <?php
        }
        ?>
        <?php
        $UnseenMessageCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `notifications` WHERE `sent_to`='$HeaderTempId' AND `status`='UNSEEN'"));
        if ($UnseenMessageCount > 0) {
        ?>
            <a class="icon-holder-header notify-text notification-open-btn" data-text="<?php echo $UnseenMessageCount; ?>">
                <i class="header-navigation-icons" data-feather="bell"></i>
            </a>
        <?php
        } else {
        ?>
            <a class="icon-holder-header notification-open-btn" data-text="4">
                <i class="header-navigation-icons" data-feather="bell"></i>
            </a>
        <?php
        }
        ?>
        <?php
        $user_id = $_SESSION['user_id'];
        $SelectSelfuser = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `users` WHERE `user_id`='$user_id'"));
        if ($SelectSelfuser['user_type'] === 'writer') {
        ?>
            <a href="<?php echo $Header_Base_Url; ?>articles/create/" class="icon-holder-header">
                <i style="fill: none;" class="header-navigation-icons" data-feather="plus-square"></i>
            </a>
        <?php
        }
        ?>
        <?php
        if ($HeaderTemp['ProfileImg'] === "") {
            $HeaderProfileImg = "sample.png";
        } else {
            $HeaderProfileImg = $HeaderTemp['ProfileImg'];
        }
        ?>
        <a href="<?php echo $Header_Base_Url; ?>update/" class="icon-holder-header profile-link-header">
            <img class="profile-image-header-link" src="<?php echo $Header_Base_Url; ?>resources/uploads/profiles/<?php echo $HeaderProfileImg; ?>" alt="Profile Image">
            <?php echo $HeaderTemp['name']; ?>
        </a>
    </div>
</div>
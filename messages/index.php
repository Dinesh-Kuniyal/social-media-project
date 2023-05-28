<?php
session_start();
define('Opiverse_Pages_Auth_Constant', TRUE);
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
include('../components/controllers/UserProfileImage.php');
if (isset($_SESSION['user_id'])) {
    $SelfUserId = $_SESSION['user_id'];
    if (isset($_GET['user_name'])) {
        $TargetedUserName = $_GET['user_name'];
        $IframeUrl = "chat/?user_name=" . $TargetedUserName;
    } else {
        $IframeUrl = "default.php";
    }
} else {
    header("location: ../login/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <?php include('../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php include("../components/loader.php"); ?>
    <div class="main-app-container-messages">
        <div class="messages-sidebar-container">
            <h2 class="messages-heading-page">
                <i onclick="GoToHome()" class="GotoToHomeBtnChats" data-feather="arrow-left"></i>
                Messages
            </h2>
            <div class="chats-sidebar-search-box">
                <i data-feather="search" class="search-icon-chat-sidebar"></i>
                <input class="SearchBar" type="search" placeholder="Search peoples">
            </div>
            <style>
                .sidebar-search-box {
                    width: 100%;
                    /* position: fixed; */
                    height: 200px;
                    /* padding: 10px; */
                    height: 0px;
                    overflow-y: scroll;
                    overflow-x: hidden;
                }

                .sidebar-search-box::-webkit-scrollbar {
                    width: 5px;
                    border-radius: 4px;
                    background-color: #fff;
                }

                .sidebar-search-box::-webkit-scrollbar-thumb {
                    background-color: #333;
                    border-radius: 100px;
                }
            </style>
            <div class="sidebar-search-box">
                <!-- <li class="chat-sidebar-user-items">
                    <img src="../images/sample.png" alt="Failed To Load Image..">
                    <div class="user-details-sidebar-chat">
                        <span class="users-name-chat-sidebar">Priyanshu Negi</span>
                        <span class="last-message-chat-sidebar">dinesh_kuniyal</span>
                    </div>
                </li> -->
            </div>
            <ul class="chats-sidebar-users-list">
                <div class="users-container-chat-sidebar">
                    <!-- <li class="chat-sidebar-user-items">
                        <img src="../images/sample.png" alt="Failed To Load Image..">
                        <div class="user-details-sidebar-chat">
                            <span class="users-name-chat-sidebar">Priyanshu Negi</span>
                            <span class="last-message-chat-sidebar">Are you busy right now ?</span>
                        </div>
                        <div class="time-and-unssen-count-chats-sidebar">
                            <span class="last-message-time">21:23 PM</span>
                            <span class="unseen-message-count">2</span>
                        </div>
                    </li>
                    <li class="chat-sidebar-user-items">
                        <img src="../images/avtar (1).png" alt="Failed To Load Image..">
                        <div class="user-details-sidebar-chat">
                            <span class="users-name-chat-sidebar">Yogesh Rawat</span>
                            <span class="last-message-chat-sidebar">You sent a photo.</span>
                        </div>
                        <div class="time-and-unssen-count-chats-sidebar">
                            <span class="last-message-time">19:55 PM</span>
                        </div>
                    </li> -->
                </div>
                <span class="suggested-sub-mark">Suggested</span>
                <?php
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
                $SelectAllSuggested = mysqli_query($connection, "SELECT * FROM `users` WHERE NOT `user_id`='$SelfUserId' ORDER BY `id` DESC");
                while ($SuggestedData = mysqli_fetch_assoc($SelectAllSuggested)) {
                    if (!CheckFriends($SelfUserId, $SuggestedData['user_id'])) {

                ?>
                        <li onclick="ChangeWindowLocation('../users/?username=<?php echo $SuggestedData['username']; ?>')" class="chat-sidebar-user-items-suggest">
                            <img src="../resources/uploads/profiles/<?php echo UserProfileImage($SuggestedData['user_id']); ?>" alt="ERROR">
                            <div class="user-details-sidebar-chat">
                                <span class="users-name-chat-sidebar"><?php echo $SuggestedData['name']; ?></span>
                                <span class="last-message-chat-sidebar"><?php echo $SuggestedData['username']; ?></span>
                            </div>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="messages-iframe-container">
            <iframe src="<?php echo $IframeUrl; ?>" class="chats-iframe" frameborder="0"></iframe>
        </div>
    </div>
    <script src="script.js" type="text/javascript" defer></script>
</body>

</html>
<?php
session_start();
$club_id = $_GET['club_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club-Discussion</title>
    <?php include('../../../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php include('../../../components/loader.php'); ?>
    <div class="main-chat-area-container">
        <div class="chats-container-list">
            <!-- // Chat Area  -->
        </div>
        <form autocomplete="off" class="chat-form-typing-area">
            <input type="text" hidden id="club_id" name="club_id" value="<?php echo $club_id; ?>">
            <!-- <i class="attachment-icon-form" data-feather="paperclip"></i> -->
            <input name="message" class="user-message" type="text" placeholder="Type a message here">
            <!-- <i class="emoji-icon-form" data-feather="smile"></i> -->
            <button class="form-submit-btn">
                <i class="form-submit-btn-icon" data-feather="send"></i>
            </button>
        </form>
    </div>
    <script src="ClubChat.js" type="text/javascript"></script>
</body>

</html>
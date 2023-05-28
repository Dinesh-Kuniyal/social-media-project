<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
include('../../components/controllers/SelectUser.php');
include('../../components/controllers/UserProfileImage.php');
if (isset($_SESSION['user_id'])) {
    $SelfUserID = $_SESSION['user_id'];
    if (isset($_GET['user_name'])) {
        $TargetedUserName = $_GET['user_name'];
        $TempHeader = mysqli_query($connection, "SELECT * FROM `users` WHERE `username`='$TargetedUserName'");
        if (mysqli_num_rows($TempHeader) === 0) {
            echo "<script>parent.window.location.href = '../../error/404'</script>";
            exit;
        }
        $SelectTargetedUser = mysqli_fetch_assoc($TempHeader);
        $SelectSelfData = SelectUser($SelfUserID);
    } else {
        header("location: ../../error/404");
    }
} else {
    header("location: ../../error/404");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <?php include('../../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="script.js" defer></script>
</head>

<body>
    <?php include('../../components/loader.php'); ?>
    <div class="main-app-container-chats">
        <div class="chat-banner-container">
            <i class="BackBtnChatBanner" data-feather="chevron-left"></i>
            <img onclick="ChangeParentLocation('../../users/?username=<?php echo $SelectTargetedUser['username']; ?>')" class="user-image-banner" src="../../resources/uploads/profiles/<?php echo UserProfileImage($SelectTargetedUser['user_id']); ?>" alt="Failed To Load Image..">
            <div onclick="ChangeParentLocation('../../users/?username=<?php echo $SelectTargetedUser['username']; ?>')" class="user-details-chat-banner">
                <span class="user-name-banner"><?php echo $SelectTargetedUser['name']; ?></span>
                <span class="user-status-online-offline">Online</span>
            </div>
            <div class="chat-banner-icon-container">
                <i class="more_horiz_chat_banner" data-feather="info"></i>
            </div>
        </div>

        <div class="main-file-send-container">
            <h3>Send a file</h3>
            <div id="file-ibfo-holder" class="file-ibfo-holder">
                <i data-feather="file"></i>
                YoutubeVieo.mp4
            </div>
            <img id="preview-image" src="../../resources/images/bg-1.jpg" class="img-preview-before-send" alt="Your Image">
            <form class="SendFileForm" action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="reciever_userID" hidden value="<?php echo $SelectTargetedUser['user_id']; ?>">
                <input id="file_name" name="file_name" hidden type="text">
                <input id="file_type" name="file_type" hidden type="text">
                <input id="send_file" name="send_file" type="file" hidden>
                <div class="send-file-form-loader"></div>
                <button class="sendBtnFile" type="submit">Send
                    <i class="send-icon-file" data-feather="send"></i>
                </button>
            </form>
        </div>
        <script>
            const FileSendContainer = document.querySelector(".main-file-send-container");
            const SendFileForm = document.querySelector(".SendFileForm");
            const sendBtnFile = document.querySelector(".sendBtnFile");
            SendFileForm.onsubmit = (e) => {
                e.preventDefault();
            }
            sendBtnFile.onclick = () => {
                document.querySelector(".send-file-form-loader").style.display = "block";
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "SendFile.php", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            if (xhr.response === "DONE" && xhr.response != "ERROR") {
                                FileSendContainer.style.display = "none";
                            } else {
                                alert(xhr.response);
                                alert("Error in Sending File Try again later..");
                            }
                            document.querySelector(".send-file-form-loader").style.display = "none";
                            FileSendContainer.style.display = "none";
                        }
                    }
                }
                xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                let formData = new FormData(SendFileForm);
                xhr.send(formData);
            }
        </script>
        <div class="rest-area-after-banner">
            <style>
                .file-message {
                    background-color: #333;
                    color: #fff;
                    display: flex;
                    align-items: center;
                    cursor: pointer;
                    gap: 4px;
                    overflow: hidden;
                    min-height: 40px;
                    max-height: 80px;
                }

                .messae-file-icom {
                    stroke: #fff;
                    min-width: 20px;
                }

                .file_link-msg {
                    display: flex;
                    align-items: center;
                    gap: 4px;
                }
            </style>
            <div class="main-chat-area-container">
                <div class="chats-container-list">
                    <!-- // All Chats Will Go Here  -->
                </div>
                <form autocomplete="off" class="chat-form-typing-area">
                    <label for="send_file">
                        <i class="attachment-icon-form" data-feather="paperclip"></i>
                    </label>
                    <input class="user-message" name="message-input" type="text" placeholder="Type a message here">
                    <input type="text" name="Chatter-ID" class="Chatter-ID" hidden value="<?php echo $SelectTargetedUser['user_id']; ?>">
                    <i class="emoji-icon-form" data-feather="smile"></i>
                    <button class="form-submit-btn">
                        <i class="form-submit-btn-icon" data-feather="send"></i>
                    </button>
                </form>
            </div>
            <script>
                const filepicker = document.getElementById('send_file');

                filepicker.addEventListener('change', (event) => {
                    const file = event.target.files[0];
                    const a = file.type[0] + file.type[1] + file.type[2] + file.type[3] + file.type[4];
                    const filePreview = document.getElementById("file-ibfo-holder");
                    const preview = document.getElementById("preview-image");
                    const FileName = file.name;
                    const FileType = file.type;
                    document.getElementById("file_name").value = FileName;
                    document.getElementById("file_type").value = FileType;
                    if (a === "image") {
                        var src = URL.createObjectURL(event.target.files[0]);
                        preview.src = src;
                        filePreview.style.display = "none";
                        preview.style.display = "block";
                    } else {
                        filePreview.innerText = FileName;
                        preview.style.display = "none";
                        filePreview.style.display = "flex";
                    }
                    FileSendContainer.style.display = "block";
                });
            </script>
            <div class="chats-info-container-right-side">
                <h5 class="chat-info-sidebar-list-heading">Shared Media
                    <i class="more_btn_side_heading_Chats" data-feather="chevron-down"></i>
                </h5>
                <div class="flexbox-for-shared-media">
                    <?php
                    $reciverId = $SelectTargetedUser['user_id'];
                    $SelectAllPhotos = mysqli_query($connection, "SELECT * FROM `messages` WHERE (`message_to`='$SelfUserID' AND `message_by`='$reciverId' OR `message_to`='$reciverId' AND `message_by`='$SelfUserID') AND `type`='FILE' ORDER BY `id` DESC");
                    if (mysqli_num_rows($SelectAllPhotos) > 0) {
                        $i = 0;
                        while ($FetchedPhotos = mysqli_fetch_assoc($SelectAllPhotos)) {
                            if ($i >= 4) {
                                break;
                            }
                            $FileDest = $FetchedPhotos['file_id'];
                            $selectPhoto = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `media` WHERE `file_destination`='$FileDest'"));
                            // $CreatedType = $selectPhoto['php_file_type'][0].;
                            $CreatedType = "";
                            for ($j = 0; $j <= 4; $j++) {
                                $CreatedType .= $selectPhoto['php_file_type'][$j];
                            }
                            if ($CreatedType === "image") {
                    ?>
                                <a class="image-links-messages" href="../../resources/uploads/files/<?php echo $selectPhoto['file_destination']; ?>" target="_blank"><img src="../../resources/uploads/files/<?php echo $selectPhoto['file_destination']; ?>" alt="Failed To Load Image.."></a>

                        <?php
                                $i++;
                            }
                        }
                    } else {
                        ?>
                        No photos shared yet.
                    <?php
                    }
                    ?>
                    <!-- <a class="image-links-messages" href=""><img src="../../resources/images/bg-1.jpg" alt="Failed To Load Image.."></a>
                    <a class="image-links-messages" href=""><img src="../../resources/images/bg-1.jpg" alt="Failed To Load Image.."></a>
                    <a class="image-links-messages" href=""><img src="../../resources/images/bg-1.jpg" alt="Failed To Load Image.."></a> -->
                </div>
                <hr style="margin-top: 20px;background-color: rgba(0,0,0,.2);">
                <h5 style="margin-top: 10px;" class="chat-info-sidebar-list-heading">Files
                    <i class="more_btn_side_heading_Chats" data-feather="chevron-down"></i>
                </h5>
                <ul class="chat-sidebar-shared-files">
                    <?php
                    $reciverId = $SelectTargetedUser['user_id'];
                    $SelectAllPhotos = mysqli_query($connection, "SELECT * FROM `messages` WHERE (`message_to`='$SelfUserID' AND `message_by`='$reciverId' OR `message_to`='$reciverId' AND `message_by`='$SelfUserID') AND `type`='FILE' ORDER BY `id` DESC");
                    if (mysqli_num_rows($SelectAllPhotos) > 0) {
                        while ($FetchedData = mysqli_fetch_assoc($SelectAllPhotos)) {
                            $FileDest = $FetchedData['file_id'];
                            $SelectFile = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `media` WHERE `file_destination`='$FileDest'"));
                    ?>
                            <a href="../../resources/uploads/files/<?php echo $SelectFile['file_destination']; ?>" target="_blank">
                                <li class="list-item-chat-shared-file">
                                    <div class="file-icon-shred-files">
                                        <i class="shared-files-icons" data-feather="video"></i>
                                    </div>
                                    <div class="shared-files-details">
                                        <span class="File-name-shared-files">
                                            <?php echo $SelectFile['name']; ?>
                                        </span>
                                        <span class="shared-file-time-details">
                                            <?php echo $SelectFile['created_date']; ?>
                                        </span>
                                    </div>
                                    <span class="shared-file-size">
                                        <?php echo $SelectFile['File_Size']; ?>
                                    </span>
                                </li>
                            </a>
                    <?php
                        }
                    } else {
                        echo "No media shared yet";
                    }
                    ?>


                    <!-- <li class="list-item-chat-shared-file">
                        <div class="file-icon-shred-files">
                            <i class="shared-files-icons" data-feather="file-text"></i>
                        </div>
                        <div class="shared-files-details">
                            <span class="File-name-shared-files">
                                Results.pdf
                            </span>
                            <span class="shared-file-time-details">
                                19 Jun, 2022 18:31 PM
                            </span>
                        </div>
                        <span class="shared-file-size">
                            123 kb
                        </span>
                    </li>
                    <li class="list-item-chat-shared-file">
                        <div class="file-icon-shred-files">
                            <i class="shared-files-icons" data-feather="folder"></i>
                        </div>
                        <div class="shared-files-details">
                            <span class="File-name-shared-files">
                                Project.zip
                            </span>
                            <span class="shared-file-time-details">
                                14 May, 2022 21:11 PM
                            </span>
                        </div>
                        <span class="shared-file-size">
                            123.4 MB
                        </span>
                    </li>
                    <li class="list-item-chat-shared-file">
                        <div class="file-icon-shred-files">
                            <i class="shared-files-icons" data-feather="music"></i>
                        </div>
                        <div class="shared-files-details">
                            <span class="File-name-shared-files">
                                Belieiver.mp3
                            </span>
                            <span class="shared-file-time-details">
                                11 Apr, 2022 09:21 AM
                            </span>
                        </div>
                        <span class="shared-file-size">
                            123 kb
                        </span>
                    </li>
                    <li class="list-item-chat-shared-file">
                        <div class="file-icon-shred-files">
                            <i class="shared-files-icons" data-feather="file-text"></i>
                        </div>
                        <div class="shared-files-details">
                            <span class="File-name-shared-files">
                                Passwords.txt
                            </span>
                            <span class="shared-file-time-details">
                                10 Dec, 2021 02:31 AM
                            </span>
                        </div>
                        <span class="shared-file-size">
                            123 kb
                        </span>
                    </li>
                    <li class="list-item-chat-shared-file">
                        <div class="file-icon-shred-files">
                            <i class="shared-files-icons" data-feather="file-text"></i>
                        </div>
                        <div class="shared-files-details">
                            <span class="File-name-shared-files">
                                Passwords.txt
                            </span>
                            <span class="shared-file-time-details">
                                10 Dec, 2021 02:31 AM
                            </span>
                        </div>
                        <span class="shared-file-size">
                            123 kb
                        </span>
                    </li>
                    <li class="list-item-chat-shared-file">
                        <div class="file-icon-shred-files">
                            <i class="shared-files-icons" data-feather="file-text"></i>
                        </div>
                        <div class="shared-files-details">
                            <span class="File-name-shared-files">
                                Passwords.txt
                            </span>
                            <span class="shared-file-time-details">
                                10 Dec, 2021 02:31 AM
                            </span>
                        </div>
                        <span class="shared-file-size">
                            123 kb
                        </span>
                    </li> -->
                </ul>
            </div>

        </div>
    </div>
</body>

</html>
<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
    $Error_Base_Url = '../error/';
    $Error_Location = 'location: ' . $Error_Base_Url . '403/';
    header($Error_Location);
}
?>
<style>
    .desktop-footer-container {
        width: 100%;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        color: #333;
    }

    .mobile-footer-container {
        padding: 10px;
        width: 100%;
        display: none;
        align-items: center;
        justify-content: space-around;
    }

    .profile-footer-image {
        width: 30px;
        height: 30px;
        border-radius: 4px;
    }

    .footer-icons-navigator {
        stroke: #333;
    }

    .filled-icons-footer {
        fill: #333;
    }

    @media screen and (max-width: 890px) {
        .icon-holder-header {
            display: none;
        }

        .icon-holder-header:nth-child(4) {
            display: flex;
        }

        .notify-text::after {
            top: -5px;
        }

        .desktop-footer-container {
            display: none;
        }

        .mobile-footer-container {
            display: flex;
        }
    }
</style>
<div class="desktop-footer-container">
    Copyright &copy; 2022. All Rights Reserved
</div>
<div class="mobile-footer-container">
    <a href="<?php echo $Header_Base_Url; ?>" class="footer-icon-holder">
        <i class="footer-icons-navigator" data-feather="home"></i>
    </a>
    <a href="<?php echo $Header_Base_Url; ?>explore/" class="footer-icon-holder">
        <i class="footer-icons-navigator" data-feather="search"></i>
    </a>
    <a href="<?php echo $Header_Base_Url; ?>clubs/" class="footer-icon-holder">
        <i class="footer-icons-navigator  filled-icons-footer" data-feather="users"></i>
    </a>
    <?php
    if ($UnseenMessageCount > 0) {
    ?>
        <a class="footer-icon-holder notify-text notification-open-btn-mobile" data-text="<?php echo $UnseenMessageCount; ?>">
            <i class="footer-icons-navigator" data-feather="bell"></i>
        </a>
    <?php
    } else {
    ?>
        <a class="footer-icon-holder notification-open-btn-mobile" data-text="4">
            <i class="footer-icons-navigator" data-feather="bell"></i>
        </a>
    <?php
    }
    ?>

    <a href="<?php echo $Header_Base_Url; ?>update/" class="footer-icon-holder">
        <img class="footer-icons-navigator profile-footer-image" src="<?php echo $Header_Base_Url; ?>resources/uploads/profiles/<?php echo $HeaderProfileImg; ?>" alt="Profile Image">
    </a>
</div>
<script>
    const Notification_open_btn_mobile = document.querySelector(".notification-open-btn-mobile");
    const Notification_box = document.querySelector(".main-notification-box");
    const Notification_open_btn = document.querySelector(".notification-open-btn");
    const Notification_close_btn = document.querySelector(".notification-close-btn");
    const NotificationHolder = document.querySelector(".Request-notification-holder");
    Notification_open_btn.onclick = () => {
        OpenNotificationBox();
    }
    Notification_open_btn_mobile.onclick = () => {
        OpenNotificationBox();
    }
    Notification_close_btn.onclick = () => {
        Notification_box.style.display = "none";
    }
    const OpenNotificationBox = () => {
        OpenNotifyLoader();
        Notification_box.style.display = "block";
        let secID = "WGJBVSJV_FWKEHF";
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $Header_Base_Url; ?>components/controllers/FetchNotications.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    CloseNotifyLoader();
                    SetNullNotifications();
                    NotificationHolder.innerHTML = xhr.response;
                    feather.replace();
                }
            }
        };
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("ERROR_CODE_SECURITYKEY=" + "<?php echo $Header_Base_Url; ?>");
    }
    const OpenNotifyLoader = () => {
        document.querySelector(".notification-loader").style.display = "block";
    }
    const CloseNotifyLoader = () => {
        document.querySelector(".notification-loader").style.display = "none";
    }
    setInterval(() => {
        UpdateNotifications();
        UpdateMessages();
    }, 240000);
    const NotificationBellDesktop = document.querySelector(".notification-open-btn");
    const NotificationBellMobile = document.querySelector(".notification-open-btn-mobile");
    const SetNotifications = (Count) => {
        NotificationBellDesktop.classList.add('notify-text');
        NotificationBellMobile.classList.add('notify-text');
        NotificationBellDesktop.setAttribute('data-text', Count);
        NotificationBellMobile.setAttribute('data-text', Count);
    }
    const SetNullNotifications = () => {
        NotificationBellDesktop.classList.remove('notify-text');
        NotificationBellMobile.classList.remove('notify-text');
    }
    const messages_btn = document.querySelector(".messages-btn");
    const SetMessages = (Count) => {
        messages_btn.classList.add('notify-text');
        messages_btn.setAttribute('data-text', Count);
    }
    const SetNullMessages = () => {
        messages_btn.classList.remove('notify-text');
    }
    const UpdateMessages = () => {
        let secID = "WGJBVSJV_FWKEHF";
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $Header_Base_Url; ?>components/controllers/CountMessages.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.response);
                    eval(xhr.response);
                    feather.replace();
                }
            }
        };
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("ERROR_CODE_SECURITYKEY=" + "<?php echo $Header_Base_Url; ?>");
    }
    const UpdateNotifications = () => {
        let secID = "WGJBVSJV_FWKEHF";
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $Header_Base_Url; ?>components/controllers/CountNotifications.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    eval(xhr.response);
                    feather.replace();
                }
            }
        };
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("ERROR_CODE_SECURITYKEY=" + "<?php echo $Header_Base_Url; ?>");
    }
    const AcceptRequest = (id) => {
        OpenNotifyLoader();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $Header_Base_Url; ?>modules/AcceptRequest.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    if (xhr.response === "DONE" && xhr.response != "ERROR") {
                        CloseNotifyLoader();
                        RemoveFrontendNotification('NotificationID' + id);
                    }
                }
            }
        };
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("ReferenceId=" + id);
    }
    const DeleteRequest = (id) => {
        OpenNotifyLoader();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $Header_Base_Url; ?>modules/RejectRequest.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.response === "DONE" && xhr.response != "ERROR") {
                    CloseNotifyLoader();
                    RemoveFrontendNotification('NotificationID' + id);
                }
            }
        };
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("ReferenceId=" + id);
    }
    const RemoveFrontendNotification = (id) => {
        document.getElementById(id).remove();
        if (NotificationHolder.innerHTML === "") {
            NotificationHolder.innerHTML = '<div class="notification-content-holder">No new notifications</div>';
        }
    }
</script>
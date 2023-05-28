<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
?>
    <h1>You should not have access to this page.</h1>
<?php
} else {
?>
<style>
    .profile-info-holder{
        width: 100%;
        height: auto;
        background-color: #fff;
        border-radius: 5px;
    }
    .cover-image-home{
        width: 100%;
        height: 80px;
        border-radius: 5px;
    }
    .profile-image-home{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-top: -50px;
        display: block;
        margin-left: auto;
        background-color: #333;
        margin-right: auto;
    }
    .user-name-home-profile{
        text-align: center;
        color: #333;
        padding: 4px;
        padding-bottom: 0px;
    }
    .username-profile-home{
        font-size: 12px;
        display: block;
        text-align: center;
        color: rgba(0,0,0,.6);
    }
    .profile-desc-home{
        color: #333;
        font-size: 14px;
        margin-top: 4px;
        display: block;
        text-align: center;
    }
    .edit-profile-btn-home{
        width: 170px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 6px;
        margin-bottom: 12px;
        font-size: 14px;
        margin-left: auto;
        margin-right: auto;
        color: #fff;
        background-color: var(--base-purple);
        padding: 10px;
        border-radius: 2px;
        transition: all 200ms ease;
    }
    .edit-profile-btn-home:hover{
        opacity: .7;
    }
</style>
<div class="profile-info-holder">
    <img src="resources/uploads/cover/<?php echo SetProfileCovers($SelfUserDataArray['user_id']); ?>" class="cover-image-home object-images-cover-center" alt="Cover Image">
    <img src="resources/uploads/profiles/<?php echo UserProfileImage($SelfUserDataArray['user_id']); ?>" class="profile-image-home object-images-cover-center" alt="Profile Image">
    <h3 class="user-name-home-profile"><?php echo $SelfUserDataArray['name']; ?></h3>
    <span class="username-profile-home">@<?php echo $SelfUserDataArray['username']; ?></span>
    <span class="profile-desc-home">
        <?php echo $SelfUserDataArray['about']; ?>
    </span>
    <a href="update/" class="edit-profile-btn-home">Edit Profile</a>
</div>
<?php
}
?>
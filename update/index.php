<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include_once('../modules/connection.php');
define('Opiverse_Pages_Auth_Constant', TRUE);
include_once('../components/controllers/SelectUser.php');
if (!isset($_SESSION['user_id'])) {
    header("location: ../");
} else {
    $SelfUserId = $_SESSION['user_id'];
    $SelfUserDataFetched = SelectUser($SelfUserId);
    $verified = $SelfUserDataFetched['verified'];
    if ($verified === "NO") {
        $_SESSION['UserVerfied'] = 0;
        header("location: ../signup/");
    } else {
        $Header_Base_Url = "../";
        $Error_Base_Url = "../";
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Edit Profile | Cultcheck</title>
            <?php include('../components/links.php'); ?>
            <link rel="stylesheet" href="style.css" type="text/css" />
        </head>

        <body>
            <?php include('../partials/header.php'); ?>
            <div class="main-container-edit-profile">
                <div class="body-content-container">
                    <h3 class="profile-setting-heading">Profile Settings</h3>
                    <form class="form-edit-profile">
                        <div class="outer-input-container">
                            <div class="input-container-with-label">
                                <label for="name"><b>Name : </b></label>
                                <input name="name" type="text" id="name" value="<?php echo $SelfUserDataFetched['name']; ?>">
                            </div>
                            <div class="input-container-with-label">
                                <label for="username"><b>Username : </b></label>
                                <input name="username" type="text" id="username" value="<?php echo $SelfUserDataFetched['username']; ?>">
                            </div>
                            <div class="input-container-with-label">
                                <label for="name"><b>About : </b></label>
                                <input name="about" type="text" id="name" value="<?php echo $SelfUserDataFetched['about']; ?>">
                            </div>
                            <div class="input-container-with-label">
                                <label for="name"><b>Email : </b></label>
                                <input type="text" id="name" disabled value="<?php echo $SelfUserDataFetched['email']; ?>">
                            </div>
                            <div class="input-container-with-label">
                                <label for="name"><b>Joined on : </b></label>
                                <input type="text" id="name" disabled value="<?php echo $SelfUserDataFetched['joined']; ?>">
                            </div>
                        </div>
                        <div id="refresher-div" class="preview-container-form">
                            <div id="profile-cover-holder" class="profile-cover-img">

                                <label for="cover">
                                    <i class="edit-btn-cover-img" data-feather="edit"></i>
                                </label>
                                <input name="CoverPhoto" accept="image/*" hidden type="file" id="cover">
                            </div>
                            <?php
                            if ($SelfUserDataFetched['ProfileImg'] === "") {
                                $ProfilePic = "sample.png";
                            } else {
                                $ProfilePic = $SelfUserDataFetched['ProfileImg'];
                            }
                            ?>
                            <img src="../resources/uploads/profiles/<?php echo $ProfilePic; ?>" alt="Failed To Load Image.." class="user-profile-pic">
                            <label class="user-profile-pic-btn" for="user-profile-pic-btn">
                                <i data-feather="edit" class="profile-image-changer-btn"></i>
                            </label>
                            <input name="profile-photo-input" accept="image/*" hidden type="file" id="user-profile-pic-btn">
                            <h3 class="user-name-profile-preview"><?php echo $SelfUserDataFetched['name']; ?></h3>
                            <span class="username-profile-preview"><?php echo $SelfUserDataFetched['username']; ?></span>
                            <span class="profile-about-preiviw"><?php echo $SelfUserDataFetched['about']; ?>.</span>
                            <div class="profile-user-location-holder">
                                <i class="map-icon-profile-p" data-feather="map-pin"></i>
                                [ Dehradun, India ]
                            </div>
                            <div class="edit-profile-loader"></div>
                            <span class="edit-profile-alert-label"></span>
                            <div class="save-changes-btn">Save changes</div>
                            <div onclick="ChangeLocation('../logout/')" class="logout-btn">Logout</div>
                        </div>
                    </form>
                </div>
            </div>
            <?php include('../partials/footer.php'); ?>
            <script src="script.js" type="text/javascript"></script>
            <script>
                <?php
                $random = rand(1, 6);
                $newRandomize = $random . ".jpg";
                if ($SelfUserDataFetched['CoverImg'] === "") {
                    $CreatedPath = $newRandomize;
                } else {
                    $CreatedPath = $SelfUserDataFetched['CoverImg'];
                }
                ?>
                const ProfileCoverSrc = "<?php echo $CreatedPath; ?>";
                let newPath = "url(../resources/uploads/cover/" + ProfileCoverSrc + ")";
                document.getElementById("profile-cover-holder").style.backgroundImage = newPath;
            </script>
        </body>

        </html>
<?php
        $_SESSION['UserVerfied'] = 1;
    }
}
?>
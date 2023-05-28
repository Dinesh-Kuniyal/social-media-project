<?php
session_start();
define('Opiverse_Const_Private', TRUE);
include('../modules/connection.php');
if (isset($_GET['topic_id']) && isset($_GET['club_name'])) {
    $club_name = $_GET['club_name'];
    $topic_id = $_GET['topic_id'];
    $InnerFrameUrl = "start/?club_name=" . $club_name . "&topic_id=" . $topic_id;
} elseif (!isset($_GET['topic_id']) && isset($_GET['club_name'])) {
    $club_name = $_GET['club_name'];
    $InnerFrameUrl = "start/?club_name=" . $club_name;
} else {
    // Default Club [ Technology (unique-name: {technology}) ]
    $InnerFrameUrl = "start/?club_name=technology";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
    <?php include('../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php include('../components/loader.php'); ?>
    <div class="main-app-container-clubs">
        <div class="left-sidebar-clubs-list">
            <h1 class="main-clubs-heading-page">
                <i onclick="GoToHome()" class="GotoToHomeBtnClubs" data-feather="arrow-left"></i>
                Clubs
            </h1>
            <div class="search-container-sidebar">
                <i class="search-icon-sidebar-clubs" data-feather="search"></i>
                <input type="text" onkeyup="SearchClubs()" id="myInput" placeholder="Search..">
            </div>
            <span class="club-sidebar-sub-headings">
                <!-- Joined (5/5) -->
            </span>
            <ul class="joined-clubs-ul" id="myUL">

                <?php
                $SelectAllClubs = mysqli_query($connection, "SELECT clubs.*, COUNT(`articles`.`id`) as articles_count FROM `clubs` LEFT JOIN `articles` ON `clubs`.`id`=`articles`.`club_id` GROUP BY `clubs`.`id`");
                while ($LoopedClubData = mysqli_fetch_assoc($SelectAllClubs)) {
                    $LoopedUrl = 'start/?club_name=' . $LoopedClubData['unique_name'];
                ?>
                    <li onclick="ToggleClubsSidebar(this); ChangeClub('<?php echo $LoopedUrl ?>')" class="joined-clubs-list">
                        <img src="../resources/uploads/clubs/<?php echo $LoopedClubData['logo']; ?>" alt="Failed To Load Image..">
                        <div class="joined-clubs-details">
                            <a class="clun-name-joined-clubs">
                                <?php echo $LoopedClubData['name']; ?>
                            </a>
                            <span class="members-count-joined-clubs">
                                <?php echo $LoopedClubData['articles_count'] ?> articles
                            </span>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
            <script>
                function SearchClubs() {
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myUL");
                    li = ul.getElementsByTagName("li");
                    for (i = 0; i < li.length; i++) {
                        a = li[i].getElementsByTagName("a")[0];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }
            </script>
        </div>

        <!-- // Main App Iframe Container  -->
        <div class="main-app-clubs-iframe-container">
            <iframe class="main-ifame-club-page" src="<?php echo $InnerFrameUrl; ?>" frameborder="0"></iframe>
        </div>

    </div>
    <script src="script.js" type="text/javascript"></script>
    <script type="text/javascript">
        const iframe = document.querySelector(".main-ifame-club-page");
        const ChangeClub = (url) => {
            iframe.setAttribute('src', url);
        }
    </script>
</body>

</html>
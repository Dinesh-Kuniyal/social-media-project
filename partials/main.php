<?php
if (!defined('Opiverse_Pages_Auth_Constant')) {
?>
    <h1>You should not have access to this page.</h1>
<?php
} else {
?>
    <style>
        .main-center-container {
            width: 100%;
            height: 100%;
            display: flex;
            padding: 10px;
        }

        .left-sidebar-container {
            width: clamp(320px, 100%, 320px);
            display: flex;
            gap: 8px;
            flex-flow: column;
        }
        .middle-app-container{
            flex: 1;
            overflow-y: scroll;
            padding: 0px 10px;
        }
        .middle-app-container:nth-child(1){
            margin-top: 0px !important;
        }
        .middle-app-container::-webkit-scrollbar{
            display: none;
        }
        .right-sidebar-container-outer{
            width: clamp(320px, 100%, 320px);
            display: flex;
            gap: 8px;
            flex-flow: column;
            background-color: #fff;
        }
        @media screen and (max-width: 700px){
            .right-sidebar-container-outer{
                display: none;
            }
            .main-center-container{
                padding: 5px 0px;
                padding-top: 0px;
            }
        }
        @media screen and (max-width: 1020px){
            .left-sidebar-container{
                display: none;
            }
        }
    </style>
    <div class="main-center-container">
        <div class="left-sidebar-container">
            <?php include('components/home/UserProfile.php'); ?>
            <?php include('components/home/ClubSuggestion.php'); ?>
        </div>
        <div class="middle-app-container">
            <?php include('components/home/Articles.php'); ?>
        </div>
        <div class="right-sidebar-container-outer">
            <?php include('components/home/PopularTopics.php'); ?>
        </div>
    </div>
<?php
}
?>
<?php
session_start();
define('Opiverse_Pages_Auth_Constant', TRUE);
$Header_Base_Url = "";
$Error_Base_Url = "";
if (isset($_SESSION['user_id'])) {
    include('components/main.php');
} else {
    include('components/home.php');
}
?>
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$Servername = "localhost";
$Username = "root";
$Password = "";
$Database = "opiverse";
$connection = mysqli_connect($Servername, $Username, $Password, $Database)
 or die("Connection failed due to : ". mysqli_error($connection));
 if(!defined('Opiverse_Const_Private')){
     die('<h1>You should not have permission to access this page.</h1>');
 }
?>
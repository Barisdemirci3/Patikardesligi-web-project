<?php 
session_start();
if(!$_SESSION["uye_nick"]){
    header("Location: login.php");
}else{
ob_start();
session_destroy();
ob_clean();
header("Location: index.php"); }
?>
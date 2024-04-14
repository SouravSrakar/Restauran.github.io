<?php 
session_start();
unset($_SESSION['ses_user']);
unset($_SESSION['Ses_user']);
session_destroy();
header("location: index.php");
?>

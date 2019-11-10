<?php
session_start();
$_SESSION['logged'] = 0;
unset($_SESSION['userid']);
unset($_SESSION['logged']);
header('location:index.php');
?>

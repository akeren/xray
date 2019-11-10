<?php
$dbname="digitization"; //database Name
$dbhost="localhost"; //database Host
$user="root"; //Username For Admin
$password="";//Password Word For Admin
$db= mysqli_connect($dbhost, $user, $password, $dbname) or die(mysqli_connect_error());
mysqli_select_db($db, $dbname);
?>
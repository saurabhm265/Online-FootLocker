<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbdatabase = "go4shop";
$config_basedir = "http://localhost/go4shop/";
$config_sitename = "Foot Locker";
$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase) or die(mysqli_error($db));
?>

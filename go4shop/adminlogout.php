<?php
session_start();
require("config.php");
session_unset("SESS_ADMINLOGGEDIN");
session_destroy();
header("Location: " . $config_basedir);
?>

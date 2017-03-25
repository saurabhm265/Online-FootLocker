</div>
<div id="footer">
<?php
echo "<p><i> <center>All content on this site is &copy;"
. $config_sitename . "</center> </i></p>";
if(@$_SESSION['SESS_ADMINLOGGEDIN'] == 1)
{
echo "[<a href='" . $config_basedir . "adminorders.php'>admin</a>][<a href='". $config_basedir. "adminlogout.php'>admin logout</a>]";
}
?>
</div>
</div>
</body>
</html>


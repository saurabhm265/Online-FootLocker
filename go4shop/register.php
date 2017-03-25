<?php
session_start();
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN']) == TRUE) {

}

if(isset($_POST['submit']))
{
$loginsql = "INSERT INTO `go4shop`.`logins` (`id`, `customer_id`, `username`, `password`)
VALUES (NULL, '3', '" . $_POST['userBox']. "', '" . sha1($_POST['passBox']) . "');";
mysqli_query($db,$loginsql);
header("Location: " . $config_basedir.'login.php');
}

else {
require("header.php");
?>
<h1>Customer Registration</h1>
 
Sign up. It's free and always will be!!! 
<br>
<br>
<br>
<?php
if(isset($_GET['submit'])) {
echo "<strong>Y</strong>";
}
?>
<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<table>
<tbody>
<tr>
<td>Username</td>
<td><input type="textbox" name="userBox" size="50" /></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="passBox" size="50" /></td>
</tr>
<tr>
<td>Address</td>
<td><input type="textbox" name="addBox" size="50" /></td>
</tr>
<tr>
<td>Email Address</td>
<td><input type="textbox" name="eBox" size="50" /></td>
</tr>
<tr>
<td></td>
<td><center><input type="submit" name="submit" value="Register"  size="50"/></center></td>
</tr>
</tbody>
</table>
</form>
 
<?php
}
require("footer.php");
?>
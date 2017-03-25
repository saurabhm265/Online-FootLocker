<?php
session_start();
require('config.php');
require("header.php");
require("functions.php");
echo "<h1>Your shopping cart</h1>";
showcart($db);
if(isset($_SESSION['SESS_ORDERNUM'])) {
	$sess_ordernum=$_SESSION['SESS_ORDERNUM'];
$sql = "SELECT * FROM orderitems WHERE order_id =$sess_ordernum";
$result = mysqli_query($db,$sql) or die(mysqli_error($db));
$numrows = mysqli_num_rows($result);
if($numrows >= 1) {
echo "<h2><a href='checkout-address.php'>Go to the checkout</a></h2>";
}
}
require("footer.php");
?>

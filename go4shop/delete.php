<?php
require("config.php");
require('header.php');
$itemsql = "SELECT * FROM orderitems WHERE id = ". $_GET['id'] . ";";
$itemres = mysqli_query($db,$itemsql) or die(mysqli_error($db));
$numrows = mysqli_num_rows($itemres);
if($numrows == 0) {
header("Location: showcart.php");
}
$itemrow = mysqli_fetch_assoc($itemres);
$prodsql = "SELECT price FROM products WHERE id = " . $itemrow['product_id'] . ";";
$prodres = mysqli_query($db,$prodsql)or die(mysqli_error($db));;
$prodrow = mysqli_fetch_assoc($prodres); 
$sql = "DELETE FROM orderitems WHERE id = " . $_GET['id'];
$del=mysqli_query($db,$sql)or die(mysqli_error($db));;
if($del){
	header("Location: showcart.php");
}
require('footer.php');
?>
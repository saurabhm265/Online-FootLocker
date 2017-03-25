<?php
session_start();
require("config.php");
require("functions.php");
$prodsql = "SELECT * FROM products WHERE id = " . $_GET['id'] . ";";
$prodres = mysqli_query($db,$prodsql);
$numrows = mysqli_num_rows($prodres);
$prodrow = mysqli_fetch_assoc($prodres);
if($numrows == 0)
{
header("Location: " . $config_basedir);
}
else
{
if(isset($_POST['submit']))
{
if(isset($_SESSION['SESS_ORDERNUM']))
{
$itemsql = "INSERT INTO orderitems(order_id,product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", ". $_GET['id'] . ", ". $_POST['amountBox'] . ")";
mysqli_query($db,$itemsql) or die(mysqli_error($db));
}
else
{
if(isset($_SESSION['SESS_LOGGEDIN']))
{
$sql = "INSERT INTO orders(customer_id,registered, date) VALUES(". $_SESSION['SESS_USERID'] . ", 1, NOW())";
mysqli_query($db,$sql) or die(mysqli_error($db));
$_SESSION['SESS_ORDERNUM'] = mysqli_insert_id($db);
$itemsql = "INSERT INTO orderitems(order_id, product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM']. ", " . $_GET['id'] . ", ". $_POST['amountBox'] . ")";
mysqli_query($db,$itemsql) or die(mysqli_error($db));
}
else
{
$sql = "INSERT INTO orders(registered,date, session) VALUES(". "0, NOW(), '" . session_id() . "')";
mysqli_query($db,$sql) or die(mysqli_error($db));
$_SESSION['SESS_ORDERNUM'] = mysqli_insert_id($db);
$itemsql = "INSERT INTO orderitems(order_id, product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", " . $_GET['id'] . ", ". $_POST['amountBox'] . ")";
mysqli_query($db,$itemsql) or die(mysqli_error($db));
}
}
$totalprice = $prodrow['price'] * $_POST['amountBox'] ;
$updsql = "UPDATE orders SET total = total + ". $totalprice . " WHERE id = ". $_SESSION['SESS_ORDERNUM'] . ";";
mysqli_query($db,$updsql) or die(mysqli_error($db));
header("Location: " . $config_basedir . "showcart.php");
}
else
{
require("header.php");
echo "<form action='addtobasket.php?id=". $_GET['id'] . "' method='POST'>";
echo "<table cellpadding='10'>";
echo "<tr>";
if(empty($prodrow['image'])) {
echo "<td><imgsrc='productimages/shoe1.jpg' width='50' alt='". $prodrow['name'] . "'></td>";
}
else {
echo "<td>
<img src='productimages/" . $prodrow['image']. "' width='50' alt='" . $prodrow['name']. "'></td>";
}
echo "<td>" . $prodrow['name'] . "</td>";
echo "<td>Select Quantity <select name='amountBox'>";
for($i=1;$i<=100;$i++)
{
echo "<option>" . $i . "</option>";
}
echo "</select></td>";
echo "<td><strong>&pound;". sprintf('%.2f', $prodrow['price']) . "</strong></td>";
echo "<td><input type='submit' name='submit' value='Add to basket'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
}
}
require("footer.php");
?>

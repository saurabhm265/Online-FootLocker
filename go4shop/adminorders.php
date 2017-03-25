<?php
session_start();
require("config.php");
require("functions.php");
if(!isset($_SESSION['SESS_ADMINLOGGEDIN'])) {
header("Location: " . $config_basedir);
}
if(isset($_GET['func']) == TRUE) {

$funcsql = "UPDATE orders SET status = 10 WHERE id = " . $_GET['id'];
mysqli_query($db,$funcsql);
header("Location: " . $config_basedir . "adminorders.php");
}
else {
require("header.php");
echo "<h1>Outstanding orders</h1>";
$orderssql = "SELECT * FROM orders WHERE status = 2";
$ordersres = mysqli_query($db,$orderssql);
$numrows = mysqli_num_rows($ordersres);
if($numrows == 0)
{
echo "<strong>No orders</strong>";
}
else
{
echo "<table cellspacing=10>";
while($row = mysqli_fetch_assoc($ordersres))
{
echo "<tr>";
echo "<td>[<a href='adminorderdetails.php?id=" . $row['id']. "'>View</a>]</td>";
echo "<td>". date("D jS F Y g.iA", strtotime($row['date'])). "</td>";
echo "<td>";
if($row['registered'] == 1)
{
echo "Registered Customer";
}
else
{
echo "Non-Registered Customer";
}
echo "</td>";
echo "<td>&pound;" . sprintf('%.2f',
$row['total']) . "</td>";
echo "<td>";
if($row['payment_type'] == 1)
{
echo "PayPal";
}
else
{
echo "Cheque";
}
echo "</td>";
echo "<td><a href='adminorders.php?func=conf&id=" . $row['id']. "'>Confirm Payment</a></td>";
echo "</tr>";
}
echo "</table>";
}
}
require("footer.php");
?>

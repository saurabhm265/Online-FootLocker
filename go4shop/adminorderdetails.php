<?php
session_start();
require("config.php");
require("functions.php");
if(isset($_SESSION['SESS_ADMINLOGGEDIN']) == FALSE) {
header("Location: " . $basedir);
}
$validid = pf_validate_number($_GET['id'],"redirect", $config_basedir . "adminorders.php");
require("header.php");
echo "<h1>Order Details</h1>";
echo "<a href='adminorders.php'><— go back to the main orders screen</a>";
$ordsql = "SELECT * from orders WHERE id = " . $validid;
$ordres = mysqli_query($db,$ordsql);
$ordrow = mysqli_fetch_assoc($ordres);
echo "<table cellpadding=10>";
echo "<tr><td><strong>Order Number</strong></td><td>" . $ordrow['id'] . "</td>";
echo "<tr><td><strong>Date of order</strong></td><td>" . date('D jS F Y g.iA',strtotime($ordrow['date'])) . "</td>";
echo "<tr><td><strong>Payment Type</strong></td><td>";
if($ordrow['payment_type'] == 1)
{
echo "PayPal";
}
else
{
echo "Cheque";
}
echo "</td>";
echo "</table>";
if($ordrow['delivery_add_id'] == 0)
{
$addsql = "SELECT * FROM customers WHERE id = " . $ordrow['customer_id'];
$addres = mysqli_query($db,$addsql);
}
else
{
$addsql = "SELECT * FROM delivery_addresses WHERE id = " . $ordrow['delivery_add_id'];
$addres = mysqli_query($db,$addsql);
}
$addrow = mysqli_fetch_assoc($addres);
echo "<table cellpadding=10>";
echo "<tr>";
echo "<td><strong>Address</strong></td>";
echo "<td>" . $addrow['forname'] . " ". $addrow['surname'] . "<br>";
echo $addrow['add1'] . "<br>";
echo $addrow['add2'] . "<br>";
echo $addrow['add3'] . "<br>";
echo $addrow['postcode'] . "<br>";
echo "<br>";
if($ordrow['delivery_add_id'] == 0)
{
echo "<i>Address from member account</i>";
}
else
{
echo "<i>Different delivery address</i>";
}
echo "</td></tr>";
echo "<tr><td><strong>Phone</strong></td><td>". $addrow['phone'] . "</td></tr>";
echo "<tr><td><strong>Email</strong></td><td><a href='mailto:" . $addrow['email'] . "'>". $addrow['email'] . "</a></td></tr>";
echo "</table>";
$itemssql = "SELECT products.*, orderitems.*,orderitems.id AS itemid FROM products, orderitems WHERE orderitems.product_id = products.id AND order_id = " . $validid;
$itemsres = mysqli_query($db,$itemssql);
$itemnumrows = mysqli_num_rows($itemsres);
echo "<h1>Products Purchased</h1>";
echo "<table cellpadding=10>";
echo "<th></th>";
echo "<th>Product</th>";
echo "<th>Quantity</th>";
echo "<th>Price</th>";
echo "<th>Total</th>";
while($itemsrow = mysqli_fetch_assoc($itemsres))
{
$quantitytotal = $itemsrow['price']* $itemsrow['quantity'];
echo "<tr>";
if(empty($itemsrow['image'])) {
echo "<td><img src='./productimages/dummy.jpg' width='50' alt='". $itemsrow['name'] . "'></td>";
}
else {
echo "<td><img src='./productimages/". $itemsrow['image'] . "' width='50' alt='". $itemsrow['name'] . "'></td>";
}
echo "<td>" . $itemsrow['name'] . "</td>";
echo "<td>" . $itemsrow['quantity'] . " x </td>";
echo "<td><strong>&pound;" . sprintf('%.2f',$itemsrow['price']) . "</strong></td>";
echo "<td><strong>&pound;" . sprintf('%.2f',$quantitytotal) . "</strong></td>";
echo "</tr>";
@$total = $total + $quantitytotal;

}
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td>TOTAL</td>";
echo "<td><strong>&pound;" . sprintf('%.2f', $total). "</strong></td>";
echo "</tr>";
echo "</table>";
require("footer.php");
?>

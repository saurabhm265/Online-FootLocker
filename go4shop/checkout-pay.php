<?php
session_start();
require("config.php");
require("functions.php");

if(isset($_POST['paypalsubmit']))
{
$upsql = "UPDATE orders SET status = 2, payment_type = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$upres = mysqli_query($db,$upsql);
$itemssql = "SELECT total FROM orders WHERE id = " . $_SESSION['SESS_ORDERNUM'];
$itemsres = mysqli_query($db,$itemssql);
$row = mysqli_fetch_assoc($itemsres);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_ORDERNUM']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=you%40youraddress.com&item_name=". urlencode($config_sitename)
. "+Order&item_number=PROD" . $row['id']."&amount=" . urlencode(sprintf('%.2f',$row['total'])) . "&no_note=1&currency_code=USD&lc=US&submit.x=41&submit.y=15");
}
else if(isset($_POST['chequesubmit']))
{
$upsql = "UPDATE orders SET status = 2,payment_type = 2 WHERE id = ". $_SESSION['SESS_ORDERNUM'];
$upres = mysqli_query($db,$upsql);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_ORDERNUM']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
require("header.php");
?>
<h1>Paying by cheque</h1>
Please make your cheque payable to
<strong><?php echo $config_sitename; ?></strong>.
<p>
Send the cheque to:
<p>
<?php echo $config_sitename; ?><br>
22, This Place,<br>
This town,<br>
This county,<br>
FG43 F3D.<br>
<?php
}
else
{
require("header.php");
echo "<h1>Payment</h1>";
showcart($db);
?>





<h2>Select a payment method</h2>
<form action='checkout-pay.php' method='POST'>
<table cellspacing=10>
<tr>
<td><h3>PayPal</h3></td>
<td>
This site uses PayPal to accept
Switch/Visa/Mastercard cards. No PayPal account
is required - you simply fill in your credit
card details
and the correct payment will be taken from your account.
</td>
<td><input type="submit" name="paypalsubmit" value="Pay with PayPal"></td>
</tr>
<tr>
<td><h3>Cheque</h3></td>
<td>
If you would like to pay by cheque, you can post the cheque for the final amount to the office.
</td>
<td><input type="submit" name="chequesubmit" value="Pay by cheque"></td>
</tr>
</table>
</form>
<?php
}
require("footer.php");
?>

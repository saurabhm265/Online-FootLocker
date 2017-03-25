<?php
session_start();
if(isset($_SESSION['SESS_CHANGEID']) == TRUE)
{

session_regenerate_id();
}
require("config.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<head>
<title><?php echo $config_sitename; ?></title>

<link href="css/stylesheet.css" rel="stylesheet" type="text/css">
<link href="css/stylesheet.css" rel="stylesheet" type="text/css">



    <script type='text/javascript'
    src='include/jquery-1.3.2.min.js'>
    </script>
    <script type="text/javascript">
        function cycleImages(){
      var $active = $('#cycler .active');
      var $next = ($active.next().length > 0) ? $active.next() : $('#cycler img:first');
      $next.css('z-index',2);//move the next image up the pile
      $active.fadeOut(1500,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
          $next.css('z-index',3).addClass('active');//make the next image the top one
      });
    }

$(document).ready(function(){
// run every 7s
setInterval('cycleImages()', 3000);
})
</script>
<style>
#cycler{position:relative;}
#cycler img{position:absolute;z-index:1}
#cycler img.active{z-index:3}

</style>
</head>
<body>
<div id="header">
<h1><?php echo $config_sitename; ?> </h1>

</div>
<div id="menu" align="right">
<a href="<?php echo $config_basedir; ?>">Home</a> &nbsp;&nbsp;&nbsp;&nbsp;


<?php
if(isset($_SESSION['SESS_LOGGEDIN']))	{
echo "<a href='". $config_basedir . "logout.php' >Logout</a>  &nbsp;&nbsp;&nbsp;&nbsp;";	
}else{
echo "<a href='". $config_basedir . "login.php'>Login &nbsp;&nbsp;&nbsp;&nbsp;</a>";
}
?>
<a href="<?php echo $config_basedir;?>register.php">Registration</a> &nbsp;&nbsp;&nbsp;&nbsp;

<a href="<?php echo $config_basedir;?>showcart.php">View Basket/Checkout</a> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<?php
if(isset($_SESSION['SESS_ADMINLOGGEDIN']))	{
echo "<a href='". $config_basedir . "logout.php' >AdminLogout</a>  &nbsp;&nbsp;&nbsp;&nbsp;";	
}else{
echo "<a href='". $config_basedir . "adminlogin.php'>AdminLogin &nbsp;&nbsp;&nbsp;&nbsp;</a>";
}
?>
</div>
<div id="container">
<div id="bar">

<?php
require("bar.php");
//echo "<hr>";

//if(isset($_SESSION['SESS_LOGGEDIN']))	{
//echo "<a href='". $config_basedir . "logout.php'>Logout</a>";	
//}
//else{
//echo "<a href='". $config_basedir . "login.php'>Login</a>";
//}

?>

</div>
<div id="main" >

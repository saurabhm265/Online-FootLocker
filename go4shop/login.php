<?php
session_start();
require("config.php");
if (isset($_SESSION['SESS_LOGGEDIN'])) {
    header("Location: " . $config_basedir);
}
if (isset($_POST['submit'])) {
	echo "post_submit";
    $loginsql = " select * from logins where username = '" . $_POST['userBox'] . "' and password = '" . sha1($_POST['passBox']) . "'";
	$loginres=mysqli_query($db,$loginsql);  
     $numrows = mysqli_num_rows($loginres);
	 $loginrow = mysqli_fetch_assoc($loginres);
	 echo $numrows;
	
    if ($numrows == 1) 
	{
		echo "logged";
		$_SESSION['SESS_LOGGEDIN'] = 1;
		$_SESSION['SESS_LOGGEDID']=$loginrow['id'];
		$_SESSION['SESS_USERNAME'] = $loginrow['username'];
        $_SESSION['SESS_USERID'] = $loginrow['id'];
		$_SESSION['SESS_ORDERNUM'] = $orderrow['id'];
		
		header("Location: " . $config_basedir."index.php");
		
		
	}else{
		echo "not logged";
	}
		/*
	     echo "logged";
        $loginrow = mysqli_fetch_assoc($loginres);
        $_SESSION['SESS_LOGGEDIN'] = 1;
        $_SESSION['SESS_USERNAME'] = $loginrow['username'];
        $_SESSION['SESS_USERID'] = $loginrow['id'];
        $ordersql = "SELECT id FROM orders WHERE customer_id = " . $_SESSION['SESS_USERID'] . " AND status < 2";
        $orderres = mysqli_query($db, $ordersql);
        $orderrow = mysqli_fetch_assoc($orderres);
        $_SESSION['SESS_ORDERNUM'] = $orderrow['id'];
        header("Location: " . $config_basedir);
		} */
    
	/*else {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . "?error=1");
    }
	*/
} 

else {
    require("header.php");
    ?>
    <h1>Customer Login</h1>
    Please enter your username and password to log into the websites. If you do not have an account, you can get one for free by <a href="register.php">registering</a>.
    <p>
    <?php
    if (isset($_GET['error'])) {
        echo "<strong>Incorrect username/password</strong>";
    }
    ?>

    <form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="textbox" name="userBox">
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="passBox">
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Log in">
            </tr>
        </table>
    </form>
    <?php
}

require("footer.php");
?>

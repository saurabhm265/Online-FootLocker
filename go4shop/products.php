<?php
require("config.php");
require("functions.php");
require("header.php");
$prodcatsql = "SELECT * FROM products WHERE cat_id = " . $_GET['id'] . ";";
//$prodcatsql = "SELECT * FROM products WHERE cat_id = 1 and id=3;";
//$prodcatsql = "SELECT * FROM products WHERE cat_id = 2 and id=2;";
$prodcatres = mysqli_query($db,$prodcatsql);
$numrows = mysqli_num_rows($prodcatres);
if($numrows == 0)
{
echo "<h1>No products</h1>";
echo "There are no products in this category.";
}
else
{
	echo "<table cellpadding='100' align='center'>";
		while($prodrow = mysqli_fetch_assoc($prodcatres))
		{
			echo "<tr>";
				if(empty($prodrow['image'])) {
				echo "<td><img
				src='./productimages/shoe1.jpg' alt='". $prodrow['name'] . "'></td>";
				}
				
				else {
				echo "<td><img src='./productimages/" . $prodrow['image']. "' alt='". $prodrow['name'] . "'></td>";
				}
				
			echo "<td>";
			echo "<h2>" . $prodrow['name'] . "</h2>";
			echo "<p>" . $prodrow['description'];
			echo "<p><strong>OUR PRICE: &dollar;". sprintf('%.2f', $prodrow['price']) . "</strong>";
			echo "<p>[<a href='addtobasket.php?id=". $prodrow['id'] . "'>buy</a>]";
			echo "</td>";
			echo "</tr>";
			
		}
		
		
	echo "</table>";
}


require("footer.php");
?>

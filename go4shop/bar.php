<h1>Product Categories</h1>
<ul>
<?php
$catsql = "SELECT * FROM categories;";
$catres = mysqli_query($db,$catsql);
while($catrow = mysqli_fetch_assoc($catres))
{
echo "<li><b><a href='" . $config_basedir. "products.php?id=" . $catrow['id'] . "'>". $catrow['name'] . "</a></b></li> <br>";
}
?>


</ul>

<br>
<br>
   <div id="cycler">
	<img class="active" src="productimages/shoe1.jpg" alt="My image" />
	<img src="productimages/shoe2.jpg" alt="My image" />	
	<img src="productimages/shoe3.jpg" alt="My image" />	
	<img src="productimages/shoe4.jpg" alt="My image" />
	<img src="productimages/shoe5.jpg" alt="My image" />
	<img src="productimages/shoe6.jpg" alt="My image" />
</div>

<div id="search">

	<form>
	<b>Search: </b>
	<input type="text" name="searchBox" size="30" >
	<br>
	<center><input type="submit" name="submit" value="Submit"></center>
	</form>
	
	
</div>
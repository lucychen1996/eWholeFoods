<?php 
require 'usernavbar.php';
session_start();
require 'config.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit();
}
?>

<?php


$_username = $_SESSION["_username"];

$sql_show_products = 'select productID, item_name, CONCAT(\'$\',price,\'/\', unit) as price, image from products';
	
$result_show_products = $conn->query($sql_show_products);
if($result_show_products)
	{
		
		while($row = $result_show_products->fetch_assoc())
		{
		

			// $_SESSION['key_delete'] = $row['ID'];

			// TODO: later
			echo "<div class='gallery'> <img src='pictures/".$row['image']."' alt='strawberry'>";
			echo "<div class='description'<p>".$row['item_name']."</p>";
			echo "<p>".$row['price']."</p>";
			echo "<a href='selectItem.php?id=".$row['productID']."'>Add to cart</a>";
			echo "</div></div>";

		}

	}


?>

<?php

require 'footer.php'

?>



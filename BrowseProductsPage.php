<?php 

require 'usernavbar.php';

?>

<?php
session_start();
require 'config.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit();
}
	if (isset($_POST['search'])){
		$_keyword = $_POST["search"];
		$sql_show_products = "SELECT productID, item_name, CONCAT(current_stock_quantity, ' ', IF(unit = 'weight','lb','units')), CONCAT('$',price,'/',IF(unit = 'weight','lb','unit')) as price, image from products where item_name like '%$_keyword%'";

	}
	else{
		$category = $_POST['category'];
		if($category == 'All'){
			header("location: MainProductsPage.php?user=$_SESSION[_username]");
		}
		$sql_show_products = "SELECT productID, item_name, CONCAT(current_stock_quantity, ' ', IF(unit = 'weight','lb','units')), CONCAT('$',price,'/',IF(unit = 'weight','lb','unit')) as price, image from products where category = '$category'";
	}

$result_show_products = $conn->query($sql_show_products);
	if($result_show_products)
		{
			

			while($row = $result_show_products->fetch_assoc())
			{
	
				echo "<div class='gallery'> <img class='product' src='pictures/".$row['image']."' alt='strawberry'><br>";
				echo "<div class='description'<p>".$row['item_name']."</p><br>";
				echo "<p>".$row['price']."</p> <br>";
				echo "<a href='selectItem.php?id=".$row['productID']."'>Add to cart</a>";
				echo "</div></div>";


				
			}
		}
	
?>

<?php

require 'footer.php'

?>
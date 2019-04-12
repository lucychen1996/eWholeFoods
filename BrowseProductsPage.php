<?php 

require 'navbar.php';

?>


<?php
session_start();
require 'config.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit();
}

    $category = $_POST['category'];
    echo $category;
	$sql_show_products = "SELECT productID, item_name, CONCAT(current_stock_quantity, ' ', IF(unit = 'weight','lb','units')), CONCAT('$',price,'/',IF(unit = 'weight','lb','unit')) from products where category = '$category'";
	
	$result_show_products = $conn->query($sql_show_products);
	if($result_show_products)
		{
			
			echo "<table border=1px>";
			echo '<tr> <td> <strong>Product ID</strong></td> <td> <strong>Product</strong> </td><td> <strong>Stock Quantity</strong> </td><td> <strong>Price </strong> </td></tr>';
			while($row = $result_show_products->fetch_assoc())
			{
			

				// $_SESSION['key_delete'] = $row['ID'];

				// TODO: later

				foreach($row as $key=>$value)
				{
					echo "<td>$value</td>";
				}

				echo "<td><a href='selectItem.php?id=".$row['productID']."'>Add to cart</a></td>";

				echo '</tr>';
			}

			echo "</table>";
		}

		echo "<br/>";

	echo "<br>";
	
	echo "<a href='viewCart.php'>View Shopping Cart</a>";

?>

<?php

require 'footer.php'

?>
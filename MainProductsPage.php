<?php 

require 'header.php';

?>


<?php
	session_start();
	require 'config.php';

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$_username = $_SESSION["_username"];

	echo "Welcome ";
	echo $_SESSION["_username"];

	echo "<br> PRODUCTS\n";

	$sql_show_products = 'select productID, item_name, CONCAT(current_stock_quantity, " ", IF(unit = "weight","lb","units")), CONCAT(\'$\',price,\'/\',IF(unit = "weight","lb","unit")) from products';
	
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
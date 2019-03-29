<?php 

require 'header.php';

?>


<?php

	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$database = "eWholeFoods";
	$conn = new mysqli($servername,$username,$password,$database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$_username = $_SESSION['_username'];

	echo "Welcome ".$_username;

	echo "PRODUCTS\n";

	$sql_show_products = 'select item_name, CONCAT(current_stock_quantity, " ", IF(product_type = "weight","lb","units")), CONCAT(\'$\',price,\'/\',IF(product_type = "weight","lb","unit")) from products';
	$result_show_products = $conn->query($sql_show_products);

	if($result_show_products)
		{
			echo "<table border=1px>";
			echo '<tr><td> <strong>Product</strong> </td><td> <strong>Stock Quantity</strong> </td><td> <strong>Price </strong> </td></tr>';
			while($row = $result_show_products->fetch_assoc())
			{

				// $_SESSION['key_delete'] = $row['ID'];

				// TODO: later

				foreach($row as $key=>$value)
				{
					echo "<td>$value</td>";
				}

				echo '</tr>';
			}

			echo "</table>";
		}

		echo "<br/>";

?>



<?php



require 'footer.php'

?>
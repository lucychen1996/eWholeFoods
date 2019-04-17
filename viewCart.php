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

	echo "<h3>Current Shopping Cart </h3>";
	$_username = $_SESSION["_username"];
	$cartID = $_SESSION["cartID"];

	$sql_show_cart = "select cartItem.cartID, products.item_name, cartItem.quantity, ROUND(cartItem.quantity*products.price,2) from products join cartItem on products.productID = cartItem.productID where cartItem.shopping_cartID = $cartID;";

	$result_show_cart = $conn->query($sql_show_cart);

	if($result_show_cart)
	{
		echo "<table border=1px>";
		echo '<tr> <td> <strong> CartID </strong> </td> <td> <strong> Product </strong> </td> <td> <strong> Quantity </strong> </td> <td> <strong> Total Cost </strong> </td> </tr>';
		while($row = $result_show_cart->fetch_assoc())
		{
			foreach($row as $key=>$value)
			{
				echo "<td>$value</td>";
			}
			$product = $row['item_name'];
			$item_in_cart = $row['cartID'];
			echo "<td><a href = 'deleteItem.php?shoppingcartid=".$cartID."&cartid=".$item_in_cart."&product=$product'>Delete Item</a></td>";
			echo "</tr>";
		}

		echo "</table>";
	}
	$sql_cart_total = "SELECT round(SUM(price*quantity),2) as total FROM products, cartItem WHERE products.productID = cartItem.productID AND cartItem.shopping_cartID = '$cartID'";
	$result_cart_total = $conn->query($sql_cart_total);
	
	$row = $result_cart_total->fetch_assoc();
	echo "Total: ".$row['total'];

	echo "<br>";
	echo "<br>";

	echo "<a href='MainProductsPage.php?user=".$_username."'> Continue Browsing </a>";
	echo "<br>";
	echo "<a href='checkout.php?cartID=$cartID'> Proceed to Checkout </a>";
?>

<?php

require 'footer.php';

?>
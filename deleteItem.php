<?php

require 'usernavbar.php';
require 'config.php';

?>

<?php
	
	session_start();

	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	    header("location: login.php");
	    exit();
	}
	$product_name = $_GET['product'];
	echo "<h3>Are you sure you want to remove $product_name from the cart?</h3>";

?>

<form method="POST">
<input type="submit" name="confirm" value="Yes">
<input type="submit" name="confirm" value="No">
</form>

<?php
	if(isset($_POST['confirm']))
	{
		if($_POST['confirm'] == 'Yes')
		{
			// echo "what";
			$shoppingcartid = $_GET['shoppingcartid'];
			$item_in_cart = $_GET['cartid'];

			$sql_quantity = "select quantity from cartItem where cartID = $item_in_cart";
			$result_quantity = $conn->query($sql_quantity);
			$quantity = 0;

			while($row = $result_quantity->fetch_assoc())
			{
				foreach($row as $key=>$value)
				{
					$quantity = $value;
				}
			}

			$sql_update_stock = "update products set current_stock_quantity = current_stock_quantity + $quantity where item_name = $product;";
			$result_update_stock = $conn->query($sql_update_stock);

			$sql_remove = "delete from cartItem where shopping_cartID = $shoppingcartid and cartID = $item_in_cart;";
			// echo $sql_remove;
			$result_remove = $conn->query($sql_remove);
			// echo "here";


			if($result_remove)
			{
				echo "worked";
				header("Location:viewCart.php");
			}
			else
			{
				echo "didnt work";
			}
		}
		else if($_POST['confirm'] == 'No')
		{
			header("Location:viewCart.php");
		}
	}
?>

<?php

require 'footer.php';

?>
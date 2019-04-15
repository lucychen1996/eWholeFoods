<?php 

require 'header.php';

?>

<?php
	session_start();
	require 'config.php';

	$user_name = $_GET['user'];
	echo "<a href='MainProductsPage.php?user=$user_name'>Return to Product Browsing</a>";
	echo "<br>";
	echo "<br>";

	$productid = $_GET['id'];
	$sql_item = "select item_name from products where productID = $productid;";

	$result_item = $conn->query($sql_item);

	if($result_item)
	{
		while($row = $result_item->fetch_assoc())
		{
			foreach($row as $key=>$value)
			{
				echo "<strong> Add $value to shopping cart </strong>";
			}
		}
	}

	$sql_stock_quant = "select current_stock_quantity from products where productID = $productid;";

	$result_stock = $conn->query($sql_stock_quant);
	$stock_quant = 0;

	// echo mysqli_num_rows($result_stock);

	if($result_stock)
	{
		while($row = $result_stock->fetch_assoc())
		{
			foreach($row as $key=>$value)
			{
				$stock_quant = $value;
			}
		}
	}

	// echo $stock_quant;
	$sql_unit = "select unit from products where productID = $productid;";

	$result_unit = $conn->query($sql_unit);
	$unit = "";

	if($result_unit)
	{
		while($row = $result_unit->fetch_assoc())
		{
			foreach($row as $key=>$value)
			{
				$unit = $value;
			}
		}
	}

	$redirect = "";

?>

<?php echo '<form name="quantityForm" action="" method="POST">'; ?>
Quantity:
	<input type="text" name="quantity">
	<?php if($unit == 'weight') { echo "lbs"; } else { echo "units\n"; } ?>
	<input type = "submit" value = "submit">
	<?php echo "<br>"; ?>
	</form>

<?php echo "<font color=\"red\">(Max quantity: $stock_quant)</font> <br>" ?>

<?php 
	if(intval($_POST["quantity"]) > $stock_quant)
	{
		echo "Quantity exceeds availability!";
		// header('Location: selectItem.php?id='.$_GET['id']);
		// $redirect = 'selectItem.php?id='.$_GET['id'];
	}
	else if(!is_numeric($_POST["quantity"]))
	{
		echo "Not a valid quantity input!";

		// $redirect = 'selectItem.php?id='.$_GET['id'];
	}
	else
	{
		$sql_userID = "select userID from user where _username = '".$_GET['user']."';";
		$user_name = $_GET['user'];
		$_SESSION["user_name"] = $user_name;

		$result_userID = $conn->query($sql_userID);
		$userID = "";

		while($row = $result_userID->fetch_assoc())
		{
			foreach($row as $key=>$value)
			{
				$userID = $value;
			}
		}

		$sql_if_new_cart = "select * from shopping_cart where userID = ".$userID.";";

		$result_new_cart = $conn->query($sql_if_new_cart);

		if(mysqli_num_rows($result_new_cart) == 0)
		{

			$sql_insert_new_cart = "insert into shopping_cart (userID) values ($userID);";
			$result_insert_new_cart = $conn->query($sql_insert_new_cart);
		}

		$sql_get_cartID = "select shopping_cartID from shopping_cart where userID = $userID";

		$result_cartID = $conn->query($sql_get_cartID);

		$cartID = "";

		while($row = $result_cartID->fetch_assoc())
		{
			foreach($row as $key=>$value)
			{
				$cartID = $value;
			}
		}

		$_SESSION["cartID"] = $cartID;

		$sql_add_item = "insert into cartItem (productID,quantity,shopping_cartID) values ($productid,".$_POST["quantity"].",$cartID);";

		$result_additem = $conn->query($sql_add_item);

		header('Location: MainProductsPage.php');
	}
?>

<br>

<?php

require 'footer.php';

?>
<?php 

require 'usernavbar.php';

?>

<?php
	session_start();
	require 'config.php';

	$user_name = $_SESSION["_username"];
	echo "<a href='MainProductsPage.php?user=$user_name'>Return to Product Browsing</a>";
	echo "<br>";
	echo "<br>";

	$productid = $_GET['id'];
	$sql_item = "select * from products where productID = $productid;";

	$result_item = $conn->query($sql_item);

	if($result_item)
	{
		$row = $result_item->fetch_assoc();
		echo "<h4>".$row['item_name']."</h4><br>";
		echo "<img class='product' src='pictures/".$row['image']."' alt='strawberry'><br>";
		echo "<h6> Details:</h6>";
		echo "<p>".$row['nutrition_facts']."</p>";
		echo "<h6> Price:</h6>";
		echo "<p>".$row['price']."/".$row['unit']."</p> <br>";
		echo "<strong> Add ".$row['item_name']." to shopping cart </strong>";
			
		
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
	<?php echo $unit;?>
	<input type = "submit" value = "Add to Cart">
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
		$_username = $_SESSION["_username"];
		$sql_userID = "select userID from user where _username = ".$_username.";";

		$result_userID = $conn->query($sql_userID);
		$_userID = "";

		while($row = $result_userID->fetch_assoc())
		{
			foreach($row as $key=>$value)
			{
				$_userID = $value;
			}
		}

		// $sql_if_new_cart = "select * from shopping_cart where userID = ".$userID.";";

		// $result_new_cart = $conn->query($sql_if_new_cart);
		// $count = mysqli_num_rows($result_new_cart);

		// if($count == 0)
		// {

		// 	$sql_insert_new_cart = "insert into shopping_cart (userID) values ($userID);";
		// 	$result_insert_new_cart = $conn->query($sql_insert_new_cart);
		// }
		$cartID = $_SESSION["cartID"];
		if($cartID==""){
			$sql_insert_new_cart = "insert into shopping_cart (userID) values ($_userID);";
			$result_insert_new_cart = $conn->query($sql_insert_new_cart);

			$sql_select_new_cart = "SELECT shopping_cartID FROM shopping_cart WHERE shopping_cartID NOT IN (SELECT shopping_cartID FROM transactions WHERE userID = '$_userID') ";
			$result_select_new_cart = $conn->query($sql_select_new_cart);
			
            $row = $result_cart_total->fetch_assoc();
			$new_cartID = $row['shopping_cartID'];
			$_SESSION["cartID"] = $new_cartID;
		}
       

		$sql_add_item = "insert into cartItem (productID,quantity,shopping_cartID) values ($productid,".$_POST["quantity"].",$cartID);";

		$result_additem = $conn->query($sql_add_item);

		$sql_update_stock = "update products set current_stock_quantity = current_stock_quantity - ".$_POST["quantity"]." where productID = $productid;";

		$result_update_stock = $conn->query($sql_update_stock);

		header('Location: MainProductsPage.php');	
	}
?>

<br>

<?php

require 'footer.php';

?>
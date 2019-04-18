<?php 

require 'usernavbar.php';

?>

<?php
	session_start();
	require 'config.php';
	$user_name = $_SESSION["_username"];
	$_userID = $_SESSION["_userID"];
	$cartID = $_SESSION["cartID"];
	// echo "<a href='mainproductspage.php?user=$user_name'>Return to Product Browsing</a>";
	// echo "<br>";
	// echo "<br>";

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
	<input type="number" min = 1 name="quantity" value = 1>
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
		// echo "Not a valid quantity input!";

		// $redirect = 'selectItem.php?id='.$_GET['id'];
	}
	else
	{
		$sql_add_item = "insert into cartItem (productID,quantity,shopping_cartID) values ($productid,".$_POST["quantity"].",$cartID);";

		$result_additem = $conn->query($sql_add_item);

		$sql_update_stock = "update products set current_stock_quantity = current_stock_quantity - ".$_POST["quantity"]." where productID = $productid;";

		$result_update_stock = $conn->query($sql_update_stock);

		header('Location: viewCart.php');	
	}
?>

<br>

<?php

require 'footer.php';

?>
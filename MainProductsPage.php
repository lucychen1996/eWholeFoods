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
$_userID = $_SESSION["_userID"];

$sql_cart = "SELECT shopping_cartID FROM shopping_cart WHERE shopping_cartID NOT IN (SELECT shopping_cartID FROM transactions WHERE userID = '$_userID' ) ";
$result_cart = $conn->query($sql_cart);
$count = mysqli_num_rows($result_cart);

if($count == 0)
{
	$sql_insert_new_cart = "insert into shopping_cart (userID) values ($_userID);";
	$result_insert_new_cart = $conn->query($sql_insert_new_cart);

	$sql_select_new_cart = "SELECT shopping_cartID FROM shopping_cart WHERE shopping_cartID NOT IN (SELECT shopping_cartID FROM transactions WHERE userID = '$_userID' ) ";
	$result_select_new_cart = $conn->query($sql_select_new_cart);
	
	$row = $result_select_new_cart->fetch_assoc();
	$cartID = $row['shopping_cartID'];
	$_SESSION["cartID"] = $cartID;
}
else {
	$row = $result_cart->fetch_assoc();
	$_SESSION["cartID"]= $row['shopping_cartID'];
}

$cartID = $_SESSION["cartID"];

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



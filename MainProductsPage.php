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

	// $sql_userID = "select userID from user where _username = '".$_GET['user']."';";
	// $user_name = $_GET['user'];
	// $_SESSION["user_name"] = $user_name;

	// $result_userID = $conn->query($sql_userID);
	// $userID = "";

	// while($row = $result_userID->fetch_assoc())
	// {
	// 	foreach($row as $key=>$value)
	// 	{
	// 		$userID = $value;
	// 	}
	// }
	
	// echo "<a href='viewCart.php'>View Shopping Cart</a>";

?>

<?php

require 'footer.php'

?>
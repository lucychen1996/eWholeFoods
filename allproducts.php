<?php 

require 'adminnavbar.php';
session_start();
require 'config.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit();
}

?>

<a href="addproduct.php" class="btn addbtn">Add New Product</a> 

<?php

	$sql_show_products = 'select * from products';
	
	$result_show_products = $conn->query($sql_show_products);
	if($result_show_products)
		{
            echo "<table class='producttable' border=1px>";
            echo "<tr>";
            echo "<td>ProductID</td><td>Name</td><td>Stock Quantity</td><td>Price</td><td>Nutrition Facts</td><td>Unit</td><td>Category</td>";
            echo "</tr>";
			while($row = $result_show_products->fetch_assoc())
			{
                echo "<tr>";
                foreach($row as $key=>$value)
			{
				echo "<td>$value</td>";
			}
		
                echo "</tr>";

            }
            echo "</table>";

		}

?>

<?php

require 'footer.php'

?>
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
<br>
<h3>Products</h3>
<a href="addproduct.php" class="btn addbtn">Add New Product</a> 


<?php

	$sql_show_products = 'select * from products';
	
	$result_show_products = $conn->query($sql_show_products);
	if($result_show_products)
		{
            echo "<table class='producttable' border=1px>";
            echo "<tr>";
            echo "<td>Product</td><td>Name</td><td>Current Stock Quantity</td><td>Price</td><td>Unit</td><td>utrition Facts</td><td>Category</td><td></td>";
            echo "</tr>";
			while($row = $result_show_products->fetch_assoc())
			{
                echo "<td> <img src='pictures/".$row['image']."' alt='strawberry'  id='imglist'></td>";
                echo "<td>".$row['item_name']."</td>";
                echo "<td>".$row['current_stock_quantity']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['unit']."</td>";
                echo "<td>".$row['nutrition_facts']."</td>";
                echo "<td>".$row['category']."</td>";
                echo "<td><a href='editproduct.php?id=".$row['productID']."'class='btn updatebtn'>Update Product</a><br><a href='deleteproduct.php?id=".$row['productID']."'class='btn updatebtn'>Delete Product</a></td>";
                echo "</tr>";

            }
            echo "</table>";

		}

?>

<?php

require 'footer.php'

?>
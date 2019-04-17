<?php 
session_start();
require 'config.php';

$_productID = $_POST["id"];  
$_product_name = $_POST["product_name"];
$_stock_quantity = $_POST["stock_quantity"];
$_price= $_POST["price"];
$_nutrition_facts = $_POST["nutrition_facts"];
$_unit = $_POST["unit"];
$_category = $_POST["category"];
echo $_productID;

    $sql_update = "UPDATE products SET item_name = '$_product_name', current_stock_quantity='$_stock_quantity', price='$_price', nutrition_facts='$_nutrition_facts', unit='$_unit', category='$_category' WHERE productID = '$_productID'";
    $result_update  = $conn->query($sql_update);
    if($result_update) {
        echo "yay";
        header("location: allproducts.php");
    }
    else {
            $error = "Something Went Wrong";
    }

?>
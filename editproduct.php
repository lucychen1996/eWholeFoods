<?php 

require 'adminnavbar.php';
session_start();
require 'config.php';

?>

<a href="allproducts.php" class="btn addbtn">See All Products</a> 

<?php

$_productID = $_GET["id"];


    $sql_get = "SELECT products.*, categories.category_name as categoryname FROM products JOIN categories ON products.category = categories.categoryID WHERE productID = '$_productID'";
    $result_get  = $conn->query($sql_get);

    if($result_get) {
        $row = $result_get->fetch_assoc();

        $_productID = $row["productID"];
        $_product_name = $row["item_name"];
        $_stock_quantity = $row["current_stock_quantity"];
        $_price = $row["price"];
        $_nutrition_facts = $row["nutrition_facts"];
        $_unit = $row["unit"];
        $_category = $row["categoryname"];
y;


    }
    else {
            $error = "Something Went Wrong";
    }

?>

<h4><?php echo $status?></h4>
<h3>Update Products</h3>

<form name="update" action="updateproduct.php?" method="POST">
    <input type="hidden" name="id" value=<?php echo $_productID;?>>
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" value =<?php echo $_product_name;?> required>
    </div>
    <div class="form-group">
        <label>Stock Quantity</label>
        <input type="integer" class="form-control" min="1" id="stock_quantity" name="stock_quantity" value = <?php echo $_stock_quantity; ?> required>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value = <?php echo $_price; ?> required>
    </div>
    <div class="form-group">
        <label>Unit</label>
        <select name="unit">
            <option value="unit" <?php echo ($_unit == 'unit') ? 'selected' : ''; ?>>Unit</option>
            <option value="lb" <?php echo ($_unit == 'lb') ? 'selected' : ''; ?>>lbs</option>
        </select>
    </div>
    <div class="form-group">
        <label>Nutrition Facts</label>
        <textarea class="form-control" id="nutrition_facts" name="nutrition_facts" required><?php echo $_nutrition_facts;?></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category">
            <option value="Fruit" <?php echo ($_category == 'Fruit') ? 'selected' : ''; ?>>Fruit</option>
            <option value="Vegetable"<?php echo ($_category == 'Vegetable') ? 'selected' : ''; ?>>Vegetable</option>
            <option value="Meat"<?php echo ($_category == 'Meat') ? 'selected' : ''; ?>>Meat</option>
            <option value="Dairy"<?php echo ($_category == 'Dairy') ? 'selected' : ''; ?>>Dairy</option>
            <option value="Grain"<?php echo ($_category == 'Grain') ? 'selected' : ''; ?>>Grain</option>
            <option value="Frozen"<?php echo ($_category == 'Frozen') ? 'selected' : ''; ?>>Frozen</option>
            <option value="Beverage"<?php echo ($_category == 'Beverage') ? 'selected' : ''; ?>>Beverage</option>
            <option value="Bakery"<?php echo ($_category == 'Bakery') ? 'selected' : ''; ?>>Bakery</option>
            <option value="Snacks"<?php echo ($_category == 'Snacks') ? 'selected' : ''; ?>>Snacks</option>
        </select>	
    </div>
    <!-- <div class="form-group">
        <label>New Image</label>
        <input type="file" id="image" name="image">
    </div> -->
    <div class="form-group ">
        <button type="submit" class="btn btn-block" id="submitbtn" value="submit" >Update Product</button>
    </div>
</form>

<?php
require 'footer.php'
?>
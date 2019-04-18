<?php 

require 'adminnavbar.php';
session_start();
require 'config.php';

?>

<a href="allproducts.php" class="btn addbtn">See All Products</a> 

<?php

$_product_name = $_POST["product_name"];
$_stock_quantity = $_POST["stock_quantity"];
$_price= $_POST["price"];
$_nutrition_facts = $_POST["nutrition_facts"];
$_unit = $_POST["unit"];
$_category = $_POST['category'];
$file_name = $_FILES['image']['name'];
$file_size =$_FILES['image']['size'];
$file_tmp =$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];



if(isset($_product_name)&&isset($_stock_quantity)){

    if(isset($_FILES['image'])){
        $errors= array();
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        $extensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"pictures/".$file_name);
        }else{
           print_r($errors);
        }
     }    

    $sql_categoryID = "SELECT categoryID FROM categories WHERE category_name = '$_category'";
    $result_categoryID = $conn->query($sql_categoryID);
    $row = $result_categoryID-> fetch_assoc();
    $_categoryID = $row['categoryID'];
    $sql_add = "insert into products (item_name, current_stock_quantity, price, nutrition_facts, unit, category, image) 
    values ('$_product_name', '$_stock_quantity','$_price','$_nutrition_facts','$_unit','$_categoryID','$file_name')";
    $result_add  = $conn->query($sql_add);
    if($result_add ) {
            $status = "".$_product_name." Successfully Added";
    }
    else {
            $error = "Something Went Wrong";
    }
}
?>

<h4><?php echo $status?></h4>
<h3>Add Products</h3>

<form name="login" action="addproduct.php" method="POST" enctype = "multipart/form-data">
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" required>
    </div>
    <div class="form-group">
        <label>Stock Quantity</label>
        <input type="number" class="form-control" min="1" id="stock_quantity" name="stock_quantity" placeholder="Enter Stock Quantity" required>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Enter Price" required>
    </div>
    <div class="form-group">
        <label>Unit</label>
        <select name="unit">
            <option value="unit">Unit</option>
            <option value="lb">lbs</option>
        </select>
    </div>
    <div class="form-group">
        <label>Nutrition Facts</label>
        <textarea class="form-control" id="nutrition_facts" name="nutrition_facts" rows="5" placeholder="Enter Nutrition" required></textarea>
    </div>
 
    <div class="form-group">
        <label>Category</label>
        <select name="category">
            <option value="Fruit">Fruit</option>
            <option value="Vegetable">Vegetable</option>
            <option value="Meat">Meat</option>
            <option value="Dairy">Dairy</option>
            <option value="Grain">Grain</option>
            <option value="Frozen">Frozen</option>
            <option value="Beverage">Beverage</option>
            <option value="Bakery">Bakery</option>
            <option value="Snacks">Snacks</option>
        </select>	
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" id="image" name="image" placeholder="Enter Username" required>
    </div>
    <div class="form-group ">
        <button type="submit" class="btn btn-block" id="submitbtn" value="submit" >Add Product</button>
    </div>
</form>


<?php
require 'footer.php'
?>
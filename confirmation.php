<?php 

require 'usernavbar.php';

?>
<h3>Confrimation Page<h3>
<?php
require 'config.php';

session_start();


$cartID = $_SESSION["cartID"];
$_userID =  $_SESSION["_userID"];
$_street = $_POST["street"];
$_city = $_POST["city"];
$_state = $_POST["state"];
$_zip = $_POST["zip"];
$error="";


if(isset($cartID) && isset($_street) && isset($_city)&&isset($_state)&&isset($_zip)) {

    $sql_cart_total = "SELECT round(SUM(price*quantity),2) as total FROM products, cartItem WHERE products.productID = cartItem.productID AND cartItem.shopping_cartID = '$cartID'";
    $result_cart_total = $conn->query($sql_cart_total);
    
	
	$row = $result_cart_total->fetch_assoc();
	$total = $row['total'];

    $sql_insert_address = "INSERT INTO addresses (userID, street, city, state, zip) VALUES ('$_userID', '$_street', '$_city', '$_state', '$_zip')";
    $result_insert_address= $conn->query($sql_insert_address);

    $sql_address = "SELECT addressID FROM addresses WHERE userID = '$_userID' AND street='$_street' AND city = '$_city' AND state='$_state' AND zip='$_zip'";
    $result_address = $conn->query($sql_address);

    $row_address = $result_address->fetch_assoc();
    $addressID = $row_address['addressID'];
    $order_date = date('Y-m-d H:i:s');
    

 
    $sql_transaction = "INSERT INTO transactions (userID, shopping_cartID, addressID, total, order_date) VALUES ('$_userID','$cartID','$addressID','$total','$order_date')";
    $result_transaction = $conn->query($sql_transaction);



    if($result_transaction){
  
    echo"CONFIRMED";
        $sql_insert_new_cart = "insert into shopping_cart (userID) values ($_userID);";
        $result_insert_new_cart = $conn->query($sql_insert_new_cart);
        $sql_select_new_cart = "SELECT shopping_cartID FROM shopping_cart WHERE shopping_cartID NOT IN (SELECT shopping_cartID FROM transactions WHERE userID = '$_userID') ";
        $result_select_new_cart = $conn->query($sql_select_new_cart);
        $row = $result_select_new_cart->fetch_assoc();
        $new_cartID = $row['shopping_cartID'];
        $_SESSION["cartID"] = $new_cartID;


        echo "<a href='MainProductsPage.php?'> Go Back to Shopping </a>";
    }

    
}



?>


<?php
require 'footer.php'
?>







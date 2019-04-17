<?php 
session_start();
require 'config.php';

$_productID = $_GET["id"];

    $sql_delete = "DELETE FROM products WHERE productID = '$_productID'";
    $result_delete = $conn->query($sql_delete);
    if($result_delete) {

        header("location: allproducts.php");
    }
    else {
            $error = "Something Went Wrong";
    }

?>
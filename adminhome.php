<?php 
require 'adminnavbar.php';
session_start();
require 'config.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit();
}
$_username = $_SESSION["_username"];

echo "<br><h3>Welcome $_username </h3>";

?>
<a href="allproducts.php" class="btn adminhomebtn">See All Product</a>
<a href="sales.php" class="btn adminhomebtn">See Sales Statistics</a>
<a href="users.php" class="btn adminhomebtn">See All Customers</a>


<?php

require 'footer.php'

?>


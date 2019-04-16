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

echo "<h3>Welcome $_username </h3>";

?>

<h3>Total Sales</h3>
<form name="totalsale" action="AdminHome.php?action=totalsales" method="POST">
From:
<input type="date" name="startdate"  >
To:
<input type="date" name="enddate"  placeholder=" Select Date">
<input type="submit" value="submit">
</form>

<h3>Total Sales</h3>
<form name="totalsale" action="AdminHome.php?action=totalsales" method="POST">
From:
<input type="date" name="startdate"  >
To:
<input type="date" name="enddate"  placeholder=" Select Date">
<input type="submit" value="submit">
</form>

<?php
if ($_GET['action'] == 'totalsales') {
    $_startdate = $_POST["startdate"];
    $_enddate = $_POST["enddate"];

    $sql_total_sales = "SELECT SUM(total) as totalsales FROM transcations WHERE oder_date BETWEEN '$_startdate' AND '$_enddate'";
    echo $sql_total_sales;
    $result_show_products = $conn->query($sql_total_sales);

        if($result_total_sales)
            {
                // $row = $result_total_sales->fetch_assoc();
                echo "Total Sales from $_startdate to $_enddate";
                // echo $row['totalsales'];
        
            }
}
?>

<?php

require 'footer.php'

?>


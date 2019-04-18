<?php 
require 'adminnavbar.php';
$error="";
session_start();
require 'config.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit();
}
$_username = $_SESSION["_username"];

?>
<br>
<h3>Total Sales By Date</h3><br>
<form name="totalsalebydate" action="Sales.php?action=ByDate" method="POST">
From:
<input type="date" name="startdate" required >
To:
<input type="date" name="enddate"  placeholder=" Select Date" required>
<input type="submit" value="submit">
</form>
<?php
if ($_GET['action'] == 'ByDate') {
    $_startdate = $_POST["startdate"];
    $_enddate = $_POST["enddate"];

    $sql_total_sales = "SELECT SUM(total) as totalsales FROM transactions WHERE order_date BETWEEN '$_startdate' AND '$_enddate'";
    $result_total_sales = $conn->query($sql_total_sales);

        if($result_total_sales)
            {
                $row = $result_total_sales->fetch_assoc();
                echo "Total Sales from $_startdate to $_enddate";
                echo $row['totalsales'];
            }
        else {
            $error ="Something Went Wrong";
            echo $error;
            echo "Try Again";
        }
}
?>

<br>
<h3>Total Sales By State</h3><br>
<form name="totalSalesByState" action="Sales.php?action=ByState" method="POST">
    <input type="submit" value="Summary of Total Sales by State">
</form>
<?php
if ($_GET['action'] == 'ByState') {
    $sql_sales_state = "SELECT addresses.state, SUM(total) as totalsales FROM transactions, addresses WHERE transactions.addressID = addresses.addressID GROUP BY addresses.state";
    $result_sales_state = $conn->query($sql_sales_state);
        if($result_sales_state)
         {
                echo "<table border=1px>";
				while($row = $result_sales_state->fetch_assoc())
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
        else {
            $error ="Something Went Wrong";
            echo $error;
            echo "Try Again";
        }
}
?>

<h3>Top Seller</h3><br>
<form name="totalSalesByState" action="Sales.php?action=TopSeller" method="POST">
    <input type="submit" value="Summary of Total Sales by State">
</form>
<?php
if ($_GET['action'] == 'TopSeller') {
    $sql_sales_state = "SELECT * FROM products WHERE productID = (SELECT productID FROM (SELECT MAX(number), productID FROM (SELECT COUNT(*) as number, c.productID FROM transactions as t JOIN shopping_cart as s ON t.shopping_cartID = s.shopping_cartID JOIN cartItem AS c ON s.shopping_cartID = c.shopping_cartID GROUP BY c.productID ORDER BY number DESC) as a) as b)";
    $result_sales_state = $conn->query($sql_sales_state);
        if($result_sales_state)
         {
                echo "<table border=1px>";
				while($row = $result_sales_state->fetch_assoc())
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
        else {
            $error ="Something Went Wrong";
            echo $error;
            echo "Try Again";
        }
}
?>

<?php

require 'footer.php'

?>


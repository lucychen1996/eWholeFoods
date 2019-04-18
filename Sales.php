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
<form name="totalsalebydate" action="sales.php?action=ByDate" method="POST">
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
                echo "<br><h5> Total Sales from $_startdate to $_enddate:<br>";
                echo "$".$row['totalsales']."</h5>";
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
<form name="totalSalesByState" action="sales.php?action=ByState" method="POST">
    <input type="submit" value="Summary of Total Sales by State">
</form>
<?php
if ($_GET['action'] == 'ByState') {
    $sql_sales_state = "SELECT addresses.state, round(SUM(total),2) as totalsales FROM transactions, addresses WHERE transactions.addressID = addresses.addressID GROUP BY addresses.state";
    $result_sales_state = $conn->query($sql_sales_state);
        if($result_sales_state)
         {
                echo "<br><table border=1px class='salestable'>";
                echo "<tr>";
                echo "<td><strong>STATE</strong></td><td><strong>Total Sales $</strong></td>";
                echo "</tr>";
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


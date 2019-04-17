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

    $sql_total_sales = "SELECT SUM(total) as totalsales FROM transcations WHERE oder_date BETWEEN '$_startdate' AND '$_enddate'";
    echo $sql_total_sales;
    $result_show_products = $conn->query($sql_total_sales);

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
<!-- State:
<select name="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="ON">Onatario</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>	 -->
    <input type="submit" value="Summary of Total Sales by State">
</form>
<?php
if ($_GET['action'] == 'ByState') {
    // $_state = $_POST["state"];

    $sql_total_sales = "SELECT addresses.state, SUM(total) as totalsales FROM transcations, addresses WHERE transcations.addressID = addresses.addressID ORDER by addresses.state'";
    echo $sql_total_sales;
    $result_show_products = $conn->query($sql_total_sales);

        if($result_total_sales)
         {
                echo "<table border=1px>";
				while($row = $result_total_sales->fetch_assoc())
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


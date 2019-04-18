<?php 

require 'adminnavbar.php';
session_start();
require 'config.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit();
}

?>
<h3>Customers</h3>
<?php
	$sql_show_users = "SELECT * FROM user";
	
	$result_show_users = $conn->query($sql_show_users);
	if($result_show_users)
		{
            echo "<table class='usertable' border=1px>";
            echo "<tr>";
            echo "<td>Username</td><td>Password</td><td>Email</td><td>First Name</td><td>Last Name</td><td>Admin Status</td><td></td>";
            echo "</tr>";
			while($row = $result_show_users->fetch_assoc())
			{
                echo "<td>".$row['_username']."</td>";
                echo "<td>".$row['_password']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['is_admin']."</td>";
                echo "<td><a href='edituser.php?id=".$row['userID']."'class='btn updatebtn'>Update User</a><br><a href='deleteuser.php?id=".$row['userID']."'class='btn updatebtn'>Delete User</a></td>";
                echo "</tr>";

            }
            echo "</table>";

		}

?>

<?php

require 'footer.php'

?>

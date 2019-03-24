<?php 

require 'header.php';

?>

<form name="registration" action="registration.php" method="POST">
    Username:<input type="text" name="username"><br>
    Password:<input type="text" name="password"><br>
    Email:<input type="text" name="email"><br>
    First Name:<input type="text" name="first_name"><br>
    Last Name:<input type="text" name="last_name"><br>
   
    
    <input type="submit" value="submit">
</form>


<?php

$_username = $_POST["username"];
$_password = $_POST["password"];
$email = $_POST["email"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$is_admin = 0;

if ($_username == "" || $_password == "" || $email == ""|| $first_name == ""|| $last_name == "")
{
    die("You are missing some inputs");
}
// Create connection
$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "eWholeFoods";
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<p><font color=\"red\">Connected successfully</font></p>";


//insert into database
$sql = "INSERT INTO user (_username, _password, email, first_name, last_name, is_admin) VALUES ('$_username', '$_password', '$email', '$first_name', '$last_name', $is_admin)";
$result = $conn->query($sql);
// echo $sql;
if ($result) {
    
    echo "Successful!<a href='MainProductsPage.php'>Check Results Here</a>";
} 
else {
    echo "Something went Wrong!<a href='home.php'>Try Again</a>";
}


// Close connection
mysqli_close($conn);

require 'footer.php'

?>
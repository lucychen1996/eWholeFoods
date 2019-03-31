<?php 

require 'header.php';

?>

<form name="registration" action="MainProductsPage.php" method="POST">
    Username:<input type="text" name="username"><br>
    Password:<input type="text" name="password"><br>
    Email:<input type="text" name="email"><br>
    First Name:<input type="text" name="first_name"><br>
    Last Name:<input type="text" name="last_name"><br>
   
    
    <input type="submit" value="submit">
</form>


<?php
require 'footer.php'
?>

<?php

session_start();
$_username = $_POST["username"];
$_password = $_POST["password"];
$email = $_POST["email"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$is_admin = 0;

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
// echo "<p><font color=\"red\">Connected successfully</font></p>";

if ($_username == "" || $_password == "" || $email == ""|| $first_name == ""|| $last_name == "")
{
    die("You are missing some inputs");
}

//insert into database
$sql = "INSERT INTO user (_username, _password, email, first_name, last_name, is_admin) VALUES ('$_username', '$_password', '$email', '$first_name', '$last_name', $is_admin)";
echo $sql;
$result = $conn->query($sql);
// echo $sql;

// if(!$result)
// {
//     echo "Please fill in all fields. <a href = 'registration.php'>Try Again</a>";
// }

if ($result) {
    
    echo "Successful!<a href='MainProductsPage.php'>Check Results Here</a>";
} 
else {
    echo "Something went Wrong!<a href='home.php'>Try Again</a>";
}

$test = "apidjfpasd";

$_SESSION['_username'] = $test;

// Close connection
mysqli_close($conn);

?>




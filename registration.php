<?php 

require 'header.php';

?>

<div class="accountForm"> 
 <h4> Create an Account</h4>

<form name="registration" action="registration.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder=" Enter Password" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Access</label>
        <input class="form-control" type="text" name="access" value="user" readonly>
    </div>
    <div class="form-group ">
        <button type="submit" class="btn btn-block" id="submitbtn" value="submit" >Create Account</button>
    </div>
    <div class="form-group">
        <p class="text-center"> or <br> Got an account? Log In! <a href="login.php" id="login">Log In here</a></p>
    </div>
</form>
</div>


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

//insert into database
$sql = "INSERT INTO user (_username, _password, email, first_name, last_name, is_admin) VALUES ('$_username', '$_password', '$email', '$first_name', '$last_name', $is_admin)";
echo $sql;
$result = $conn->query($sql);


if ($result) {

    $test = "apidjfpasd";
    $_SESSION['_username'] = $test;
    // header("Location: MainProductsPage.php");

} 
else {
    echo "Something went Wrong!<a href='home.php'>Try Again</a>";
}



// Close connection
mysqli_close($conn);

?>




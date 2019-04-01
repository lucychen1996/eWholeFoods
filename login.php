<?php 

require 'header.php';

?>

<div class="accountForm"> 
 <h4> Log In</h4>

<form name="login" action="login.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder=" Enter Password" required>
    </div>
    <div class="form-group ">
        <button type="submit" class="btn btn-block" id="submitbtn" value="submit" >Log In</button>
    </div>
    <div class="form-group">
        <p class="text-center"> or <br> Create an Account <a href="registration.php" id="login">Register Here!</a></p>
    </div>
</form>
</div>


<?php
require 'footer.php'
?>

<?php
require 'config.php';
ob_start();
session_start();

$_username = $_POST["username"];
$_password = $_POST["password"];

$sql = "SELECT userID FROM user WHERE _username = '$_username' AND _password = '$_password'";
$result = $conn->query($sql);
echo $sql;

if($result) {
    $count = mysqli_num_rows($result);
    echo $count;
    if($count == 1) {
        $_SESSION['login_user'] = $_username;
        // header("location: MainProductsPage.php");

    } else {

        echo "Your Login Name or Password is invalid";
      
    }
}


?>






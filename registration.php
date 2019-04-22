<?php 

require 'header.php';

?>
<nav class="navbar navbar-light bg-light justify-content-between"  id="mainnav">
                <a href="home.php"class="navbar-brand">eWholeFoods</a>
               </nav><br>
<div class="container">

<?php
require 'config.php';

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && isset($_SESSION["_username"])){
    header("location: mainproductspage.php?user=$_SESSION[_username]");
    exit();
}

$_username = $_POST["username"];
$_password = $_POST["password"];
$email = $_POST["email"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$is_admin = 0;
$error="";


if(isset($_username) && isset($_password) && isset($email)&&isset($first_name)&&isset($last_name)) {
$sql = "SELECT userID FROM user WHERE _username = '$_username'";
$result = $conn->query($sql);



if($result) {
    $count = mysqli_num_rows($result);
 
    if($count == 1) {

        $error = "Username is Taken";
    }
    else{

        $sql2 = "INSERT INTO user (_username, _password, email, first_name, last_name, is_admin) VALUES ('$_username', '$_password', '$email', '$first_name', '$last_name', $is_admin)";
        $result2= $conn->query($sql2);
        if ($result2) {
            header("location: mainproductspage.php?user=$_SESSION[_username]");
        }
        else {
            $error = "Try Again";
        }
               
    }
}
}
?>

<div class="accountForm"> 
 <h4> Create an Account</h4>

<form name="registration" action="registration.php" method="POST">
    <p class="error"> <?php echo $error;?> </p>
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







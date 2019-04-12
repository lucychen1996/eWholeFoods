<?php 

require 'header.php';

?>


<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && isset($_SESSION["_username"])){
    header("location: MainProductsPage.php?user=$_SESSION[_username]");
    exit;
}

require 'config.php';
$error = "";
$_username = $_POST["username"];
$_password = $_POST["password"];

if(isset($_username)&&isset($_password)){
$sql_exist = "SELECT userID FROM user WHERE _username = '$_username'";
$result_exist  = $conn->query($sql_exist );
echo $sql_exist;
if($result_exist){ 
    $count = mysqli_num_rows($result_exist);
    if($count == 1) {
        $sql_authenticate = "SELECT userID FROM user WHERE _username = '$_username' AND _password = '$_password'";
        $result_authenticate  = $conn->query($sql_authenticate );
        // echo $sql_authenticate ;

        if($result_authenticate ) {
            $count = mysqli_num_rows($result_authenticate );
            echo $count;
            if($count == 1) {
                $_SESSION["loggedin"] = true;
                $_SESSION["_username"] = $_username;
                header("location: MainProductsPage.php?user=$_SESSION[_username]");

            } else {
                $error = "Your Login Name or Password is invalid";
            }

            } 
    }
    else {
        $error = "No username found";
    
    }
}}

?>
<div class="accountForm"> 
 <h4> Log In</h4>

<form name="login" action="login.php" method="POST">
    <p class="error"> <?php echo $error;?> </p>
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



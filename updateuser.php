<?php
require 'config.php';

session_start();

$_userID = $_POST["id"]; 
$_username = $_POST["username"];
$_password = $_POST["password"];
$email = $_POST["email"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$is_admin = $_POST["access"];
$error="";


if(isset($_username) && isset($_password) && isset($email)&&isset($first_name)&&isset($last_name)) {
    
    $sql_update = "UPDATE user SET _username = '$_username', _password='$_password', email='$email', first_name='$first_name', last_name='$last_name', is_admin=$is_admin  WHERE userID = '$_userID'";
    echo  $sql_update;
    $result_update  = $conn->query($sql_update);
    if($result_update) {
        echo "yay";
        header("location: Users.php");
    }
    else {
            $error = "Something Went Wrong Try Again";
            $error = "<a href='edituser.php?id=".$row['userID']."'class='btn updatebtn'>Update User</a>";
            
    }
}
?>

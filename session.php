<?php
   require 'config.php';
   session_start();
   
   if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
    }

    else {

    $user_check = $_SESSION['login_user'];
    

    $ses_sql = "SELECT _usename FROM user WHERE _username = '$user_check'";
    $ses_result = $conn->query($ses_sql);
    
    if($ses_result) {

        $row = $ses_result->fetch_assoc();
        $login_session = $row['_username'];

        echo $user_check;
   }
}
   
   
?>
<?php
   session_start();
   
   session_destroy();
   $_SESSION["loggedin"] = NULL;
   $_SESSION["_username"] = NULL;
   $_SESSION["_userID"] = NULL;
   header("location:login.php");
   exit();
?>
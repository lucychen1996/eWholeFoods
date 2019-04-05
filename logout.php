<?php
   session_start();
   
   // session_destroy();
   $_SESSION["loggedin"] = NULL;
   $_SESSION["_username"] = NULL;
   header("location:home.php");
   exit();
?>
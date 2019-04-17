<?php 
session_start();
require 'config.php';

$_userID = $_GET["id"];

    $sql_delete = "DELETE FROM user WHERE userID = '$_userID'";
    $result_delete = $conn->query($sql_delete);
    if($result_delete) {

        header("location: Users.php");
    }
    else {
            $error = "Something Went Wrong";
    }

?>
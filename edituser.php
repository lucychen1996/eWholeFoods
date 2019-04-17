<?php 

require 'adminnavbar.php';
session_start();
require 'config.php';

?>

<a href="Users.php" class="btn addbtn">See All Customers</a> 

<?php

$_userID = $_GET["id"];

  
    $sql_get = "SELECT * FROM user WHERE userID = '$_userID'";
    $result_get  = $conn->query($sql_get);
    if($result_get) {
        $row = $result_get->fetch_assoc();

        $_userID = $row["userID"];
        $_username = $row["_username"];
        $_password = $row["_password"];
        $_email = $row["email"];
        $_first_name = $row["first_name"];
        $_last_name = $row["last_name"];
        $_is_admin = $row["is_admin"];

    }
    else {
            $error = "Something Went Wrong";
    }

?>
<h4><?php echo $status?></h4>
<h3>Update Customer</h3>
<form name="update" action="updateuser.php?" method="POST">
    <input type="hidden" name="id" value=<?php echo $_userID;?>>
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="username" name="username" value=<?php echo $_username;?> required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="text" class="form-control" id="password" name="password" value=<?php echo $_password;?> required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="email" name="email" value=<?php echo $_email;?> required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value=<?php echo $_first_name;?> required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value=<?php echo $_last_name;?> required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Access (0:user 1:admin)</label>
        <input type = "number" min=0 max=1 class="form-control" type="text" name="access" value=<?php echo $_is_admin;?>>
    </div>
    <div class="form-group ">
        <button type="submit" class="btn btn-block" id="submitbtn" value="submit" >Update</button>
    </div>
</form>

<?php
require 'footer.php'
?>
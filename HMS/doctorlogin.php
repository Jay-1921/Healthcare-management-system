<?php
session_start();
include("include/connection.php");

if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['login'])) {

    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $error = array();

    if (empty($username)) {
        $error['login'] = "Enter Username";
    } elseif (empty($password)) {
        $error['login'] = "Enter password";
    }


    if (empty($username)) {
        $error['login'] = "Enter Username";
    }else if(empty($password)){
        $error['login'] = "Enter Password";
    }else if(!empty($row) && $row['status'] == "Pending") {
        $error['login'] = "Please wait for admin to confirm";
    } else if(!empty($row) && $row['status'] == "Rejected") {
        $error['login'] = "Try Again Later";
    }

    if (count($error) == 0) {
        // Escape variables for security
        $username = mysqli_real_escape_string($connect,$username);
        $password = mysqli_real_escape_string($connect,$password);

        $query = "SELECT * FROM doctors WHERE username ='$username' AND password ='$password'";
        $result = mysqli_query($connect,$query);

      if (mysqli_num_rows($result) < 1) {

            header('Location: http://localhost/HMS/doctor/index.php');
            exit();
        } else {
            echo "<script>alert('Invalid username or password')</script>";
        }
    }
}


if (isset($error[ 'login'])) {
    $l = $error ['login'];
    if (isset($show['login'])) {
        $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
        $show="";
    }
}
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Login Page</title>
</head>
<body style="background-image: url(img/back.jfif);background-size: cover;
    background-repeat:no-repeat">

    <?php
        include("include/header.php");

    ?>

        
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron my-3">
                    <h5 class="text-center my-2">Doctors Login</h5>   
                        
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control"
                            autocomplete="off" placeholder="Enter Username">
                        </div>


                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control"
                            autocomplete="off">
                        </div>
                        <input type="submit" name="login" class ="btn btn-success" value="Login">
                        <p>I dont have an account <a href="apply.php">Apply Now!!!</a></p>
                        
                    </form>


    
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
  </div>
</body>
</html>
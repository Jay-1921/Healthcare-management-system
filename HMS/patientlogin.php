<?php
session_start();
include("include/connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $error = array();

    if (empty($username)) {
        $error['patient'] = "Enter Username";
    } elseif (empty($password)) {
        $error['patient'] = "Enter password";
    }

    if (count($error) == 0) {
        // Escape variables for security
        $username = mysqli_real_escape_string($connect,$username);
        $password = mysqli_real_escape_string($connect,$password);

        $query = "SELECT * FROM admin WHERE username ='$username' AND password = '$password'";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) == 1){
            $_SESSION['patient'] = $username; // Fixed the variable name

            header('Location: http://localhost/HMS/patient/index.php');
            exit();
        } else {
            echo "<script>alert('Invalid account');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Patient Login Page</title>
</head>
<body style="background-image: url(img/back.jfif);background-repeat: no-repeat;
    background-size: cover;">
    <?php
    include("include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 jumbotron">
                    <h5 class="text-center my-3">Patient Login</h5>
                    <form method="post">

                        <div class="from-group">

                            <label>Username</label>

                            <input type="text" name="uname" class="from-control" autocomplete="off" 
                            placeholder= " Enter Username">


                        </div>

                        <div class="from-group">

                            <label>Password</label>

                            <input type="password" name="pass" class="from-control" autocomplete="off" 
                            placeholder= " Enter Password">

                        </div>

                        <input type="submit" name="login" class="btn btn-info my-3" value="Login">
                        <p>I don't have an account<a href="account.php"> Click here.</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>

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
        $error['admin'] = "Enter Username";
    } elseif (empty($password)) {
        $error['admin'] = "Enter password";
    }

    if (count($error) == 0) {
        // Escape variables for security
        $username = mysqli_real_escape_string($connect, $username);
        $password = mysqli_real_escape_string($connect, $password);

        $query = "SELECT * FROM admin WHERE username ='$username' AND password = '$password'";
        $result = mysqli_query($connect, $query);

      if (mysqli_num_rows($result) == 1) {
            header('Location: http://localhost/HMS/admin/index.php');
            exit();
        } else {
            echo "<script>alert('Invalid username or password')</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Admin Login Page</title>
</head>
<body>
	<?php
	include("include/header.php");
	?>
	<div class="margin-top: 60px"></div>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron">
					<form method="post">						
							<?php

							if(isset($error['admin'])){
								$sh = $error['admin'];

								$show = "<h4 class='alert alert-danger'>$sh</h4>";
							}
							else{
								$show = "";

							}
							echo $show;
							?>



						<img src="image/login.png" class="col-mid-12">
						<div class="Form-Group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username" required=true>
						</div>
						<div class="Form-Group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" placeholder="Password" require=true>
							
						</div>

						<input type="submit" class="btn btn-success" value = "Login" name="login">


					</form>
				</div>
				<div class="col-md-3"></div>
				
			</div>
			
		</div>
		
	</div>
</body>
</html>
<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Profile</title>
</head>

<body>
<?php
	include("../include/header.php");
	include("../include/connection.php")
?>

<div class="container-fluid">
	<div class="col-mid-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px;">
				<?php
				
				include("sidenav.php");
				if (isset($_SESSION['patient'])) {
				$patient =  $_SESSION['patient'];
				$query = "SELECT * FROM patient WHERE username='$patient'";
				$res = mysqli_query($connect,$query);
				$row = mysqli_fetch_array($res);
			}
				 ?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
						
							<?php
								if(isset($_POST['upload']))
								{
									$img = $_FILES['img']['name'];
									if(empty($img)){
									}else
									{
										$query = "UPDATE patient SET profile='$img' WHERE username='$patient'";
										$res  =mysqli_query($connect,$query);
										if($res)
										{
											move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
										}
									}
								}
							?>
						<h5>My Profile</h5>
							<form method="post" enctype="multipart/form-data">
								<?php
									if (isset($_SESSION['patient'])) {
										$patient =  $_SESSION['patient'];
										$query = "SELECT * FROM patient WHERE username='$patient'";
										$res = mysqli_query($connect,$query);
										$row = mysqli_fetch_array($res);
									}
									echo "<img src='img/".$row['profile']."'
									 class ='col-md-12' style ='height: 250px;'>";
								 ?>
								 
								 <input type="file" name="img" class="form-control my-2">
								 <input type="submit" name="upload" class="btn btn-info" value="Update Profile">
							</form>
							
							<table class="table table-bordered">
								<div>
									    <?php
									    echo '<table class="table table-bordered">';
									    echo '<tr>';
									    echo '<th colspan="2" class="text-center">My Details</th>';
									    echo '</tr>';
									    
									    echo '<tr>';
									    echo '<td>Firstname</td>';
									    echo '<td>' . $row['firstname'] . '</td>';
									    echo '</tr>';
									    
									    echo '<tr>';
									    echo '<td>Surname</td>';
									    echo '<td>' . $row['surname'] . '</td>';
									    echo '</tr>';
									    
									    echo '<tr>';
									    echo '<td>Username</td>';
									    echo '<td>' . $row['username'] . '</td>';
									    echo '</tr>';
									    
									    echo '<tr>';
									    echo '<td>Email</td>';
									    echo '<td>' . $row['email'] . '</td>';
									    echo '</tr>';
									    
									    echo '<tr>';
									    echo '<td>Phone Number</td>';
									    echo '<td>' . $row['phone'] . '</td>';
									    echo '</tr>';
									    
									    echo '<tr>';
									    echo '<td>Gender</td>';
									    echo '<td>' . $row['gender'] . '</td>';
									    echo '</tr>';
									    
									    echo '<tr>';
									    echo '<td>Country</td>';
									    echo '<td>' . $row['country'] . '</td>';
									    echo '</tr>';
									    
									    echo '</table>';
									    ?>
									</div>

						<div class="col-md-6">
							<h5 class="text-center">Change Username	</h5>
								<?php 
								if(isset($_POST['update']))
								{
									$uname=$_POST['uname'];
									if(empty($uname)){
									}else
									{
										$query="UPDATE patient SET username='$uname' WHERE username='$patient'";
										$res=mysqli_query($connect,$query);
										if($res)
										{
											$_SESSION['patient']=$uname;
										}
									}
								}
								?>
							<form method="post">
								<label>Enter Username</label>
								<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
								<input type="submit" name="update" class="btn btn-info my-2" value="Update Username">
							</form>
								<?php 
								if(isset($_POST['change']))
								{
									$old=$_POST['old_pass'];
									$new=$_POST['new_pass'];
									$con=$_POST['con_pass'];
									
									$q="SELECT * FROM patient WHERE username='$patient'";
									$res=mysqli_query($connect, $q);
									$row=mysqli_fetch_array($res);
									if(empty($old)){
										echo "<script>alert('Enter old Password')</script>";
									}else if(empty($new)){
										echo "<script>alert('Enter new Password')</script>";
									}else if($con!=$new){
										echo "<script>alert('Both passwords do not match')</script>";
									}else if($old!=$row['password']){
										echo "<script>alert('Check the password')</script>";
									}else{
										$query="UPDATE patient SET password='$new' WHERE username='$patient'";	
										mysqli_query($connect,$query);
									}
								}
								?>
							
							
							
		
							<h5 class="my-4 text-center">Change Password</h5>
							<form method="post">
								<label>Old Password</label>
								<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter old password"> 
								<label>New Password</label>
								<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter new password"> 
								<label>Confirm Password</label>
								<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter confirm password">
								<input type="submit" name="change" class="btn btn_info my-2" value="change password">  
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
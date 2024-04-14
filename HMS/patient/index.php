<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Dashboard</title>
</head>
<body>

	<?php
		include("../include/header.php");
		include("../include/connection.php");
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-nd-2" style="margin-Left: -30px;">
					<?php
						include("sidenav.php");
					?>
				</div>
				<div class="col-md-10">
					<h5 class="my-3">Patient Dashboard</h5>
					<div classes="col-md-12">
						<div class="row-md-2">
							<div class="row">
								<div class="col-md-3 bg-info mx-2" style="height: 150px;">
									<div class="col-md-11">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4"> My Profile</h5>
											</div>
											<div class="col-md-4">
												<a href="profile.php">
													<i class="fa fa-user-circle fa-3x my-4" style="color: white;"> </i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 bg-warning mx-2" style="height: 150px;">
									<div class="col-md-14">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4"> Book Appointment     </h5>
											</div>
											<div class="col-md-4">
												<a href="appointment.php">
													<i class="fa fa-calendar fa-3x my-4" style="color: white;"> </i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 bg-success mx-2" style="height: 150px;">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4"> My Invoice</h5>
											</div>
											<div class="col-md-4">
												<a href="invoice.php">
													<i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"> </i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
							<?php
								if(isset($_POST['send']))
								{
									$title=$_POST['send'];
									$message=$_POST['message'];
									
									if(empty($title))
									{
									
									}
									elseif(empty($message))
									{
									}
									else
									{
										$user = $_SESSION['patient'];
										$query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message', '$user', NOW())";
										$res = mysqli_query($connect,$query);
										if($res) 
										{
											echo"<script>alert('You have sent your report')</script>";
										}
										
									}
								}
							?>
						
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3">
								</div>
								<div class="col-md-6 jumbotron bg-info my-5">
									<h5 class="text-center " style="color: white; font-size:25px; ">Send a Report</h5>
									<form method="post">
										<label style="color: white; font-size:20px;">Title</label>
										<input type="text " name=" title" autocomplete="off" class="form-control" placeholder="Enter title of the report">
										<label style="color: white; padding-top: 20px;  font-size:20px;">Message</lable>
										<input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message" size="70">
										<input type="submit" name="send" value="Send Report" class="btn btn-success my-2"> 
									</form>
								</div>
								<div class="col-md-3">
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
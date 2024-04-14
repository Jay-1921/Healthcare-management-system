<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        .box {
            height: 130px;
            margin-bottom: 20px;
            border-radius: 5px; 
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <?php
    include("../include/header.php");
    
    include("../include/connection.php");

    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                include("sidenav.php");
                ?>
            </div>
            <div class="col-md-10">
                <h4 class="my-2">Admin Dashboard</h4>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="box bg-success mx-2">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                                    $ad=mysqli_query($connect,"SELECT * FROM admin");
                                    $num=mysqli_num_rows($ad);
                                    ?>                                    
                                    
                                    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num;?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Admin</h5>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <a href="admin.php"><i class="fa fa-users-cog fa-3x my-4" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="box bg-info mx-2">
                            <div class="row">
                                <div class="col-md-8 ">
                                    <?php
                                       
                                       $doctor=mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'");

                                       $num2=mysqli_num_rows($doctor);
                                    ?>
                                    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2;?></h5>
                                    <h5 class="text-white"> Total</h5>
                                    <h5 class="text-white"> Doctors</h5>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <a href="doctor.php"><i class="fa fa-user-md fa-3x" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Patients Box -->
                    <div class="col-md-4">
                        <div class="box bg-warning mx-2">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                                    $p=mysqli_query($connect, "SELECT * FROM patient");
                                    $pp=mysqli_num_rows($p);
                                    ?>
                                    <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Patients</h5>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <a href="patient.php"><i class="fa fa-procedures fa-3x" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Reports Box -->
                    <div class="col-md-4">
                        <div class="box bg-danger mx-2">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                                    $re= mysqli_query($connect,"SELECT * FROM report");
                                    $rep=mysqli_num_rows($re);
                                    ?>
                                    <h5 class="my-2 text-white" style="font-size: 30px;"> <?php echo $rep; ?> </h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Reports</h5>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <a href="report.php"><i class="fa fa-flag fa-3x" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- job requests Box -->
                    <div class="col-md-4">
                        <div class="box bg-warning mx-2">
                            <div class="row">
                                <div class="col-md-8">
                                        <?php
                                                $job = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pending'");
                                                $num1 = mysqli_num_rows($job);
                                        ?>


                                    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1; ?></h5>
                                    <h5 class="text-white">Job</h5>
                                    <h5 class="text-white">Requests</h5>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <a href="jobrequest.php"><i class="fa fa-book-open fa-3x" style="color: white;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Income Box -->
                    <div class="col-md-4">
                        <div class="box bg-primary mx-2"> <!-- Assuming bg-primary for income, you can adjust it as needed -->
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                                    $in=mysqli_query($connect,"SELECT sum(amount_paid) as profit FROM income");
                                    $row=mysqli_fetch_array($in);
                                    $inc=$row['profit'];
                                    ?>

                                    <h5 class="my-2 text-white" style="font-size: 30px;"> <?php echo "$$inc";?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Income</h5>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <a href="income.php"><i class="fa fa-money-check-alt fa-3x" style="color: white;"></i></a>
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





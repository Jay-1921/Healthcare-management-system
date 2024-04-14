
<!DOCTYPE html>
<html>
<head>
    <title>HMS Home Page</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Navbar styles */
        .navbar-info {
            background-color: #17a2b8;
            padding: 20px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
        }

        .navbar-nav .nav-item a {
            color: #fff;
            font-weight: bold;
        }

        .navbar-nav .nav-item a:hover {
            color: #ffc107;
        }

        /* Container styles */
        .container {
            padding: 20px;
        }

        /* Card styles */
        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        
    </style>
</head>
<body>
    <?php
    include("include/header.php");
    ?>

    <div style="margin-top: 20px;">
        
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mx-1 shadow">
                    <img src="image/more info.jpeg" style="width: 10px,height: 10px;">

                    <h5 class="text-center">Click here for more info </h5>

                    <a href="aboutus.php">
                        <button class="btn btn-success my-3" style="margin-left: 30%;">More Info</button>

                </div>
                <div class="col-md-3 mx-1 shadow">
                    <img src="image/patient.jpeg" style="width: 100%;">

                    <h5 class="text-center">Create account so we can take care of you </h5>

                    <a href="account.php">
                        <button class="btn btn-success my-3" style="margin-left: 30%;">Create Account</button>

                </div>
                <div class="col-md-3 mx-1 shadow">
                    <img src="image/doctor.jpeg" style="width: 100%;">

                    <h5 class="text-center">We are employing Doctors </h5>

                    <a href="apply.php">
                        <button class="btn btn-success my-3" style="margin-left: 30%;">Apply Now!!</button>


                </div>
            </div>

        </div>
    </div>
<footer> <p class="text-center" style="margin-bottom: 100%;">
    This project is created by 
                        1) Jay
                        2) Heer
                        3) Stuti
                        4) Snehal
                    </p>
</footer>
</body>
</html>

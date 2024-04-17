
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
            background-image: url(image/b7.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Navbar styles */
        .custom-navbar {
              background-color: #00008B;
            }

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
        <h1 class="text-right-center" style="font-family:Arial, sans-serif; text-align: right; padding-right: 20px; margin-top:200px ; font-weight: bold;" >Hridaya Healthcare</h1>
      <p class="text-right-center" style="font-family: Arial, sans-serif; text-align: right; padding-right: 20px;margin-top: 50px; font-size: 35px; font-weight: italic;">Your Trusted Partner on the Path to Better Health:<br> Offering Compassionate Guidance, Advanced Treatments,and <br>a Personalized Approach to Supporting Your Health and Happiness</p>

    </div>
    

</body>
</html>

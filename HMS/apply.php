<?php
include("include/connection.php");
if (isset($_POST['apply'])) {
    $firstname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $surname = isset($_POST['sname']) ? $_POST['sname'] : '';
    $username = isset($_POST['uname']) ? $_POST['uname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $country= isset($_POST['country']) ? $_POST['country'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';
    $confirm_password = isset($_POST['con_pass']) ? $_POST['con_pass'] : '';
    $error = array();


    if (empty($firstname)) {
        $error['apply'] = "Enter Firstname";
    }else if(empty($surname)) {
        $error['apply'] = "Enter Surname";
    }else if(empty($username)) {
        $error['apply'] ="Enter Username";
    }else if(empty($email)) {
        $error['apply'] = "Enter Email Address";
    }else if(empty($gender)) {
        $error['apply'] ="Select Gender";
    }else if(empty($phone)) {
        $error['apply'] = "Enter Phone Number";
    }else if(empty($country)) {
        $error['apply'] = "Select Country";
    }else if(empty($password)){
        $error['apply'] = "Enter Password";
    }else if($confirm_password != $password){
        $error['apply'] = "Both password does not match";
    }


    if (count($error)== 0) {
        $query ="INSERT INTO doctors(firstname,surname,username,email,gender,phone,country,password,salary,data_reg,status,profile) 
        VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pending','doctor.jpg')";
        $result = mysqli_query($connect,$query);
        if($result) {

            echo "<script>alert( 'You have Successfully Applied')</script>";
                header('Location:http://localhost/HMS/doctorlogin.php');
        }else{
                echo "<script>alert('failed')</script>";
        }
    }
    }


    if (isset($error['apply'])) {
        $s = $error ['apply'];
        $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
    }else{
        $show="";
    }

?>




<!DOCTYPE html>
<html>
<head>
    <title>Apply Now!!!</title>
</head>
<body style="background-image: url(img/back.jfif);background-size: cover;">

    <?php
    include("include/header.php");
    ?>

        
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6  my-3 jumbotron">
                <h5 class="text-center ">Apply Now!!!</h5>   
                    <div>
                        <?php echo $show;?>
                    </div>
                    
                    <form method="post">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control"
                            autocomplete="off" placeholder="Enter Firstname" value="
                            <?php if(isset($_POST['fname'])) echo $_POST['fname'];?>">
                        </div>


                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control"
                            autocomplete="off"  placeholder="Surname"  value="
                            <?php if(isset($_POST['sname'])) echo $_POST['sname'];?>">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control"
                            autocomplete="off" placeholder="Enter Username"  value="
                            <?php if(isset($_POST['uname'])) echo $_POST['uname'];?>">
                        </div>
-

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                            autocomplete="off"  placeholder = "Enter Email Address"  value="
                            <?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                        </div>


                        <div class="form-group" class="form-control">
                            <label>Select Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                <option value="Female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control"
                            autocomplete="off" placeholder="Enter Phone Number"   value="
                            <?php if(isset($_POST['phone'])) echo $_POST['phone'];?>">
                        </div>

                        <div class="form-group">
                            <label>Select Country</label>
                            <select name="country" class="form-control">
                            <option value="">Select Country</option>
                            <option value="India">India</option>
                            <option value="Russia">Russia</option>
                            <option value="Ghana">Ghana</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control"
                            autocomplete="off"  placeholder = "Enter Password">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control"
                            autocomplete="off"  placeholder = "Enter Confirm Password">
                        </div>

                        <input type="submit" name="apply"  value="Apply Now" class ="btn btn-success">
                         <p>I already have an account<a href="doctorlogin.php"></p></a>
                    </form>                    
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
  </div>
 </div>
</div>
</div>
</body>
</html>
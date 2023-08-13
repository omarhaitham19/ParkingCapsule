<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="ownerform.css">
   <title>Parking Owner Sign up</title>
   <style>
    
        .logo a {
            color: white;
            text-decoration: none;
        }
        @media (max-width: 800px) {
  .poll-image-container {
    display: none;
  }
}
        </style>
</head>
<body>
    <header>
        <div class="logo"> <a href="home.php"> Parking Capsule </a></div>
        <nav>
        <?php
        if (isset($_SESSION['email'])) {
            echo'<a href=""><img src="Account circle.svg" alt="Add"></a>';
            echo'<a href="logout.php"><img style="width:30px; height:30px;" src="logout.svg" alt="Add"></a>';

        } else {
            echo '<a href="signup&in.php" class="signin">Sign In</a>';
            echo '<a href="signup&in.php" class="signup">Sign Up</a>';
        }
        ?>
    </nav>
      </header>
      <div class="poll-image-container">
  <img id="poill" src="poill.svg" alt="parkingowner">
</div>
    <div class="container">
        <form action="" method="POST"  onsubmit="return validateForm()">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
            
                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" name="fname" placeholder="Enter your first name" required>
                        </div>
            
                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="lname" placeholder="Enter your last name" required>
                        </div>
            
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="mail" placeholder="Enter your email" required>
                        </div>
            
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="mobile" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="pass1" placeholder="Enter your password" required>
                        </div>
                        <div class="input-field">
                            <label>Confirm Password</label>
                            <input type="password" name="pass2" placeholder="Confirm your password" required>
                        </div>
                    </div>
                </div>
            
                <div class="details ID">
                    <span class="title">Garage Details</span>
            
                    <div class="fields">
                        <div class="input-field">
                            <label>License Number</label>
                            <input type="number" name="license" placeholder="Enter License Number" required>
                        </div>
                    </div>
            
                    <button name="register" class="nextBtn">
                        <span class="btnText">SIGN UP</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
  function validateForm() {
    var password = document.getElementsByName("pass1")[0].value;
    var confirmPassword = document.getElementsByName("pass2")[0].value;

    if (password !== confirmPassword) {
      alert("Passwords do not match");
      return false; // Prevent form submission
    }

    return true; // Allow form submission
  }
</script>



<?php

if(isset($_POST["register"])){
    $fname = mysqli_real_escape_string($con,$_POST["fname"]);
    $lname = mysqli_real_escape_string($con,$_POST["lname"]);
    $email = mysqli_real_escape_string($con,$_POST["mail"]);
    $pass = mysqli_real_escape_string($con,$_POST["pass1"]);
    $confirmpass= mysqli_real_escape_string($con,$_POST["pass2"]);
    $mobile= mysqli_real_escape_string($con,$_POST["mobile"]);
    $license= mysqli_real_escape_string($con,$_POST["license"]);


    if($pass!=$confirmpass){
        echo "pass doesnt match";
    }
    else{
        $qy = "SELECT COUNT(*) AS count FROM parking_owner WHERE email = '$email'";
        $rt = mysqli_query($con, $qy);
        $row = mysqli_fetch_assoc($rt);
        $emailCount = $row['count'];

        if ($emailCount > 0) {       
            echo '<script language="javascript">';
            echo 'alert("This email already exists!")';
            echo '</script>';
            
       } else {
     
        $owner = "INSERT INTO `parking_owner`(`f_name`, `l_name`, `email`, `password`, `status`,  `phone_number`, `garage_license`) VALUES ('$fname', '$lname', '$email', '$pass', 'active', '$mobile' , '$license')";
        mysqli_query($con,$owner);
        $_SESSION['email']=$email;
        $o="SELECT `id` FROM parking_owner WHERE `email` = '{$_SESSION['email']}'";
        $h=mysqli_query($con,$o);
        if ($row = mysqli_fetch_assoc($h)) {
        $owner_id=$row['id'];
        $_SESSION['owner_id'] = $owner_id;
        } 

        $query = "SELECT id FROM admin";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $adminId = $row['id'];
            $query2 = "INSERT INTO supervise (owner_id, admin_id) VALUES ('" . $_SESSION['owner_id'] . "', '" . $adminId . "')";
            $resultInsert = mysqli_query($con, $query2);
        }
        
        
        header("location: addgarage.php");
            }
        }
    }


?>


</body>
</html>
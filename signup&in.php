<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
	<script src="https://kit.fontawesome.com/9ff4d293d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method = "POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
				<i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" name="email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pass" required />
            </div>
            <input type="submit" value="SIGN IN" class="btn solid" name = "submit" />
            <div class="social-media">
             
            </div>
          </form>
          <form action="" method="POST" class="sign-up-form" onsubmit="return validateForm()">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="First Name" name= "firstname" required  />
            </div>
			<div class="input-field">
				<i class="fas fa-user"></i>
				<input type="text" placeholder="Last Name" name ="lastname" required />
			  </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name = "email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pass" id="password" required />

            </div>
			<div class="input-field">
				<i class="fas-sharp fa-solid fa-lock"></i>
        <input type="password" placeholder="Confirm Password" name="pass2" id="confirmPassword" required />
			  </div>

			  <div class="input-field">
				<i class="fa-solid fa-mobile-button"></i>
				<input type="number" placeholder="Phone Number" name = "phone" required />
			  </div>
			 
            <input type="submit" class="btn" value="SIGN UP" name = "signup" />
            
            <div class="social-media">
              
              
              
              
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Don't waste your time and sign up with us and enjoy our services.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="signin.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already Have an Account ?</h3>
            <p>
              Sign in now and let us help you find your parking spot.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="signup.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>

    
<?php

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pass = mysqli_real_escape_string($con, $_POST['pass']);

  $customer_query = "SELECT * FROM `customer` WHERE `email`='$email' AND `password`='$pass'";
  $customer_result = mysqli_query($con, $customer_query);

  $owner_query = "SELECT * FROM `parking_owner` WHERE `email`='$email' AND `password`='$pass'";
  $owner_result = mysqli_query($con, $owner_query);

  $admin_query = "SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$pass'";
  $admin_result = mysqli_query($con, $admin_query);


  if (mysqli_num_rows($customer_result) == 1) {
      $customer_data = mysqli_fetch_assoc($customer_result);
      $customer_status = $customer_data['status'];
  
      if ($customer_status == 'suspended') {
        echo '<script language="javascript">';
        echo 'alert("Your account is suspended. Please contact support for assistance.")';
        echo '</script>';
        
      } else {
          $_SESSION['email'] = $email;
          $t = "SELECT `id` FROM `customer` WHERE `email` = '{$_SESSION['email']}'";
          $h = mysqli_query($con, $t);
  
          if ($row = mysqli_fetch_assoc($h)) {
              $customer_id = $row['id'];
              $_SESSION['customer_id'] = $customer_id;
  
              // Check if customer ID exists in the vehicle table
              $vehicle_query = "SELECT * FROM `vehicle` WHERE `customer_id`='$customer_id'";
              $vehicle_result = mysqli_query($con, $vehicle_query);
  
              if (mysqli_num_rows($vehicle_result) > 0) {
                  header('location: home.php');
                  exit();
              } else {
                  header('location: car.php');
                  exit();
              }
          } else {
          }
      }
        
      
  } elseif (mysqli_num_rows($owner_result) == 1) {
      $owner_data = mysqli_fetch_assoc($owner_result);
      $owner_status = $owner_data['status'];
  
      if ($owner_status == 'suspended') {
        echo '<script language="javascript">';
        echo 'alert("Your account is suspended. Please contact support for assistance.")';
        echo '</script>';

      } else {
          $_SESSION['email'] = $email;
          $o = "SELECT `id` FROM `parking_owner` WHERE `email` = '{$_SESSION['email']}'";
          $m = mysqli_query($con, $o);
          if ($row2 = mysqli_fetch_assoc($m)) {
            $owner_id = $row2['id'];
            $_SESSION['owner_id'] = $owner_id;
            $spot_query = "SELECT * FROM `parking_spot` WHERE `owner_id`='$owner_id'";
            $spot_result = mysqli_query($con, $spot_query);

            if (mysqli_num_rows($spot_result) > 0) {
              header('location: ownerhome.php');
              exit();
          } else {
              header('location: addgarage.php');
              exit();
          }
      }
  }
}
   elseif(mysqli_num_rows($admin_result) == 1){
      $_SESSION['email'] = $email;
      header('location: admin.php');
      exit();
  } else {
    echo '<script language="javascript">';
    echo 'alert("Wrong Username or Password!")';
    echo '</script>';
    
  }
}




if(isset($_POST["signup"])){
  $first_name = mysqli_real_escape_string($con,$_POST["firstname"]);
  $last_name = mysqli_real_escape_string($con,$_POST["lastname"]);
  $email = mysqli_real_escape_string($con,$_POST["email"]);
  $pass = mysqli_real_escape_string($con,$_POST["pass"]);
  $confirmpass= mysqli_real_escape_string($con,$_POST["pass2"]);
  $phone= mysqli_real_escape_string($con,$_POST["phone"]);


  if($pass!=$confirmpass){
    echo '<script language="javascript">';
    echo 'alert("pass doesnt match")';
    echo '</script>';
  }
  else{
      $qy = "SELECT COUNT(*) AS count FROM customer WHERE email = '$email'";
      $rt = mysqli_query($con, $qy);
      $row = mysqli_fetch_assoc($rt);
      $emailCount = $row['count'];

      if ($emailCount > 0) {
        echo '<script language="javascript">';
        echo 'alert("This email already exists!")';
        echo '</script>';
        
     } else {
    
      



      $cust = "INSERT INTO `customer` (`f_name`, `l_name`, `email`, `password`, `status`, `phone_number`) VALUES ('$first_name', '$last_name', '$email', '$pass', 'active', '$phone')";
      mysqli_query($con,$cust);
      $_SESSION['email']=$email;
      $t = "SELECT `id` FROM `customer` WHERE `email` = '{$_SESSION['email']}'";
      $h = mysqli_query($con, $t);
      if ($row = mysqli_fetch_assoc($h)) {
          $customer_id = $row['id'];
          $_SESSION['customer_id'] = $customer_id;
      }
      $query = "SELECT id FROM admin";
      $result = mysqli_query($con, $query);
      
      // Assign the customer ID to all admins in the manage table
      while ($row = mysqli_fetch_assoc($result)) {
          $adminId = $row['id'];
          $query = "INSERT INTO manage (customer_id, admin_id) VALUES ('" . $_SESSION['customer_id'] . "', '" . $adminId . "')";
          $resultInsert = mysqli_query($con, $query);
      }
      
      
      
      header("location: car.php");
          }
      }
  }


?>
  </body>
</html>
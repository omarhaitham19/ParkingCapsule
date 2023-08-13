<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <title>Admin Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Ubuntu', Arial, sans-serif;
      font-size: 16px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    header {
      width: 100%;
      height: 52px;
      background-color: #00A3FF;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    .logohd {
      font-size: 24px;
      font-weight: bold;
      margin-top: 5px;
      margin-left: 10px;
      color: white;
    }

    .logohd a {
      text-decoration: none;
      color: white;
    }

    nav {
      display: flex;
      gap: 30px;
      align-items: center;
      margin-right: 10px;
      margin-top: 5px;
    }

    nav a {
      text-decoration: none;
      color: white;
      font-size: 18px;
    }

    .signup {
      border: 1px solid white;
      border-radius: 5px;
      padding: 5px 10px;
    }

    .signup::before {
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      border: 1px solid white;
    }

    h1 {
      color: #00A3FF;
    }

    .logo {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100px;
    }

    .logo img {
      height: 80%;
      width: auto;
    }



    .links {
      text-align: center;
      line-height: 1.5;
      margin-top: 0px;
    }

    .links a {
      display: block;
    }

    .links img {
      display: block;
      margin: 0 auto;
      max-width: 100%;
      height: auto;
    }

  .suspension {
    text-align: left;
    margin-left:10%;
    padding-left:0;
    color: #00A3FF;
  }

    .admin-section {
      display: flex;
      flex-direction: column;


      margin-top: 50px;
    }

    .admin-section h2 {
      margin-bottom: 20px;
      color: #00A3FF;
    }

    .admin-section .suspend-user,
    .admin-section .suspend-parking-owner {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
      text-align: left;
     margin-left:10%;
     padding-left:0;
    }

    .admin-section .suspend-user input[type="email"],
    .admin-section .suspend-parking-owner input[type="email"] {
      width: 600px;
      padding: 10px;
      margin-bottom: 10px;
    }

    .admin-section .suspend-user button,
    .admin-section .suspend-parking-owner button {
      padding: 10px 40px;
      background-color: #00A3FF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;


    }


  </style>
  <script>
  function showAlert() {
    alert("Successful");
    return true;
  }
</script>

</head>

<body>
  <header>


    <div class="logohd">
      <a href="admin.php">Parking Capsule </a>
    </div>
    <nav>
    <?php
    if (isset($_SESSION['email'])) {
      echo '<a href=""><img style="width:30px; height:30px;" src="Account circle.svg" alt="Add"></a>';
      echo '<a href="logout.php"><img style="width:30px; height:30px;" src="logout.svg" alt="Add"></a>';
    } else {
      echo '<a href="signup&in.php" class="signin">Sign In</a>';
      echo '<a href="signup&in.php" class="signup">Sign Up</a>';
    }
    ?>
  </nav>
  </header>
  <main>
    <div class="admin-section">
      <div style="text-align: center;">
  <a href="#"><img src="Group 35.svg" alt="log out"></a><br>
</div>
      <h2 class="Admin Dashboard" style="text-align: center;">Admin Dashboard</h2>
<h3 class="suspension" style="margin-left: 10%;">Suspension:</h3>
      <div class="suspend-user">
        <h4  style="text-align: left;
     margin-left:-600px;
     padding-left:0;style=">Suspend a User</h4>
        <div style="display: flex; align-items: center;">
          <form action="" method="post">
          <input type="email" name="user1" placeholder="Enter a user email" style="width: 550px; padding: 10px; margin-bottom: 10px;">
          <button name="suspenduser" type="submit" onclick="return showAlert()" style="padding: 10px 40px; background-color: #00A3FF; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 70px;">Suspend</button>
         </form>
        </div>
      </div>
      <div class="suspend-parking-owner">
        <h4 style="text-align: left;
     margin-left:-525px;
     padding-left:0;style=">Suspend a Parking Owner</h4>
        <div style="display: flex; align-items: center;">
                  <form action="" method="post">
          <input type="email" name="owner1" placeholder="Enter a parking user email" style="width: 550px; padding: 10px; margin-bottom: 10px;">
          <button name="suspendowner" type="submit" onclick="return showAlert()" style="padding: 10px 40px; background-color: #00A3FF; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 70px;">Suspend</button>
  </form>
        </div>
      </div>
        <h3 class="suspension" style="margin-left: 10%;">Remove Suspension:</h3>
      <div class="suspend-user">
        <h4  style="margin-left:-475px;"> Remove Suspension from a User</h4>
        <div style="display: flex; align-items: center;">
                          <form action="" method="post">
          <input type="email" name="user2" placeholder="Enter a user email" style="width: 550px; padding: 10px; margin-bottom: 10px;">
          <button type="submit" onclick="return showAlert()" name="activeuser" style="padding: 10px 40px; background-color: #00A3FF; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 70px;">Remove</button>
  </form>
        </div>
      </div>
      <div class="suspend-parking-owner">
        <h4 style="margin-left:-400px;">Remove Suspension from a Parking Owner</h4>
        <div style="display: flex; align-items: center;">
                                  <form action="" method="post">
          <input type="email" name="owner2" placeholder="Enter a parking user email" style="width: 550px; padding: 10px; margin-bottom: 10px;">
          <button type="submit" onclick="return showAlert()" name="activeowner" style="padding: 10px 40px; background-color: #00A3FF; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 70px;">Remove</button>
  </form>
        </div>
    </div>

  </main>
  <?php

if (isset($_POST['suspenduser'])) {
  $useremail1 = $_POST['user1'];
  
  // Check if email exists in the 'customer' table
  $checkUserEmail = "SELECT * FROM customer WHERE email = '$useremail1'";
  $result = mysqli_query($con, $checkUserEmail);
  
  if(mysqli_num_rows($result) > 0) {
    $suspuser = "UPDATE customer SET status = 'suspended' WHERE email = '$useremail1'";
    $rst1 = mysqli_query($con, $suspuser);

    if ($rst1) {
       // echo "Customer suspended successfully.";
    } else {
       // echo "Error suspending customer.";
    }
  } else {
    echo "Email does not exist.";
  }
}

if (isset($_POST['suspendowner'])) {
  $owneremail1 = $_POST['owner1'];
  
  $checkOwnerEmail = "SELECT * FROM parking_owner WHERE email = '$owneremail1'";
  $result = mysqli_query($con, $checkOwnerEmail);
  
  if(mysqli_num_rows($result) > 0) {
    $suspowner = "UPDATE `parking_owner` SET status = 'suspended' WHERE email = '$owneremail1'";
    $rst2 = mysqli_query($con, $suspowner);

    if ($rst2) {
        //echo "Owner suspended successfully.";
    } else {
       // echo "Error suspending owner.";
    }
  } else {
    echo "Email does not exist.";
  }
}

if (isset($_POST['activeuser'])) {
  $useremail2 = $_POST['user2'];
  
  $checkUserEmail = "SELECT * FROM customer WHERE email = '$useremail2'";
  $result = mysqli_query($con, $checkUserEmail);
  
  if(mysqli_num_rows($result) > 0) {
    $activeuser = "UPDATE `customer` SET status = 'active' WHERE email = '$useremail2'";
    $rst3 = mysqli_query($con, $activeuser);

    if ($rst3) {
      //  echo "Customer activated successfully.";
    } else {
       // echo "Error activating customer.";
    }
  } else {
    echo "Email does not exist.";
  }
}

if (isset($_POST['activeowner'])) {
  $owneremail2 = $_POST['owner2'];
  
  $checkOwnerEmail = "SELECT * FROM parking_owner WHERE email = '$owneremail2'";
  $result = mysqli_query($con, $checkOwnerEmail);
  
  if(mysqli_num_rows($result) > 0) {
    $activeowner = "UPDATE `parking_owner` SET status = 'active' WHERE email = '$owneremail2'";
    $rst4 = mysqli_query($con, $activeowner);

    if ($rst4) {
      //  echo "Owner activated successfully.";
    } else {
      //  echo "Error activating owner.";
    }
  } else {
    echo "Email does not exist.";
  }
}


?>












  




</body>

</html>

<?php 
include("connection.php");
session_start();
if (isset($_SESSION['email'])) {
$o="SELECT `id` FROM parking_owner WHERE `email` = '{$_SESSION['email']}'";
$h=mysqli_query($con,$o);
if ($row = mysqli_fetch_assoc($h)) {
     $owner_id=$row['id'];
     $_SESSION['owner_id'] = $owner_id;
  } else { }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/9ff4d293d6.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="menu.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
	<title>Parking Capsule</title>
	<link rel="stylesheet" href="ownerhome.css">
  <style>
   

    .menu {
    position: relative;
    display: inline-block;
    text-align: center;
  }
  
  .menu .submenu {
    display: none;
    position: absolute;
    top: 80%; /* Adjust the top position as per your preference */
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(255, 255, 255, 0.9); 
    min-width: 120px;
    padding: 8px;
    border-radius: 5px;
    z-index: 1;
    overflow: visible; /* Allow content overflow to be visible */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
  }
  
  .menu.open .submenu {
    display: block;
  }
  
  .menu .submenu a {
    display: block;
    padding: 8px 12px;
    text-decoration: none;
    color: #333;
  }
  .menu .submenu-line {
    display: block;
    height: 1px;
    background-color: #ddd;
    margin: 8px 0;
  }
  
  .menu .submenu a:hover {
    background-color: #ddd;
    color: #00A3FF;
  }
  
  .menu a.account-link {
    display: inline-block;
    padding: 4px;
    text-decoration: none;
    color: #333;
  }
  
  .menu .submenu a:hover,
  .menu .account-link:hover {
    background-color: transparent;
  }
  
  </style>
  
</head>
<body>
	<header>
		<div class="logo">Parking Capsule</div>
		<div class="header-center">
			<h2 class="Headtext">Dashboard</h2>
			<div class="search-box">
				<form class="check-btn-form" method="POST" action="timertest.php">
			  <input class="search-input" name="search" type="text" placeholder="Enter booking number" style="color: #929292;  height: 34px; padding: 0 15px;">
              <button name="check" class="check-btn" type="submit">check</button>
              </form>
			</div>
		  </div>
		  <nav>
    <?php
    if (isset($_SESSION['email'])) {
      echo '<div class="menu">
                <a href="#" class="account-link"><img src="Account circle.svg" alt="Account"></a>
                <div class="submenu">
                    <a href="settingsowner.php">Settings</a>
                    
                </div>
            </div>';
      echo '<a href="logout.php"><img style="width:30px; height:30px;" src="logout.svg" alt="Add"></a>';
    } else {
      echo '<a href="signup&in.php" class="signin">Sign In</a>';
      echo '<a href="signup&in.php" class="signup">Sign Up</a>';
    }
    ?>
  </nav>
	  </header>
    <?php

    

$monthly_spot= "SELECT `spots`, `spots_booked` FROM `parking_spot` WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'monthly' ";
$result2 = mysqli_query($con, $monthly_spot);

if ($result2 && mysqli_num_rows($result2) > 0) {
  $row2 = mysqli_fetch_assoc($result2);
  $spots_monthly = $row2['spots'];
  $spots_booked_monthly = $row2['spots_booked'];
} 

if (isset($_POST["addhourly"])) {
  $update1 = "UPDATE `parking_spot` SET `spots` = spots + 1 WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'hourly'";
  $update_query1 = mysqli_query($con, $update1);

  if ($update_query1) {
      // Fetch the updated value
      $hourly_spot = "SELECT `spots`, `spots_booked` FROM `parking_spot` WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'hourly' ";
      $result3 = mysqli_query($con, $hourly_spot);

      if ($result3) {
          $row = mysqli_fetch_assoc($result3);
          $spots_hourly = $row['spots'];
          $spots_booked_hourly = $row['spots_booked'];
      }
    }
  }


  if (isset($_POST["addmonthly"])) {
    $update2 = "UPDATE `parking_spot` SET `spots` = spots + 1 WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'monthly'";
    $update_query2 = mysqli_query($con, $update2);
  
    if ($update_query2) {
        // Fetch the updated value
        $monthly_spot = "SELECT `spots`, `spots_booked` FROM `parking_spot` WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'monthly' ";
        $result3 = mysqli_query($con, $monthly_spot);
  
        if ($result3) {
            $row = mysqli_fetch_assoc($result3);
            $spots_monthly = $row['spots'];
            $spots_booked_monthly = $row['spots_booked'];
        }
      }
    }


    if (isset($_POST["removehourly"])) {
      $update1 = "UPDATE `parking_spot` SET `spots` = spots - 1 WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'hourly'";
      $update_query1 = mysqli_query($con, $update1);

  if ($update_query1) {
      // Fetch the updated value
      $hourly_spot = "SELECT `spots`, `spots_booked` FROM `parking_spot` WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'hourly' ";
      $result3 = mysqli_query($con, $hourly_spot);

      if ($result3) {
          $row = mysqli_fetch_assoc($result3);
          $spots_hourly = $row['spots'];
          $spots_booked_hourly = $row['spots_booked'];
      }
    }
    }


    if (isset($_POST["removemonthly"])) {
      $update2 = "UPDATE `parking_spot` SET `spots` = spots - 1 WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'monthly'";
      $update_query2 = mysqli_query($con, $update2);
    
      if ($update_query2) {
          // Fetch the updated value
          $monthly_spot = "SELECT `spots`, `spots_booked` FROM `parking_spot` WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'monthly' ";
          $result3 = mysqli_query($con, $monthly_spot);
    
          if ($result3) {
              $row = mysqli_fetch_assoc($result3);
              $spots_monthly = $row['spots'];
              $spots_booked_monthly = $row['spots_booked'];
          }
        }
      }

    
      $hourly_spot= "SELECT `spots`, `spots_booked` FROM `parking_spot` WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'hourly' ";
      $result = mysqli_query($con, $hourly_spot);
  
  if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $spots_hourly = $row['spots'];
      $spots_booked_hourly = $row['spots_booked'];
     ?>
      <section class="upper-section">
        <p class="hourlyp">Hourly Spots Analysis:</p>
        <div class="vl"></div>
        <div class="Hourly-spots">
            <p class="spots-title">Number of Spots available</p>
            <p class="spots-num"><?php echo $spots_hourly; ?> </p>
			<form class="add-hourly" method="POST" action="">
            <button name="addhourly" class="hourly-add-btn">Add a Spot<img src="Plus (Traced).svg"></button>
		</form>
        </div>
		<div class="Hourly-booked">
            <p class="spots-booked">Number of Spots booked</p>
            <p class="num-booked"><?php echo $spots_booked_hourly; ?></p>
			<form class="remove-hourly"  method="POST" action="">
            <button name="removehourly" class="hourly-remove-btn">Remove a Spot<img src="Minus Sign (Traced).svg"></button>
		</form>
        </div>
  <?php  } 
        $monthly_spot= "SELECT `spots`, `spots_booked` FROM `parking_spot` WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'monthly' ";
        $result2 = mysqli_query($con, $monthly_spot);
        
        if ($result2 && mysqli_num_rows($result2) > 0) {
          $row2 = mysqli_fetch_assoc($result2);
          $spots_monthly = $row2['spots'];
          $spots_booked_monthly = $row2['spots_booked'];
        ?>

      </section>
	  <div class="mid-line"><hr class="line"></div>
	  <section class="lower-section">
        <p class="lower-title"> Monthly Spots Analysis:</p>
        <div class="vl2"></div>
        <div class="monthly-add">
            <p class="add-title">Number of Spots available</p>
            <p class="add-num"><?php echo $spots_monthly; ?></p>
			<form class="add-form"  method="POST" action="">
            <button name="addmonthly" class="monthly-add-btn">Add a Spot<img src="Plus (Traced).svg"></button>
		</form>
        </div>
		<div class="monthly-remove">
            <p class="remove-title">Number of Spots booked</p>
            <p class="remove-num"><?php echo $spots_booked_monthly; ?></p>
			<form class="remove-form" method="POST" action="">
            <button name="removemonthly" class="remove-btn">Remove a Spot<img src="Minus Sign (Traced).svg"></button>
		</form>
        </div>
      </section>
      


      <div class="change-section">
      <?php
$current = "SELECT `price` FROM `parking_spot` WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'monthly'";
$current_result = mysqli_query($con,$current);
if ($current_result) {
  $row = mysqli_fetch_assoc($current_result);
  $price = $row['price'];
}

if (isset($_POST["change"])) {
  $price = mysqli_real_escape_string($con, $_POST["price"]);
  $change = "UPDATE `parking_spot` SET `price`='$price' WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'monthly' ";
  $change_query = mysqli_query($con, $change);

  if ($change_query) {
    // Select the new price from the database
    $newPriceQuery = "SELECT `price` FROM `parking_spot` WHERE `owner_id` = {$_SESSION['owner_id']} AND `type` = 'monthly'";
    $newPriceResult = mysqli_query($con, $newPriceQuery);

    if ($newPriceResult && mysqli_num_rows($newPriceResult) > 0) {
      $row = mysqli_fetch_assoc($newPriceResult);
      $price = $row['price'];
    }
  else {
    echo "Failed to change price.";
  }
}
}


?>
<form method="POST" action="">
<div class="current-num">Current Price:<p class="price-num"><?php echo $price; ?></p> <sub style="
    position: relative;
    left: 2.3em;
    top: -0.3em;
">L.E</sub> </div>
<input class="change-input" type="text" name="price" placeholder="Change price per month">
<button name="change" class="change-btn">Change</button>
</form>

<?php }?>
      </div>
	  <!--<div class="set-container"> <a class="settings" href="addgarage.php">Go to Settings</a></div> -->
</body>
</html>
	  
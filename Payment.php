<?php
ob_start();
include("connection.php");
session_start();
if(isset($_POST['spot_id'])) {
  $_SESSION['spot_id'] = $_POST['spot_id'];
} else {}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/9ff4d293d6.js" crossorigin="anonymous"></script><body>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="menu.js"></script>
	<title>Parking Capsule</title>
	<link rel="stylesheet" href="payment.css">
    <style>
    .logo a {
      color: white;
      text-decoration: none;
    }

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
    <div class="logo">  <a href="home.php" > Parking Capsule </a>
</div>
<nav>
    <?php
    if (isset($_SESSION['email'])) {
        echo '<div class="menu">
                <a href="#" class="account-link"><img style="width:30px; height:30px;" src="Account circle.svg" alt="Account"></a>
                <div class="submenu">
                    <a href="settings.php">Settings</a>
                    <span class="submenu-line"></span>
                    <a href="myres.php">Reservations</a>
                    <span class="submenu-line"></span>
                    <a href="car.php">Add Vehicle</a>
                </div>
            </div>';
        echo '<a href="logout.php"><img style="width:30px; height:30px;" src="logout.svg" alt="Logout"></a>';
    } else {
        echo '<a href="signup&in.php" class="signin">Sign In</a>';
        echo '<a href="signup&in.php" class="signup">Sign Up</a>';
    }
    ?>
</nav>
  </header>
  <div class="menu-icons-container">
    <img src="Resources/Search.svg" alt="" class="icon"> 
    <img src="Resources/Profile.svg" alt="" class="icon"> 
    <img src="Resources/Cart.svg" alt="" class="icon"> 
 </div>


<?php
$spot_id = $_SESSION['spot_id']; // Retrieve the spot_id from the session and assign it to a variable
$query = "SELECT spots FROM parking_spot WHERE id = '$spot_id'";
$result = mysqli_query($con, $query); // Execute the query
$row = mysqli_fetch_assoc($result); // Fetch the result row

$remaining = $row['spots']; // Access the 'spots' column from the result row
if (isset($_SESSION['customer_id'])) {
   // Check if customer ID exists in the reservation table
   $reservationQuery = "SELECT * FROM reservation WHERE customer_id = '$_SESSION[customer_id]' AND status = 'pending' ";
   $reservationResult = mysqli_query($con, $reservationQuery);
   if (mysqli_num_rows($reservationResult) > 0) {
    $sql = "SELECT `booking_number` FROM reservation WHERE `customer_id` = '$_SESSION[customer_id]' AND status = 'pending'";
    $result = mysqli_query($con, $sql);
       $row = mysqli_fetch_assoc($result);
       $row['booking_number'];
       echo '<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">';
       echo '<img style="margin-bottom: 25px;" src="warning.svg" alt="Image">';
       echo '<p style="text-align: center; font-weight: bold; font-size: 20px;">You have already booked a spot and your booking number is: <span style="color: #00A3FF;">' . $row['booking_number'] . '</span></p>';
       echo '<a href="home.php" style="color: #00a3ff; text-decoration: underline; font-size: 20px; font-weight:bold;">Home</a>';

       echo '</div>';     
   } else {
       if ($remaining > 0) {
           $_SESSION['remaining'] = $remaining;
           ?>
           <div class="ill" >
    <img src="card.svg">
</div>
           <div class="form-container">
               <h2 class="form-title">Payment Details</h2>
               <form action="" method="POST" class="checkout-form">
                   <div class="input-line">
                       <label for="name">Name on card</label>
                       <input type="text" name="name" id="name" placeholder="Your name and surname" required>
                   </div>
                   <div class="input-line">
                       <label for="card-number">Card number</label>
                       <input type="text" name="card-number" id="card-number" placeholder="1111-2222-3333-4444" pattern="^\d{4}(-\d{4}){3}$" maxlength="19" required>
                   </div>
                   <div class="input-container">
                       <div class="input-line">
                           <label for="expiry-date">Expiring Date</label>
                           <input type="text" name="expiry-date" id="expiry-date" placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/\d{2}" required>
                       </div>
                       <div class="input-line">
                           <label for="cvc">CVC</label>
                           <input type="text" name="cvc" id="cvc" placeholder="***" pattern="\d{3}" maxlength="3" required>
                       </div>
                   </div>
                   <input name="proceed" type="submit" value="PROCEED">
               </form>
           </div>
           <?php
       } else {
        echo '<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">';
        echo '<img style="margin-bottom: 25px;" src="empty.svg" alt="Image">';
        echo '<p style="text-align: center; font-weight: bold; font-size: 20px;">Regrettably, there are no spots currently available for the requested location.</p>';
        echo '<a href="bookingg.php" style="color: #00a3ff; text-decoration: underline; font-size: 20px; font-weight:bold;">Back</a>';
        echo '</div>';     
         }
   }
}
?>


</body>
</html>


<?php
if (isset($_POST["proceed"])) {

   $cost_query = "SELECT `price` FROM parking_spot WHERE id = '$spot_id'";
   $cost_result = mysqli_query($con, $cost_query);
   $cost_row = mysqli_fetch_assoc($cost_result);
   $cost = $cost_row['price'];

   $type_query = "SELECT `type` FROM parking_spot WHERE id = '$spot_id'";
   $type_result = mysqli_query($con, $type_query);
   $type_row = mysqli_fetch_assoc($type_result);
   $type = $type_row['type'];
   $_SESSION['type'] = $type;




   $booked_query = "SELECT `spots_booked` FROM parking_spot WHERE `id` = '$spot_id'";
   $booked_result = mysqli_query($con, $booked_query);
   $booked_row = mysqli_fetch_assoc($booked_result);
   $booked = $booked_row['spots_booked'];
   $_SESSION['spots_booked']=$booked;
   $booked = $_SESSION['spots_booked'] + 1;
   $_SESSION['spots_booked']=$booked;
   $updatebooked = "UPDATE parking_spot SET spots_booked = $booked WHERE id = '$spot_id'";
   mysqli_query($con, $updatebooked);



   $remaining = $_SESSION['remaining'] - 1; // Decrement remaining by 1
   $_SESSION['remaining'] = $remaining; // Update the session variable
   
   // Update the database with the new remaining value
   $updateQuery = "UPDATE parking_spot SET spots = $remaining WHERE id = '$spot_id'";
   mysqli_query($con, $updateQuery);

   

   function generateBookingNumber() {
    $min = 10000000;
    $max = 99999999;
    return random_int($min, $max);
    }

    $bookingNumber = generateBookingNumber();
   
   $insquery = "INSERT INTO `reservation`(`status`, `cost`, `payment_method`, `type`, `booking_number`, `spot_id`, `customer_id`) VALUES ('pending', '$cost', 'visa', '$type' , '$bookingNumber', '$spot_id', '$_SESSION[customer_id]')";
    mysqli_query($con, $insquery);
    header("location: BookingConfirmation.php");
    ob_end_flush(); 
}
?>
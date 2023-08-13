<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="BookingConfirmation.css">
    <style>
        .logo a {
            color: white;
            text-decoration: none;
        }
        </style>
  </head>
  <body>
    <header>
        <div class="logo"><a href="home.php" >Parking Capsule </a>
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
    </header>
    <div class="center">
      <img src="Confirm1.svg" alt="Booking Confirmation">
    </div>
    <p class="center bold">Your Booking Number is:</p>
    <p class="center unique" id="booking-number">
    <?php
$sql = "SELECT `booking_number` FROM `reservation` WHERE `customer_id` = '{$_SESSION['customer_id']}' AND `status` = 'pending'";
$result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  echo '<div style="text-align: center;">';
  echo '<p style="color: #00A3FF; font-size: 20px; font-weight: bold;">' . $row['booking_number'] . '</p>';
  echo '<a href="home.php" style="color: #00a3ff; text-decoration: underline; font-size: 20px; font-weight:bold;">Home</a>';
  echo '</div>';
?>

<?php
if ($_SESSION['type'] === "hourly") {
    echo '<p class="center bold">Notes:</p>';
    echo '<p id="notes" class="center">Upon arrival, show your booking number to the Parking Owner.</p>';
    echo '<p id="notes" class="center">You\'re expected to be there within an hour.</p>';
    echo '<p id="notes" class="center">If your booking number isn\'t checked in this duration, your booking will be cancelled.</p>';
} else {
  echo '<p id="notes" class="center">Upon arrival, show your booking number to the Parking Owner.</p>';
  echo '<p id="notes" class="center">Kindly note that the booking number associated with your current reservation must be checked out before making any new bookings.</p>';
}
?>


    
    
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="menu.js"></script>
</html>
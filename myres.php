<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/9ff4d293d6.js" crossorigin="anonymous"></script><body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="menu.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
	<title>Parking Capsule</title>
	<link rel="stylesheet" href="myres.css">
    <style>
        .logo a {
            color: white;
            text-decoration: none;
        }
        nav {
	display: flex;
	gap: 30px;
	align-items: center;
	margin-right: 10px;
	margin-top: 2px;
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
<header>
    <div class="logo">  <a href="home.php" > Parking Capsule </a>
</div>
    <nav>
    <nav>
    <?php
    if (isset($_SESSION['email'])) {
        echo '<div class="menu">
                <a href="#" class="account-link"><img src="Account circle.svg" alt="Account"></a>
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
 <body>
    <?php
 $query = "SELECT parking_spot.location, reservation.booking_number, parking_spot.type, reservation.status
 FROM parking_spot
 JOIN reservation ON parking_spot.id = reservation.spot_id
 WHERE reservation.customer_id = '{$_SESSION['customer_id']}'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
echo '<div class="image-container">';
echo '<img src="res.svg" alt="res">';
echo '<h2>My Reservations</h2>  <br>';
echo '</div>';
echo '<div class="table-container">';
echo '<form method = "POST" action = "">';
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Parking Address</th>';
echo '<th>Reservation Number</th>';
echo '<th>Type</th>';
echo '<th>Action</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = mysqli_fetch_assoc($result)) {
echo '<tr>';
echo '<td>' . $row['location'] . '</td>';
echo '<td>' . $row['booking_number'] . '</td>';
echo '<td>' . $row['type'] . '</td>';

if ($row['status'] === 'confirmed') {
    echo '<td> Done </td>'; // No button for confirmed reservations
 } else if ($row['status'] === 'pending') {
     echo '<td><button onclick="Cancel()" class="btn-cancel" name="cancel" value="' . $row['booking_number'] . '">Cancel</button></td>';
 }

echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</form>';
echo '</div>';
} else {
echo '<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">';
echo '<img style="margin-bottom: 25px;" src="invalid.svg" alt="Image">';
echo '<p style="text-align: center; font-weight: bold; font-size: 20px;">You do not have any reservations yet.</p>';
echo '</div>';
}

if (isset($_POST['cancel'])) {
    $bookingNumber = $_POST['cancel'];
    $deleteQuery = "DELETE FROM reservation WHERE booking_number = '$bookingNumber'";
    
    $reservationQuery = "SELECT spot_id FROM reservation WHERE booking_number = '$bookingNumber'";
    $reservationResult = mysqli_query($con, $reservationQuery);
    $reservationData = mysqli_fetch_assoc($reservationResult);

if ($reservationData !== null) {
    $spotId = $reservationData['spot_id'];
    $updt = "UPDATE `parking_spot` SET `spots` = `spots` + 1, `spots_booked` = `spots_booked` - 1 WHERE `id` = '$spotId'";
    mysqli_query($con, $deleteQuery);
    mysqli_query($con, $updt);
} else {
    // Handle the case when $reservationData is null
}
header("Location: ".$_SERVER['PHP_SELF']);
exit();
}


?>
<script>
    function Cancel() {
      alert('Your reservation has been cancelled sucessfully!');
    }
  </script>
</body>
</html>
<?php
include("connection.php");
ob_start();
session_start();
if (isset($_SESSION['email'])) {
  $t = "SELECT `id` FROM `customer` WHERE `email` = '{$_SESSION['email']}'";
  $h = mysqli_query($con, $t);
  if ($row = mysqli_fetch_assoc($h)) {
      $customer_id = $row['id'];
      $_SESSION['customer_id'] = $customer_id;
  } else {
  }
}
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
	<link rel="stylesheet" href="car.css">
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
  .CarForm {
  width: 90%;
  max-width: 400px; /* Adjust the maximum width as needed */
  margin: 0 auto;
  padding: 20px;
  border-radius: 5px;
  justify-content: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    padding: 12px;
    text-align: center; /* Center align both th and td */
    width: 33.33%; /* Divide the width equally for three columns */
   
}

th {
    background-color: #00A3FF;
    color:white;
}
  
        </style>
</head>
<header>
<?php
if (isset($_SESSION['email'])) {
    // Check if the user exists in the vehicle table
    $email = "SELECT * FROM vehicle WHERE customer_id = {$_SESSION['customer_id']}";
    $re = mysqli_query($con, $email);

    if (mysqli_num_rows($re) > 0) {
        echo '<div class="logo">  <a href="home.php"> Parking Capsule </a> </div>';
    } else {
        echo '<div class="logo">  Parking Capsule </div>';
    }
} else {
    // User is not logged in, display the div without home.php link
    echo '<div class="logo">  Parking Capsule </div>';
}
?>
<nav>
    <?php
   if (isset($_SESSION['email'])) {
    // Check if the user has a vehicle
    $check = "SELECT * FROM vehicle WHERE customer_id = {$_SESSION['customer_id']}";
    $rt = mysqli_query($con, $check);

    if (mysqli_num_rows($rt) > 0) {
        // User has a vehicle, display the menu and logout button
        
        
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
       
    }
} else {
   
}
    ?>
</nav>
  </header>
  <body>
    <?php
    $ck = "SELECT * FROM vehicle WHERE customer_id = {$_SESSION['customer_id']}";
    $rs = mysqli_query($con, $ck);

    if (mysqli_num_rows($rs) > 0) {
        // User has a vehicle record, display the update form
        $row = mysqli_fetch_assoc($rs);
        $brand = $row['brand'];
        $model = $row['model'];
        $licenseNumber = $row['license_number'];
        ?>
    
        <img class="settings-image" src="car.svg" alt="Settings Image">
    
        <div class="table-container">
            <form class="CarForm">
                <table>
                    <thead>
                        <tr>
                            <th>Car Brand</th>
                            <th>Car Model</th>
                            <th>Plate Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $brand; ?></td>
                            <td><?php echo $model; ?></td>
                            <td><?php echo $licenseNumber; ?></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    
        <div class="settings-label">Update Vehicle</div>
        <div class="add-car-form">
            <form action="" method="post">
                <input type="text" name="car_name" placeholder="Car Brand ex: toyota, BMW, etc.." required>
                <input type="text" name="car_model" placeholder="Car Model ex: optra, lanos, etc.." required>
                <input type="text" name="car_num" placeholder="License Number" required>
                <input type="submit" value="Update" name="update">
            </form>
        </div>
        <?php
        // Process the update form submission
        if(isset($_POST["update"])){
            // Retrieve the form data
            $brand = mysqli_real_escape_string($con, $_POST['car_name']);
            $model = mysqli_real_escape_string($con, $_POST['car_model']);
            $licenseNumber = mysqli_real_escape_string($con, $_POST['car_num']);

            // Perform the UPDATE query
            $uptd = "UPDATE vehicle SET brand = '$brand', model = '$model', license_number = '$licenseNumber' WHERE customer_id = {$_SESSION['customer_id']}";
            mysqli_query($con, $uptd);

            // Redirect the user to a success page or perform any other necessary actions
            header("Location: car.php");
            exit();
        }
    } else {
        // User does not have a vehicle record, display the add form
        ?>
        <img class="settings-image" src="car.svg" alt="Settings Image">
        <div class="settings-label">Add Vehicle</div>
        <div class="add-car-form">
            <form action="" method="post">
                <input type="text" name="car_name" placeholder="Car Brand ex: toyota, BMW, etc.." required>
                <input type="text" name="car_model" placeholder="Car Model ex: optra, lanos, etc.." required>
                <input type="text" name="car_num" placeholder="License Number" required>
                <input type="submit" value="Add" name="add">
            </form>
        </div>
        <?php
        // Process the add form submission
        if(isset($_POST["add"])){
            // Retrieve the form data
            $brand = mysqli_real_escape_string($con, $_POST['car_name']);
            $model = mysqli_real_escape_string($con, $_POST['car_model']);
            $licenseNumber = mysqli_real_escape_string($con, $_POST['car_num']);

            // Perform the INSERT query
            $query = "INSERT INTO `vehicle`(`brand`, `model`, `license_number`, `customer_id`) VALUES ('$brand', '$model', '$licenseNumber', '{$_SESSION['customer_id']}')";
            mysqli_query($con, $query);

            // Redirect the user to a success page or perform any other necessary actions
            header("Location: home.php");
            ob_end_flush();
        }
    }
?>
        </body>
        </html>

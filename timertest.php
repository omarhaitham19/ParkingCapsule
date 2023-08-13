<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="menu.js"></script>
  <title>Timer Test</title>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Ubuntu', sans-serif;
    }

    html, body {
      height: 100%;
      margin: 0;
    }

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

    #checkout {
      width: 180px;
      height: 34px;
      background-color: #00A3FF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-bottom: 15px;
      margin-top: 15px;
      font-weight: bold;
    }

    #stop {
      width: 180px;
      height: 34px;
      background-color: white;
      color: #00a3ff;
      border: solid 0.5px;
      border-color: #00A3FF;
      border-radius: 5px;
      cursor: pointer;
      margin-bottom: 15px;
      font-weight: bold;
    }
    .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;

  }

  #checkout,
  #stop {
    display: block;
    margin-bottom: 10px;
  }
  #timer-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 5px;
    text-align: center;
    justify-content: center;

  }
  h1{
    margin-bottom:10px;
  }

  #timer {
    font-weight: bold;
    font-size: 40px;
    margin-bottom: 5px;
  }

  #amount {
    font-weight: bold;
    font-size: 40px;
    color: #00a3ff;
    margin-top: 5px; /* Added margin-top */
  }
  .table-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: auto;
  min-height: 30vh;
  width: 100%;
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
  <div class="logohd"><a href="ownerhome.php">Parking Capsule </a></div>
  <nav>
    <?php
    if (isset($_SESSION['email'])) {
        echo '<div class="menu">
                <a href="#" class="account-link"><img src="Account circle.svg" alt="Account"></a>
                <div class="submenu">
                    <a href="settingsowner.php">Settings</a>
                
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

<?php
 if (isset($_POST['check'])) {
  $number = $_POST['search'];
  $owner_id = $_SESSION['owner_id'];
  $query = "SELECT r.`booking_number`, r.`type`, r.`spot_id`
    FROM `reservation` AS r
    JOIN `parking_spot` AS ps ON r.`spot_id` = ps.`id`
    WHERE r.`booking_number` = '$number'
    AND r.`status` = 'pending'
    AND ps.`owner_id` = '$owner_id'";
    $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $bookingNumber = $row['booking_number'];
      $_SESSION['number'] = $bookingNumber;
      $spotid = $row['spot_id'];
      $_SESSION['spot'] =  $spotid;
      $type = $row['type'];

      if (isset($_SESSION['number'])) {
        $plate = "SELECT vehicle.brand, vehicle.model, vehicle.license_number
        FROM vehicle
        JOIN customer ON customer.id = vehicle.customer_id
        JOIN reservation ON reservation.customer_id = customer.id
        WHERE reservation.booking_number = '{$_SESSION['number']}'";
        $show = mysqli_query($con, $plate);
      
        if ($show && mysqli_num_rows($show) > 0) {
            ?>
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
                            <?php
                            while ($rw = mysqli_fetch_assoc($show)) {
                                $brand = $rw['brand'];
                                $model = $rw['model'];
                                $licenseNumber = $rw['license_number'];
                                ?>
                                <tr>
                                    <td><?php echo $brand; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?php echo $licenseNumber; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <?php
        }
      }

      if ($type === 'monthly') {
        echo '<div id="subscription-container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">';
        echo '<img style="margin-bottom: 25px;" src="monthly.svg" alt="Image">';
        
        echo '<form action="checkmonth.php" method="POST" style="display: inline;">';
        echo '<button name="confirm_month" type="submit" style="color: #00a3ff; text-decoration: underline; font-size: 20px; font-weight:bold; border: none; background: none; padding: 0; cursor: pointer;">Check Out</button>';
        echo '</form>';
        echo '</div>';
        echo '<p style="text-align: center; font-weight: bold; font-size: 20px;">This Booking Number is valid for <span style="color: #00A3FF;">a Month</span></p>';
        
        break;
    }
    
    
    
     elseif ($type === 'hourly') {
        echo '<div class="container">';
        echo '<div id="timer-container">';
        echo '<h1 style="color:black;font-size:50px;">Parking Timer</h1>';
        echo '<span style="color:#00a3ff;" id="timer">0:00:00</span>';
        echo '<span style="font-weight:bold; font-size:50px;"> Amount due: </span>';
        echo '<span style="font-weight:bold; font-size:40px; color:#00a3ff;" id="amount">0.LE</span>';
        echo '</div>';
        echo '<button id="checkout">Start</button>';
        echo '<button id="stop">Stop</button>';
        echo '<form action="insert.php" method="POST" style="display: inline;">';
        echo '<button name="confirm" type="submit" style="color: #00a3ff; text-decoration: underline; font-size: 20px; font-weight:bold; border: none; background: none; padding: 0; cursor: pointer;">Check Out</button>';
        echo '</form>';
        echo '</div>';
    }
    
    
    }
  } else {
    echo '<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">';
        echo '<img style="margin-bottom: 25px;" src="invalid.svg" alt="Image">';
        echo '<p style="text-align: center; font-weight: bold; font-size: 20px;">This booking number is not valid for any subscription .</p>';
        echo '<a href="ownerhome.php" style="color: #00a3ff; text-decoration: underline; font-size: 20px; font-weight:bold;">Back</a>';

        echo '</div>';  
  }
}
?>

 
<script>
  let startTime;
  let elapsedTime = 0;
  let amountOwed = 0;
  let timerInterval;

  function startTimer() {
    startTime = Date.now();
    timerInterval = setInterval(updateTimer, 1000);
  }

  function updateTimer() {
  let currentTime = Date.now();
  elapsedTime = Math.floor((currentTime - startTime) / 1000);

  let hours = Math.floor(elapsedTime / 3600);
  let minutes = Math.floor((elapsedTime - (hours * 3600)) / 60);
  let seconds = elapsedTime % 60;

  let timerText = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
  document.getElementById("timer").textContent = timerText;

  if (minutes >= 1 || (hours === 0 && minutes === 0 && seconds === 0)) {
    let amount = Math.ceil((hours * 60 + minutes + 1) / 1) * 5; // Calculate the amount for each minute

    if (amount !== amountOwed) {
      amountOwed = amount;
      document.getElementById("amount").textContent = amountOwed + ".LE";
      
      // Send the amountOwed variable to the PHP script using AJAX with jQuery
      $.ajax({
        type: "POST",
        url: "insert.php",
        data: { amountOwed: amountOwed },
        success: function(response) {
          console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log("Error: " + textStatus + " " + errorThrown);
        }
      });
    }
  }
}

  function stopTimer() {
    clearInterval(timerInterval);
    let hoursElapsed = Math.floor(elapsedTime / 3600);
    if (elapsedTime >= 60) {
      let amount = Math.ceil(minutes / 1) * 5;
      amountOwed = amount;
    } else {
      amountOwed = (hoursElapsed + 1) * 5;
    }
    document.getElementById("amount").textContent = amountOwed + ".LE";
    elapsedTime = 0; // reset elapsed time when timer is stopped
  }

  document.getElementById("checkout").addEventListener("click", function () {
    amountOwed = 5;
    document.getElementById("amount").textContent = amountOwed + ".LE";
    startTimer();
  });

  document.getElementById("stop").addEventListener("click", stopTimer);
</script>



</body>
</html>




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
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="menu.js"></script>
	<title>Parking Capsule</title>
	<link rel="stylesheet" href="settings.css">
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
<header>
    <div class="logo">  <a href="ownerhome.php" > Parking Capsule </a>   <!-- to ownerhome-->
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
        echo '<a href="logout.php"><img style="width:30px; height:30px;" src="logout.svg" alt="Logout"></a>';
    } else {
        echo '<a href="signup&in.php" class="signin">Sign In</a>';
        echo '<a href="signup&in.php" class="signup">Sign Up</a>';
    }
    ?>
</nav>
  </header>
  <body>
<img class="settings-image" src="settings.svg" alt="Settings Image">
<div class="settings-label">Settings</div>
<div class="change-password-form">
    <form action="" method="post">
        <input type="password" name="current_password" placeholder="Current Password" required>
        <input type="password" name="new_password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <input type="submit" value="Change Password" name="change">
    </form>
</div>

<?php
if (isset($_POST["change"])) {
    $currentPassword = mysqli_real_escape_string($con, $_POST["current_password"]);
    $newPassword = mysqli_real_escape_string($con, $_POST["new_password"]);
    $confirmPassword = mysqli_real_escape_string($con, $_POST["confirm_password"]);
    
    if ($newPassword != $confirmPassword) {
      echo '<script language="javascript">';
      echo 'alert("New password and confirm password do not match.")';
      echo '</script>';
    } else {
        // Retrieve the owner ID from the session
        $ownerId = $_SESSION['owner_id'];
        
        // Verify the current password against the one stored in the database
        $query = "SELECT password FROM parking_owner WHERE id = $ownerId";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row["password"];
        
        if ($currentPassword === $storedPassword) {
            // Update the user's password in the database
            $updateQuery = "UPDATE parking_owner SET password = '$newPassword' WHERE id = $ownerId";
            mysqli_query($con, $updateQuery);
            
            echo '<script language="javascript">';
echo 'alert("Password changed successfully!")';
echo '</script>';
        } else {
          echo '<script language="javascript">';
echo 'alert("Current password is incorrect.")';
echo '</script>';
        }
    }
}
?>
        </body>
        </html>

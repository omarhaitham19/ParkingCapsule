<?php
include("connection.php");
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>

  <head>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Settings</title>
    <script src="js.js"></script>

    <style>
      body {
        margin: 0;
        font-family: 'Ubuntu', Arial, sans-serif;
        font-size: 1rem;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }

      header {
        width: 100%;
        height: 3rem;
        background-color: #00A3FF;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
      }

      .logohd {
        font-size: 1.5rem;
        font-weight: bold;
        margin-top: 0.3125rem;
        margin-left: 0.625rem;
        color: white;
      }

      .logohd a {
        text-decoration: none;
        color: white;
      }

      nav {
        display: flex;
        gap: 0.9375rem;
        align-items: center;
        margin-right: 0.625rem;
        margin-top: 0.3125rem;
      }

      nav a {
        text-decoration: none;
        color: white;
        font-size: 1.125rem;
      }

      .signup {
        border: 1px solid white;
        border-radius: 5px;
        padding: 0.3125rem 0.625rem;
      }

      .signup::before {
        position: absolute;
        top: -0.125rem;
        left: -0.125rem;
        right: -0.125rem;
        bottom: -0.125rem;
        border: 1px solid white;
      }

      h1 {
        color: #00A3FF;
      }

      .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 6.25rem;
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
        margin-left: 10%;
        padding-left: 0;
        color: #00A3FF;
      }

      .settings-section {
        display: flex;
        flex-direction: column;
        margin-top: 3.125rem;
      }

      .settings-section h2 {
        margin-bottom: 1.25rem;
        color: #00A3FF;
      }

      .settings-section .suspend-user,
      .settings-section .suspend-parking-owner {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 1.25rem;
        text-align: left;
        margin-left: 10%;
        padding-left: 0;
      }

      .settings-section .suspend-user input[type="email"],
      .settings-section .suspend-parking-owner input[type="email"],
      .settings-section .input-box {
        width: 93.75%;
        padding: 0.625rem;
        margin-bottom: 0.625rem;
      }

      .settings-section .suspend-user button,
      .settings-section .suspend-parking-owner button {
        padding: 0.625rem 2.5rem;
        background-color: #00A3FF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      .hide {
        display: none;
      }

    </style>
  </head>

  <body>
    <header>
    <div class="logohd">
        <a href="">Parking Capsule </a>
      </div>
      <!--<nav>
        <a href="#"><img src="Vector.svg" alt="account"></a>
        <a href="#"><img src="Vector (1).svg" alt="log out"></a>
      </nav> -->
    </header>
    <main>
      <div class="settings-section">
        <div style="text-align: center;">
          <a href="#"><img src="Vector (2).svg" alt="settings logo"></a><br>
        </div>
        <div>
          <h2 class="Settings" style="text-align: center;">Settings</h2>
          <h3 class="suspension" style="margin-left: 10%;">Garage Settings:</h3>
          <div style="align-items: center; text-align: left;">
            <div style="display: flex">
              <div style="flex: 1; margin-right: 0.625rem; ">
                <h4 style="margin-left: 3.125rem;">Location</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" required name="location" placeholder="Enter your garage location" style="width: 86.71875%; padding: 0.625rem; margin-bottom: 0.625rem; margin-left: 3.125rem;">
              </div>
              <div style="flex: 1; margin-left: 0.625rem;">
                <h4 style="margin-left: 3.125rem;">Region</h4>
                <input type="text" required name="region" placeholder="Enter your garage region (city)" style="width: 86.71875%; padding: 0.625rem; margin-bottom: 0.625rem; margin-left: 3.125rem;">
              </div>
            </div>
            <div style="display: flex;">
              <div style="flex: 1; margin-right: 0.625rem;">
                <h4 style="margin-left: 3.125rem;">Images</h4>
                <input type="file" required name="image" placeholder="Upload your garage images" style="width: 86.71875%; padding: 0.625rem; margin-bottom: 0.625rem; margin-left: 3.125rem; border: 1px solid #000; border-radius: 5px;">
              </div>

              <div style="flex: 1; margin-left: 0.625rem; ">
                <h4 style="margin-left: 3.125rem;">Detailed Description</h4>
                <input type="text" required name="description" placeholder="Ex: Head to Abo-Elfeda behind BIS campus" style="width: 86.71875%; padding: 0.625rem; margin-bottom: 0.625rem; margin-left: 3.125rem;">
              </div> 
            </div>
          </div>
 
          <h3 class="suspension" style="margin-left: 10%;">Spots Settings:</h3>
           <div style="align-items: center; text-align: left;">
            <div style="display: flex">
              <div style="flex: 1; margin-right: 0.625rem; ">
                <h4 style="margin-left: 3.125rem;">Number of spots per hour</h4>
                <input type="text" required name="spothour" placeholder="Enter the number of spots" style="width: 86.71875%; padding: 0.625rem; margin-bottom: 0.625rem; margin-left: 3.125rem;">
              </div>
              <div style="flex: 1; margin-left: 0.625rem;">
                <h4 style="margin-left: 3.125rem;">price per hour</h4>
                <input type="text"  name="pricehour" value="5" placeholder="Enter the price / hour" style="width: 86.71875%; padding: 0.625rem; margin-bottom: 0.625rem; margin-left: 3.125rem;" disabled>
              </div>
            </div>
            <div style="display: flex;">
              <div style="flex: 1; margin-right: 0.625rem;">
                <h4 style="margin-left: 3.125rem;">Number of spots per month</h4>
                <input type="text" required name="spotmonth" placeholder="Enter the number of spots" style="width: 86.71875%; padding: 0.625rem; margin-bottom: 0.625rem; margin-left: 3.125rem;">
              </div> 

              <div style="flex: 1; margin-left: 0.625rem; ">
                <h4 style="margin-left: 3.125rem;">price per month</h4>
                <input type="text" required name="pricemonth" placeholder="Enter the price / month" style="width: 86.71875%; padding: 0.625rem; margin-bottom: 0.625rem; margin-left: 3.125rem;">
              </div> 
            </div>
          </div> 

        <div style="text-align: center; margin-top: 1.5rem;">
        <button type="submit" name="add" style="background-color: #00A3FF; color: white; padding: 0.625rem 2.5rem; border: none; border-radius: 5px; cursor: pointer;">Save</button><br>
    </form>
        <br>
        <!--  <a href="dashboard.html" style="color: #00A3FF;"><b>Go to Dashboard</a> -->
        <p>Note: You are limited to filling out this form once. For any necessary modifications to your garage settings,
           please contact our technical support team. Thank you for your cooperation. </p>
        </div>
      </div>
    </main>

    <?php
    if (isset($_POST["add"])) {
      $location = mysqli_real_escape_string($con, $_POST["location"]);
      $region = mysqli_real_escape_string($con, $_POST["region"]);
      $imageName = $_FILES["image"]["name"];
      $imageTemp = $_FILES["image"]["tmp_name"];
      $image = mysqli_real_escape_string($con, "$imageName");
      $description = mysqli_real_escape_string($con, $_POST["description"]);
      $spothour = mysqli_real_escape_string($con, $_POST["spothour"]);
      $spotmonth = mysqli_real_escape_string($con, $_POST["spotmonth"]);
      $pricemonth = mysqli_real_escape_string($con, $_POST["pricemonth"]);

      $uploadDir = 'C:\xampp\htdocs\ParkingCapsuleApp/spots/';
      $targetPath = $uploadDir . $imageName;
    
      if (move_uploaded_file($imageTemp, $targetPath)) {
        // Image moved successfully, store the image path in the database
        $sql = "INSERT INTO `parking_spot`(`location`, `description`, `region`, `type`, `image`, `price`, `spots`, `spots_booked`, `owner_id`)
                VALUES ('$location', '$description', '$region', 'hourly', '$targetPath', '5', '$spothour', '0', '".$_SESSION['owner_id']."')";
        $test = "INSERT INTO `parking_spot`(`location`, `description`, `region`, `type`, `image`, `price`, `spots`, `spots_booked`, `owner_id`)
                VALUES ('$location', '$description', '$region', 'monthly', '$targetPath', '$pricemonth', '$spotmonth', '0', '".$_SESSION['owner_id']."')";
    
        mysqli_query($con, $sql);
        mysqli_query($con, $test);
        header("location:ownerhome.php");
        ob_end_flush();
       
    } else {
        echo "Error uploading image:" ;
    }
      
    } 
    ?>

  </body>

</html>

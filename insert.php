<?php
// Include your database connection code
include("connection.php");
session_start();

// Sanitize and validate user input
if (isset($_POST['amountOwed'])) {
  $amountOwed = mysqli_real_escape_string($con, $_POST['amountOwed']);

  // Update the `cost` column in the `reservation` table
  $sql = "UPDATE `reservation` SET `cost`='$amountOwed'  WHERE `booking_number` = '{$_SESSION['number']}'";
  //$new = "UPDATE `parking_spot` SET `spots` = `spots` + 1, `spots_booked` = `spots_booked` - 1 WHERE `id` = {$_SESSION['spot']}";
  if (mysqli_query($con, $sql)) {
    echo "Amount owed inserted successfully";
  } else {
    echo "Error inserting amount owed: " . mysqli_error($con);
  }
} else {
  echo "Error: amountOwed parameter not set";
}
if (isset($_POST['confirm'])) {
  $updt = "UPDATE `reservation` SET `status` = 'confirmed' WHERE `booking_number` = '{$_SESSION['number']}'";
  $new = "UPDATE `parking_spot` SET `spots` = `spots` + 1, `spots_booked` = `spots_booked` - 1 WHERE `id` = {$_SESSION['spot']}";

  mysqli_query($con, $updt);
  mysqli_query($con, $new);
  header("location:ownerhome.php");

  
}


?>
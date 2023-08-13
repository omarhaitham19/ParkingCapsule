<?php
include("connection.php");
session_start();
if (isset($_POST['confirm_month'])) {
    $updt_month = "UPDATE `reservation` SET `status` = 'confirmed' WHERE `booking_number` = '{$_SESSION['number']}'";
   // $new_month = "UPDATE `parking_spot` SET `spots` = `spots` + 1, `spots_booked` = `spots_booked` - 1 WHERE `id` = {$_SESSION['spot']}";
  
    mysqli_query($con, $updt_month);
    //mysqli_query($con, $new_month);
    header("location:ownerhome.php");
 

}
?>
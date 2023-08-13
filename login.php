<?php/*
include("connection.php");
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    $customer_query = "SELECT * FROM `customer` WHERE `email`='$email' AND `password`='$pass'";
    $customer_result = mysqli_query($con, $customer_query);

    $owner_query = "SELECT * FROM `parking_owner` WHERE `email`='$email' AND `password`='$pass'";
    $owner_result = mysqli_query($con, $owner_query);

    $admin_query = "SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$pass'";
    $admin_result = mysqli_query($con, $admin_query);


    if (mysqli_num_rows($customer_result) == 1) {
        $customer_data = mysqli_fetch_assoc($customer_result);
        $customer_status = $customer_data['status'];
    
        if ($customer_status == 'suspended') {
            echo "Your account is suspended. Please contact support for assistance.";
        } else {
            $_SESSION['email'] = $email;
            $t = "SELECT `id` FROM `customer` WHERE `email` = '{$_SESSION['email']}'";
            $h = mysqli_query($con, $t);
    
            if ($row = mysqli_fetch_assoc($h)) {
                $customer_id = $row['id'];
                $_SESSION['customer_id'] = $customer_id;
    
                // Check if customer ID exists in the vehicle table
                $vehicle_query = "SELECT * FROM `vehicle` WHERE `customer_id`='$customer_id'";
                $vehicle_result = mysqli_query($con, $vehicle_query);
    
                if (mysqli_num_rows($vehicle_result) > 0) {
                    header('location: home.php');
                    exit();
                } else {
                    header('location: car.php');
                    exit();
                }
            } else {
            }
        }
          
        
    } elseif (mysqli_num_rows($owner_result) == 1) {
        $owner_data = mysqli_fetch_assoc($owner_result);
        $owner_status = $owner_data['status'];
    
        if ($owner_status == 'suspended') {
            echo "Your account is suspended. Please contact support for assistance.";
        } else {
            $_SESSION['email'] = $email;
            header('location: ownerhome.php');
            exit();
        }
    }
     elseif(mysqli_num_rows($admin_result) == 1){
        $_SESSION['email'] = $email;
        header('location: admin.php');
        exit();
    } else {
        echo "Wrong Username or Password!";
    }
}
?>
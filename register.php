<?php/*
include("connection.php");

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST["signup"])){
    $first_name = mysqli_real_escape_string($con,$_POST["firstname"]);
    $last_name = mysqli_real_escape_string($con,$_POST["lastname"]);
    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $pass = mysqli_real_escape_string($con,$_POST["pass"]);
    $confirmpass= mysqli_real_escape_string($con,$_POST["pass2"]);
    $phone= mysqli_real_escape_string($con,$_POST["phone"]);


    if($pass!=$confirmpass){
        echo "pass doesnt match";
    }
    else{
        $qy = "SELECT COUNT(*) AS count FROM customer WHERE email = '$email'";
        $rt = mysqli_query($con, $qy);
        $row = mysqli_fetch_assoc($rt);
        $emailCount = $row['count'];

        if ($emailCount > 0) {
         echo "This email already exists!";
       } else {
      
        



        $cust = "INSERT INTO `customer` (`f_name`, `l_name`, `email`, `password`, `status`, `phone_number`) VALUES ('$first_name', '$last_name', '$email', '$pass', 'active', '$phone')";
        mysqli_query($con,$cust);
        $_SESSION['email']=$email;
        $t = "SELECT `id` FROM `customer` WHERE `email` = '{$_SESSION['email']}'";
        $h = mysqli_query($con, $t);
        if ($row = mysqli_fetch_assoc($h)) {
            $customer_id = $row['id'];
            $_SESSION['customer_id'] = $customer_id;
        }
        $query = "SELECT id FROM admin";
        $result = mysqli_query($con, $query);
        
        // Assign the customer ID to all admins in the manage table
        while ($row = mysqli_fetch_assoc($result)) {
            $adminId = $row['id'];
            $query = "INSERT INTO manage (customer_id, admin_id) VALUES ('" . $_SESSION['customer_id'] . "', '" . $adminId . "')";
            $resultInsert = mysqli_query($con, $query);
        }
        
        
        
        header("location: car.php");
            }
        }
    }
?>
<?php /*
include("connection.php");
if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST["register"])){
    $fname = mysqli_real_escape_string($con,$_POST["fname"]);
    $lname = mysqli_real_escape_string($con,$_POST["lname"]);
    $email = mysqli_real_escape_string($con,$_POST["mail"]);
    $pass = mysqli_real_escape_string($con,$_POST["pass1"]);
    $confirmpass= mysqli_real_escape_string($con,$_POST["pass2"]);
    $mobile= mysqli_real_escape_string($con,$_POST["mobile"]);
    $license= mysqli_real_escape_string($con,$_POST["license"]);


    if($pass!=$confirmpass){
        echo "pass doesnt match";
    }
    else{
        $qy = "SELECT COUNT(*) AS count FROM parking_owner WHERE email = '$email'";
        $rt = mysqli_query($con, $qy);
        $row = mysqli_fetch_assoc($rt);
        $emailCount = $row['count'];

        if ($emailCount > 0) {       
         echo "This email already exists!";
       } else {
     
        $owner = "INSERT INTO `parking_owner`(`f_name`, `l_name`, `email`, `password`, `status`,  `phone_number`, `garage_license`) VALUES ('$fname', '$lname', '$email', '$pass', 'active', '$mobile' , '$license')";
        mysqli_query($con,$owner);
        $_SESSION['email']=$email;
        $o="SELECT `id` FROM parking_owner WHERE `email` = '{$_SESSION['email']}'";
        $h=mysqli_query($con,$o);
        if ($row = mysqli_fetch_assoc($h)) {
        $owner_id=$row['id'];
        $_SESSION['owner_id'] = $owner_id;
        } 

        $query = "SELECT id FROM admin";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $adminId = $row['id'];
            $query2 = "INSERT INTO supervise (owner_id, admin_id) VALUES ('" . $_SESSION['owner_id'] . "', '" . $adminId . "')";
            $resultInsert = mysqli_query($con, $query2);
        }
        
        
        header("location: ownerhome.php");
            }
        }
    }
?>
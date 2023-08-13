<?php
include("connection.php");
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
    <script src="https://kit.fontawesome.com/9ff4d293d6.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="menu.js"></script>
    <title>Parking Capsule</title>
    <link rel="stylesheet" href="home.css">
	<style>
        .search-box {
    position: relative;
    display: flex;
    align-items: center;
    width: 579px;
    height: 56px;
    margin: 0 auto;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: white;
}
.search-button {
    background:none;
    border: none;
    border-radius: 0 4px 4px 0;
    padding: 10px;
    cursor: pointer;
}
.search-button .fa {
    color: #00A3FF;
    width:22px;
    height:22px;
}
.search-box input :focus {
  border: none;
  outline: none;
}
a.join-btn {
    margin-top: 10px;
    margin-left: 20px;
    width: 313px;
    height: 44px;
    border-radius: 5px;
    background-color: #00A3FF;
    color: #FFF;
    font-size: 18px;
    font-weight: bold;
    border: none;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
  }
    @media only screen and (max-width: 800px) {
        body {
            overflow-x: hidden;
        }
        .search-form {
            text-align: center;
        }

        .search-box {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 500px;
            height: 56px;
            margin: 0 auto;
            border: none;
            border-radius: 5px;
            background-color: white;
        }

        .search-input {
            width: 100%;
            height: 56px;
            padding: 0 15px;
            font-size: 16px;
        }

        .search-button {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translate(-50%, -50%);
            width: -56px;
            height: 56px;
            background-color: none;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .search-button i {
            color: #fff;
        }

        .discover img,
        .owner img {
            display: none;
        }
		.discover-content{
			justify-content:center;
			align-self:center;
			align-items:center;
			text-align: center;
		}

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }

        .logohd {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .header-center {
            text-align: center;
            margin-bottom: 10px;
        }

        .Headtext {
            font-size: 18px;
            margin-bottom: 15px;
        }

       
        .nav {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 10px;
            padding-left: 10px;
        }

        .nav a {
            margin: 5px;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .signup,
        .signin {

                 font-size: 14px;
            padding: 3px 8px;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-left: auto;
            max-width: 100px;
    }
</style>




</head>
<body>
<header>
    <div class="logohd">Parking Capsule</div>
    <div class="header-center">
  <h2 class="Headtext">Search, Book and Park, It’s that easy!</h2>
  <form class="search-form" id="home-search-form" action="bookingg.php" method="post" >
  <div class="search-box">
    <input type="text" id="home-search-input" placeholder="Where are you going?" class="search-input">
    <button type="submit" id="search_btn" class="search-button">
      <i class="fa fa-search"></i>
    </button>
  </div>
</div>


<nav>
    <?php
    if (isset($_SESSION['email'])) {
        echo '<div class="menu">
                <a href="#" class="account-link"><img style="width:30px; height:30px;" src="Account circle.svg" alt="Account"></a>
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

<section class="discover">
    <div class="container">
        <div class="discover-text">
            <img src="Discover.svg" alt="Discover Image" width="506" height="466">
            <div class="discover-content">
                <h2>
                    Discover<br>
                    Faster Than<br>
                    Ever
                </h2>
                <p>Find parking anywhere, for now or for later<br>
                    Compare prices & pick the place that’s best for you</p>
            </div>
        </div>
    </div>
</section>
<section class="discover">
    <div class="container">
        <div class="discover-text">
            <div class="discover-content">
                <h2>
                    Save<br>
                    Time<br>
                    and
                    Effort
                </h2>
                <p>Book a space in just a few easy clicks,<br>
                    no more wasted fuel for you</p>
            </div>
            <img src="Time.svg" alt="Time Image" width="506" height="466">

        </div>
    </div>
</section>
<section class="owner">
    <div class="container">
        <div class="discover-text">
            <img src="Owner.svg" alt="Discover Image" width="506" height="466">
            <div class="discover-content">
                <h2>
                    Parking Owner ?
                </h2>
                <p>Join us and promote your business<br>
                    and reach new customers</p>
                    <a href="ownerform.php" class="join-btn">Join us Now</a>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="social">
            <a href="#"><img src="facebook.svg" alt="Facebook"></a>
            <a href="#"><img src="Twitter.svg" alt="Twitter"></a>

        </div>
        <div class="links">
            <a href="about us.php">About Us</a>
            <a href="contact us.php">Contact Us</a>
            <a href="FAQs.php">FAQs</a>
        </div>
        <div class="logo">
            <a href="#"><img src="footerlogo.svg" alt="logo"></a>
        </div>

    </div>
</footer>

<script>



function redirectToOwnerForm() {
  // Redirect to the ownerform page
  window.location.href = 'ownerform.php';
}

$(document).ready(function() {
  $('#home-search-form').submit(function(event) {
    event.preventDefault();
    var searchQuery = $('#home-search-input').val();
    if (searchQuery.trim() === '') {
      alert('Please enter a region to search.');
      return false;
    }
    // Check if the user is logged in before redirecting to the booking page
    if ('<?php echo empty($_SESSION['email']) ? 'true' : 'false'; ?>' === 'true') {
      alert('You must be logged in.');
      window.location.href = 'signup&in.php'; // Redirect to the login page
      return false;
    }
    // Redirect to the booking page with the search query as URL parameter
    window.location.href = 'bookingg.php?search=' + encodeURIComponent(searchQuery);
  });
});

</script>



</body>
</html>

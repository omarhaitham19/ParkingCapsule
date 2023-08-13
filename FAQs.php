<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>FAQs</title>
    <style>
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
.logohd a{
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
  
       .container {
        max-width: 1200px;
        margin: 0 auto;
      }
      .container img {
        height: 371px;
        width: 526px;
        margin-top: 10px;
      }

      img {display: block;
  margin-left: auto;
  margin-right: auto;
      
  width: 50%;

        max-width: 100%;
        height: auto;
      }

      h1 {
  font-size: 40px;
  color: #00A3FF;
  text-align: center;
}


ul {
  list-style: none;
  padding: 0;
  margin-top: 50px;
}

li {
  margin-bottom: 50px;
}

strong {
  display: block;
  font-size: 24px;
  margin-bottom: 20px;
}

p {
  font-size: 18px;
  line-height: 1.5;
  margin: 0;
}


footer {
  background-color: #00A3FF;
  height: 235px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: #fff;
  font-size: 18px;
}

footer a {
  color: #fff;
  text-decoration: none;
  margin: 0 10px;
}

footer a:hover {
  text-decoration: underline;
}

footer img {
  max-width: 2000px;
  margin: 0 10px;
}
      .logo {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
}

.logo img {
  height: 80%;
  width: auto;
}
.social {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
}

.social img {
  height: 25px; 
  width: 25px;
  margin: 0 auto;
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




    </style>
  </head>
  <body>
    <header>
      <div class="logohd"> <a href="home.php" >Parking Capsule </a>
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
    <div class="content">
      <div class="container">
        <img  src="faq.svg" alt="About Us">
        <h1 class="titile"> FAQs   </h1>
        <ul>
          <li>
            <strong>How do I find parking using the app?</strong>
            <p>Simply open the app and search for available parking spots near your location. You can filter the results by price, distance, or other criteria to find the best spot for you.</p>
          </li>
          <li>
            <strong>How do I pay for parking using the app?</strong>
            <p>Once you have found a parking spot, you can use the app to pay for it. Just enter your payment information and confirm the payment. You can also set up automatic payments for future parking sessions.</p>
          </li>
          <li>
            <strong>Can I reserve parking spots in advance using the app?</strong>
            <p>Yes, you can reserve parking spots in advance using the app. Just search for the parking spot you want and select the date and time you need it. You will receive a confirmation once your reservation is confirmed.</p>
          </li>
        </ul>
      </div>
    </div>
    
    <footer>
      <div class="container">
        <div class="social">
          <a href="#"><img src="facebook.svg" alt="Facebook"></a>
          <a href="#"><img src="Twitter.svg" alt="Twitter"></a>
          
        </div>
        <div class="links">
          <a href="about us.php">About Us</a>
          <a href="contact us.php">Contact Us</a>
          <a href="FAQs.php">FAQ</a>
        </div>
            <div class="logo">
          <a href="#"><img src="footerlogo.svg" alt="logo"></a>
        </div>
            
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $(".menu .account-link").click(function(e) {
    e.preventDefault();
    var $submenu = $(this).closest('.menu').find('.submenu');
    $submenu.slideToggle(200); // Adjust the animation speed as desired
  });
});
</script>
  </body>
</html>
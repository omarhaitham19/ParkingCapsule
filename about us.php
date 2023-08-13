<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>About Us</title>
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
       .container {
        max-width: 1200px;
        margin: 0 auto;
      }
      .container img {
        height: 371px;
        width: 526px;
        margin-bottom: 0px;
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
  margin-top: 5px;
}

p{
 line-height: 1.5rem; 
 margin-bottom: 20px;
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
        <img  src="About.svg" alt="About Us">
        <h1 class="titile"> About US   </h1>
       <p> Welcome to our startup parking web application! We are a team of passionate individuals who have come together to solve a common problem - the parking crunch in urban areas. Our mission is to make parking easy, convenient, and stress-free for everyone.

We understand that finding a parking spot in the city can be a frustrating experience. You have to drive around for hours, deal with traffic, and hope that a spot opens up before someone else takes it. It's a problem that affects everyone - commuters, tourists, and business owners alike.

That's why we created our parking web application. Our application is designed to make your parking experience as seamless as possible. With just a few clicks, you can find available parking spots in your area, reserve a spot, and pay for it, all from the comfort of your own device.

Our platform is built with the latest technology to ensure that we provide you with accurate information in real-time. You can trust that the information you see on our app is up-to-date, so you won't waste time and gas driving around searching for a spot that may not be available anymore.
Our team is dedicated to making your parking experience as smooth and stress-free as possible. We are constantly working to improve our platform, adding new features and functionality to make it even easier to find and reserve parking spots. </p>
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
          <a href="FAQs.php">FAQs</a>
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

<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contact Us</title>
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
h1 {
  color: #00A3FF;
}
        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        main img{
          height: 293px;
          width: 584px;
        }
        label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            text-align: left;
        }

        input,
        textarea {
            border: 1px solid #929292;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 15px;
            padding: 10px;
            width: 100%;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #00A3FF;
        }

        input[type="submit"] {
            background-color: #00A3FF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0072C6;
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
    <main>
      <img src="contact.svg" alt="Contact Us">
        <h1>Contact Us</h1>
        <div style="
    position: relative; padding: 235px; top:120px;">
        <a href="mailto:ParkingCapsule@gmail.com" style="position: absolute;left: 154px;top: 13px;text-decoration: none;color: #00a3ff;font-size: 24px;">ParkingCapsule@gmail.com</a>
        <i class="fa-solid fa-envelope" style="color: #00a3ff;font-size: 60px;position: absolute;top: -1px;left: 72px;"></i>
    <a href="https://wa.me/+201067315768" target="_blank" style="position: absolute;margin-left: -87px;top: 120px;font-size: 24px;text-decoration: none;color: #00a3ff;">+201067315768</a>
    <i class="fa-brands fa-whatsapp" style="color: #00a3ff;font-size: 60px;position: absolute;left: 78px;top: 106px;"></i>
  </div>
    </main>
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
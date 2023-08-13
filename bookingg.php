<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<title>Booking</title>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bookingstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
 <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
 <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
<style> 
.logo a {
  color: white;
  text-decoration: none;
}
header{
  height:52px;
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
  h6{
    visibility: hidden;
  }
  
</style>
</head>
<body>
<header>
    <div class="logo">  <a href="home.php" > Parking Capsule </a>
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
<section>
  <div class="container">
  <form id="search-form" class="search-form" action="" method="post" >
      <input class="search_input" id="searchPageId" type="text" name="search" placeholder="Where are you going?">
      <button id="search_btn" class="search_btn" name="btn" type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
</section>
<div class="filter-head">
  <p class="list-header">
   Available Parking Spots
  </p>
</div>
<div class="search-head">
<div class="filter">
  <select id="sort-filter">
    <option value="asc">Ascending</option>
    <option value="desc">Descending</option>
    </select>
</div>
<form class="hourly-form" action="">
<button class="underline-btn" name="btn2" id="Hourly" onclick="changeColor('Hourly')">Hourly</button>
</form>

<form class="monthly-form">  
<button class="underline-btn" name="btn3" id="Monthly" onclick="changeColor('Monthly')">Monthly</button>
</form> 
</div>
<hr size="1" width="533px" color="#9A9A9A">
<hr class="lower-line" size="1" width="533px" color="#9A9A9A"> 
<div class="popup" id="popup-1">
  <div class="overlay">
  <div class="content">
    <div class="close-btn" onclick="togglePopup()">&times;</div>
    <div>
      <p id="plist-content">7, Abo El-Feda St.</p>
    </div>
    <div id="p-price-content">
    5<sup>L.E</sup><br>
   <h6>per hour</h6>
    </div>
    <div id="description-content">
      Next to bis&fmi , right in front of blue nile
    </div>
    <div class="review-img">
      <hr class="hr-content" size="1" width="497px" color="#9A9A9A">
      <span class="fa fa-star fa-lg checked"></span>
      <span class="fa fa-star fa-lg checked"></span>
      <span class="fa fa-star fa-lg checked"></span>
      <span class="fa fa-star fa-lg unchecked"></span>
      <span class="fa fa-star fa-lg unchecked" ></span>
      <p class="star-review"> Rated<span style="color: #00A3FF;"> 3</span> out of 5</p>
      <div class="slider">          
      <img class="review-logo" src="image 3.png" alt="" height="200" width="500" id="review-logo">
</div>
    </div>
      <h3>Your Review</h3>
      <div class="stars">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <div class="content-footer">
        <hr class="hr-content2" size="1" width="497px" color="#9A9A9A">
        <p class="p-footer">How to Park<p>
          <p class="p-footer-des">Upon arrival, show parking pass to the attendant for validation<p> 
        </div>
        <div class="book-btn-container4">
          <form class="form-book-btn4" action="payment.php" method="post">
          <input type="hidden" name="spot_id" id="booking-id-input" value="">
                <button type="submit" id="book-btn-content">BOOK NOW</button>
  </div>
</div>
</div>
</div> 
<div class="whole-container">
<div id="map"></div>
<div id="parking-spots"></div>
</div>
<script src="bookingjs.js"></script>
<script>
$(document).ready(function() {
  const searchParams = new URLSearchParams(window.location.search);
  var searchQuery = decodeURIComponent(searchParams.get('search'));
  var hourlyClicked = false;
  var monthlyClicked = false;
  
  // define a function to fetch the updated list of parking spots
  function getParkingSpots() {
    var sortOrder = $('#sort-filter').val();
    $.ajax({
      type: "POST",
      url: 'fetch.php',
      data: {
        // any data you want to send to the PHP script
        search: searchQuery,
        btn: true,
        hourly: hourlyClicked ? 'true' : 'false',
        monthly: monthlyClicked ? 'true' : 'false'
      },
      dataType: 'json',
      success: function(response) {
        if (sortOrder === 'asc') {
        response.sort(function(a, b) {
          return a.price - b.price;
        });
      } else if (sortOrder === 'desc') {
        response.sort(function(a, b) {
          return b.price - a.price;
        });
      }
        // update the #parking-spots div with the new list of parking spots
        var html = '';
        if (response.length === 0) {
          // display a message indicating no available spots
          html = '<p id="notavlble">No available parking spots.</p>';
        } else {
        $.each(response, function(index, spot) {
          html += '<form class="formlist" method="post" action="payment.php">';
          html += '<section class="list">';
          html += '<div class="g1-content">';
          html += '<div class="g1">';
          html += '<div>';
          html += '<img class="logos" src="' + (spot.image) + '" />';
          html += '</div>';
          html += '<div>';
          html += '<p id="plist">' + (spot.location ? spot.location : 'No data found') + '</p>';
          html += '</div>';
          html += '<div id="p-price">';
          html += spot.price + '<sup>L.E</sup><br><h6>per hour</h6>';
          html += '</div>';
          html += '<div id="description">';
          html += spot.description ? spot.description : 'No data found';
          html += '</div>';
          html += '<div class="book-btn-container">';
          html += '<input type="hidden" name="spot_id" value="' + spot.id + '">';
          html += '<button type="submit" id="book-btn1">BOOK NOW</button>';
          html += '</div>';
          html += '<a href="#" class="Details-btn" data-id="' + spot.id + '">DETAILS</a>';
          html += '</div>';
          html += '</div>';
          html += '</section>';
          html += '</form>';
        });
        }
        $('#parking-spots').html(html);
      }
    });
  }
  getParkingSpots();
  // call the function to fetch the initial list of parking spots
  
  $('#search-btn').on('click', function() {
var searchQuery = $('#search-box').val();
getParkingSpots(searchQuery);
});
  // add an event listener to the search button to fetch the updated list of parking spots when it's clicked
  $('#search-form').submit(function(event) {
    event.preventDefault();
    searchQuery = $('#searchPageId').val();
    if (searchQuery.trim() === '') {
      alert('Please enter a region to search.');
      return false;
    }
    getParkingSpots();
  });
  
  // add an event listener to the "Details" links to display the details of the selected parking spot
  $(document).on("click", ".Details-btn", function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    // send AJAX request with id parameter
    console.log("id:", id);
    // your code to display the details of the selected parking spot goes here
  });
  
  // add an event listener to the hourly and monthly buttons to fetch the updated list of parking spots when they're clicked
  $('#Hourly').click(function(event) {
    event.preventDefault();
    hourlyClicked = !hourlyClicked;
    monthlyClicked = false;
    getParkingSpots();
  });
  $('#Monthly').click(function(event) {
    event.preventDefault();
    monthlyClicked = !monthlyClicked;
    hourlyClicked = false;
    getParkingSpots();
  });
  $('#sort-filter').change(function() {
    getParkingSpots();
  });
});
</script>
<script>
$(document).on("click", ".Details-btn", function(e) {
  e.preventDefault();
  var id = $(this).data("id");
  console.log("id:", id);
  $.ajax({
    url: "get_details.php",
    type: "POST",
    data: {id: id},
    dataType: "json",
    success: function(response) {
      console.log("response:", response);
      if (response.location && response.price) {
        $("#plist-content").html(response.location);
        $("#p-price-content").html(response.price + '<sup>L.E</sup><br><h6>per hour</h6>');
        $("#description-content").html(response.description);
        $("#review-logo").attr("src", "" + response.image);
        $("#booking-id-input").val(response.id);
        togglePopup();
      } else {
        console.log("Error: Invalid response from server");
      }
    },
    error: function(xhr, status, error) {
      console.log("Error: " + error);
    }
  });
});

function togglePopup() {
  var popup = document.getElementById("popup-1");
  popup.classList.toggle("active");
}
function changeColor(btnId) {
  var btn = document.getElementById(btnId);
  var hourlyBtn = document.getElementById('Hourly');
  var monthlyBtn = document.getElementById('Monthly');
  
  if (btn == hourlyBtn) {
    hourlyBtn.style.color = '#00A3FF'; // blue color in hexadecimal
    monthlyBtn.style.color = '#929292'; // grey color in hexadecimal
  } else {
    monthlyBtn.style.color = '#00A3FF'; // blue color in hexadecimal
    hourlyBtn.style.color = '#929292'; // grey color in hexadecimal
  }
}
</script>
  <script src='map.js'></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="menu.js"></script>
</body>


</html>
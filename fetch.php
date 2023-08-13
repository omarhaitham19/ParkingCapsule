<?php
include("connection.php");
if (isset($_POST["btn"])) {
  $look = $_POST["search"];
  $type = "hourly"; // set the default type to hourly

  // check if btn2 (hourly) or btn3 (monthly) was pressed
  if (isset($_POST["hourly"]) && $_POST["hourly"] == "true") {
    $type = "hourly";
  } else if (isset($_POST["monthly"]) && $_POST["monthly"] == "true") {
    $type = "monthly";
  }


  $sql = "SELECT `id`, `location`, `description`, `image`, `price` FROM `parking_spot` WHERE `region` LIKE '%$look%' AND `type` ='$type'";
  $result = mysqli_query($con, $sql);

  $data = array(); // create an empty array to hold the data

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $location = $row['location'];
      $image = $row['image'];
      $price = $row['price'];
      $description = $row['description'];

      // add the data to the array
      $data[] = array(
        'id' => $id,
        'location' => $location,
        'image' => $image,
        'price' => $price,
        'description' => $description
      );
    }
  } else {
    // if no data is found, add an empty array to the data
    $data = array();
  }

  // encode the data as JSON and output it
  echo json_encode($data);
}
?>
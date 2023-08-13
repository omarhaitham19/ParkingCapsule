<?php
include("connection.php");
if (isset($_POST["id"])) {
  $id = $_POST["id"];
  $sql = "SELECT `location`, `price`, `description`, `image` FROM `parking_spot` WHERE `id` = $id";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $data = array(
      "id" => $id,
      "location" => $row['location'],
      "price" => $row['price'],
      "description" => $row['description'],
      "image" => $row['image']
    );
    echo json_encode($data);
  } else {
    echo json_encode(array()); // return an empty JSON object if no data is found
  }
}
?>
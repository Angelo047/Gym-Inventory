<?php
$conn = mysqli_connect("localhost", "root", "", "inventory");

if (!$conn) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>

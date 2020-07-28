<?php
require('database.php');

// Catch the form data
$Name = $_GET['name'];
$Email = $_GET['email'];
$Mobile = $_GET['mobile'];
$Password = $_GET['password'];
$Address = $_GET['address'];

if ($conn != null) {
  $sql = "INSERT INTO user (name, email, mobile,password,address) VALUES ('$Name','$Email','$Mobile','$Password','$Address')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
}
$conn = null;  

?>
<?php
// Catch the form data
$Name = $_GET['name'];
$Email = $_GET['email'];
$Mobile = $_GET['mobile'];
$Password = $_GET['password'];
$Address = $_GET['address'];

// Define the require variable
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "user_management";

// Data Insert Function
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO user (name, email, mobile,password,address) VALUES ('$Name','$Email','$Mobile','$Password','$Address')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
  
?>
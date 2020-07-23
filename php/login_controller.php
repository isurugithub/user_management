<?php
session_start();

// Database Connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "user_management";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();exit;
}

  // Define email and password
  $Email = $_POST['email'];
  $Password = $_POST['password'];

  if (empty($Email)) {
    $message = "Pleace enter your email...!";
    print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
  }
  elseif (empty($Password)) {
    $message = "Pleace enter your password...!";
    print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
  }
  else {
  
    // Check the database to login
    $result = $conn->prepare("SELECT count(*) FROM user WHERE email='$Email' AND password='$Password'");
    $result->execute(); 
    $number_of_rows = $result->fetchColumn();
 
    // Login conditions
    if ($number_of_rows == 0) {
      $message = "Loin Fail...!";
      print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
    }else {
      $message = "Login Successfull...!";
      $result = $conn->prepare("SELECT id FROM user WHERE email='$Email' AND password='$Password'");
      $result->execute(); 
      $row = $result->fetchColumn();
      $_SESSION['login_user'] = $row['id'];
      print_r(json_encode(['status'=>true,'msg'=>$message]));exit;  
    }
  }
?>

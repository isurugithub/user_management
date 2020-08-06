<?php
require('database.php');

// Catch the form data
$Name = trim($_GET['name']);
$Email = trim($_GET['email']);
$Mobile = trim($_GET['mobile']);
$Password = trim($_GET['password']);
$ConfirmPassword = trim($_GET['confirm_password']);
$Address = trim($_GET['address']);

// Name Validation
if (empty($Name)) {
  $message = "Please enter your name...!";
  print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
}else {  
  // check if name only contains letters and whitespace  
  if (!preg_match("/^[a-zA-Z ]*$/",$Name)) {  
    $message = "Only alphabets and white space are allowed...!";  
    print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
  }
}

// Email Validation
if (empty($Email)) {
  $message = "Please enter your email...!";
  print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
}else { 
  // check that the e-mail address is well-formed  
  if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) { 
    $message = "Invalid email format...!";
    print_r(json_encode(['status'=>false,'msg'=>$message]));exit;   
  }
}

// Mobile Validation
if (empty($Mobile)) {
  $message = "Please enter your mobile...!";
  print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
}else {
  // check if mobile no is well-formed  
  if (!preg_match ("/^[0-9]*$/", $Mobile) ) {  
    $message = "Only numeric value is allowed...!";
    print_r(json_encode(['status'=>false,'msg'=>$message]));exit; 
  }
  if (strlen ($Mobile) != 10) {  
    $message = "Mobile number must contain 10 digits...!";
    print_r(json_encode(['status'=>false,'msg'=>$message]));exit; 
  }
}

// Passsword Validation
if (empty($Password)) {
  $message = "Please enter your password...!";
  print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
}else {
  if (strlen ($Password) <= 3) {  
    $message = "Password must at least 4 characters...!";
    print_r(json_encode(['status'=>false,'msg'=>$message]));exit; 
  }
}

// Address Validation
if (empty($Address)) {
  $message = "Please enter your address...!";
  print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
}

if ($Password != $ConfirmPassword) {
  $message = "Please enter same password...!";
  print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
}

// DataBase Operations.
if ($conn != null) {

  $result = $conn->prepare("SELECT count(*) FROM user WHERE email='$Email'");
  $result->execute(); 
  $number_of_rows = $result->fetchColumn();

  if ($number_of_rows == 0) {
    $message = "New Registration Successfull...!";
    $result = $conn->prepare("INSERT INTO user (name, email, mobile,password,address) VALUES ('$Name','$Email','$Mobile','$Password','$Address')");
    $result->execute(); 
    print_r(json_encode(['status'=>true,'msg'=>$message]));exit;  
  }else {
    $message = "This Email is exsisting this system...!";
    print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
  }
}
$conn = null;  

?>
<?php  
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
  echo "Connection failed: " . $e->getMessage();
}

// Catch the Post Data
$Name = $_POST['name'];
$Password = $_POST['password'];

// Valitate Name And Password
if ($Name == "") {
  $message = "Pleace enter your name...!";
  print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
}
if ($Password == "") {
  $message = "Pleace enter your password...!";
  print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
}

// Check the database to login
$result = $conn->prepare("SELECT count(*) FROM user WHERE name='$Name' AND password='$Password'");
$result->execute(); 
$number_of_rows = $result->fetchColumn();

// Login conditions
if ($number_of_rows == 0) {
  $message = "Loin Fail...!";
  print_r(json_encode(['status'=>false,'msg'=>$message]));exit;
}else {
  //
  //  create session ?????????
  //
  $message = "Login Successfull...!";
  print_r(json_encode(['status'=>true,'msg'=>$message]));exit;
}

?>

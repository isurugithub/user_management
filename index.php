<?php
session_start(); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: welcome.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <div id="alert">
            </div>

            <form action="php/login_controller.php" method="post" id="login_form" class="form-signin">

              <div class="form-label-group">
                <input type="text" name="name" id="inputName" class="form-control" placeholder="Name"  autofocus>
                <label for="inputName">Name</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit" >Login</button>

              <hr class="my-4">
              <p class="message">Not registered? <a href="form.php">Create an account</a></p>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
   
</body>
</html>
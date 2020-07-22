<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
         
</head>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Register Form</h5>
            <form class="form-signin" id="register_form" action="php/form_controller.php" method="GET">

              <div class="form-label-group">
                <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" autofocus>
                <label for="inputName">Name</label>
              </div>

              <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" >
                <label for="inputEmail">Email</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="mobile" id="inputMobile" class="form-control" placeholder="Mobile" >
                <label for="inputMobile">Mobile</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
                <label for="inputPassword">Password</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="re_password" id="input_re_Password" class="form-control" placeholder="Confirm Password" >
                <label for="input_re_Password">Confirm Password</label>
              </div>

              <div class="form-label-group">
                <textarea class="form-control" name="address" id="inputAddres" cols="30" rows="3" placeholder="   Address" ></textarea>
              </div>

              <hr class="my-4">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</body>
</html>
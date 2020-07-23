<!-- <!DOCTYPE html>
<html>
<head>

<title>Your Home Page</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">

</head>
<body>
    
<div class="container welcome">
    <b style id="welcome">Welcome...!<i><?php echo $login_session; ?></i></b>
</div>
<div class="logout">
    <b id="logout"><a href="php/logout.php">Log Out</a></b>
</div>
</body>
</html> -->










<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title></title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .bs-example{
            margin: 20px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Users List</h2>
                    </div>
                    <?php
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
                    $result = $conn->prepare("SELECT * FROM user");
                    $result->execute([$bar]); 
                    $number_of_rows = $result->fetchColumn();
                    ?>
 
                    <?php
                    if ($number_of_rows > 0) {
                        ?>
                        <table class='table table-bordered table-striped'>
                        
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Mobile</td>
                            <td>Password</td>
                            <td>Address</td>
                            
                        </tr>

                        <?php
                        $row = $result->fetchAll(\PDO::FETCH_ASSOC);
                        foreach ($row as $key => $value) {
                            
                        ?>
                        <tr>
                            <td><?php echo $value["name"]; ?></td>
                            <td><?php echo $value["email"]; ?></td>
                            <td><?php echo $value["mobile"]; ?></td>
                            <td><?php echo $value["password"]; ?></td>
                            <td><?php echo $value["address"]; ?></td>
                            
                        </tr>
                        <?php
                        
                        }
                        ?>
                        </table>
                        <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
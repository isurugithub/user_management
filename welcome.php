<?php
session_start(); // Includes Login Script

if(!isset($_SESSION['login_user'])){
header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/styles.css" >
    
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h1 class="welcome">Welcome...!</h1>

                            <div class='container'>
                                <!-- Modal -->
                                <div id="updateModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                        <label for="name" >Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name" required> 
                                        </div>
                                        <div class="form-group">
                                        <label for="email" >Email</label> 
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email"> 
                                        </div>
                                        <div class="form-group">
                                        <label for="mobile" >Mobile</label> 
                                        <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile"> 
                                        </div>
                                        <div class="form-group">
                                        <label for="password" >Password</label> 
                                        <input type="email" class="form-control" id="password" placeholder="Enter Password"> 
                                        </div>
                                        <div class="form-group">
                                        <label for="address" >Address</label> 
                                        <textarea class="form-control" name="address" id="address" cols="30" rows="3" placeholder="Enter Address" ></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="txt_userid" value="0">
                                        <button type="button" class="btn btn-success btn-sm" id="btn_save">Update</button>
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>

                                </div>
                            </div>

                            <table id="welcome_form" class="display cell-border" style="width: 100%" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Password</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                            <div>
                            <div>
                                <b id="logout"><a href="php/logout.php">Log Out</a></b>
                            </div>
                            <div>
                                <button  type="button" class="btn btn-success addbtn" onclick="document.location='form.php'">Add</button>
                            </div>
                                
                                       
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="js/index.js"></script>
    
</html>
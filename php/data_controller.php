<?php
require('database.php');

$request = "load_view";
if(isset($_POST['request'])){
   $request = $_POST['request'];
}

if($request == "load_view"){
  ## Read value
  $draw = $_POST['draw'];
  $row = $_POST['start'];
  $rowperpage = $_POST['length']; // Rows display per page
  $columnIndex = $_POST['order'][0]['column']; // Column index
  $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
  $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
  $searchValue = $_POST['search']['value']; // Search value


  $searchArray = array();
  ## Search 
  $searchQuery = " ";
  if($searchValue != ''){
    $searchQuery = " AND (name LIKE :name OR 
          email LIKE :email OR 
          mobile LIKE :mobile OR 
          address LIKE :address ) ";
    $searchArray = array( 
          'name'=>"%$searchValue%", 
          'email'=>"%$searchValue%",
          'mobile'=>"%$searchValue%",
          'address'=>"%$searchValue%"
    );
  }

  ## Total number of records without filtering
  $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM user ");
  $stmt->execute();
  $records = $stmt->fetch();
  $totalRecords = $records['allcount'];

  ## Total number of records with filtering
  $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM user WHERE 1 ".$searchQuery);
  $stmt->execute($searchArray);
  $records = $stmt->fetch();
  $totalRecordwithFilter = $records['allcount'];

  ## Fetch records
  $stmt = $conn->prepare("SELECT * FROM user WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

  // Bind values
  foreach($searchArray as $key=>$search){
    $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
  }

  $stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
  $stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
  $stmt->execute();
  $empRecords = $stmt->fetchAll();
  $conn = null;
  $data = array();

  foreach($empRecords as $row){
    // Update Button
    $updateButton = "<button class='btn btn-sm btn-info updateUser' data-id='".$row['id']."' data-toggle='modal' data-target='#updateModal' >Update</button>";

    // Delete Button
    $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row['id']."'>Delete</button>";

    $action = $updateButton." ".$deleteButton;

    $data[] = array(
        "name"=>$row['name'],
        "email"=>$row['email'],
        "mobile"=>$row['mobile'],
        "password"=>$row['password'],
        "address"=>$row['address'],
        "action" => $action
    );

  }
  // DataTable data
  if($request == "load_view"){
    ## Response
    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $data
    );
    echo json_encode($response);exit;
  }
}

if($request == "update_view"){
  $id = $_POST['id'];
  if ($conn != null) {
    $result = $conn->prepare("SELECT * FROM user WHERE id='$id'");
    $result->execute();
    $conn = null;
    $response = array();
    $row = $result->fetchAll(\PDO::FETCH_ASSOC);
    if ($row != null) {
      $response = array(                 
        "name" => $row[0]['name'],
        "email" => $row[0]['email'],
        "mobile" => $row[0]['mobile'],
        "password" => $row[0]['password'],
        "address" => $row[0]['address']
      );
     echo json_encode( array("status" => 1,"data" => $response));exit;
    }else{
      echo json_encode( array("status" => 0) );
      exit;
    }
  }
}

// Update user
if($request == "update_db"){
  $id = 0;
  $id = trim($_POST['id']);// id pass wenne na
  // Check id
  if($id != null){

     $name = trim($_POST['name']);
     $email = trim($_POST['email']);
     $mobile = trim($_POST['mobile']);
     $password = trim($_POST['password']);
     $address = trim($_POST['address']);

     if( $name != '' && $email != '' && $mobile != '' && $password != '' && $address != '' ){

      $result = $conn->prepare("UPDATE user SET name='$name',email='$email',mobile='$mobile',password='$password',address='$address' WHERE id='$id'");
      $result->execute();
      echo json_encode( array("status" => 1,"message" => "Record updated.") );
      exit;

     }else{

      echo json_encode( array("status" => 0,"message" => "Please fill all fields.") );
      exit;

     }

  }else{
     echo json_encode( array("status" => 0,"message" => "Invalid ID.") );
     exit;
  }
}

// Delete User
if($request == "delete_data"){
  $id = 0;
  $id = $_POST['id'];
  if($id > 0){ 
    $result = $conn->prepare("DELETE FROM user WHERE id='$id'");
    $result->execute();
     echo 1;
     exit;
  }else{
     echo 0;
     exit;
  }
}

?>


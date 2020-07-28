<?php
require('database.php');

// ## Read value
// $draw = $_GET['draw'];
// $row = $_GET['start'];
// $rowperpage = $_GET['length']; // Rows display per page
// $columnIndex = $_GET['order'][0]['column']; // Column index
// $columnName = $_GET['columns'][$columnIndex]['data']; // Column name
// $columnSortOrder = $_GET['order'][0]['dir']; // asc or desc
// $searchValue = $_GET['search']['value']; // Search value

// ## Search 
// $searchQuery = " ";
// if($searchValue != ''){
//    $searchQuery = " and (emp_name like '%".$searchValue."%' or 
//         email like '%".$searchValue."%' or 
//         city like'%".$searchValue."%' ) ";
// }

// ## Total number of records without filtering
// $sel = mysqli_query($con,"select count(*) as allcount from employee");
// $records = mysqli_fetch_assoc($sel);
// $totalRecords = $records['allcount'];

// ## Total number of record with filtering
// $sel = mysqli_query($con,"select count(*) as allcount from employee WHERE 1 ".$searchQuery);
// $records = mysqli_fetch_assoc($sel);
// $totalRecordwithFilter = $records['allcount'];

// ## Fetch records
// $empQuery = "select * from employee WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// $empRecords = mysqli_query($con, $empQuery);
// $data = array();

// while ($row = mysqli_fetch_assoc($empRecords)) {
//    $data[] = array( 
//       "emp_name"=>$row['emp_name'],
//       "email"=>$row['email'],
//       "gender"=>$row['gender'],
//       "salary"=>$row['salary'],
//       "city"=>$row['city']
//    );
// }

// ## Response
// $response = array(
//   "draw" => intval($draw),
//   "iTotalRecords" => $totalRecords,
//   "iTotalDisplayRecords" => $totalRecordwithFilter,
//   "aaData" => $data
// );

// echo json_encode($response);

$result = $conn->prepare("SELECT * FROM user");
$result->execute([$bar]);
$row = $result->fetchAll(\PDO::FETCH_ASSOC);

$list = [];
  
  foreach ($row as $client) {  
    $list[] = array(
      'name' => $client['name'],
      'email' => $client['email'],
      'mobile' => $client['mobile'],
      'password' => $client['password'],
      'address' => $client['address']
    );
  }

  $data = [];
  $data['draw'] = $_GET['draw'];
  $data['recordsTotal'] = count($list);
  $data['recordsFiltered'] = count($list);
  $rowperpage = $_GET['length'];
  $data['data'] = $list;

  echo json_encode($data);exit;

?>
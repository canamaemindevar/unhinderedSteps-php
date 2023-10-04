<?php

$con = mysqli_connect("localhost","root","","DENEMEDB");

$response = array();
if($con) {
   // echo "DB connection succes";

 $data = json_decode(file_get_contents('php://input'),true );
 //print_r($data);
 header("Content-Type: JSON");
 $id = $data['id'];
 $FullName = $data['FullName'];
 $LastResearch = $data['LastResearch'];
 $EmergencyCall = $data['Emergency Call'];

 $query = "INSERT INTO `UserData`(`id`, `FullName`, `LastResearch`, `Emergency Call`) VALUES ('$id','$FullName','$LastResearch','$EmergencyCall')";
 $result = mysqli_query($con,$query);
 
 if ($result) {

  $response['message'] = "succes";
  $response['id'] = $id;
  $response['FullName'] = $FullName;
  $response['LastResearch'] = $LastResearch;
  $response['Emergency Call'] = $EmergencyCall;
  
  echo json_encode($response);
 }
  else {
    $response['message'] = "failed";
  }
}
else {
    echo "DB connection failed";
}

mysqli_free_result($result);
mysqli_close($con);



?>
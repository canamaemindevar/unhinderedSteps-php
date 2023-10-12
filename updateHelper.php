<?php

$con = mysqli_connect("localhost","kouiot_emin","]@%A3zi(t[GA","kouiot_emin");

$response = array();
if($con) {
 
  

  $data = json_decode(file_get_contents('php://input'),true );
 
  $id = $data['userId'];
  $helperName = $data['helperName'];
  $helperMail = $data['helperMail'];
  $helperPhone = $data['helperPhone'];

  $sql = "UPDATE UsersTable SET helperName='$helperName', helperMail='$helperMail', helperPhone='$helperPhone' WHERE id=$id";
  $result = mysqli_query($con,$sql);
  
  
  if ($result) {
  
  $response['message'] = "succes";

 
  $response['helperName'] = $helperName;
  $response['helperPhone'] = $helperPhone;
  $response['helperMail'] = $helperMail;
  
 }
 else {
  $response['message'] = "failed";
 }
  echo json_encode($response);
 
 
}
else {
    echo "DB connection failed";
}

?>
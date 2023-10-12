<?php

$con = mysqli_connect("localhost","kouiot_emin","]@%A3zi(t[GA","kouiot_emin");

$response = array();
if($con) {
 
  

  $data = json_decode(file_get_contents('php://input'),true );
 
  $id = $data['userId'];
  
  $mail = $data['mail'];
  $password = password_hash($data['password'],PASSWORD_DEFAULT);

  $sql = "UPDATE UsersTable SET mail='$mail', password='$password' WHERE id=$id";
  $result = mysqli_query($con,$sql);
  
  
  if ($result) {
  
  $response['message'] = "succes";

 
  $response['mail'] = $mail;

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
<?php

$con = mysqli_connect("localhost","kouiot_emin","]@%A3zi(t[GA","kouiot_emin");

$response = array();
if($con) {
  

 $data = json_decode(file_get_contents('php://input'),true );

  header("Content-Type: JSON");
 $mail = $data['mail'];
 $username = $data['username'];

 
 $helperName = $data['helperName'];
 $helperMail = $data['helperMail'];
 $helperPhone = $data['helperPhone'];
 $password = password_hash($data['password'],PASSWORD_DEFAULT);

 $query = "INSERT INTO `UsersTable`(`mail`,`username`, `helperName`,`helperMail`,`helperPhone`,`password` ) VALUES ('$mail','$username','$helperName','$helperMail','$helperPhone','$password')";
 
 
 $result = mysqli_query($con,$query);
 if ($result) {
  
  $response['message'] = "succes";
  //$response['id'] = $id;
  $response['username'] = $username;
 
  $response['helperName'] = $helperName;
  
  echo json_encode($response);
}
else {
  $response['message'] = "failed";
}
  
}
else {
    echo "DB connection failed";
}

//mysqli_free_result($result);
//mysqli_close($con);



?>
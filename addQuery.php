<?php

$con = mysqli_connect("localhost","kouiot_emin","]@%A3zi(t[GA","kouiot_emin");

$response = array();
if($con) {
  

 $data = json_decode(file_get_contents('php://input'),true );
 

 header("Content-Type: JSON");
 $word = $data['word'];
 $userId = $data['id'];

 $query = "INSERT INTO `UserSearch`(`userId`,`word` ) VALUES ('$userId','$word')";

 $result = mysqli_query($con,$query);
 if ($result) {
  
  $response['message'] = "succes";
  //$response['id'] = $id;
  $response['word'] = $word;
 
  $response['userId'] = $userId;
  
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

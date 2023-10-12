<?php

$con = mysqli_connect("localhost","kouiot_emin","]@%A3zi(t[GA","kouiot_emin");
$response = array();

if($con) {

   
    
    $data = json_decode(file_get_contents('php://input'),true );
    header("Content-Type: JSON");
    $userId = $data['userId'];
    $sql = "SELECT * FROM `UserFavorite` WHERE userId = '$userId'";
    $result = mysqli_query($con,$sql);
 
  
    $numberofUsers = mysqli_num_rows($result);
     
 
    if ($numberofUsers > 0)  {
        
         if ($result){
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
            $response[$i]['word'] = $row['word'];
            
            $i++;
            }
            echo json_encode($response);
        }
        
    }
  
}
  
else {
    echo "DB connection failed";
}

?>
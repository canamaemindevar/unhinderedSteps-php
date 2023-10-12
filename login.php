
<?php

$con = mysqli_connect("localhost","kouiot_emin","]@%A3zi(t[GA","kouiot_emin");
$response = array();

if($con) {

   
    
    $data = json_decode(file_get_contents('php://input'),true );
    header("Content-Type: JSON");
    $username = $data['username'];
    $password = $data['password'];

   
 
    $sql = "SELECT * FROM `UsersTable` WHERE username = '$username'";
    $result = mysqli_query($con,$sql);
 
 
    $numberofUsers = mysqli_num_rows($result);
  
  
 if ($numberofUsers > 0)  {
   
     $targetUser = mysqli_fetch_assoc($result);
   
    
     $passwordWithHashed = $targetUser["password"];
     $id = $targetUser["id"];
     $helperName = $targetUser["username"];
     $mail = $targetUser["mail"];
     $helperName = $targetUser["helperName"];
     $helperMail = $targetUser["helperMail"];
     $helperPhone = $targetUser["helperPhone"];
     
     
    
      if(password_verify($password,$passwordWithHashed)) {

        $response['message'] = "succes";
        
        $response['id'] = $id;
        $response['username'] = $username;
        $response['mail'] = $mail;
        $response['helperName'] = $helperName;
        $response['helperMail'] = $helperMail;
        $response['helperPhone'] = $helperPhone;

        echo json_encode($response);

       } else {
        $response['message'] = "Wrong Password";
        
        echo json_encode($response);
    }
    
  } 
    else {
    $response['message'] = "Wrong User Name";
    echo json_encode($response);
  }
 
}

else {
  echo "DB connection failed";
}

?>
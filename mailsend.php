<?php

$con = mysqli_connect("localhost","kouiot_emin","]@%A3zi(t[GA","kouiot_emin");

 use PHPMailer\PHPMailer\PHPMailer;
 use PHP\PHPMailer\Exception;
 
 require 'phpmailer/src/Exception.php';
 require 'phpmailer/src/PHPMailer.php';
 require 'phpmailer/src/SMTP.php';

$response = array();
$words = array();
$phpresponse = array();
if($con) {

    $data = json_decode(file_get_contents('php://input'),true );

    $userId = $data['id'];
    $targetmail = $data['helperMail'];
    $topic = $data['topic'];
    $konu = "Bilgilendirme";
    $message = "deneme";
    $baslik = "baslik";
    $sql = "SELECT * FROM `UserSearch` WHERE userId = '$userId'";
    $result = mysqli_query($con,$sql);
    $numberofUsers = mysqli_num_rows($result);
    $data = array();



 
    if ($numberofUsers > 0)  {
        
         if ($result){
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
            $response[$i] = $row['word'];
            
            $i++;
            }
           // echo json_encode($response);
      
            // burdan devam
            
            $mail = new PHPMailer(true);
            
            $mail -> isSMTP();
            $mail -> Host = 'smtp.gmail.com';
            $mail -> SMTPAuth = true;
            $mail -> Username = 'emincanantalyali@gmail.com';
            $mail -> Password = 'wzqwpaezufdvnfwd';
            $mail -> SMTPSecure = 'ssl';
            $mail -> Port = 465;
            
            $mail -> setFrom('emincanantalyali@gmail.com');
            $mail -> addAddress($targetmail);
            
            $mail -> isHTML(true);
            
            $mail -> Subject = ($topic);
        
            $newArr = implode(',  ', $response); 
            $mail -> Body = ($newArr);
            
            $mail -> send();
            $phpresponse['message'] = "success";
            echo json_encode($phpresponse);
        }
        
    }
   
    
}
else {
    echo "DB connection failed";
}
?>
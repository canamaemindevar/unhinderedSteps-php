


<?php

$con = mysqli_connect("localhost","kouiot_emin","]@%A3zi(t[GA","kouiot_emin");
$response = array();
if($con){
    $sql = "select * from UsersTable";
    $result = mysqli_query($con,$sql);

    if ($result){
        header("Content-Type: JSON");
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
        $response[$i]['id'] = $row['id'];
        $response[$i]['username'] = $row['username'];
        $response[$i]['mail'] = $row['mail'];
        $response[$i]['helperMail'] = $row['helperMail'];

        $i++;
        }
        echo json_encode($response);
    }

    mysqli_free_result($result);
    mysqli_close($con);
} else {
    echo "DB connection failed";
}

?>
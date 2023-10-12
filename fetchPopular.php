<?php

$con = mysqli_connect("localhost","kouiot_emin","]@%A3zi(t[GA","kouiot_emin");
$response = array();

if($con) {

   
    
    $data = json_decode(file_get_contents('php://input'),true );
    header("Content-Type: JSON");
 $userId = $data['id'];
$sql = "SELECT word, COUNT(*) as kullanim_sayisi FROM UserSearch WHERE userId = '$userId' GROUP BY word ORDER BY kullanim_sayisi DESC";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $numberofRows = mysqli_num_rows($result);

        if ($numberofRows > 0) {
            $en_cok_bulunanlar = array();
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                  /*
                $sütun_değeri = $row['word'];
                $kullanım_sayısı = $row['kullanım_sayısı'];

                $en_cok_bulunanlar[] = $sütun_değeri;
              */
                $response[$i]['word'] = $row['word'];

                $i++;
            }

           // echo json_encode($en_cok_bulunanlar);
           echo json_encode($response);
        } else {
            echo "Veri bulunamadı.";
        }
    } else {
        echo "Sorgu hatası: " . mysqli_error($con);
    }


  
}
  
else {
    echo "DB connection failed";
}

?>
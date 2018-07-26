<?php

$curlFile = curl_file_create("image/".$messageid.".jpg");
$data = array('photo'=> $curlFile);

$cSession = curl_init();

curl_setopt($cSession,CURLOPT_URL,"http://speakbug.com/online_ocr/simapi.php");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);
curl_setopt($cSession, CURLOPT_POSTFIELDS, $data);

$result=curl_exec($cSession);

curl_close($cSession);

// echo $result;
$json = json_decode($result, true);
$linkOCR = "";
    foreach ($json as $key => $value){
        if($key == "zippath"){
          $linkOCR = $value;
        }
    };


require "_alldbconnect.php";

$sql = "UPDATE `apiline` SET `ocr_link`='$linkOCR' WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
if ($conn->query($sql) === TRUE) {
  echo "insert success";
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}

 ?>

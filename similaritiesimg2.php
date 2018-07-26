<?php
require "_alldbconnect.php";

$sql = "INSERT INTO `apiline`(`process`,`messageid`, `userid`, `image_number` )
        VALUES ('$text','$messageid','$userid','$image_number')";
if ($conn->query($sql) === TRUE) {
  echo "insert success";
  $curl = curl_init();
  $resOK = array("ค่ะ","ครับ","ครับผม","น่ะครับ","น่ะค่ะ");

  $cars = array("ระบบกำลังประมวลผล กรุณารอสักครู่".$resOK[rand(0,4)],
                "ระบบกำลังประมวลผล โปรดรอสักครู่".$resOK[rand(0,4)],
                "กรุณารอสักครู่ ระบบกำลังประมวลผล".$resOK[rand(0,4)],
                "โปรดรอสักครู่ ระบบกำลังประมวลผล".$resOK[rand(0,4)],);
  $aws = $cars[rand(0,3)];

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.line.me/v2/bot/message/push",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{
      \"to\": \"$userid\",
      \"messages\": [
        \t      {
              \"type\": \"text\",
              \"text\": \"$aws\"
              }

        ]
   }",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer " . $access_token,
      "content-type: application/json",
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}

 ?>

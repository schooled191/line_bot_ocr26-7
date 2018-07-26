<?php

require "_allSIMprocess2.php";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.line.me/v2/bot/message/push",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{
    \"to\": \"$userid\",
    \"messages\": [
      \t      {
            \"type\": \"text\",
            \"text\": \"Similarity degree: $output\"
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

require "_alldbconnect.php";

$sql = "UPDATE `apiline` SET `similarity_degree`='$output' WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
if ($conn->query($sql) === TRUE) {
  echo "insert success";
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}

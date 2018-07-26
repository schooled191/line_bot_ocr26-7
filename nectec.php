<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.line.me/v2/bot/message/push",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n    \"to\": \"$userid\",\n    \"messages\": [\n\t      \n    {\n  \"type\": \"template\",\n  \"altText\": \"this is a carousel template\",\n  \"template\": {\n      \"type\": \"carousel\",\n      \"columns\": [\n          {\n            \"thumbnailImageUrl\": \"https://beebom-redkapmedia.netdna-ssl.com/wp-content/uploads/2016/01/Reverse-Image-Search-Engines-Apps-And-Its-Uses-2016.jpg\",\n            \"title\": \"OCR\",\n            \"text\": \"อธิบาย ocr\",\n            \"actions\": [\n                {\n                    \"type\": \"postback\",\n                    \"label\": \"เริ่ม\",\n                    \"data\": \"ocr\"\n                }\n            ]\n          },\n          {\n            \"thumbnailImageUrl\": \"https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg\",\n            \"title\": \"Similarities\",\n            \"text\": \"อธิบาย similarities\",\n            \"actions\": [\n                {\n                    \"type\": \"postback\",\n                    \"label\": \"เริ่ม\",\n                    \"data\": \"similarities\"\n                }\n            ]\n          }\n      ]\n  }\n}\n\n    ]\n}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer $access_token",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 8e5405c6-1f53-3011-903d-0e32cde188c2"
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

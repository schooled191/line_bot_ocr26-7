<?php
foreach ($events['events'] as $a) {
    $userid = $event['source']['userId'];
    $messageid = $a['message']['id'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.line.me/v2/bot/message/$messageid/content",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "authorization: Bearer $access_token",
        "cache-control: no-cache",
        "postman-token: 45796f53-cda3-e358-14a8-b953b2ec02c2"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // echo $response;
    }
    // $data = base64_decode($response);
    // echo $data;

    file_put_contents("image/$messageid.jpg", $response);

    require "selectprocess.php";


}

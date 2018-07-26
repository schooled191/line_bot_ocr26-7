<?php
	foreach ($events['events'] as $event) {

    require "_alldbconnect.php";

    $sql = "UPDATE `apiline` SET `email`='$email' WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
    if ($conn->query($sql) === TRUE) {
      // $userid = $event['source']['userId'];
      // $text = $event['message']['text'];
      $replyToken = $event['replyToken'];
      // $process = 'ocr';
      $messages = [
        'type' => 'text',
        'text' => "อีเมลล่าสุดของคุณคือ ".$email
      ];
      $url = 'https://api.line.me/v2/bot/message/reply';
      $data = [
        'replyToken' => $replyToken,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n";
    } else {
      echo "error:" . $sql . "<br>" . $conn->error;
    }
	}
echo "OK";

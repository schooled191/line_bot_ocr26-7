<?php
foreach ($events['events'] as $a) {
    $replyToken = $a['replyToken'];
    $messages = [
      'type' => 'text',
      'text' => "บริการแปลงไฟล์ภาพเอกสารเป็นข้อความโดยอัตโนมัติ(OCR) และบริการเปรียบเทียบภาพ 2 ภาพ(similarity) กรุณาพิมพ์ OCR หรือ similarity ตามกระบวนการที่ต้องการค่ะ"
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
}

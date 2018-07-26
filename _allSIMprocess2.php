<?php

require "_alldbconnect.php";

$sql = "SELECT messageid FROM apiline WHERE userid = 'Uf3f262a1d80ca2eb6e2ebed55d347c64' ORDER BY id DESC LIMIT 2";
$result = $conn->query($sql);
$simIMG = array();
$i = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $simIMG[$i] = $row["messageid"];
        $i++;
    }
} else {
    echo "0 results";
}

$cSession = curl_init();

curl_setopt($cSession,CURLOPT_URL,"http://speakbug.com/online_ocr/compute_sim.php?img1=".$simIMG[0]."&img2=".$simIMG[1]);
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);
curl_setopt($cSession, CURLOPT_POSTFIELDS, $data);

$result=curl_exec($cSession);

curl_close($cSession);

// echo $result;
$json = json_decode($result, true);
$output = $result;



  ?>

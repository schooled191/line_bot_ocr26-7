<?php
// $resOK = array(1,2,3,4,5);
// sleep($resOK[rand(0,4)]);

require "_alldbconnect.php";

$sql = "SELECT process,messageid FROM apiline WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if ($row['process'] == 'ocr') {
  if ($row['messageid'] != null) {
    $process = 'ocr';
    require "connectdatabaseimage.php";
  } elseif ($row['messageid'] == null) {
    $process = 'ocr';
    require "connectdatabaseimage2.php";
  }

} elseif ($row['process'] == 'similarity') {
  require "_allSIMprocess.php";
  $sql = "SELECT image_number FROM apiline WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  if ($row['image_number'] == 0) {
    $image_number = 1;
    $text = "similarity";
    require "similaritiesimgupdate.php";
  } elseif ($row['image_number'] == 1) {
    $image_number = 2;
    $text = "similarity";
    require "similaritiesimg2.php";
    require "pushsimilarity.php";
  } elseif ($row['image_number'] == 2) {
    $image_number = 1;
    $text = "similarity";
    require "similaritiesimg.php";
  }
} else {
  require "nonnectec.php";
}


 ?>

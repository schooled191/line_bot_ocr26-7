<?php
require "_alldbconnect.php";

$sql = "UPDATE `apiline` SET `messageid`='$messageid',`image_number`='$image_number' WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
if ($conn->query($sql) === TRUE) {
  echo "insert success";
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}

 ?>

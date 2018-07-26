<?php
require "_alldbconnect.php";

$sql = "INSERT INTO `apiline`(`process`,`messageid`, `userid`, `image_number`)
        VALUES ('$text','$messageid','$userid','$image_number')";
if ($conn->query($sql) === TRUE) {
  echo "insert success";
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}

 ?>

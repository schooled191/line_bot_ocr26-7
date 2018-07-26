<?php

$servername = "root@202.183.247.123";
$username = "root";
$password = "092246700";
$db_name = "botline";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

 ?>

<?php

$servername = "localhost";
$username = "root";
$password = "0891861628";
$db_name = "botline";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

 ?>

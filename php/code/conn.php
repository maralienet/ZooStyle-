<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$db = "ZooStyle";

$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    die("Подключение не удалось: " . $conn->connect_error);
}
?>

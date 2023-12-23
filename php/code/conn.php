<?php
$servername = "sql200.hostingem.ru";
$username = "gnioo_35645704"; 
$password = "174285396z"; 
$db = "gnioo_35645704_ZooStyle";

$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    die("Подключение не удалось: " . $conn->connect_error);
}
?>

<?php
require("conn.php");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE Users SET active=0 WHERE `userId`=$id";
    $result = $conn->query($sql);

    setcookie('id', '', time() - 3600, "/");
    $conn->close();
}

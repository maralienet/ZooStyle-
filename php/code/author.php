<?php
require("conn.php");
if (isset($_POST['phonenum']) && isset($_POST['pass'])) {
    $phonenum = $_POST['phonenum'];
    $pass = $_POST['pass'];

    $sql = "SELECT userId as uid from Users where password='$pass' and phone='$phonenum'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc())
            $uid = $row['uid'];

        setcookie('id', $uid, time() + (3600), "/");
        $conn->close();
        echo 'OK';
    }
    else
        echo 'Неверный логин или пароль';
}

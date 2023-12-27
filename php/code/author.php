<?php
if (isset($_POST['phonenum']) && isset($_POST['pass']))
    authorization();

function authorization(){
require("conn.php");
    $phonenum = $_POST['phonenum'];
    $pass = $_POST['pass'];

    $sql = "SELECT userId as uid ,active from Users where password='$pass' and phone='$phonenum'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $uid = null;
        while ($row = $result->fetch_assoc()) {
            if ($row['active']==1) {
                echo 'OK';
                $uid = $row['uid'];
            } else echo 'Аккаунт не существует';
        }
        if ($uid != null)
            setcookie('id', $uid, time() + (3600), "/");
        $conn->close();
    } else
        echo 'Неверный номер телефона или пароль';
}
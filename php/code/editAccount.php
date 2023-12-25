<?php
if (isset($_POST['functionname'])) {
    $functionname = $_POST['functionname'];
    switch ($functionname) {
        case 'confirmation': {
                confirmation();
                break;
            }
        case 'editing': {
                break;
            }
    }
}
function confirmation()
{
    require("conn.php");
    if (isset($_POST['confPass']) && isset($_COOKIE['id'])) {
        $confPass = $_POST['confPass'];
        $id = urldecode($_COOKIE['id']);

        $sql = "SELECT * from Users where password='$confPass' and userId=$id and active=1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
            echo 'OK';
        else
            echo 'Неверный пароль';
    }
    $conn->close();
}

<?php
require("conn.php");
if (isset($_POST['name']) && isset($_POST['phonenum']) && isset($_POST['pass'])) {
    $name = $_POST['name'];
    $phonenum = $_POST['phonenum'];
    $pass = $_POST['pass'];

    $sql1 = "SELECT `phone` FROM `Users` WHERE active=1 and phone='$phonenum'";
    $res = $conn->query($sql1);
    $exists = false;
    if ($res->num_rows > 0)
        $exists=true;

    if($exists)
        echo 'Аккаунт с таким номером телефона уже существует';
    else{
        echo 'OK';
        $sql1 = "INSERT INTO `Users`(`password`, `phone`, `role`) VALUES 
        ('$pass','$phonenum','Заказчик')";
    
        $res = $conn->query($sql1);
    
        $sql = "SELECT max(userId) as uid from Users where role='Заказчик'";
        $result = $conn->query($sql);
        $uid = null;
        if ($result->num_rows > 0)
            while ($row = $result->fetch_assoc())
                $uid = $row['uid'];
    
        $sql1 = "INSERT INTO `Customers`(`custName`, `userId`) VALUES 
        ('$name',$uid)";
    
        if ($conn->query($sql1))
            setcookie('id', $uid, time() + (3600), "/");    
    }
    $conn->close();
}

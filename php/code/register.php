<?php
require("conn.php");
if (isset($_POST['name']) && isset($_POST['phonenum']) && isset($_POST['pass'])) {
    session_start();
    $name = $_POST['name'];
    $phonenum = $_POST['phonenum'];
    $pass = $_POST['pass'];

    $sql1 = "INSERT INTO `Users`(`password`, `role`) VALUES 
    ('$pass','Заказчик')";

    $res = $conn->query($sql1);

    $sql = "SELECT max(userId) as uid from Users where role='Заказчик'";
    $result = $conn->query($sql);
    $uid = null;
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            $uid = $row['uid'];

    $sql1 = "INSERT INTO `Customers`(`custName`, `phone`, `userId`) VALUES 
    ('$name','$phonenum',$uid)";

    if($conn->query($sql1)){
        $_SESSION['name']=$name;
        $_SESSION['phonenum']=$phonenum;
        $_SESSION['sale']=0;
    }

    $conn->close();
}
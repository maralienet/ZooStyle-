<?php
if (isset($_COOKIE['id']) && isset($_POST['type']) && isset($_POST['serv']) && isset($_POST['petType']) && isset($_POST['orderDate']))
    orderAdd();
else if (!isset($_COOKIE['id']))
    echo 'acc err';


function orderAdd()
{
    require("conn.php");
    $uid = $_COOKIE['id'];
    $petType = $_POST['petType'];
    $type = $_POST['type'];
    $serv = $_POST['serv'];
    $orderDate = date('Y-m-d', strtotime($_POST['orderDate']));

    $sql = "SELECT custId FROM Customers where userId=$uid";
    $res = $conn->query($sql);
    $custId = null;
    if ($res->num_rows > 0)
        while ($row = $res->fetch_assoc())
            $custId = $row['custId'];


    $sql = "SELECT servId FROM Services 
    JOIN ServicesTypes ON ServicesTypes.servtId = Services.servtId 
    WHERE servName = '$serv' 
    AND Services.servtId = (SELECT servtId FROM ServicesTypes WHERE servtName = '$type')
    and petType='$petType';";
    $res = $conn->query($sql);
    $servId = null;
    if ($res->num_rows > 0)
        while ($row = $res->fetch_assoc())
            $servId = $row['servId'];

    $sql = "SELECT servtId FROM ServicesTypes WHERE servtName = '$type'";
    $res = $conn->query($sql);
    $servtId = null;
    if ($res->num_rows > 0)
        while ($row = $res->fetch_assoc())
            $servtId = $row['servtId'];


    $sql = "SELECT * FROM `Masters` WHERE `servtId` = $servtId";
    $res = $conn->query($sql);
    $mastId = null;
    if ($res->num_rows > 0) {
        $masters = $res->fetch_all(MYSQLI_ASSOC);
        $randomMaster = $masters[array_rand($masters)];
        $mastId = $randomMaster['mastId'];
    }

    if (isReady($servId, $servtId, $mastId)) {
        $sql = 'INSERT INTO `Orders`(`custId`, `mastId`, `servId`, `orderDate`) VALUES 
        (' . $custId . ',' . $mastId . ',' . $servId . ',"' . $orderDate . '")';
        if ($conn->query($sql)) {
            echo 'OK';
            $sql = "SELECT count(*) as count FROM Orders
            join Customers on Customers.custId=Orders.custId 
            join Users on Users.userId=Customers.userId
            WHERE Customers.userId = $uid";
            $res = $conn->query($sql);
            if ($res->num_rows > 0)
                while ($row = $res->fetch_assoc()) {
                    if ($row['count'] > 20) {
                        $sql = "UPDATE `Customers` SET `sale`=10 where userId=$uid";
                        $res = $conn->query($sql);
                    }
                    else if ($row['count'] > 15) {
                        $sql = "UPDATE `Customers` SET `sale`=7 where userId=$uid";
                        $res = $conn->query($sql);
                    }
                    else if ($row['count'] > 10) {
                        $sql = "UPDATE `Customers` SET `sale`=5 where userId=$uid";
                        $res = $conn->query($sql);
                    }
                    else if ($row['count'] > 5) {
                        $sql = "UPDATE `Customers` SET `sale`=2 where userId=$uid";
                        $res = $conn->query($sql);
                    }
                }
        } else
            echo 'ERROR sql' . $conn->error;
    } else
        echo 'ERROR Ready';
    $conn->close();
}
function isReady($sid, $stid, $mid)
{
    return ($sid != null && $stid != null && $mid != null);
}

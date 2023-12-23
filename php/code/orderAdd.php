<?php
require("conn.php");
if (isset($_COOKIE['id']) && isset($_POST['type']) && isset($_POST['serv']) && isset($_POST['address']) && isset($_POST['petType'])) {
    $uid = $_COOKIE['id'];
    $petType = $_POST['petType'];
    $type = $_POST['type'];
    $serv = $_POST['serv'];
    $address = $_POST['address'];


    $sql = "SELECT custId  FROM Customers where userId=$uid";
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


    $sql = "SELECT saloonId  FROM Saloons 
    where address='$address'";
    $res = $conn->query($sql);
    $saloonId = null;
    if ($res->num_rows > 0)
        while ($row = $res->fetch_assoc())
            $saloonId = $row['saloonId'];


    $sql = "SELECT servtId FROM ServicesTypes WHERE servtName = '$type'";
    $res = $conn->query($sql);
    $servtId = null;
    if ($res->num_rows > 0)
        while ($row = $res->fetch_assoc())
            $servtId = $row['servtId'];


    $sql = "SELECT * FROM `Masters` WHERE `servtId` = $servtId AND `saloonId` = $saloonId";
    $res = $conn->query($sql);
    $mastId = null;
    if ($res->num_rows > 0) {
        $masters = $res->fetch_all(MYSQLI_ASSOC);
        $randomMaster = $masters[array_rand($masters)];
        $mastId = $randomMaster['mastId'];
    }

    if (isReady($servId, $saloonId, $servtId, $mastId)) {
        $sql = 'INSERT INTO `Orders`(`custId`, `mastId`, `servId`, `saloonId`) VALUES 
        (' . $custId . ',' . $mastId . ',' . $servId . ',' . $saloonId . ')';
        if ($conn->query($sql)) {
            echo '(' . $custId . ',' . $mastId . ',' . $servId . ',' . $saloonId . ')';
            $conn->close();
        } else echo 'ERROR sql' . $conn->error;
    }
}

function isReady($sid, $soid, $stid, $mid)
{
    return ($sid != null && $soid != null && $stid != null && $mid != null);
}

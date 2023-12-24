<?php
require("conn.php");
if (isset($_COOKIE['id']) && isset($_POST['type']) && isset($_POST['serv']) && isset($_POST['petType'])) {
    $uid = $_COOKIE['id'];
    $petType = $_POST['petType'];
    $type = $_POST['type'];
    $serv = $_POST['serv'];

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


    $sql = "SELECT * FROM `Masters` WHERE `servtId` = $servtId";
    $res = $conn->query($sql);
    $mastId = null;
    if ($res->num_rows > 0) {
        $masters = $res->fetch_all(MYSQLI_ASSOC);
        $randomMaster = $masters[array_rand($masters)];
        $mastId = $randomMaster['mastId'];
    }

    if (isReady($servId, $servtId, $mastId)) {
        $sql = 'INSERT INTO `Orders`(`custId`, `mastId`, `servId`) VALUES 
        (' . $custId . ',' . $mastId . ',' . $servId . ')';
        if ($conn->query($sql))
            echo 'OK';
        else 
            echo 'ERROR sql' . $conn->error;
    }
    else 
        echo 'ERROR Ready';
} else if (!isset($_COOKIE['id']))
    echo 'acc err';

$conn->close();
function isReady($sid, $stid, $mid)
{
    return ($sid != null && $stid != null && $mid != null);
}

<?php
require("conn.php");
if (isset($_COOKIE['id']) && isset($_POST['type']) && isset($_POST['serv']) && isset($_POST['address']) && isset($_POST['petType'])) {
    $uid = $_COOKIE['id'];
    $petType = $_POST['petType'];
    $type = $_POST['type'];
    $serv = $_POST['serv'];
    $address = $_POST['address'];

    $sql = "SELECT servId FROM Services 
    JOIN ServicesTypes ON ServicesTypes.servtId = Services.servtId 
    WHERE servName = '$serv' 
    AND Services.servtId = (SELECT servtId FROM ServicesTypes WHERE servtName = '$type')
    and petType='$petType';";
    $res = $conn->query($sql1);
    $servId = null;
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            $servId = $row['servId'];


    $sql = "SELECT saloonId  FROM Saloons 
    where address='$address'";
    $res = $conn->query($sql1);
    $salId = null;
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            $salId = $row['saloonId '];
}

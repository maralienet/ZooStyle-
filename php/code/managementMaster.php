<?php
if (isset($_POST['id']) && isset($_POST['status'])) {
    changeStatus($_POST['id'], $_POST['status']);
}

function changeStatus($id, $status)
{
    require("conn.php");
    if ($status == 'accept')
        $sql = "UPDATE `Orders` SET `status`=1 where `orderId`=$id";
    else
        $sql = "UPDATE `Orders` SET `status`=0 where `orderId`=$id";
    $result = $conn->query($sql);
    if ($result) echo 'OK';
    $conn->close();
}

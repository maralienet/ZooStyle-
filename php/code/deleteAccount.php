<?php
if (isset($_POST['id']) && !isset($_POST['table']))
    deleteAccount();
else
    deleteRecord();

function deleteAccount()
{
    require("conn.php");
    $id = $_POST['id'];
    $sql = "UPDATE Users SET active=0 WHERE userId=$id";
    $result = $conn->query($sql);

    setcookie('id', '', time() - 3600, "/");
    $conn->close();
}
function deleteRecord()
{
    require("conn.php");
    $id = $_POST['id'];
    $table = $_POST['table'];
    $sql = '';
    switch ($table) {
        case 'Users': {
                $sql = "UPDATE $table SET active=0 WHERE userId=$id";
                break;
            }
        case 'Masters': {
                $sql = "UPDATE Users SET active=0 WHERE userId=$id";
                break;
            }
        case 'Customers': {
                $sql = "UPDATE Users SET active=0 WHERE userId=$id";
                break;
            }
        case 'Services': {
                $sql = "UPDATE $table SET active=0 WHERE servId=$id";
                break;
            }
        case 'Orders': {
                $sql = "UPDATE $table SET active=0 WHERE orderId=$id";
                break;
            }
        case 'ServicesTypes': {
                $sql = "UPDATE $table SET active=0 WHERE servtId=$id";
                break;
            }
    }
    if ($conn->query($sql))
        echo 'OK';
    $conn->close();
}

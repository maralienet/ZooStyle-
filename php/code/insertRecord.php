<?php
if (isset($_POST['table'])) {
    $table = $_POST['table'];
    $sql = '';
    switch ($table) {
        case 'Users': {
                insertUser($_POST['phonenum'], $_POST['pass'], $_POST['role']);
                break;
            }
        case 'Masters': {

                break;
            }
        case 'Customers': {

                break;
            }
        case 'Services': {

                break;
            }
        case 'Orders': {

                break;
            }
        case 'ServicesTypes': {

                break;
            }
    }
}

function insertUser($phone, $pass, $role)
{
    require("conn.php");
    $sql = "INSERT INTO `Users`(`phone`, `password`, `role`) VALUES 
        ('$phone','$pass','$role')";
    if ($conn->query($sql))
        echo 'OK';
    else
        echo $conn->error;
    $conn->close();
}

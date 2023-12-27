<?php
if (isset($_POST['id'])) {
    getRole($_POST['id']);
}

function getRole($id)
{
    require("conn.php");

    $sql = "SELECT role from Users where userId=$id";
    $result = $conn->query($sql);
    $role = null;
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            $role = $row['role'];
    echo $role;
}

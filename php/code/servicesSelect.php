<?php
require("conn.php");
if (isset($_POST["type"])) {
    $type = ($_POST["type"]);
    $sql = "SELECT servtName,servName FROM Services
    join ServicesTypes on ServicesTypes.servtId=Services.servtId 
    where petType='$type' and Services.active=1";
    $result = $conn->query($sql);
    $data = '';
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            $data .= "<option id='servNames' value='" . $row["servtName"] . ". " . $row["servName"] . "'>" . $row["servtName"] . ". " . $row["servName"] . "</option>";
    echo $data;
    $conn->close();
}

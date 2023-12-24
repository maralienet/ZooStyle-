<?php
require("conn.php");
if (isset($_COOKIE['id'])) {
    $id = urldecode($_COOKIE['id']);

    $sql = "SELECT servName,servtName,mastName,petType, mastSurname,orderDate FROM Orders
    join Masters on Masters.mastId=Orders.mastId
    join Services on Services.servId=Orders.servId
    join ServicesTypes on ServicesTypes.servtId=Services.servtId 
    join Customers on Customers.custId=Orders.custId
    where Customers.userId=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='myRecords'>
            <tr>
                <th scope='col'>Услуга</th>
                <th scope='col'>Мастер</th>
                <th scope='col'>Дата</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            if($row["servName"]!=$row["petType"]){
                echo "<tr>
                    <td headers='Услуга'>" . $row["petType"] . " " . $row["servName"] . ". " . $row["servtName"] . "</td>
                    <td headers='Мастер'>" . $row["mastName"] . " " . $row["mastSurname"] . "</td>
                    <td headers='Дата'>" . $row["orderDate"] . "</td>
                </tr>";
            }
            else{
                echo "<tr>
                    <td headers='Услуга'>" . $row["servName"] . ". " . $row["servtName"] . "</td>
                    <td headers='Мастер'>" . $row["mastName"] . " " . $row["mastSurname"] . "</td>
                    <td headers='Дата'>" . $row["orderDate"] . "</td>
                </tr>";
            }
        }
        echo "</table>";
    } else {
        echo "<h4 style='color:#535353;'>Записей не найдено</h4>";
    }
}
$conn->close();

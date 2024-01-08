<?php
require("conn.php");
if (isset($_COOKIE['id'])) {
    $id = urldecode($_COOKIE['id']);

    $sql = "SELECT orderId,servName,custName,petType,orderDate,status FROM Orders
    join Masters on Masters.mastId=Orders.mastId
    join Services on Services.servId=Orders.servId 
    join Customers on Customers.custId=Orders.custId
    where Masters.userId=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='myRecords'>
            <tr>
                <th scope='col'>Услуга</th>
                <th scope='col'>Заказчик</th>
                <th scope='col'>Дата</th>
                <th scope='col'>Статус</th>
                <th></th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            $status = 'Не принят';
            if ($row['status'] == 1) {
                $status = 'Принят';
            }
            if ($row["servName"] != $row["petType"]) {
                echo "<tr data-id='" . $row["orderId"] . "'>
                    <td headers='Услуга'>" . $row["petType"] . " " . $row["servName"] . "</td>
                    <td headers='Заказчик'>" . $row["custName"] . "</td>
                    <td headers='Дата'>" . $row["orderDate"] . "</td>
                    <td headers='Статус'>" . $status . "</td>
                    <td style='width: 80px;'>
                        <div class='column'>
                        <button class='btnSimp accept' onmouseover='changeImage(this, `../../pics/manage/ok_hover.png`)' onmouseout='changeImage(this, `../../pics/manage/ok.png`)' onclick='acceptOrder(" . $row["orderId"] . ")'><img src='../../pics/manage/ok.png'></button>
                        <button class='btnSimp deny' onmouseover='changeImage(this, `../../pics/manage/add_hover.png`)' onmouseout='changeImage(this, `../../pics/manage/add.png`)' onclick='cancelOrder(" . $row["orderId"] . ")'><img src='../../pics/manage/add.png' style='transform: rotate(45deg);'></button>                        
                        </div>
                    </td>
                </tr>";
            } else {
                echo "<tr data-id='" . $row["orderId"] . "'>
                    <td headers='Услуга'>" . $row["servName"] . "</td>
                    <td headers='Заказчик'>" . $row["custName"] . "</td>
                    <td headers='Дата'>" . $row["orderDate"] . "</td>
                    <td headers='Статус'>" . $status . "</td>
                    <td style='width: 80px;'>
                    <div class='column'>
                        <button class='btnSimp accept' onmouseover='changeImage(this, `../../pics/manage/ok_hover.png`)' onmouseout='changeImage(this, `../../pics/manage/ok.png`)' onclick='acceptOrder(" . $row["orderId"] . ")'><img src='../../pics/manage/ok.png'></button>
                        <button class='btnSimp deny' onmouseover='changeImage(this, `../../pics/manage/add_hover.png`)' onmouseout='changeImage(this, `../../pics/manage/add.png`)' onclick='cancelOrder(" . $row["orderId"] . ")'><img src='../../pics/manage/add.png' style='transform: rotate(45deg);'></button>                        
                    </div>
                    </td>
                </tr>";
            }
        }
        echo "</table>";
    } else {
        echo "<h4 style='color:#535353;'>Заказов не найдено</h4>";
    }
}
$conn->close();

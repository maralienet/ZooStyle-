<?php
if (isset($_POST['table'])) {
    showTable($_POST['table']);
}

function showTable($table)
{
    require("conn.php");

    switch ($table) {
        case 'Пользователи': {
                $sql = "SELECT phone,password,role,active FROM Users";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    echo '<table class="infoTable">
                        <tr>
                            <th>Телефон</th>
                            <th>Пароль</th>
                            <th>Роль</th>
                            <th>Активность</th>
                        </tr>';
                    while ($row = $res->fetch_assoc()) {
                        $active = 'Не активен';
                        if ($row['active'] == 1)
                            $active = 'Активен';
                        echo '
                        <tr>
                            <td headers="Телефон">' . $row['phone'] . '</td>
                            <td headers="Пароль">' . $row['password'] . '</td>
                            <td headers="Роль">' . $row['role'] . '</td>
                            <td headers="Активность">' . $active . '</td>
                        </tr>
                        ';
                    }
                    echo "</table>";
                } else echo '
                <table class="infoTable">
                    <tr><h4 style="margin-top:10px">Пользователи не найдены.</h4></tr>
                </table>
                    ';
                break;
            }
        case 'Услуги': {
                $sql = "SELECT servName,petType,price,servtName,Services.active FROM Services
                join ServicesTypes on ServicesTypes.servtId = Services.servtId";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    echo '<table class="infoTable">
                        <tr>
                            <th>Вид услуги</th>
                            <th>Название</th>
                            <th>Тип животного</th>
                            <th>Цена</th>
                            <th>Активность</th>
                        </tr>';
                    while ($row = $res->fetch_assoc()) {
                        $active = 'Не активен';
                        if ($row['active'] == 1)
                            $active = 'Активен';
                        echo '
                        <tr>
                            <td headers="Вид услуги">' . $row['servtName'] . '</td>
                            <td headers="Название">' . $row['servName'] . '</td>
                            <td headers="Тип животного">' . $row['petType'] . '</td>
                            <td headers="Цена">' . $row['price']  . '</td>
                            <td headers="Активность">' . $active . '</td>
                        </tr>
                        ';
                    }
                    echo "</table>";
                } else echo '
                <table class="infoTable">
                    <tr><h4 style="margin-top:10px">Услуги не найдены.</h4></tr>
                </table>
                    ';
                break;
            }
        case 'Заявки': {
                $sql = "SELECT servName,servtName,custName,mastName,petType, mastSurname,orderDate,status,Orders.active FROM Orders
                join Masters on Masters.mastId=Orders.mastId
                join Services on Services.servId=Orders.servId
                join ServicesTypes on ServicesTypes.servtId=Services.servtId 
                join Customers on Customers.custId=Orders.custId";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    echo "<table class='infoTable'>
                        <tr>
                            <th>Вид услуги</th>
                            <th>Услуга</th>
                            <th>Тип животного</th>
                            <th>Заказчик</th>
                            <th>Мастер</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th>Активность</th>
                        </tr>";
                    while ($row = $res->fetch_assoc()) {
                        $status = 'Не принят';
                        $active = 'Не активен';
                        if ($row['status'] == 1)
                            $status = 'Принят';
                        if ($row['active'] == 1)
                            $active = 'Активен';

                        echo "<tr class='bodyRows'>
                                <td headers='Вид услуги'>" . $row["servtName"] . "</td>
                                <td headers='Услуга'>" . $row["servName"] . "</td>
                                <td headers='Тип животного'>" . $row["petType"] . " </td>
                                <td headers='Заказчик'>" . $row["custName"] . "</td>
                                <td headers='Мастер'>" . $row["mastName"] . " " . $row["mastSurname"] . "</td>
                                <td headers='Дата'>" . $row["orderDate"] . "</td>
                                <td headers='Статус'>$status</td>
                                <td headers='Активность'> $active</td>
                            </tr>";
                    }
                    echo "</table>";
                } else echo '
                <table class="infoTable">
                    <tr><h4 style="margin-top:10px">Заказы не найдены.</h4></tr>
                </table>
                    ';
                break;
            }
        case 'Типы услуг': {
                $sql = "SELECT servtName,descript,active FROM ServicesTypes";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    echo '<table class="infoTable">
                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Активность</th>
                        </tr>';
                    while ($row = $res->fetch_assoc()) {
                        $active = 'Не активен';
                        if ($row['active'] == 1)
                            $active = 'Активен';
                        echo '
                        <tr>
                            <td headers="Название">' . $row['servtName'] . '</td>
                            <td headers="Описание" style="width: 572px !important; word-wrap: break-word; padding: 7px">' . $row['descript'] . '</td>
                            <td headers="Активность">' . $active . '</td>
                        </tr>
                        ';
                    }
                    echo "</table>";
                } else echo '
                <table class="infoTable">
                    <tr><h4 style="margin-top:10px">Типы услуг не найдены.</h4></tr>
                </table>
                    ';
                break;
            }
        default: {
                echo '<tr><h4 style="margin-top:10px">Выберите таблицу</h4></tr>';
                break;
            }
    }

    $conn->close();
}

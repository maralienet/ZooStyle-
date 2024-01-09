<?php
if (isset($_POST['form'])) {
    $form = $_POST['form'];
    switch ($form) {
        case 'Пользователи': {
                if (isset($_POST['phonenum']) && $_POST['phonenum'] != '')
                    search($_POST['phonenum'], $form);
                $role = isset($_POST['role']) ? $_POST['role'] : '';
                $active = isset($_POST['active']) ? $_POST['active'] : '';
                filterUser($role, $active);

                break;
            }
        case 'Мастера': {
                if (isset($_POST['surname']) && $_POST['surname'] != '')
                    search($_POST['surname'], $form);

                if (isset($_POST['active']))
                    filterMaster($_POST['active']);
                break;
            }
        case 'Заказчики': {
                if (isset($_POST['name']) && $_POST['name'] != '')
                    search($_POST['name'], $form);
                $photo = isset($_POST['photo']) ? $_POST['photo'] : '';
                $active = isset($_POST['active']) ? $_POST['active'] : '';
                filterCust($photo, $active);
                break;
            }
        case 'Услуги': {
                if (isset($_POST['service']) && $_POST['service'] != '')
                    search($_POST['service'], $form);
                $type = isset($_POST['type']) ? $_POST['type'] : '';
                $price = isset($_POST['price']) ? $_POST['price'] : '';
                $active = isset($_POST['active']) ? $_POST['active'] : '';
                filterServ($type, $price, $active);
                break;
            }
        case 'Заявки': {
                $type = isset($_POST['type']) ? $_POST['type'] : '';
                $servType = isset($_POST['servType']) ? $_POST['servType'] : '';
                $active = isset($_POST['active']) ? $_POST['active'] : '';
                filterServ($type, $servType, $active);
                break;
            }
        case 'Типы услуг': {
                if (isset($_POST['typeName']) && $_POST['typeName'] != '')
                    search($_POST['typeName'], $form);

                break;
            }
    }
}

function filterUser($role, $active)
{
    require("conn.php");
    $sql = "SELECT phone,password,role,active FROM Users";
    $conditions = [];
    if ($role != '')
        $conditions[] = "role='$role'";
    if ($active != '')
        $conditions[] = "active=$active";
    if (!empty($conditions))
        $sql .= ' WHERE ' . implode(' AND ', $conditions);

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
                </tr>';
        }
        echo "</table>";
    } else echo '
        <table class="infoTable">
            <tr><h4 style="margin-top:10px">Пользователи не найдены.</h4></tr>
        </table>';
    $conn->close();
}
function filterMaster($active)
{
    require("conn.php");
    $sql = "SELECT mastName, mastSurname, post, photo, servtName, Users.active as active FROM Masters
    join ServicesTypes on ServicesTypes.servtId = Masters.servtId
    join Users on Users.userId = Masters.userId
    where Users.active=$active";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        echo '<table class="infoTable">
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Должность</th>
                <th>Услуга</th>
                <th>Активность</th>
                <th>Фото</th>
            </tr>';
        while ($row = $res->fetch_assoc()) {
            $active = 'Не активен';
            if ($row['active'] == 1)
                $active = 'Активен';
            echo '
            <tr>
                <td headers="Имя">' . $row['mastName'] . '</td>
                <td headers="Фамилия">' . $row['mastSurname'] . '</td>
                <td headers="Должность">' . $row['post'] . '</td>
                <td headers="Услуга">' . $row['servtName'] . '</td>
                <td headers="Активность">' . $active . '</td>
                <td headers="Фото" style="width:150px;height:100px;overflow:hidden"><img src="' . $row['photo'] . '" style="width:100%;height:100%;object-fit:cover;"></td>
            </tr>';
        }
        echo "</table>";
    } else echo '
    <table class="infoTable">
        <tr><h4 style="margin-top:10px">Мастера не найдены.</h4></tr>
    </table>';
    $conn->close();
}
function filterCust($hasphoto, $active)
{
    require("conn.php");
    $sql = "SELECT custName, sale, photo, Users.active as active FROM Customers
        join Users on Users.userId = Customers.userId";
    $conditions = [];
    if ($hasphoto != '')
        $conditions[] = "photo is $hasphoto";
    if ($active != '')
        $conditions[] = "Users.active=$active";
    if (!empty($conditions))
        $sql .= ' WHERE ' . implode(' AND ', $conditions);

    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        echo '<table class="infoTable">
            <tr>
                <th>Имя</th>
                <th>Скидка</th>
                <th>Активность</th>
                <th>Фото</th>
            </tr>';
        while ($row = $res->fetch_assoc()) {
            $active = 'Не активен';
            $photo = '';
            if ($row['active'] == 1)
                $active = 'Активен';
            if ($row['photo'] != null)
                $photo = $row['photo'];
            if ($photo)
                echo '
            <tr>
                <td headers="Имя">' . $row['custName'] . '</td>
                <td headers="Скидка">' . $row['sale'] . '</td>
                <td headers="Активность">' . $active . '</td>
                <td headers="Фото" style="width:150px;height:100px;overflow:hidden"><img src="' . $photo . '" style="width:100%;height:100%;object-fit:cover;"></td>
            </tr>';
            else
                echo '
            <tr>
                <td headers="Имя">' . $row['custName'] . '</td>
                <td headers="Скидка">' . $row['sale'] . '</td>
                <td headers="Активность">' . $active . '</td>
                <td headers="Фото">Не добавлено</td>
            </tr>';
        }
        echo "</table>";
    } else echo '
    <table class="infoTable">
        <tr><h4 style="margin-top:10px">Заказчики не найдены.</h4></tr>
    </table>';
    $conn->close();
}
function filterServ($type, $price, $active)
{
    require("conn.php");
    $sql = "SELECT servName,petType,price,servtName,Services.active FROM Services
    join ServicesTypes on ServicesTypes.servtId = Services.servtId";
    $conditions = [];
    if ($type != '')
        $conditions[] = "petType='$type'";
    if ($price != '')
        $conditions[] = "price<=$price";
    if ($active != '')
        $conditions[] = "Services.active=$active";
    if (!empty($conditions))
        $sql .= ' WHERE ' . implode(' AND ', $conditions);
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
                </tr>';
        }
        echo "</table>";
    } else echo '
        <table class="infoTable">
            <tr><h4 style="margin-top:10px">Услуги не найдены.</h4></tr>
        </table>';
    $conn->close();
}
function filterOrders($type, $servType, $active)
{
    require("conn.php");
    $sql = "SELECT servName,servtName,custName,mastName,petType,mastSurname,orderDate,status,Orders.active FROM Orders
    join Masters on Masters.mastId=Orders.mastId
    join Services on Services.servId=Orders.servId
    join ServicesTypes on ServicesTypes.servtId=Services.servtId 
    join Customers on Customers.custId=Orders.custId";
    $conditions = [];
    if ($type != '')
        $conditions[] = "petType='$type'";
    if ($servType != '')
        $conditions[] = "servtName='$servType'";
    if ($active != '')
        $conditions[] = "status=$active";
    if (!empty($conditions))
        $sql .= ' WHERE ' . implode(' AND ', $conditions);
        
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            echo "<table class='infoTable' style='width: max-content !important;'>
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
        </table>';
    $conn->close();
}
function filterTypes($active)
{
    require("conn.php");



    $conn->close();
}

function search($text, $table)
{
    require("conn.php");
    switch ($table) {
        case 'Пользователи': {
                $sql = "SELECT phone,password,role,active FROM Users
                    where phone like '$text%'";
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
                </tr>';
                    }
                    echo "</table>";
                } else echo '
                <table class="infoTable">
                    <tr><h4 style="margin-top:10px">Пользователи не найдены.</h4></tr>
                </table>';
                break;
            }
        case 'Мастера': {
                $sql = "SELECT mastName, mastSurname, post, photo, servtName, Users.active as active FROM Masters
                    join ServicesTypes on ServicesTypes.servtId = Masters.servtId
                    join Users on Users.userId = Masters.userId
                    where mastSurname like '$text%'";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    echo '<table class="infoTable">
                            <tr>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Должность</th>
                                <th>Услуга</th>
                                <th>Активность</th>
                                <th>Фото</th>
                            </tr>';
                    while ($row = $res->fetch_assoc()) {
                        $active = 'Не активен';
                        if ($row['active'] == 1)
                            $active = 'Активен';
                        echo '
                            <tr>
                                <td headers="Имя">' . $row['mastName'] . '</td>
                                <td headers="Фамилия">' . $row['mastSurname'] . '</td>
                                <td headers="Должность">' . $row['post'] . '</td>
                                <td headers="Услуга">' . $row['servtName'] . '</td>
                                <td headers="Активность">' . $active . '</td>
                                <td headers="Фото" style="width:150px;height:100px;overflow:hidden"><img src="' . $row['photo'] . '" style="width:100%;height:100%;object-fit:cover;"></td>
                            </tr>';
                    }
                    echo "</table>";
                } else echo '
                    <table class="infoTable">
                        <tr><h4 style="margin-top:10px">Мастера не найдены.</h4></tr>
                    </table>';
                break;
            }
        case 'Заказчики': {
                $sql = "SELECT custName, sale, photo, Users.active as active FROM Customers
                        join Users on Users.userId = Customers.userId
                        where custName like '$text%'";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    echo '<table class="infoTable">
                                <tr>
                                    <th>Имя</th>
                                    <th>Скидка</th>
                                    <th>Активность</th>
                                    <th>Фото</th>
                                </tr>';
                    while ($row = $res->fetch_assoc()) {
                        $active = 'Не активен';
                        $photo = '';
                        if ($row['active'] == 1)
                            $active = 'Активен';
                        if ($row['photo'] != null)
                            $photo = $row['photo'];
                        if ($photo)
                            echo '
                                <tr>
                                    <td headers="Имя">' . $row['custName'] . '</td>
                                    <td headers="Скидка">' . $row['sale'] . '</td>
                                    <td headers="Активность">' . $active . '</td>
                                    <td headers="Фото" style="width:150px;height:100px;overflow:hidden"><img src="' . $photo . '" style="width:100%;height:100%;object-fit:cover;"></td>
                                </tr>';
                        else
                            echo '
                                <tr>
                                    <td headers="Имя">' . $row['custName'] . '</td>
                                    <td headers="Скидка">' . $row['sale'] . '</td>
                                    <td headers="Активность">' . $active . '</td>
                                    <td headers="Фото">Не добавлено</td>
                                </tr>';
                    }
                    echo "</table>";
                } else echo '
                        <table class="infoTable">
                            <tr><h4 style="margin-top:10px">Заказчики не найдены.</h4></tr>
                        </table>';
                break;
            }
        case 'Услуги': {
                $sql = "SELECT servName,petType,price,servtName,Services.active FROM Services
                        join ServicesTypes on ServicesTypes.servtId = Services.servtId
                        where servtName like '$text%'";
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
                                    </tr>';
                    }
                    echo "</table>";
                } else echo '
                            <table class="infoTable">
                                <tr><h4 style="margin-top:10px">Услуги не найдены.</h4></tr>
                            </table>';
                break;
            }
        case 'Типы услуг': {
                $sql = "SELECT servtName,descript,active FROM ServicesTypes
                    where servtName like '$text%'";
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
                            </tr>';
                    }
                    echo "</table>";
                } else echo '
                    <table class="infoTable">
                        <tr><h4 style="margin-top:10px">Типы услуг не найдены.</h4></tr>
                    </table>';
                break;
            }
        default: {
                echo '<tr><h4 style="margin-top:10px">Выберите таблицу</h4></tr>';
                break;
            }
    }
    $conn->close();
}

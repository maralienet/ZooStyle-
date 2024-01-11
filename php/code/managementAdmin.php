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
                $data = isset($_POST['data']) ? $_POST['data'] : '';
                $active = isset($_POST['active']) ? $_POST['active'] : '';
                filterOrders($type, $data, $active);
                break;
            }
        case 'Типы услуг': {
                if (isset($_POST['typeName']) && $_POST['typeName'] != '')
                    search($_POST['typeName'], $form);

                if (isset($_POST['active']))
                    filterTypes($_POST['active']);
                break;
            }
    }
}

function filterUser($role, $active)
{
    require("conn.php");
    $sql = "SELECT userId,phone,password,role,active FROM Users";
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
                <th style="width:70px !important;"></th>
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
                <td><button class="deleteBtn" onclick="deleteRecord(' . $row['userId'] . ',`Users`)"><img src="../../pics/me/trash.png "/></button></td>
            </tr>
            ';
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
    $sql = "SELECT Masters.userId as userId,mastName, mastSurname, post, photo, servtName, Users.active as active FROM Masters
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
                <th style="width:70px !important;"></th>
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
                <td><button class="deleteBtn" onclick="deleteRecord(' . $row['userId'] . ',`Masters`)"><img src="../../pics/me/trash.png "/></button></td>
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
    $sql = "SELECT Customers.userId as userId,custName, sale, photo, Users.active as active FROM Customers
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
                <th style="width:70px !important;"></th>
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
                <td><button class="deleteBtn" onclick="deleteRecord(' . $row['userId'] . ',`Customers`)"><img src="../../pics/me/trash.png "/></button></td>
            </tr>';
            else
                echo '
            <tr>
                <td headers="Имя">' . $row['custName'] . '</td>
                <td headers="Скидка">' . $row['sale'] . '</td>
                <td headers="Активность">' . $active . '</td>
                <td headers="Фото">Не добавлено</td>
                <td><button class="deleteBtn" onclick="deleteRecord(' . $row['userId'] . ',`Customers`)"><img src="../../pics/me/trash.png "/></button></td>
             </tr>
            ';
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
    $sql = "SELECT servId,servName,petType,price,servtName,Services.active FROM Services
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
                <th style="width:70px !important;"></th>
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
                <td><button class="deleteBtn" onclick="deleteRecord(' . $row['servId'] . ',`Services`)"><img src="../../pics/me/trash.png "/></button></td>
            </tr>
            ';
        }
        echo "</table>";
    } else echo '
        <table class="infoTable">
            <tr><h4 style="margin-top:10px">Услуги не найдены.</h4></tr>
        </table>';
    $conn->close();
}
function filterOrders($type, $data, $active)
{
    require("conn.php");
    $sql = "SELECT orderId,servName,servtName,custName,mastName,petType, mastSurname,orderDate,status,Orders.active FROM Orders
    join Masters on Masters.mastId=Orders.mastId
    join Services on Services.servId=Orders.servId
    join ServicesTypes on ServicesTypes.servtId=Services.servtId 
    join Customers on Customers.custId=Orders.custId";
    $conditions = [];
    if ($type != '')
        $conditions[] = "petType='$type'";
    if ($data != '')
        $conditions[] = "orderDate >= DATE_SUB(CURDATE(), INTERVAL $data MONTH)";
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
                <th></th>
                <th>Активность</th>
                <th style='width:70px !important;'></th>
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
                    <td style='width: 80px;'>
                        <div class='column'>
                        <button class='btnSimp accept' onmouseover='changeImage(this, `../../pics/manage/ok_hover.png`)' onmouseout='changeImage(this, `../../pics/manage/ok.png`)' onclick='acceptOrder(" . $row["orderId"] . ")'><img src='../../pics/manage/ok.png'></button>
                        <button class='btnSimp deny' onmouseover='changeImage(this, `../../pics/manage/add_hover.png`)' onmouseout='changeImage(this, `../../pics/manage/add.png`)' onclick='cancelOrder(" . $row["orderId"] . ")'><img src='../../pics/manage/add.png' style='transform: rotate(45deg);'></button>                        
                        </div>
                    </td>
                    <td headers='Активность'> $active</td>
                    <td><button class='deleteBtn' onclick='deleteRecord(" . $row['orderId'] . ",`Orders`)'><img src='../../pics/me/trash.png'/></button></td>
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
    $sql = "SELECT servtId,servtName,descript,active FROM ServicesTypes
    where active=$active";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        echo '<table class="infoTable">
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Активность</th>
                <th style="width:70px !important;"></th>
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
                <td><button class="deleteBtn" onclick="deleteRecord(' . $row['servtId'] . ',`ServicesTypes`)"><img src="../../pics/me/trash.png"/></button></td>
            </tr>';
        }
        echo "</table>";
    } else echo '
    <table class="infoTable">
        <tr><h4 style="margin-top:10px">Типы услуг не найдены.</h4></tr>
    </table>';
    $conn->close();
}

function search($text, $table)
{
    require("conn.php");
    switch ($table) {
        case 'Пользователи': {
                $sql = "SELECT userId,phone,password,role,active FROM Users
                where phone like '$text%'";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    echo '<table class="infoTable">
                        <tr>
                            <th>Телефон</th>
                            <th>Пароль</th>
                            <th>Роль</th>
                            <th>Активность</th>
                            <th style="width:70px !important;"></th>
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
                            <td><button class="deleteBtn" onclick="deleteRecord(' . $row['userId'] . ',`Users`)"><img src="../../pics/me/trash.png "/></button></td>
                        </tr>
                        ';
                    }
                    echo "</table>";
                } else echo '
                <table class="infoTable">
                    <tr><h4 style="margin-top:10px">Пользователи не найдены.</h4></tr>
                </table>';
                break;
            }
        case 'Мастера': {
                $sql = "SELECT Masters.userId as userId,mastName, mastSurname, post, photo, servtName, Users.active as active FROM Masters
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
                            <th style="width:70px !important;"></th>
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
                            <td><button class="deleteBtn" onclick="deleteRecord(' . $row['userId'] . ',`Masters`)"><img src="../../pics/me/trash.png "/></button></td>
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
                $sql = "SELECT Customers.userId as userId,custName, sale, photo, Users.active as active FROM Customers
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
                            <th style="width:70px !important;"></th>
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
                            <td><button class="deleteBtn" onclick="deleteRecord(' . $row['userId'] . ',`Customers`)"><img src="../../pics/me/trash.png "/></button></td>
                        </tr>';
                        else
                            echo '
                        <tr>
                            <td headers="Имя">' . $row['custName'] . '</td>
                            <td headers="Скидка">' . $row['sale'] . '</td>
                            <td headers="Активность">' . $active . '</td>
                            <td headers="Фото">Не добавлено</td>
                            <td><button class="deleteBtn" onclick="deleteRecord(' . $row['userId'] . ',`Customers`)"><img src="../../pics/me/trash.png "/></button></td>
                         </tr>
                        ';
                    }
                    echo "</table>";
                } else echo '
                        <table class="infoTable">
                            <tr><h4 style="margin-top:10px">Заказчики не найдены.</h4></tr>
                        </table>';
                break;
            }
        case 'Услуги': {
                $sql = "SELECT servId,servName,petType,price,servtName,Services.active FROM Services
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
                            <th style="width:70px !important;"></th>
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
                            <td><button class="deleteBtn" onclick="deleteRecord(' . $row['servId'] . ',`Services`)"><img src="../../pics/me/trash.png "/></button></td>
                        </tr>
                        ';
                    }
                    echo "</table>";
                } else echo '
                            <table class="infoTable">
                                <tr><h4 style="margin-top:10px">Услуги не найдены.</h4></tr>
                            </table>';
                break;
            }
        case 'Типы услуг': {
                $sql = "SELECT servtId,servtName,descript,active FROM ServicesTypes
                    where servtName like '$text%'";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    echo '<table class="infoTable">
                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Активность</th>
                            <th style="width:70px !important;"></th>
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
                            <td><button class="deleteBtn" onclick="deleteRecord(' . $row['servtId'] . ',`ServicesTypes`)"><img src="../../pics/me/trash.png"/></button></td>
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
?>
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
                inserMaster($_POST['phonenum'], $_POST['pass'], $_POST['name'], $_POST['surname'], $_POST['post'], $_POST['servtId']);
                break;
            }
        case 'Customers': {
                inserCust($_POST['phonenum'], $_POST['pass'], $_POST['name']);
                break;
            }
        case 'Services': {
                inserServ($_POST['name'], $_POST['type'], $_POST['price'], $_POST['servtId']);
                break;
            }
        case 'ServicesTypes': {
                inserServt($_POST['name'], $_POST['descr']);
                break;
            }
        case 'Gallery': {
                inserPhoto($_POST['petType'], $_POST['role']);
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
function inserMaster($phone, $pass, $name, $surname, $post, $servtId)
{
    require("conn.php");
    $sql = "INSERT INTO `Users`(`phone`, `password`, `role`) VALUES 
        ('$phone','$pass','Мастер')";
    $a = $conn->query($sql);
    $query = "SELECT userId from Users where phone=$phone";
    $uid = null;
    $result = $conn->query($query);
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            $uid = $row["userId"];
    if ($uid != null) {
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "../../pics/about/" . $filename;
        if (!file_exists(dirname($folder))) {
            mkdir(dirname($folder), 0777, true);
        }
        if (move_uploaded_file($tempname, $folder)) {
            $sql1 = "INSERT INTO `Masters`(`mastName`, `mastSurname`, `post`, `photo`, `servtId`, `userId`) VALUES 
                ('$name','$surname','$post','$folder',$servtId,$uid)";
            if ($conn->query($sql1))
                echo 'OK';
        }
    } else
        echo 'Нет такого пользователя';
    $conn->close();
}
function inserCust($phone, $pass, $name)
{
    require("conn.php");
    $sql = "INSERT INTO `Users`(`phone`, `password`, `role`) VALUES 
        ('$phone','$pass','Заказчик')";
    $a = $conn->query($sql);
    $query = "SELECT userId from Users where phone=$phone";
    $uid = null;
    $result = $conn->query($query);
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            $uid = $row["userId"];
    if ($uid != null) {
        $sql1 = "INSERT INTO `Customers`(`custName`, `userId`) VALUES 
        ('$name',$uid)";
        if ($conn->query($sql1))
            echo 'OK';
    } else
        echo 'Нет такого пользователя';
    $conn->close();
}
function inserServ($name, $type, $price, $servtId)
{
    require("conn.php");
    $sql = "INSERT INTO `Services`(`servName`, `petType`, `price`, `servtId`) VALUES 
    ('$name','$type',$price,$servtId)";
    if ($conn->query($sql))
        echo 'OK';
    else
        echo $conn->error;
    $conn->close();
}
function inserServt($name, $descr)
{
    require("conn.php");
    $sql = "INSERT INTO `ServicesTypes`(`servtName`, `descript`) VALUES 
    ('$name','$descr')";
    if ($conn->query($sql))
        echo 'OK';
    else
        echo $conn->error;
    $conn->close();
}
function inserPhoto($petType, $role)
{
    require("conn.php");
    $filename = $_FILES["file"]["name"];
    $filename = str_replace(' ', '_', $filename);
    $tempname = $_FILES["file"]["tmp_name"];
    $tempname = str_replace(' ', '_', $tempname);
    $folder = "../../pics/gallery/" . $filename;
    if (!file_exists(dirname($folder))) {
        mkdir(dirname($folder), 0777, true);
    }
    if (move_uploaded_file($tempname, $folder)) {
        $sql = "INSERT INTO `Gallery`(`path`, `role`, `petType`) VALUES 
        ('$folder','$role','$petType')";
        if ($conn->query($sql))
            echo 'OK';
        else
            echo $conn->error;
    }
    $conn->close();
}

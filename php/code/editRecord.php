<?php
if (isset($_POST['function'])) {
    switch ($_POST['function']) {
        case 'showEditWin': {
                showEditWin();
                break;
            }
        case 'editing': {
                editing();
                break;
            }
    }
}

function showEditWin()
{
    require("conn.php");
    if (isset($_POST['id']) && isset($_POST['table'])) {
        $id = $_POST['id'];
        $table = $_POST['table'];
        switch ($table) {
            case 'Users': {
                    $sql = "SELECT `userId`, `phone`, `password`, `role`, `active` FROM `Users` 
                    WHERE userId=$id";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0)
                        while ($row = $res->fetch_assoc()) {
                            echo '<form class="editUser">
                            <h4>
                                <center>Изменение пользователя</center>
                            </h4>
                            <div class="form-group input-container">
                                <input class="form-input phonenum" name="phonenum" maxlength="13" type="tel" value="' . $row['phone'] . '"/>
                                <label for="phonenum">Номер телефона</label>
                            </div>
                            <span class="sayError sayErrorPhone"></span>
                            <div class="form-group input-container">
                                <input class="form-input pass" name="pass" type="password"  value="' . $row['password'] . '"/>
                                <label for="pass">Пароль</label>
                                </div>
                                <span class="sayError sayErrorPass"></span>
                                <input class="form-input" name="id" type="hidden"  value="' . $row['userId'] . '"/>
                            <button class="btnSimp" type="submit">
                                Изменить
                            </button>
                        </form>
                        <div onclick="closeForm()">
                            <img class="close" src="../pics/manage/add.png">
                        </div>';
                        }
                    break;
                }
            case 'Masters': {
                    $sql = "SELECT `mastId`, `mastName`, `mastSurname`, `post`, `photo`, `servtId`, `userId` FROM `Masters` 
                    WHERE userId=$id";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0)
                        while ($row = $res->fetch_assoc()) {
                            $currentServtId = $row['servtId'];
                            echo '<form class="editMaster">
                            <h4>
                            <center>Изменение мастера</center>
                        </h4>
                        <div class="form-group input-container">
                            <input class="form-input" name="name" type="text"  value="' . $row['mastName'] . '"/>
                            <label for="name">Имя</label>
                        </div>
                        <div class="form-group input-container">
                            <input class="form-input" name="surname" type="text"  value="' . $row['mastSurname'] . '"/>
                            <label for="surname">Фамилия</label>
                        </div>
                        <div class="form-group input-container">
                            <input class="form-input" name="post" type="text"  value="' . $row['post'] . '"/>
                            <label for="post">Должность</label>
                        </div>
                        <input class="form-input" name="id" type="hidden"  value="' . $row['userId'] . '"/>
                        <span>Предоставляемая услуга</span>
                        <div class="form-group input-container">
                            <select class="formSelect Select__control" name="servtId">';
                            $sql1 = "SELECT servtId,servtName FROM ServicesTypes where active=1";
                            $result = $conn->query($sql1);
                            if ($result->num_rows > 0)
                                while ($row = $result->fetch_assoc()) {
                                    $selected = $row["servtId"] == $currentServtId ? ' selected' : '';
                                    echo "<option value='" . $row["servtId"] . "' " . $selected . ">" . $row["servtName"] . "</option>";
                                }
                            echo '</select>                   
                        </div>
                        <button class="btnSimp" type="submit">
                            Изменить
                        </button>
                        </form>
                        <div onclick="closeForm()">
                            <img class="close" src="../pics/manage/add.png">
                        </div>';
                        }
                    break;
                }
            case 'Customers': {
                    $sql = "SELECT Customers.userId,custName, sale, photo FROM Customers
                join Users on Users.userId = Customers.userId 
                WHERE Customers.userId=$id";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0)
                        while ($row = $res->fetch_assoc()) {
                            echo '<form class="editCustomer">
                        <h4>
                            <center>Изменение заказчика</center>
                        </h4>
                        <div class="form-group input-container">
                            <input class="form-input" name="name" type="text"  value="' . $row['custName'] . '"/>
                            <label for="name">Имя</label>
                        </div>
                        <div class="form-group input-container">
                            <input class="form-input" name="sale" type="number"  value="' . $row['sale'] . '"/>
                            <label for="sale">Скидка</label>
                        </div>
                        <input class="form-input" name="id" type="hidden"  value="' . $row['userId'] . '"/>
                        <div>
                            <input type="checkbox" id="delP" name="photo"/>
                            <label for="delP">Удалить фото</label>
                        </div>
                        <button class="btnSimp" type="submit">
                            Изменить
                        </button>
                        </form>
                        <div onclick="closeForm()">
                            <img class="close" src="../pics/manage/add.png">
                        </div>';
                        }
                    break;
                }
            case 'Services': {
                    $sql = "SELECT servId,servName,petType,price,servtName,Services.active,Services.servtId FROM Services
                join ServicesTypes on ServicesTypes.servtId = Services.servtId 
                WHERE servId=$id";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0)
                        while ($row = $res->fetch_assoc()) {
                            $currentServtId = $row['servtId'];
                            echo '<form class="editService">
                        <h4>
                            <center>Изменение услуги</center>
                        </h4>
                        <div class="form-group input-container">
                            <input class="form-input" name="name" type="text"  value="' . $row['servName'] . '"/>
                            <label for="name">Название</label>
                        </div>
                        <div class="form-group input-container">
                            <select class="formSelect Select__control" name="type">
                                <option value="Коты">Коты</option>
                                <option value="Собаки">Собаки</option>
                            </select>
                        </div>
                        <div class="form-group input-container">
                            <input class="form-input" name="price" type="number"  value="' . $row['price'] . '"/>
                            <label for="name">Цена</label>
                        </div>
                        <input class="form-input" name="id" type="hidden"  value="' . $row['servId'] . '"/>
                        <span>Вид услуги</span>
                        <div class="form-group input-container">
                            <select class="formSelect Select__control" name="servtId">';
                            $sql1 = "SELECT servtId,servtName FROM ServicesTypes where active=1";
                            $result = $conn->query($sql1);
                            if ($result->num_rows > 0)
                                while ($row = $result->fetch_assoc()) {
                                    $selected = $row["servtId"] == $currentServtId ? ' selected' : '';
                                    echo "<option value='" . $row["servtId"] . "' " . $selected . ">" . $row["servtName"] . "</option>";
                                }
                            echo '</select>                   
                        </div>
                        <button class="btnSimp" type="submit">
                            Изменить
                        </button>
                        </form>
                        <div onclick="closeForm()">
                            <img class="close" src="../pics/manage/add.png">
                        </div>';
                        }
                    break;
                }
            case 'Orders': {
                    $sql = "SELECT orderId,mastName,mastSurname,orderDate,ServicesTypes.servtId,status,Orders.active FROM Orders
                    join Masters on Masters.mastId=Orders.mastId
                    join Services on Services.servId=Orders.servId
                    join ServicesTypes on ServicesTypes.servtId=Services.servtId 
                    WHERE orderId=$id";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0)
                        while ($row = $res->fetch_assoc()) {
                            $currentServtId = $row['servtId'];
                            echo '<form class="editOrder">
                        <h4>
                            <center>Изменение заказа</center>
                        </h4>
                        <div class="form-group input-container">
                            <input class="form-input" name="date" type="date" id="orderDate" value="' . $row['orderDate'] . '"/>
                            <label for="orderDate">Дата</label>
                        </div>
                        <span>Мастер</span>
                        <div class="form-group input-container">
                            <select class="formSelect Select__control" name="servtId">';
                            $sql1 = "SELECT Masters.userId as userId,mastName, mastSurname, Masters.servtId, Users.active FROM Masters
                            join ServicesTypes on ServicesTypes.servtId = Masters.servtId
                            join Users on Users.userId = Masters.userId
                            where Users.active=true and Masters.servtId=$currentServtId";
                            $result = $conn->query($sql1);
                            if ($result->num_rows > 0)
                                while ($row = $result->fetch_assoc()) {
                                    $selected = $row["servtId"] == $currentServtId ? ' selected' : '';
                                    echo "<option value='" . $row["servtId"] . "' " . $selected . ">" . $row["mastName"] . " " . $row["mastSurname"] . "</option>";
                                }
                            echo '</select>                   
                        </div>
                        <input class="form-input" name="id" type="hidden"  value="' . $row['userId'] . '"/>
                        <button class="btnSimp" type="submit">
                            Изменить
                        </button>
                        </form>
                        <div onclick="closeForm()">
                            <img class="close" src="../pics/manage/add.png">
                        </div>';
                        }
                    break;
                }
            case 'ServicesTypes': {

                    break;
                }
        }
        $conn->close();
    }
}
function editing()
{
    if (isset($_POST['id']) && isset($_POST['table'])) {
        $id = $_POST['id'];
        $table = $_POST['table'];
        switch ($table) {
            case 'Users': {
                    editUser($id);
                    break;
                }
            case 'Masters': {
                    editMaster($id);
                    break;
                }
            case 'Customers': {
                    editCust($id);
                    break;
                }
            case 'Services': {
                    editServ($id);
                    break;
                }
                // case 'Order': {
                //         editOrder();
                //         break;
                //     }
                // case 'ServicesTypes': {
                //         editServt();
                //         break;
                //     }
        }
    }
}

function editUser($id)
{
    require("conn.php");
    $changed = 0;
    $phonenum = isset($_POST["phonenum"]) ? $_POST["phonenum"] : null;
    $pass = isset($_POST["pass"]) ? $_POST["pass"] : null;
    if ($phonenum) {
        $sql = "UPDATE `Users` SET `phone`='$phonenum' where userId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($pass) {
        $sql = "UPDATE `Users` SET `password`='$pass' where userId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($changed > 0)
        echo 'OK';
    $conn->close();
}
function editMaster($id)
{
    require("conn.php");
    $changed = 0;
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $surname = isset($_POST["surname"]) ? $_POST["surname"] : null;
    $post = isset($_POST["post"]) ? $_POST["post"] : null;
    $servtId = isset($_POST["servtId"]) ? $_POST["servtId"] : null;
    if ($name) {
        $sql = "UPDATE `Masters` SET `mastName`='$name' where userId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($surname) {
        $sql = "UPDATE `Masters` SET `mastSurname`='$surname' where userId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($post) {
        $sql = "UPDATE `Masters` SET `post`='$post' where userId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($servtId) {
        $sql = "UPDATE `Masters` SET `servtId`=$servtId where userId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($changed > 0)
        echo 'OK';
    $conn->close();
}
function editCust($id)
{
    require("conn.php");
    $changed = 0;
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $sale = isset($_POST["sale"]) ? $_POST["sale"] : null;
    $photo = isset($_POST["photo"]) ? $_POST["photo"] : null;
    if ($name) {
        $sql = "UPDATE `Customers` SET `custName`='$name' where userId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($sale) {
        $sql = "UPDATE `Customers` SET `sale`=$sale where userId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($photo) {
        $sql = "UPDATE `Customers` SET `photo`=null where userId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($changed > 0)
        echo 'OK';
    $conn->close();
}
function editServ($id)
{
    require("conn.php");
    $changed = 0;
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $type = isset($_POST["type"]) ? $_POST["type"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;
    $servtId = isset($_POST["servtId"]) ? $_POST["servtId"] : null;
    if ($name) {
        $sql = "UPDATE `Services` SET `servName`='$name' where servId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($type) {
        $sql = "UPDATE `Services` SET `petType`='$type' where servId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($price) {
        $sql = "UPDATE `Services` SET `price`=$price where servId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($servtId) {
        $sql = "UPDATE `Services` SET `servtId`=$servtId where servId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($changed > 0)
        echo 'OK';
    $conn->close();
}
function editOrder($id, $name, $descr)
{
    require("conn.php");
    $changed = 0;
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $type = isset($_POST["type"]) ? $_POST["type"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;
    $servtId = isset($_POST["servtId"]) ? $_POST["servtId"] : null;
    if ($name) {
        $sql = "UPDATE `Services` SET `servName`='$name' where servId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($type) {
        $sql = "UPDATE `Services` SET `petType`='$type' where servId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($price) {
        $sql = "UPDATE `Services` SET `price`=$price where servId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($servtId) {
        $sql = "UPDATE `Services` SET `servtId`=$servtId where servId=$id";
        if ($conn->query($sql))
            $changed++;
    }
    if ($changed > 0)
        echo 'OK';
    $conn->close();
}
function editServt($id, $name, $descr)
{
    require("conn.php");

    $conn->close();
}

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
                    $sql = "SELECT `mastId`, `mastName`, `mastSurname`, `post`, `photo`, `servtId`, `userId` FROM `Masters` WHERE userId=$id";
                    $res = $conn->query($sql);
                    if ($res->num_rows > 0)
                        while ($row = $res->fetch_assoc()) {
                            $currentServtId = $row['servtId'];
                            echo '<form class="editMaster">
                            <h4>
                            <center>Изменение пользователя</center>
                        </h4>
                        <div class="form-group input-container">
                            <input class="form-input" name="name" type="text"  value="' . $row['mastName'] . '"/>
                            <label for="pass">Имя</label>
                        </div>
                        <div class="form-group input-container">
                            <input class="form-input" name="surname" type="text"  value="' . $row['mastSurname'] . '"/>
                            <label for="pass">Фамилия</label>
                        </div>
                        <div class="form-group input-container">
                            <input class="form-input" name="post" type="text"  value="' . $row['post'] . '"/>
                            <label for="pass">Должность</label>
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
            case 'Services': {

                    break;
                }
            case 'ServicesTypes': {

                    break;
                }
            case 'Gallery': {

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
                // case 'Customers': {
                //         editCust();
                //         break;
                //     }
                // case 'Services': {
                //         editServ();
                //         break;
                //     }
                // case 'ServicesTypes': {
                //         editServt();
                //         break;
                //     }
                // case 'Gallery': {
                //         editPhoto();
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
    $err='';
    if ($name) {
        $sql = "UPDATE `Masters` SET `mastName`='$name' where userId=$id";
        if ($conn->query($sql))
            $changed++;
        else $err.=$sql;
    }
    if ($surname) {
        $sql = "UPDATE `Masters` SET `mastSurname`='$surname' where userId=$id";
        if ($conn->query($sql))
            $changed++;
            else $err.=$sql;
    }
    if ($post) {
        $sql = "UPDATE `Masters` SET `post`='$post' where userId=$id";
        if ($conn->query($sql))
            $changed++;
            else $err.=$sql;
    }
    if ($servtId) {
        $sql = "UPDATE `Masters` SET `servtId`=$servtId where userId=$id";
        if ($conn->query($sql))
            $changed++;
            else $err.=$sql;
    }
    if ($changed > 0)
        echo 'OK';
    echo $err;
    $conn->close();
}
function editCust($id, $name, $sale)
{
    require("conn.php");

    $conn->close();
}
function editServ($id, $name, $type, $price, $servtId)
{
    require("conn.php");

    $conn->close();
}
function editServt($id, $name, $descr)
{
    require("conn.php");

    $conn->close();
}

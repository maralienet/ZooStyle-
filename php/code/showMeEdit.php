<?php
function showEditWindow()
{
    require("conn.php");
    if (isset($_COOKIE["id"])) {
        $id = urldecode($_COOKIE["id"]);

        $sql = "SELECT photo,custName,phone,password FROM Customers
            join Users on Users.userId=Customers.userId
            where Customers.userId=$id";

        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo '
                <div class="form-group input-container">
                    <input class="form-input" id="name" name="name" autocomplete="off" type="text" value="' . $row['custName'] . '" />
                    <label for="name">Имя</label>
                </div>

                <div class="form-group input-container">
                    <input class="form-input" id="phonenum" name="phonenum" autocomplete="off" type="tel" maxlength="13" value="' . $row['phone'] . '" />
                    <label for="phonenum">Номер телефона</label>
                </div>
                <span class="sayError" id="sayErrorPhone"></span>

                <div class="form-group input-container">
                    <input class="form-input" id="pass" name="pass" autocomplete="off" type="password" />
                    <label for="pass">Пароль</label>
                </div>
                <span class="sayError" id="sayErrorPass"></span>

                <span class="avatar">Выберите фото профиля</span>
                <label class="input-file">
                    <input type="file" name="file" accept="image/*">		
                    <span>Выберите файл</span>
                </label>
            ';
            }
        }
    }
    $conn->close();
}
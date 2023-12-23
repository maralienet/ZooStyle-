<?php
require("conn.php");
if (isset($_COOKIE['id'])) {
    $id = urldecode($_COOKIE['id']);

    $sql = "SELECT phone,custName,sale FROM Customers 
    join Users on Users.userId=Customers.userId
    where Customers.userId=$id";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            echo '
                <div class="nede persInfo">
                    <h2>' . $row['custName'] . '</h2>
                    <h5>' . $row['phone'] . '</h5>
                    <h5>Персональная скидка: ' . $row['sale'] . '%</h5>
                </div>
                ';
        }
    } else echo '
            <div class="nede persInfo">
                <h2>Вы не зарегестрированы!</h2>
                <a href="registration.php"><button class="btnSimp">
                            Зарегистрироваться
                        </button></a>
            </div>
            ';
} else {
    $sql = "SELECT max(userId) as uid from Users where role='Заказчик'";
    $result = $conn->query($sql);
    $uid = null;
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            $uid = $row['uid'];

    $sql = "SELECT phone,custName,sale FROM Customers 
            join Users on Users.userId=Customers.userId
            where Customers.userId=$uid";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            echo '
                <div class="nede persInfo">
                    <h2>' . $row['custName'] . '</h2>
                    <h5>' . $row['phone'] . '</h5>
                    <h5>Персональная скидка: ' . $row['sale'] . '%</h5>
                </div>
                ';
        }
    }
}
$conn->close();

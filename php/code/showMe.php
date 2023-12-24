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
                    <h5>' . PrettyNumber($row['phone']) . '</h5>
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
} else echo '
<div class="nede persInfo">
    <h2>Вы не зарегестрированы!</h2>
    <a href="registration.php"><button class="btnSimp">
                Зарегистрироваться
            </button></a>
</div>
';
$conn->close();

function PrettyNumber($phonenum)
{
    $formatted_number = substr($phonenum, 0, 4) . " (" . substr($phonenum, 4, 2) . ") " . substr($phonenum, 6, 3) . "-" . substr($phonenum, 9, 2) . "-" . substr($phonenum, 11, 2);
    return $formatted_number;
}

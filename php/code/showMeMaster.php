<?php
require("conn.php");
if (isset($_COOKIE['id'])) {
    $id = urldecode($_COOKIE['id']);

    $sql = "SELECT phone,mastName,mastSurname,post FROM Masters 
    join Users on Users.userId=Masters.userId
    where Masters.userId=$id";

    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            echo '
                <div class="nede persInfo">
                    <h2>' . $row['mastName'] . ' ' . $row['mastSurname'] . '</h2>
                    <h5>' . PrettyNumber($row['phone']) . '</h5>
                    <h5>' . $row['post'] . '</h5>
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

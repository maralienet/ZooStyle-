<?php
require("conn.php");
if (isset($_COOKIE["id"])) {
    $id = urldecode($_COOKIE["id"]);

    $sql = "SELECT photo,custName FROM Customers
    where userId=$id";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            if ($row['photo'] != null)
                echo '
            <img src="' . $row['photo'] . '" alt="' . $row['custName'] . '" class="img-fluid dog2 mePhoto" />
                ';
            else
                echo '<img src="../pics/me/emptyUser.jpg" alt="user" class="img-fluid dog2 mePhoto" />';
        }
    }
} else
    echo '<img src="../pics/me/emptyUser.jpg" alt="user" class="img-fluid dog2 mePhoto" />';

$conn->close();

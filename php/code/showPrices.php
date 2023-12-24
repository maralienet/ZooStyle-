<?php
require("conn.php");

$sql = "SELECT servtId,servtName,descript FROM ServicesTypes";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="row">
            <div class="col serv">
                <h3><b>' . $row['servtName'] . '</b></h3>
                <p>' . $row['descript'] . '</p>    
                    <div class="prices">';


        $sql1 = "SELECT petType, GROUP_CONCAT(servName) as servName, GROUP_CONCAT(price) as price 
            FROM Services 
            JOIN ServicesTypes ON ServicesTypes.servtId=Services.servtId 
            AND Services.servtId=" . $row['servtId'] . " 
            GROUP BY petType";
        $res = $conn->query($sql1);
        if ($res->num_rows > 0) {


            while ($rov = $res->fetch_assoc()) {
                $servNames = explode(",", $rov['servName']);
                $pieces = explode(",", $rov['price']);

                if (count($servNames) > 1) {
                    echo '                    
                        <div class="type">
                            <div style="text-align:center">
                                <p><b>' . $rov['petType'] . '</b></p>
                            </div><br />
                        </div>';
                    for ($i = 0; $i < count($servNames); $i++) {
                        echo '<div class="pris">
                            <p>' . $servNames[$i] . '</p>
                            <div class="dots"></div>
                            <p class="cost">от ' . $pieces[$i] . 'р.</p>
                        </div>';
                    }
                } else {
                    for ($i = 0; $i < count($servNames); $i++) {
                        echo '<div class="pris">
                    <p>' . $servNames[$i] . '</p>
                    <div class="dots"></div>
                    <p class="cost">от ' . $pieces[$i] . 'р.</p>
                </div>';
                    }
                }
            }
        }

        echo '</div>
            </div>
        </div>';
    }
}

echo $conn->error;
$conn->close();

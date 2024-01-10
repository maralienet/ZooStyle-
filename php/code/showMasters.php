<?php
require("conn.php");

$sql = "SELECT mastName,mastSurname,post,photo FROM Masters
join Users on Users.userId=Masters.userId
where active=true";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-lg-4 col-md-6 col-sm-12 tocenter">
                <div class="coworker">
                    <div class="photo">
                        <img src="'.$row['photo'].'" />
                    </div>
                    <div class="texts">
                        <h4>'.$row['mastName'].' '.$row['mastSurname'].'</h4>
                        <p>'.$row['post'].'</p>
                    </div>
                </div>
            </div>';
    }
} else echo $conn->error;
$conn->close();

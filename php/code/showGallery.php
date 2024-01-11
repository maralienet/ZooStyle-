<?php
require("conn.php");
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    $sql = "SELECT path,role FROM Gallery 
    where role='all' and petType='$type'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='col-lg-4 col-md-6 col-sm-12'>
            <div class='photoItem'>
                <img src=" . $row['path'] . " />
            </div>
        </div>";    
        }
    } else echo $conn->error;
}
$conn->close();

<?php
require("conn.php");

$sql = "SELECT path,role FROM Gallery
where role='best'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $indicators= '<ol class="carousel-indicators">';
    $inner = '<div class="carousel-inner">';
    $isAct = false;
    while ($row = $result->fetch_assoc()) {
        if(!$isAct){
            $indicators .=  '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
            $inner.='
                <div class="carousel-item active">
                    <img class="d-block w-100" src="'.$row['path'].'" alt="First slide">
                </div>
            ';
            $isAct=true;
        }
        else{
            $indicators .=  '<li data-target="#carouselExampleIndicators" data-slide-to="0"></li>';
            $inner.='
                <div class="carousel-item">
                    <img class="d-block w-100" src="'.$row['path'].'" alt="Other slide">
                </div>
            ';
        }
    }
    $indicators .= '</ol>';
    $inner .= '</div>';
    echo $indicators.$inner;
} else echo $conn->error;
$conn->close();

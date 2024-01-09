<?php
require("conn.php");

if(isset($_POST['phonenum']))
    search($_POST['phonenum']);

$conn->close();
function search($text){
    echo $text;
}
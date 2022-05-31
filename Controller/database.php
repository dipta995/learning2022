<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course_sell";

$con = new mysqli($servername, $username, $password, $dbname);

if(!$con){
    die("Connection Failed: ". mysqli_connect_error());
}

?>

<?php


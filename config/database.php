
<?php
/*
$server   = "localhost";
$username = "root";
$password = "123";
$database = "rrhhcurriculumn";*/

$server   = "localhost";
$username = "root";
$password = "";
$database = "agua";


$mysqli = new mysqli($server, $username, $password, $database);


if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}
?>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "jeelalriyada";
$connect = mysqli_connect($host, $user, $pass, $database) or die("Cant connect with database");
$connect -> set_charset("utf8");
?>
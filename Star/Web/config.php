<?php  
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_database = "id615238_case";
// $servername = "localhost";
// $username = "id615238_user_case";
// $password = "12345678";
// $db_database = "id615238_case";
$connect = mysqli_connect($servername, $username, $password,$db_database);
$connect->set_charset("utf8");
?> 
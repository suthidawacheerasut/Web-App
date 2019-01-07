<?php

// $servername = "localhost";
// $username = "id615238_user_case";
// $password = "12345678";
// $db_database = "id615238_case";
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_database = "id615238_case";

$connect = new mysqli($servername,$username,$password,$db_database);
$connect->set_charset("utf8");
$id_awards = $_GET['id_awards'];
// $id_awards = isset($_GET['id_awards']) ? $_GET['id_awards'] : '';
$query = "DELETE FROM AWARDS WHERE id_awards = '$id_awards'";
// $sql = mysqli_query($connect, $query);
if(mysqli_query($connect, $query)){
   
    echo "<script>alert('ยืนยันการลบ'); location.href='adddata_manager.php';</script>";
    // header("location:addpic_manager.php");
}else{
    echo mysql_error();
}
?>
<?php
session_start();
$servername = "localhost";
$username = "id615238_user_case";
$password = "12345678";
$db_database = "id615238_case";
$connect = new mysqli($servername,$username,$password,$db_database);

$Id_star = $_SESSION['Id_star'];
$First_name_star = $_GET['First_name_star'];

$query = "DELETE FROM ABILITY WHERE ability = '$ability' and ab_id_star = '$Id_star'";
// $sql = mysqli_query($connect, $query);
if(mysqli_query($connect, $query)){
   
    echo "<script>alert('ยืนยันการลบ'); location.href='adddata_manager.php';</script>";
    // header("location:addpic_manager.php");
}else{
    echo mysql_error();
}
?>
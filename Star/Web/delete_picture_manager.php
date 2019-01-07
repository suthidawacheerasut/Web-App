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

// $id_pic = $_GET['id_pic'];
$id_pic = isset($_GET['id_pic']) ? $_GET['id_pic'] : '';
$query = "DELETE FROM PICTURE WHERE id_pic = '$id_pic'";
// $sql = mysqli_query($connect, $query);
if(mysqli_query($connect, $query)){
   
    echo "<script>alert('ยืนยันการลบรูปภาพ'); location.href='addpic_manager.php';</script>";
    // header("location:addpic_manager.php");
}else{
    echo mysql_error();
}
?>
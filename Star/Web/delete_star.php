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

$Id_star = $_GET['uid'];
// echo "$Id_star";
    $query_ = "SELECT * FROM reserve WHERE R_id_star = '$Id_star'";

    $query = "DELETE FROM STAR WHERE Id_star = '$Id_star'";
    $query1 = "DELETE FROM PICTURE WHERE P_id_star = '$Id_star'";
    $query2 = "DELETE FROM ABILITY WHERE ab_id_star = '$Id_star'";
    $query3 = "DELETE FROM AWARDS WHERE Aw_id_star = '$Id_star'";
    $query4 = "DELETE FROM JOBTYPE WHERE W_id_star = '$Id_star'";
    $query5 = "DELETE FROM PORTFOLIO WHERE Po_id_star = '$Id_star'";

    $result = mysqli_query($connect, $query_);  
    $keep = "";

    while($row = mysqli_fetch_array($result))  
    {  
        $keep = "$row[id_reserve]";
    } 

    if("$keep" == ""){
        $sql1 = mysqli_query($connect, $query1);
        $sql2 = mysqli_query($connect, $query2);
        $sql3 = mysqli_query($connect, $query3);
        $sql4 = mysqli_query($connect, $query4);
        $sql5 = mysqli_query($connect, $query5);
        $sql = mysqli_query($connect, $query);
        echo "<script>alert('ยืนยันการลบดารา'); location.href='home_manager.php';</script>";
    }
    else{
        echo "<script>alert('ไม่สามารถลบดาราได้เพราะมีการจองงานอยู่'); location.href='home_manager.php';</script>";
    } 
    //     // header("location:addpic_manager.php");
    // }else{
    //     echo mysql_error();
    // }
$connect->close();
?>
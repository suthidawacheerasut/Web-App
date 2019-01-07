<?php
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "star";
    $dbname = "id615238_case";

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
    $conn->set_charset("utf8");

    $ID = $_GET['id_reserve'];
    $deleteList = "DELETE FROM reserve WHERE id_reserve = '$ID'";
    if(mysqli_query($conn,$deleteList)){
        header("location: list.php");
    } else {
        echo mysql_error();
    }

?>
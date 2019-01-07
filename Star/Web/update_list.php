<?php
    ob_start();
    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    $dbname = "id615238_case";
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "star";

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
    $conn->set_charset("utf8");

    $ID = $_GET['id_reserve'];
    $updateList = "UPDATE reserve SET State_reserve = '1' WHERE id_reserve = '$ID'";
    if(mysqli_query($conn,$updateList)){
        header("location: list.php");
    } else {
        echo mysql_error();
    }

?>
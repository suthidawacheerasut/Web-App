<?php
session_start();
echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_customers'];
?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>ขัอมูลส่วนตัว</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/profile.css">
    <link rel="stylesheet" type="text/css" href="CSS/menu.css">
    

</head>
<body>
<div id="wrap">
    <header>
        <div class="inner relative">
            <a class="logo" href="ordertime.php"><img src="Pic/logo_manu.png" alt="fresh design web" weight = "75px" height="75px"></a>
            <a id="menu-toggle" class="button dark" href="ordertime.php"><i class="icon-reorder"></i></a>
            <nav id="navigation">
                <ul id="main-menu">
                    <li><a href="ordertime.php"><b>หน้าหลัก</b></a></li>
                    <li class="parent">
                        <a href="#"><b>ค้นหา</b></a>
                        <ul class="sub-menu">
                            <li><a href="price.php"><i class="icon-wrench"></i>ค้นหาจากราคา</a></li>
                            <li><a href="seachmuch.php"><i class="icon-credit-card"></i>ค้นหาแบบละเอียด</a></li>
                        </ul>
                    </li>
                    <li class="current-menu-item"><a href="profile.php"><b>ข้อมูลส่วนตัว</b></a></li>
                    <li class="parent">
                        <a href="#"><b>การแจ้งเตือน</b></a>
                        <ul class="sub-menu">
                            <li><a href="list.php">รายการจองคิว</a></li>
                            <li><a href="status.php">สถานะการจอง</a></li>
                        </ul>
                    </li>
                    <li><a href="login.php"><b>ออกจากระบบ</b></a></li>
                </ul>
            </nav>
        </div>
    </header> 
    <div class="under-line">
    <?php
        $id_customers = $_SESSION['Id_customers'];
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

        $sql = "select * from customers where Id_customers = '$id_customers'";
        $result = $conn->query($sql);
             
        if($result->num_rows>0){

                  
            while ($row=$result->fetch_assoc()) { 
            $Fname = $row['First_name_customers'];
            $Lname = $row['Last_name_customers'];
            $phone = $row['Phone_customers'];
            $company = $row['Form_company'];
            $gender = $row['Gender_customers']; 
        
            echo '<figure class="snip0057 red">';
                echo "<figcaption>";
                    echo "<h2>$Fname  $Lname</h2>";
                    echo "<p>บริษัท/สังกัด $company</p>";
                    echo "<p>เบอร์โทร $phone</p>";
                    echo "<p>เพศ $gender</p>";

                    echo '<div class="icons"><a href="edit_profile.php"><i>แก้ไขข้อมูล</i></a></div>';
                echo "</figcaption>";
                echo '<div class="image">';
                    echo '<img src="Pic/profile_c.png" alt="sample4"/>';
                echo "</div>";
                echo '<div class="position">ลูกค้า</div>';
            echo "</figure>";
        }
    }
?>

    </div>
</div>    
</body></html>
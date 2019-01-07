<?php
session_start();
echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_star_manager'];
$Phone_star = isset($_GET['Phone_star']) ? $_GET['Phone_star'] : '';
// $Phone_star = $_GET['Phone_star'];
// echo "$Phone_star";


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

 
$query = "SELECT Id_star FROM STAR WHERE Phone_star = '$Phone_star'";
$result = mysqli_query($connect,$query);
    //ต้องเปิด ปิดไว้เช็คงานเฉยๆ
    while($row = mysqli_fetch_array($result))  
    {  
         $_SESSION['Id_star'] = "$row[Id_star]";
    }  

    // $_SESSION['Id_star'] = "35";
    // $_SESSION['First_name_star'] = "มาริโอ้";
    // $_SESSION['Last_name_star'] = "เมาเร่อ";

?>

<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <!-- manu -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>เพิ่มดาราในสังกัด</title>
    <link rel="stylesheet" type="text/css" href="CSS/menu_manager.css">
    <script type="text/javascript" src="function.js"></script>
    <!-- end -->

    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <link rel="stylesheet" href="CSS/add_style_manager.css">

</head>
<body>

<!-- menu -->
<div id="wrap" class="menu_manager">
    <header>
        <div class="inner relative">
            <a class="logo" href="home_manager.php"><img src="Pic/logo_manu.png" alt="fresh design web" weight = "75px" height="75px"></a>
            <a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
            <nav id="navigation">
                <ul id="main-menu">
                    <li><a href="home_manager.php"><b>หน้าเเรก</b></a></li>
                    <li class="current-menu-item"><a href="addstar_manager.php"><b>เพิ่มดาราในสังกัด</b></a></li>
                    <li><a href="setting_manager.php"><b>ตั้งค่าบัญชีผู้ใช้</b></a></li>
                     <li class="parent">
                        <a href="#"><b>รายการจองคิว</b></a>
                        <ul class="sub-menu">
                            <li><a href="queue_star.php">คิวที่รอการยืนยัน</a></li>
                            <li><a href="queue_confirm.php">คิวที่รับการยืนยัน</a></li>
                        </ul>
                    </li>
                    <?php
                    echo '<li><a href="login.php?action=logout"><b>ออกจากระบบ</b></a></li>';
                    ?>
                </ul>
            </nav>
        </div>
    </header>   
</div> 
<div><img src="Pic/bg1.png" width="100%" height="350px"></div>
<!-- end -->
<br>
<br>
<!-- register -->
<div class="login-wrap">
    <form role="form" action="#" method="POST">
        <div class="login-html">
            <br>
            <center><h2>เพิ่มดาราในสังกัดสำเร็จเเล้ว</h2></center>
            
            <div class="login-form">
                <br><br><br><br>
                <div class="group">

                    <center><label for="tab-1" class="tab">การเพิ่มข้อมูลอย่างละเอียด</label></center>

                    <div class="foot-lnk1">
                        <ul>
                            <li>
                                <?php
                                // echo "$Id_star";
                                echo "<center><a href='addpic_manager.php'><u>เพิ่มรูปภาพดารา</u></a></center>";
                                echo "<center><a href='adddata_manager.php'><u>เพิ่มข้อมูลเเบบละเอียด</u></a></center>";
                                ?>
                       
                            </li>
                          
                        </ul>
                    </div>

                    <br><br><br><br><br><br>

                    <div class="group">
                        <center><a href="home_manager.php"><u>กลับไปหน้าเเรก</u></a></center>
                    </div>

                    <br>
                    <br>
                </div>
            </div>
        </div>
    </form>
</div>      
<br>
<br>
</body>
</html>
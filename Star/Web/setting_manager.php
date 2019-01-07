<?php
    session_start();
    echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_star_manager'];

    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    // $db_database = "id615238_case";
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_database = "id615238_case";
    $connect = new mysqli($servername, $username, $password,$db_database);
    $connect->set_charset("utf8");
?>

<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <!-- manu -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>ตั้งค่าบัญชีผู้ใช้งาน</title>
    <link rel="stylesheet" type="text/css" href="CSS/menu_manager.css">
    <script type="text/javascript" src="function.js"></script>
    <!-- end -->

    <!-- validate  redio button-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script>
        function send() {
            var genders = document.getElementsByName("selector");
            if (genders[0].checked == true) {
                return true;
            } else if (genders[1].checked == true) {
                return true;
            } else {
                // no checked
                var msg = '<span style="color:red;">กรุณาเลือกเพศ</span><br /><br />';
                document.getElementById('msg').innerHTML = msg;
                return false;
            }
            return true;
        }

        function reset_msg() {
            document.getElementById('msg').innerHTML = '';
        }
    </script>

    
    <!-- Validation -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="CSS/style_manager.css">
        <link rel="stylesheet" href="CSS/formhack_manager.css">
    <!-- end -->

    <link rel="stylesheet" href="CSS/setting_style_manager.css">
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <style>
        .error {color: #FF0000;}
    </style>


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
                    <li><a href="addstar_manager.php"><b>เพิ่มดาราในสังกัด</b></a></li>
                    <li class="current-menu-item"><a href="setting_manager.php"><b>ตั้งค่าบัญชีผู้ใช้</b></a></li>
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
    <div><img src="Pic/bg1.png" width="100%" height="350px"></div>
</div> 
<!-- end -->

<!-- setting -->
<!-- อย่าลืมเเสดงข้อมูลเดิมที่มึอยู่ด้วย-->
<br>
<br>
  <div class="login-wrap">
  <form role="form" action="#" method="POST">
    <div class="login-html">
       
        <center><label for="tab-1" class="tab">ตั้งค่าบัญชีผู้ใช้</label></center>
        <div class="login-form">
            <div>
                <!-- scroll bar -->
                <div style="width: 105%; height: 500px; overflow-y: scroll;">
                    <!-- ลายน้ำ -->
                    <div id="example" role="application">
                        <div id="tshirt-view" class="demo-section k-content">


                        <?php
                            $Id_star_manager = $_SESSION['Id_star_manager'];
                            $query = "SELECT * FROM STAR_MANAGER WHERE Id_star_manager = '$Id_star_manager'";

                            $result = mysqli_query($connect,$query);

                            while($row = mysqli_fetch_array($result))  
                            {  
                                $First_name_star_manager = 
                                $row['First_name_star_manager'];

                                $Last_name_star_manager = 
                                $row['Last_name_star_manager'];

                                $Phone_star_manager = 
                                $row['Phone_star_manager'];

                                $Gender_star_manager = 
                                $row['Gender_star_manager'];

                                $Password_star_manager = 
                                $row['Password_star_manager'];
                            } 

                            $First_name_star_managerErr = "";
                            $Last_name_star_managerErr = "";
                            $Phone_star_managerErr = "";//
                            $Gender_star_managerErr = "";
                            $Password_star_managerErr = "";
                            $Password_star_manageroldErr = "";
                            $Password_star_managerConfirmErr = "";
                 

                            $up = 1;
                            
                            if (empty($_POST["First_name_star_manager"])){
                                $First_name_star_managerErr = "";
                            }else{
                               
                                $First_name_star_manager = $_POST["First_name_star_manager"];
                            }

                            if (empty($_POST["Last_name_star_manager"])){
                                $Last_name_star_managerErr = "";
                            }else{
                               
                                $Last_name_star_manager = $_POST["Last_name_star_manager"];
                            }

                            if (empty($_POST["Phone_star_manager"])){
                                $Phone_star_managerErr = "";
                            }else{        
                                $Phone_star_manager = $_POST["Phone_star_manager"];  
                            }

                            if (!empty($_POST["Gender_star_manager"])){
                                $Gender_star_manager = $_POST["Gender_star_manager"];
                            }

                            $keep_pass = 0;

                            if (empty($_POST["Password_star_managerold"])){
                                $Password_star_manageroldErr = "";
                            }else{
                                if($Password_star_manager == $_POST["Password_star_managerold"]){
                                    $keep_pass = 1;
                                    $Password_star_manager = $_POST["Password_star_managerold"];
                                    
                                }else{
                                    $keep_pass = 0;
                                    $up = 0;
                                    $Password_star_manageroldErr = 'คุณกรองรหัสผ่านเดิมไม่ถูกต้อง';
                                }
                            }

                            if (empty($_POST["Password_star_managerConfirm"])){
                                $Password_star_managerConfirmErr = "";
                            }else{

                                if($_POST["Password_star_managerConfirm"] == $_POST["Password_star_managernew"] and $keep_pass == 1){
                                    $Password_star_manager = $_POST["Password_star_managerConfirm"];
                                    
                                }else{
                                    $up = 0;
                                    $Password_star_managerConfirmErr = 'กรุณายืนยันรหัสผ่านใหม่อีกครั้ง';
                                }
                            }

                            echo '<div class = "group">';
                             if(isset($_SESSION['PHP_SELF'])){

                                $keep = htmlspecialchars($_SESSION['PHP_SELF']);
                            }
                            else{
                                $keep = '';
                            }

                            echo "<form method='POST' action ='$keep'>";
                            //ชื่อ
                            echo "<label for='M_firstname'>";
                            echo "<div class='group'>";

                            echo "<h4><b>ชื่อจริง</b></h4>";
                            echo "<input id='M_firstname' class = 'input' type='text' name='First_name_star_manager'  
                            minlength='2' maxlength='50' value = '$First_name_star_manager'>";
                            echo "<ul class='input-requirements'>";
                            echo "<li> 2 < ความยาวตัวอักษร < 50 </li>";
                            echo "<li>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</li>";
                            echo "</ul>";
                            echo "</div>";
                            echo "</label>";
                            echo "<span class='error'>$First_name_star_managerErr</span>";


                            //นามสกุล
                            echo "<label for='M_lastname'>";
                            echo "<div class='group'>";

                            echo "<h4><b>นามสกุล</b></h4>";
                            echo "<input id='M_lastname' class = 'input' type='text' minlength='2' maxlength='50' name='Last_name_star_manager' value = '$Last_name_star_manager'>";
                            echo "<ul class='input-requirements'>";
                            echo "<li> 2 < ความยาวตัวอักษร < 50 </li>";
                            echo "<li>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</li>";
                            echo "</ul>";
                            echo "</div>";
                            echo "</label>";
                            echo "<span class='error'>$Last_name_star_managerErr</span>";

                            //เบอร์โทร
                            echo "<label for='M_phone'>";
                            echo "<div class='group'>";

                            echo "<h4><b>เบอร์โทร</b></h4>";
                            echo "<input id='M_phone' class = 'input' type='text' name='Phone_star_manager' value = '$Phone_star_manager' minlength='10' maxlength='10'>";
                            echo "<ul class='input-requirements'>";
                            echo "<li>08XXXXXXXX</li>";
                            echo "</ul>";
                            echo "</div>";
                            echo "</label>";
                            echo "<span class='error'>$Phone_star_managerErr</span>";


                            if($Gender_star_manager == 'หญิง'){
                                $Gender_star_manager2 = 'ชาย';
                            }else{
                                $Gender_star_manager2 = 'หญิง';
                            }

                            echo "<h4><b>เพศ</b></h4>"; 
                            echo "<select class='input' name='Gender_star_manager'>;
                                    <option value='$Gender_star_manager'>$Gender_star_manager</option>
                                    <option value='$Gender_star_manager2'>$Gender_star_manager2</option>
                                </select>";

                            echo "<h4><b>รหัสผ่านเดิม</b></h4>";
                            echo "<input class = 'input' placeholder='รหัสผ่านเดิม' type='password' name='Password_star_managerold' pattern='.{8,}'>"; 
                      
                            echo "<span class='error'>$Password_star_manageroldErr</span>";
                            echo "<br>";
                    

                            echo "<h4><b>รหัสผ่านใหม่</b></h4>";
                            echo "<input class = 'input' placeholder='รหัสผ่านใหม่' maxlength='50'  minlength='8' type='password' name='Password_star_managernew' pattern='.{8,}'>"; 
                            echo "<br>";

                            echo "<h4><b>ยืนยันรหัสผ่านใหม่</b></h4>";
                            echo "<input class = 'input' placeholder='ยืนยันรหัสผ่านใหม่' maxlength='50'  minlength='8' type='password' name='Password_star_managerConfirm' pattern='.{8,}'>"; 
                            echo "<span class='error'>$Password_star_managerConfirmErr</span>";
                            echo "<br>";
                            echo "<br>";

                            echo "<input class = 'button' name='submit' type='submit'  value='เเก้ไขข้อมูล' >"; 
                            echo "</form>"; 
                            echo "</div>";

                            if(isset($_POST["submit"]))  
                            {  
                                $query_name = "SELECT Id_star_manager FROM STAR_MANAGER WHERE '$First_name_star_manager' = First_name_star_manager AND '$Last_name_star_manager' =  Last_name_star_manager";
                                $Id_star1 = "";
                                $result = mysqli_query($connect, $query_name);  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    $Id_star1 = "$row[Id_star_manager]";
                                } 
                                
                                if("$Id_star1" != "" && "$Id_star1" != "$Id_star_manager"){
                                    echo "<script>alert('ไม่สามารถเปลี่ยนเเปลงได้ มีชื่อนามสกุลนี้เเล้ว');location.href='setting_manager.php';</script>";
                                }else{
                                    $query = "UPDATE STAR_MANAGER
                                    SET First_name_star_manager = '$First_name_star_manager',
                                        Last_name_star_manager = '$Last_name_star_manager',
                                        Phone_star_manager = '$Phone_star_manager',
                                        Gender_star_manager = '$Gender_star_manager',
                                        Password_star_manager = '$Password_star_manager'
                                    WHERE Id_star_manager = '$Id_star_manager'
                                    ";  

                                    if(mysqli_query($connect, $query) and ($up == 1))  
                                    {  
                                        echo "<script>alert('ยืนยันเเก้ไข');location.href='home_manager.php';</script>";
                                    } 
                                }
                            }  
                        ?>
                           
                        </div>
                    </div>
                </div>  
            </div>
        </div>

    </div>
    </form>
</div>


<br>
<br>

<!-- end -->
<script src="setting_manager.js"></script>


</body></html>
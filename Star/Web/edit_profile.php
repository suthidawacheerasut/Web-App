<?php
session_start();
echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_customers'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    // $db_database = "star";
    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    $dbname = "id615238_case";
    $connect = new mysqli($servername, $username, $password,$dbname);
    $connect->set_charset("utf8");
?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <link rel="stylesheet" href="CSS/validation/style.css">
    <link rel="stylesheet" href="CSS/validation/formhack.css">
    <link rel="stylesheet" href="CSS/edit_style2.css">
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
            <!-- <div class="under"><img src="Pic/bg1.png" width="100%" height="350px"></div> -->
            <div class="under-line"></div>
            <div class="under">
            <div class="login-wrap">
              <form role="form" action="#" method="POST">
                <div class="login-html">
                    <center><label for="tab-1" class="tab">แก้ไขข้อมูล</label></center>
                    <div class="login-form">
                        <div>
                            <!-- scroll bar -->
                            <div style="width: 105%; height: 550px; overflow-y: scroll;">
                                <!-- ลายน้ำ -->
                                <div id="example" role="application">
                                    <div id="tshirt-view" class="demo-section k-content">

                            <?php
                            $Id_customers = $_SESSION['Id_customers'];
                            $query = "SELECT * FROM CUSTOMERS WHERE Id_customers = '$Id_customers'";

                            $result = mysqli_query($connect,$query);

                            while($row = mysqli_fetch_array($result))  
                            {  
                                $First_name_customers = 
                                $row['First_name_customers'];

                                $Last_name_customers = 
                                $row['Last_name_customers'];

                                $Phone_customers = 
                                $row['Phone_customers'];

                                $Gender_customers = 
                                $row['Gender_customers'];

                                $Password_customers = 
                                $row['Password_customers'];

                                $Form_company =
                                $row['Form_company'];
                            } 

                            $First_name_customersErr = "";
                            $Last_name_customersErr= "";
                            $Phone_customersErr = "";
                            $Gender_customersErr = "";
                            $Form_companyErr = "";
                            $Password_customersErr = "";
                            $Password_customersOldErr = "";
                            $Password_customersConfirmErr = "";
                 

                            $up = 1;
                            
                            if (empty($_POST["First_name_customers"])){
                                $First_name_customersErr = "";
                            }else{
                               
                                $First_name_customers = $_POST["First_name_customers"];
                            }

                            if (empty($_POST["Last_name_customers"])){
                                $Last_name_customersErr = "";
                            }else{
                               
                                $Last_name_customers = $_POST["Last_name_customers"];
                            }

                            if (empty($_POST["Phone_customers"])){
                                $Phone_customersErr = "";
                            }else{
                                if (preg_match("/^[0-9]*$/",$_POST["Phone_customers"])) {
                                    $Phone_customers= $_POST["Phone_customers"];
                                }else{
                                    $up = 0;
                                    $Phone_customersErr = 'กรุณากรองเบอร์โทรศัพท์ตัวเป็นตัวเลข';
                                }
                         
                            }

                            if (empty($_POST["Form_company"])){
                                $Form_companyErr = "";
                            }else{
                               
                                $Last_name_customers = $_POST["Last_name_customers"];
                            }

                            if (!empty($_POST["Gender_customers"])){
                                $Gender_customers = $_POST["Gender_customers"];
                            }

                            $keep_pass = 0;

                            if (empty($_POST["Password_customersOld"])){
                                $Password_customersOldErr = "";
                            }else{
                                if($Password_customers == $_POST["Password_customersOld"]){
                                    $keep_pass = 1;
                                    $Password_customers = $_POST["Password_customersOld"];
                                    
                                }else{
                                    $keep_pass = 0;
                                    $up = 0;
                                    $Password_customersOldErr = 'คุณกรองรหัสผ่านเดิมไม่ถูกต้อง';
                                }
                            }

                            if (empty($_POST["Password_customersConfirm"])){
                                $Password_customersConfirmErr = "";
                            }else{

                                if($_POST["Password_customersConfirm"] == $_POST["Password_customersNew"] and $keep_pass == 1){
                                    $Password_customers = $_POST["Password_customersConfirm"];
                                    
                                }else{
                                    $up = 0;
                                    $Password_customersConfirmErr = 'กรุณายืนยันรหัสผ่านใหม่อีกครั้ง';
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

                            echo "<label for='C_firstname'>";
                            echo "<div class='group'>";
                            echo "<h4><b>ชื่อจริง</b></h4>";
                            echo "<input id='C_firstname' class = 'input' type='text' name='First_name_customers' pattern='.{3,}' value = '$First_name_customers'>";
                            echo "<ul class='input-requirements'>";
                            echo "<li> 3 < ความยาวตัวอักษร < 50 </li>";
                            echo "<li>กรุณากรองตัวอักษรภาษาไทย</li>";
                            echo "</ul>";
                            echo "<br>";
                            echo "<span class='error'>$First_name_customersErr</span>";

                            echo "<label for='C_lastname'>";
                            echo "<div class='group'>";
                            echo "<h4><b>นามสกุล</b></h4>";
                            echo "<input id='C_lastname' class = 'input' type='text' name='Last_name_customers' pattern='.{3,}' value = '$Last_name_customers'>";
                            echo "<ul class='input-requirements'>";
                            echo "<li> 3 < ความยาวตัวอักษร < 50 </li>";
                            echo "<li>กรุณากรองตัวอักษรภาษาไทย</li>";
                            echo "</ul>";
                            echo "<br>";
                            echo "<span class='error'>$Last_name_customersErr</span>";

                            echo "<label for='C_phone'>";
                            echo "<div class='group'>";
                            echo "<h4><b>เบอร์โทร</b></h4>";
                            echo "<input id='C_phone' class = 'input' type='text' name='Phone_customers' value = '$Phone_customers' minlength='10' maxlength='10'>";
                            echo "<ul class='input-requirements'>";
                            echo "<li>08XXXXXXXX</li>";
                            echo "</ul>";
                            echo "<br>"; 
                            echo "<span class='error'>$Phone_customersErr</span>";

                             echo "<h4><b>บริษัท/สังกัด</b></h4>";
                            echo "<input class = 'input' type='text' name='Form_company' pattern='.{3,}' value = '$Form_company'>";
                            echo "<br>";
                            echo "<span class='error'>$Form_companyErr</span>";


                            if($Gender_customers == 'หญิง'){
                                $Gender_customers2 = 'ชาย';
                            }else{
                                $Gender_customers2 = 'หญิง';
                            }

                            echo "<h4><b>เพศ</b></h4>"; 
                            echo "<select class='input' name='Gender_customers'>;
                                    <option value='$Gender_customers'>$Gender_customers</option>
                                    <option value='$Gender_customers2'>$Gender_customers2</option>
                                </select>";

                            echo "<h4><b>รหัสผ่านเดิม</b></h4>";
                            echo "<input class = 'input' placeholder='รหัสผ่านเดิม' type='password' name='Password_customersOld' pattern='.{8,}'>"; 
                      
                            echo "<span class='error'>$Password_customersOldErr</span>";
                            echo "<br>";
                    

                            echo "<h4><b>รหัสผ่านใหม่</b></h4>";
                            echo "<input class = 'input' placeholder='รหัสผ่านใหม่' maxlength='50'  minlength='8' type='password' name='Password_customersNew' pattern='.{8,}'>"; 
                            echo "<br>";

                            echo "<h4><b>ยืนยันรหัสผ่านใหม่</b></h4>";
                            echo "<input class = 'input' placeholder='ยืนยันรหัสผ่านใหม่' maxlength='50'  minlength='8' type='password' name='Password_customersConfirm' pattern='.{8,}'>"; 
                            echo "<span class='error'>$Password_customersConfirmErr</span>";
                            echo "<br>";
                            echo "<br>";

                            echo "<input class = 'button' name='submit' type='submit'  value='เเก้ไขข้อมูล' >"; 
                            echo "</form>"; 
                            echo "</div>";

                            if(isset($_POST["submit"]))  
                            {  
                                $query = "UPDATE CUSTOMERS
                                SET First_name_customers = '$First_name_customers',
                                    Last_name_customers = '$Last_name_customers',
                                    Phone_customers = '$Phone_customers',
                                    Form_company = '$Form_company',
                                    Gender_customers = '$Gender_customers',
                                    Password_customers = '$Password_customers'
                                WHERE Id_customers = '$Id_customers'
                                ";  

                                if(mysqli_query($connect, $query) and ($up == 1))  
                                {  
                                    echo "<script>alert('ยืนยันเเก้ไข');location.href='profile.php';</script>";
                                } 
                            }  
                        ?>

                                                <div class="hr"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>

                </div>
            </form>
        </div></div>
</div>
<script src="setting_customers.js"></script>    
</body>
</html>
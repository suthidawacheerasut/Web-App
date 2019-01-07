<?php  
// $servername = "127.0.0.1";
// $username = "root";
// $password = "";
// $db_database = "test";
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


$S_id_star_manager          = isset($_SESSION['Id_star_manager']) ? $_SESSION['Id_star_manager'] : '';
$Age                        = isset($_POST['Age']) ? $_POST['Age'] : '';
$Gender_star                = isset($_POST['Gender_star']) ? $_POST['Gender_star'] : '';
$Height                     = isset($_POST['Height']) ? $_POST['Height'] : '';
$Weight                     = isset($_POST['Weight']) ? $_POST['Weight'] : '';
$First_name_star            = isset($_POST['First_name_star']) ? $_POST['First_name_star'] : '';
$Last_name_star             = isset($_POST['Last_name_star']) ? $_POST['Last_name_star'] : '';
$State_job                  = isset($_POST['State_job']) ? $_POST['State_job'] : '';
$Place_of_birth             = isset($_POST['Place_of_birth']) ? $_POST['Place_of_birth'] : '';
$Affiliation                = isset($_POST['Affiliation']) ? $_POST['Affiliation'] : '';
$Precent_slave_price        = isset($_POST['Precent_slave_price']) ? $_POST['Precent_slave_price'] : '';
$Phone_star                 = isset($_POST['Phone_star']) ? $_POST['Phone_star'] : '';


// $S_id_star_manager  = $_SESSION['Id_star_manager'];
// $Age                = $_POST["Age"];
// $Gender_star        = $_POST["Gender_star"];
// $Height             = $_POST["Height"];
// $Weight             = $_POST["Weight"];
// $First_name_star    = $_POST["First_name_star"];
// $Last_name_star     = $_POST["Last_name_star"];
// $State_job          = $_POST["State_job"];
// $Place_of_birth     = $_POST["Place_of_birth"];
// $Affiliation        = $_POST["Affiliation"];
// $Precent_slave_price = $_POST["Precent_slave_price"];
// $Phone_star         = $_POST["Phone_star"];

$_SESSION['First_name_star'] = "$First_name_star";
$_SESSION['Last_name_star'] = "$Last_name_star";
// $query = "SELECT * FROM ABILITY WHERE ab_id_star = '$Id_star'" ;  



// echo "$Phone_star";


if(isset($_POST["insert"]))  
{  
    $query_name = "SELECT Id_star FROM STAR WHERE '$First_name_star' = First_name_star AND '$Last_name_star' = Last_name_star";
    $Id_star1 = "";
    $result = mysqli_query($connect, $query_name);  
    while($row = mysqli_fetch_array($result))  
    {  
        $Id_star1 = "$row[Id_star]";
    } 
    
    if("$Id_star1" != ""){
        echo "<script>alert('ไม่สามารถเพิ่มได้ มีชื่อนามสกุลนี้เเล้ว');location.href='addstar_manager.php';</script>";
    }else{
        $query = "INSERT INTO STAR(S_id_star_manager,Age,Gender_star,Height,Weight,First_name_star,Last_name_star,State_job,Place_of_birth,Affiliation,Precent_slave_price,Phone_star) 
            VALUES ('$S_id_star_manager','$Age','$Gender_star','$Height','$Weight','$First_name_star','$Last_name_star','$State_job','$Place_of_birth','$Affiliation','$Precent_slave_price','$Phone_star')";  
        if(mysqli_query($connect, $query))  
        {  
            echo "<script>alert('ยืนยันการเพิ่ม');location.href='addstar_finish_manager.php?Phone_star=$Phone_star';</script>";
        }  else{
            echo "<script>alert('ไม่สามารถเพิ่มได้ อาจจะมีคนใช้เบอร์โทรศัพท์นี้ไปเเล้ว');location.href='addstar_manager.php';</script>";
        }
        
    }



    
}  
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

    <!-- validate  redio button-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script>
            function send() {
                var genders = document.getElementsByName("Gender_star");
                if (genders[0].checked == true) {
                    return true;
                } else if (genders[1].checked == true) {
                    return true;
                } else {
                    // no checked
                    var msg = '<span style="color:red;">กรุณาเลือกเพศ</span><br/><br />';
                    document.getElementById('msg').innerHTML = msg;
                    return false;
                }
                return true;
            }

            function reset_msg() {
                document.getElementById('msg').innerHTML = '';
            }
        </script>
        <!-- end -->

        <!-- Validation -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="CSS/style_manager.css">
        <link rel="stylesheet" href="CSS/formhack_manager.css">
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
  <form method="POST" enctype="multipart/form-data">
    <div class="login-html">
        <center><label for="tab-1" class="tab">เพิ่มดาราในสังกัด</label></center>
        <div class="login-form">
            <div>
                 <!-- scroll bar -->
                <div  style="width: 105%; height: 500px; overflow-y: scroll;">
                     <!-- ลายน้ำ -->
                <div id="example" role="application">
                    <div id="tshirt-view" class="demo-section k-content">

                         <!-- validat -->
                        <div class="container">
                            <form method="POST" enctype="multipart/form-data" class="registration" id="registration">

                                <!-- login -->
                                <label for="M_firstname">
                                    <div class="group">
                                        <label for="user" class="label">ชื่อจริง</label>
                                        <!-- validate -->
                                        <!--       <input id="user" name="First_name_star" type="text" class="input" pattern=".{2,}" required title="ชื่อจริง" placeholder="ชื่อจริง"
                                        oninvalid="setCustomValidity('กรุณากรอกชื่อจริง')"
                                        onchange="try{setCustomValidity('')}catch(e){}"
                                        > -->
                                      
                                        <input id="M_firstname" name="First_name_star" type="text" class="input" title="ชื่อจริง" placeholder="ชื่อจริง" minlength="2" maxlength="50" required>
                                        <ul class="input-requirements">
                                            <li> 2 < ความยาวตัวอักษร < 50 </li>
                                            <li>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</li>
                                        </ul>
                                    </div>
                                </label>

                                <label for="M_lastname">
                                    <div class="group">
                                        <label for="user" class="label">นามสกุล</label>
                                        <input id="M_lastname" name="Last_name_star" type="text" class="input" title="นามสกุล" placeholder="นามสกุล" minlength="2" maxlength="50" required>
                                        <ul class="input-requirements">
                                            <li> 2 < ความยาวตัวอักษร < 50 </li>
                                            <li>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</li>
                                        </ul>
                                    </div>
                                </label>

                                <div class="group">
                                    <label for="user" class="label">จังหวัดที่เกิด เช่น เชียงใหม่</label>
                                    <!-- validate -->
                                    <input id="user" name="Place_of_birth" type="text" class="input" pattern=".{3,}" required title="จังหวัดที่เกิด" placeholder="จังหวัดที่เกิด"
                                    oninvalid="setCustomValidity('กรุณากรอกจังหวัดที่เกิดให้ถูกต้อง')"
                                    onchange="try{setCustomValidity('')}catch(e){}"
                                    >
                                </div>

                                <div class="group">
                                    <label for="user" class="label">สังกัด</label>
                                    <!-- validate -->
                                    <input id="user" name="Affiliation" type="text" class="input" pattern=".{3,}" required title="สังกัด" placeholder="สังกัด"
                                    oninvalid="setCustomValidity('กรุณากรอกสังกัด')"
                                    onchange="try{setCustomValidity('')}catch(e){}"
                                    >
                                </div>

                                <div class="group">
                                    <label for="user" class="label">สถานะการรับงาน</label>
                                    <select class="input" name="State_job" required>
                                        <option value="รับงาน">รับงาน</option>
                                        <option value="ไม่รับงาน">ไม่รับงาน</option>
                                    </select>
                                </div>



                                <label for="M_age">
                                      <div class="group">
                                         <label class="label">อายุ</label>
                                         <input id="M_age" name="Age" type="text" class="input" title="อายุ" placeholder="อายุ"  minlength="1" required>
                                         
                                        <ul class="input-requirements"> 
                                            <li>กรองเป็นตัวเลข</li>
                                            <li>มากกว่า 0 ไม่เกิน 100</li>
                                        </ul>
                                     </div>
                                </label>

                                <label for="M_weight">
                                    <div class="group">
                                        <label for="user" class="label">น้ำหนัก (กก.)</label>
                                        <!-- validate -->
                                        <input id="M_weight" name="Weight" type="text" class="input"  title="น้ำหนัก" placeholder="น้ำหนัก" minlength="1" required>

                                        <ul class="input-requirements">
                                            <li>มากกว่า 2 เเละไม่เกิน 200</li>
                                            <li>กรองเป็นตัวเลข</li>
                                        </ul>
                                    </div>
                                </label>

                                <label for="M_height">
                                    <div class="group">
                                        <label for="user" class="label">ส่วนสูง (ซม.)</label>
                                        <!-- validate -->
                                        <input id="M_height" name="Height" type="text" class="input"  title="ส่วนสูง" placeholder="ส่วนสูง" minlength="1" required>

                                        <ul class="input-requirements">
                                            <li>มากกว่า 30 เเละไม่เกิน 250</li>
                                            <li>กรองเป็นตัวเลข</li>
                                        </ul>
                                    </div>
                                </label>
                      
                                <label for="M_percent">
                                    <div class="group">
                                        <label for="user" class="label">เปอร์เซ็นค่าตัวดารา</label>
                                        <!-- validate -->
                                        <input id="M_percent" name="Precent_slave_price" type="text" class="input"  title="เปอร์เซ็นค่าตัวดารา" placeholder="เปอร์เซ็นค่าตัวดารา" minlength="1" required>

                                        <ul class="input-requirements">
                                            <li>มากกว่า 0 เเละไม่เกิน 100</li>
                                            <li>กรองเป็นตัวเลข</li>
                                        </ul>
                                    </div>
                                </label>
                                
                                <label for="M_phone">
                                      <div class="group">
                                         <label class="label">เบอร์โทรศัพท์</label>
                                         <input id="M_phone" name="Phone_star" type="text" class="input" title="เบอร์โทรศัพท์" placeholder="08XXXXXXXX" minlength="10" maxlength="10" required 
                                        >

                                         <ul class="input-requirements">
                                             <li>08XXXXXXXX</li>
                                         </ul>
                                     </div>
                                </label>
                                <div class="group">
                                    <form method="POST" enctype="multipart/form-data">
                                    <br />
                                    <ul>
                                      <li>
                                        <input type="radio" name="Gender_star" value="หญิง" id="f-option"  onclick="reset_msg();"/>
                                        <label for="f-option">เพศหญิง</label>
                                        <div class="radio"></div>
                                      </li>
                               
                                      <li>
                                        <input type="radio" name="Gender_star" value="ชาย" id="s-option" onclick="reset_msg();" />
                                        <label for="s-option">เพศชาย</label>
                                        <div class="radio"><div class="inside"></div></div>
                                      </li>
                                    </ul> 
                                    <br />
                                    <div id="msg"></div>

                                    <input type="submit" name="insert" class="button" value="เพิ่มดาราในสังกัด" onclick="return send();">
                                    </form>
                                </div>
                            <div class="hr"></div>
                        </form>
                        </div>
                    </div>
                </div>
                    

                </div>
            </div>
        </div>

    </div>
    </form>
</div>
<!-- end -->
<br>
<br>

<script src="addstar_manager.js"></script>
</body></html>
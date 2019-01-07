<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_database = "id615238_case";


// $servername = "localhost";
// $username = "id615238_user_case";
// $password = "12345678";
// $db_database = "id615238_case";
$connect = new mysqli($servername, $username, $password,$db_database);

// echo "$Id_star_manager";
// echo "$First_name_star_manager";
// echo "$Last_name_star_manager";
// echo "$Phone_star_manager";
// echo "$Gender_star_manager";
// echo "$Password_star_manager";
$connect->set_charset("utf8");

$Id_star_manager = isset($_POST['Id_star_manager']) ? $_POST['Id_star_manager'] : '';
$First_name_star_manager = isset($_POST['First_name_star_manager']) ? $_POST['First_name_star_manager'] : '';
$Last_name_star_manager = isset($_POST['Last_name_star_manager']) ? $_POST['Last_name_star_manager'] : '';
$Phone_star_manager = isset($_POST['Phone_star_manager']) ? $_POST['Phone_star_manager'] : '';
$Gender_star_manager = isset($_POST['Gender_star_manager']) ? $_POST['Gender_star_manager'] : '';
$Password_star_manager = isset($_POST['Password_star_manager']) ? $_POST['Password_star_manager'] : '';

// $Id_star_manager = $_POST["Id_star_manager"];
// $First_name_star_manager = $_POST["First_name_star_manager"];
// $Last_name_star_manager = $_POST["Last_name_star_manager"];
// $Phone_star_manager = $_POST["Phone_star_manager"];
// $Gender_star_manager = $_POST["Gender_star_manager"];
// $Password_star_manager = $_POST["Password_star_manager"];

if(isset($_POST["insert"]))  
{  
    $query_name = "SELECT Id_star_manager FROM STAR_MANAGER WHERE '$First_name_star_manager' = First_name_star_manager AND 
    '$Last_name_star_manager' =  Last_name_star_manager";
    $Id_star1 = "";
    $result = mysqli_query($connect, $query_name);  
    while($row = mysqli_fetch_array($result))  
    {  
        $Id_star1 = "$row[Id_star_manager]";
    } 
    
    if("$Id_star1" != ""){
        echo "<script>alert('ไม่สามารถเพิ่มได้ มีชื่อนามสกุลนี้เเล้ว');location.href='M_sing-up.php';</script>";
    }else{
        $query = "INSERT INTO STAR_MANAGER VALUES ('$Id_star_manager','$First_name_star_manager','$Last_name_star_manager','$Phone_star_manager','$Gender_star_manager','$Password_star_manager')";  

        if(mysqli_query($connect, $query))  
        {  
            echo "<script>alert('ยืนยันการสมัคร'); location.href='login_manager.php';</script>";
        }  else{
            echo "<script>alert('ไม่สามารถสมัครได้ ชื่อผู้ใช้งานมีคนใช้เเล้ว'); location.href='M_sing-up.php';</script>";
        }
    }

}  
?> 

<!DOCTYPE html>
<html >
<head>
    <!-- validate  redio button-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script>
        function send() {
            var genders = document.getElementsByName("Gender_star_manager");
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

    <link rel="stylesheet" href="CSS/validation/style.css">
    <link rel="stylesheet" href="CSS/validation/formhack.css">
    <!-- end -->

    <title>Register Manager</title>
  
  
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <link rel="stylesheet" href="CSS/login_style.css">

  
</head>

<body>
  <div class="login-wrap">
  <form method="POST" enctype="multipart/form-data">
    <div class="login-html">
        <center><img src="Pic/logo5.png" style="width:100px;height:100px;"></center><br>
        <center><label for="tab-1" class="tab">สมัครสมาชิกผู้จัดการ</label></center>
        <!-- <input id="tab-2" type="radio" name="tab" class="sign-up1"><label for="tab-2" class="tab">สมัครสมาชิกผู้จัดการ</label>
        <input id="tab-3" type="radio" name="tab" class="sign-up2"><label for="tab-3" class="tab">สมัครสมาชิกลูกค้า</label> -->
        <div class="login-form">
            <div>
                <!-- scroll bar -->
                <div style="width: 105%; height: 400px; overflow-y: scroll;">
                    <!-- ลายน้ำ -->
                    <div id="example" role="application">
                        <div id="tshirt-view" class="demo-section k-content">

                           <!-- validat -->
                            <div class="container">
                                <form class="registration" id="registration" method="POST" enctype="multipart/form-data">
                                    <label for="M_username">
                                        <div class="group"> 
                                            <label class="label">ชื่อผู้ใช้งาน</label>
                                            <input type="text" name="Id_star_manager" class="input" id="M_username" title="ชื่อผู้ใช้งาน" placeholder="ชื่อผู้ใช้งาน" minlength="2" required>

                                            <ul class="input-requirements">
                                                <li> 2 < ความยาวตัวอักษร</li>
                                                <li>ตัวอักษรภาษาอังกฤษหรือตัวเลข</li>
                                            </ul>
                                        </div>
                                    </label>
                                    <label for="M_firstname">
                                         <div class="group">
                                            <label class="label">ชื่อจริง</label>
                                            <input id="M_firstname" name="First_name_star_manager" type="text" class="input" title="ชื่อจริง" placeholder="ชื่อจริง" minlength="2" maxlength="50" required>
                                            <ul class="input-requirements">
                                                <li> 2 < ความยาวตัวอักษร < 50 </li>
                                                <li>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</li>
                                            </ul>
                                        </div>
                                    </label>

                                    <label for="M_lastname">
                                         <div class="group">
                                            <label class="label">นามสกุล</label>
                                            <input id="M_lastname" name="Last_name_star_manager" type="text" class="input" title="นามสกุล" placeholder="นามสกุล" minlength="2" maxlength="50" required>
                                            <ul class="input-requirements">
                                                <li> 2 < ความยาวตัวอักษร < 50 </li>
                                                <li>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</li>
                                            </ul>
                                        </div>
                                    </label>

                                    <label for="M_phone">
                                          <div class="group">
                                             <label class="label">เบอร์โทรศัพท์</label>
                                             <input id="M_phone" name="Phone_star_manager" type="text" class="input" title="เบอร์โทรศัพท์" placeholder="08XXXXXXXX" minlength="10" maxlength="10" required>
                                             <ul class="input-requirements">
                                                 <li>08XXXXXXXX</li>
                                             </ul>
                                         </div>
                                     </label>

                                    <label for="M_password">
                                        <div class="group">
                                            <label for="M_password" class="label">รหัสผ่าน</label>
                                            <input id="M_password" type="password" class="input" data-type="M_password"
                                            title="รหัสผ่าน" placeholder="รหัสผ่าน" maxlength="50"  minlength="8" required>
                                            <ul class="input-requirements">
                                                <li> 8 < ความยาวตัวอักษร < 50 </li>
                                                <li>ตัวอักษรภาษาอังกฤษหรือตัวเลข</li>
                                            </ul>
                                        </div>
                                    </label>

                                    <label for="M_password_repeat">
                                        <div class="group">
                                            <label class="label">ยืนยันรหัสผ่าน</label>
                                            <input id="M_password_repeat" name="Password_star_manager" type="password" class="input" data-type="M_password"
                                            title="ยืนยันรหัสผ่าน" placeholder="ยืนยันรหัสผ่าน" maxlength="50" minlength="8" required>
                                        </div>
                                    </label>

                                    <div class="group">
                                        <form method="POST" enctype="multipart/form-data">
                                        <br />
                                        <ul>
                                          <li>
                                            <input type="radio" name="Gender_star_manager" value="หญิง" id="f-option"  onclick="reset_msg();"/>
                                            <label for="f-option">เพศหญิง</label>
                                            <div class="radio"></div>
                                          </li>
                                   
                                          <li>
                                            <input type="radio" name="Gender_star_manager" value="ชาย" id="s-option" onclick="reset_msg();" />
                                            <label for="s-option">เพศชาย</label>
                                            <div class="radio"><div class="inside"></div></div>
                                          </li>
                                        </ul> 
                                        <br />
                                        <div id="msg"></div>

                                        <input type="submit" name="insert" class="button" value="ลงทะเบียน" onclick="return send();">
                                        </form>
                                    </div>
                                    <div class="hr"></div>
                                </form>
                            </div>
                            
                            <div class="foot-lnk2">
                                <a href="login.php"><u>ลงชื่อเข้าใช้</u></a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

    </div>
    </form>
</div>

<!-- radio -->
   <script src="script_login.js"></script>
</body>
</html>
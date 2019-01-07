<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_database = "id615238_case";
    $conn = new mysqli($servername, $username, $password,$db_database);
    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
    $conn->set_charset("utf8");

    $Id_customers = isset($_POST['Id_customers']) ? $_POST['Id_customers'] : '';
    $First_name_customers = isset($_POST['First_name_customers']) ? $_POST['First_name_customers'] : '';
    $Last_name_customers = isset($_POST['Last_name_customers']) ? $_POST['Last_name_customers'] : '';
    $Phone_customers = isset($_POST['Phone_customers']) ? $_POST['Phone_customers'] : '';
    $ForC_company = isset($_POST['ForC_company']) ? $_POST['ForC_company'] : '';
    $Gender_customers = isset($_POST['Gender_customers']) ? $_POST['Gender_customers'] : '';
    $Password_customers = isset($_POST['Password_customers']) ? $_POST['Password_customers'] : '';


    // $Id_customers = $_POST["Id_customers"];
    // $First_name_customers = $_POST["First_name_customers"];
    // $Last_name_customers = $_POST["Last_name_customers"];
    // $Phone_customers = $_POST["Phone_customers"];
    // $ForC_company = $_POST["ForC_company"];
    // $Gender_customers = $_POST["Gender_customers"];
    // $Password_customers = $_POST["Password_customers"];

    if(isset($_POST["insert"]))  
    {  
            $query_name = "SELECT Id_customers FROM CUSTOMERS WHERE '$First_name_customers' = First_name_customers AND 
        '$Last_name_customers' =  Last_name_customers";
        $Id_c = "";
        $result = mysqli_query($conn, $query_name);  
        while($row = mysqli_fetch_array($result))  
        {  
            $Id_c = "$row[Id_customers]";
        } 
        
        if("$Id_c" != ""){
            echo "<script>alert('ไม่สามารถเพิ่มได้ มีชื่อนามสกุลนี้เเล้ว');location.href='C_sing-up.php';</script>";
        }else{

            $query = "INSERT INTO CUSTOMERS VALUES ('$Id_customers','$First_name_customers','$Last_name_customers','$Phone_customers','$ForC_company','$Gender_customers','$Password_customers')";  
            if(mysqli_query($conn, $query))  
            {  
                echo "<script>alert('ยืนยันการสมัคร'); location.href='login_customer.php';</script>";
            }  else{
                echo "<script>alert('ไม่สามารถสมัครได้ ชื่อผู้ใช้งานมีคนใช้เเล้ว'); location.href='C_sing-up.php';</script>";
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
            var genders = document.getElementsByName("Gender_customers");
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

    <title>Register Customer</title>
  
  
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <link rel="stylesheet" href="CSS/login_style.css">

  
</head>

<body>
  <div class="login-wrap">
  <form role="form" action="#" method="POST">
    <div class="login-html">
        <center><img src="Pic/logo5.png" style="width:100px;height:100px;"></center><br>
        <center><label for="tab-1" class="tab">สมัครสมาชิกลูกค้า</label></center>
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
                                <form class="registration" id="registration">
                                    <label for="M_username">
                                        <div class="group"> 
                                            <label class="label">ชื่อผู้ใช้งาน</label>
                                            <input name="Id_customers" type="text" class="input" id="M_username" title="ชื่อผู้ใช้งาน" placeholder="ชื่อผู้ใช้งาน" minlength="3" required>

                                            <ul class="input-requirements">
                                                <li> 2 < ความยาวตัวอักษร</li>
                                                <li>ตัวอักษรภาษาอังกฤษหรือตัวเลข</li>
                                            </ul>
                                        </div>
                                    </label>
                                    <label for="M_firstname">
                                         <div class="group">
                                            <label class="label">ชื่อจริง</label>
                                            <input name="First_name_customers" id="M_firstname" type="text" class="input" title="ชื่อจริง" placeholder="ชื่อจริง" minlength="3" maxlength="50" required>
                                            <ul class="input-requirements">
                                                <li> 2 < ความยาวตัวอักษร < 50 </li>
                                                <li>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</li>
                                            </ul>
                                        </div>
                                    </label>

                                    <label for="M_lastname">
                                         <div class="group">
                                            <label class="label">นามสกุล</label>
                                            <input name="Last_name_customers" id="M_lastname" type="text" class="input" title="นามสกุล" placeholder="นามสกุล" minlength="3" maxlength="50" required>
                                            <ul class="input-requirements">
                                                <li> 2 < ความยาวตัวอักษร < 50 </li>
                                                <li>กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ</li>
                                            </ul>
                                        </div>
                                    </label>

                                    <label for="M_phone">
                                          <div class="group">
                                             <label class="label">เบอร์โทรศัพท์</label>
                                             <input name="Phone_customers" id="M_phone" type="text" class="input" title="เบอร์โทรศัพท์" placeholder="08XXXXXXXX" minlength="10" maxlength="10" required>
                                             <ul class="input-requirements">
                                                 <li>08XXXXXXXX</li>
                                             </ul>
                                         </div>
                                     </label>

                                     <label for="M_company">
                                        <div class="group"> 
                                            <label class="label">บริษัท/สังกัด</label>
                                            <input name="ForC_company" type="text" class="input" id="M_company" title="ชื่อบริษัท/สังกัด" placeholder="ชื่อบริษัท/สังกัด" minlength="2" required
                                            oninvalid="setCustomValidity('กรุณากรอกชื่อบริษัทหรือสังกัด')"
                                            onchange="try{setCustomValidity('')}catch(e){}">
                                            
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
                                            <input name="Password_customers" id="M_password_repeat" type="password" class="input" data-type="M_password"
                                            title="ยืนยันรหัสผ่าน" placeholder="ยืนยันรหัสผ่าน" maxlength="50" minlength="8" required>
                                        </div>
                                    </label>


                                    <div class="group">
                                        <form action="" method="POST">
                                        <br />
                                        <ul>
                                          <li>
                                            <input type="radio" name="Gender_customers" value="หญิง"  id="f-option"  onclick="reset_msg();"/>
                                            <label for="f-option">เพศหญิง</label>
                                            <div class="radio"></div>
                                          </li>
                                   
                                          <li>
                                            <input type="radio" name="Gender_customers"  value="ชาย" id="s-option" onclick="reset_msg();" />
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
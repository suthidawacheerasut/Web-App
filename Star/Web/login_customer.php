<?php
session_start();
    if(isset($_POST['bttLogin'])){
        require 'config.php';
        $Id_customers = $_POST['Id_customers'];
        $Password_customers = $_POST['Password_customers'];
        $query = "SELECT * FROM CUSTOMERS WHERE Id_customers='$Id_customers' AND Password_customers = '$Password_customers'";
        $result = mysqli_query($connect,$query);

        if (mysqli_num_rows($result) == 1){
            $_SESSION['Id_customers'] = $Id_customers;
            header('Location:ordertime.php');
        }else{
            echo "<script>alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');location.href='login_customer.php';</script>";
        }
    }
    // if(isset($_GET['logout'])){
    //     session_unregister('Id_star_manager');
    // }

?>

<!DOCTYPE html>
<html >
<head>
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
                var msg = '<span style="color:red;">กรุณาเลือกประเภทผู้ใช้งาน</span><br /><br />';
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

    <link rel="stylesheet" href="validation/style.css">
    <link rel="stylesheet" href="validation/formhack.css">
    <!-- end -->

    <title>Login Form</title>
  
  
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <link rel="stylesheet" href="CSS/login_style.css">

  
</head>

<body>
  <div class="login-wrap">
  <form method="POST">
    <div class="login-html">
        <center><img src="Pic/logo5.png" style="width:100px;height:100px;"></center><br>
        <center><label for="tab-1" class="tab">ลงชื่อเข้าสู่ระบบลูกค้า</label></center>
        <!-- <input id="tab-2" type="radio" name="tab" class="sign-up1"><label for="tab-2" class="tab">สมัครสมาชิกผู้จัดการ</label>
        <input id="tab-3" type="radio" name="tab" class="sign-up2"><label for="tab-3" class="tab">สมัครสมาชิกลูกค้า</label> -->
        <div class="login-form">
            <div>
                <!-- ลายน้ำ -->
                <div id="example" role="application">
                    <div id="tshirt-view" class="demo-section k-content">

                        <!-- login -->
                        <div class="group">
                            <label for="user" class="label">ชื่อผู้ใช้งาน</label>
                            <!-- validate -->
                            <input id="user" type="text" name="Id_customers" class="input" pattern=".{3,}" required title="ชื่อผู้ใช้งาน" placeholder="ชื่อผู้ใช้งาน"
                            oninvalid="setCustomValidity('กรุณากรอกชื่อผู้ใช้งานให้ถูกต้อง')"
                            onchange="try{setCustomValidity('')}catch(e){}"
                            >
                        </div>
                        <div class="group">
                            <label for="pass" class="label">รหัสผ่าน</label>
                            <input id="pass" name="Password_customers" type="password" class="input" data-type="password"  pattern=".{8,}" required title="รหัสผ่าน" placeholder="รหัสผ่าน"
                            oninvalid="setCustomValidity('กรุณากรอกรหัสผ่านให้ถูกต้อง')"
                            onchange="try{setCustomValidity('')}catch(e){}"
                           >
                        </div>
                        <div class="group">
                            

                            <input type="submit" name="bttLogin" class="button" value="ลงชื่อเข้าใช้">
                   
                        </div>

                        <div class="hr"></div>
                        <div class="foot-lnk1">
                            <ul>
                              <li>
                            <a href="M_sing-up.php"><u>สมัครสมาชิกผู้จัดการ</u></a>
                       
                            </li>
                              
                              <li>
                            <a href="C_sing-up.php"><u>สมัครสมาชิกลูกค้า</u></a>
                            </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
           

        </div>

    </div>
    </form>
</div>

<!-- radio -->
   <!-- <script src="script_login.js"></script> -->
</body>
</html>
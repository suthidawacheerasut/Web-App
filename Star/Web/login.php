<?php
    session_start();
    if(isset($_GET['logout'])){
        session_unregister('Id_star_manager');
    }

?>

<!DOCTYPE html>
<html >
<head>
    <!-- validate  redio button-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
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
    <div class="login-html">
        <center><img src="Pic/logo5.png" style="width:100px;height:100px;"></center><br>
        <center><label for="tab-1" class="tab">ลงชื่อเข้าสู่ระบบ</label></center>
        <div class="login-form">
                <!-- ลายน้ำ -->
                <div id="example" role="application">
                    <div id="tshirt-view" class="demo-section k-content">

                        <br><br><br><div class="group">
                            <a href="login_manager.php"><input type="submit" class="button" value="ผู้จัดการ" onclick="return send();"></a><br>
                            <a href="login_customer.php"><input type="submit" class="button" value="ลูกค้า" onclick="return send();"></a>
                        </div>

                        
                        <br><br><div class="hr"></div>

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
   
</body>
</html>
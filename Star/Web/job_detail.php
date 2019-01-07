<?php
    session_start();
    echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_customers'];
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $db_database = "star";
    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    $db_database = "id615238_case";
    $conn = new mysqli($servername, $username, $password,$db_database);
    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
    $conn->set_charset("utf8");

    $R_id_star = $_GET['id'];
    $R_id_customer = $_SESSION['Id_customers'];

    $Time_work = isset($_POST["Time_work"]) ? $_POST["Time_work"] : '';
    $Date_work = isset($_POST["Date_work"]) ? $_POST["Date_work"] : '';
    date_default_timezone_set("Asia/Bangkok");
    $Time_reserve = date("H.i:d/m/Y");
    $Detail_work = isset($_POST["Detail_work"]) ? $_POST["Detail_work"] : '';

    //time
    $year = isset($_POST["year"]) ? $_POST["year"] : '';
    $month = isset($_POST["month"]) ? $_POST["month"] : '';
    $day = isset($_POST["day"]) ? $_POST["day"] : '';
    $hour = isset($_POST["hour"]) ? $_POST["hour"] : '';
    $min = isset($_POST["min"]) ? $_POST["min"] : '';

    $The_propose_price = isset($_POST["The_propose_price"]) ? $_POST["The_propose_price"] : '';

    if(isset($_POST["insert"]))  
    {  

        $query_name = "SELECT R_id_star FROM RESERVE WHERE R_id_star = '$R_id_star' and R_id_customer = '$R_id_customer' and Time_work = '$Time_work' and Date_work = '$Date_work' and Detail_work = '$Detail_work' and Total_time_work = '$year/$month/$day/$hour/$min' and The_propose_price = '$The_propose_price' ";
        $Id_star1 = "";
        $result = mysqli_query($conn, $query_name);  
        while($row = mysqli_fetch_array($result))  
        {  
            $Id_star1 = "$row[R_id_star]";
        } 
        
        if("$Id_star1" != ""){
            echo "<script>alert('ไม่สามารถเพิ่มได้ มีชื่อนามสกุลนี้เเล้ว');location.href='job_detail.php?id=$R_id_star';</script>";
        }else{
            $query = "INSERT INTO RESERVE VALUES ('NULL','$R_id_star','$R_id_customer','$Time_work','$Date_work','$Time_reserve','$Detail_work','$year/$month/$day/$hour/$min','0','$The_propose_price')";  
            if(mysqli_query($conn, $query))  
            {
                echo "<script>alert('ยืนยันการสมัคร'); location.href='ordertime.php';</script>";
            }  else{
                echo "<script>alert('ไม่สามารถสมัครได้ ชื่อผู้ใช้งานมีคนใช้เเล้ว'); location.href='job_detail.php';</script>";
            }
        }
    }

?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>รายละเอีดงาน</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <link rel="stylesheet" href="CSS/validation/style.css">
    <link rel="stylesheet" href="CSS/validation/formhack2.css">
    <link rel="stylesheet" href="CSS/edit_style2.css">
    <link rel="stylesheet" type="text/css" href="CSS/menu.css">
    <link href="CSS/jquery_notification.css" type="text/css" rel="stylesheet"/>

    <!-- Time -->
     <link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

    <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>

    <script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>

    <style> 
      .select {
          width: 20%;
          padding: 12px 20px;
          margin: 8px 0;
          border-radius:25px;
          background:rgba(123,100,99,.6);
          font-size: 18px;
      }
      .unit {
            font-size: 18px;
          margin-left: 10px;
          margin-right: 10px;
          color:rgba(123,100,99,.8);
      }
    </style>
    
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
                    <li ><a href="profile.php"><b>ข้อมูลส่วนตัว</b></a></li>
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
            
            <div class="under-line"></div>

            <div class="under">
                
            <div class="login-wrap">
              <form role="form" method="POST">
                <div class="login-html">
                    <center><label for="tab-1" class="tab">รายละเอียดงาน</label></center>
                    <div class="login-form">
                        <div>
                            <!-- scroll bar -->
                            <div style="width: 105%; height: 550px; overflow-y: scroll;">
                                <!-- ลายน้ำ -->
                                <div id="example" role="application">
                                    <div id="tshirt-view" class="demo-section k-content">

                                       <!-- validat -->
                                        <div class="container">

                                    <script type="text/javascript">
 
                                        $(function() {
                                           $('#Date_work').datepicker({
                                            minDate: 1,
                                            maxDate: 365,
                                            controlType: 'select',
                                            oneLine: true });
                                        });
                                         
                                        </script>
                                                <label for="Date_work">
                                                     <div class="group">
                                                        <label class="label">วันที่เริ่มทำงาน</label>

                                                        <input name="Date_work" id="Date_work" type="text" min="1" class="input" title="วันที่เริ่มทำงาน" placeholder="วันที่เริ่มทำงาน" required
                                                        oninvalid="setCustomValidity('กรุณากรอกวันที่เริ่มทำงานล่วงหน้าอย่างน้อย 1 วัน')"
                                                        onchange="try{setCustomValidity('')}catch(e){}">
                                                        <ul class="input-requirements">
                                                            <li>EX.15/03/2017</li>
                                                        </ul>
                                                    </div>
                                                </label>

                                                <script type="text/javascript">
 
                                        $(function() {
                                           $('#Time_work').timepicker({
                                            controlType: 'select',
                                            timeFormat: 'HH:mm'
                                             });
                                        });
                                         
                                        </script>

                                                <label for="Time_work">
                                                     <div class="group">
                                                        <label class="label">เวลาทำงาน</label>
                                                        <input name="Time_work" id="Time_work" type="time" class="input" title="เวลาทำงาน" placeholder="เวลาทำงาน" required
                                                        oninvalid="setCustomValidity('กรุณากรอกเวลาทำงาน')"
                                                        onchange="try{setCustomValidity('')}catch(e){}">
                                                        <ul class="input-requirements">
                                                            <li>EX.08.00</li>
                                                        </ul>
                                                    </div>
                                                </label>

                                                <label for="Detail_work">
                                                      <div class="group">
                                                         <label class="label">รายละเอียดงาน</label>
                                                         <input name="Detail_work" id="Detail_work" type="text" class="input" title="รายละเอียดงาน" placeholder="รายละเอียดงาน">
                                                     </div>
                                                 </label>

                                                 <label for="Total_time_work">
                                                    <div class="group"> 
                                                        <label class="label">เวลาทำงานทั้งหมด</label>
                                                        
                                                        <input name="year" type="number" min="0" class="select" id="Total_time_work" required
                                                        oninvalid="setCustomValidity('กรุณากรอกเวลาทำงานค่ามากกว่า 0')"
                                                        onchange="try{setCustomValidity('')}catch(e){}"><label class="unit">ปี</label>

                                                         <input name="month" type="number" min="0" class="select" id="Total_time_work" required
                                                        oninvalid="setCustomValidity('กรุณากรอกเวลาทำงานค่ามากกว่า 0')"
                                                        onchange="try{setCustomValidity('')}catch(e){}"><label class="unit">เดือน</label>

                                                         <input name="day" type="number" min="0" class="select" id="Total_time_work"  required
                                                        oninvalid="setCustomValidity('กรุณากรอกเวลาทำงานค่ามากกว่า 0')"
                                                        onchange="try{setCustomValidity('')}catch(e){}"><label class="unit">วัน</label>
                                                        <br>
                                                        <select class="select" name="hour" type="number" id="Total_time_work" required
                                                        oninvalid="setCustomValidity('กรุณากรอกเวลาทำงาน')"
                                                        onchange="try{setCustomValidity('')}catch(e){}">
                                                        <?php
                                                            for ($x = 0; $x <= 23; $x++) {
                                                                echo "<option value='$x'>$x</option>";
                                                            }
                                                        ?>
                                                        <select><label class="unit">ชั่วโมง</label>

                                                        <select class="select" name="min" type="number" id="Total_time_work" required
                                                        oninvalid="setCustomValidity('กรุณากรอกเวลาทำงาน')"
                                                        onchange="try{setCustomValidity('')}catch(e){}">
                                                        <?php
                                                            for ($x = 0; $x < 60; $x++) {
                                                                echo "<option value='$x'>$x</option>";
                                                            }
                                                        ?>
                                                        <select><label class="unit">นาที</label>
                                                        
                                                    </div>
                                                    <label for="The_propose_price">
                                                    <div class="group"> 
                                                        <label class="label">ราคาว่าจ้าง(บาท)</label>
                                                        <input name="The_propose_price" type="number" min="0" class="input" id="The_propose_price" title="ราคาว่าจ้าง" placeholder="ราคาว่าจ้าง" required
                                                        oninvalid="setCustomValidity('กรุณากรอกราคาว่าจ้าง')"
                                                        onchange="try{setCustomValidity('')}catch(e){}">
                                                        <ul class="input-requirements">
                                                            <li>EX.120000</li>
                                                        </ul>
                                                        
                                                    </div>
                                                </label>
                                                <div class="group">
                                                    <input type="submit" name="insert" class="button" value="เพิ่มลงรายการจองคิว" onclick="return send();">
                                                    <!-- <script type="text/javascript">
                                                        function showAutoCloseMessage(){
                                                            showNotification({
                                                                message: "เพิ่มในรายการจองเรียบร้อย",
                                                                autoClose: true,
                                                                duration: 2
                                                            });    
                                                        }                                
                                                    </script> -->
                                                </div>
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
<script src="job_detail.js"></script>    
</body>
</html>
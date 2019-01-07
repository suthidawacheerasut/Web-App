<?php
    session_start();
    echo 'ยินดีต้อนรับ คุณ '.$_SESSION['Id_customers'];
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "star";
    // $servername = "localhost";
    // $username = "id615238_user_case";
    // $password = "12345678";
    $dbname = "id615238_case";

    $connect=new mysqli($servername,$username,$password,$dbname);

    if($connect->connect_error){
        die("connection failed:".$connect->connect_error);
    }
    $connect->set_charset("utf8");

    $id_reserve = $_GET['id_reserve'];
?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>แก้ไขรายละเอียดงาน</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="CSS/validation/style.css">
    <link rel="stylesheet" href="CSS/validation/formhack2.css">
    <link rel="stylesheet" href="CSS/edit_style2.css">
    <link rel="stylesheet" type="text/css" href="CSS/menu.css">
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
              <form role="form" action="#" method="POST">
                <div class="login-html">
                    <center><label for="tab-1" class="tab">แก้ไขรายละเอียดงาน</label></center>
                    <div class="login-form">
                        <div>
                            <!-- scroll bar -->
                            <div style="width: 105%; height: 550px; overflow-y: scroll;">
                                <!-- ลายน้ำ -->
                                <div id="example" role="application">
                                    <div id="tshirt-view" class="demo-section k-content">
                                         <?php
                            $Id_customers = $_SESSION['Id_customers'];
                            $query = "SELECT * FROM RESERVE WHERE id_reserve = '$id_reserve'";

                            $result = mysqli_query($connect,$query);

                            while($row = mysqli_fetch_array($result))  
                            {  
                                $R_id_star =
                                $row['R_id_star'];

                                $R_id_customer = 
                                $row['R_id_customer'];

                                $Time_work = 
                                $row['Time_work'];

                                $Date_work = 
                                $row['Date_work'];

                                $Detail_work = 
                                $row['Detail_work'];

                                $Total_time_work = 
                                $row['Total_time_work'];

                                $The_propose_price = 
                                $row['The_propose_price'];

                            } 
                            $e = explode("/", $Total_time_work);
                            $year = $e[0];
                            $month = $e[1];
                            $day = $e[2];
                            $hour = $e[3];
                            $min = $e[4];

                            $Time_workErr = "";
                            $Date_workErr = "";
                            $Detail_workErr = "";
                            // $Total_time_workErr = "";
                            $yearErr = "";
                            $monthErr = "";
                            $dayErr = "";
                            $hourErr = "";
                            $minErr = "";

                            $The_propose_priceErr = "";
                 

                            
                            if (empty($_POST["Time_work"])){
                                $Time_workErr = "";
                            }else{
                                $Time_work = $_POST["Time_work"];
                            }

                            if (empty($_POST["Date_work"])){
                                $Date_workErr = "";
                            }else{
                                $Date_work= $_POST["Date_work"];
                            }

                            if (empty($_POST["Detail_work"])){
                                $Detail_workErr = "";
                            }else{
                                $Detail_work = $_POST["Detail_work"];
                            }

                            if (empty($_POST["year"])){
                                $yearErr = "";
                            }else{
                                $year = $_POST["year"];
                            }

                            if (empty($_POST["month"])){
                                $monthErr = "";
                            }else{
                                $month = $_POST["month"];
                            }

                            if (empty($_POST["day"])){
                                $dayErr = "";
                            }else{
                                $day = $_POST["day"];
                            }

                            if (empty($_POST["hour"])){
                                $hourErr = "";
                            }else{
                                $hour= $_POST["hour"];
                            }

                            if (empty($_POST["min"])){
                                $minErr = "";
                            }else{
                                $min = $_POST["min"];
                            }

                            if (empty($_POST["The_propose_price"])){
                                $The_propose_priceErr = "";
                            }else{
                                $The_propose_price = $_POST["The_propose_price"];
                            }


                            

                            echo '<div class = "group">';

                            if(isset($_SESSION['PHP_SELF'])){

                                $keep = htmlspecialchars($_SESSION['PHP_SELF']);
                            }
                            else{
                                $keep = '';
                            }


                            echo "<form method='POST' action ='$keep'>";

                            echo "<script type='text/javascript'>
                                $(function() {
                                    $('#Time_work').timepicker({
                                    controlType: 'select',
                                    timeFormat: 'HH:mm'
                                    });
                                });
                                             
                            </script>";

                            echo "<h4><b>เวลาทำงาน</b></h4>";
                            echo "<input name='Time_work' id='Time_work' type='time' value='$Time_work' class='input' title='เวลาทำงาน'' placeholder='เวลาทำงาน' required>";
                            echo "<br>";
                            echo "<span class='error'>$Time_workErr</span>";

                            echo "<script type='text/javascript'>
     
                                    $(function() {
                                    $('#Date_work').datepicker({
                                    minDate: 1,
                                    maxDate: 365,
                                    controlType: 'select',
                                    oneLine: true 
                                    });
                                });
                            </script>";

                            echo "<h4><b>วันเริ่มทำงาน</b></h4>";
                            echo "<input class = 'input' type='text' name='Date_work' pattern='.{3,}' value = '$Date_work'>";
                            echo "<br>";
                            echo "<span class='error'>$Date_workErr</span>";

                            echo "<h4><b>รายละเอียดงาน</b></h4>";
                            echo "<input class = 'input' type='text' name='Detail_work' pattern='.{3,}' value = '$Detail_work'>";
                            echo "<br>";
                            echo "<span class='error'>$Detail_workErr</span>";

                            echo "<h4><b>เวลาทำงานทั้งหมด</b></h4>";
                            echo "<input name='year' type='number' value='$year' min='0' class='select' id='Total_time_work' required >
                                    <label class='unit'>ปี</label>";
                            echo "<span class='error'>$yearErr</span>";

                            echo  "<input name= 'month' type= 'number' value= '$month' min='0' class='select' id='Total_time_work' required >
                                    <label class='unit'>เดือน</label>";
                            echo "<span class='error'>$monthErr</span>";

                            echo "<input name='day' type='number'  value='$day' min='0' class='select' id='Total_time_work'  required>
                                    <label class='unit'>วัน</label>";
                            echo "<span class='error'>$dayErr</span>";

                            echo '<br>';
                            echo '<select class="select" name="hour" type="text" id="Total_time_work" required>';
                            echo "<option value='$hour'>$hour</option>";
                            echo "<option value='-'>-</option>";
                                        for ($x = 1; $x <= 23; $x++) {
                                            echo "<option value='$x'>$x</option>";
                                        }
                                    
                            echo '</select><label class="unit">ชั่วโมง</label>';
                            echo "<span class='error'>$hourErr</span>";

                            echo '<select class="select" name="min" type="number" id="Total_time_work" required>';
                            echo "<option value='$min'>$min</option>";
                            echo "<option value='-'>-</option>";                            
                                        for ($x = 1; $x < 60; $x++) {
                                            echo "<option value='$x'>$x</option>";
                                        }
                                    
                            echo '</select><label class="unit">นาที</label>';
                            echo "<span class='error'>$minErr</span>";
                            echo "<br>";

                            echo "<h4><b>ราคาว่าจ้าง(บาท)</b></h4>";
                            echo "<input name='The_propose_price' value='$The_propose_price' type='number' min='0' class='input' id='The_propose_price' required";
                            echo "<br>";
                            echo "<span class='error'>$The_propose_priceErr</span>";

                            echo "<br>";
                            echo "<br>";

                            echo "<input class = 'button' name='submit' type='submit'  value='เเก้ไขข้อมูล' >"; 
                            echo "</form>"; 
                            echo "</div>";

                            if(isset($_POST["submit"]))  
                            {  
                                $query_name = "SELECT R_id_star FROM RESERVE WHERE R_id_star = '$R_id_star' and R_id_customer = '$R_id_customer' and Time_work = '$Time_work' and Date_work = '$Date_work' and Detail_work = '$Detail_work' and Total_time_work = '$year/$month/$day/$hour/$min' and The_propose_price = '$The_propose_price' ";
                                $Id_star1 = "";
                                $result = mysqli_query($connect, $query_name);  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    $Id_star1 = "$row[R_id_star]";
                                } 
                                
                                if("$Id_star1" != "" && "$Id_star1" != "$R_id_star"){
                                    echo "<script>alert('ไม่สามารถเพิ่มได้ มีชื่อนามสกุลนี้เเล้ว');location.href='edit_job.php?id_reserve=$id_reserve';</script>";
                                }else{
                                    $query = "UPDATE RESERVE
                                    SET Time_work = '$Time_work',
                                        Date_work = '$Date_work',
                                        Detail_work = '$Detail_work',
                                        Total_time_work = '$year/$month/$day/$hour/$min',
                                        The_propose_price = '$The_propose_price'
                                    WHERE id_reserve = '$id_reserve'
                                    ";  

                                    if(mysqli_query($connect, $query))  
                                    {  
                                        echo "<script>alert('ยืนยันเเก้ไข');location.href='list.php';</script>";
                                    } 
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

            </form>
        </div></div>
</div>

</body>
</html>